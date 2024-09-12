<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Lcl extends Model
{
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

    public static function getEditViewLcl($teknisi_cookie, $id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/lcl_editview/' . $id, [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            // $Data = json_decode($data, true);
            // dd($Data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
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
            $response_barang = $client->request('GET','https://maxipro.id/TeknisiAPI/lcl_add?id='.$id,[
                'headers' => $headers,
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
