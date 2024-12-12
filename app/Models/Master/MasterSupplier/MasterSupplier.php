<?php

namespace App\Models\Master\MasterSupplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class MasterSupplier extends Model
{
    public static function getSupplier($teknisi_cookie,$nama_supplier)
    {
        try {
            $client = new Client(['verify' => false]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/master_supplier_datasupplier?name='.$nama_supplier[0], [
                'headers' => $headers,

            ]);

            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Handle exception
            return ['error' => $e->getMessage()];
        }
    }
}
