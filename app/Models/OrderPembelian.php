<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class OrderPembelian extends Model
{
    public static function getOrderPembelian($teknisi_cookie)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_pembelian', [
                'headers' => $headers,
              
            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }

    public static function getOrderPembeliankFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue, $id_kode_barang, $nama_barang, $id_jenis)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            // dd($status);

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_pembelian', [
                'headers' => $headers,
                'query' => [
                    'requested_check' => $status,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'checkdatevalue' => $checkdatevalue,
                    'kode_barang' => $id_kode_barang,
                    'nama_barang' => $nama_barang,
                    'jenis' => $id_jenis

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

    public static function getEditOrderPembelian($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_pembelian_viewedit/'.$id, [
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

    public static function getRejectOrderPembelian($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_pembelian_rejected/'.$id, [
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

     public static function getHapusOrderPembelian($teknisi_cookie,$id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('delete', 'https://maxipro.id/TeknisiAPI/order_pembelian_hapus/'.$id, [
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

    public static function getStokOrderPembelian($teknisi_cookie, $data_arr){
        
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/order_pembelian_detailstok', [
                'headers' => $headers,
                'form_params' => [
                    'item_code' => $data_arr['new_code'],
                    'name' =>$data_arr['name'],
                ],
              
            ]);

            $data = $response->getBody()->getContents();
            // dd($data);
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
    public static function getStokOrderPembelianFilter($teknisi_cookie, $data_arr){
        // dd('data',$data_arr);
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/order_pembelian_detailstok', [
                'headers' => $headers,
                'form_params' => [
                    'item_code' => $data_arr['new_code'],
                    'name' =>$data_arr['name'],
                    'tahun' =>$data_arr['tahun'],
                    'tahun_akhir' =>$data_arr['tahun_akhir'],
                    'bulan' =>$data_arr['bulan'],
                    'bulan_akhir'=>$data_arr['bulan_akhir']
                ],
              
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
