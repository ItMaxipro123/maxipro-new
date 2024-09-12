@extends('admin.templates_baru')


@section('title')
Penawaran    | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endsection
@section('style')

<style>
    .flatpickr-input {
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 4px;
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
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                         <a href="javascript:void(0)" onclick="tambahPenawaran(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Tambah Penawaran</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" style="width: 10%; margin-right: 5px;" id="clearFilterBtn">Clear Filter</button>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- Modal Filter-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Penawaran</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="dateForm">
                                        <div class="form-group">
                                            <label for="enableDatepicker">Centang untuk Aktifkan Tanggal:</label>
                                            <input type="checkbox" id="checkdatevalue">
                                        </div>
                                        <div class="form-group">
                                            <label for="startDatepicker">Pilih Periode Awal:</label>
                                            <input type="text" value="{{ $Data['msg']['tgl_awal'] }}" class="form-control" id="tgl_awal" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="endDatepicker">Pilih Periode Akhir:</label>
                                            <input type="text" value="{{ $Data['msg']['tgl_akhir'] }}" class="form-control" id="tgl_akhir" disabled>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                    

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="tabe-stok" class="table table-bordered table-striped">
                        <thead>

                        </thead>
                        <tbody>
                            @php
                            $num =1;
                            
                            @endphp
                          
                            <!-- Table data will be populated here -->
                            @foreach($Data['msg']['penawaran'] as $index => $data)

                              

                                @php
                                    // Initialize the array to hold the IDs
                                    $id_barang = [];
                                    $barang_name =[];
                                    $iddd=[];
                                    // Collect all IDs from the detail array
                                    foreach($data['detail'] as $detail) {
                                        $id_barang[] = $detail['id'];
                                        
                                       
                                    }
                                    
                                    
                                    
                                    
                                    
                                @endphp
                                
                            <tr>
                               
                               
                                <td>{{ $num }}</td>
                                <td>{{ $data['code'] }}</td>
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['company'] }}</td>
                                <td>{{ $data['handphone'] }}</td>
                            
                                <td>
                                @foreach($Data['msg']['detail_penawaran'] as $data2)
                                    @if($data2['id_penawaran'] == $data['id'])
                                        {{ $data2['name'] }} <br>
                                    @endif
                                @endforeach
                                </td>
                                  <td>{{ $data['email'] }}</td>
                                @if($data['id_account']===1)
                                <td>Rekening UD</td>
                                @elseif($data['id_account']===2)
                                <td>Rekening PT</td>
                                @else
                                <td>Rekening Stephen</td>
                                @endif
                                
                                <td>
                                    <a href="javascript:void(0)" onclick="updatePenawaran(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit">Edit</a>
                                     <a href="{{ route('admin.printPDF_filter', ['id' => $data['id']]) }}" class="btn btn-large btn-info btn-detail">View</a>
                                     <a href="{{ route('admin.printPDF_filter', ['id' => $data['id']]) }}" class="btn btn-large btn-danger btn-pdf">Export PDF</a>
                                   <a href="javascript:void(0)" onclick="deletePenawaran(this)" data-id="{{ $data['id'] }}" name="{{ $data['name'] }}" class="btn btn-large btn-primary btn-delete">Delete</a>
                                
                                </td>
                            </tr>
                            @php $num++
                            @endphp
                            @endforeach

                        </tbody>

                    </table>

                    <!-- modal tambah penawaran -->
                    <div class="col-sm-12" style="margin-top: 15px;">

                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahModalLabel">Tambah Penawaran</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        
                            <form action="" class="form-horizontal" id="tambahForm" method="get">
                                                    @csrf
                                                    <h4 style="margin-bottom: 10px;">Form Tambah Penawaran</h4>

                                                    
                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama <span style="color: red;">(Wajib Diisi)</span></label>
                                                        <div style="position: relative; width: 100%;">
                                                            <input type="text" class="form-control"name="name_tambah" placeholder="Nama" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Perusahaan <span style="color: red;">(Wajib Diisi)</span></label>
                                                        <div style="position: relative; width: 100%;">
                                                            <input type="text" placeholder="Perusahaan" class="form-control" name="company_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group"id="alamat_tambah" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Alamat <span style="color: red;">(Wajib Diisi)</span></label>
                                                        <div style="position: relative; width: 100%;">
                                                            <input type="text" class="form-control"  name="address_tambah" placeholder="Alamat" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"required>
                                                        </div>
                                                    </div>



                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Handphone <span style="color: red;">(Wajib Diisi)</span></label>
                                                        <div style="position: relative; width: 100%;">
                                                            <input type="number" class="form-control" name="handphone_tambah" placeholder="Handphone" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Email <span style="color: red;">(Wajib Diisi)</span></label>
                                                            <div style="position: relative; width: 100%;">
                                                                <input type="email" class="form-control" name="email_tambah" placeholder="Email" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" required>
                                                            </div>
                                                    </div>

                                                   
                                                    <div class="form-group" style="margin-bottom: 20px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;">Produk Penawaran</label>
                                                         <select class="select select2 select-search form-control" id="product-penawaran-tambah-filter" name="product_penawaran_tambah" style="border: 1px solid #ced4da; width: 100%; display: none;">
                                                            <option value="1" style="text-align: center;">Pilih Produk</option>
                                                            @foreach($Data['msg']['product'] as $index => $product)
                                                            
                                                            <option value="{{ $product['id'] }}" data-id="{{ $product['spesification'] }}" style="text-align: center;" style="text-align: center;">{{ $product['new_kode'] }} - {{ $product['name'] }}</option>
                                                          
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    
                                                
                                                    <div class="form-group" id="pembayaran_tambah_div" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                                    <label class="col-lg-3 control-label" style="font-size: 15px;">Pembayaran:</label>
                                                                    <div style="position: relative; width: 100%;">
                                                                      <input type="radio" name="option_tambah" value="1">
                                                                      <label for="option1">Rekening UD</label><br>
                                                                      <input type="radio" name="option_tambah" value="2">
                                                                      <label for="option1">Rekening PT</label><br>
                                                                      <input type="radio" name="option_tambah" value="3">
                                                                      <label for="option1">Stephen Santoso</label><br>
                                                                    </div>
                                                    </div>

                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                                <label class="col-lg-3 control-label" style="font-size: 15px;">Status PPN:</label>
                                                                <div style="position: relative; width: 100%;">
                                                                  <input type="checkbox" id="checkppn_tambah" name="ppn_tambah" value="1" style="transform: scale(1.5);"checked>


                                                              </div>
                                                    </div>

                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Atas</label>
                                                            <div style="position: relative; width: 100%;">
                                                                
                                                                <textarea class="form-control" name="text_top_tambah" placeholder="Dengan hormat, Kami dari Maxipro selaku supplier mesin perlengkapan cetak, dengan ini mengajukan penawaran harga untuk mesin - mesin yang mungkin anda butuhkan. Adapun mesin yang ingin kami tawarkan kepada anda sebagai berikut :" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"></textarea>

                                                            </div>
                                                    </div>

                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Tengah</label>
                                                            <div style="position: relative; width: 100%;">
                                                                <textarea class="form-control" name="text_middle_tambah" placeholder="Demikian surat penawaran ini, kiranya surat penawaran ini bisa menjadi bahan pertimbangan anda. Bila ada yang kurang jelas jangan segan untuk menghubungi kami. Anda bisa juga melihat produk kami yang lain di website kami (http://www.maxipro.co.id).&#10;Terima kasih atas perhatiannya." style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 120px;"></textarea>

                                                            </div>
                                                    </div>
                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Bawah</label>
                                                        <div style="position: relative; width: 100%;">

                                                           
                                                            <textarea id="keteranganTextAreaTambah" name="text_bottom_tambah" class="form-control" placeholder="Keterangan:&#10;Pembayaran Maxipro ke Rekening:&#10;Bank BCA&#10;0104 300 100&#10;Stephen Santoso" name="text_bottom"style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 9em ;" disabled></textarea>


                                                        </div>
                                                    </div>

                                                        
                                                    <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Syarat dan Ketentuan Berlaku</label>
                                                            <div style="position: relative; width: 100%;">
                                                                <textarea class="form-control" name="text_bothbottom_tambah" placeholder="Demikian surat penawaran ini, kiranya surat penawaran ini bisa menjadi bahan pertimbangan anda. Bila ada yang kurang jelas jangan segan untuk menghubungi kami. Anda bisa juga melihat produk kami yang lain di website kami (http://www.maxipro.co.id).&#10;Terima kasih atas perhatiannya." style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 120px;"></textarea>
                                                        
                                                            </div>
                                                    </div>



                                                    <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                              <button type="submit" id="selecttambahButton" class="btn btn-primary" style="margin-left: auto;">Select
                                                              </button>
                                                    </div>

                            </form>
                                         
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.reload()">Close</button>
                                   
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- modal edit penawaran -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="tabe-stok"></div>

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="gambarModallabel">Edit Penawaran</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="editForm">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
              
                                   
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //untuk membuat perubahan pada text area bila menekan radio button option_tambah
    var radios = document.querySelectorAll('input[name="option_tambah"]');
     radios[1].checked = true;
    var keteranganTextAreaTambah = document.getElementById('keteranganTextAreaTambah');

    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            var selectedValue = this.value;
            switch (selectedValue) {
                case '1':
                    keteranganTextAreaTambah.placeholder = 'Keterangan:\nPembayaran Maxipro ke Rekening:\nBank BCA\n0104 300 100\nStephen Santoso';
                    break;
                case '2':
                    keteranganTextAreaTambah.placeholder = 'Keterangan:\nPembayaran ke Rekening:\nBank BCA\n0103 800 100\nPT Maxipro Group Indonesia';
                    break;
                case '3':
                    keteranganTextAreaTambah.placeholder = 'Keterangan:\nPembayaran Maxipro ke Rekening:\nBank BCA\n0108 800 600\nStephen Santoso';
                    break;
               
            }
        });
    });

    $('#clearFilterBtn').on('click', function() {
    // Arahkan pengguna ke rute lain
    window.location.href = '{{ route('admin.penawaran') }}'; // Ganti 'URL_RUTE_LAIN' dengan URL rute yang diinginkan
})


