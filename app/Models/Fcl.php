<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Fcl extends Model
{
    public static function getFclPembelian($teknisi_cookie)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/fcl2', [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function createdFclPembelian($teknisi_cookie,$form){
        
        $formParams = [
            'modeadmin' => $form['modeadmin'],
            'invoicenumber' => $form['invoice_no'] ?? '',
            'contractnumber' => $form['contract_no'] ?? '',
            'packingnumber' => $form['packing_no'] ?? '',
            'database' => $form['database'],
            'tgl_transaksi' => $form['tgl_request'],
            'supplier' => $form['supplier'],
            'address' => $form['address_company'],
            'city' => $form['city'],
            'telephone' => $form['telp'],
            'supplierbank' => $form['banksupplier_id'] ?? 0,
            'incoterms'=> $form['incoterms_id'] ?? '',
            'location' => $form['location_id'] ?? '',
            'currency' => $form['currency_id'] ?? 0,
            'freight_cost' => $form['total_freight_cost'] ?? 0,
            'insurance' => $form['total_insurance'] ?? 0,
            'bank_name' => $form['bank_name_id'] ?? '',
            'bank_address' => $form['bank_address'],
            'swift_code' => $form['swift_code'],
            'account_no' => $form['account_no'],
            'beneficiary_name' => $form['beneficiary_name'],
            'beneficiary_address' => $form['beneficiary_address'],
            'valuerate' => $form['valuerate'],
            'valuestatusrate' => $form['valuestatusrate'],
            
            
        ];
        $array=[];
        $key_index=0;
        $key_index_array=[];
        foreach ($form['unit_price_usd']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "unitusd[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['tot_price_usd']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "totalusd[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['id_commercial']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "idpenjualanfromchina[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['id_commercial_detail']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "idpenjualanfromchinadetail[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        $mergedArray = array_merge($formParams, $array);
       
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie,
            ];
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/fcl_create', [
                'form_params' => $mergedArray,
                'headers' => $headers,

            ]);
            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e){
            return ['error' => $e->getMessage()];
        }
    }

    public static function updatedFclPembelian($teknisi_cookie,$form){
        
        $formParams = [
            'id_fcl' => $form['id_fclcontainer'],
            'modeadmin' => $form['modeadmin'],
            'invoicenumber' => $form['invoice_no'] ?? '',
            'contractnumber' => $form['contract_no'] ?? '',
            'packingnumber' => $form['packing_no'] ?? '',
            'database' => $form['database'],
            'tgl_transaksi' => $form['tgl_request'],
            'supplier' => $form['supplier'],
            'address' => $form['address_company'],
            'city' => $form['city'],
            'telephone' => $form['telp'],
            'supplierbank' => $form['banksupplier_id'] ?? 0,
            'incoterms'=> $form['incoterms_id'] ?? '',
            'location' => $form['location_id'] ?? '',
            'currency' => $form['currency_id'] ?? 0,
            'freight_cost' => $form['total_freight_cost'] ?? 0,
            'insurance' => $form['total_insurance'] ?? 0,
            'bank_name' => $form['bank_name_id'] ?? '',
            'bank_address' => $form['bank_address'],
            'swift_code' => $form['swift_code'],
            'account_no' => $form['account_no'],
            'beneficiary_name' => $form['beneficiary_name'],
            'beneficiary_address' => $form['beneficiary_address'],
            'valuerate' => $form['valuerate'],
            'valuestatusrate' => $form['valuestatusrate'],
            
            
        ];
        $array=[];
        $key_index=0;
        $key_index_array=[];
        foreach ($form['unit_price_usd']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "unitusd[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['tot_price_usd']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "totalusd[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['id_penjualanfromchina']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "idpenjualanfromchina[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        foreach ($form['id_penjualanfromchinadetail']  as $key => $value) {
            $lastChar = substr($key, -1);
            $newKey = "idpenjualanfromchinadetail[{$lastChar}]";
            $array[$newKey] = $value ?? '';
            $key_index++;
            $key_index_array[] = $newKey;
        }
        $mergedArray = array_merge($formParams, $array);
        // dd($mergedArray);
        try{
            $client = new Client(['verify' => false]);
            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/fcl_edit', [
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
    public static function getimportBarang($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/fcl_importbarang', [
                'headers' => $headers,
                'form_params' =>[
                    'id_commercial'=>$id
                ],
            ]);
            
            $data = $response->getBody()->getContents();
            // dd('data model',$data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    
    public static function getSupplier($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/fcl2', [
                'headers' => $headers,
                
            ]);
            
            $data = $response->getBody()->getContents();
            $decodedData = json_decode($data, true);
            // dd($decodedData['msg']['bank_supplier']);
            
            $filteredDataSupplier = array_filter($decodedData['msg']['list_supplier'], function($item) use ($id) {
                return $item['id'] == $id; // Pastikan 'id' sesuai dengan key pada data
            });
            $filteredDataBankSupplier = array_filter($decodedData['msg']['bank_supplier'], function($item) use ($id) {
                return $item['id_supplier'] == $id; // Pastikan 'id' sesuai dengan key pada data
            });
            
            // return $filteredDataSupplier;
            return [
                'filtered_supplier' => $filteredDataSupplier,
                'filtered_bank_supplier' => $filteredDataBankSupplier
            ];
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function getBankSupplier($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/fcl2', [
                'headers' => $headers,
                
            ]);
            
            $data = $response->getBody()->getContents();
            $decodedData = json_decode($data, true);

            $filteredDataBankSupplier = array_filter($decodedData['msg']['bank_supplier'], function($item) use ($id) {
                return $item['id'] == $id; // Pastikan 'id' sesuai dengan key pada data
            });
            
            return [
              
                'filtered_bank_supplier' => $filteredDataBankSupplier
            ];
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getFclPembelianFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue,$nama_perusahaan)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            // dd($status);

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/fcl2', [
                'headers' => $headers,
                'query' => [
                    'process_check' => $status,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'checkdatevalue' => $checkdatevalue,
                    'name' =>$nama_perusahaan

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

    public static function editFclPembelian($teknisi_cookie, $invoice)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/fcl_editview/' . $invoice, [
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
    public static function detailFclPembelian($teknisi_cookie, $invoice)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/fcl_detail/' . $invoice, [
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
    public static function deletedFclPembelian($teknisi_cookie, $invoice)
    {   
        // dd($invoice);
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/fcl_hapus/' . $invoice, [
                'headers' => $headers,

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
}
