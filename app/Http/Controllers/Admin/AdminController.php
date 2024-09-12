<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use PDF;

class AdminController extends Controller
{
    //function untuk view edit kas surabaya
    public function kasedit(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');

        if (isset($responseData)) {
            $username = $responseData;

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_vieweditkassurabaya?id=' . $id;


            $response = Http::withHeaders([
                'Cookie' => 'ci_session=gnkf4jtt0hbnfeqgubchaoivmth322h5'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true); //untuk mendecode json dari response

            return view('admin.kas.edit_kassurabaya', compact('username', 'data'));
        }
    }

    //function untuk view detail kas surabaya
    public function kasdetail(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');

        if (isset($responseData)) {
            $username = $responseData;

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_vieweditkassurabaya?id=' . $id;


            $response = Http::withHeaders([
                'Cookie' => 'ci_session=gnkf4jtt0hbnfeqgubchaoivmth322h5'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.detail_kassurabaya', compact('username', 'data'));
        }
    }

    public function kasedit_kasjakarta(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');

        if (isset($responseData)) {
            $username = $responseData;

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_vieweditkassurabaya?id=' . $id;


            $response = Http::withHeaders([
                'Cookie' => 'ci_session=gnkf4jtt0hbnfeqgubchaoivmth322h5'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.edit_kassurabaya', compact('username', 'data'));
        }
    }
    public function kasedit_banksurabaya(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');

        if (isset($responseData)) {
            $username = $responseData;

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_vieweditkassurabaya?id=' . $id;


            $response = Http::withHeaders([
                'Cookie' => 'ci_session=gnkf4jtt0hbnfeqgubchaoivmth322h5'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.edit_kassurabaya', compact('username', 'data'));
        }
    }
    public function kasedit_bankjakarta(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');

        if (isset($responseData)) {
            $username = $responseData;

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_vieweditkassurabaya?id=' . $id;


            $response = Http::withHeaders([
                'Cookie' => 'ci_session=gnkf4jtt0hbnfeqgubchaoivmth322h5'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.edit_kassurabaya', compact('username', 'data'));
        }
    }
    public function kasedit_pengeluaranpt(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');

        if (isset($responseData)) {
            $username = $responseData;

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_vieweditkassurabaya?id=' . $id;


            $response = Http::withHeaders([
                'Cookie' => 'ci_session=gnkf4jtt0hbnfeqgubchaoivmth322h5'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.edit_kassurabaya', compact('username', 'data'));
        }
    }


    public function kasbanksurabaya(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kasbanksurabaya';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=s2cts1atk3ioh5so2d9p7p0nfdb270jd'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kasbanksurabaya', compact('username', 'data'));
        }
    }

    public function kasbanksurabaya_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kasbanksurabaya';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=s2cts1atk3ioh5so2d9p7p0nfdb270jd'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kasbanksurabaya_filter', compact('username', 'data'));
        }
    }


    public function kasbankjakarta(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kasbankjakarta';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=2oltpp59pf2ipm1sf8kobq7rvcr38ld3'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kasbankjakarta', compact('username', 'data'));
        }
    }

    public function kasbankjakarta_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kasbankjakarta';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=2oltpp59pf2ipm1sf8kobq7rvcr38ld3'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kasbankjakarta_filter', compact('username', 'data'));
        }
    }

    public function kaspengeluaranpt(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=2oltpp59pf2ipm1sf8kobq7rvcr38ld3'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kaspengeluaranpt', compact('username', 'data'));
        }
    }

    public function kaspengeluaranpt_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=2oltpp59pf2ipm1sf8kobq7rvcr38ld3'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kaspengeluaranpt_filter', compact('username', 'data'));
        }
    }