document.addEventListener('DOMContentLoaded', function() {
    // Initialize Choices.js on the select element
    const element = document.getElementById('product-penawaran-tambah-filter');
    const choices = new Choices(element, {
        searchEnabled: true,
        itemSelectText: '',
    });
   
    // Handle the selection event using Choices.js
    element.addEventListener('addItem', function(event) {
        var data = event.detail;
        var produk = @json($Data['msg']['product']);
        var produk_price = @json($Data['msg']['barang_price']);
        var product_spesifikasi;
        var product_price;
        console.log(data)

        
        if (Array.isArray(produk)) {
        produk.forEach(product => {
            if (product.id == data.value) { // Check if product and product.id exist
            product_spesifikasi=product.spesification;
            console.log('produk id', product.id)
            produk_price.forEach(price => {
                if(product.id == price.id_barang){
                    // console.log('price id_barang',price.id_barang)
                    product_pirce= price.price_list
                }
            });
            }
        });
        } else {
        console.error('produk is not an array');
        }



        

        // Membuat tag input baru
        var newInput = $('<input>').attr({
            type: 'text',
            name: 'selected_product_tambah_display[]',
            value: data.label,
            class: 'form-control',
            style: 'border: 1px solid #ced4da; width: 40%; padding-left: 20px; margin-right: 10px;'
        });

        // Membuat input hidden untuk nilai id
        var newHiddenInput = $('<input>').attr({
            type: 'hidden',
            name: 'selected_product_tambah',
            value: data.value,
            class: 'form-control'
        });
        var formattedValue = formatRupiah(product_pirce);
        var newInput2 = $('<input>').attr({
            type: 'text',
            name: 'price_product_tambah',
            value: product_pirce,
            class: 'form-control',
            style: 'border: 1px solid #ced4da; width: 20%; padding-left: 20px; margin-right: 10px;'
        }).val(formattedValue);
        newInput2.on('input', function() {
            var value = $(this).val().replace(/\D/g, ''); // Menghapus karakter non-digit dari nilai input
            var formattedValue = formatRupiah(value); // Memformat nilai input menjadi format Rupiah
            $(this).val(formattedValue); // Mengatur nilai input sesuai format Rupiah
        });

        // Fungsi untuk memformat nilai menjadi format Rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/\D/g, '');
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            // Tambahkan titik jika angka memiliki ribuan
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            // Cetak hasil
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp. ' + rupiah;
        }

        var paragraphContent = '<p></p>';
        var newInput3 = $('<textarea>').attr({
            type: 'text',
            name: 'spesification_product_tambah',
            placeholder: '<p></p>',
            class: 'form-control',
            style: 'border: 1px solid #ced4da; width: 20%; padding-left: 20px; margin-right: 10px;'
        }).val(product_spesifikasi);

        var deleteButton = $('<button>').attr({
            type: 'button',
            class: 'btn btn-danger',
            style: 'margin-left: 10px;'
        }).text('Delete').click(function() {
            inputsDiv.remove(); // Menghapus div inputsDiv saat tombol di klik
        });

        var inputsDiv = $('<div>').css({
            display: 'flex',
            alignItems: 'center',
            marginBottom: '10px'
        });

        // Menambahkan tag input baru ke dalam div
        inputsDiv.append(newInput, newInput2, newInput3, newHiddenInput, deleteButton);
        // Menambahkan tag input baru ke dalam form
        $('#pembayaran_tambah_div').before(inputsDiv);
    });
});

    $('#tambahForm').submit(function(event) {
        // Mencegah perilaku default formulir
        event.preventDefault();

        // Mengumpulkan data formulir
        var formData = {
            
             name: $('input[name=name_tambah]').val(), // Mengambil value dari elemen name_edit 
                                                     // Note: dibawah Mengikuti name_edit
             company: $('input[name=company_tambah]').val(),
             address: $('input[name=address_tambah]').val(),
             email: $('input[name=email_tambah]').val(),
            pembayaran: $('input[name=option_tambah]:checked').val(),
             handphone: $('input[name=handphone_tambah]').val(),
             text_top: $('textarea[name=text_top_tambah]').val(),
             text_middle: $('textarea[name=text_middle_tambah]').val(),
             text_bottom: $('textarea[name=text_bottom_tambah]').val(),
             text_bothbottom: $('textarea[name=text_bothbottom_tambah]').val(),

              ppn: $('input[name=ppn_tambah]').is(':checked') ? '1' : '0',
             selected_product_edit: $('input[name=selected_product_tambah]').map(function() {
                return $(this).val();
             }).get(),
             price_product_edit: $('input[name=price_product_tambah]').map(function(){
                return $(this).val();
             }).get(),
             spesification_product_edit: $('textarea[name=spesification_product_tambah]').map(function(){
                return $(this).val();
             }).get(),
            // status: $('select[name=status]').val()
        };
        
        // Mengirim permintaan AJAX
        $.ajax({
            type: 'GET',
            url: '{{ route('admin.tambah_penawaran') }}', // Ganti URL_TARGET dengan URL tujuan Anda
            data: formData,
            success: function(response) {
                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
               console.log(response);
                if(response !== null){
                     
                     Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Penawaran berhasil ditambah!',
                    }).then((result) => {
                        // Mengalihkan halaman ke halaman tertentu setelah mengklik OK pada SweetAlert
                        window.location.reload();
                    });
                }
                else{
                    console.log(response);
                     Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Penawaran Gagal ditambah!',
                    });
                }
                 
            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan jika terjadi
                console.error(error);
            }
        });
    });

