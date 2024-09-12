<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class Penerimaan extends Model
{
    public static function getPenerimaanDokumen($teknisi_cookie, $tgl_awal, $tgl_akhir, $checkdatevalue, $kode)
    {
        try {
            // Create a new GuzzleHTTP client with verify option set to false
            $client = new Client([
                'verify' => false
            ]);

            $headers = [
                'Cookie' => $teknisi_cookie
            ];
            $url = 'https://maxipro.id/TeknisiAPI/penerimaan_dokumen';
            $queryParams = [
                'checkdatevalue' => $checkdatevalue,
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'kode' => $kode,
            ];
            $url .= '?' . http_build_query($queryParams);

            // Make a GET request to the specified URL with headers
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);
            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error fetching dokumen: ' . $e->getMessage());
            throw $e;  // Rethrow the exception after logging it
        }
    }
}
