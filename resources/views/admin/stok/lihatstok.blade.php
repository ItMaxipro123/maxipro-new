@extends('admin.templates')


@section('title')
Stok By Produk | PT. Maxipro Group Indonesia
@endsection
@section('style')
<style>
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

    .select2-results__option:hover {
        background-color: #f0f0f0;
        /* Warna latar belakang yang diinginkan saat kursor digerakkan */
        cursor: pointer;
        /* Ubah ikon kursor saat diarahkan ke opsi */
    }
</style>
@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Stok - By Produk</h4>
        <!-- <small class="display-block" style="padding-left: 35px;">Stok {{ $username['data']['teknisi']['name'] }}</small> -->
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Stok {{ $username['data']['teknisi']['name'] }}</small>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.lihatstokperusahaan') ? 'active' : '' }}" data-toggle="tab" href="javascript:void()" onclick="klikstokperusahaan()" role="tab" style="color:black;">By Perusahaan</a>
        </li>
        <!-- <li class="nav-item">
            <a href="javascript:void" class="nav-link"></a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.lihatstok') ? 'active' : '' }}" data-toggle="tab" href="javascript:void()" onclick="klikstok()" role="tab" style="color:black;">By Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.lihatstoksubkategori') ? 'active' : '' }}" data-toggle="tab" href="javascript:void()" onclick="klikstoksubkategori()" role="tab" style="color:black;">By Subkategori</a>
        </li>
    </ul>


    <div class="container-fluid py-4 h-100">
        <div class="row h-100  align-items-center">
            <div class="col-md-12">

                <!-- id content untuk dapat diganti sesuai pilihan tab dengan action onclick pada tag a class diatas -->
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">

                    <!-- <form action="{{ route('admin.cekstok_produk') }}" class="form-horizontal" id="form-input" method="post"> -->
                    <form class="form-horizontal" id="form-input" method="post">
                        @csrf
                        <div class="form-group" style="display: flex; align-items: center;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Kategori Produk</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="category" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="" style="text-align: center;">Pilih Kategori</option>
                                    <option value="all" style="text-align: center;">Semua</option>

                                    @foreach($data['data'] as $item)
                                    <option value="{{ $item['id'] }}" style="text-align: center;">{{ $item['name'] }}</option>
                                    @endforeach

                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Cari Produk</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 product-search form-control" name="id[]" style="border: 1px solid #ced4da; width: 100%;">

                                    <option value="3" style="text-align: center;">Pilih Produk</option>
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Gudang</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 gudang-search form-control" name="gudang[]" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="" style="text-align: center;">Pilih Gudang</option>
                                    @foreach($dataGudang['data'] as $item)
                                    <option value="{{ $item['id'] }}-{{$item['kode_bee']}}" style="text-align: center;">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Search</button>
                        </div>
                    </form>
                    <!-- <table id="tabe-stok" style="border: 1px solid black;">

                    </table> -->

                    <div class="col-sm-12" style="margin-top: 15px;">

                        <div id="tabe-stok"></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    // Simpan konten form di variabel saat halaman dimuat
    var defaultContent = $('#content').html();

    function updateTitle(title) {
        document.title = title + " | PT. Maxipro Group Indonesia ";
    }

    function klikstokperusahaan() {
        $('#overlay').fadeIn();
        // $(this).css('cursor', 'wait');

        $.get("{{ route('admin.lihatstokperusahaan') }}", function(data) {
            $('#overlay').fadeOut();
            $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Stok - By Perusahaan');
            updateTitle("Stok By Perusahaan");
            $("#content").html(data);
            // Menghapus kelas 'active' dari link sebelumnya dan menambahkannya ke link yang baru diklik
            $('.nav-link').removeClass('active');
            $('a.nav-link[data-toggle="tab"]').eq(0).addClass('active');
            $('.select-search').select2({
                theme: "custom" // Change the theme as per your requirement
            });
            $('.gudang-search').select2({
                theme: "custom" // Change the theme as per your requirement
            });

            $('select[name="category"]').change(function() {
                // Menampilkan overlay saat AJAX berjalan
                $('#overlay').fadeIn();

                var id = $(this).val();
                var stok = $('select[name="id[]"]').val();
                // $('#searchButton').css('cursor', 'default');

                $.ajax({
                        url: "{{ route('admin.lihatstok-produk') }}",
                        method: "GET",
                        data: {
                            id: id
                        },
                    })
                    .done(function(data) {
                        if (data.auth == false) {
                            sweetAlert({
                                title: "Opps!",
                                text: data.msg,
                                type: "error",
                            });
                        } else {
                            var html = '<option value="">Pilih Produk</option>' +
                                '<option value="allproduk">Semua</option>';

                            var selectedProducts = $('select[name="id[]"]').val();

                            $.each(data.product, function(i, item) {
                                html += '<option style="text-align: center;" value="' + item.id + '">' + item.new_kode + ' - ' + item.name + '</option>';
                            });
                            $('.product-search').html(html);

                            $('.product-search').select2({
                                theme: "classic",
                                multiple: true
                            });

                            // Menghapus opsi yang dipilih secara default
                            $('.product-search option:selected').prop('selected', false);
                            $('.select-search').select2({
                                theme: "custom" // Change the theme as per your requirement
                            });
                            $('.gudang-search').select2({
                                theme: "classic",
                                multiple: true // Change the theme as per your requirement
                            });
                            $('.gudang-search option:selected').prop('selected', false);
                        }
                    })
                    .fail(function() {
                        sweetAlert({
                            title: "Opss!",
                            text: "Kategori Error",
                            type: "error",
                        });
                    })
                    .always(function() {
                        // Menyembunyikan overlay setelah AJAX selesai
                        $('#overlay').fadeOut();
                    });
            });

            $(document).ready(function() {
                $('#searchButton').click(function(event) {
                    // Menghentikan aksi default dari event klik pada tombol pencarian
                    event.preventDefault();
                    // $('#overlay').fadeIn();
                    // Mengubah cursor menjadi 'wait'
                    $(this).css('cursor', 'wait');

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.cekstok_produk') }}",
                        data: $('#form-input').serialize(),
                        success: function(response) {
                            var data = JSON.parse(response);

                            // Menghapus isi tabel sebelum menambahkan data baru
                            $('#tabe-stok').empty();
                            $('#tabe-stok-pt').empty();
                            $('#judul').empty();
                            $('#judul-pt').empty();
                            // if (data.stokproductUD.length > 0) {
                            var judulpt = '<h2>Database PT</h2>';
                            $('#judul-pt').append(judulpt);
                            var judul = '<h2>Database UD</h2>';
                            $('#judul').append(judul);

                            $.each(data.produk_sum, function(j, value) {
                                var totalStokGudang = 0;
                                var totalStokGudangPT = 0;

                                let shouldAddNameRow = false;
                                let shouldAddNameRowPT = false;
                                $.each(data.stokproduct, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {
                                        shouldAddNameRowPT = true; // Set the flag to true if at least one row is added
                                        totalStokGudangPT += parseInt(item.stok_gudang);
                                    }
                                });
                                $.each(data.stokproductUD, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {
                                        shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                        totalStokGudang += parseInt(item.stok_gudang);
                                    }
                                });
                                if (shouldAddNameRowPT) {

                                    $('#tabe-stok-pt').append('<tr style="background: #d9d9d9;font-weight: bold;"><td class="font-weight-bold" colspan="2" style="padding: 5px;width: 15%;">' + value.name + '</td></tr></thead>');
                                }
                                if (shouldAddNameRow) {

                                    $('#tabe-stok').append('<tr style="background: #d9d9d9;font-weight: bold;"><td class="font-weight-bold" colspan="2" style="padding: 5px;width: 15%;">' + value.name + '</td></tr></thead>');
                                }


                                $.each(data.stokproduct, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {


                                        $('#tabe-stok-pt').append('<tr><td style="border: 1px solid black; width: 50%;">' + item.name_gudang + '</td><td style="border: 1px solid black; width: 50%;">' + item.stok_gudang + '</td></tr>');

                                    }
                                });
                                $.each(data.stokproductUD, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {


                                        $('#tabe-stok').append('<tr><td style="border: 1px solid black; width: 50%;">' + item.name_gudang + '</td><td style="border: 1px solid black; width: 50%;">' + item.stok_gudang + '</td></tr>');

                                    }
                                });
                                if (totalStokGudangPT > 0) {

                                    $('#tabe-stok-pt').append('<tr><td style="border: 1px solid black; width: 50%;background-color: black; color: white;">Total</td><td style="border: 1px solid black; width: 50%;background-color: black; color: white;">' + totalStokGudangPT + '</td></tr>');
                                }
                                if (totalStokGudang > 0) {

                                    $('#tabe-stok').append('<tr><td style="border: 1px solid black; width: 50%;background-color: black; color: white;">Total</td><td style="border: 1px solid black; width: 50%;background-color: black; color: white;">' + totalStokGudang + '</td></tr>');
                                }

                            });

                            // }



                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        },
                        complete: function() {
                            // Mengembalikan cursor menjadi 'default'
                            $('#searchButton').css('cursor', 'default');

                        }

                    });
                });
            });

        })
    }

    function klikstoksubkategori() {
        $('#overlay').fadeIn();
        $.get("{{ route('admin.lihatstoksubkategori') }}", function(data) {
            $('#overlay').fadeOut();
            $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Stok - By SubKategori');
            updateTitle("Stok By SubKategori");
            $("#content").html(data);
            // Menghapus kelas 'active' dari semua link dan menambahkannya hanya pada link 'By Subkategori'
            $('.nav-link').removeClass('active');
            $('a.nav-link[data-toggle="tab"]').eq(2).addClass('active');

            $('.select-search').select2({
                theme: "custom" // Change the theme as per your requirement
            });
            $('.gudang-search').select2({
                theme: "custom" // Change the theme as per your requirement
            });

            $('select[name="category"]').change(function() {
                // Menampilkan overlay saat AJAX berjalan
                $('#overlay').fadeIn();

                var id = $(this).val();
                var stok = $('select[name="id[]"]').val();
                // $('#searchButton').css('cursor', 'default');

                $.ajax({
                        url: "{{ route('admin.lihatstoksubkategori_produk') }}",
                        method: "GET",
                        data: {
                            id: id
                        },
                    })
                    .done(function(data) {
                        if (data.auth == false) {
                            sweetAlert({
                                title: "Opps!",
                                text: data.msg,
                                type: "error",
                            });
                        } else {
                            var html = '<option value="">Pilih Produk</option>' +
                                '<option value="allproduk">Semua</option>';

                            var selectedProducts = $('select[name="id[]"]').val();

                            $.each(data.data, function(i, item) {
                                html += '<option style="text-align: center;" value="' + item.id + '">' + item.new_kode + ' - ' + item.name + '</option>';
                            });
                            $('.product-search').html(html);

                            $('.product-search').select2({
                                theme: "classic",
                                multiple: true
                            });

                            // Menghapus opsi yang dipilih secara default
                            $('.product-search option:selected').prop('selected', false);
                            $('.select-search').select2({
                                theme: "custom" // Change the theme as per your requirement
                            });
                            $('.gudang-search').select2({
                                theme: "classic",
                                multiple: true // Change the theme as per your requirement
                            });
                            $('.gudang-search option:selected').prop('selected', false);
                        }
                    })
                    .fail(function() {
                        sweetAlert({
                            title: "Opss!",
                            text: "Kategori Error",
                            type: "error",
                        });
                    })
                    .always(function() {
                        // Menyembunyikan overlay setelah AJAX selesai
                        $('#overlay').fadeOut();
                    });
            });

            $(document).ready(function() {
                $('#searchButton').click(function(event) {
                    // Menghentikan aksi default dari event klik pada tombol pencarian
                    event.preventDefault();
                    // Mengubah cursor menjadi 'wait'
                    $(this).css('cursor', 'wait');

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.cekstoksubkategori') }}",
                        data: $('#form-input').serialize(),
                        success: function(response) {
                            var data = JSON.parse(response);
                            var html = '';

                            $.each(data.produk_sum, function(j, value) {
                                html += '<table width="100%" border="1" style="border-collapse: collapse;">';
                                let totalStok = 0;
                                let shouldAddNameRow = false;
                                let nameRow = '';

                                $.each(data.stokproduct, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {
                                        shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                        totalStok += parseInt(item.stok_gudang);
                                    }
                                });

                                $.each(data.stokproductUD, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {
                                        shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                        totalStok += parseInt(item.stok_gudang);
                                    }
                                });

                                if (shouldAddNameRow) {
                                    nameRow = '<tr style="background: #d9d9d9;font-weight: bold;">' +
                                        '<td colspan="2" style="padding: 5px;width: 15%; border: 1px solid black;">' + value.name + '</td>' +
                                        '</tr>';

                                    html += nameRow;
                                }

                                $.each(data.stokproduct, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {
                                        html += '<tr>' +
                                            '<td style="border: 1px solid black;padding: 5px;width: 15%;">' + item.name_gudang + '</td>' +
                                            '<td style="border: 1px solid black; padding: 5px;">' + item.stok_gudang + '</td>' +
                                            '</tr>';
                                    }
                                });

                                $.each(data.stokproductUD, function(i, item) {
                                    if (item.idproduct == value.id && item.stok_gudang > 0) {
                                        html += '<tr>' +
                                            '<td style="padding: 5px;width: 15%; border: 1px solid black;">' + item.name_gudang + '</td>' +
                                            '<td style="padding: 5px; border: 1px solid black;">' + item.stok_gudang + '</td>' +
                                            '</tr>';
                                    }
                                });

                                if (totalStok > 0) {
                                    html += '<tr>' +
                                        '<td style="padding: 5px;width: 15%; background-color: black; color: white; border: 1px solid white;">' + "Total" + '</td>' +
                                        '<td style="padding: 5px;width: 15%; background-color: black; color: white; border: 1px solid white;">' + totalStok + '</td>' +
                                        '</tr>';
                                }

                                html += '</table>';
                                html += '<br>';
                            });

                            $('#tabe-stok').html(html);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        },
                        complete: function() {
                            // Mengembalikan cursor menjadi 'default'
                            $('#searchButton').css('cursor', 'default');
                        }
                    });
                });
            });

        })



    }

    $('.select-search').select2({
        theme: "custom" // Change the theme as per your requirement
    });
    $('.gudang-search').select2({
        theme: "custom" // Change the theme as per your requirement
    });

    var isKlikStokRunning = false;

    function klikstok() {
        // Menghapus isi tabel sebelum menampilkan konten form default
        isKlikStokRunning = true;
        $('#tabe-stok').empty();

        // Menampilkan kembali konten form default
        $("#judulStok").html('<i class="fas fa-database"></i> &nbsp Stok - By Produk');
        updateTitle("Stok By Produk");
        $("#content").html(defaultContent);
        // Menambahkan kelas 'active' pada link "By Produk"
        $('.nav-link').removeClass('active');
        $('a.nav-link[data-toggle="tab"]').eq(1).addClass('active');

        // AJAX untuk mengambil data ketika kategori produk berubah
        $('select[name="category"]').change(function() {
            // Menampilkan overlay saat AJAX berjalan
            $('#overlay').fadeIn();

            var id = $(this).val();
            var stok = $('select[name="id[]"]').val();
            // $('#searchButton').css('cursor', 'default');

            $.ajax({
                    url: "{{ route('admin.lihatstok-produk') }}",
                    method: "GET",
                    data: {
                        id: id
                    },
                })
                .done(function(data) {
                    if (data.auth == false) {
                        sweetAlert({
                            title: "Opps!",
                            text: data.msg,
                            type: "error",
                        });
                    } else {
                        var html = '<option value="">Pilih Produk</option>' +
                            '<option value="allproduk">Semua</option>';

                        var selectedProducts = $('select[name="id[]"]').val();

                        $.each(data.product, function(i, item) {
                            html += '<option style="text-align: center;" value="' + item.id + '">' + item.new_kode + ' - ' + item.name + '</option>';
                        });
                        $('.product-search').html(html);

                        $('.product-search').select2({
                            theme: "classic",
                            multiple: true
                        });

                        // Menghapus opsi yang dipilih secara default
                        $('.product-search option:selected').prop('selected', false);
                        $('.select-search').select2({
                            theme: "custom" // Change the theme as per your requirement
                        });
                        $('.gudang-search').select2({
                            theme: "classic",
                            multiple: true // Change the theme as per your requirement
                        });
                        $('.gudang-search option:selected').prop('selected', false);
                    }
                })
                .fail(function() {
                    sweetAlert({
                        title: "Opss!",
                        text: "Kategori Error",
                        type: "error",
                    });
                })
                .always(function() {
                    // Menyembunyikan overlay setelah AJAX selesai
                    $('#overlay').fadeOut();
                });
        });

        $(document).ready(function() {
            $('#searchButton').click(function(event) {
                // Menghentikan aksi default dari event klik pada tombol pencarian
                event.preventDefault();
                // Mengubah cursor menjadi 'wait'
                $(this).css('cursor', 'wait');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.cekstok_produk') }}",
                    data: $('#form-input').serialize(),
                    success: function(response) {
                        var data = JSON.parse(response);
                        var html = '';

                        $.each(data.produk_sum, function(j, value) {
                            html += '<table width="100%" border="1" style="border-collapse: collapse;">';
                            let totalStok = 0;
                            let shouldAddNameRow = false;
                            let nameRow = '';

                            $.each(data.stokproduct, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                    totalStok += parseInt(item.stok_gudang);
                                }
                            });

                            $.each(data.stokproductUD, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                    totalStok += parseInt(item.stok_gudang);
                                }
                            });

                            if (shouldAddNameRow) {
                                nameRow = '<tr style="background: #d9d9d9;font-weight: bold;">' +
                                    '<td colspan="2" style="padding: 5px;width: 15%; border: 1px solid black;">' + value.name + '</td>' +
                                    '</tr>';

                                html += nameRow;
                            }

                            $.each(data.stokproduct, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    html += '<tr>' +
                                        '<td style="border: 1px solid black;padding: 5px;width: 15%;">' + item.name_gudang + '</td>' +
                                        '<td style="border: 1px solid black; padding: 5px;">' + item.stok_gudang + '</td>' +
                                        '</tr>';
                                }
                            });

                            $.each(data.stokproductUD, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    html += '<tr>' +
                                        '<td style="padding: 5px;width: 15%; border: 1px solid black;">' + item.name_gudang + '</td>' +
                                        '<td style="padding: 5px; border: 1px solid black;">' + item.stok_gudang + '</td>' +
                                        '</tr>';
                                }
                            });

                            if (totalStok > 0) {
                                html += '<tr>' +
                                    '<td style="padding: 5px;width: 15%; background-color: black; color: white; border: 1px solid white;">' + "Total" + '</td>' +
                                    '<td style="padding: 5px;width: 15%; background-color: black; color: white; border: 1px solid white;">' + totalStok + '</td>' +
                                    '</tr>';
                            }

                            html += '</table>';
                            html += '<br>';
                        });

                        $('#tabe-stok').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        // Mengembalikan cursor menjadi 'default'
                        $('#searchButton').css('cursor', 'default');
                    }
                });
            });
        });
    }

    if (!isKlikStokRunning) {
        // console.log('tidak ada');
        $('select[name="category"]').change(function() {
            // Menampilkan overlay saat AJAX berjalan
            $('#overlay').fadeIn();

            var id = $(this).val();
            var stok = $('select[name="id[]"]').val();
            // $('#searchButton').css('cursor', 'default');

            $.ajax({
                    url: "{{ route('admin.lihatstok-produk') }}",
                    method: "GET",
                    data: {
                        id: id
                    },
                })
                .done(function(data) {
                    if (data.auth == false) {
                        sweetAlert({
                            title: "Opps!",
                            text: data.msg,
                            type: "error",
                        });
                    } else {
                        var html = '<option value="">Pilih Produk</option>' +
                            '<option value="allproduk">Semua</option>';

                        var selectedProducts = $('select[name="id[]"]').val();

                        $.each(data.product, function(i, item) {
                            html += '<option style="text-align: center;" value="' + item.id + '">' + item.new_kode + ' - ' + item.name + '</option>';
                        });
                        $('.product-search').html(html);

                        $('.product-search').select2({
                            theme: "classic",
                            multiple: true
                        });

                        // Menghapus opsi yang dipilih secara default
                        $('.product-search option:selected').prop('selected', false);
                        $('.select-search').select2({
                            theme: "custom" // Change the theme as per your requirement
                        });
                        $('.gudang-search').select2({
                            theme: "classic",
                            multiple: true // Change the theme as per your requirement
                        });
                        $('.gudang-search option:selected').prop('selected', false);
                    }
                })
                .fail(function() {
                    sweetAlert({
                        title: "Opss!",
                        text: "Kategori Error",
                        type: "error",
                    });
                })
                .always(function() {
                    // Menyembunyikan overlay setelah AJAX selesai
                    $('#overlay').fadeOut();
                });
        });

        $(document).ready(function() {
            $('#searchButton').click(function(event) {
                // Menghentikan aksi default dari event klik pada tombol pencarian
                event.preventDefault();
                // Mengubah cursor menjadi 'wait'
                $(this).css('cursor', 'wait');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.cekstok_produk') }}",
                    data: $('#form-input').serialize(),
                    success: function(response) {
                        var data = JSON.parse(response);
                        var html = '';

                        $.each(data.produk_sum, function(j, value) {
                            html += '<table width="100%" border="1" style="border-collapse: collapse;">';
                            let totalStok = 0;
                            let shouldAddNameRow = false;
                            let nameRow = '';

                            $.each(data.stokproduct, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                    totalStok += parseInt(item.stok_gudang);
                                }
                            });

                            $.each(data.stokproductUD, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    shouldAddNameRow = true; // Set the flag to true if at least one row is added
                                    totalStok += parseInt(item.stok_gudang);
                                }
                            });

                            if (shouldAddNameRow) {
                                nameRow = '<tr style="background: #d9d9d9;font-weight: bold;">' +
                                    '<td colspan="2" style="padding: 5px;width: 15%; border: 1px solid black;">' + value.name + '</td>' +
                                    '</tr>';

                                html += nameRow;
                            }

                            $.each(data.stokproduct, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    html += '<tr>' +
                                        '<td style="border: 1px solid black;padding: 5px;width: 15%;">' + item.name_gudang + '</td>' +
                                        '<td style="border: 1px solid black; padding: 5px;">' + item.stok_gudang + '</td>' +
                                        '</tr>';
                                }
                            });

                            $.each(data.stokproductUD, function(i, item) {
                                if (item.idproduct == value.id && item.stok_gudang > 0) {
                                    html += '<tr>' +
                                        '<td style="padding: 5px;width: 15%; border: 1px solid black;">' + item.name_gudang + '</td>' +
                                        '<td style="padding: 5px; border: 1px solid black;">' + item.stok_gudang + '</td>' +
                                        '</tr>';
                                }
                            });

                            if (totalStok > 0) {
                                html += '<tr>' +
                                    '<td style="padding: 5px;width: 15%; background-color: black; color: white; border: 1px solid white;">' + "Total" + '</td>' +
                                    '<td style="padding: 5px;width: 15%; background-color: black; color: white; border: 1px solid white;">' + totalStok + '</td>' +
                                    '</tr>';
                            }

                            html += '</table>';
                            html += '<br>';
                        });

                        $('#tabe-stok').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        // Mengembalikan cursor menjadi 'default'
                        $('#searchButton').css('cursor', 'default');
                    }
                });
            });
        });


    }
</script>



@endsection