</script>

<!-- untuk load datatable -->
<script>
    
    $(document).ready(function() {
        $('#tabe-stok').DataTable({

            "dom": '<"top"lf>rt<"bottom"ip><"clear">', // Mengatur posisi elemen filter/search
            "language": { // Menyesuaikan teks placeholder
                "searchPlaceholder": "Cari...",
                "search": "Cari:",
                "paginate": {
                    "previous": "back", // Ganti teks untuk tombol "previous"
                    "next": "next" // Ganti teks untuk tombol "next"
                }
            },

            columns: [{
                    data: 'num',
                    title: 'No'
                },
                {
                    data: 'code',
                    title: 'Kode'
                },
                  {
                    data: 'name',
                    title: 'Nama'
                },
                {
                    data: 'company',
                    title: 'Perusahaan'
                },
                {
                    data: 'handphone',
                    title: 'No Handphone'
                },
                {
                    data: 'barang',
                    title: 'Barang'
                },
                {
                    data: 'email',
                    title: 'Email'
                },
                {
                    data: 'id_account',
                    title: 'Pembayaran'
                },
             
                {
                    data: 'link',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        return '<a href="' + data + '</a>';
                    }
                }

            ],
            "initComplete": function(settings, json) {

                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...'); // Menyesuaikan placeholder
            }
        });
    });
