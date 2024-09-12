@extends('admin.templates')


@section('title')
FCL Container    | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Choices.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection
@section('style')

<style>
    /* Gaya untuk elemen overlay */
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Hitam dengan opacity 0.5 */
    z-index: 9999; /* Pastikan lebih tinggi dari elemen lain */
}

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
    #tabe-stok {
        border-collapse: collapse; /* Ensure borders collapse */
        width: 100%; /* Set table width to fill its container */
    }

    #tabe-stok th,
    #tabe-stok td {
        padding: 5px; /* Adjust padding as needed */
        border: 1px solid #ddd; /* Add border */
        overflow: auto; /* Enable overflow */
        word-wrap: break-word; /* Wrap long words */
    }


     #tabe-stok-hitung-kubik {
        background-color: #f0f0f0;
        /* Ganti dengan warna yang Anda inginkan */

    }
    #tabe-stok-hitung-kubik {
        border-collapse: collapse; /* Ensure borders collapse */
        width: 100%; /* Set table width to fill its container */
    }

    #tabe-stok-hitung-kubik th,
    #tabe-stok-hitung-kubik td {
        padding: 5px; /* Adjust padding as needed */
        border: 1px solid #ddd; /* Add border */
        overflow: auto; /* Enable overflow */
        word-wrap: break-word; /* Wrap long words */
    }


    .dataTables_filter input[type="search"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        /* Opsional: untuk membuat sudut border melengkung */
        padding: 5px;
        /* Opsional: untuk memberi jarak antara border dan teks */
    }

    

 

    /* Style untuk tombol Delete */
    .btn-delete {
        width: 15%;
        /* Lebar default */
    }

    /* Mengatur lebar tombol saat layar berukuran kecil (misalnya pada perangkat mobile) */
    @media only screen and (max-width: 600px) {
        .btn-delete {
            width: 40%;
            /* Mengisi lebar penuh */
        }
    }

       .color-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-left: 5px;
            margin-bottom: 10px;
            vertical-align: middle;
        }

        .bg-light-yellow {
            background-color:#fff17a; /* Light yellow color */
        }
         .bg-light-blue {
            background-color:#97ebfb; /* Light blue color */
        }
           .bg-light-green {
            background-color: #6cf670; /* Light green color */
        }
          .bg-light-red {
            background-color: #feb3aa; /* Light red color */
        }
         .bg-light-grey {
            background-color: #f4f7f7; /* Light grey color */
        }

        .tooltip-container {
             position: relative;
             display: inline-block;
         }

         .tooltip-container .tooltip-text {
             visibility: hidden;
             width: 120px;
             background-color: black;
             color: #fff;
             text-align: center;
             border-radius: 6px;
             padding: 5px 0;
             position: absolute;
             z-index: 1;
             bottom: 125%; /* Position the tooltip above the button */
             left: 50%;
             margin-left: -60px; /* Center the tooltip */
             opacity: 0;
             transition: opacity 0.3s;
         }

         .tooltip-container:hover .tooltip-text {
             visibility: visible;
             opacity: 1;
         }
</style>

