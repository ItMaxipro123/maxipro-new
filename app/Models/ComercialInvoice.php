<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class ComercialInvoice extends Model
{
    public static function getComercialInvoice($teknisi_cookie)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/comercial_invoice', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function deleteCommercialInvoice($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/hapus_comercial_invoice/'.$id, [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function tambahCommercialLocalLcl($teknisi_cookie,$data)
    {
        $count = count(array_filter($data['id_item'], function ($value) {
            return $value !== null;
        }));
        // dd($data);
        $formParams = [

      
            'modeadmin' => $data['mode_admin'],      //untuk mengirim ke tabel penjualanfromchina
            'invoicenumber' => $data['invoice_no'],      //untuk mengirim ke tabel penjualanfromchina
            'packingnumber' => $data['packing_no'],       //untuk mengirim ke tabel penjualanfromchina
            'contractnumber' => $data['contract_no'],       //untuk mengirim ke tabel penjualanfromchina
            'database'=> $data['database'],       //untuk mengirim ke tabel penjualanfromchina & pembelian local maupun lcl
            'supplier'=>$data['supplier'], //untuk mengirim ke tabel penjualanfromchina & pembelian local maupun lcl
            'name_perusahaan'=>$data['name'], //name company //untuk mengirim ke tabel penjualanfromchina & pembelian local maupun lcl
            'address'=>$data['address_company'],//untuk mengirim ke tabel penjualanfromchina & pembelian local maupun lcl
            'city'=>$data['city'], //untuk mengirim ke tabel penjualanfromchina & pembelian local maupun lcl
            'telephone' =>$data['telp'],
            'noreferensi'=> $data['no_referensi'],
            'supplierbank' => 0,
            'currency'=> $data['matauang'],
            'tgl_transaksi'=>$data['tgl_transaksi'],
            'kategori'=>$data['kategori'],
            'termin'=>$data['termin'],
            'account_no'=>$data['account'],
            'beneficiary_name' =>'',
            'beneficiary_address' =>'',
            'location'=>'',
            'status_ppn'=>$data['status_ppn'],
            'includeppn'=>$data['include_ppn'],
            'keterangan'=>$data['keterangan'],
            'cabang'=>$data['cabang'],
            'freight_cost' => 0,
            'insurance' => 0,
            'incoterms' => '',
            'swift_code'=>'',
            'bank_name' =>'',
            'bank_address' =>'',
            'id'=>'',
            // 'restok'=>$data['restok']
        ];
        
        $array=[];
        $key_index=0;
        $key_index_array=[];
        foreach ($data['restok']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "restok[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['id_item']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "id_item[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['nama_item']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "nama_item[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['harga_asal']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "price[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['qty']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "qty[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['disc']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "disc[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
   
        foreach ($data['ppn']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "ppn[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['td_ppn']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "td_ppn[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['gudang']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "gudang[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }

        foreach ($data['english_name'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "english_name[{$lastChar}]";  // Ganti $lastChar dengan string kosong
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($data['chinese_name'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "chinese_name[{$lastChar}]";  // Ganti $lastChar dengan string kosong
                    $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['model'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "model[{$lastChar}]"; 
                    $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['brand'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "brand[{$lastChar}]"; 
                    $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['hs_code'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "hs_code[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['length_m'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "length_m[{$lastChar}]"; 
                    $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['width_m'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "width_m[{$lastChar}]"; 
                    $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['height_m'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "height_m[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['length_p'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "length_p[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['width_p'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "width_p[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['height_p'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "height_p[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['qty'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "qty[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['nett_weight'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "nett_weight[]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['gross_weight'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "gross_weight[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['cbm'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "cbm_volume[{$lastChar}]"; 
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['subtotal'] as $key => $value) {
            
            $lastChar = substr($key, -1);
            $newKey = "total[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['id_item'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "price_usd[{$lastChar}]"; 
            $array[$newKey] = 0;
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['id_item'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "total_usd[{$lastChar}]"; 
            $array[$newKey] = 0;
            $key_index++;
            $key_index_array[] = $newKey;

        }
        foreach ($data['id_item'] as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "use[{$lastChar}]"; 
            $array[$newKey] = '';
            $key_index++;
            $key_index_array[] = $newKey;

        }
       
  
    
        $mergedArray = array_merge($formParams, $array);
     

        try {
            // dd('aa',$mergedArray);
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

          
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/comercial_invoice_tambah', [
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
    }
    public static function getSupplierComercialInvoice($teknisi_cookie)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/comercialInvoice_supplier', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function getSelectCategoryComercialInvoice($teknisi_cookie,$id,$selected_value)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/comercial_invoice_select_category' , [
                'form_params' => [
                    'id_commercial' =>$id,
                    'selected_value'=>$selected_value
                ],
                'headers' => $headers,
            ]);
            
            $data = $response->getBody()->getContents();
         
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function getComercialInvoiceAdd($teknisi_cookie,$id)
    {
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/comercial_invoice', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            
            
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getComercialInvoiceFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue, $nama_perusahaan)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            // dd($id_no_invoice);

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/comercial_invoice', [
                'headers' => $headers,
                'query' => [
                    'requested_check' => $status,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'checkdatevalue' => $checkdatevalue,
                    // 'invoice' => '24060505',
                    'name' => $nama_perusahaan,
                    

                ],
            ]);

            $data = $response->getBody()->getContents();
            $Data = json_decode($data, true);
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getEditComercialInvoice($teknisi_cookie, $id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/comercial_invoice_editview/' . $id, [
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

    public static function getImportBarangComercialInvoice($teknisi_cookie, $restok, $valuerestok){
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
           
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/commercial_invoice_importdata' , [
                'form_params' => [
                    'idrestok' =>$restok,
                    'valuerestok'=>$valuerestok
                ],
                'headers' => $headers,
            ]);
            
            $data = $response->getBody()->getContents();
            $Data = json_decode($data, true);
            // dd($Data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            
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

    public static function getHapusOrderPembelian($teknisi_cookie, $id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/order_pembelian_hapus/' . $id, [
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

    public static function updateComercialInvoice($teknisi_cookie, $data)
    {
        $count = count(array_filter($data['english_name'], function ($value) {
            return $value !== null;
        }));
    

        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];


            // Iterating through fields that can have multiple values
            $jum=0;
            
            $array=[];
            $array2=[];
            for ($rep=0; $rep<=$count; $rep++){
                $array[] = [
                    'restok['.$rep.']' => 'restok['.$rep.']',
                    'chinese_name['.$rep.']' => 'chinese_name['.$rep.']',
                    'english_name['.$rep.']' => 'english_name['.$rep.']',
                    'model['.$rep.']' => 'model['.$rep.']',
                    'brand['.$rep.']' => 'brand['.$rep.']',
                    'hs_code['.$rep.']' => 'hs_code['.$rep.']',
                    'length_m['.$rep.']' => 'length_m['.$rep.']',
                    'width_m['.$rep.']' => 'width_m['.$rep.']',
                    'height_m['.$rep.']' => 'height_m['.$rep.']',
                    'length_p['.$rep.']' => 'length_p['.$rep.']',
                    'width_p['.$rep.']' => 'width_p['.$rep.']',
                    'height_p['.$rep.']' => 'height_p['.$rep.']',
                    'qty['.$rep.']' => 'qty['.$rep.']',
                    'nett_weight['.$rep.']' => 'nett_weight['.$rep.']',
                    'gross_weight['.$rep.']' => 'gross_weight['.$rep.']',
                    'cbm_volume['.$rep.']' => 'cbm_volume['.$rep.']',
                    'price['.$rep.']' => 'price['.$rep.']',
                    'price_usd['.$rep.']' => 'price_usd['.$rep.']',
                    'total['.$rep.']' => 'total['.$rep.']',
                    'total_usd['.$rep.']' => 'total_usd['.$rep.']',
                    'use['.$rep.']' => 'use['.$rep.']',
                ];
            }
       
          
            
   
            $formParams = [
                'freight_cost' => $data['freight_cost'] ?? '',
                'insurance' => $data['insurance'] ?? '',
                'incoterms' => $data['incoterms'] ?? '',
                'location' => $data['location'] ?? '',
                'supplierbank' => $data['supplierbank'] ?? '',
                'currency' => $data['currency'] ?? '',
                'bank_name' => $data['bank_name'] ?? '',
                'bank_address' => $data['bank_address'] ?? '',
                'swift_code' => $data['swift_code'] ?? '',
                'account_no' => $data['account_no'] ?? '',
                'beneficiary_name' => $data['beneficiary_name'] ?? '',
                'beneficiary_address' => $data['beneficiary_address'] ?? '',
                'tgl_transaksi' => $data['date'] ?? '',
                'name_perusahaan' => $data['name_perusahaan'] ?? '',
                'address' => $data['address'] ?? '',
                'city' => $data['city'] ?? '',
                'supplier' => $data['id_supplier'] ?? '',
                'id' => $data['comercialId'] ?? '',
                'modeadmin' => $data['modeadmin'] ?? '',
                'packingnumber' => $data['packingnumber'] ?? '',
                'contractnumber' => $data['contractnumber'] ?? '',
                'invoicenumber' => $data['invoicenumber'] ?? '',
                'database' => $data['database'] ?? '',
                'telephone' => $data['telephone'] ?? '',
                
            ];
            $newEnglishNames = [];
            $key_index=0;
            
            $key_index_array=[];
           
            foreach ($data['english_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "english_name[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['chinese_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "chinese_name[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['model_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "model[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['brand_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "brand[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['hs_code'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "hs_code[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['long_m'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "length_m[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['width_m'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "width_m[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['height_m'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "height_m[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['long_p'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "length_p[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['width_p'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "width_p[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['height_p'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "height_p[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['qty'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "qty[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['net_weight'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "nett_weight[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['gross_weight'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "gross_weight[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['cbm'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "cbm_volume[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['unit_price_without_tax'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['unit_price_usd'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price_usd[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['total_price_without_tax'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "total[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['total_price_usd'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "total_usd[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['use_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "use[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['restok'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "restok[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
        //    dd('a');
            $formParams = array_merge($formParams, $newEnglishNames);
            // dd($data,$formParams);
      
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/comercial_invoice_edit2', [
                'form_params' => $formParams,
                'headers' => $headers,
            ]);
            // dd($response);
            $data2 = $response->getBody()->getContents();
            $Data = json_decode($data2, true);
        
            return json_decode($data2, true);

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function tambahComercialInvoice($teknisi_cookie, $data)
    {
     
        $count = count(array_filter($data['english_name'], function ($value) {
            return $value !== null;
        }));
    

        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];


            // Iterating through fields that can have multiple values
            $jum=0;
            
            $array=[];
            $array2=[];
            for ($rep=0; $rep<=$count; $rep++){
                $array[] = [
                    'restok['.$rep.']' => 'restok['.$rep.']',
                    'chinese_name['.$rep.']' => 'chinese_name['.$rep.']',
                    'english_name['.$rep.']' => 'english_name['.$rep.']',
                    'model['.$rep.']' => 'model['.$rep.']',
                    'brand['.$rep.']' => 'brand['.$rep.']',
                    'hs_code['.$rep.']' => 'hs_code['.$rep.']',
                    'length_m['.$rep.']' => 'length_m['.$rep.']',
                    'width_m['.$rep.']' => 'width_m['.$rep.']',
                    'height_m['.$rep.']' => 'height_m['.$rep.']',
                    'length_p['.$rep.']' => 'length_p['.$rep.']',
                    'width_p['.$rep.']' => 'width_p['.$rep.']',
                    'height_p['.$rep.']' => 'height_p['.$rep.']',
                    'qty['.$rep.']' => 'qty['.$rep.']',
                    'nett_weight['.$rep.']' => 'nett_weight['.$rep.']',
                    'gross_weight['.$rep.']' => 'gross_weight['.$rep.']',
                    'cbm_volume['.$rep.']' => 'cbm_volume['.$rep.']',
                    'price['.$rep.']' => 'price['.$rep.']',
                    'price_usd['.$rep.']' => 'price_usd['.$rep.']',
                    'total['.$rep.']' => 'total['.$rep.']',
                    'total_usd['.$rep.']' => 'total_usd['.$rep.']',
                    'use['.$rep.']' => 'use['.$rep.']',
                ];
            }
       
          
            
   
            $formParams = [
                'freight_cost' => $data['freight_cost'] ?? '',
                'insurance' => $data['insurance'] ?? '',
                'incoterms' => $data['incoterms'] ?? '',
                'location' => $data['location'] ?? '',
                'supplierbank' => $data['supplierbank'] ?? '',
                'currency' => $data['currency'] ?? '',
                'bank_name' => $data['bank_name'] ?? '',
                'bank_address' => $data['bank_address'] ?? '',
                'swift_code' => $data['swift_code'] ?? '',
                'account_no' => $data['account_no'] ?? '',
                'beneficiary_name' => $data['beneficiary_name'] ?? '',
                'beneficiary_address' => $data['beneficiary_address'] ?? '',
                'tgl_transaksi' => $data['date'] ?? '',
                'name_perusahaan' => $data['name_perusahaan'] ?? '',
                'address' => $data['address'] ?? '',
                'city' => $data['city'] ?? '',
                'supplier' => $data['id_supplier'] ?? '',
                'id' => $data['comercialId'] ?? '',
                'modeadmin' => $data['modeadmin'] ?? '',
                'packingnumber' => $data['packingnumber'] ?? '',
                'contractnumber' => $data['contractnumber'] ?? '',
                'invoicenumber' => $data['invoicenumber'] ?? '',
                'database' => $data['database'] ?? '',
                'telephone' => $data['telephone'] ?? '',
                
            ];
            $newEnglishNames = [];
            $key_index=0;
            
            $key_index_array=[];
           
            foreach ($data['english_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "english_name[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['chinese_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "chinese_name[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['model_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "model[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['brand_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "brand[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['hs_code'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "hs_code[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['long_m'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "length_m[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['width_m'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "width_m[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['height_m'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "height_m[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['long_p'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "length_p[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['width_p'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "width_p[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['height_p'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "height_p[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['qty'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "qty[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['net_weight'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "nett_weight[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['gross_weight'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "gross_weight[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['cbm'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "cbm_volume[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['unit_price_without_tax'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['unit_price_usd'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "price_usd[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['total_price_without_tax'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "total[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['total_price_usd'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "total_usd[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['use_name'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "use[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }
            foreach ($data['restok'] as $key => $value) {
                $lastChar = substr($key, -1);
                $newKey = "restok[{$lastChar}]";
                $newEnglishNames[$newKey] = $value ?? '';
                $key_index++;
                $key_index_array[] = $newKey;
            }

            $formParams = array_merge($formParams, $newEnglishNames);
            // dd($formParams);
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/comercial_invoice_tambah', [
                'form_params' => $formParams,
                'headers' => $headers,
            ]);

            $data2 = $response->getBody()->getContents();
            
            $Data = json_decode($data2, true);

            return json_decode($data2, true);

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }


    public static function updateFormAtasComercialInvoice($teknisi_cookie, $data){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            
                
                $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/comercial_invoice_edit1' , [
                    'form_params' => [
                        
                        'brand' => $data['brand'],
                        'gross_weight' => $data['gross_weight'],
                        'height' => $data['height'],
                        'height_p' => $data['height_p'],
                        'hs_code' => $data['hs_code'],
                        'id' => $data['comercialId'],
                        'id_barang' => $data['id_barang'],
                        'id_detail' => $data['id_detail'],
                        'length' => $data['length'],
                        'length_p' => $data['length_p'],
                        'model' => $data['model'],
                        'name' => $data['name'],
                        'name_english' => $data['name_english'],
                        'name_chinese' => $data['name_chinese'],
                        'nett_weight' => $data['nett_weight'],
                        'width' => $data['width'],
                        'width_p' => $data['width_p'],
                        'unit_price_without_tax' => $data['unit_price_without_tax_'],
                        'unit_price_usd' => $data['unit_price_usd_'],
                        'total_price_without_tax' => $data['total_price_without_tax_'],
                        'total_price_usd' => $data['total_price_usd_'],
                        'use_name' => $data['use_name_'],
                        
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
}