</script>

<script>
    // Menangani peristiwa klik pada tombol "Filter"
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });

        function detailPenawaran(element) {
          var id = $(element).data('id');
          console.log(id);

          var url = "{{ route('admin.detailview_penawaran_filter') }}";

          $.ajax({
            url: url,
                type: 'GET', // Menggunakan metode POST
                data: {

                    id: id
                },
                success: function(response) {
                    
                    // Handle response jika sukses
                    var newRoute = "{{ route('admin.detailview_penawaran_filter') }}";
                    window.location.href = newRoute;

                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    return;
                }
            });
        }

    // Menangani klik pada tombol Edit
    function updatePenawaran(element) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);

        var url = "{{ route('admin.editview_penawaran_filter') }}";

        $.ajax({
            url: url,
            type: 'GET', // Menggunakan metode POST
            data: {

                id: id
            },
            success: function(response) {
                // Handle response jika sukses

                $('#editForm').html(response);
                // Tampilkan modal
                $('#editModal').modal('show');
               
            },
            error: function(xhr, status, error) {
                // Handle error jika terjadi kesalahan
                console.error(xhr.responseText);
                return;
            }
        });
    }

    // Menangani klik pada tombol tambah
    function tambahPenawaran(element) {
        event.preventDefault();
     $('#tambahModal').modal('show'); // Tampilkan modal
    }

   


    function deletePenawaran(element) {
    event.preventDefault();
    var id = $(element).data('id');
    var penawaranName = $(element).attr('name');

    // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin menghapus penawaran ini " + penawaranName + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.hapus_penawaran_filter') }}";

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    // Handle response jika sukses
                    console.log(response);

                    // Hapus data berdasarkan elemen, element berupa id
                    $(element).closest('tr').remove();

                    // Tampilkan SweetAlert2 ketika berhasil dihapus
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    return;
                }
            });
        }
    });
}