@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp FCL</h4>
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">FCL {{ $username['data']['teknisi']['name'] }}</small>
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" onclick="tambahRestok(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Hitung Kubikasi</a>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Order Pembelian</h5>
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
                                           <div class="form-group">
                                            <label for="kodebaranglabel">Kode Barang</label>
                                            <input type="text" class="form-control" placeholder="Kode Barang"  id="kode_barang"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                        </div>
                                         <div class="form-group">
                                            <label for="namabaranglabel">Nama Barang</label>
                                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" id="id_nama_barang"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                        </div>
                                         

                                    </form>
                                </div>

                                <div class="modal-footer">

                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    <!-- code diatas untuk modal bootstrap 4 -->

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- code diatas untuk modal bootstrap 5 -->

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="radio-button-container">
                        <label>
                            <div class="color-box bg-light-yellow"></div>
                            <input type="radio" name="filter" value="requested" id="filter-status" {{ $Data['msg']['request_check'] == 'requested' ? 'checked' : '' }}>
                            Request
                            
                        </label>
                        <label>
                            <div class="color-box bg-light-blue"></div>
                            <input type="radio" name="filter" value="process" id="filter-status" {{ $Data['msg']['request_check'] == 'process' ? 'checked' : '' }}>
                            Process
                          
                        </label>
                        

                    </div>

                    <div id="reload-icon" style="display: none; text-align: center; font-size: 30px;">
                        <i class="fas fa-sync-alt"></i> Reloading...
                    </div>
                      
                    <table id="tabe-stok">
                        <thead>
                            <!-- Add table headers if needed -->
                        </thead>
                        <tbody>
                            @php
                            $num = 1;
                              $total        = 0;
                            @endphp
                            <!-- Table data will be populated here -->
                            @foreach($Data['msg']['fclcontainer'] as $index => $data)
                            
                            @php

                                $number       = $number + 1;

                                $total        = 0;

                                foreach($data['detail'] as $resultdetail){

                                foreach ($resultdetail['detailcommercial'] as $key => $commercialdetail) {

                                    foreach ($commercialdetail->detail as $key => $finalprice) {

                                    if($finalprice->total_price_usd == 0){

                                        if($result->status_rate == '1'){

                                        $price     = $finalprice->total_price_without_tax / $result->rate;

                                        }else{

                                        $price     = $finalprice->total_price_without_tax;

                                        }
                                        
                                    }else{

                                        $price     = $finalprice->total_price_usd;

                                    }



                                    $total      = $total + $price;

                                    }

                                }

                                }



                                if($result->status_process == 'complete'){

                                $bgcolor      = 'background-color: #4bf32175;';

                                }elseif($result->status_process == 'requested'){

                                $bgcolor      = 'background-color: #1ab8e88f;';

                                }else{

                                $bgcolor      = 'background-color: #ff00008f;';

                                }

                                @endphp

                            @php
                            \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                            $formattedDate = \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y');
                           $rowStyle = '';
                            if ($data['status_process'] == 'requested') {
                                $rowStyle = 'background-color: #fff17a;';
                            } elseif ($data['status_process'] == 'process') {
                                $rowStyle = 'background-color: #feb3aa;';
                            }
                            elseif ($data['status_process'] == 'complete') {
                                $rowStyle = 'background-color: #6cf670;';
                            }                            
                            @endphp
                        <tr style="{{ $rowStyle }}">
                            
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $num }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $formattedDate }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['invoice_no'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['company'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['telp'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 150px; text-overflow: ellipsis;"> {{$data['freight_cost'] + $data['insurance'] + round($total, 2)}}</td>
                       
                       
                            <td style="border: 1px solid #d7d7d7;">
                                @if($data['status_process'] == 'requested')
                                <a href="javascript:void(0)" onclick="updateRestok(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;"title="Edit"> <i class="fas fa-edit"></i></a>
                                @else
                                <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit"><i class="bi bi-pencil"></i></a>
                                @endif
                                <a href="javascript:void(0)" 
                                onclick="rejectOrderPembelian(this)" 
                                data-id="{{ $data['id'] }}" 
                                name="{{ $data['invoice_no'] }}" 
                                class="btn btn-large btn-info btn-danger" 
                                style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="Reject Order">
                                <i class="fas fa-times"></i>
                                  </a>
                                <a href="javascript:void(0)" onclick="deleteOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="Delete"><i class="fas fa-trash-alt"></i></a>

                            </td>
                        </tr>


                            @php
                            $num++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
 

                  
                    <!-- modal edit restok -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        <div id="tabe-stok"></div>

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                       

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="Formedit">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload()" >Close</button>
                                   
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- untuk load datatable -->
<script>
      document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_jenis');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });

        // Enable/disable date inputs based on checkbox state
        
    });

        //button clear Filter 
    $('#clearFilterBtn').on('click', function() {


            window.location.href = '{{ route('admin.pembeliaan_restok') }}'; 
    })

    //untuk membuat datatable
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
                    data: 'tgl_transaksi',
                    title: 'Tanggal'
                },
                {
                    data: 'invoice',
                    title: 'Invoice'
                },
                {
                    data: 'supplier',
                    title: 'Supplier'
                },
                {
                    data: 'sales',
                    title: 'Sales'
                },
                {
                    data: 'cabang',
                    title: 'Cabang'
                },
                 {
                    data: 'subtotal_idr',
                    title: 'Total'
                },
                 {
                    data: 'tgl_pengiriman',
                    title: 'Tanggal Pengiriman'
                },
                 {
                    data: 'ekspedisi',
                    title: 'Ekspedisi'
                },
                 {
                    data: 'resi',
                    title: 'Resi'
                },
                 {
                    data: 'harga',
                    title: 'Harga'
                },
                  {
                    data: 'category',
                    title: 'Kategori'
                },
                {
                    data: 'convert',
                    title: 'Convert'
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
    // proses pengecekan stok
    $(document).ready(function() {
        
        // Event listener for dropdown change
        $('#product-restok-tambah-filter').change(function() {
            // Get selected value
            
             var selectedProductId = $(this).val();
        
            // Check if the selected value is not the default option
            if (selectedProductId !== ""){
                       
                // AJAX request
                $.ajax({
                    url: '{{ route('admin.pembelian_restok_getstok_filter') }}', // Replace with your server endpoint URL
                    type: 'GET',
                    data: { id_product: selectedProductId },

                    success: function(response) {
                       
                       
                        if ($.isEmptyObject(response)) {//bila response {}
                              function appendImage() {
                                var img = $('<img>').attr('src', "https://maxipro.id/images/placeholder/basic.png").css('width', '70px').css('height', '70px');
                                $('#new-input-container-gambar').empty().append(img);
                            }
                              appendImage(); 
                            var emptyTable = $('<table>').addClass('table').css('border', '1px solid black');
                            var emptyRow = $('<tr>').append($('<td>').text('Stok Kosong'));
                            emptyTable.append(emptyRow);
                            $('#new-input-container').empty(); // Menghapus tabel dari #new-input-container
                            $('#new-input-container2').empty();
                             // $('#new-input-container-gambar').empty();
                            $('#new-input-container-kosong').html(emptyTable);
                          // Clear the second table as well
                        }
                        else {
                            //bila response ! {}
                           var countstokPT =0;
                           var countstokUD =0;
                           var countStokTotal=0;
                            function appendImage() {
                                var img = $('<img>').attr('src', response.msg.image).css('width', '270px').css('height', '270px');
                                $('#new-input-container-gambar').empty().append(img);
                            }
                           // $('#new-input-container-gambar').append(img);
                             if (response.msg.countStokPT !== 0 || response.msg.countStokUD !== 0) {
                                appendImage(); 
                            // Replace the new table with the container
                            if (response.msg.countStokPT !== 0) {

                                var newTable = $('<table>').addClass('table').css('border', '1px solid black');

                                // Create table header
                                var tableHeader = $('<thead>').append($('<tr>').append($('<th>').text('Database PT').addClass('header-class').attr('colspan', '2').css('border', '1px solid black')));

                                // Create table body
                                var tableBody = $('<tbody>');

                                // Loop through each stok product UD and create table rows and cells for body
                                    var rowtitle1 = $('<tr>');
                                    rowtitle1.append($('<td>').text('Gudang').css('border', '1px solid black'));
                                    rowtitle1.append($('<td>').text('Qty').css('border', '1px solid black'));
                                    tableBody.append(rowtitle1);
                                response.msg.stokproduct.forEach(function(item) {
                                
                                    var row = $('<tr>');
                                    row.append($('<td>').text(item.name_gudang).css('border', '1px solid black'));
                                    row.append($('<td>').text(item.stok_gudang).css('border', '1px solid black'));
                                    tableBody.append(row);

                                     countstokPT += parseInt(item.stok_gudang, 10);

                                });
                                var rowtotalpt = $('<tr>');
                                rowtotalpt.append($('<td>').html('<b>Total</b>').css('border', '1px solid black'));
                                rowtotalpt.append($('<td>').html('<b>'+countstokPT+'</b>').css('border', '1px solid black'));
                                tableBody.append(rowtotalpt)
                                // Append header and body to the table
                                newTable.append(tableHeader).append(tableBody);
                                $('#new-input-container').html(newTable);
                                    $('#new-input-container-kosong').empty();
                            }
                            else {
                                $('#new-input-container').html(''); // Clear the table if countStokPT is 0
                                    $('#new-input-container-kosong').empty();
                            }
                            if (response.msg.countStokUD !== 0) {
                                var newTable2 = $('<table>').addClass('table').css('border', '1px solid black');

                                // Create table header
                                var tableHeader2 = $('<thead>').append($('<tr>').append($('<th>').text('Database UD').addClass('header-class').attr('colspan', '2').css('border', '1px solid')));

                                // Create table body
                                var tableBody2 = $('<tbody>');

                                var row2title = $('<tr>');
                                row2title.append($('<td>').text('Gudang').css('border', '1px solid black'));
                                row2title.append($('<td>').text('Qty').css('border', '1px solid black'));
                                tableBody2.append(row2title);

                                // Loop through each stok product UD and create table rows and cells for body
                                response.msg.stokproductUD.forEach(function(item) {
                                    var row = $('<tr>');
                                    row.append($('<td>').text(item.name_gudang).css('border', '1px solid black'));
                                    row.append($('<td>').text(item.stok_gudang).css('border', '1px solid black'));
                                    tableBody2.append(row);

                                    // countstok += item.stok_gudang;
                                     countstokUD += parseInt(item.stok_gudang, 10);
                                });
                                 var rowtotalud = $('<tr>');
                                rowtotalud.append($('<td>').html('<b>Total</b>').css('border', '1px solid black'));
                                rowtotalud.append($('<td>').html('<b>' +countstokUD+'</b>').css('border', '1px solid black'));
                                tableBody2.append(rowtotalud)
                                // Append header and body to the table
                                newTable2.append(tableHeader2).append(tableBody2);
                                $('#new-input-container2').html(newTable2);
                                    $('#new-input-container-kosong').empty();
                            } else {
                                $('#new-input-container2').html(''); // Clear the second table if countStokUD is 0
                                $('#new-input-container-kosong').empty();
                            }
                       }     
                            countStokTotal = countstokPT + countstokUD;   


                            $('#tambahForm').submit(function(event) {
                                    // Mencegah perilaku default formulir
                                    event.preventDefault();
                                      
                                    // Mengumpulkan data formulir
                                    var formData = {
                                        
                                         tgl_request: $('input[name=tgl_request_name]').val(), // Mengambil value dari elemen name_edit 
                                                                                 // Note: dibawah Mengikuti name_edit
                           
                                         laststok: countStokTotal,
                                         jml_permintaan: $('input[name=jml_permintaan_name]').val(),
                                         
                                         keterangan: $('textarea[name=keterangan_name]').val(),
                                        product: $('#product-restok-tambah-filter').val(),
                                        
                                        
                                        // status: $('select[name=status]').val()
                                    };
                                  console.log(formData)
                                    // Mengirim permintaan AJAX
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ route('admin.pembelian_restok_tambah_filter') }}', // Ganti URL_TARGET dengan URL tujuan Anda
                                        data: formData,
                                        success: function(response) {
                                            // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                                           console.log(response);
                                            if(response !== null){
                                                 
                                                 Swal.fire({
                                                    icon: 'success',
                                                    title: 'Success!',
                                                    text: 'Restok berhasil ditambah!',
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
                                                    text: 'Restok Gagal ditamb!',
                                                });
                                            }
                                             
                                        },
                                        error: function(xhr, status, error) {
                                            // Penanganan kesalahan jika terjadi
                                            console.error(error);
                                        }
                                    });
                            });

                        }
                                       
                   
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error('Error:', error);
                    }
                });
            }
        });
    });
    
    //filter untuk status
    $(document).ready(function(){
       
        var lastSelectedValue = $('input[type=radio][name=filter]:checked').val();
        
        // Function to handle AJAX request
        function sendFilterData(selectedValue) {
            $.ajax({
                url: '{{ route('admin.pembeliaan_orderpembelian_filter') }}', // Replace with your server endpoint
                method: 'GET',
                data: { 
                    filterValue: selectedValue 
                },
                success: function(response) {
                    // Handle success response
                    // console.log(response);
            var newRoute = "{{ route('admin.pembeliaan_orderpembelian_filter') }}?filterValue="+lastSelectedValue;

                    window.location.href = newRoute;


                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        }

        // Listen for changes in radio buttons
        $('input[type=radio][name=filter]').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue !== lastSelectedValue) {
                sendFilterData(selectedValue);
                lastSelectedValue = selectedValue;
            }
        });
    });




