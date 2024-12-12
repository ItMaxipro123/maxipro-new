<?php

namespace App\Models\Penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class OrderPenjualan extends Model
{
    use HasFactory;

    public static function getOrderPenjualan($teknisi_cookie){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_penjualan', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }

    }
    public static function viewtambahOrderPenjualan($teknisi_cookie){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_penjualan_viewtambah', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }

    }
    public static function pdfprintOrderPenjualan($teknisi_cookie,$code){
        // dd($code);
        $form = [
            'code'=>$code
        ];
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie,
            ];
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/order_penjualan_viewedit', [
                'form_params' => $form,
                'headers' => $headers,

            ]);
            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e){
            return ['error' => $e->getMessage()];
        }
    }

    public static function tambahOrderPenjualan($teknisi_cookie,$form){
      

        $array=[];
        $key_index=0;
        $key_index_array=[];
        $formParams = [
            'database' => $form['database'],
            'tgl_penawaran' => $form['tgl_request'],
            'cabang' => $form['cabang'],
            'keterangan' => $form['keterangan'],
            'keterangan_pengiriman' => $form['keterangan_pengiriman'],
            'orang' => $form['orang'],
            'ppn' => $form['ppn_centang_global'],
            'includeppn' => $form['include_ppn'],
            'td_subtotal' => $form['td_subtotal'],
            'td_total' => $form['td_total'],
            'td_ppn' => $form['td_ppn'],
            'gudang' => $form['gudang'],
            'sales' => $form['sales'],
            'status_order' => $form['status_order'],
            'id_mitrabisnis' => $form['id_mitrabisnis'],
            'code_mitrabisnis' => $form['code_mitrabisnis'],
            'name_mitrabisnis' => $form['name_mitrabisnis'],
        ];
        foreach ([
            'name' => ['name', 'name_import'],
            'code' => ['code', 'code_import'],
            'item' => ['code', 'code_import'],
            'price' => ['harga_belumppn', 'harga_belumppn_import'],
            'qty' => ['qty_qty', 'qty_qty_import'],
            'disc' => ['disc_disc', 'disc_disc_import'],
            'subtotal' => ['subtotal', 'subtotal_import'],
            'ppn_item' => ['ppn', 'ppn_import'],
        ] as $prefix => $fields) {
            $index = 0; // Gunakan $index untuk kunci unik berdasarkan urutan
            foreach ($fields as $field) {
                // Pastikan $form[$field] ada dan memiliki data
                if (!empty($form[$field])) {
                    foreach ($form[$field] as $key => $value) {
                        $newKey = "{$prefix}[{$index}]"; // Gunakan $index untuk kunci
                        $array[$newKey] = $value ?? '';
                        $index++; // Tambahkan index untuk setiap elemen
                    }
                }
            }
        }
        
        
        
        $mergedArray = array_merge($formParams, $array);
        // dd($form,$mergedArray);
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

          
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/order_penjualan_tambah', [
                'form_params' => $mergedArray,
                'headers' => $headers,
            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
        // dd($form,$mergedArray);
    }

    public static function getOrderPenjualanFilter($teknisi_cookie, $tgl_awal, $tgl_akhir, $checkdatevalue){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_penjualan', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }

    }

}
