@extends('admin.templates')


@section('title')
Penawaran | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
@section('style')

<style>
    .flatpickr-input {
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 4px;
    }
    .button-container {
            text-align: right; /* Aligns the content to the right */
            margin: 20px 0;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    .dataTables_wrapper .dataTables_paginate .paginate_button.previous {
        width: auto;
        /* Atur lebar tombol menjadi otomatis */
        padding-right: 0px;
        /* Berikan padding di sisi kanan tombol */

    }

    /* Ganti warna latar belakang tabel */
    #tabe-stok {
        background-color: #f0f0f0;
        /* Ganti dengan warna yang Anda inginkan */

    }

    .dataTables_filter input[type="search"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        /* Opsional: untuk membuat sudut border melengkung */
        padding: 5px;
        /* Opsional: untuk memberi jarak antara border dan teks */
    }


    /* CSS untuk gaya select2 custom */
    .select2-container--custom .select2-selection--single {
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        width: 100%;
    }

    .empty-row {
        border: none;
    }

    .select2-container--custom .select2-selection--single {
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        width: 100%;
    }

    .empty-row {
        border: none;
    }

    .select2-container--custom .select2-selection--single .select2-selection__arrow {
        right: 10px;
    }

    .select2-container--custom .select2-selection--single .select2-selection__rendered {
        color: #495057;
        line-height: 1.5;
        text-align: center;
        font-size: 14px;
    }

    .select2-container--custom .select2-selection--single .select2-selection__placeholder {
        color: #6c757d;
    }

    .select2-container--custom .select2-selection--single:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .select2-container--custom .select2-results__options {
        overflow-y: auto;

        max-height: 200px;

    }

    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Warna gelap dengan opasitas */
        z-index: 9999;
        /* Layer di atas semua konten */
        display: none;
        /* Default tidak ditampilkan */
    }

    #overlay i {
        color: white;
        /* Warna ikon */
        font-size: 50px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Sesuaikan ukuran ikon sesuai kebutuhan */
    }


    /* Style untuk tombol Delete */
    .btn-delete {
        width: 25%;
        /* Lebar default */
    }

    /* Mengatur lebar tombol saat layar berukuran kecil (misalnya pada perangkat mobile) */
    @media only screen and (max-width: 600px) {
        .btn-delete {
            width: 50%;
            /* Mengisi lebar penuh */
        }
    }
</style>