</script>
<script>
    // Menangani peristiwa klik pada tombol "Filter"
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });


   
    // Menangani klik pada tombol tambah
    function tambahRestok(element) {
        event.preventDefault();

        $('#product-restok-tambah-filter').val('');
        console.log($('#product-restok-tambah-filter').val());
        if ($('#product-restok-tambah-filter').val() === null) {
          $('#product-restok-tambah-filter').remove();

          }

        $('#tambahModal').modal('show'); // Tampilkan modal


    }
    
    //Untuk Menjumlahkan total kubik yang telah dicentang
    function calculateTotalKubik() {
        var checkboxes = document.querySelectorAll('.kubik-checkbox');
        var totalKubik = 0;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var kubikValue = parseFloat(checkbox.closest('tr').querySelector('.kubik-value').textContent);
                totalKubik += kubikValue;

            }
        });
        
        document.getElementById('total-kubik').textContent = totalKubik;
    }

    //Untuk Mereset data input checkbox dan total kubik di modal hitung kubk
    document.getElementById('tambahModal').addEventListener('hidden.bs.modal', function () {
        var checkboxes = document.querySelectorAll('.kubik-checkbox'); //Inisiasi variabel yang mengambil value select dari class kubik-checkbox
        checkboxes.forEach(function(checkbox) { //Untuk mengambil input checkbox sesuai urutan berdasarkan array
            checkbox.checked = false; //Untuk menonaktifkan input checkbox
        });
        document.getElementById('total-kubik').textContent = 0; //menset nilai total-kubik menjadi 0
    });

    //Membuka modal update
    function updateRestok(element) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);

        // Tampilkan elemen overlay dengan efek fade-in sebelum mengirim permintaan AJAX
        $('#overlay').fadeIn();

        var url = "{{ route('admin.pembelian_editview_order_pembelian') }}";

        $.ajax({
            url: url,
            type: 'GET', // Menggunakan metode GET
            data: {
                id_product: id
            },
            success: function(response) {
                // Sembunyikan elemen overlay dengan efek fade-out setelah mendapatkan respons
                $('#overlay').fadeOut();

                // Handle response jika sukses
                $('#Formedit').html(response);
                // Tampilkan modal
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Sembunyikan elemen overlay dengan efek fade-out jika terjadi kesalahan
                $('#overlay').fadeOut();

                // Handle error jika terjadi kesalahan
                console.error(xhr.responseText);
                return;
            }
        });
    }

    //Membuka modal gagal update
    function updateRestokFailed(button) {

        //Menampilkan error message dengan sweetalert
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Maaf, item sudah di proses di commercial invoice',
        });

        // Prevent the default action (navigation)
        return false;
    }

  function deleteOrderPembelian(element) {
    event.preventDefault();
    var id = $(element).data('id');
    var restokName = $(element).attr('name');

    // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin menghapus order pembelian ini " + restokName + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.pembelian_hapus_order_pembelian') }}";
            $('#reload-icon').show();
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
                    $('#reload-icon').hide();
                    // Reload DataTable without reloading the entire page
                    table.ajax.reload(null, false);
                    // Tampilkan SweetAlert2 ketika berhasil dihapus
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Decrement the value of $num
                    var num2 = parseInt($('#num2').text());
                    $('#num').text(num2 + 1);
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

    function rejectOrderPembelian(element) {
        event.preventDefault();
        var id = $(element).data('id');
        var restokName = $(element).attr('name');

        // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin mereject Order Pembelian ini " + restokName + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Reject!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('admin.pembelian_reject_order_pembelian') }}";

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
                            text: 'Data berhasil direject!',
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

    $('#tambahModal').on('hidden.bs.modal', function () {
     
        // Clear form fields and reset dropdown to default option
        $('#checkdatevaluetambah').prop('checked', false);
        $('#tambahForm').find('input[type="text"], input[type="number"], textarea').val('');
        $('#tgl_request').prop('disabled', true);
        $('#new-input-container-gambar').empty();
        $('#new-input-container').empty();
        $('#new-input-container2').empty();
        $('#new-input-container-kosong').empty();
    });

</script>

<!-- digunakan untuk pick date filter -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<!-- untuk mengaktifkan input tanggal di modal filter -->
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

<!-- untuk mengaktifkan input tanggal di form tambah -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkdatevaluetambah = document.getElementById('checkdatevaluetambah');
        const tgl_request = document.getElementById('tgl_request');
        
        
        // Atur event listener untuk perubahan pada checkbox
        checkdatevaluetambah.addEventListener('change', function() {
            // Jika checkbox dicentang, aktifkan kedua datepicker
            if (checkdatevaluetambah.checked) {
                checkdatevaluetambah.value = 'checked';
                tgl_request.disabled = false;
              
                // Inisialisasi Flatpickr
                flatpickr(tgl_request, {
                    dateFormat: 'Y-m-d'
                });
              
            } else {
                // Jika tidak, nonaktifkan kedua datepicker
                tgl_request.disabled = true;
               
                // Hapus Flatpickr instance jika sudah ada
                if (tgl_request._flatpickr) {
                    tgl_request._flatpickr.destroy();
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
            var id_nama_barang = document.getElementById('id_nama_barang').value;
              var filterValue = document.querySelector('input[name="filter"]:checked').value;

              // var filterValue = document.querySelector('input[name="filter-status"]:checked').value;

            var id_jenis = document.getElementById('id_jenis').value;
            var id_kode_barang = document.getElementById('kode_barang').value;
            // Membuat query string dari data yang akan dikirim
            // console.log(id_kode_barang)
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&id_kode_barang=' + encodeURIComponent(id_kode_barang)+'&id_nama_barang=' + encodeURIComponent(id_nama_barang)+'&id_jenis=' + encodeURIComponent(id_jenis)+'&filterValue=' + encodeURIComponent(filterValue);

            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.pembeliaan_orderpembelian_filter') }}" + '?' + queryString;

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

                     var reloadUrl = "{{ route('admin.pembeliaan_orderpembelian_filter') }}" + '?' + queryString;
                
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Menangkap perubahan pada elemen select
        $('.select').change(function() {
            // Mendapatkan nilai dari elemen select yang dipilih
              var supplier = document.getElementById('edit_supplier').value;
                       var id = $('#edit_supplier').data('id');
                       $('#reload-icon').show();

            console.log(supplier,id);
            // Kirim data menggunakan AJAX
            $.ajax({
                url: "{{ route('admin.pembelian_select_supplier_order_pembelian') }}",
                type: 'GET',
                data: {
                    id: id,
                    supplier: supplier,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                     $('#reload-icon').hide();
                       table.ajax.reload(null, false); // User paging is not reset on reload
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection