@extends('admin.templates_baru')


@section('title')
Penerimaan Pembelian   | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
<link rel="stylesheet" href="{{ asset('css/penerimaan/pembelian.css') }}">
@endsection

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="container-fluid">
        <h4 id="judulPembelian" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Penerimaan Pembelian</h4>

        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Penerimaan Pembelian {{ $username['data']['teknisi']['name'] }}</small>
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                         <a href="javascript:void(0)" onclick="tambahPembelian(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add Penerimaan Pembelian</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="filterBtn">Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Penerimaan Pembelian</h5>
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
                                        <div class="form-group">
                                            <label for="kode">LCL/FCL Reference</label>
                                            <input style="border: 1px solid #ced4da; width: 100%; padding-left:22px;" type="text" placeholder="Lcl/Fcl Reference" class="form-control" id="id_lcl_fcl" name="lcl_fcl">
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

                    <div class="table-responsive"> <!-- Membungkus tabel dengan div table-responsive -->
                        <table id="tabe-stok" class="table table-bordered table-striped">
                            <thead>
                                <!-- Header dapat ditambahkan jika diperlukan -->
                            </thead>
                            <tbody>
                                @php
                                $num =1;
                                @endphp
                                <!-- Table data will be populated here -->
                                @foreach($Data['msg']['penerimaan'] as $index => $data)

                                @php
                                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                $formattedDate = \Carbon\Carbon::parse($data['tgl_terima'])->translatedFormat('d F Y');
                                @endphp
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>{{ $formattedDate }} </td>
                                    <td>{{ $data['kode'] }}</td>

                                    @if($data['category']=='fcl')
                                    <td>INV-{{ $data['fcl']['invoice_no'] }}</td>
                                    @else
                                    <td>{{ $data['lcl']['invoice'] }}</td>
                                    @endif

                                    <td>{{ $data['gudang']['name'] }}</td>
                                    <td>{{ $data['teknisi']['name'] }}</td>
                                    <td>
                                        <input type="text" name="invoicebee" value="{{ $data['invoicebee'] }}" data-id="{{$data['id']}}">
                                        
                                    </td>
                                    <td>
                                        <span style="background-color: transparant; font-weight: bold; text-transform: uppercase;">
                                            <p style="color:black; text-align:center; font-weight:bold;"> {{ $data['category'] }}</p>
                                        </span>
                                    </td>
                                    <td>
                                        <div style="background-color: red; color: white; text-align: center; font-weight: bold; text-transform: uppercase; width: 50%; margin: 0 auto;">
                                            {{ $data['category_import'] }}
                                        </div>
                                    </td>

                                    <td>
                                        
                                     
                                    </td>
                                </tr>
                                @php $num++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div id="tambahPembelianContainer" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            
                            <form action=""id="Formtambah"></form>
                    
                    </div>
                    <div id="editPembelianContainer" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            
                            <form action=""id="Formedit"></form>
                    
                    </div>

                    <!-- modal tambah penerimaan pembelian-->
                    <div class="col-sm-12" style="margin-top: 15px;">

                            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <!-- Header modal, termasuk tombol close -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabel">Tambah Penerimaan Pembelian</h5>

                                        </div>
                                        <!-- Isi modal -->
                                        <div class="modal-body">
                                            
                                            
                                            <form action="" class="form-horizontal" id="tambahForm" method="get">
                                                @csrf
                                                <h4 style="margin-bottom: 10px;">Form Tambah Penerimaan Pembelian</h4>

                                                
                                                <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="id_db">ID Pembelian <span style="color: red;">(Wajib Diisi)</span></label>
                                                    <div style="position: relative; width: 100%;">
                                                        <select class="form-control" name="id_db" id="id_db" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                                                            <option value="">Pilih Database</option>
                                                            <option value="UD">UD</option>
                                                            <option value="PT">PT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group" style="padding-top:10px;">
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                            <label for="startDatepicker">Tanggal Terima: <span style="color: red;">(Wajib Diisi)</span></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <input type="text" placeholder="Pilih Tanggal Request" class="form-control" id="tgl_request" name="tgl_request_name" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-top:25px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <td>
                                                                            Image Barang
                                                                        </td>
                                                                        <td>
                                                                            Kode Barang
                                                                        </td>
                                                                        <td>
                                                                            Nama Barang
                                                                        </td>
                                                                        <td>
                                                                            Jumlah
                                                                        </td>
                                                                        <td>
                                                                            Jumlah Sudah Datang
                                                                        </td>
                                                                        <td>
                                                                            Jumlah Yang Datang
                                                                        </td>
                                                                        <td>
                                                                            Action
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;"> -->
                                                    <div class="row" style="padding-top:25px;">
                                                        <div class="col-md-6">
                                                            
                                                            <label class="col-lg-3 control-label" style="width:100%;" for="id_ekspedisi">Ekspedisi <span style="color: red;">(Wajib Diisi)</span></label>
                                                            <div style="position: relative; width: 100%;">
                                                                <select class="form-control" name="id_db" id="id_db" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                                                                    <option value="">Pilih Ekspedisi</option>
                                                                    @foreach($Data['msg']['ekspedisi'] as $index =>$ekspedisi)
                                                                    <option value="{{ $ekspedisi['id'] }}">{{ $ekspedisi['name'] }}</option>
        
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-lg-3 control-label" style="width:100%;" for="id_gudang">Gudang <span style="color: red;">(Wajib Diisi)</span></label>
                                                            <div style="position: relative; width: 100%;">
                                                                <select class="form-control" name="id_db" id="id_db" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                                                                    <option value="">Pilih Ekspedisi</option>
                                                                    @foreach($Data['msg']['gudang'] as $index =>$gudang)
                                                                    <option value="{{ $gudang['id'] }}">{{ $gudang['name'] }}</option>
        
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                

                                                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan <span style="color: red;">(Wajib Diisi)</span></label>
                                                    <div style="position: relative; width: 100%;">
                                                        <textarea style="border: 1px solid #ced4da;width:100%;height:100px;" name="" id="" placeholder="Keterangan" class="form-control" required></textarea>
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
                                       

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="editForm">

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
     $('#clearFilterBtn').on('click', function() {
        
    // Arahkan pengguna ke rute lain
    window.location.href = '{{ route('admin.penerimaan_pembelian') }}'; // Ganti 'URL_RUTE_LAIN' dengan URL rute yang diinginkan
})
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
    // Initialize Choices.js on the select element
    const element = document.getElementById('id_pembelian_select1');
    const choices = new Choices(element, {
        searchEnabled: true,
        itemSelectText: '',
    });

    
});

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_pembelian_select2');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
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

