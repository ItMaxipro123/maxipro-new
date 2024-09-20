@extends('admin.templates_baru')


@section('title')
Voucher | PT. Maxipro Group Indonesia
@endsection
@section('link')

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
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Voucher</h4>

        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Voucher {{ $username['data']['teknisi']['name'] }}</small>
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">

                    
                    <form action="" class="form-horizontal" id="form-input" method="get">
                        @csrf
                        <h4 style="margin-bottom: 10px;">Form Tambah Voucher</h4>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Kode Voucher</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="kode" value="{{ $Data['msg']['kode'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Status</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="status" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="" style="text-align: center;">Pilih Status</option>
                                    <option value="1" style="text-align: center;">Aktif</option>
                                    <option value="0" style="text-align: center;">Tidak Aktif</option>
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>



                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Search</button>
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
<script>
    $('.select-search').select2({
        theme: "custom",

    });
</script>
<script>
    function handleSubmit() {
        // Lakukan penanganan form disini
        // Contoh:
        // document.getElementById('form-input').submit(); // Mengirimkan formulir secara default

        // Pindah halaman ke halaman lain menggunakan JavaScript
        // window.location.href = "{{ route('admin.voucher') }}"; // Ganti 'nama_rute' dengan nama rute yang Anda inginkan
        return false; // Mencegah pengiriman formulir secara default
    }
</script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
<script>
    

    // Menangkap acara submit formulir
    $('#form-input').submit(function(event) {
        // Mencegah perilaku default formulir
        event.preventDefault();

        // Mengumpulkan data formulir
        var formData = {
          // Mengambil data-id dari elemen input
            kode: $('input[name=kode]').val(),
            status: $('select[name=status]').val()
        };
        console.log(formData);
        // Mengirim permintaan AJAX
        $.ajax({
            type: 'GET',
            url: '{{ route('admin.tambah_voucher') }}', // Ganti URL_TARGET dengan URL tujuan Anda
            data: formData,
            success: function(response) {
                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                console.log(response);
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Voucher berhasil ditambahkan!',
                }).then((result) => {
                    // Mengalihkan halaman ke halaman tertentu setelah mengklik OK pada SweetAlert
                    window.location.href = "{{ route('admin.voucher') }}";
                });
            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan jika terjadi
                console.error(error);
            }
        });
    });
</script>
@endsection