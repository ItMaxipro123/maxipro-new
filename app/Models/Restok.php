<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Restok extends Model
{
        public static function getRestok($teknisi_cookie)
        {
                try {
                    $client = new Client(['verify' => false]);

                    $headers = [
                        'Cookie' => $teknisi_cookie
                    ];

                    $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/restok', [
                        'headers' => $headers,
                        'query' => [
                            'status' => ['requested'],
                        ],
                    ]);

                    $data = $response->getBody()->getContents();
                    return json_decode($data, true);
                }catch (\Exception $e) {
                            // Handle exception
                    return ['error' => $e->getMessage()];
                }
        }

        public static function getRestokFilter($teknisi_cookie,$status,$tgl_awal,$tgl_akhir,$checkdatevalue,$id_kode_barang,$nama_barang,$id_jenis)
        {
                   try {
                        $client = new Client(['verify' => false]);

                        $headers = [
                            'Cookie' => $teknisi_cookie
                        ];


                        $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/restok', [
                            'headers' => $headers,
                            'query' => [
                                'status' => [$status],
                                'tgl_awal' => $tgl_awal,
                                'tgl_akhir' => $tgl_akhir,
                                'checkdatevalue' =>$checkdatevalue,
                                'kode_barang' =>$id_kode_barang,
                                'nama_barang' =>$nama_barang,
                                'jenis' =>$id_jenis

                            ],
                        ]);

                        $data = $response->getBody()->getContents();
                        $Data = json_decode($data, true);
                        // dd($Data);
                        return json_decode($data, true);
                     }catch (\Exception $e) {
                            // Handle exception
                         return ['error' => $e->getMessage()];
                     }
        }

}