    public function kasjakarta(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kasjakarta';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=kbqqbik0feum230b1ej1juk2gkh6tpqp'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kasjakarta', compact('username', 'data'));
        }
    }

    public function kasjakarta_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kasjakarta';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=kbqqbik0feum230b1ej1juk2gkh6tpqp'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kasjakarta_filter', compact('username', 'data'));
        }
    }

    public function kassurabaya(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kassurabaya';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=nlcgba02bs4ocs17ib44rgqjhjkapcpu'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kassurabaya', compact('username', 'data'));
        }
    }

    public function kassurabaya_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $checkdatevalue = $request->input('checkdatevalue');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');

            // Bangun URL dengan parameter query
            $url = 'https://maxipro.id/TeknisiAPI/laporankas_kassurabaya';
            if ($checkdatevalue) {
                $url .= '?checkdatevalue=' . urlencode($checkdatevalue);
            }
            if ($tgl_awal) {
                // dd($tgl_awal);
                $url .= ($checkdatevalue ? '&' : '?') . 'tgl_awal=' . urlencode($tgl_awal);
            }
            if ($tgl_akhir) {
                $url .= ($tgl_awal || $checkdatevalue ? '&' : '?') . 'tgl_akhir=' . urlencode($tgl_akhir);
            }

            $response = Http::withHeaders([
                'Cookie' => 'ci_session=nlcgba02bs4ocs17ib44rgqjhjkapcpu'
            ])->withoutVerifying()->get($url);

            $data = json_decode($response->body(), true);

            return view('admin.kas.kassurabayafilter', compact('username', 'data'));
        }
    }

    public function kassurabaya_edit(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        $id = $request->input('id');

        $tgl_transaksi = $request->input('tgl_transaksi');

        $name = $request->input('name');
        $harga = $request->input('harga');

        $pic = $request->input('pic');
        $money_from = $request->input('money_from');
        $keterangan = $request->input('keterangan');
        $invoice = $request->input('invoice');
        $coa = $request->input('name_coa');
        $ppn = $request->input('ppn');
        // dd($tgl_transaksi);
        // dd($id,$tgl_transaksi, $name, $harga, $pic, $money_from, $keterangan, $invoice, $coa,$ppn);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            // Create a Guzzle Client object with SSL verification disabled
            $client = new Client(['verify' => false]);

            try {
                // Sending a POST request to the API with kode as a form parameter
                $response = $client->post('https://maxipro.id/TeknisiAPI/lapoarankas_editkassurabaya', [
                    'form_params' => [
                        'id' => $id,
                        'tgl_transaksi' => $tgl_transaksi,
                        'name' => $name,
                        'harga' => $harga,
                        'pic' => $pic,
                        'money_from' => $money_from,
                        'keterangan' => $keterangan,
                        'invoice' => $invoice,
                        'coa' => $coa,
                        'ppn' => $ppn,
                        'teknisi_id' => $teknisi_id
                    ],
                    'headers' => [
                        'Cookie' => 'ci_session=gfe623f8p2e6i4lf745sd5fagppnenl0'
                    ]
                ]);

                // Getting the content of the response
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // dd($Data);
                // Return JSON response with success message
                return redirect()->route('admin.kassurabaya');
            } catch (\Exception $e) {
                // Handling errors if they occur
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function tambahpost_kas(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);



        $tgl_transaksi = $request->input('tgl_transaksi');

        $name = $request->input('name');
        $harga = $request->input('harga');

        $pic = $request->input('pic');
        $money_from = $request->input('money_from');
        $keterangan = $request->input('keterangan');

        $ppn = $request->input('ppn');
        $image = $request->input('image');
        $image_file = $request->file('image');
        $image_basename = basename($image);
        // dd($image_basename);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            // Create a Guzzle Client object with SSL verification disabled
            $client = new Client(['verify' => false]);

            try {
                // Sending a POST request to the API with kode as a form parameter
                $response = $client->post('https://maxipro.id/TeknisiAPI/laporankas_tambahkas', [
                    'form_params' => [

                        'tgl_transaksi' => $tgl_transaksi,
                        'name' => $name,
                        'harga' => $harga,
                        'pic' => $pic,
                        'money_from' => $money_from,
                        'keterangan' => $keterangan,


                        'ppn' => $ppn,
                        'image' => $image,
                        'teknisi_id' => $teknisi_id
                    ],
                    'headers' => [
                        'Cookie' => 'ci_session=p8q5miq9romto9cdv73sg6qo46vicg7i'
                    ]
                ]);

                // Getting the content of the response
                $body = $response->getBody()->getContents();
                // dd($body);
                $Data = json_decode($body, true);
                dd($Data);
                // Return JSON response with success message
                // return redirect()->route('admin.kassurabaya');
            } catch (\Exception $e) {
                // Handling errors if they occur
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }


    public function tambah_kas()
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            return view('admin.kas.tambah_kas', compact('username'));
        }
    }
    public function tambah_mutasi()
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            return view('admin.kas.tambah_kas', compact('username'));
        }
    }



    public function datavoucher()
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=dtejsl3le6rg6jfhser5a0npp4hf17ao'
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/voucher', [
                    'headers' => $headers,

                    'query' => [
                        'teknisi_id' => $teknisi_id,
                    ],

                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.voucher.voucher', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function tambah_viewdatavoucher()
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=q01h9i3obcc8pamb32bqjn3ng1s6srrl'
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/voucher_viewtambah', [
                    'headers' => $headers,

                    'query' => [
                        'teknisi_id' => $teknisi_id,
                    ],

                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.voucher.tambah_voucher', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function edit_viewvoucher(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');
        // dd($id);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
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
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);

                return view('admin.voucher.edit_voucher', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function tambah_voucher(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $kode = $request->input('kode');
        $status = $request->input('status');
        // dd($status);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            // Create a Guzzle Client object with SSL verification disabled
            $client = new Client(['verify' => false]);

            try {
                // Sending a POST request to the API with kode as a form parameter
                $response = $client->post('https://maxipro.id/TeknisiAPI/voucher_tambah', [
                    'form_params' => [
                        'kode' => $kode,
                        'status' => $status
                    ],
                    'headers' => [
                        'Cookie' => 'ci_session=7lkjd8oorgkbalj8oei4tmamgcodqb8l'
                    ]
                ]);
                // dd($response);

                // Getting the content of the response
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // echo $body . $Data;
                // Returning the API response
                // return response()->json($Data, 200);
                return redirect()->route('admin.voucher');
            } catch (\Exception $e) {
                // Handling errors if they occur
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function edit_voucher(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        $id = $request->input('id');
        $kode = $request->input('kode');
        $status = $request->input('status');
        // dd($id, $kode, $status);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            // Create a Guzzle Client object with SSL verification disabled
            $client = new Client(['verify' => false]);

            try {
                // Sending a POST request to the API with kode as a form parameter
                $response = $client->post('https://maxipro.id/TeknisiAPI/voucher_edit', [
                    'form_params' => [
                        'id' => $id,
                        'kode' => $kode,
                        'status' => $status,
                        'teknisi_id' => $teknisi_id
                    ],
                    'headers' => [
                        'Cookie' => 'ci_session=le363ovbs3kpj51eh07fdh04j162eh66'
                    ]
                ]);
                // dd($response);

                // Getting the content of the response
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // echo $body . $Data;
                // Returning the API response
                // return response()->json($Data, 200);
                return redirect()->route('admin.voucher');
            } catch (\Exception $e) {
                // Handling errors if they occur
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function hapus_datavoucher(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $voucherId = $request->input('voucherId');
        // dd($voucherId);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            // Membuat objek Guzzle Client dengan SSL verify false
            $client = new Client(['verify' => false]);

            try {
                // Mengirim request DELETE ke API dengan voucherId sebagai query parameter
                $response = $client->delete('https://maxipro.id/TeknisiAPI/voucher_hapus?id=' . $voucherId, [

                    'form_params' => [
                        'id' => $voucherId,

                    ],
                    'headers' => [
                        'Cookie' => 'ci_session=7lkjd8oorgkbalj8oei4tmamgcodqb8l'
                    ]
                ]);

                // Mendapatkan isi dari respons
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);


                // Mengembalikan respons dari API
                return response()->json($Data, 200);
            } catch (\Exception $e) {
                // Menangani kesalahan jika terjadi
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function edit_voucher_customer(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $statusPakai = $request->input('statusPakai');
        $id = $request->input('id');
        // dd($statusPakai,$id);
        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);

        try {
            $response = $client->post('https://maxipro.id/TeknisiAPI/voucher_customer_pakai', [
                'form_params' => [
                    'id' => $id,
                    'statuspakai' =>   $statusPakai,
                    'teknisi_id' => $teknisi_id
                ],
                'headers' => [
                    'Cookie' => 'ci_session=m6b451junhs565vsdodlg6ove6smfp35'
                ]
            ]);

            $body = $response->getBody()->getContents();
            echo $body;
        } catch (GuzzleException $e) {
            // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
            echo "Error: " . $e->getMessage();
        }
    }

    public function voucher_customer()
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=br8f82u7b4kqrnhmes70ndmrqpnuc0av'
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/voucher_customer', [
                    'headers' => $headers,

                    'query' => [
                        'teknisi_id' => $teknisi_id,
                    ],

                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.voucher.voucher_customer', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }


    public function hapus_voucher_customer(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $voucherId = $request->input('voucherId');

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            // Membuat objek Guzzle Client dengan SSL verify false
            $client = new Client(['verify' => false]);

            try {
                // Mengirim request DELETE ke API dengan voucherId sebagai query parameter
                $response = $client->delete('https://maxipro.id/TeknisiAPI/voucher_customer_hapus?id=' . $voucherId, [

                    'form_params' => [
                        'id' => $voucherId,

                    ],
                    'headers' => [
                        'Cookie' => 'ci_session=8i34b9f0nn7p166dfq54qqj4m0s81g2j'
                    ]
                ]);

                // Mendapatkan isi dari respons
                $body = $response->getBody()->getContents();



                $Data = json_decode($body, true);

                // Mengembalikan respons dari API
                return response()->json($Data, 200);
            } catch (\Exception $e) {
                // Menangani kesalahan jika terjadi
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            return response()->json('Anda belum loin', 401);
        }
    }

    public function dashboard(Request $request)
    {
        // Mengambil data dari sesi
        $data = Session::get('teknisi_id');


        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                // Define headers for the request
                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie
                ];

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/dashboard', [
                    'headers' => $headers,

                    'query' => [
                        'teknisi_id' => $teknisi_id,
                    ],

                ]);
                // dd($response);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // var_dump("Grand Sum Transaction: " .  $Data['salebygrouptag']['grandsumtransaction']);
                $tglawal = $Data['tgl_awal'];
                $start_date = '2019';
                $end_date = $Data['tgl_akhir'] - $start_date;
                $tahun_start = [];
                for ($start = $start_date; $start <= ($start_date + $end_date); $start++) {
                    array_push($tahun_start, $start); // Output untuk debugging
                }



                return view('admin.dashboard', compact('username', 'Data', 'tahun_start'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {

            return redirect()->route('login');
        }
    }

    public function dashboard_filter(Request $request)
    {
        // Mengambil data dari sesi
        $data = Session::get('teknisi_id');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                // Define headers for the request
                $headers = [
                    //Cookie API dari server
                    'Cookie' => 'ci_session=7c1c343344f6a39c4cf58b25375397ea8630385a'
                ];

                // Construct the URL with query parameters
                $url = 'https://maxipro.id/TeknisiAPI/dashboard';
                $queryParams = [
                    'tahun' => $tahun,
                    'bulan' => $bulan,
                    'teknisi_id' => $teknisi_id
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);

                $tglawal = $Data['tgl_awal'];
                $start_date = '2019';
                $end_date = $Data['tgl_akhir'] - $start_date;
                $tahun_start = [];
                for ($start = $start_date; $start <= ($start_date + $end_date); $start++) {
                    array_push($tahun_start, $start); // Output untuk debugging
                }

                return view('admin.dashboard', compact('username', 'Data', 'tahun_start'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function pembeliaan_restok()
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $restokModel = new \App\Models\Restok();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $restokModel->getRestok($teknisi_cookie);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.restok', compact('username', 'data', 'Data'));
        }
    }

    public function pembeliaan_restok_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $status = $request->input('filterValue');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $id_kode_barang = $request->input('id_kode_barang');
        $nama_barang = $request->input('id_nama_barang');
        $id_jenis = $request->input('id_jenis');
        $checkdatevalue = $request->input('checkdatevalue');
        $restokModel = new \App\Models\Restok();

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];

            $Data = $restokModel->getRestokFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue, $id_kode_barang, $nama_barang, $id_jenis);

            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }

            return view('admin.pembelian.restok_filter', compact('username', 'data', 'Data','id_jenis'));
        }
    }

    public function pembelian_restok_getstok_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id_product');
        // dd($id);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            // Membuat objek Guzzle Client dengan SSL verify false
            $client = new Client(['verify' => false]);

            try {
                // Mengirim request DELETE ke API dengan id sebagai query parameter
                $response = $client->get('https://maxipro.id/TeknisiAPI/restok_viewstokproduct/' . $id, [


                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ]
                ]);

                // Mendapatkan isi dari respons
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);

                // dd($Data);
                // Mengembalikan respons dari API
                return response()->json($Data, 200);
            } catch (\Exception $e) {
                // Menangani kesalahan jika terjadi
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function pembelian_restok_tambah_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $teknisi_code_name = $responseData['data']['teknisi']['code_name'];
        $tgl_request = $request->input('tgl_request');
        $product = $request->input('product');
        $laststok = $request->input('laststok');
        $jml_permintaan = $request->input('jml_permintaan');
        $keterangan = $request->input('keterangan');


        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);
        if (isset($responseData)) {
            $teknisi_cookie = $responseData['cookie'];
            try {

                $response = $client->post('https://maxipro.id/TeknisiAPI/restok_tambah', [
                    'form_params' => [

                        'tgl_request' => $tgl_request,
                        'product' => $product,
                        'laststok' => $laststok,
                        'jml_permintaan' => $jml_permintaan,
                        'keterangan' => $keterangan,
                        'id_teknisi' => $teknisi_id,
                    ],
                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ],

                ]);

                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // dd($Data);
            } catch (GuzzleException $e) {
                // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function pembelian_editviewrestok_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id_product');
        // dd($id);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            // Membuat objek Guzzle Client dengan SSL verify false
            $client = new Client(['verify' => false]);

            try {
                // Mengirim request DELETE ke API dengan id sebagai query parameter
                $response = $client->get('https://maxipro.id/TeknisiAPI/restok_viewedit/' . $id, [


                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ]
                ]);

                // Mendapatkan isi dari respons
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // dd($Data);
                return view('admin.pembelian.edit_restok', compact('username', 'data', 'Data'));

                // Mengembalikan respons dari API
                return response()->json($Data, 200);
            } catch (\Exception $e) {
                // Menangani kesalahan jika terjadi
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }


    public function pembelian_restok_edit_filter(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $teknisi_code_name = $responseData['data']['teknisi']['code_name'];
        $tgl_request = $request->input('tgl_request');
        $product = $request->input('product');
        $laststok = $request->input('laststok');
        $jml_permintaan = $request->input('jml_permintaan');
        $keterangan = $request->input('keterangan');
        $id = $request->input('id');

        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);
        if (isset($responseData)) {
            $teknisi_cookie = $responseData['cookie'];
            try {

                $response = $client->post('https://maxipro.id/TeknisiAPI/restok_edit', [
                    'form_params' => [

                        'tgl_request' => $tgl_request,
                        'product' => $product,
                        'laststok' => $laststok,
                        'jml_permintaan' => $jml_permintaan,
                        'keterangan' => $keterangan,
                        'id_teknisi' => $teknisi_id,
                        'id' => $id
                    ],
                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ],

                ]);

                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
            } catch (GuzzleException $e) {
                // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function pembelian_restok_hapus_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $restokid = $request->input('id');
        // dd($restokid);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            // Membuat objek Guzzle Client dengan SSL verify false
            $client = new Client(['verify' => false]);

            try {
                // Mengirim request DELETE ke API dengan restokid sebagai query parameter
                $response = $client->delete('https://maxipro.id/TeknisiAPI/restok_hapus/' . $restokid, [


                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ]
                ]);

                // Mendapatkan isi dari respons
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);


                // Mengembalikan respons dari API
                return response()->json($Data, 200);
            } catch (\Exception $e) {
                // Menangani kesalahan jika terjadi
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function pembelian_order_pembelian(Request $request)
    {
        
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getOrderPembelian($teknisi_cookie);
         
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.order_pembelian', compact('username', 'data', 'Data'));
        }
    }

    public function pembelian_orderpembelian_stokproduct_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $name = $request->input('name_product');
        $code = $request->input('new_code');
        $bulan = $request->input('bulanSelect');
        $bulanAkhir = $request->input('bulanAkhirSelect');
        $tahunAkhir = $request->input('tahunAkhirSelect');
        $tahun = $request->input('tahunSelect');
        $data_arr = array(
            'name' => $name,
            'new_code' => $code,
            'bulan' => $bulan,
            'bulan_akhir' =>$bulanAkhir,
            'tahun_akhir' =>$tahunAkhir,
            'tahun' => $tahun
        );
        // dd($data_arr);
        
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if(isset($responseData)){
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];

            $Data = $orderPembelianModel->getStokOrderPembelianFilter($teknisi_cookie,$data_arr);
            // dd($Data);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return response()->json($Data);
            
        }
    }
    public function pembelian_orderpembelian_stokproduct(Request $request)
    {
        $data = Session::get('teknisi_id');
        $name = $request->input('name_product');
        $code = $request->input('new_code');
   
        $data_arr = array(
            'name' => $name,
            'new_code' => $code
        );
        
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if(isset($responseData)){
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];

            $Data = $orderPembelianModel->getStokOrderPembelian($teknisi_cookie,$data_arr);
            // dd($Data);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return response()->json($Data);
            
        }
    }

    public function pembelian_order_pembelian_filter(Request $request)
    {

        $data = Session::get('teknisi_id');
        $status = $request->input('filterValue');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $id_kode_barang = $request->input('id_kode_barang');
        $nama_barang = $request->input('id_nama_barang');
        $id_jenis = $request->input('id_jenis');
        // dd($id_jenis);
        $checkdatevalue = $request->input('checkdatevalue');
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getOrderPembeliankFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue, $id_kode_barang, $nama_barang, $id_jenis);
            
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.order_pembelian_filter', compact('username', 'data', 'Data','id_jenis'));
        }
    }


    public function pembelian_editview_order_pembelian(Request $request)
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id_product');
        // dd($id);
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getEditOrderPembelian($teknisi_cookie, $id);
            // dd($Data);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.edit_pembelian', compact('username', 'data', 'Data'));
        }
    }

    public function pembelian_edit_order_pembelian(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $supplier = $request->input('supplier');
        $jml_permintaan = $request->input('jml_permintaan');
        $keterangan = $request->input('keterangan');
        $id = $request->input('id');

        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);
        if (isset($responseData)) {
            $teknisi_cookie = $responseData['cookie'];
            try {

                $response = $client->post('https://maxipro.id/TeknisiAPI/order_pembelian_edit', [
                    'form_params' => [


                        'jml_permintaan' => $jml_permintaan,
                        'keterangan' => $keterangan,

                        'id' => $id,
                        'supplier' => $supplier
                    ],
                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ],

                ]);

                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
            } catch (GuzzleException $e) {
                // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function pembelian_reject_order_pembelian(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $orderPembelianId = $request->input('id');
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getRejectOrderPembelian($teknisi_cookie, $orderPembelianId);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
        }
    }

    public function pembelian_hapus_order_pembelian(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $orderPembelianId = $request->input('id');
        $orderPembelianModel = new \App\Models\OrderPembelian();
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getHapusOrderPembelian($teknisi_cookie, $orderPembelianId);

            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
        }
    }

    public function pembelian_select_supplier_order_pembelian(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $supplier = $request->input('supplier');
        $id = $request->input('id');
        // dd($id,$supplier);

        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);
        if (isset($responseData)) {
            $teknisi_cookie = $responseData['cookie'];
            try {

                $response = $client->post('https://maxipro.id/TeknisiAPI/order_pembelian_select_supplier', [
                    'form_params' => [

                        'id' => $id,
                        'kode' => $supplier
                    ],
                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ],

                ]);

                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // dd($Data);
            } catch (GuzzleException $e) {
                // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function pembelian_comercial_invoice(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $comercialInvoiceModel = new \App\Models\ComercialInvoice();

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];
            $Data = $comercialInvoiceModel->getComercialInvoice($teknisi_cookie);
            
            if (isset($Data['error'])) {
                return response()->view('errors.403', ['message' => $Data['error']], 403);
            }

            return view('admin.pembelian.comercial_invoice_refactor', compact('username', 'data', 'Data'));
        }

        // Handle case where $responseData is not set
        return response()->view('errors.403', ['message' => 'Unauthorized access.'], 403);
    }
    public function pembelian_add_comercial_invoice(Request $request)
    {
        
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $comercialInvoiceModel = new \App\Models\ComercialInvoice();

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];
            $Data = $comercialInvoiceModel->getComercialInvoice($teknisi_cookie);
            $id = $request->input('id');
            if (isset($Data['error'])) {
                return response()->view('errors.403', ['message' => $Data['error']], 403);
            }

            return view('admin.pembelian.add_comercial_invoice', compact('username', 'data', 'Data','id'));
        }

        // Handle case where $responseData is not set
        return response()->view('errors.403', ['message' => 'Unauthorized access.'], 403);
    }

    public function pembelian_comercial_invoice_filter(Request $request)
    {

        $data = Session::get('teknisi_id');
        $status = $request->input('filterValue');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        // $id_no_invoice = $request->input('invoice_id');
        // dd($id_no_invoice);
        $nama_perusahaan = $request->input('id_nama_perusahaan');
        
        $checkdatevalue = $request->input('checkdatevalue');
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\ComercialInvoice();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getComercialInvoiceFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue, $nama_perusahaan);
            // dd($Data);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.comercial_invoice_filter_refactor', compact('username', 'data', 'Data'));
        }
    }

    public function pembelian_editview_comercial_invoice(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id_product');
       
        $restok 	 	= $request->input('idrestok');
    
       
        $orderPembelianModel = new \App\Models\ComercialInvoice();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];

            if(!empty($restok)){
                // dd('restok',$restok);
                $DataImport = $orderPembelianModel->getImportBarangComercialInvoice($teknisi_cookie, $restok);
              
                $Data = $orderPembelianModel->getEditComercialInvoice($teknisi_cookie, $id);
                // dd($Data);
                if (isset($Data['error']) && isset($DataImport['error']) ) {
                    
                    $response = isset($Data['error']) ? $Data : $DataImport;
                    return response()->json($response, 500);
                }
                return view('admin.pembelian.edit_comercialinvoice', compact('username', 'DataImport', 'Data'));
            }
            else{

                $Data = $orderPembelianModel->getEditComercialInvoice($teknisi_cookie, $id);
                
                if (isset($Data['error'])) {
                    return response()->json($Data, 500);
                }
                return view('admin.pembelian.edit_comercialinvoice', compact('username', 'data', 'Data'));
            }
        }
    }

    public function pembelian_importbarang_comercial_invoice(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $valuerestok = $request->input('valuerestok');
        $restok = $request->input('idrestok');

        $orderPembelianModel = new \App\Models\ComercialInvoice();
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];

            if(!empty($restok)){
                $DataImport = $orderPembelianModel->getImportBarangComercialInvoice($teknisi_cookie, $restok, $valuerestok);
                // dd($DataImport);
                if (isset($DataImport['error'])) {
                    return response()->json($DataImport, 500);
                }
                return response()->json($DataImport);
            }
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function pembelian_update_comercial_invoice(Request $request){
            $data = Session::get('teknisi_id');
            $responseData = json_decode($data, true);
            $comercialId = $request->input('id');
            $restok = $request->only(preg_grep('/^restok_\d+$/', array_keys($request->all())));
        
            $modeadmin = $request->input('modeadmin') ?? '';
            // dd($modeadmin);
            $date = $request->input('date') ?? '';
        
            $database = $request->input('database') ?? '';
            $supplier = $request->input('supplier') ?? '';
            $supplierbank = $request->input('supplierbank') ?? '';
            $name_perusahaan = $request->input('name') ?? '';
            $address = $request->input('address') ?? '';
            $city = $request->input('city') ?? '';
            $id_supplier = $request->input('id_supplier') ?? '';
            $telp = $request->input('telp') ?? '';
    
            $incoterms = $request->input('incoterms') ?? '';
            $location = $request->input('location') ?? '';
            $currency = $request->input('currency') ?? '';
            $freight_cost = $request->input('freight_cost') ?? '';
            $insurance = $request->input('insurance') ?? '';
            $bank_name = $request->input('bank_name') ?? '';
            $bank_address = $request->input('bank_address') ?? '';
            $swift_code = $request->input('swift_code') ?? '';
            $account_no = $request->input('account_no') ?? '';
            $beneficiary_name = $request->input('beneficiary_name') ?? '';
            $beneficiary_address = $request->input('beneficiary_address') ?? '';
            $packing_no = $request->input('packing_no') ?? '';
            $invoice_no = $request->input('invoice_no') ?? '';
            $contract_no = $request->input('contract_no') ?? '';
            $chineseName =  $request->only(preg_grep('/^chinese_name_\d+$/', array_keys($request->all())));
            $englishNames = $request->only(preg_grep('/^english_name_\d+$/', array_keys($request->all())));
            $modelName = $request->only(preg_grep('/^model_name_\d+$/', array_keys($request->all())));
            $brandName = $request->only(preg_grep('/^brand_name_\d+$/', array_keys($request->all())));
            $hsCode = $request->only(preg_grep('/^hscode-input_\d+$/', array_keys($request->all())));
            $long_m = $request->only(preg_grep('/^long_\d+$/', array_keys($request->all())));
            $width_m = $request->only(preg_grep('/^width_\d+$/', array_keys($request->all())));
            $height_m = $request->only(preg_grep('/^height_\d+$/', array_keys($request->all())));
            $long_p = $request->only(preg_grep('/^long_p_\d+$/', array_keys($request->all())));
            $width_p = $request->only(preg_grep('/^width_p_\d+$/', array_keys($request->all())));
            $height_p = $request->only(preg_grep('/^height_p_\d+$/', array_keys($request->all())));
            $qty = $request->only(preg_grep('/^qty_\d+$/', array_keys($request->all())));
            $net_weight = $request->only(preg_grep('/^net_weight_\d+$/', array_keys($request->all())));
            $gross_weight = $request->only(preg_grep('/^gross_weight_\d+$/', array_keys($request->all())));
            $cbm = $request->only(preg_grep('/^cbm_\d+$/', array_keys($request->all())));
            $unit_price_without_tax = $request->only(preg_grep('/^unit_price_without_tax_\d+$/', array_keys($request->all())));
            $unit_price_usd = $request->only(preg_grep('/^unit_price_usd_\d+$/', array_keys($request->all())));
            $total_price_without_tax = $request->only(preg_grep('/^total_price_without_tax_\d+$/', array_keys($request->all())));
            $total_price_usd = $request->only(preg_grep('/^total_price_usd_\d+$/', array_keys($request->all())));
            $use_name = $request->only(preg_grep('/^use_name_\d+$/', array_keys($request->all())));                
            
            $comercialInvoiceModel = new \App\Models\ComercialInvoice();
            // dd($packing_no);
            // if ($modeadmin == 1) {
               
            // }
            // else{
            
            $data = [
               
                'packingnumber'=>$packing_no,
                'contractnumber'=>$contract_no,
                'invoicenumber'=>$invoice_no,
                'comercialId' => $comercialId,
                'modeadmin' => $modeadmin,
                'database' => $database,
                'restok' =>$restok,
                'supplierbank' => $supplierbank,
                'name_perusahaan' => $name_perusahaan,
                'address' => $address,
                'city' => $city,
                'id_supplier' => $id_supplier,
                'telephone' => $telp,
                'date' => $date,
                'incoterms' => $incoterms,
                'location' => $location,
                'currency' => $currency,
                'freight_cost' => $freight_cost,
                'insurance' => $insurance,
                'bank_name' => $bank_name,
                'bank_address' => $bank_address,
                'swift_code' => $swift_code,
                'account_no' => $account_no,
                'beneficiary_name' => $beneficiary_name,
                'beneficiary_address' => $beneficiary_address,
                'english_name'=>$englishNames,
                'chinese_name'=>$chineseName,
                'model_name'=>$modelName,
                'brand_name'=>$brandName,
                'hs_code'=>$hsCode,
                'long_m'=>$long_m,
                'width_m'=>$width_m,
                'height_m'=>$height_m,
                'long_p'=>$long_p,
                'width_p'=>$width_p,
                'height_p'=>$height_p,
                'qty'=>$qty,
                'net_weight'=>$net_weight,
                'gross_weight'=>$gross_weight,
                'cbm'=>$cbm,
                'unit_price_without_tax'=>$unit_price_without_tax,
                'unit_price_usd'=>$unit_price_usd,
                'total_price_without_tax'=>$total_price_without_tax,
                'total_price_usd'=>$total_price_usd,
                'use_name'=>$use_name,
            ];
     
 
             // }
            
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];


            $Data = $comercialInvoiceModel->updateComercialInvoice($teknisi_cookie,$data);
          
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
        }
    }

    public function pembelian_tambah_comercial_invoice(Request $request){
            $data = Session::get('teknisi_id');
            $responseData = json_decode($data, true);
            $comercialId = $request->input('id');
            $restok = $request->only(preg_grep('/^restok_\d+$/', array_keys($request->all())));
        
            $modeadmin = $request->input('modeadmin') ?? '';
            $date = $request->input('date') ?? '';
        
            $database = $request->input('database') ?? '';
            $supplier = $request->input('supplier') ?? '';
            $supplierbank = $request->input('supplierbank') ?? '';
            $name_perusahaan = $request->input('name') ?? '';
            $address = $request->input('address') ?? '';
            $city = $request->input('city') ?? '';
            $id_supplier = $request->input('id_supplier') ?? '';
            $telp = $request->input('telp') ?? '';
    
            $incoterms = $request->input('incoterms') ?? '';
            $location = $request->input('location') ?? '';
            $currency = $request->input('currency') ?? '';
            $freight_cost = $request->input('freight_cost') ?? '';
            $insurance = $request->input('insurance') ?? '';
            $bank_name = $request->input('bank_name') ?? '';
            $bank_address = $request->input('bank_address') ?? '';
            $swift_code = $request->input('swift_code') ?? '';
            $account_no = $request->input('account_no') ?? '';
            $beneficiary_name = $request->input('beneficiary_name') ?? '';
            $beneficiary_address = $request->input('beneficiary_address') ?? '';
            $packing_no = $request->input('packing_no') ?? '';
            $invoice_no = $request->input('invoice_no') ?? '';
            $contract_no = $request->input('contract_no') ?? '';
            $chineseName =  $request->only(preg_grep('/^chinese_name_\d+$/', array_keys($request->all())));
            $englishNames = $request->only(preg_grep('/^english_name_\d+$/', array_keys($request->all())));
            $modelName = $request->only(preg_grep('/^model_name_\d+$/', array_keys($request->all())));
            $brandName = $request->only(preg_grep('/^brand_name_\d+$/', array_keys($request->all())));
            $hsCode = $request->only(preg_grep('/^hscode-input_\d+$/', array_keys($request->all())));
            $long_m = $request->only(preg_grep('/^long_\d+$/', array_keys($request->all())));
            $width_m = $request->only(preg_grep('/^width_\d+$/', array_keys($request->all())));
            $height_m = $request->only(preg_grep('/^height_\d+$/', array_keys($request->all())));
            $long_p = $request->only(preg_grep('/^long_p_\d+$/', array_keys($request->all())));
            $width_p = $request->only(preg_grep('/^width_p_\d+$/', array_keys($request->all())));
            $height_p = $request->only(preg_grep('/^height_p_\d+$/', array_keys($request->all())));
            $qty = $request->only(preg_grep('/^qty_\d+$/', array_keys($request->all())));
            $net_weight = $request->only(preg_grep('/^net_weight_\d+$/', array_keys($request->all())));
            $gross_weight = $request->only(preg_grep('/^gross_weight_\d+$/', array_keys($request->all())));
            $cbm = $request->only(preg_grep('/^cbm_\d+$/', array_keys($request->all())));
            $unit_price_without_tax = $request->only(preg_grep('/^unit_price_without_tax_\d+$/', array_keys($request->all())));
            $unit_price_usd = $request->only(preg_grep('/^unit_price_usd_\d+$/', array_keys($request->all())));
            $total_price_without_tax = $request->only(preg_grep('/^total_price_without_tax_\d+$/', array_keys($request->all())));
            $total_price_usd = $request->only(preg_grep('/^total_price_usd_\d+$/', array_keys($request->all())));
            $use_name = $request->only(preg_grep('/^use_name_\d+$/', array_keys($request->all())));                
            
            $comercialInvoiceModel = new \App\Models\ComercialInvoice();
            
       
            $data = [
               
                
                'comercialId' => $comercialId,
                'modeadmin' => $modeadmin,
                'database' => $database,
                'restok' =>$restok,
                'supplierbank' => $supplierbank,
                'name_perusahaan' => $name_perusahaan,
                'address' => $address,
                'city' => $city,
                'id_supplier' => $id_supplier,
                'telephone' => $telp,
                'date' => $date,
                'incoterms' => $incoterms,
                'location' => $location,
                'currency' => $currency,
                'freight_cost' => $freight_cost,
                'insurance' => $insurance,
                'bank_name' => $bank_name,
                'bank_address' => $bank_address,
                'swift_code' => $swift_code,
                'account_no' => $account_no,
                'beneficiary_name' => $beneficiary_name,
                'beneficiary_address' => $beneficiary_address,
                'english_name'=>$englishNames,
                'chinese_name'=>$chineseName,
                'model_name'=>$modelName,
                'brand_name'=>$brandName,
                'hs_code'=>$hsCode,
                'long_m'=>$long_m,
                'width_m'=>$width_m,
                'height_m'=>$height_m,
                'long_p'=>$long_p,
                'width_p'=>$width_p,
                'height_p'=>$height_p,
                'qty'=>$qty,
                'net_weight'=>$net_weight,
                'gross_weight'=>$gross_weight,
                'cbm'=>$cbm,
                'unit_price_without_tax'=>$unit_price_without_tax,
                'unit_price_usd'=>$unit_price_usd,
                'total_price_without_tax'=>$total_price_without_tax,
                'total_price_usd'=>$total_price_usd,
                'use_name'=>$use_name,
                'invoicenumber'=>$invoice_no,
                'packingnumber'=>$packing_no,
                'contractnumber'=>$contract_no,
            ];
            
      
      
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];


            $Data = $comercialInvoiceModel->tambahComercialInvoice($teknisi_cookie,$data);
           
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            else {
                return response()->json($Data, 200);
            }
        }
    }

    public function pembelian_update_formatas_comercial_invoice(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $brand = $request->input('brand') ?? '';
        $gross_weight = $request->input('gross_weight') ?? '';
        $height = $request->input('height') ?? '';
        $height_p = $request->input('height_p') ?? '';
        $hs_code = $request->input('hs_code_input') ?? '';
        $comercialId = $request->input('id');
        $id_barang = $request->input('id_barang');
        $id_detail = $request->input('id_detail');
        $length = $request->input('length') ?? '';
        $length_p = $request->input('length_p') ?? '';
        $model = $request->input('model') ?? '';
        $name = $request->input('name') ?? '';
        $name_english = $request->input('name_english') ?? '';
        $name_chinese = $request->input('name_chinese') ?? '';
        $nett_weight = $request->input('nett_weight') ?? '';
        $width = $request->input('width') ?? '';
        $width_p = $request->input('width_p') ?? '';
        $height_p = $request->input('height_p') ?? '';
        $qty = $request->input('qty') ?? '';
        $nett_weight = $request->input('nett_weight') ?? '';
        $gross_weight = $request->input('gross_weight') ?? '';
        $cbm = $request->input('cbm') ?? '';
        $unit_price_without_tax_ = $request->input('unit_price_without_tax_') ?? '';
        $unit_price_usd_ = $request->input('unit_price_usd_') ?? '';
        $total_price_without_tax_ = $request->input('total_price_without_tax_') ?? '';
        $total_price_usd_ = $request->input('total_price_usd_') ?? '';
        $use_name_ = $request->input('use_name_') ?? '';
       
        $comercialInvoiceModel = new \App\Models\ComercialInvoice();
        // if(!empty($id_detail))
        // {
            $data = [
            
                'brand' => $brand,
                'gross_weight' => $gross_weight,
                'height' => $height,
                'height_p' => $height_p,
                'hs_code' => $hs_code,
                'comercialId' => $comercialId,
                'id_barang' => $id_barang,
                'id_detail' => $id_detail,
                'length' => $length,
                'length_p' => $length_p,
                'model' => $model,
                'name' => $name,
                'name_english' => $name_english,
                'name_chinese' => $name_chinese,
                'nett_weight' => $nett_weight,
                'width' => $width,
                'width_p' => $width_p,
                'height_p' => $height_p,
                'qty' => $qty,
                'nett_weight' => $nett_weight,
                'gross_weight' => $gross_weight,
                'cbm' => $cbm,
                'unit_price_without_tax_' => $unit_price_without_tax_,
                'unit_price_usd_' => $unit_price_usd_,
                'total_price_without_tax_' => $total_price_without_tax_,
                'total_price_usd_' => $total_price_usd_,
                'use_name_' => $use_name_,
            ];
            if (isset($responseData)) {
                $username = $responseData;
                $teknisi_cookie = $responseData['cookie'];
    
    
                $Data = $comercialInvoiceModel->updateFormAtasComercialInvoice($teknisi_cookie,$data);
                
                if (isset($Data['error'])) {
                    return response()->json($Data, 500);
                }
            }
            // }
            // else{

            // }
      
    }

    public function pembelian_update_comercial_invoice_notes(Request $request){
        $data = Session::get('teknisi_id');
        
        $id = $request->input('id');
        $freight_cost = $request->input('freight_cost');
        $insurance = $request->input('insurance');
        $incoterms = $request->input('incoterms');
        $location = $request->input('location');
        $supplierbank = $request->input('supplierbank');
        $currency = $request->input('currency');
        $bank_name = $request->input('bank_name');
        $bank_address = $request->input('bank_address');
        $swift_code = $request->input('swift_code');
        $account_no = $request->input('account_no');
        $beneficiary_name = $request->input('beneficiary_name');
        $beneficiary_address = $request->input('beneficiary_address');
        
        $brand = $request->input('brand') ?? '';
        $gross_weight = $request->input('gross_weight') ?? '';
        $height = $request->input('height') ?? '';
        $height_p = $request->input('height_p') ?? '';
        $hs_code = $request->input('hs_code_input') ?? '';
        $comercialId = $request->input('id');
        $id_barang = $request->input('id_barang');
        $id_detail = $request->input('id_detail');
        $length = $request->input('length') ?? '';
        $length_p = $request->input('length_p') ?? '';
        $model = $request->input('model') ?? '';
        $name = $request->input('name') ?? '';
        $name_english = $request->input('name_english') ?? '';
        $name_chinese = $request->input('name_chinese') ?? '';
        $nett_weight = $request->input('nett_weight') ?? '';
        $width = $request->input('width') ?? '';
        $width_p = $request->input('width_p') ?? '';
        $height_p = $request->input('height_p') ?? '';
        $qty = $request->input('qty') ?? '';
        $nett_weight = $request->input('nett_weight') ?? '';
        $gross_weight = $request->input('gross_weight') ?? '';
        $cbm = $request->input('cbm') ?? '';
        $unit_price_without_tax_ = $request->input('unit_price_without_tax_') ?? '';
        $unit_price_usd_ = $request->input('unit_price_usd_') ?? '';
        $total_price_without_tax_ = $request->input('total_price_without_tax_') ?? '';
        $total_price_usd_ = $request->input('total_price_usd_') ?? '';
        $use_name_ = $request->input('use_name_') ?? '';

        $responseData = json_decode($data, true);
        
        $comercialInvoiceModel = new \App\Models\ComercialInvoice();

        $data = [
            'id' => $id
        ];
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];


            $Data = $comercialInvoiceModel->updateComercialInvoiceNotes($teknisi_cookie,$data);

            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
        }
    }

    public function pembelian_edit_packinglist_comercial_invoice(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $supplier = $request->input('supplier');
        $id = $request->input('id');
        $number_packing = $request->input('number_packing');
        // dd($number_packing);
        $name_packing = $request->input('name_packing');
        // dd($name_packing);
        $item_packing = $request->input('itempacking');
        $valuesOnlyItem = array_values($item_packing);
        $qtyitempacking = $request->input('qtyitempacking');
        $qtyitempacking2 = $request->input('qtyitempacking');
        $valuesOnly = array_values($qtyitempacking2);

        $formParams = [];

        $indexLuar = 0;
        $indexNumberLuar = 0;

        for ($indexLuar = 0; $indexLuar < count($number_packing); $indexLuar++) {
            $indexNumberLuar = $indexLuar;
            $currentValues = $valuesOnly[$indexNumberLuar];
            
            // Mendapatkan name_packing dan number_packing
            $name_packing_value = $name_packing[$indexLuar];
            // dd($number_packing[$indexLuar]);
            $number_packing_value = $number_packing[$indexLuar];

            // Tambahkan 'name_packing' dan 'number_packing' di luar loop dalam
            $formParams[] = [
                'name_packing[]' => $name_packing_value,
                'number_packing[]' => $number_packing_value
            ];
            
            for ($indexDalam = 0; $indexDalam < count($currentValues); $indexDalam++) {
                $indexLuarDalam = $indexDalam;

                $formParams[] = [
                    'qtyitempacking_'.$indexNumberLuar.'['.$indexLuarDalam.']' => $valuesOnly[$indexNumberLuar][$indexLuarDalam],
                    'itempacking_'.$indexNumberLuar.'['.$indexLuarDalam.']' => $valuesOnlyItem[$indexNumberLuar]
                ];
            }
        }


        $client = new Client([
            'verify' => false,
        ]);
        if (isset($responseData)) {
            $teknisi_cookie = $responseData['cookie'];
            try {
                $multipart = [];

                // Masukkan id ke dalam form_params
                $multipart[] = [
                    'name' => 'id',
                    'contents' => $id
                ];
                // dd($formParams);
                // Tambahkan data lain ke dalam multipart
                foreach ($formParams as $params) {
                    foreach ($params as $key => $value) {
                        $multipart[] = [
                            'name' => $key,
                            'contents' => $value
                        ];
                    }
                }
                // dd($multipart);
                $response = $client->post('https://maxipro.id/TeknisiAPI/commercial_invoice_edit_addpacking', [
                    'multipart' => $multipart,
                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ],
                ]);

                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // dd($Data);
            } catch (GuzzleException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }


    public function pembelian_lcl(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $lclPembelianModel = new \App\Models\Lcl();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $lclPembelianModel->getLclPembelian($teknisi_cookie);
            $Data_barang = $lclPembelianModel->getLclAdd($teknisi_cookie);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.lcl_pembelian', compact('username', 'data', 'Data','Data_barang'));
        }
    }

    public function pembelian_lcl_filter(Request $request)
    {
      
        $data = Session::get('teknisi_id');
        $status = $request->input('filterValue');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $invoice = $request->input('invoice');
        $checkdatevalue = $request->input('checkdatevalue');
        $responseData = json_decode($data, true);
        $lclModel = new \App\Models\Lcl();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $lclModel->getLclPembelianFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue,$invoice);
            // dd($Data);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.lcl_pembelian_filter', compact('username', 'data', 'Data'));
        }
    }

    public function pembelian_lclimport(Request $request)
    {
        $data = Session::get('teknisi_id');
        $idcomercial = $request->input('idcommercial');
        
        $responseData = json_decode($data, true);
        $lclModel = new \App\Models\Lcl();
        if(isset($responseData)) {
            $username = $responseData;
            $teknisi_cookie = $responseData['cookie'];
            $Data = $lclModel->getLclPembelianImportInvoice($teknisi_cookie,$idcomercial);
            
            if(isset($Data['error'])){
            
                return response()->json($Data,500);
            }
            return response()->json($Data);
        }
    }

    public function pembelian_lcl_editview(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id_lcl');
        //    dd($id);
        $restok 	 	= $request->input('idrestok');
    
       
        $lclModel = new \App\Models\Lcl();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];

            // if(!empty($restok)){
                // dd('restok',$restok);
                // $DataImport = $lclModel->getImportBarangComercialInvoice($teknisi_cookie, $restok);
              
                $Data = $lclModel->getEditViewLcl($teknisi_cookie, $id);
                // dd($Data);
                // if (isset($Data['error']) && isset($DataImport['error']) ) {
                    
                //     $response = isset($Data['error']) ? $Data : $DataImport;
                //     return response()->json($response, 500);
                // }
                return view('admin.pembelian.edit_lcl', compact('username', 'Data'));
            // }
            // else{

            //     $Data = $orderPembelianModel->getEditComercialInvoice($teknisi_cookie, $id);
                
            //     if (isset($Data['error'])) {
            //         return response()->json($Data, 500);
            //     }
            //     return view('admin.pembelian.edit_comercialinvoice', compact('username', 'data', 'Data'));
            // }
        }
    }

    public function pembelian_lclimportbarang(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');
        $lclPembelianModel = new \App\Models\Lcl();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];
            $Data_barang = $lclPembelianModel->getLclAddBarang($teknisi_cookie,$id);
            if (isset($Data['error'])) {
                return response()->json($Data_barang, 500);
            }
            return response()->json($Data_barang);
        }
    }

    public function pembelian_fcl(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\Fcl();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getFclPembelian($teknisi_cookie);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.fcl_pembelian', compact('username', 'data', 'Data'));
        }
    }

    public function pembelian_fcl_filter(Request $request)
    {

        $data = Session::get('teknisi_id');
        $status = $request->input('filterValue');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

        $nama_perusahaan = $request->input('id_nama_supplier');
        $checkdatevalue = $request->input('checkdatevalue');
        $responseData = json_decode($data, true);
        $orderPembelianModel = new \App\Models\Fcl();
        if (isset($responseData)) {
            $username = $responseData;

            $teknisi_cookie = $responseData['cookie'];


            $Data = $orderPembelianModel->getFclPembelianFilter($teknisi_cookie, $status, $tgl_awal, $tgl_akhir, $checkdatevalue,$nama_perusahaan);
            // dd($Data);
            if (isset($Data['error'])) {
                return response()->json($Data, 500);
            }
            return view('admin.pembelian.fcl_pembelian_filter', compact('username', 'data', 'Data'));
        }
    }

    public function penawaran()
    {

        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            // dd($teknisi_id);
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penawaran', [
                    'headers' => $headers,



                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);

                return view('admin.penawaran.penawaran', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function penawaran_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        // dd($checkdatevalue);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie
                ];


                $url = 'https://maxipro.id/TeknisiAPI/penawaran';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penawaran.penawaran_filter', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function editview_penawaran_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');
        // dd($id);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=r7136n9tfo332cnrluvilqj8r69dtktd',
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penawaran_viewedit?id=' . $id, [
                    'headers' => $headers,

                    'query' => [
                        'id' => $id,
                    ],

                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);

                return view('admin.penawaran.edit_penawaran', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }


    public function penawaran_edit(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];

        $id = $request->input('id');
        $name = $request->input('name');
        $company = $request->input('company');
        $address = $request->input('address');
        $email = $request->input('email');
        $pembayaran = $request->input('pembayaran');
        // dd($pembayaran);
        $text_top = $request->input('text_top');
        $text_middle = $request->input('text_middle');
        $text_bottom = $request->input('text_bottom');
        $text_bothbottom = $request->input('text_bothbottom');
        $statusppn = $request->input('ppn');
        // dd($statusppn);
        $idProduct = $request->input('selected_product_edit');

        $priceProduct = $request->input('price_product_edit');
        $priceProduct = $request->input('price_product_edit');

        $priceProduct = $request->input('price_product_edit');

        // Menghapus format "Rp",spasi dan titik dari string
        $priceProduct = str_replace(['Rp', ' ', '.'], '', $priceProduct);

        $spesificationProduct = $request->input('spesification_product_edit');
        $handphone = $request->input('handphone');


        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);

        try {

            $response = $client->post('https://maxipro.id/TeknisiAPI/edit_penawaran', [
                'form_params' => [
                    'id' => $id,
                    'name' => $name,
                    'company' => $company,
                    'address' => $address,
                    'email' => $email,
                    'pembayaran' => $pembayaran,
                    'text_top' => $text_top,
                    'text_middle' => $text_middle,
                    'text_bothbottom' => $text_bothbottom,
                    'text_bottom' => $text_bottom,
                    'statusppn' => $statusppn,
                    'idProduct' => $idProduct,
                    'priceProduct' => $priceProduct,
                    'spesificationProduct' => $spesificationProduct,
                    'handphone' => $handphone,

                ],
                'headers' => [
                    'Cookie' => 'ci_session=tt1smi653uspi47qsrt5ihgpu2pccni3'
                ]
            ]);

            $body = $response->getBody()->getContents();
            $Data = json_decode($body, true);
            
        } catch (GuzzleException $e) {
            // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
            echo "Error: " . $e->getMessage();
        }
    }

    public function penawaran_tambah_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $teknisi_id = $responseData['data']['teknisi']['id'];
        $teknisi_code_name = $responseData['data']['teknisi']['code_name'];
        
        $id = $request->input('id');
        $name = $request->input('name');
        $company = $request->input('company');
        $address = $request->input('address');
        $email = $request->input('email');
        $pembayaran = $request->input('pembayaran');
        // dd($pembayaran);
        $text_top = $request->input('text_top');
        $text_middle = $request->input('text_middle');
        $text_bottom = $request->input('text_bottom');
        $text_bothbottom = $request->input('text_bothbottom');
        $statusppn = $request->input('ppn');
        // dd($statusppn);
        $idProduct = $request->input('selected_product_edit');

        $priceProduct = $request->input('price_product_edit');
        $priceProduct = $request->input('price_product_edit');

        $priceProduct = $request->input('price_product_edit');

        // Menghapus format "Rp",spasi dan titik dari string
        $priceProduct = str_replace(['Rp', ' ', '.'], '', $priceProduct);

        $spesificationProduct = $request->input('spesification_product_edit');
        $handphone = $request->input('handphone');
        // dd($statusppn);
        // dd($pembayaran,$handphone,$address,$idProduct,$name,$priceProduct,$spesificationProduct,$pembayaran,$text_middle,$text_bottom,$statusppn);

        $client = new Client([
            'verify' => false, // Matikan verifikasi SSL
        ]);
        if (isset($responseData)) {
            $teknisi_cookie = $responseData['cookie'];
            try {

                $response = $client->post('https://maxipro.id/TeknisiAPI/tambah_penawaran', [
                    'form_params' => [

                        'name' => $name,
                        'company' => $company,
                        'address' => $address,
                        'email' => $email,
                        'pembayaran' => $pembayaran,
                        'text_top' => $text_top,
                        'text_middle' => $text_middle,
                        'text_bothbottom' => $text_bothbottom,
                        'text_bottom' => $text_bottom,
                        'statusppn' => $statusppn,
                        'idProduct' => $idProduct,
                        'priceProduct' => $priceProduct,
                        'spesificationProduct' => $spesificationProduct,
                        'handphone' => $handphone,
                        'teknisi_id' => $teknisi_id,
                    ],
                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ],

                ]);

                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);
                // dd($Data);
            } catch (GuzzleException $e) {
                // Tangani pengecualian jika terjadi kesalahan dalam permintaan Guzzle
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function hapus_penawaran_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $penawaranId = $request->input('id');
        // dd($penawaranId);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            // Membuat objek Guzzle Client dengan SSL verify false
            $client = new Client(['verify' => false]);

            try {
                // Mengirim request DELETE ke API dengan penawaranId sebagai query parameter
                $response = $client->delete('https://maxipro.id/TeknisiAPI/hapus_penawaran/' . $penawaranId, [


                    'headers' => [
                        'Cookie' => $teknisi_cookie
                    ]
                ]);

                // Mendapatkan isi dari respons
                $body = $response->getBody()->getContents();
                $Data = json_decode($body, true);


                // Mengembalikan respons dari API
                return response()->json($Data, 200);
            } catch (\Exception $e) {
                // Menangani kesalahan jika terjadi
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function detail_penawaran_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');
        // dd($id);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie,
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penawaran_viewedit?id=' . $id, [
                    'headers' => $headers,

                    'query' => [
                        'id' => $id,
                    ],

                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penawaran.detail', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function printPDF_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $id = $request->input('id');
        // dd($id);
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie,
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/penawaran_viewedit?id=' . $id, [
                    'headers' => $headers,

                    'query' => [
                        'id' => $id,
                    ],

                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                $url = "https://maxipro.id/images/barang/";

                // Load view Blade
                $view = view('admin.penawaran.printPDF', compact('username', 'data', 'Data', 'url'))->render();

                // Generate PDF
                $pdf = PDF::loadHTML($view);

                // Tampilkan PDF di browser
                return $pdf->stream('document.pdf');
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function penerimaan_pembelian(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        $fcl_lcl = $request->input('fcl_lcl');
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie
                ];
                $url = 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'kode' =>$kode,
                    'lcl_fcl' =>$fcl_lcl
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penerimaan.penerimaan', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function penerimaan_pembelian_filter(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        $fcl_lcl = $request->input('fcl_lcl');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    
                    'Cookie' => $teknisi_cookie
                ];

                $url = 'https://maxipro.id/TeknisiAPI/penerimaan_pembelian';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'kode' =>$kode,
                    'lcl_fcl' =>$fcl_lcl
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penerimaan.penerimaan_filter', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function penerimaan_pindahgudang(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie
                ];
                $url = 'https://maxipro.id/TeknisiAPI/penerimaan_pindah_gudang';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'kode' =>$kode,
                    
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penerimaan.penerimaan_pindahgudang', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function penerimaan_pindahgudang_filter(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => $teknisi_cookie
                ];
                $url = 'https://maxipro.id/TeknisiAPI/penerimaan_pindah_gudang';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'kode' =>$kode,
                    
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penerimaan.penerimaan_pindahgudang_filter', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function penerimaan_barang_lain(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    
                    'Cookie' => $teknisi_cookie
                ];
                $url = 'https://maxipro.id/TeknisiAPI/penerimaan_barang_lain';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'kode' =>$kode,
                    
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penerimaan.penerimaan_barang_lain', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    public function penerimaan_barang_lain_filter(Request $request){
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];
            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    
                    'Cookie' => $teknisi_cookie
                ];
                $url = 'https://maxipro.id/TeknisiAPI/penerimaan_barang_lain';
                $queryParams = [
                    'checkdatevalue' => $checkdatevalue,
                    'tgl_awal' => $tgl_awal,
                    'tgl_akhir' => $tgl_akhir,
                    'kode' =>$kode,
                    
                ];
                $url .= '?' . http_build_query($queryParams);

                // Make a GET request to the specified URL with headers
                $response = $client->request('GET', $url, [
                    'headers' => $headers
                ]);
                $data = $response->getBody()->getContents();
                $Data = json_decode($data, true);
                // dd($Data);
                return view('admin.penerimaan.penerimaan_barang_lain_filter', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
   
    public function penerimaan_document(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];

            try {
                $penerimaan = new \App\Models\Penerimaan();
                // Call the model method to fetch dokumen
                $Data = $penerimaan->getPenerimaanDokumen($teknisi_cookie, $tgl_awal, $tgl_akhir, $checkdatevalue, $kode);
                return view('admin.penerimaan.penerimaan_document', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle exception from model
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    public function penerimaan_document_filter(Request $request)
    {
        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $checkdatevalue = $request->input('checkdatevalue');
        $kode = $request->input('kode');
        
        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];
            $teknisi_cookie = $responseData['cookie'];

            try {
                $penerimaan = new \App\Models\Penerimaan();
                // Call the model method to fetch dokumen
                $Data = $penerimaan->getPenerimaanDokumen($teknisi_cookie, $tgl_awal, $tgl_akhir, $checkdatevalue, $kode);
                return view('admin.penerimaan.penerimaan_document_filter', compact('username', 'data', 'Data'));
            } catch (\Exception $e) {
                // Handle exception from model
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    // public function penawaran(){
    //     return $this->getPenawaranData();
    // }

    // public function penawaran_filter(Request $request){
    //     return $this->getPenawaranData($request->input('tgl_awal'), $request->input('tgl_akhir'), $request->input('checkdatevalue'));
    // }

    // private function getPenawaranData($tgl_awal = null, $tgl_akhir = null, $checkdatevalue = null){
    //     $data = Session::get('teknisi_id');
    //     $responseData = json_decode($data, true);
    //     if (isset($responseData)) {
    //         $username = $responseData;
    //         $teknisi_id = $responseData['data']['teknisi']['id'];

    //         try {
    //             // Create a new GuzzleHTTP client with verify option set to false
    //             $client = new Client([
    //                 'verify' => false
    //             ]);

    //             $headers = [
    //                 //Cookie API Local
    //                 'Cookie' => 'ci_session=fbe64a51a1f1cba495c6b1edf0bcc630738225f1'
    //             ];

    //             $url = 'https://maxipro.id/TeknisiAPI/penawaran';
    //             if ($tgl_awal !== null && $tgl_akhir !== null && $checkdatevalue !== null) {
    //                 $queryParams = [
    //                     'checkdatevalue' => $checkdatevalue,
    //                     'tgl_awal' => $tgl_awal,
    //                     'tgl_akhir' => $tgl_akhir
    //                 ];
    //                 $url .= '?' . http_build_query($queryParams);
    //             }

    //             // Make a GET request to the specified URL with headers
    //             $response = $client->request('GET', $url, [
    //                 'headers' => $headers
    //             ]);
    //             $data = $response->getBody()->getContents();
    //             $Data = json_decode($data, true);
    //             // dd($Data);
    //             return view('admin.penawaran.penawaran', compact('username', 'data', 'Data'));
    //         } catch (\Exception $e) {
    //             // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
    //             return response()->json(['error' => $e->getMessage()], 500);
    //         }
    //     }
    // }


    public function logout()
    {
        try {
            // Create a new GuzzleHTTP client with verify option set to false
            $client = new Client([
                'verify' => false
            ]);

            // Define headers for the request
            $headers = [
                'Cookie' => 'ci_session=mmef72tdgsgv79a57lt1qh8acal0t3kc'
            ];

            // Make a GET request to the specified URL with headers
            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/logout', [
                'headers' => $headers
            ]);
            Session::forget('teknisi_id');
            // Redirect to the login route
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function serviceall()
    {
        return view('admin.service.daftar-service.all');
    }

    public function service()
    {

        return view('admin.service.daftar-service.daftarservice');
    }

    public function servicepengerjaan()
    {
        return view('admin.service.daftar-service.pengerjaan');
    }
    public function serviceselesai()
    {
        return view('admin.service.daftar-service.selesai');
    }
    public function servicehistory()
    {
        return view('admin.service.daftar-service.history');
    }
    public function datasparepart()
    {

        $data = Session::get('teknisi_id');
        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);
        if (isset($responseData)) {
            $username = $responseData;

            return view('admin.service.data-sparepart.datasparepart', compact('username'));
        } else {

            return redirect()->route('login');
        }
    }

    public function lihatstokgudang()
    {
        $data = Session::get('teknisi_id');


        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);


        if (isset($responseData)) {
            $username = $responseData;
            $response = Http::withHeaders([
                'Cookie' => 'ci_session=22b4855c0b8ece0d136cb8f6d5b2d98b61b52054'
            ])->get('https://maxipro.id/TeknisiAPI/stok_gudang');

            // Mendapatkan body respons dari permintaan
            $data = json_decode($response->body(), true);
            // $stok_kategori = json_decode($data, true);
            // dd($data);
            return view('admin.stok.lihatstok', compact('username', 'data'));
        }
    }

    public function lihatstok()
    {


        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=22b4855c0b8ece0d136cb8f6d5b2d98b61b52054'
                ];

                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/stok_kategori', [
                    'headers' => $headers,



                ]);

                $responseGudang = $client->request('GET', 'https://maxipro.id/TeknisiAPI/stok_gudang', [
                    'headers' => $headers,



                ]);
                $Data = $response->getBody()->getContents();
                $data = json_decode($Data, true);

                $Data2 = $responseGudang->getBody()->getContents();
                $dataGudang = json_decode($Data2, true);

                // return view('admin.penawaran.edit_penawaran', compact('username', 'data', 'Data'));

                return view('admin.stok.lihatstok', compact('username', 'data', 'dataGudang'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    public function lihatstok_produk(Request $request)
    {

        $data = Session::get('teknisi_id');

        $produk = $request->get('id');


        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);


        if (isset($responseData)) {
            $username = $responseData;
            // $response = Http::withHeaders([
            //     'Cookie' => 'ci_session=22b4855c0b8ece0d136cb8f6d5b2d98b61b52054'
            // ])->get('https://maxipro.id/TeknisiAPI/stok?id=' . $produk);


            // Create a new GuzzleHTTP client with verify option set to false
            $client = new Client([
                'verify' => false
            ]);

            $headers = [
                //Cookie API Local
                'Cookie' => 'ci_session=22b4855c0b8ece0d136cb8f6d5b2d98b61b52054'
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/stok?id=' . $produk, [
                'headers' => $headers,



            ]);

            // Mendapatkan body respons dari permintaan
            $data = json_decode($response->getBody()->getContents(), true);
            // dd($data);
            return response()->json($data);
        }
    }

    public function lihatstok_produk_perusahaan(Request $request)
    {

        $data = Session::get('teknisi_id');

        $produk = $request->get('id');


        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);


        if (isset($responseData)) {
            $username = $responseData;


            // Create a new GuzzleHTTP client with verify option set to false
            $client = new Client([
                'verify' => false
            ]);

            $headers = [
                //Cookie API Local
                'Cookie' => 'ci_session=22b4855c0b8ece0d136cb8f6d5b2d98b61b52054'
            ];

            $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/stok?id=' . $produk, [
                'headers' => $headers,



            ]);

            // Mendapatkan body respons dari permintaan
            $data = json_decode($response->getBody()->getContents(), true);
            // dd($data);
            return response()->json($data);
        }
    }
    public function lihatstoksubkategori_produk(Request $request)
    {
        $data = Session::get('teknisi_id');
        $produk = $request->get('id');

        // Memeriksa apakah dekoding berhasil dan jika username tersedia
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;

            // Membuat instance dari Guzzle Client dengan opsi verifikasi SSL dinonaktifkan
            $client = new Client(['verify' => false]);

            // Permintaan untuk mendapatkan stok subkategori
            $response = $client->get('https://maxipro.id/TeknisiAPI/stoksubkategori?id=' . $produk, [
                'headers' => [
                    'Cookie' => 'ci_session=dd1864fbbc68352282f6c71ee2abad4a5a1069f9'
                ]
            ]);

            // Mendapatkan body respons dari permintaan
            $data = json_decode($response->getBody()->getContents(), true);

            return response()->json($data);
        }
    }

    public function cekstok_produk(Request $request)
    {
        $sesion = Session::get('teknisi_id');
        $responseArray = json_decode($sesion, true);
        $teknisiId = $responseArray['data']['teknisi']['id'];

        $category = $request->post('category');
        $stok = $request->post('id');
        $gudang = $request->post('gudang');

        // Inisialisasi Guzzle Client dengan opsi verifikasi SSL dinonaktifkan
        $client = new Client(['verify' => false]);

        // Data yang akan dikirimkan dalam permintaan
        $data = [
            'id' => $stok,
            'category' => $category,
            'gudang' => $gudang,
            'teknisi_id' => $teknisiId
        ];

        // Header tambahan, dalam hal ini header Cookie
        $headers = [
            'Cookie' => 'ci_session=96ee39c1d7238d9540e89001cd5c9009d08e990a'
        ];

        try {
            // Kirim permintaan POST menggunakan Guzzle
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/cek_produk_stok', [
                'form_params' => $data,
                'headers' => $headers
            ]);

            // Ambil body respons
            $responseData = $response->getBody()->getContents();

            // Tampilkan respons
            return $responseData;
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function lihatstokopname()
    {
        return view('admin.stok.lihatstokopname');
    }
    public function lihatstokperusahaan()
    {
        $data = Session::get('teknisi_id');

        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;

            // Membuat instance dari Guzzle Client dengan opsi verifikasi SSL dinonaktifkan
            $client = new Client(['verify' => false]);

            // Permintaan untuk stok kategori
            $response = $client->get('https://maxipro.id/TeknisiAPI/stok_kategori', [
                'headers' => [
                    'Cookie' => 'ci_session=22b4855c0b8ece0d136cb8f6d5b2d98b61b52054'
                ]
            ]);

            // Permintaan untuk stok gudang
            $responseGudang = $client->get('https://maxipro.id/TeknisiAPI/stok_gudang', [
                'headers' => [
                    'Cookie' => 'ci_session=4750d568d72cdea75e95da14854bca55b5014735'
                ]
            ]);

            // Mendapatkan body respons dari permintaan
            $data = json_decode($response->getBody()->getContents(), true);
            $dataGudang = json_decode($responseGudang->getBody()->getContents(), true);

            return view('admin.stok.lihatstokperusahaan', compact('username', 'data', 'dataGudang'));
        }
    }
    public function lihatstoksubkategori()
    {


        $data = Session::get('teknisi_id');
        $responseData = json_decode($data, true);

        if (isset($responseData)) {
            $username = $responseData;
            $teknisi_id = $responseData['data']['teknisi']['id'];

            try {
                // Create a new GuzzleHTTP client with verify option set to false
                $client = new Client([
                    'verify' => false
                ]);

                $headers = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=d539a10dbd6163689b5b9b33054e7fb0b9761b40'
                ];
                $headers2 = [
                    //Cookie API Local
                    'Cookie' => 'ci_session=4750d568d72cdea75e95da14854bca55b5014735'
                ];
                $response = $client->request('GET', 'https://maxipro.id/TeknisiAPI/stok_subkategori', [
                    'headers' => $headers,



                ]);

                $responseGudang = $client->request('GET', 'https://maxipro.id/TeknisiAPI/stok_gudang', [
                    'headers' => $headers2,



                ]);
                $Data = $response->getBody()->getContents();
                $data = json_decode($Data, true);

                $Data2 = $responseGudang->getBody()->getContents();
                $dataGudang = json_decode($Data2, true);

                // return view('admin.penawaran.edit_penawaran', compact('username', 'data', 'Data'));

                return view('admin.stok.lihatstoksubcategory', compact('username', 'data', 'dataGudang'));
            } catch (\Exception $e) {
                // Handle Guzzle HTTP exception, you might want to log or handle the error accordingly
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function cekstoksubkategori(Request $request)
    {
        $sesion = Session::get('teknisi_id');
        $responseArray = json_decode($sesion, true);
        $teknisiId = $responseArray['data']['teknisi']['id'];

        $category = $request->post('category');
        $stok = $request->post('id');
        $gudang = $request->post('gudang');

        // Inisialisasi Guzzle Client dengan opsi verifikasi SSL dinonaktifkan
        $client = new Client(['verify' => false]);

        // Data yang akan dikirimkan dalam permintaan
        $data = [
            'id' => $stok,
            'category' => $category,
            'gudang' => $gudang,
            'teknisi_id' => $teknisiId
        ];

        $headers = [
            'Cookie: ci_session=9bf954ef60300d7789c0d6d031f989cefb65a8f6'
        ];
        try {
            // Kirim permintaan POST menggunakan Guzzle
            $response = $client->request('POST', 'https://maxipro.id/TeknisiAPI/cek_subkategori_stok', [
                'form_params' => $data,
                'headers' => $headers
            ]);

            // Ambil body respons
            $responseData = $response->getBody()->getContents();

            // Tampilkan respons
            return $responseData;
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
