@extends('admin.templates_baru')


@section('title')
Penerimaan Barang Lain   | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<link rel="stylesheet" href="{{ asset('css/penerimaan/baranglain.css') }}">
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
        <h4 id="judulBarangLain" style="margin-top: 40px;margin-bottom: 40px;display:none;"><i class="fas fa-database"></i> &nbsp Penerimaan Barang Lain</h4>

        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Penerimaan Barang Lain {{ $username['data']['teknisi']['name'] }}</small>
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                         <a href="javascript:void(0)" onclick="tambahBarangLain(this)" name="tambahButton" style="display:none;" class="btn btn-large btn-primary btn-tambah">Add Penerimaan Barang Lain</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;display:none;" id="filterBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" style="width: 10%; margin-right: 5px;display:none;" id="clearFilterBtn">Clear Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Penerimaan Barang Lain</h5>
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
                                            <label for="kode">Kode</label>
                                            <input style="border: 1px solid #ced4da; width: 100%; padding-left:22px;" type="text" placeholder="Kode" class="form-control" id="id_kode" name="kode">
                                        </div>
                                       
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive" style="display:none;">
                        <table id="tabe-stok" class="table table-bordered table-striped">
                            <thead>

                            </thead>
                            <tbody>
                                @php
                                $num =1;
                                @endphp
                                <!-- Table data will be populated here -->
                                @foreach($Data['msg']['penerimaan'] as $index => $data)
                                
                                @php
                                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                $formattedDate = \Carbon\Carbon::parse($data['tgl_terima'])->translatedFormat('d M Y');
                                @endphp
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>{{ $formattedDate }}</td>
                                    <td>{{ $data['kode'] }}</td>
                                    <td>{{ $data['teknisi']['name'] }}</td>                               
                                    <td></td>
                                </tr>
                                @php $num++
                                @endphp
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                    <!-- modal tambah penerimaan pindah gudang-->
                    <div class="col-sm-12" style="margin-top: 15px;">

                            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <!-- Header modal, termasuk tombol close -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabel">Tambah Penerimaan Barang Lain</h5>

                                        </div>
                                        <!-- Isi modal -->
                                        <div class="modal-body">
                                            
                                            
                                            <form action="" class="form-horizontal" id="tambahForm" method="get">
                                                @csrf
                                                <h4 style="margin-bottom: 10px;">Form Tambah Penerimaan Barang Lain</h4>
                                                
                                                <div class="form-group" style="padding-top:10px;">
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                            <label for="startDatepicker">Tanggal Terima: <span style="color: red;">(Wajib Diisi)</span></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <input type="text" placeholder="Pilih Tanggal Terima" class="form-control" id="tgl_request" name="tgl_request_name" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-top:20px;">
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                            <label for="pengirim">Pengirim <span style="color: red;">(Wajib Diisi)</span></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <input type="text" style="border: 1px solid #ced4da;padding-left: 10px;" placeholder="Pengirim" class="form-control" id="pengirim" name="pengirim_name" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group" style="padding-top:25px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-striped"style="border: 2px solid #ced4da;">
                                                                <thead>
                                                                    <tr>
                                                                        <td>
                                                                            Barang
                                                                        </td>
                                                                        <td>
                                                                            Qty
                                                                        </td>
                                                                        <td>
                                                                            Keterangan
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            Action
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tableBody">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                    <button type="button" id="tambahDataTable" class="btn btn-success" style="margin-left: auto;">Tambah Barang
                                                    </button>
                                                </div>
                                                <div class="form-group" style="padding-top:20px;">
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                            <label for="pengirim">Keterangan <span style="color: red;">(Wajib Diisi)</span></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            
                                                            <textarea name="keterangan_name" id="keterangan"placeholder="Keterangan"style="border: 1px solid #ced4da;padding-left: 10px;width:100%;" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>                                               
                                              

                                                <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                    <button type="submit" id="selecttambahButton" class="btn btn-primary" style="margin-left: auto;">Simpan
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

                    <div id="tambahPenerimaanContainer" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            <form action=""id="Formtambah"></form>            
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

<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
         $('#clearFilterBtn').on('click', function() {
        
        // Arahkan pengguna ke rute lain
        window.location.href = '{{ route('admin.penerimaan_barang_lain') }}'; // Ganti 'URL_RUTE_LAIN' dengan URL rute yang diinginkan
    })
