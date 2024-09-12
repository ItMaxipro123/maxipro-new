@extends('admin.templates')


@section('title')
Tambah Kas | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
@section('style')

<style>
    .select2-results__option:hover {
        background-color: #f0f0f0;
        /* Warna latar belakang yang diinginkan saat kursor digerakkan */
        cursor: pointer;
        /* Ubah ikon kursor saat diarahkan ke opsi */
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
            width: 100%;
            /* Mengisi lebar penuh */
        }
    }
</style>


@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Kas</h4>

        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Kas {{ $username['data']['teknisi']['name'] }}</small>
    </div>

   <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#" id="tab-kas" onclick="changeForm1('form-kas')" style="color:black;">Kas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="tab-mutasi" onclick="changeForm('form-mutasi')" style="color:black;">Mutasi</a>
        </li>
    </ul>

    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">

                                        <form action="#" class="form-horizontal form-active" id="form-kas" method="get" enctype="multipart/form-data">
                                            @csrf
                                            <h4 style="margin-bottom: 10px;">Form Tambah Kas</h4>
                                            <div class="form-group row">
                                                <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group-prepend" style="flex: 0 0 auto;">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar">

                                                            </i>
                                                            <input type="text" style="padding-left: 5px;" class="form-control"id="tgl_transaksi"  name="tgl_transaksi" id="tgl_transaksi">
                                                        </span>

                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama Penerima Uang-Vendor-Supplier</label>
                                                <div style="position: relative; width: 100%;">
                                                    <input type="text" class="form-control" name="name" placeholder="Ex: Satpam, Tukang Parkir, Nama Toko." style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                                                </div>
                                            </div>

                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Harga</label>
                                                <div style="position: relative; width: 100%;">
                                                    <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                                                </div>
                                            </div>

                                            <div class="form-group" style="display: flex; align-items: center; margin-top: 30px; margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Foto Nota</label>
                                                <div style="position: relative; width: 100%;">
                                                    <!-- Input dengan warna latar belakang dan border yang serasi -->
                                                    <input type="file" class="form-control-file" name="image" id="image" style="border: 1px solid #ccc; background-color: #f0f0f0; color: #333;">
                                                </div>
                                            </div>



                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px;margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PPN</label>
                                                <div style="position: relative; width: 100%;">
                                                    <select class="select select2 select-search form-control" id="ppn" name="ppn" style="border: 1px solid #ced4da; width: 100%;">
                                                        <option value="" style="text-align: center;"></option>
                                                        <option value="1" style="text-align: center;">Ya</option>
                                                        <option value="0" style="text-align: center;">Tidak</option>
                                                    </select>
                                                    <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                                </div>
                                            </div>

                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PIC (Person In Charge)</label>
                                                <div style="position: relative; width: 100%;">
                                                    <input type="text" class="form-control" id="pic" name="pic"  placeholder="Pembeli Barang-Nama Orang" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px;margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Uang Diambil Dari</label>
                                                <div style="position: relative; width: 100%;">
                                                    <select class="select select2 select-search form-control" id="money_from" name="money_from" style="border: 1px solid #ced4da; width: 100%;">
                                                        <option value="" style="text-align: center;"></option>
                                                        <option value="kas_jakarta" style="text-align: center;">Kas Jakarta</option>
                                                        <option value="kas_surabaya" style="text-align: center;">Kas Surabaya</option>
                                                        <option value="bank_kas_jakarta" style="text-align: center;">Bank Kas Jakarta</option>
                                                        <option value="bank_kas_surabaya" style="text-align: center;">Bank Kas Surabaya</option>
                                                        <option value="bank_pengeluaran_0109005900" style="text-align: center;"> Pengeluaran PT</option>
                                                    </select>
                                                    <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
                                                <div style="position: relative; width: 100%;">
                                                    <!-- Ubah input type menjadi textarea -->
                                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Perhatikan huruf besar kecilnya dan tanda baca!" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"></textarea>
                                                </div>
                                            </div>



                                            <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                <button type="button" id="searchButton" class="btn btn-primary" style="margin-left: auto;" onclick="submitForm()">Save</button>
                                            </div>
                                        </form>
                            



               
                                        <form action="" class="form-horizontal form-hidden" id="form-mutasi" method="get">
                                            @csrf
                                            <h4 style="margin-bottom: 10px;">Form Tambah Mutasi</h4>
                                            <div class="form-group row">
                                                <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group-prepend" style="flex: 0 0 auto;">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar">

                                                            </i>
                                                            <input type="text" style="padding-left: 5px;" class="form-control"id="tgl_transaksi" name="tgl_transaksi">
                                                        </span>

                                                    </div>

                                                </div>
                                            </div>
                                                  <div class="form-group" style="display: flex; align-items: center; margin-top:30px;margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Sumber Dana</label>
                                                <div style="position: relative; width: 100%;">
                                                    <select class="select select2 select-search form-control" name="money_from" style="border: 1px solid #ced4da; width: 100%;">
                                                        <option value="" style="text-align: center;"></option>
                                                         <option value="bank_pengeluaran_0109005900" style="text-align: center;">Pengeluaran PT</option>
                                                        <option value="bank_kas_jakarta" style="text-align: center;">Bank Kas Jakarta</option>
                                                        <option value="bank_kas_surabaya" style="text-align: center;">Bank Kas Surabaya</option>
                                                        <option value="kas_jakarta" style="text-align: center;">Kas Jakarta</option>
                                                        <option value="kas_surabaya" style="text-align: center;">Kas Surabaya</option>
                                                        
                                                       
                                                    </select>
                                                    <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                                </div>
                                            </div>

                                             <div class="form-group" style="display: flex; align-items: center; margin-top:30px;margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Rekening Tujuan</label>
                                                <div style="position: relative; width: 100%;">
                                                    <select class="select select2 select-rekeningtujuan form-control" name="rekeningtujuan" style="border: 1px solid #ced4da; width: 100%;">
                                                        <option value="" style="text-align: center;"></option>
                                                        
                                                    </select>
                                                    <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                                </div>
                                            </div>


                                           

                                            <div class="form-group" style="display: flex; align-items: center; margin-top:30px; margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nominal</label>
                                                <div style="position: relative; width: 100%;">
                                                    <input type="number" class="form-control" name="kode" placeholder="Masukkan Nominal" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                                                </div>
                                            </div>

                                           


                                      
                                        

                                            <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Save</button>
                                            </div>
                                        </form>

                          


                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script> 
   $('.form-hidden').hide();

    function changeForm1(formId) {
        var kas = $('#tab-kas').attr('id');
         $('.nav-link').removeClass('active');
 $('#tab-kas').addClass('active');
        $('.form-active').show();
        // Hide all forms
        $('.form-hidden').hide();

       
    }
     function changeForm(formId) {
        // console.log(formId);
       var mutasi = $('#tab-mutasi').attr('id');
  $('.nav-link').removeClass('active');
 $('#tab-mutasi').addClass('active');
  // $('.nav-link').addClass('active');
               // $('a.nav-link[href="#' + formId + '"]').addClass('active');
        // Hide all forms
        $('.form-active').hide();
         $('#' + formId).show();
       
    }
