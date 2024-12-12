@extends('admin.templates_asetjs')
@section('link')

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('style')
<style>
    .with-border {
        border: 1px solid #696868;
        height: 42px;
    }
    .custom-input {
            border: 1px solid #696868;
            width: 50%;
            padding-left: 10px;
    }
    /* CSS untuk gaya select2 custom */
    .empty-row {
        border: none;
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

     .custom-border {
        border: 1px solid #ced4da;
        padding-left: 20px;
    }
    .table-compact td {
        padding: 8px;
    }
    .table-compact td:nth-child(3) {
        padding-left: 10px; /* Atur jarak khusus untuk kolom ketiga */
    }
   
</style>
@endsection

@section('content')

<h4 style="padding-left: 10px;font-weight: 400;">{{ $Data['msg']['pembelianlcl']['invoice'] }}</h4>
<div class="row">
    <div class="col-md-6">
        <div class="row" id="padding-top">
            <table class="table-compact" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 30%; padding-left: 22px;">Tanggal Transaksi</td>
                        <td style="width: 1%;">:</td>
                        <td style="width: 69%;">
                            {{ \Carbon\Carbon::parse($Data['msg']['pembelianlcl']['tgl_transaksi'])->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6" style="text-align:right;">
        <div class="row" id="padding-top">
            <table align="right" class="table-compact" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 65%;">Supplier</td>
                        <td style="width: 1%;">:</td>
                        <td style="width: 34%;">{{ $Data['msg']['pembelianlcl']['supplier']['name'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="row" >
            <table class="table-compact" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 30%; padding-left: 22px;">Cabang</td>
                        <td style="width: 1%;">:</td>
                        <td style="width: 69%;">
                            <!-- Anda dapat mengganti teks di sini sesuai data yang diinginkan -->
                            {{ $Data['msg']['pembelianlcl']['cabang']['name']  }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6" style="text-align:right;">
        <!-- Kosong jika tidak ada data untuk kolom kanan -->
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <table class="table-compact" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 30%; padding-left: 22px;">Sales</td>
                        <td style="width: 1%;">:</td>
                        <td style="width: 69%;">
                            <!-- Anda dapat mengganti teks di sini sesuai data yang diinginkan -->
                            {{ $Data['msg']['pembelianlcl']['teknisi']['name']  }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6" style="text-align:right;">
        <!-- Kosong jika tidak ada data untuk kolom kanan -->
    </div>
</div>
<div class="table-wrapper tabel-ekspedisi">
                                                <table class="responsive-table">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">No.</th>
                                                            <th style="text-align: center;">Image</th>
                                                            <th style="text-align: center;">Kode</th>
                                                            <th style="text-align: center;">Nama Barang</th>
                                                            <th style="text-align: center;">Gudang</th>
                                                            <th style="text-align: center;">Price</th>
                                                            <th style="text-align: center;">Qty</th>
                                                            <th style="text-align: center;">Disc</th>
                                                            <th style="text-align: center;">Subtotal</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody-container-ekspedisi">
                                                       
                                                        @foreach($Data['msg']['pembelianlcl']['detail'] as $index_detail => $detail_lcl)
                                                        <tr>
                                                            <td style="text-align: center;">{{ $index_detail+1 }}</td>
                                                            @php
                                                                $id_image_barang = $detail_lcl['id_barang'];
                                                                $id_gudang_barang = $detail_lcl['id_gudang'];
                                                                $image=0;
                                                                $kode=0;
                                                                $name_barang = 0;
                                                                $name_gudang =0;
                                                                foreach($Data['msg']['image_barang'] as $key_index => $image_detail_barang){
                                                                    if($image_detail_barang['id']==$id_image_barang){

                                                                        $image = $image_detail_barang['image'];
                                                                        $kode = $image_detail_barang['new_kode'];
                                                                        $name_barang = $image_detail_barang['name'];
                                                                    }
                                                                }
                                                                foreach($Data['msg']['gudang'] as $key_index => $gudang_barang){
                                                                    if($gudang_barang['id']==$id_gudang_barang){
                                                                        $name_gudang = $gudang_barang['name'];
                                                                    }
                                                                }
                                                            @endphp
                                                            
                                                            <td style="padding:auto;width:15%;">
                                                                <img src="https:maxipro.id/images/barang/{{ $image }}" class="img-fluid" style="max-width: 20%%; height: auto;" alt="{{ $image }}">
                                                            </td>
                                                            <td style="text-align: center;">{{ $kode }}</td>
                                                            <td style="text-align: center;">{{ $name_barang }}</td>
                                                            <td style="text-align: center;">{{ $name_gudang }}</td>
                                                            <td style="text-align: center;">Rp. {{ $detail_lcl['price_idr'] }}</td>
                                                            <td style="text-align: center;">{{ $detail_lcl['qty'] }}</td>
                                                            <td style="text-align: center;">Rp. {{ $detail_lcl['disc'] }}</td>
                                                            <td style="text-align: center;">Rp. {{ $detail_lcl['subtotal_idr'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr >
                                                            <td colspan="8"style="text-align: right;">Subtotal</td>
                                                            <td style="text-align: center;">Rp. {{ $Data['msg']['pembelianlcl']['subtotal_idr'] }}</td>
                                                        </tr>
                                                        <tr >
                                                            <td colspan="8"style="text-align: right;">Discount %</td>
                                                            <td style="text-align: center;">{{ $Data['msg']['pembelianlcl']['discount'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8"style="text-align: right;">Discount Nominal</td>
                                                            <td style="text-align: center;">{{ $Data['msg']['pembelianlcl']['discount_nominal'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8"style="text-align: right;">PPN 11%</td>
                                                            <td style="text-align: center;">Rp. {{ $Data['msg']['pembelianlcl']['ppn'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8"style="text-align: right;">Total</td>
                                                            <td style="text-align: center;">Rp. {{ $Data['msg']['pembelianlcl']['subtotal_idr'] }}</td>
                                                        </tr>
                                                    
                                                    </tbody>
                                                    <tbody class="tambah-tbody-container-ekspedisi">
                                                    
                                                    
                                                    </tbody>
                                                    
                                                    
                                                </table>
</div>
   
        
    <!-- note -->
     
 
@endsection


@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../assets/js/edit-commercial-invoice/custom_code.js"></script> 
<script src="../assets/js/edit-commercial-invoice/select_choices.js"></script> 



<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../assets/js/edit-commercial-invoice/import_barang.js"></script> 








@endsection