</script>
<script>
     document.getElementById('id_db').addEventListener('change', function() {
        var selectedOption = this.value;
        if (selectedOption === 'UD') {
            document.getElementById('id_pembelian_UD').style.display = 'block';
            document.getElementById('id_pembelian_PT').style.display = 'none';
        } else if (selectedOption === 'PT') {
            document.getElementById('id_pembelian_PT').style.display = 'block';
            document.getElementById('id_pembelian_UD').style.display = 'none';
        } else {
            document.getElementById('id_pembelian_UD').style.display = 'none';
            document.getElementById('id_pembelian_PT').style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_db');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });

        // Enable/disable date inputs based on checkbox state
        
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        const element = document.getElementById('id_pembelian_select1');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
            shouldSort: true,
            sorter: function(a, b) {
                // Sort options in descending order
                return b.label.localeCompare(a.label, undefined, {numeric: true});
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_pembelian_select2');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
            shouldSort: true,
        sorter: function(a, b) {
            // Sort options in descending order
            return b.label.localeCompare(a.label, undefined, {numeric: true});
        }
        });

        // Enable/disable date inputs based on checkbox state
        
    });
    //untuk membuat perubahan pada text area bila menekan radio button option_tambah
    var radios = document.querySelectorAll('input[name="option_tambah"]');
     radios[1].checked = true;
    var keteranganTextAreaTambah = document.getElementById('keteranganTextAreaTambah');

    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            var selectedValue = this.value;
            switch (selectedValue) {
                case '1':
                    keteranganTextAreaTambah.placeholder = 'Keterangan:\n\nPembayaran Maxipro ke Rekening:\n\nBank BCA\n0104 300 100\n\nStephen Santoso';
                    break;
                case '2':
                    keteranganTextAreaTambah.placeholder = 'Keterangan:\n\nPembayaran Maxipro ke Rekening:\n\nBank BCA\n0103 800 100\n\nPT Maxipro Group Indonesia';
                    break;
                case '3':
                    keteranganTextAreaTambah.placeholder = 'Keterangan:\n\nPembayaran Maxipro ke Rekening:\n\nBank BCA\n0108 800 600\n\nStephen Santoso';
                    break;
               
            }
        });
    });

   

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_db');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });

        // Handle the selection event using Choices.js
        element.addEventListener('addItem', function(event) {
            var data = event.detail;
            
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

            var newInput2 = $('<input>').attr({
                type: 'text',
                name: 'price_product_tambah',
                placeholder: 'Rp. 0',
                class: 'form-control',
                style: 'border: 1px solid #ced4da; width: 20%; padding-left: 20px; margin-right: 10px;'
            });
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
            }).val(paragraphContent);

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

<script>
    document.getElementById('tambahDataTable').addEventListener('click', function() {
            // Create new row
            var newRow = document.createElement('tr');
            newRow.style=""
            
            // Create new cells
            var barangCell = document.createElement('td');
            var qtyCell = document.createElement('td');
            var keteranganCell = document.createElement('td');
            var actionCell = document.createElement('td');

            // Add input fields to cells
            barangCell.innerHTML = '<input type="text" class="form-control" placeholder="Barang" style="border: 1px solid #ced4da;background-color:white;padding-left: 10px;">';
            qtyCell.innerHTML = '<input type="number" class="form-control" placeholder="Qty" style="border: 1px solid #ced4da;background-color:white;padding-left: 10px;">';
            keteranganCell.innerHTML = '<input type="text" class="form-control" placeholder="Keterangan"style="border: 1px solid #ced4da;background-color:white;padding-left: 10px;">';
            actionCell.innerHTML = '<button type="button" class="btn btn-danger btn-sm">Hapus</button>';

            // Append cells to row
            newRow.appendChild(barangCell);
            newRow.appendChild(qtyCell);
            newRow.appendChild(keteranganCell);
            newRow.appendChild(actionCell);

            // Append row to table body
            document.getElementById('tableBody').appendChild(newRow);

            // Add event listener for delete button
            actionCell.querySelector('.btn-danger').addEventListener('click', function() {
                newRow.remove();
            });
        });
</script>

