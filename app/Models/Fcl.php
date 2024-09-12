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

    public static function getEditOrderPembelian($teknisi_cookie, $id)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/order_pembelian_viewedit/' . $id, [
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