</script>

<!-- digunakan untuk pick date filter -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<!-- untuk mengaktifkan input tanggal di filter -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkdatevalue = document.getElementById('checkdatevalue');
        const tgl_awal = document.getElementById('tgl_awal');
        const tgl_akhir = document.getElementById('tgl_akhir');
        console.log(checkdatevalue);
        // Atur event listener untuk perubahan pada checkbox
        checkdatevalue.addEventListener('change', function() {
            // Jika checkbox dicentang, aktifkan kedua datepicker
            if (checkdatevalue.checked) {
                checkdatevalue.value = 'checked';
                tgl_awal.disabled = false;
                tgl_akhir.disabled = false;
                // Inisialisasi Flatpickr
                flatpickr(tgl_awal, {
                    dateFormat: 'Y-m-d'
                });
                flatpickr(tgl_akhir, {
                    dateFormat: 'Y-m-d'
                });
            } else {
                // Jika tidak, nonaktifkan kedua datepicker
                tgl_awal.disabled = true;
                tgl_akhir.disabled = true;
                // Hapus Flatpickr instance jika sudah ada
                if (tgl_awal._flatpickr) {
                    tgl_awal._flatpickr.destroy();
                }
                if (tgl_akhir._flatpickr) {
                    tgl_akhir._flatpickr.destroy();
                }
            }
        });
    });
</script>

<!-- untuk memproses input tanggal di filter -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani klik pada tombol "Save changes"
        document.getElementById('saveChangesBtn').addEventListener('click', function() {
            // Mendapatkan nilai input
            var checkdatevalue = document.getElementById('checkdatevalue').value;
            var tgl_awal = document.getElementById('tgl_awal').value;
            var tgl_akhir = document.getElementById('tgl_akhir').value;

            // Membuat query string dari data yang akan dikirim
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir);

            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.penawaran_filter') }}" + '?' + queryString;

            // Mengirim permintaan GET ke server
            fetch(url)
                .then(response => {
                    // Memeriksa status respons
                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan saat mengambil data: ' + response.statusText);
                    }
                    // Mengembalikan respons dalam bentuk teks
                    return response.text();
                })
                .then(data => {
                    // Tambahkan kode untuk menangani respons dari server
                    console.log(data);

                    // Memuat ulang halaman

                    var reloadUrl = "{{ route('admin.penawaran_filter') }}" + '?' + '&checkdatevalue=' + encodeURIComponent(checkdatevalue) + '&tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir);
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

@endsection