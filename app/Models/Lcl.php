<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Lcl extends Model
{
    public static function tambahLcl($teknisi_cookie,$data){
 
        $array_data = [];
        
        $count = count(array_filter($data['item'], function($value){
            return $value !== null;
        }));

        try{
            $client = new \GuzzleHttp\Client(['verify' => false]);
       
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            if($data['iditem_select']!==null){
          
                $ppnItemHasOne = in_array('1', $data['ppn_item']);
                $ppnItemSelectHasOne = in_array('1', $data['ppn_item_select']);
           
                if ($ppnItemHasOne || $ppnItemSelectHasOne) {
                
                    
                    $formParams = [
                        'database'=> $data['database'],
                        'noreferensi'=> $data['noreferensi'],
                        'tgl_transaksi'=>$data['tgl_transaksi'],
                        'termin'=>$data['termin'],
                        'account'=>$data['account'],
                        'supplier'=>$data['supplier'],
                        'matauang'=>$data['matauang'],
                        'matauang_asal'=>$data['matauang_asal'],
                        'statusconvert'=>$data['statusconvert'],
                       
                        'cabang'=>$data['cabang'],
                        'td_ppn'=>$data['td_ppn'],
                 
                        'td_subtotal'=>$data['td_subtotal'],
                        'td_total'=>$data['td_total'],
                        'td_discount'=>$data['td_discount'],
                        'td_discount_nominal'=>$data['td_discount_nominal'],
                        'keterangan'=>$data['keterangan'],
                        'statusconvert'=>$data['statusconvert'],
                        'valuenominalconvert'=>$data['valuenominalconvert'],
                        'valuecategoryconvert'=>$data['valuecategoryconvert'],
                        'includeppn'=>$data['includeppn'],
                        'ppn'=>$data['ppn']
                        
                    ];
                }
                else{
                    
                    $formParams = [
                        'database'=> $data['database'],
                        'noreferensi'=> $data['noreferensi'],
                        'tgl_transaksi'=>$data['tgl_transaksi'],
                        'termin'=>$data['termin'],
                        'account'=>$data['account'],
                        'supplier'=>$data['supplier'],
                        'matauang'=>$data['matauang'],
                        'matauang_asal'=>$data['matauang_asal'],
                        'statusconvert'=>$data['statusconvert'],
                       
                        'cabang'=>$data['cabang'],
                        'td_ppn'=>$data['td_ppn'],
                 
                        'td_subtotal'=>$data['td_subtotal'],
                        'td_total'=>$data['td_total'],
                        'td_discount'=>$data['td_discount'],
                        'td_discount_nominal'=>$data['td_discount_nominal'],
                        'keterangan'=>$data['keterangan'],
                        'statusconvert'=>$data['statusconvert'],
                        'valuenominalconvert'=>$data['valuenominalconvert'],
                        'valuecategoryconvert'=>$data['valuecategoryconvert'],
                        'includeppn'=>$data['includeppn'],
                        'ppn'=>$data['ppn']
                        
                    ];
                }
            }
            
            else{
             
                $formParams = [
                    'database'=> $data['database'],
                    'noreferensi'=> $data['noreferensi'],
                    'tgl_transaksi'=>$data['tgl_transaksi'],
                    'termin'=>$data['termin'],
                    'account'=>$data['account'],
                    'supplier'=>$data['supplier'],
                    'matauang'=>$data['matauang'],
                    'matauang_asal'=>$data['matauang_asal'],
                    'statusconvert'=>$data['statusconvert'],
                
                    'cabang'=>$data['cabang'],
                    'td_ppn'=>$data['td_ppn'],
                    'td_subtotal'=>$data['td_subtotal'],
                    'td_total'=>$data['td_total'],
                    'td_discount'=>$data['td_discount'],
                    'td_discount_nominal'=>$data['td_discount_nominal'],
                    'keterangan'=>$data['keterangan'],
                    'statusconvert'=>$data['statusconvert'],
                    'valuenominalconvert'=>$data['valuenominalconvert'],
                    'valuecategoryconvert'=>$data['valuecategoryconvert'],
                    'includeppn'=>$data['includeppn'],
                    'ppn'=>$data['ppn']
                ];
            }

            $array=[];
            $key_index=0;
            $key_index_array=[];
        
         
            if($data != [] && $data['iditem_select']!=null){
            
                $newArrayCommercial = array_merge($data['idcommercial'],$data['idcommercial_select'] );
                $newArrayRestok = array_merge($data['idrestok'],$data['idrestok_select'] );
                $newArray = array_merge($data['iditem'], $data['iditem_select']);
                $newArrayPriceAsal = array_merge($data['price_asal'], $data['price_asal_select']);
                if($data['statusconvert']==1){

                    $newArrayPrice = array_merge($data['price_invoice'], $data['price_invoice_select']);
                    foreach ($newArrayPrice as $key => $value) {
                        $lastChar = substr($key, -1);
                        $newKey = "price[{$lastChar}]";
                        $array[$newKey] = $value ?? '';
                        $key_index++;
                        $key_index_array[] = $newKey;
                    }
                }
                
                $newArrayQty = array_merge($data['qty'], $data['qty_select']);
                $newArrayDisc = array_merge($data['disc'], $data['disc_select']);
                $newArrayPpnItem = array_merge($data['ppn_item'], $data['ppn_item_select']);
                $newArrayPricePpn = array_merge($data['price_ppn'], $data['price_ppn_select']);
                $newArrayGudang = array_merge($data['gudang'], $data['gudang_select']);
                $newArraySubtot = array_merge($data['subtot_arr'], $data['subtot_arr_select']);
                foreach ($data['item'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "item[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayCommercial as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "idcommercial[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayRestok as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "idrestok[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArray as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "iditem[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayPriceAsal as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "price_asal[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
              
                foreach ($newArrayPriceAsal as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "price[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
              
                foreach ($newArrayQty as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "qty[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayDisc as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "disc[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayPpnItem as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "ppn_item[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayPricePpn as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "priceppn[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArrayGudang as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "gudang[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($newArraySubtot as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "subtotal[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                $formParams = array_merge($formParams,$array);
                // dd($formParams);
                $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_create', [
                    'form_params' => $formParams,
                    'headers' => $headers,
                ]);
           
                $data2 = $response->getBody()->getContents();
                $Data = json_decode($data2, true);
               
                return json_decode($data2, true);
            }
            else{
        
                foreach ($data['iditem']  as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "iditem[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                foreach ($data['item'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "item[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['idrestok']  as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "idrestok[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
             
                foreach ($data['price_asal'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "price_asal[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                if($data['statusconvert']==0){
                    foreach ($data['price_asal'] as $key => $value) {
                        $lastChar = substr($key, -1);
                        $newKey = "price[{$lastChar}]";
                        $array[$newKey] = $value ?? '';
                        $key_index++;
                        $key_index_array[] = $newKey;
                    }
                }
                
                foreach ($data['qty'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "qty[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['disc'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "disc[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['ppn_item'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "ppn_item[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['gudang'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "gudang[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['subtot_arr'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "subtotal[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['price_ppn'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "priceppn[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                foreach ($data['idcommercial'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "idcommercial[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
                
                $formParams = array_merge($formParams,$array);
                
                $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_create', [
                    'form_params' => $formParams,
                    'headers' => $headers,
                ]);
                $data2 = $response->getBody()->getContents();
                $Data = json_decode($data2, true);
                return json_decode($data2, true);
            }
        }catch(\Exception $e){
            return([
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

    }
    
    //edit lcl tab master
    public static function editLcl($teknisi_cookie,$data){
        
        // dd($data);
        $array_data = [];
        
        $count = count(array_filter($data['item'], function($value){
            return $value !== null;
        }));

        try{
            $client = new \GuzzleHttp\Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $formParams = [
                'id_lcl'=>$data['id_lcl'],
                'database'=> $data['database'],
                'noreferensi'=> $data['noreferensi'],
                'tgl_transaksi'=>$data['tgl_transaksi'],
                'termin'=>$data['termin'],
                'account'=>$data['account'],
                'supplier'=>$data['supplier'],
                'matauang'=>$data['matauang'],
                'matauang_asal'=>$data['matauang_asal'],
                'statusconvert'=>$data['statusconvert'],
                'keterangan'=>$data['keterangan'],
                'cabang'=>$data['cabang'],
                'td_ppn'=>$data['td_ppn'],
                'td_subtotal'=>$data['td_subtotal'],
                'td_total'=>$data['td_total'],
                'td_discount'=>$data['td_discount'],
                'td_discount_nominal'=>$data['td_discount_nominal'],
                'keterangan'=>$data['keterangan'],
                'statusconvert'=>$data['statusconvert'],
                'valuenominalconvert'=>$data['valuenominalconvert'],
                'valuecategoryconvert'=>$data['valuecategoryconvert'],
                'includeppn'=>$data['includeppn'],
                'ppn'=>$data['ppn']
            ];
            
            $array=[];
            $key_index=0;
            $key_index_array=[];
            // dd('a',$data);
            foreach ($data['iditem']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "iditem[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['item'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "item[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['idrestok']  as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "idrestok[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['price_asal'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price_asal[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            if($data['statusconvert']==0){
                foreach ($data['price_asal'] as $key => $value) {
                    $lastChar = substr($key, -1);
                    $newKey = "price[{$lastChar}]";
                    $array[$newKey] = $value ?? '';
                    $key_index++;
                    $key_index_array[] = $newKey;
                }
            }
            foreach ($data['qty'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "qty[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['disc'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "disc[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['ppn_item'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "ppn_item[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['gudang'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "gudang[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['subtot_arr'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "subtotal[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['price_ppn'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "priceppn[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['idcommercial'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "idcommercial[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['price_invoice'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
           
            $formParams = array_merge($formParams,$array);
            
            // dd($formParams);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_edit', [
                'form_params' => $formParams,
                'headers' => $headers,
            ]);
            $data2 = $response->getBody()->getContents();
            $Data = json_decode($data2, true);
            
            return json_decode($data2, true);

        }catch(\Exception $e){
            return([
                'error_message'=>$e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
    
    //edit tabel ekspedisi tab ekspedisi
    public static function updateEkspedisiTabel($teknisi_cookie,$data){
        try{
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $formParams=[
                'kodepengiriman_update' => $data['kodepengiriman_update'],
                'tgl_kirim_update'=>$data['tgl_kirim_update'],
                'matauang_update'=>$data['matauang_update'],
                'price_update'=>$data['price_update'],
                'rute_update'=>$data['rute_update'],
                'ekspedisi_update'=>$data['ekspedisi_update'],
                'resi_update'=>$data['resi_update'],
                'keterangan_update'=>$data['keterangan_update']
            ];
            // dd($formParams);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_editekspedisi', [
                'headers' => $headers,
                'form_params'=>$formParams
            ]);
            $data2 = $response->getBody()->getContents();
            $Data = json_decode($data2, true);
            
            return json_decode($data2, true);
        }catch(\Exception $e){
            return ['error'=> $e->getMessage()];
        }
    }

    public static function tambahEkspedisiTabel($teknisi_cookie,$data){
        try{
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $formParams=[
                
                'tgl_kirim'=>$data['tambah_tgl_ekspedisi'],
                'matauang'=>$data['tambah_matauang_ekspedisi'],
                'price'=>$data['tambah_biaya_ekspedisi'],
                'rute'=>$data['tambah_rute'],
                'ekspedisi'=>$data['tambah_ekspedisi'],
                'resi'=>$data['tambah_resi_ekspedisi'],
                'keterangan'=>$data['tambah_keterangan']
            ];
            // dd($formParams);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_createekspedisi', [
                'headers' => $headers,
                'form_params'=>$formParams
            ]);
            $data2 = $response->getBody()->getContents();
            $Data = json_decode($data2, true);
            // dd($Data);
            return json_decode($data2, true);
        }catch(\Exception $e){
            return ['error'=> $e->getMessage()];
        }
    }
    public static function saveEkspedisiTabel($teknisi_cookie,$data){
        try{
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $formParams=[
                'id_lcl'=>$data['id_lcl']
            ];
            $array=[];
            $key_index=0;
            $key_index_array=[];
            foreach ($data['kodepengiriman_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "kodepengiriman_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['tgl_kirim_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "tgl_kirim_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['rute_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "rute_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['ekspedisi_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "ekspedisi_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['resi_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "resi_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['price_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['keterangan_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "keterangan_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['matauang_ekspedisi'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "matauang_ekspedisi[{$lastChar}]";
                $array[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            
            $formParams = array_merge($formParams,$array);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_saveekspedisi', [
                'headers' => $headers,
                'form_params'=>$formParams
            ]);
            $data2 = $response->getBody()->getContents();
            $Data = json_decode($data2, true);
            // dd($Data);
            return json_decode($data2, true);
        }catch(\Exception $e){
            return ['error'=> $e->getMessage()];
        }
    }

    public static function getLclPembelian($teknisi_cookie)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/lcl', [
                'headers' => $headers,

            ]);

            
            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function getSelectEkspedisi($teknisi_cookie)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/select_ekspedisi', [
                'headers' => $headers,

            ]);

            
            $data = $response->getBody()->getContents();
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getLclPembelianFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue, $invoice)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/lcl', [
                'headers' => $headers,
                'query' => [
                    'request_check' => $status,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'checkdatevalue' => $checkdatevalue,
                    'invoice' => $invoice,
                 

                ],
            ]);

            $data = $response->getBody()->getContents();
            $Data = json_decode($data, true);
            // dd($Data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getLclPembelianImportInvoice($teknisi_cookie, $idcomercial){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
           
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/lcl_importdata' , [
                'form_params' => [
                    'idcommercial' =>$idcomercial,
                    
                ],
                'headers' => $headers,
            ]);
            
            $data = $response->getBody()->getContents();
            $Data = json_decode($data, true);
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            
            return ['error' => $e->getMessage()];
        }
    }

    public static function getEditViewLcl($teknisi_cookie, $invoice)
    {
        $client = new Client([
            'verify' => false  // Menonaktifkan verifikasi sertifikat SSL
        ]);
    
        $headers = [
            'Cookie' => 'ci_session=' . $teknisi_cookie  // Menggunakan cookie yang sesuai
        ];
    
       
        try {
            // Mengirim permintaan POST dengan multipart
            $res = $client->request('GET', 'https://maxipro.id/TeknisiAPI/lcl_editview/' . $invoice, [
                'headers' => $headers,

            ]);
            
            $Data = $res->getBody()->getContents();
            return json_decode($Data, true);
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    public static function getLclAdd($teknisi_cookie){
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];    
            $response_barang = $client->request('GET','https://maxipro.id/TeknisiAPI/lcl_add',[
                'headers' => $headers,
            ]);
            $data_barang = $response_barang->getBody()->getContents();
            // dd(json_decode($data_barang));
            return json_decode($data_barang,true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }

    }

    public static function getLclAddBarang($teknisi_cookie,$id){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];    
            $response_barang = $client->request('POST','https://maxipro.id/TeknisiAPI/lcl_select_barang',[
                'headers' => $headers,
                'form_params'=>[
                    'id'=>$id,
                ],
            ]);
            $data_barang = $response_barang->getBody()->getContents();
            
            return json_decode($data_barang,true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }

    }

    public static function getRejectOrderPembelian($teknisi_cookie, $id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_pembelian_rejected/' . $id, [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            $Data = json_decode($data, true);

            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getDeleteLcl($teknisi_cookie, $invoice)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/lcl_hapuslcl/' . $invoice, [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            $Data = json_decode($data, true);
            // dd($Data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
}
