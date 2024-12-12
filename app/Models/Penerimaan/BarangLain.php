<?php

namespace App\Models\Penerimaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class BarangLain extends Model
{
    use HasFactory;
    public static function deleteBarangLain($teknisi_cookie,$code){
        // dd($teknisi_cookie,$code);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('delete','https://maxipro.id/TeknisiAPI/penerimaan_barang_lain_hapus/'.$code,[
                'headers' =>$headers,
            ]);
            $data = $response->getBody()->getContents();
            // dd('data',$data);
            return json_decode($data,true);
        }catch(\Exception $e){
            Log::error('Error fetching dokumen: '.$e->getMessage());
            throw $e;
        }
    }
    public static function editViewBarangLain($teknisi_cookie,$code){
        // dd($teknisi_cookie,$code);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('GET','https://maxipro.id/TeknisiAPI/penerimaan_barang_lain_editview/'.$code,[
                'headers' =>$headers,
            ]);
            $data = $response->getBody()->getContents();
            
            return json_decode($data,true);
        }catch(\Exception $e){
            Log::error('Error fetching dokumen: '.$e->getMessage());
            throw $e;
        }
    }
    public static function printBarangLain($teknisi_cookie,$code){
        // dd($teknisi_cookie,$code);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('GET','https://maxipro.id/TeknisiAPI/penerimaan_barang_lain_print/'.$code,[
                'headers' =>$headers,
            ]);
            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data,true);
        }catch(\Exception $e){
            Log::error('Error fetching dokumen: '.$e->getMessage());
            throw $e;
        }
    }
    public static function editBarangLain($teknisi_cookie,$dataSend){
        
        $form_params = [
            'id' => $dataSend['id'],
            'tgl_terima'=>$dataSend['tgl_terima'],
            'pengirim' => $dataSend['pengirim'],
            'keterangan' => $dataSend['keterangan'],
        ];
        $array=[];
        $key_index=0;
        $key_index_array=[];
        if(empty($dataSend['dataNew'])){

            foreach ($dataSend['dataOld']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "keteranganbarang[{$lastChar}]";
                $array[$newKey] = $value['keterangan'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($dataSend['dataOld']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "qty[{$lastChar}]";
                $array[$newKey] = $value['qty'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($dataSend['dataOld']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "name[{$lastChar}]";
                $array[$newKey] = $value['name'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
        }
        else{
            $combinedData = array_merge($dataSend['dataOld'], $dataSend['dataNew']);
            foreach ($combinedData  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "keteranganbarang[{$lastChar}]";
                $array[$newKey] = $value['keterangan'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($combinedData  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "qty[{$lastChar}]";
                $array[$newKey] = $value['qty'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($combinedData  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "name[{$lastChar}]";
                $array[$newKey] = $value['name'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
        }
        $form_params = array_merge($form_params, $array);
        
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('POST','https://maxipro.id/TeknisiAPI/penerimaan_barang_lain_edit',[
                'form_params'=>$form_params,
                'headers' =>$headers,
            ]);
            $data = $response->getBody()->getContents();
            // dd('data',$data);
            return json_decode($data,true);
        }catch(\Exception $e){
            Log::error('Error fetching dokumen: '.$e->getMessage());
            throw $e;
        }
    }
    public static function tambahBarangLain($teknisi_cookie,$dataSend){
            $form_params = [
                
                'tgl_terima'=>$dataSend['tgl_terima'],
                'pengirim' => $dataSend['pengirim'],
                'keterangan' => $dataSend['keterangan'],
            ];
            $array=[];
            $key_index=0;
            $key_index_array=[];
            

            foreach ($dataSend['dataNew']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "keteranganbarang[{$lastChar}]";
                $array[$newKey] = $value['keterangan'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($dataSend['dataNew']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "qty[{$lastChar}]";
                $array[$newKey] = $value['qty'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($dataSend['dataNew']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "name[{$lastChar}]";
                $array[$newKey] = $value['name'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }

            $form_params = array_merge($form_params, $array);
            // dd($form_params);
            try{
                $client = new Client(['verify' => false]);
                $headers = [
                    'Cookie' => $teknisi_cookie
                ];
                $response = $client->request('POST','https://maxipro.id/TeknisiAPI/penerimaan_barang_lain_create',[
                    'form_params'=>$form_params,
                    'headers' =>$headers,
                ]);
                $data = $response->getBody()->getContents();
                
                return json_decode($data,true);
            }catch(\Exception $e){
                Log::error('Error fetching dokumen: '.$e->getMessage());
                throw $e;
            }
        
    }
}