<!-- untuk load datatable -->
<script>
    
    $(document).ready(function() {
        window.dataTableInstance = $('#tabe-stok').DataTable({
            

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
                    data: 'tgl_terima',
                    title: 'Tanggal Terima'
                },
                  {
                    data: 'code',
                    title: 'Kode'
                },
                {
                    data: 'user',
                    title: 'User'
                },
                {
                    data: 'null',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        let code=full.code
                        
                        return `
                            <button type="button" 
                                    data-id="${code}" 
                                    name="${code}" 
                                    class="btn btn-large btn-dark detail-btn" 
                                    style="width: 35px; height: 38px; padding: 9px 10px;" 
                                    title="Print Penerimaan Barang Lain">
                                <i class="fa fa-print"></i>
                            </button>
                            <button type="button" 
                                    data-id="${code}" 
                                    name="${code}" 
                                    class="btn btn-large btn-info edit-btn" 
                                    style="width: 35px; height: 38px; padding: 9px 10px;" 
                                    title="Edit Penerimaan Barang Lain">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" 
                                    onclick="deleteBarangLain(this)" 
                                    data-id="${code}" 
                                    name="${code}" 
                                    class="btn btn-large btn-info btn-danger" 
                                    style="width: 35px; height: 38px; padding: 9px 10px;" 
                                    title="Hapus Penerimaan Barang Lain">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            `;
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
    document.getElementById('filterBtn').addEventListener('click', function() {
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

  
    // Menangani klik pada tombol tambah
    function tambahBarangLain() {
                        
                        $.ajax({
                            url:'{{ route('admin.tambah_barang_lain') }}',
                            data:{
                                menu:'tambah_baranglain_view'
                            },
                            success: function(response){

                                $('main.main-content').removeClass('wider ps ps--active-y');
                                $('small.display-block').css('top', '30px');
                                // Ganti konten dari form dengan response dari server
                                // $('#Formtambah').show();
                                // $('#Formtambah').html(response);
                                $('#Formtambah').show();
                                $('#Formtambah').html(response);
                                // Ubah judul dan ikon
                                $('#judulBarangLain').html('<i class="fas fa-database"></i> &nbsp Tambah Penerimaan Barang Lain');
                                document.title = 'Tambah Penerimaan Barang Lain | PT. Maxipro Group Indonesia';
                                $('#judulBarangLain').show()
                                // Menghapus elemen yang tidak dibutuhkan
                                $('.btn-tambah').hide();
                                $('.radio-button-container').hide();
                                $('#clearFilterBtn').hide();
                                $('#filterBtn').hide();
                                   // Menghancurkan DataTable jika ada
                                if (window.dataTableInstance) {
                                    window.dataTableInstance.destroy();
                                }
                                $('#tambahPenerimaanContainer').show();
                                $('#tabe-stok').hide();
                                history.pushState({page:'Tambah Barang Lain' }, 'Tambah Barang Lain', '{{ route('admin.tambah_barang_lain') }}' );
  

                            },
                            error: function(xhr, status, error) {
                                // Handle error jika terjadi kesalahan
                                console.error(xhr.responseText);
                                return;
                            }

                        });
    }




    function deleteBarangLain(element) {
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
                var url = "{{ route('admin.penerimaan_barang_lain') }}";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id,
                        menu:'delete_baranglain'
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
    const currentUrl = window.location.pathname;
       console.log('currentUrl',currentUrl)
       if(currentUrl==='/admin/data_penerimaan_barang_lain'){
            $('.btn-tambah').show()
            $('.table-responsive').show();
            $('#clearFilterBtn').show();
            $('#filterBtn').show();
            $('#judulBarangLain').show()
        }
       else if(currentUrl==='/admin/data_penerimaan_barang_lain_filter'){
            $('.btn-tambah').show()
            $('.table-responsive').show();
            $('#clearFilterBtn').show();
            $('#filterBtn').show();
            $('#judulBarangLain').show()
        }
        else if(currentUrl==='/admin/tambah_penerimaan_barang_lain'){
            $('.table-responsive').hide();
            $('main.main-content').removeClass('wider ps ps--active-y');
            $('small.display-block').css('top', '30px');
            $('.btn-tambah').hide();
            $('.radio-button-container').hide();
            $('#clearFilterBtn').hide();
            $('#filterBtn').hide();
            // Menghancurkan DataTable jika ada
            if (window.dataTableInstance) {
                window.dataTableInstance.destroy();
            }
            tambahBarangLain()
        }
        else if(currentUrl==='/admin/edit_penerimaan_barang_lain'){
            
            window.location.href='data_penerimaan_barang_lain'
            
        }
        $(document).on('click', '.detail-btn', function(event) {
            event.preventDefault(); // Mencegah aksi default tombol
            var code = $(this).data('id'); // Ambil ID dari atribut data-id
            // console.log('Code:', code); // Debug log untuk memastikan kode benar

            // Kirim AJAX request
            $.ajax({
                url: '{{ route('admin.detail_barang_lain') }}',
                type: 'GET', // Atau 'POST' jika endpoint membutuhkan POST
                data: {
                    
                    id: code,
                },
                success: function(response) {
                    
                        // Redirect ke halaman print
                        window.location.href = '/admin/print_penerimaan_barang_lain?id='+code;
                    
                },
                error: function(xhr, status, error) {
                    // Tangani error jika terjadi
                    console.error('Error:', error);
                    console.error('Response:', xhr.responseText);
                    alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                }
            });
        });

    
    $(document).on('click','.edit-btn', function(event){
        event.preventDefault();
        var code = $(this).data('id')
        // console.log('code',code)
        $.ajax({
            url:'{{ route('admin.penerimaan_barang_lain')}}',
            data:{
                menu:'edit_view',
                id:code,
            },
            success: function(response){
                        $('main.main-content').removeClass('wider ps ps--active-y');
                        $('small.display-block').css('top', '30px');
                        // Ganti konten dari form dengan response dari server
                        $('#Formtambah').show();
                        $('#Formtambah').html(response);
                        
                        // Ubah judul dan ikon
                        $('#judulBarangLain').html('<i class="fas fa-database"></i> &nbsp Edit Penerimaan Barang Lain');
                        document.title = 'Edit Penerimaan Barang Lain | PT. Maxipro Group Indonesia';

                        // Menghapus elemen yang tidak dibutuhkan
                        $('.btn-tambah').hide();
                        $('.radio-button-container').hide();
                        $('#clearFilterBtn').hide();
                        $('#filterBtn').hide();
                           // Menghancurkan DataTable jika ada
                        if (window.dataTableInstance) {
                            window.dataTableInstance.destroy();
                        }
                        $('#tabe-stok').hide();
                        $('#tambahPenerimaanContainer').show();
                        history.pushState({ code: code }, 'Edit Barang Lain', '{{ route('admin.edit_barang_lain') }}' );
            },
            error: function(xhr, status, error) {
                    // Handle error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    return;
            }
        })
    })

</script>

<!-- digunakan untuk pick date filter -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<!-- untuk mengaktifkan input tanggal di filter -->

<script>
         // untuk mengaktifkan input tanggal di form tambah 
  
       document.addEventListener('DOMContentLoaded', function() {
        const checkdatevaluetambah = document.getElementById('checkdatevaluetambah');
        const tgl_request = document.getElementById('tgl_request');
        
        // Inisialisasi Flatpickr pada saat DOM dimuat
        flatpickr(tgl_request, {
            dateFormat: 'Y-m-d'
        });

        // Atur event listener untuk perubahan pada checkbox
        checkdatevaluetambah.addEventListener('change', function() {
            // Jika checkbox dicentang, biarkan tgl_request aktif
            if (checkdatevaluetambah.checked) {
                tgl_request.disabled = false;
            } else {
                // Jika tidak, tetap biarkan tgl_request aktif
                tgl_request.disabled = true;
            }
        });
    });

       // untuk mengaktifkan input tanggal di filter 
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
            var kode =document.getElementById('id_kode').value;
            
            // Membuat query string dari data yang akan dikirim
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&kode=' + encodeURIComponent(kode);
            console.log(queryString);
            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.penerimaan_barang_lain_filter') }}" + '?' + queryString;

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

                    var reloadUrl = "{{ route('admin.penerimaan_barang_lain_filter') }}" + '?' + '&checkdatevalue=' + encodeURIComponent(checkdatevalue) + '&tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&kode=' + encodeURIComponent(kode);
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

@endsection