<!-- untuk load datatable -->
<script>
    
    $(document).ready(function() {
    // Initialize DataTable and store its instance in window.dataTableInstance
        window.dataTableInstance = $('#tabe-stok').DataTable({
            "dom": '<"top"lf>rt<"bottom"ip><"clear">',
            "language": {
                "searchPlaceholder": "Cari...",
                "search": "Cari:",
                "paginate": {
                    "previous": "back",
                    "next": "next"
                }
            },
            columns: [
                { data: 'num', title: 'No' },
                { data: 'tgl_terima', title: 'Tanggal' },
                { data: 'code', title: 'Kode' },
                { data: 'lcl_fcl', title: 'LCL /FCL Reference' },
                { data: 'gudang', title: 'Gudang' },
                { data: 'user', title: 'User' },
                { data: 'no_pembelian_bee', title: 'No. Pembelian Bee' },
                { data: 'category', title: 'Kategori' },
                { data: 'category_import', title: 'Kategori Import/Non Import' },
                {
                        data: null,
                        title: 'Action',
                        render: function(data, type, full, meta) {
                            // let kode = data.
                            let id_pembelian=data.code
                            
                            return `
                            <button type="button" 
                                    data-id="${id_pembelian}" 
                                    name="${id_pembelian}" 
                                    class="btn btn-large btn-success btn-edit" 
                                    style="width: 35px; height: 38px; padding: 9px 10px;" 
                                    title="Detail"
                                    onclick="detailPembelian(this)">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" 
                                    data-id="${id_pembelian}" 
                                    name="${id_pembelian}" 
                                    class="btn btn-large btn-info btn-edit" 
                                    style="width: 35px; height: 38px; padding: 9px 10px;" 
                                    title="Edit"
                                    onclick="editPembelian(this)">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button type="button" 
                                    onclick="deletePembelian(this)" 
                                    data-id="${id_pembelian}" 
                                    name="${data.code}" 
                                    class="btn btn-large btn-info btn-danger" 
                                    style="width: 35px; height: 38px; padding: 9px 10px;" 
                                    title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            `;
                        }
                }
            ],
            "initComplete": function(settings, json) {
                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...');
            }
        });

        
        $('input[name=invoicebee]').change(function(){



            var id        = $(this).attr('data-id');

            var invoice   = $(this).val();

            console.log('id',id,'invoice',invoice)

            $.ajax({
                url:'{{ route('admin.penerimaan_pembelian') }}',
                data:{
                    invoice:invoice,
                    menu:'invoice_bee',
                    id:id
                },
                success: function(response){
                    Swal.fire({
                        icon:'success',
                        title:'Success',
                        text:response.msg
                        }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.reload();
                        }
                    })
                }

            })

        })



    });
