<!DOCTYPE html>

<html>

<head>

    <title>Penawaran Produk - SPN</title>

    <style type="text/css">

        @page { margin: 0px; }

        body { margin-top: 30px;
    margin-bottom: 30px;
     /* Sesuaikan dengan lebar yang diinginkan */
    padding-right: 55px; }
            h1 a {
            text-decoration: none;
        }
        * {

            color: #000;

            font-family: 'Times New Roman', sans-serif;

            font-size: 12px;

            line-height: 18px;

        }

        .container{

            width: 100%;

            padding-left: 30px;

            padding-right: 30px;

        }

        h1.title{

            font-size: 18px;

            margin-bottom: 30px;

        }

        table{

            width: 100%;

            border-collapse: collapse;

            border: 1px;

        }

        .text-center{

            text-align: center;

        }

        .header{

            width: 50%;

        }

        .footer {

            width: 100%;

            bottom: 175px;

        }

        .footer-page-number{

            width: 100%;

            padding: 30px;

            text-align: right;

            position: fixed;

        }

        .pagenum:before {

            content: counter(page);

        }
        .lampiran {
            margin-left:14px;
        }
    </style>

    <script type="text/php">

        

    </script>

</head>

<body>

    <div class="container">

        <img src="{{ public_path('assets/logo/penawaran-header-maxipro.png') }}" alt="Logo Image" style="width: 100%;margin-top: 0;">

   

    </div>

    <div class="container">

        <div class="row">

            <table>

                <tr>

                    <td style="width: 50%;padding: 10px;">

                         Kepada Yth.<br>

                         {{ $Data['msg']['penawaran']['name'] }}<br>
                         {{ $Data['msg']['penawaran']['company'] }}<br>
                         {{ $Data['msg']['penawaran']['address'] }}<br>


                    </td>

                    <td style="width: 50%;padding: 10px;">
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

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <table>

                <tr>

                    <td style="width: 100%;text-align: center;">

                        
                        <h1><a href="www.maxipro.co.id">SURAT PENAWARAN</a></h1>
                    </td>

                </tr>

            </table>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <table>

                <tr>

                    <td style="width: 100%;text-align: left;padding: 10px;">

                             @if($Data['msg']['penawaran']['text_top'] == null || $Data['msg']['penawaran']['text_top'] == '')

                            Dengan hormat, <br>

                            Kami dari Maxipro selaku supplier mesin perlengkapan cetak, dengan ini mengajukan penawaran harga untuk produk yang mungkin anda butuhkan. Adapun produk yang ingin kami tawarkan kepada anda sebagai berikut :

                        @else

                      {!! $Data['msg']['penawaran']['text_top'] !!}

                        @endif

                    </td>

                </tr>

            </table>

        </div>

    </div>
    <div class="container">

