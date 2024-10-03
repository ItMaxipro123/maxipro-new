@extends('admin.templates_baru')


@section('title')
Kas | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
@section('scriptatas')
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
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Kas Bank Surabaya</h4>
        <!-- <small class="display-block" style="padding-left: 35px;">Stok {{ $username['data']['teknisi']['name'] }}</small> -->
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Kas Bank Surabaya {{ $username['data']['teknisi']['name'] }}</small>
    </div>
 <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.kaspengeluaranpt') || request()->routeIs('admin.kaspengeluaranpt_filter') ? 'active' : '' }}" href="{{ route('admin.kaspengeluaranpt') }}" role="tab" style="color:black;">Pengeluaran PT</a>
        </li>


        <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('admin.kasbankjakarta') ||  request()->routeIs('admin.kasbankjakarta_filter') ? 'active' : '' }}" href="{{ route('admin.kasbankjakarta') }}" role="tab" style="color:black;">Kas Bank Jakarta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.kasbanksurabaya') ||  request()->routeIs('admin.kasbanksurabaya_filter') ? 'active' : '' }}" href="{{ route('admin.kasbanksurabaya') }}" role="tab" style="color:black;">Kas Bank Surabaya</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('admin.kasjakarta') || request()->routeIs('admin.kasjakarta_filter') ? 'active' : '' }}" href="{{ route('admin.kasjakarta') }}" role="tab" style="color:black;">Kas Jakarta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.kassurabaya') || request()->routeIs('admin.kassurabaya_filter') ? 'active' : '' }}" href="{{ route('admin.kassurabaya') }}" role="tab" style="color:black;">Kas Surabaya</a>
        </li>
    </ul>



    <div class="container-fluid py-4 h-100">

        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('admin.tambah_datavoucher') }}" class="btn btn-large btn-primary" style="width:13%">Tambah Transaksi</a>
                                <div class="d-flex justify-content-end">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger" style="width: 10%; margin-right: 5px;" id="">Export PDF</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success" style="width: 10%; margin-right: 5px;" id="">Export XLS</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" style="width: 10%; margin-right: 5px;" id="">Clear Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Kas</h5>
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
                                            <input type="text" value="{{ $data['msg']['tgl_awal'] }}" class="form-control" id="tgl_awal" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="endDatepicker">Pilih Periode Akhir:</label>
                                            <input type="text" value="{{ $data['msg']['tgl_akhir'] }}" class="form-control" id="tgl_akhir" disabled>
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

                    <div class="modal fade" id="coaModal" tabindex="-1" role="dialog" aria-labelledby="coaModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="coaModalLabel">Add Coa/Akun</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-input">

                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">COA / Akun</label>
                                            <div style="position: relative; width: 100%;">
                                                <select class="select select2 select-search form-control" name="" style="border: 1px solid #ced4da; width: 100%;" required>
                                                    <option value="Belum di Inputkan" style="text-align: center;">Pilih COA / Akun</option>

                                                    @php


                                                    $allcoa =$data['msg']['allcoa'];
                                                    @endphp
                                                    @foreach($allcoa as $datacoa)
                                                    <option value="{{ $datacoa['id'] }}" style="text-align: center;">{{ $datacoa['name'] }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">

                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    <!-- code diatas untuk modal bootstrap 4 -->

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- code diatas untuk modal bootstrap 5 -->

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <div class="table-responsive">
                        <table id="tabe-stok" class="table table-bordered table-striped">
                            <thead>

                            </thead>
                            <tbody>
                                @php
                                $num =1;

                                $kaskeluar =$data['msg']['kaskeluar'];
                                @endphp
                                <!-- Table data will be populated here -->
                                @foreach($kaskeluar as $index => $data)

                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>{{ \Carbon\Carbon::parse($kaskeluar[$index]['tgl_transaksi'])->translatedFormat('j F Y') }}</td>
                                    <td>{{ $kaskeluar[$index]['pic'] }} <br>{{ $kaskeluar[$index]['name'] }} <br>{{ $kaskeluar[$index]['keterangan'] }}</td>

                                    <td>{{ $kaskeluar[$index]['invoice'] }}</td>
                                    <td>
                                        @if($kaskeluar[$index]['name_coa'] != 'Belum di Inputkan')
                                        {{ $kaskeluar[$index]['name_coa'] }}
                                        @else
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#coaModal">Search Coa</button>
                                        @endif
                                    </td>
                                    @if($kaskeluar[$index]['kategori_kas']=="pendapatan")

                                    <td>Rp {{ number_format($kaskeluar[$index]['price'], 0, ',', '.') }}</td>

                                    @else
                                    <td></td>
                                    @endif
                                    @if($kaskeluar[$index]['kategori_kas']=="pengeluaran")

                                    <td>Rp {{ number_format($kaskeluar[$index]['price'], 0, ',', '.') }}</td>

                                    @else
                                    <td></td>
                                    @endif
                                    <td>Rp {{ number_format($kaskeluar[$index]['saldoakhir'], 0, ',', '.') }}</td>

                                    <td style="width: 15%; border: 1px solid #ccc; ">

                                        <a href="javascript:void(0)" onclick="" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit">Detail</a>
                                        <a href="javascript:void(0)" onclick="updateVoucher(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit">Edit</a>
                                        <a href="javascript:void(0)" onclick="" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-danger btn-edit">Delete</a>

                                    </td>





                                </tr>
                                @php $num++
                                @endphp
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="tabe-stok"></div>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document"> <!-- Added 'modal-lg' class for large size -->
                                <div class="modal-content">
                                    <!-- Header modal, including close button -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Kas Bank Jakarta</h5>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form id="editForm">
                                            <!-- Your form content here -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Button to close the modal and reload the page -->
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- mendrawing datatable -->



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
                    data: 'id',
                    title: 'No'
                },
                {
                    data: 'tgl_transaksi',
                    title: 'Tanggal Transaksi'
                },
                {
                    data: 'keterangan',
                    title: 'Pic - Keterangan'
                },
                {
                    data: 'invoice',
                    title: 'Invoice'
                },
                {
                    data: 'coa',
                    title: 'COA'
                },
                {
                    data: 'kategori_kas',
                    title: 'Pendapatan'
                },
                {
                    data: 'kategori',
                    title: 'Pengeluaran'
                },
                {
                    data: 'saldoakhir',
                    title: 'Saldo'
                },
                {
                    data: 'link',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        return '<a href="' + data + '</a>';
                    }
                }
                // Tambahkan definisi kolom lainnya sesuai kebutuhan
            ],
            "initComplete": function(settings, json) {

                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...'); // Menyesuaikan placeholder
            }
        });
    });
</script>


<!-- untuk menampilkan modal filter -->
<script>
    // Menangani peristiwa klik pada tombol "Filter"
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });

    function updateVoucher(element) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);

        var url = "{{ route('admin.kasedit_pengeluaranpt') }}";

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
                //hapus data berdasarkan elemen, element berupa id

                // Misalnya, muat ulang halaman atau perbarui bagian yang relevan
            },
            error: function(xhr, status, error) {
                // Handle error jika terjadi kesalahan
                console.error(xhr.responseText);
                return;
            }
        });
    }
</script>

<!-- Script untuk menampilkan modal edit saat tombol edit ditekan -->
<script>

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
            var url = "{{ route('admin.kaspengeluaranpt_filter') }}" + '?' + queryString;

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

                    var reloadUrl = "{{ route('admin.kaspengeluaranpt_filter') }}" + '?' + '&checkdatevalue=' + encodeURIComponent(checkdatevalue) + '&tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir);
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

@endsection