</script>

<script>
    // Menangani peristiwa klik pada tombol "Filter"
    document.getElementById('filterBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });

    

    function deletePembelian(element){
        var id = $(element).data('id')
        var restokName = $(element).attr('name');
        console.log('id',id)
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin menghapus invoice ini INV-" + restokName + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('admin.penerimaan_pembelian') }}";
                $('#reload-icon').show();
                $.ajax({
                    url: url,
                    type: 'GET',
            
                    data: {
                        menu:'delete_pembelian',
                        id:id
                    },
                    success: function(response) {
                        

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

    // Menangani klik pada tombol Detail
    function detailPembelian(element){
        event.preventDefault();
        
        var code = $(element).data('id')
        console.log('code',code)
        $.ajax({
            type:'GET',
            url:'{{ route('admin.penerimaan_pembelian') }}',
            data: {
                menu:'detail_view',
                code:code
            },
            success: function(response){
                    $('#judulPembelian').html('<i class="fas fa-database"></i> &nbsp Detail Penerimaan Pembelian');
                    document.title='Detail Penerimaan Pembelian   | PT. Maxipro Group Indonesia'
                    $('.btn-tambah').remove()
                    if (window.dataTableInstance) {
                        window.dataTableInstance.destroy();
                    }
                    $('#tabe-stok').remove()
                    $('.radio-button-container').remove()
                    $('#clearFilterBtn').remove()
                    $('#filterBtn').remove()
                    $('#editPembelianContainer').show()
                    $('#Formedit').html(response)
            }
        })
    }

    // Menangani klik pada tombol Edit
    function editPembelian(element){
        event.preventDefault();
        
        var code = $(element).data('id')
        console.log('code',code)
        $.ajax({
            type:'GET',
            url:'{{ route('admin.penerimaan_pembelian') }}',
            data: {
                menu:'edit_view',
                code:code
            },
            success: function(response){
                    $('.btn-tambah').remove()
                    if (window.dataTableInstance) {
                        window.dataTableInstance.destroy();
                    }
                    $('#judulPembelian').html('<i class="fas fa-database"></i> &nbsp Edit Penerimaan Pembelian');
                    document.title='Edit Penerimaan Pembelian   | PT. Maxipro Group Indonesia'
                    $('#tabe-stok').remove()
                    $('.radio-button-container').remove()
                    $('#clearFilterBtn').remove()
                    $('#filterBtn').remove()
                    $('#editPembelianContainer').show()
                    $('#Formedit').html(response)
            }
        })
    }



    // Menangani klik pada tombol tambah
    function tambahPembelian(element) {
        event.preventDefault();
        
      
        $.ajax({
            url:'{{ route('admin.penerimaan_pembelian') }}',
            data:{
                menu:'tambah'
            },
            success: function(response){
                    $('.btn-tambah').remove()
                    $('#judulPembelian').html('<i class="fas fa-database"></i> &nbsp Tambah Penerimaan Pembelian');
                    document.title='Tambah Penerimaan Pembelian   | PT. Maxipro Group Indonesia'
                    if (window.dataTableInstance) {
                        window.dataTableInstance.destroy();
                    }
                    $('#tabe-stok').remove()
                    $('.radio-button-container').remove()
                    $('#clearFilterBtn').remove()
                    $('#filterBtn').remove()
                    $('#tambahPembelianContainer').show()
                    $('#Formtambah').html(response)
                
            }
        })
    }

  
   

</script>

<!-- digunakan untuk pick date filter -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



<script>
         // untuk mengaktifkan input tanggal di form tambah
       document.addEventListener('DOMContentLoaded', function() {
        const checkdatevaluetambah = document.getElementById('checkdatevaluetambah');
        const tgl_awal = document.getElementById('tgl_awal');
        
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

     // untuk mengaktifkan input tanggal di filter tanggal
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
            var fcl_lcl =document.getElementById('id_lcl_fcl').value;
            // Membuat query string dari data yang akan dikirim
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&kode=' + encodeURIComponent(kode)+'&fcl_lcl=' + encodeURIComponent(fcl_lcl);
            console.log(queryString);
            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.penerimaan_pembelian_filter') }}" + '?' + queryString;

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

                    var reloadUrl = "{{ route('admin.penerimaan_pembelian_filter') }}" + '?' + '&checkdatevalue=' + encodeURIComponent(checkdatevalue) + '&tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&kode=' + encodeURIComponent(kode)+'&fcl_lcl=' + encodeURIComponent(fcl_lcl);
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

@endsection