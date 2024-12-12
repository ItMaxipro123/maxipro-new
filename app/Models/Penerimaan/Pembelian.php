<?php

namespace App\Models\Penerimaan;


use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class Pembelian extends Model
{
    public static function getPenerimaanDokumen($teknisi_cookie, $tgl_awal, $tgl_akhir, $checkdatevalue, $kode)
    {
        try {
            // Create a new GuzzleHTTP client with verify option set to false
            $client = new Client([
                'verify' => false
            ]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $url = 'https://maxipro.id/TeknisiAPI/penerimaan_dokumen';
            $queryParams = [
                'checkdatevalue' => $checkdatevalue,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'kode' => $kode,
            ];
            $url .= '?' . http_build_query($queryParams);

            // Make a GET request to the specified URL with headers
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);
            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        }
    }

    public static function tambahViewPembelian($teknisi_cookie,$checkdatevalue,$tgl_akhir,$tgl_awal,$fcl_lcl){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

    public static function importFcl($teknisi_cookie,$id){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penereimaan_pembelian_addbarang', [
                'headers' => $headers,
                'form_params' =>[
                    'id'=>$id
                ],
            ]);

            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }
    public static function deletePembelian($teknisi_cookie,$id){
        // dd('model',$id);
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian_hapus/'.$id, [
                'headers' => $headers,
                
            ]);

            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

    public static function importInvoicePembelian($teknisi_cookie,$invoice,$id){
        // dd($invoice,$id);
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $fomSend = [
                'id' => $id,
                'invoice'=> $invoice
            ];
            // dd($fomSend);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penerimaan_add_invoice', [
                'headers' => $headers,
                'form_params' =>$fomSend
            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }
    public static function addEkspedisi($teknisi_cookie,$form){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            
            // dd($fomSend);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian_addekspedisi', [
                'headers' => $headers,
                'form_params' =>$form
            ]);

            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }
    public static function deleteEkspedisi($teknisi_cookie,$id){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            
            
            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian_hapusekspedisi/'.$id, [
                'headers' => $headers,
                
            ]);

            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

    public static function importLcl($teknisi_cookie,$id){
        // dd('id model',$id);
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penereimaan_pembelian_addbarang', [
                'headers' => $headers,
                'form_params' =>[
                    'id'=>$id
                ],
            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

    public static function tambahPembelian($teknisi_cookie,$form){
        // dd('a');
        
        
        $formParams = [
            'pembelianid'=>$form['id_pembelian'],
            'tgl_terima'=>$form['tgl_terima'],
            'ekspedisi'=>$form['ekspedisi'],
            'gudang'=>$form['gudang'],
            'keterangan'=>$form['keterangan'],
            'database'=>$form['database'],

        ];
        $array=[];
        $key_index=0;
        $key_index_array=[];
        $name_detail_array=[];
        $stok_input_array=[];
        $stok_update_array=[];
        $stok_terima_array=[];
        $id_detail_array=[];
        $id_barang_array=[];
        $id_array=[];
        $category_detail_array=[];
        foreach ($form['details']  as $key => $value) {
            
            $name_detail_array['name['.$key.']'] = $form['details'][$key]['name_detail'];
            $stok_input_array['stok_input['.$key.']'] = $form['details'][$key]['stok_input'];
            $stok_update_array['stok_update['.$key.']'] = $form['details'][$key]['stok_update'];
            $stok_terima_array['stok_terima['.$key.']'] = $form['details'][$key]['stok_terima'];
            $id_detail_array['id_detail['.$key.']'] = $form['details'][$key]['id_detail'];
            $id_barang_array['id_barang['.$key.']'] = $form['details'][$key]['id_barang'];
            $id_array['id['.$key.']'] = $form['details'][$key]['id'];
            $category_detail_array['category['.$key.']'] = $form['details'][$key]['category_detail'];
            
        }
        
        
        $finalArray = array_merge(
            $formParams,
            $name_detail_array,
            $stok_input_array,
            $stok_update_array,
            $stok_terima_array,
            $id_detail_array,
            $id_barang_array,
            $id_array,
            $category_detail_array
        );
        
        // dd($finalArray);
        try {
            
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian_tambahpenerimaan', [
                'form_params' => $finalArray,
                'headers' => $headers,
            ]);
            
            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

    public static function editPembelian($teknisi_cookie,$form){
        
        
        $formParams = [
            'id_penerimaan'=>$form['id_penerimaan'],
            'pembelianid'=>$form['id_pembelian'],
            'tgl_terima'=>$form['tgl_terima'],
            'ekspedisi'=>$form['ekspedisi'],
            'gudang'=>$form['gudang'],
            'keterangan'=>$form['keterangan'],
            'database'=>$form['database'],

        ];
        $array=[];
        $key_index=0;
        $key_index_array=[];
        $name_detail_array=[];
        $stok_input_array=[];
        $stok_update_array=[];
        $stok_terima_array=[];
        $id_detail_array=[];
        $id_barang_array=[];
        $id_array=[];
        $category_detail_array=[];
        foreach ($form['details']  as $key => $value) {
            
            $name_detail_array['name['.$key.']'] = $form['details'][$key]['name_detail'];
            $stok_input_array['stok_input['.$key.']'] = $form['details'][$key]['stok_input'];
            $stok_update_array['stok_update['.$key.']'] = $form['details'][$key]['stok_update'];
            $stok_terima_array['stok_terima['.$key.']'] = $form['details'][$key]['stok_terima'];
            $id_detail_array['id_detail['.$key.']'] = $form['details'][$key]['id_detail'];
            $id_barang_array['id_barang['.$key.']'] = $form['details'][$key]['id_barang'];
            $id_array['id['.$key.']'] = $form['details'][$key]['id'];
            $category_detail_array['category['.$key.']'] = $form['details'][$key]['category_detail'];
            
        }
        
        
        $finalArray = array_merge(
            $formParams,
            $name_detail_array,
            $stok_input_array,
            $stok_update_array,
            $stok_terima_array,
            $id_detail_array,
            $id_barang_array,
            $id_array,
            $category_detail_array
        );
        // dd($finalArray);        

        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian_edit', [
                'form_params' => $finalArray,
                'headers' => $headers,
            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

    public static function editViewPembelian($teknisi_cookie,$code){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penerimaan_viewedit_baru/'.$code, [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        } 
    }

}
