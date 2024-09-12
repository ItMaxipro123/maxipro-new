@extends('admin.templates_baru')
@section('title')

Opname Stok | PT. Maxipro Group Indonesia

@endsection
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 50px;"><i class="fas fa-database"></i> &nbsp Opname</h4>
    </div>

    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.lihatstokperusahaan') ? 'active' : '' }}" data-toggle="tab" href="javascript:void()" onclick="klikstokperusahaan()" role="tab" style="color:black;">By Perusahaan</a>
        </li>
        <li class="nav-item">
            <a href="javascript:void" class="nav-link"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.lihatstok') ? 'active' : '' }}" data-toggle="tab" href="javascript:void()" onclick="klikstok()" role="tab" style="color:black;">By Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.lihatstoksubkategori') ? 'active' : '' }}" data-toggle="tab" href="javascript:void()" onclick="klikstoksubkategori()" role="tab" style="color:black;">By Subkategori</a>
        </li>
    </ul> -->


    <div class="container-fluid py-4 h-100">
        <div class="row h-100  align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: 360px;">
                    <form action="#" class="form-horizontal">
                        <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Gudang</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="gudang" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="" style="text-align: center;">Pilih Gudang</option>
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Jenis Item</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="item" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="" style="text-align: center;">Pilih Jenis Item</option>
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Sort By</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="item" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="" style="text-align: center;">Nama Barang</option>
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" class="btn btn-primary" style="margin-left: auto;">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // Simpan konten form di variabel saat halaman dimuat
    var defaultContent = $('#produkForm').html();

    function klikstokperusahaan() {
        $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Stok - By Perusahaan');
        $.get("{{ route('admin.lihatstokperusahaan') }}", function(data) {
            $("#content").html(data);
            // Menghapus kelas 'active' dari link sebelumnya dan menambahkannya ke link yang baru diklik
            $('.nav-link').removeClass('active');
            $('a.nav-link[data-toggle="tab"]').eq(0).addClass('active');
        })
    }

    function klikstok() {
        // Menampilkan kembali konten form default
        $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Stok - By Produk');
        $("#content").html(defaultContent);
        // Menambahkan kelas 'active' pada link "By Produk"
        $('.nav-link').removeClass('active');
        $('a.nav-link[data-toggle="tab"]').eq(1).addClass('active');
    }

    function klikstoksubkategori() {
        $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Stok - By SubKategori');
        $.get("{{ route('admin.lihatstoksubkategori') }}", function(data) {
            $("#content").html(data);
            // Menghapus kelas 'active' dari semua link dan menambahkannya hanya pada link 'By Subkategori'
            $('.nav-link').removeClass('active');
            $('a.nav-link[data-toggle="tab"]').eq(2).addClass('active');
        })
    }
</script>
@endsection