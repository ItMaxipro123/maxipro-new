<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //


    public function login()
    {
        return view('users.login');
    }
    public function proses_login(Request $request)
    {
        $credential = $request->only('username');
        $pasword = $request->only('password');
        // dd($credential['password']);
        // $client = new Client();
        $client = new Client([
            'verify' => false, // Disables SSL certificate verification
        ]);
        try {
            $response = $client->post('https://maxipro.id/TeknisiAPI', [
                'form_params' => [
                    'opsi' => 'teknisimobile',
                    'username' => $credential['username'],
                    'password' => $pasword['password'],
                ],
                'headers' => [
                    'username' => $credential['username'],
                    'password' => $pasword['password'],
                    //Cookie API Hosting 
                    // 'Cookie' => 'ci_session=djcohs8r844il4ccsvtl8qbqnkpg2ai5'

                    //Cookie API Local
                    'Cookie' => 'ci_session=mmef72tdgsgv79a57lt1qh8acal0t3kc'
                ]
            ]);

            $data = $response->getBody()->getContents();
                
            Session::put('teknisi_id', $data);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
