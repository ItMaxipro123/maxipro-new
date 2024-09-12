@extends('admin.templates')


@section('title')
List Sparepart | PT. Maxipro Group Indonesia
@endsection

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 50px;"><i class="fas fa-database"></i> &nbsp List Sparepart</h4>
    </div>




    <div class="container-fluid py-4 h-100">
        <div class="row h-100  align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: 360px;">
                    <div class="form-group" style="display: flex; padding-top: 5px; text-align: start; padding-bottom: 10px;">

                        <button type="button" class="btn btn-warning" data-toggle="modal" style="margin-left: auto; margin-right: 10px;">Filter</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" style="width: max-content;">Clear Filter</button>
                    </div>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Permintaan</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Informasi Barang/Invoice</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // // Simpan konten form di variabel saat halaman dimuat
    // var defaultContent = $('#content').html();

    // function updateTitle(title) {
    //     document.title = title + " | PT. Maxipro Group Indonesia ";
    // }

    // function klikall() {
    //     $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Service - All');
    //     updateTitle("Service All");
    //     $.get("{{ route('admin.serviceall') }}", function(data) {
    //         $("#content").html(data);
    //         // Menghapus kelas 'active' dari link sebelumnya dan menambahkannya ke link yang baru diklik
    //         $('.nav-link').removeClass('active');
    //         $('a.nav-link[data-toggle="tab"]').eq(0).addClass('active');
    //     })
    // }

    // function klikpelaporan() {
    //     // Menampilkan kembali konten form default
    //     $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Service - Pelaporan');
    //     updateTitle("Service Pelaporan");
    //     $("#content").html(defaultContent);
    //     // Menambahkan kelas 'active' pada link "By Produk"
    //     $('.nav-link').removeClass('active');
    //     $('a.nav-link[data-toggle="tab"]').eq(1).addClass('active');
    // }

    // function klikpengerjaan() {
    //     $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Service - Pengerjaan');
    //     updateTitle("Service Pengerjaan");
    //     $.get("{{ route('admin.servicepengerjaan') }}", function(data) {
    //         $("#content").html(data);
    //         // Menghapus kelas 'active' dari semua link dan menambahkannya hanya pada link 'By Pengerjaan'
    //         $('.nav-link').removeClass('active');
    //         $('a.nav-link[data-toggle="tab"]').eq(2).addClass('active');
    //     })
    // }

    // function klikselesai() {
    //     $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Service - Selesai');
    //     updateTitle("Service Selesai");
    //     $.get("{{ route('admin.serviceselesai') }}", function(data) {
    //         $("#content").html(data);
    //         // Menghapus kelas 'active' dari semua link dan menambahkannya hanya pada link 'By Selesai'
    //         $('.nav-link').removeClass('active');
    //         $('a.nav-link[data-toggle="tab"]').eq(3).addClass('active');
    //     })
    // }

    // function klikhistory() {
    //     $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Service - History');
    //     updateTitle("Service History");
    //     $.get("{{ route('admin.servicehistory') }}", function(data) {
    //         $("#content").html(data);
    //         // Menghapus kelas 'active' dari semua link dan menambahkannya hanya pada link 'By Selesai'
    //         $('.nav-link').removeClass('active');
    //         $('a.nav-link[data-toggle="tab"]').eq(4).addClass('active');
    //     })
    // }
</script>
@endsection