</script>
<script>
    $(document).ready(function() {
    // Initialize select2
    $('.select-search').select2({
        theme: "custom",
    });

    $('select[name=money_from]').change(function(){
        var value = $(this).val();
        var html = '';

        if(value == 'bank_kas_jakarta'){
            html += '<option value=""></option>' +
                    '<option value="kas_jakarta" style="text-align: center;">Kas Jakarta</option>';
        } else if(value == 'bank_kas_surabaya'){
            html += '<option value=""></option>' +
                    '<option value="kas_surabaya" style="text-align: center;">Kas Surabaya</option>';
        } else if(value == 'kas_jakarta'){
            html += '<option value=""></option>' +
                    '<option value="bank_kas_jakarta" style="text-align: center;">Bank Kas Jakarta</option>';
        } else if(value == 'kas_surabaya'){
            html += '<option value=""></option>' +
                    '<option value="bank_kas_surabaya" style="text-align: center;">Bank Kas Surabaya</option>';
        } else {
            html += '<option value=""></option>' +
                    '<option value="bank_kas_jakarta" style="text-align: center;">Bank Kas Jakarta</option>' +
                    '<option value="bank_kas_surabaya" style="text-align: center;">Bank Kas Surabaya</option>';
        }

        $('select[name=rekeningtujuan]').html(html);
    });

    // Initialize flatpickr
    flatpickr('#tgl_transaksi', {
        enableTime: true,
        dateFormat: "Y-m-d",
        clickOpens: true,
        onChange: function(selectedDates, dateStr, instance) {
            document.getElementById('tgl_transaksi').value = dateStr;
        }
    });



});
function submitForm() {
    document.getElementById('tgl_transaksi').addEventListener('focus', function() {
    flatpickr('#tgl_transaksi', {
         enableTime: true,
         dateFormat: "Y-m-d", // Format tanggal
         clickOpens: true,
         onChange: function(selectedDates, dateStr, instance) {
            document.getElementById('tgl_transaksi').value = dateStr;
         }
      });
    });



    var formData = {};
  var filename = document.getElementById('image').value;
    console.log(filename);
    // Loop melalui setiap elemen input dalam form
    $('#form-kas input').each(function() {
        // Ambil nilai atribut 'name' dari setiap elemen input dan gunakan sebagai key
      var tanggalTransaksi = $('#tgl_transaksi').val();
       
      var ppn = $('#ppn').val();
      var money_from = $('#money_from').val();
      var harga = $('#harga').val();
      var pic = $('#pic').val();
      var keterangan = $('#keterangan').val();

    
          var image = $('#image').val();
        
     
       formData['tgl_transaksi'] = tanggalTransaksi;
        formData['ppn'] = ppn;
        formData['money_from'] = money_from;
      
        formData['pic'] = pic;
        formData['keterangan'] = keterangan;
      
  
        formData['image'] = image;
        var fieldName = $(this).attr('name');
        // Ambil nilai dari elemen input dan gunakan sebagai value
        var fieldValue = $(this).val();
        // Tambahkan key dan value ke objek formData
        formData[fieldName] = fieldValue;
    });

    // Kirim data form menggunakan AJAX
    $.ajax({
        type: 'GET', // Sesuaikan dengan metode HTTP yang digunakan
        url: "{{ route('admin.tambahpost_kas') }}", // Ganti dengan URL endpoint yang benar
        data: formData,
        success: function(response){
            // Tampilkan pesan atau lakukan aksi lain sesuai respons dari server
            
             Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Berhasil Ditambah',
            }).then((result) => {
                // Arahkan pengguna ke route lain setelah menutup SweetAlert2
                   location.reload();
            });
        },
        error: function(xhr, status, error){
            // Tangani kesalahan
            console.error(error);
        }
    });
}
   


</script>
@endsection