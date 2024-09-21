<?php

// File: app/Models/Voucher.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Voucher extends Model
{
    public function fetchVoucherData($id)
    {
        try {
            $client = new Client([
                'verify' => false
            ]);

            $headers = [
                //Cookie API Local
                'Cookie' => 'ci_session=le363ovbs3kpj51eh07fdh04j162eh66',
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/voucher_formuliredit?id=' . $id, [
                'headers' => $headers,
                'query' => [
                    'id' => $id,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
            throw new \Exception($e->getMessage(), 1);
        }
    }
}