<div class="row">
    <table style="margin-top: 10px;margin-bottom: 10px;" border="1" align="center">

     

            
                    <thead>
     

                        <tr style="background: #a40004;color: #fff;">
    
                                            
                            <td  style="padding: 10px;color: #fff;"><b style="color: #fff;">No</b></td>
                            <td  style="padding: 10px;color: #fff;"><b style="color: #fff;">Kode</b></td>                  
                            <td  style="padding: 10px;color: #fff;"><b style="color: #fff;">Nama Barang</b></td>                  
                            <td  style="padding: 10px;color: #fff;"><b style="color: #fff;">Harga</b></td>                  
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=0;
                        @endphp
                        @foreach($Data['msg']['penawaran_barang'] as $index =>$result)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td style="padding: 10px;width: 20%;"> {{ $no }}</td>
                                
                                <td style="padding: 10px;width: 20%;"> {{ $result['new_kode'] }}</td>
                                <td style="padding: 10px;width: 20%;"> {{ $result['name'] }}</td>
                                <td style="padding: 10px;width: 20%;">Rp. {{ $Data['msg']['penawaran_detail'][$index]['price'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>

     



    </table>
    
    </div>

</div>
    <div class="container">

        <div class="row">

            <table>

                <tr>

                    <td style="width: 100%;text-align: left;padding: 10px;">

                         @if($Data['msg']['penawaran']['text_middle']== null || $Data['msg']['penawaran']['text_middle']== '')


                            Demikian surat penawaran ini, kiranya surat penawaran ini bisa menjadi bahan pertimbangan anda. Bila ada yang kurang jelas jangan segan untuk menghubungi kami. Anda bisa juga melihat produk kami yang lain di website kami (http://www.maxipro.co.id). Terima kasih atas perhatiannya.

                        @else

                              {!! $penawaran->text_middle !!}

                        @endif

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <table>

                <tr>

                    <td style="width: 100%;text-align: left;padding: 10px;">

                           @if($Data['msg']['penawaran']['text_bothbottom'] == null || $Data['msg']['penawaran']['text_bothbottom'] == '')

                            <p>Syarat dan ketentuan berlaku :</p>

                                 @if($Data['msg']['penawaran']['ppn'] == '1')

                                <p>1. Garansi free service 1 tahun. Tidak termasuk garansi sparepart.</p>

                                <p>2. Harga FOB Kantor Jakarta & Kantor Surabaya.</p>

                                <p>3. Untuk pembelian mesin, harga sudah termasuk PPN.</p>
                                <!-- 
                                <p>4. Harga sewaktu - waktu bisa berubah.</p>

                                <p>5. Jika pemanggilan teknisi ada diluar kota Surabaya atau Jakarta akan dikenakan biaya transportasi serta akomodasi(setiap biaya akomodasi dan transportasi akan berbeda tergantung wilayah kota).</p>

                                <p>6. Diluar masa garansi dikenakan biaya sebesar Rp. 150.000 - Rp. 500.000, tergantung tingat kerusakan. Harga belum termasuk sparepart (Jika dalam waktu kurang dari 2 minggu kerusakan yang sama terjadi kembali maka biaya service masih free).</p> -->

                            @else

                            <!--     <p>1. Garansi free service 1 tahun. Tidak termasuk garansi sparepart (Garansi hanya berlaku pembelian mesin).</p>

                                <p>2. Harga belum termasuk ongkos kirim Bahan, Sparepart, Kecuali Mesin Dalam Wilayah Kota Surabaya & Kota Jakarta Free (Diluar itu ditanggung customer).</p>

                                <p>3. Harga Nett (Kecuali bahan dan sparepart).</p>

                                <p>4. Harga sewaktu - waktu bisa berubah.</p>

                                <p>5. Jika pemanggilan teknisi ada diluar kota Surabaya atau Jakarta akan dikenakan biaya transportasi serta akomodasi(setiap biaya akomodasi dan transportasi akan berbeda tergantung wilayah kota).</p>

                                <p>6. Diluar masa garansi dikenakan biaya sebesar Rp. 150.000 - Rp. 500.000, tergantung tingat kerusakan. Harga belum termasuk sparepart (Jika dalam waktu kurang dari 2 minggu kerusakan yang sama terjadi kembali maka biaya service masih free).</p> -->
                                <p>1. Garansi free service 1 tahun. Tidak termasuk garansi sparepart.</p>

                                <p>2. Harga FOB Kantor Jakarta & Kantor Surabaya.</p>

                                <p>3. Untuk pembelian mesin, harga sudah termasuk PPN.</p>

                            @endif

                              @else

                                      {{ $Data['msg']['penawaran']['text_bothbottom'] }}

                                      @endif

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <table>

                <tr>

                    <td style="width: 50%;padding: 10px;">

                          @if( $Data['msg']['penawaran']['text_bottom'] == null ||  $Data['msg']['penawaran']['text_bottom'] == '')

                     
                                          Keterangan :<br>

                                          Pembayaran Maxipro ke {{$Data['msg']['penawaran']['name_account']}} :<br>

                                          {{$Data['msg']['penawaran']['name_bank']}} :   {{$Data['msg']['penawaran']['number_bank']}} atas nama {{$Data['msg']['penawaran']['account_bank']}}<br>


                        @else

                             {!!  $Data['msg']['penawaran']['text_bottom'] !!}

                        @endif

                    </td>

                    <td style="width: 50%;padding: 10px;text-align: right;">

                        Best Regards,<br><br><br><br>

                          {{$username['data']['teknisi']['name']}}

                    </td>

                </tr>

            </table>

        </div>

    </div>
    <div class="container">
        <h2 class="lampiran"><b>Lampiran</b></h2>
    </div>
    <div class="container">
        <div class="row">
            <table style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
                @php
                    $counter = 0;
                    $maxColumns = 3; // Adjust this number based on how many columns you want per row
                @endphp
                @foreach($Data['msg']['penawaran_barang'] as $index => $result)
                    @if($counter % $maxColumns == 0)
                        <tr>
                    @endif
                            <td style="border: 1px solid #000; padding: 10px; width: 35%; text-align: center; color: #fff;">
                                <img src="{{ $url }}{{ $result['image'] }}" alt="" style="width: 200px;">
                            </td>
                    @php
                        $counter++;
                    @endphp
                    @if($counter % $maxColumns == 0)
                        </tr>
                    @endif
                @endforeach
                @if($counter % $maxColumns != 0)
                    </tr>
                @endif
            </table>


        </div>
    </div>

</body>

</html>