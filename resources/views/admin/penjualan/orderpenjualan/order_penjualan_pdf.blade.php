<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Order Penjualan {{ $Data['msg']['penawaran']['no_transaksi'] }}-{{ $Data['msg']['customer_new'][0]['name'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        .header1 {
            text-align: right;
            margin-bottom: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details, .footer {
            width: 100%;
            margin-top: 20px;
        }
        .details td {
           
            padding: 5px;
        }
        .details2, .footer {
            width: 100%;
            border: none;
        }
        .details2 tr {
           
            border: none;
        }
        .details2 td {
           
            padding: 5px;
        }
        .details3 td {
            border: none;
            padding: 5px;
        }
        .details1 td {
            border: none;
            padding: 5px;
        }
        .footer td {
            border: none;
            text-align: left;
            vertical-align: top;
        }
        .total {
            text-align: right;
        }
        .right {
            text-align: right;
        }
    </style>
</head>
<body>
        
            
            
            
            
        
        <table class="details1">
        <tr>
            <td>
                <img src="https://maxipro.id/images/website/logo-pt-maxipro-group-indonesia-20200818104657.png" alt="Logo PT Maxipro Group Indonesia" width="200" height="60">
            </td>
            <td colspan="4">
                <!-- Leave this empty or add content here if needed -->
            </td>
            <td style="text-align: right; vertical-align: top;">
                <strong style="font-size: 16px;">PT. Maxipro Group Indonesia</strong> <br>
                <span style="font-size: 14px; font-weight:bold;">Whatsapp: 081 5900 5000</span> <br>
                <a href="https://www.maxipro.co.id" target="_blank" style="color: blue; text-decoration: none; font-size: 14px;">www.maxipro.co.id</a>
            </td>
        </tr>


        
        </table>
            
    
    <div class="header">
        <h2>ORDER PENJUALAN</h2>
      
    </div>

    <table class="details">
        <tr>
            <td><strong>Nama</strong></td>
            <td>{{ $Data['msg']['customer_new'][0]['name'] }}</td>
            <td><strong>Tanggal</strong></td>
            @php
                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                $formattedDate = \Carbon\Carbon::parse($Data['msg']['penawaran']['tgl_transaksi'])->translatedFormat('d M Y');
            @endphp
            <td>{{ $formattedDate }}</td>
            <td><strong>Invoice No</strong></td>
            <td>{{ $Data['msg']['penawaran']['no_transaksi'] }}</td>
        </tr>
        <tr>
            <td><strong>Perusahaan</strong></td>
            <td>{{ $Data['msg']['customer_new'][0]['nama_perusahaan'] }}</td>
            <td><strong>Service By</strong></td>
            <td></td>
            <td><strong>Sales</strong></td>
            <td>{{ $Data['msg']['sales']['name'] }}</td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>{{ $Data['msg']['customer_new'][0]['alamat_penagihan'] }}</td>
            <td colspan=4><strong>Alamat Pengiriman</strong></td>
            
            
        </tr>
        <tr>
            <td><strong>Kota</strong></td>
            <td>{{ $Data['msg']['customer_new'][0]['kota_perusahaan'] }}</td>
            <td colspan=4 rowspan=3 style="text-align: center;"> {{ $Data['msg']['customer_new'][0]['alamat_pengiriman'] }} </td>        
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td>0{{ $Data['msg']['customer_new'][0]['tlp_perusahaan'] }}</td>
         
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $Data['msg']['customer_new'][0]['email'] }}</td>
        </tr>
    </table>

    <table class="details">
        <thead>
            <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Harga</th>
                <th>Discount</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
            $row=0;
            $total=0;
            $diskon=0;
            @endphp
                @foreach($Data['msg']['detail'] as $index_offer =>$result_offer)
                <tr>
                    @php
                        $row +=1;
                        $total += $result_offer['subtotal'];
                        $diskon += $result_offer['disc'];
                    @endphp
                    <td class="left">{{ $row }}</td>
                    <td class="left">  <img src="https://maxipro.id/images/barang/{{ $Data['msg']['foto'][$index_offer]['image'] }}" 
             alt="Image" 
             style="max-width: 100px; height: auto;"></td>

                    <td class="left">{{ $result_offer['name_item'] }}</td>
                    <td class="right">{{ $result_offer['qty'] }}</td>
                    
                    <td class="right">Pcs</td>
                    <td class="right">{{ 'Rp ' . number_format($result_offer['price'], 0, ',', ',') }}</td>
                    <td class="right">{{ 'Rp ' . number_format($result_offer['disc'], 0, ',', ',') }}</td>
                    <td class="right">{{ 'Rp ' . number_format($result_offer['subtotal'], 0, ',', ',') }}</td>


                    
                    

                </tr>
                @endforeach
            
            
        </tbody>
    </table>
    <table class="details2" >
        <tbody>
            <tr >
                <td class="right" rowspan="4" colspan="6" style="width: 70%; text-align: center; vertical-align: middle;">
                    <strong>BCA Cab KCU Veteran Surabaya</strong><br>
                    <strong>0103 800 100</strong> <br>
                    <strong>PT. Maxipro Group Indonesia</strong>
                </td>
                <td class="right" style="width: 15%;">Subtotal</td>
                <td class="right" style="width: 14%;">{{ 'Rp ' . number_format($total, 0, ',', ',') }}</td>
            </tr>
            <tr>
                <td class="right" style="width: 15%;">Diskon</td>
                <td class="right" style="width: 14%;">{{ 'Rp ' . number_format($diskon, 0, ',', ',') }}</td>
            </tr>
            <tr>
                <td class="right" style="width: 15%;">PPN</td>
                @php
                $ppn = ($total-$diskon) *0.11;
                @endphp
                <td class="right" style="width: 14%;">{{ 'Rp ' . number_format($ppn, 0, ',', ',') }}</td>
            </tr>
            <tr>
                <td class="right" style="width: 15%;">Total</td>
                @php
                $total_jumlah = $total+$ppn;
                @endphp
                <td class="right" style="width: 14%;">{{ 'Rp ' . number_format($Data['msg']['penawaran']['subtotal'], 0, ',', ',') }}</td>
            </tr>
            
        </tbody>
    </table>



  

    
    <table class="details2" style="width: 100%; border-collapse: collapse; border: 1px solid black;">
    <!-- Baris Keterangan Pembayaran -->
    <tr>
        <td colspan="5" style="width: 70%; text-align: left; vertical-align: top; border: 1px solid black; padding: 5px;">
            <strong>Keterangan Pembayaran:</strong>
        </td>
        <td colspan="2" rowspan=1 style="text-align: center; border: 1px solid black; vertical-align: top; padding: 5px;">
            <strong>Hormat Kami</strong>
        </td>
        <td colspan="1"rowspan=1 style="text-align: center; border: 1px solid black; vertical-align: top; padding: 5px;">
            <strong>Pembeli</strong>
        </td>
    </tr>
    <!-- Baris Isi Kosong -->
    <tr>
        <td colspan="5" style="width: 70%; text-align: left; vertical-align: top; border: 1px solid black; height: 50px;">{{ $Data['msg']['penawaran']['keterangan'] }}</td>
        <td colspan="2" rowspan=3 style="text-align: center; border: 1px solid black; height: 50px;"></td>
        <td colspan="1" rowspan=3 style="text-align: center; border: 1px solid black; height: 50px;"></td>
    </tr>
    <!-- Baris Keterangan Pengiriman -->
    <tr>
        <td colspan="5" style="width: 70%; text-align: left; vertical-align: top; border: 1px solid black; padding: 5px;">
            <strong>Keterangan Pengiriman:</strong>
        </td>
        <!-- <td colspan="3" style="border:none;"></td> -->
        
    </tr>
    <!-- Baris Footer -->
    <tr>
        <td colspan="5" rowspan=2 style="width: 20%; text-align: left; vertical-align: top;  50px;">{{ $Data['msg']['penawaran']['keterangan_pengiriman'] }}</td>
     
    </tr>
    <tr>
        
        <td colspan="2" style="text-align: center; border: 1px solid black; height: 20px;">
        <strong><i>{{ !empty($Data['msg']['orang']['name']) ? $Data['msg']['orang']['name'] : '' }}</i></strong>

        </td>
        <td colspan="1" style="text-align: center; border: 1px solid black; height: 20px;">
        <strong><i>{{ $Data['msg']['customer_new'][0]['name'] }}</i></strong>
        </td>
    </tr>
</table>

<table class="details3">
    <tr>
    <td colspan="8" style="font-weight: bold; font-style: italic; text-align: left; padding: 5px;">
    *Barang yang sudah dibeli tidak bisa ditukarkan / dikembalikan
</td>

    </tr>
</table>
    
</body>
</html>
