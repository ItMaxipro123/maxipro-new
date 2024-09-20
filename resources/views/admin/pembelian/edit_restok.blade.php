@extends('admin.templates_asetjs')
@section('link')

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection

@section('style')
<style>
    /* CSS untuk gaya select2 custom */
    .empty-row {
        border: none;
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

     .custom-border {
        border: 1px solid #ced4da;
        padding-left: 20px;
    }
</style>
@endsection

@section('content')
<form action="" class="form-horizontal" id="editForm" method="get">
    @csrf
    

    <div class="form-group" style="display: flex; align-items: center; margin-top:10px; margin-bottom: 20px;">
        
      <div class="form-group">

        <input type="hidden" class="form-control custom-border" id="id_edit" name="id_edit_name" value="{{ $Data['msg']['restok']['id'] }}">
    </div>
    <div style="position: relative; width: 100%;">
        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Jumlah Permintaan</label>
        <input type="number" class="form-control" data-id="{{ $Data['msg']['restok']['jml_permintaan'] }}" name="jml_permintaan" value="{{ $Data['msg']['restok']['jml_permintaan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
    </div>
    </div>

    <div class="form-group">
        <label for="startDatepicker">Tanggal Request:</label>
        <input type="text" class="form-control custom-border" id="tgl_request" name="tgl_request_edit" value="{{ $Data['msg']['restok']['tgl_request'] }}">
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-lg-3 control-label" style="font-size: 15px;">Produk</label>
     
        <select class="select select2 select-search form-control" id="product-restok-edit-filter" name="edit_product">
            
            @foreach($Data['msg']['product'] as $index => $product)
            <option value="{{ $product['id'] }}" {{ $Data['msg']['restok']['id_barang'] == $product['id'] ? 'selected' : ''}} >{{$product['new_kode']}} - {{ $product['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div id="new-edit-container-gambar">
                <img src="{{ $Data['msg']['image'] }}" alt="gambar product" style="width: 270px; height: 270px;">
            </div>
        </div>
        <div class="col-md-4">
            <div id="new-edit-container">
                   <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Database PT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Gudang</td>
                            <td>Qty</td>
                        </tr>
                            @php
                    $totalStokGudang = 0;
                    @endphp
                    @foreach($Data['msg']['stokproduct'] as $index => $stok)
                    @php
                    $totalStokGudang += $stok['stok_gudang'];
                    @endphp
                    <tr>
                        <td>{{ $stok['name_gudang'] }}</td>
                        <td>{{ $Data['msg']['stokproduct'][$index]['stok_gudang'] }}</td>
                    </tr>
                    @endforeach

                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{ $totalStokGudang }}</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div id="new-edit-container2">
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Database UD</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Gudang</td>
                            <td>Qty</td>
                        </tr>
                        @php
                        $totalStokGudangUD = 0;
                        @endphp
                        @foreach($Data['msg']['stokproductUD'] as $index => $stok)
                        @php
                        $totalStokGudangUD += $stok['stok_gudang'];
                        @endphp
                        <tr>
                            <td>{{ $stok['name_gudang'] }}</td>
                            <td>{{ $Data['msg']['stokproductUD'][$index]['stok_gudang'] }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalStokGudangUD }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="new-edit-container-kosong"></div>

    <div class="form-group">
        <label for="kodebaranglabel">Keterangan</label>
        <textarea type="text" class="form-control" id="keterangan" name="keterangan_name_edit" style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">{{ $Data['msg']['restok']['keterangan'] }}</textarea>
    </div>

    <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
         <button type="button" id="submitButton" class="btn btn-primary" style="margin-left: auto;">Select</button>

    </div>
</form>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
                var countstokPT =0;
                var countstokUD =0;
                var countStokTotal=0;
                var lastStok = {{ $Data['msg']['restok']['last_stok'] }};
                    console.log(lastStok);

                $(document).ready(function() {
                    
                    // Initialize Choices.js on the select element
                    const element = document.getElementById('product-restok-edit-filter');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
                    }

                    // Initialize flatpickr on the date input
                    flatpickr("#tgl_request", {
                        dateFormat: "Y-m-d",
                        
                        disableMobile: true
                    });
                });


                // proses pengecekan stok
                $(document).ready(function() {
                    
                    // Event listener for dropdown change
                    $('#product-restok-edit-filter').change(function() {
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
                                            var img = $('<img>').attr('src', "https://maxipro.id.test/images/placeholder/basic.png").css('width', '70px').css('height', '70px');
                                            $('#new-edit-container-gambar').empty().append(img);
                                        }
                                          appendImage(); 
                                        var emptyTable = $('<table>').addClass('table').css('border', '1px solid black');
                                        var emptyRow = $('<tr>').append($('<td>').text('Stok Kosong'));
                                        emptyTable.append(emptyRow);
                                        $('#new-edit-container').empty(); // Menghapus tabel dari #new-edit-container
                                        $('#new-edit-container2').empty();
                                         // $('#new-edit-container-gambar').empty();
                                        $('#new-edit-container-kosong').html(emptyTable);
                                      // Clear the second table as well
                                    }
                                    else {
                                        //bila response ! {}
                                    
                                        function appendImage() {
                                            var img = $('<img>').attr('src', response.msg.image).css('width', '270px').css('height', '270px');
                                            $('#new-edit-container-gambar').empty().append(img);
                                        }
                                       // $('#new-edit-container-gambar').append(img);
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
                                            $('#new-edit-container').html(newTable);
                                                $('#new-edit-container-kosong').empty();
                                        }
                                        else {
                                            $('#new-edit-container').html(''); // Clear the table if countStokPT is 0
                                                $('#new-edit-container-kosong').empty();
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
                                            $('#new-edit-container2').html(newTable2);
                                                $('#new-edit-container-kosong').empty();
                                        } else {
                                            $('#new-edit-container2').html(''); // Clear the second table if countStokUD is 0
                                            $('#new-edit-container-kosong').empty();
                                        }
                                   }     
                                        countStokTotal = countstokPT + countstokUD;   
                                         lastStok = countStokTotal;




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

                $('#submitButton').click(function(event) {
                        // Mencegah perilaku default tombol
                        event.preventDefault();
                   
                        // Mengumpulkan data formulir
                        var formData = {
                            id: $('input[name=id_edit_name]').val(),
                            tgl_request: $('input[name=tgl_request_edit]').val(),
                            jml_permintaan: $('input[name=jml_permintaan]').val(),
                            keterangan: $('textarea[name=keterangan_name_edit]').val(),
                            product: $('#product-restok-edit-filter').val(),
                           laststok: lastStok,
                            
                        };
                        console.log(formData)
                        // Mengirim permintaan AJAX
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('admin.pembelian_restok_edit_filter') }}', // mengirim data melalui url
                            data: formData,
                            success: function(response) {
                                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                                console.log(response);
                                if (response !== null) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Restok berhasil diedit!',
                                    }).then((result) => {
                                    // Jika pengguna menekan tombol "OK", muat ulang halaman
                                    if (result.isConfirmed || result.isDismissed) {
                                        location.reload();
                                    }
                                });
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'Restok Gagal diedit!',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                // Penanganan kesalahan jika terjadi
                                console.error(error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat mengirim permintaan!',
                                });
                            }
                        });
                    });
</script>

@endsection
