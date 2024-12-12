<?php

namespace App\Models\Penerimaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class PindahGudang extends Model
{
    use HasFactory;
    public static function createdPindahGudang($teknisi_cookie, $form){
        $form_params = [
            'database'=>$form['database'],
            'tgl_terima' => $form['tgl_terima']
        ];

        $array=[];
        $key_index=0;
        $key_index_array=[];
        foreach ($form['id_pindahgudangdetail']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "id_pindahgudangdetail[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['stok_terima']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "stok_terima[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        $mergedArray = array_merge($form_params, $array);
        
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie,
            ];
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penerimaan_pindah_gudang_create', [
                'form_params' => $mergedArray,
                'headers' => $headers,

            ]);
            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e){
            return ['error' => $e->getMessage()];
        }
    }
    public static function editViewPindahGudang($teknisi_cookie, $code){
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penerimaan_pindah_gudang_viewedit/'.$code, [
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
    public static function deletePindahGudang($teknisi_cookie, $code){
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/penerimaan_pindah_gudang_hapus/'.$code, [
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
    public static function updatedPindahGudang($teknisi_cookie, $form){
        // dd($form);
        $form_params = [
            'database'=>$form['database'],
            'tgl_terima' => $form['tgl_terima'],
            'id_penerimaangudang'=>$form['id_penerimaangudang']
        ];

        $array=[];
        $key_index=0;
        $key_index_array=[];
        foreach ($form['id_pindahgudangdetail']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "id_pindahgudangdetail[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['stok_terima']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "stok_terima[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        $mergedArray = array_merge($form_params, $array);
        // dd($form,$mergedArray);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie,
            ];
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/penerimaan_pindah_gudang_edit', [
                'form_params' => $mergedArray,
                'headers' => $headers,

            ]);
            $data = $response->getBody()->getContents();
        
            return json_decode($data, true);
        } catch (\Exception $e){
            return ['error' => $e->getMessage()];
        }

    }
}