@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Penawaran</h4>

        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Penawaran {{ $username['data']['teknisi']['name'] }}</small>
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">


                    <div class="panel-body" style="padding: 30px;">
                            <div class="button-container">
                                <button class="back-button" onclick="history.back()">Back</button>
                            </div>
                        <div class="col-md-12" style="font-size: 14px;">

                            <div class="col-md-10 col-md-push-1" style="border: 2px solid #000;padding: 25px;">
                                
                                    <div class="col-md-12">
                                         <img src="../assets/logo/logo-penawaran-maxipro.png" alt="" style="width: 300px;margin-top: 0;">
                                    </div>

                                    <div class="col-md-12" style="background: red;color: #fff;padding: 5px;margin-bottom: 20px;">

                                          <span>Offset and Printing Equipments Supplier</span>

                                          <span style="float: right;">www.maxipro.co.id</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <p>

                                                Kepada Yth.<br>

                                                {{ $Data['msg']['penawaran']['name'] }}<br>
                                                {{ $Data['msg']['penawaran']['company'] }}<br>
                                                {{ $Data['msg']['penawaran']['address'] }}<br>


                                            </p>

                                        </div>

                                        <div class="col-md-6">
                                            @php
                                            function tgl_indo($tanggal) {
                                                $bulan = array (
                                                1 =>   'Januari',
                                                'Februari',
                                                'Maret',
                                                'April',
                                                'Mei',
                                                'Juni',
                                                'Juli',
                                                'Agustus',
                                                'September',
                                                'Oktober',
                                                'November',
                                                'Desember'
                                                );
                                                $split = explode('-', $tanggal);
                                                return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                                            }
                                            @endphp

                                                <span>

                                                 {{ tgl_indo($Data['msg']['date']) }}
                                                </span>
                                                <table>

                                                    <tr>

                                                      <td>No</td>

                                                      <td style="padding-left: 10px;padding-right: 10px;">:</td>

                                                      <td>{{$Data['msg']['penawaran']['code']}}</td>

                                                  </tr>

                                                  <tr>

                                                      <td>Perihal</td>

                                                      <td style="padding-left: 10px;padding-right: 10px;">:</td>

                                                      <td>Penawaran Produk</td>

                                                  </tr>

                                                </table>
                                           

                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">

                                      <h3 style="margin: 10px;"><b>SURAT PENAWARAN</b></h3>

                                  </div>

                                  <div class="col-md-12">

                                    @if($Data['msg']['penawaran']['text_top'] == null || $Data['msg']['penawaran']['text_top'] == '')

                                      Dengan hormat, <br>

                                      Kami dari Maxipro selaku supplier mesin perlengkapan cetak, dengan ini mengajukan penawaran harga untuk mesin - mesin yang mungkin anda butuhkan. Adapun mesin yang ingin kami tawarkan kepada anda sebagai berikut :

                                      @else

                                      {!! $Data['msg']['penawaran']['text_top'] !!}

                                      @endif

                                  </div>

                                <div class="col-md-12">

                                    @foreach($Data['msg']['penawaran_barang'] as $index =>$result)

                                        <table style="width: 100%;margin-top: 10px;margin-bottom: 10px;" border="1" align="center">

                                            <tr style="background: red;color: #fff;">

                                                <td colspan="3" class="text-center" style="padding: 10px;"><b>{{$result['name']}}</b></td>

                                            </tr>

                                            <tr>

                                                <td class="text-center" style="padding: 10px;width: 35%;border: 1px solid #000;"><img src="
                                                    https://maxipro.id/images/barang/{{ $result['image'] }}" alt="" class="img-responsive" style="width: 350px;margin: auto;"></td>

                                                    <td style="padding: 10px;width: 35%;border: 1px solid #000;">
                                                        @php
                                                        $spesification = $Data['msg']['penawaran_detail'][$index]['spesification'];
                                                        // Hapus tag HTML dari variabel spesification
                                                        $spesification = strip_tags($spesification);
                                                        echo $spesification;
                                                        @endphp
                                                    </td>
                                                    <td style="padding: 10px;width: 30%;border: 1px solid #000;">Rp. {{ $Data['msg']['penawaran_detail'][$index]['price'] }}</td>

                                            </tr>
                                           

                                         </table>

                                    @endforeach

                                </div>

                                <div class="col-md-12" style="margin-bottom: 30px;">

                                    @if($Data['msg']['penawaran']['text_middle']== null || $Data['msg']['penawaran']['text_middle']== '')

                                      Demikian surat penawaran ini, kiranya surat penawaran ini bisa menjadi bahan pertimbangan anda. Bila ada yang kurang jelas jangan segan untuk menghubungi kami. Anda bisa juga melihat produk kami yang lain di website kami (http://www.maxipro.co.id). Terima kasih atas perhatiannya.

                                      @else

                                      {!! $penawaran->text_middle !!}

                                      @endif

                                </div>

                                <div class="col-md-12" style="margin-bottom: 30px;">

                                      @if($Data['msg']['penawaran']['text_bothbottom'] == null || $Data['msg']['penawaran']['text_bothbottom'] == '')

                                      <p>Syarat dan ketentuan berlaku :</p>

                                      @if($Data['msg']['penawaran']['ppn'] == '1')

                                          <p>1. Garansi free service 1 tahun. Tidak termasuk garansi sparepart (Garansi hanya berlaku pembelian mesin).</p>

                                          <p>2. Harga belum termasuk ongkos kirim Bahan, Sparepart, Kecuali Mesin Dalam Wilayah Kota Surabaya & Kota Jakarta Free (Diluar itu ditanggung customer).</p>

                                          <p>3. Harga sudah include PPN dan Nett (Kecuali bahan dan sparepart).</p>

                                          <p>4. Harga sewaktu - waktu bisa berubah.</p>

                                          <p>5. Jika pemanggilan teknisi ada diluar kota Surabaya atau Jakarta akan dikenakan biaya transportasi serta akomodasi(setiap biaya akomodasi dan transportasi akan berbeda tergantung wilayah kota).</p>

                                          <p>6. Diluar masa garansi dikenakan biaya sebesar Rp. 150.000 - Rp. 500.000, tergantung tingat kerusakan. Harga belum termasuk sparepart (Jika dalam waktu kurang dari 2 minggu kerusakan yang sama terjadi kembali maka biaya service masih free).</p>

                                          @else

                                          <p>1. Garansi free service 1 tahun. Tidak termasuk garansi sparepart (Garansi hanya berlaku pembelian mesin).</p>

                                          <p>2. Harga belum termasuk ongkos kirim Bahan, Sparepart, Kecuali Mesin Dalam Wilayah Kota Surabaya & Kota Jakarta Free (Diluar itu ditanggung customer).</p>

                                          <p>3. Harga Nett (Kecuali bahan dan sparepart).</p>

                                          <p>4. Harga sewaktu - waktu bisa berubah.</p>

                                          <p>5. Jika pemanggilan teknisi ada diluar kota Surabaya atau Jakarta akan dikenakan biaya transportasi serta akomodasi(setiap biaya akomodasi dan transportasi akan berbeda tergantung wilayah kota).</p>

                                          <p>6. Diluar masa garansi dikenakan biaya sebesar Rp. 150.000 - Rp. 500.000, tergantung tingat kerusakan. Harga belum termasuk sparepart (Jika dalam waktu kurang dari 2 minggu kerusakan yang sama terjadi kembali maka biaya service masih free).</p>

                                      @endif

                                      @else

                                      {{ $Data['msg']['penawaran']['text_bothbottom'] }}

                                      @endif

                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        @if( $Data['msg']['penawaran']['text_bottom'] == null ||  $Data['msg']['penawaran']['text_bottom'] == '')

                                        <p>

                                          Keterangan :<br>

                                          Pembayaran Maxipro ke {{$Data['msg']['penawaran']['name_account']}} :<br>

                                          {{$Data['msg']['penawaran']['name_bank']}} :   {{$Data['msg']['penawaran']['number_bank']}} atas nama {{$Data['msg']['penawaran']['account_bank']}}<br>



                                      </p>

                                      @else

                                      {!!  $Data['msg']['penawaran']['text_bottom'] !!}

                                      @endif

                                  </div>   

                                  <div class="col-md-6"style="text-align: right;">

                                      Best Regards,<br><br><br><br>

                                      {{$username['data']['teknisi']['name']}}

                                  </div> 
                                </div>
                                <div class="col-md-12" style="margin-top: 30px;">

                                     <hr style="border-top: 3px solid #f00;">

                                    <div class="row">
                                        <div class="col-md-3">

                                            <p>

                                              <b>Telp/WhatsApp :</b><br>

                                              081-5900-5000

                                          </p>

                                        </div>
                                        <div class="col-md-3">

                                            <p>

                                              <b>Surabaya :</b><br>

                                              Jl. Lebak Sari <br>

                                              Pergudangan Lebak Sari Kav AA

                                          </p>

                                        </div>
                                            <div class="col-md-3">

                                                <p>

                                                  <b>Jakarta :</b><br>

                                                  Jl. Pangeran Jayakarta Kompleks Hotel Orchardz Kavling 35

                                                </p>

                                            </div>

                                            <div class="col-md-3">

                                                <p>

                                                  <b>Website :</b><br>

                                                  www.maxipro.co.id<br>

                                                  <b>Email :</b><br>

                                                  sales@maxipro.co.id

                                                </p>

                                            </div>
                                  </div>

                                 </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection