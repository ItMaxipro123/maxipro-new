<?php

namespace App\Models\Penerimaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class Document extends Model
{
    use HasFactory;
    public static function deleteDocument($teknisi_cookie, $code){
        
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('delete','https://maxipro.id/TeknisiAPI/penerimaan_dokumen_hapus/'.$code,[
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
    public static function editViewDocument($teknisi_cookie, $code){
        
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('GET','https://maxipro.id/TeknisiAPI/penerimaan_dokumen_viewedit/'.$code,[
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
    public static function editDocument($teknisi_cookie, $dataSend){
        
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
                $newKey = "nodokumen[{$lastChar}]";
                $array[$newKey] = $value['no_document'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
        }
        else{
            $combinedData = array_merge($dataSend['dataOld'], $dataSend['dataNew']);
            foreach ($combinedData  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "nodokumen[{$lastChar}]";
                $array[$newKey] = $value['no_document'] ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
        }
        $form_params = array_merge($form_params, $array);
        // dd($form_params);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('POST','https://maxipro.id/TeknisiAPI/penerimaan_dokumen_edit',[
                'form_params'=> $form_params,
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
    public static function tambahDocument($teknisi_cookie, $dataSend){
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
            $newKey = "nodokumen[{$lastChar}]";
            $array[$newKey] = $value['no_document'] ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        $form_params = array_merge($form_params, $array);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('POST','https://maxipro.id/TeknisiAPI/penerimaan_dokumen_tambah',[
                'form_params'=> $form_params,
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
