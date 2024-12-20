@extends('admin.templates_baru')


@section('title')
FCL Container    | PT. Maxipro Group Indonesia
@endsection
@section('link')

<link href="{{ asset('css/fcl.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    
    <div class="container-fluid">
        <h4 id="judulFcl" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp FCL Container</h4>
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">FCL Container {{ $username['data']['teknisi']['name'] }}</small>
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" onclick="tambahFcl(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add FCL Container</a>
         
                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="FilterBtn">Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi FCL</h5>
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
                                            <label for="namabaranglabel">Nama Supplier</label>
                                            <input type="text" class="form-control" placeholder="Nama Supplier" name="nama_supplier" id="id_nama_supplier"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                        </div>
                                         

                                    </form>
                                </div>

                                <div class="modal-footer">


                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- radio button untuk status -->
                    <div class="radio-button-container">
                        <label>
                            <div class="color-box bg-light-blue"></div>
                            <input type="radio" name="filter" value="requested" id="filter-status" {{ $Data['msg']['request_check'] == 'requested' ? 'checked' : '' }}>
                            Process
                            
                        </label>
                        <label>
                            <div class="color-box bg-pink"></div>
                            <input type="radio" name="filter" value="process" id="filter-status" {{ $Data['msg']['request_check'] == 'process' ? 'checked' : '' }}>
                            Pending / Barang Diterima Sebagian
                          
                        </label>
                        <label>
                            <div class="color-box bg-light-green"></div>
                            <input type="radio" name="filter" value="complete" id="filter-status" {{ $Data['msg']['request_check'] == 'complete' ? 'checked' : '' }}>
                            Completed
                          
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
                              $total_fcl_container_detail =0;
                            @endphp
                            <!-- Table data will be populated here -->
                            @foreach($Data['msg']['fclcontainer'] as $index => $data)


                            @php
                            \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                            $formattedDate = \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y');
                           $rowStyle = '';
                            if ($data['status_process'] == 'requested') {
                                $rowStyle = 'background-color: #97ebfb;';
                            } elseif ($data['status_process'] == 'process') {
                                $rowStyle = 'background-color: #FFC0CB;';
                            }
                            elseif ($data['status_process'] == 'complete') {
                                $rowStyle = 'background-color: #6cf670;';
                            }                            
                            @endphp
                        <tr style="{{ $rowStyle }}">
                            
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $num }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $formattedDate }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">INV-{{ $data['invoice_no'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['company'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['telp'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 150px; text-overflow: ellipsis;">{{ $Data['msg']['simbolmatauang'][$index] }} {{ $Data['msg']['fclcontainerBaru'][$index] }}</td>
                       
                       
                            <td style="border: 1px solid #d7d7d7;">
                                <button type="button" 
                                        onclick="detailFcl(this)" 
                                        data-id="{{ $data['id'] }}" 

                                        class="btn btn-large btn-info btn-danger" 
                                        style="width: 35px; height: 38px; padding: 9px 10px;" 
                                        title="Detailr">
                                    <i class="fas fa-times"></i>
                                </button>
                                @if($data['status_process'] == 'requested')
                                <button type="button" 
                                     
                                        data-id="{{ $data['id'] }}" 
                                        name="editButton" 
                                        class="btn btn-large btn-info btn-edit" 
                                        style="width: 35px; height: 38px; padding: 9px 10px;" 
                                        title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @else
                                <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit"><i class="fas fa-edit"></i></a>
                                @endif
                                
                                <button type="button" 
                                        onclick="deleteFcl(this)" 
                                        data-id="{{ $data['id'] }}" 
                                       
                                        class="btn btn-large btn-info btn-danger" 
                                        style="width: 35px; height: 38px; padding: 9px 10px;" 
                                        title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>


                            @php
                            $num++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- element untuk view tambah -->
                    <div id="addFclContainer" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            
                            <form action=""id="Formtambah"></form>
                    
                    </div>

                    <!-- element untuk view edit  -->
                    <div id="editFclContainer" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            
                            <form action=""id="Formedit"></form>
                    
                    </div>
                
                    <!-- modal edit restok -->
                    <!-- <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        <div id="tabe-stok"></div>

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                       

                                    </div>
                                    
                                    <div class="modal-body">
                                        
                                        <form id="Formedit">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                    
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload()" >Close</button>
                                   
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div> -->


                </div>
            </div>
        </div>
    </div>

    
</main>

            
                    <div id="detailFclContainer"  style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            <div id="divDetail"></div>
                    </div>
                  

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
<script src="../assets/js/fcl-container/fcl-container.js"></script> 

<!-- untuk load datatable -->
<script>
   
   var currentScrollPosition = $(window).scrollTop();
   var bottomScrollPosition = $(document).height() - $(window).height() - $(window).scrollTop();

   console.log('currentScroll',currentScrollPosition)
   console.log('bottomScrollPosition',bottomScrollPosition)
        //button clear Filter 
    $('#clearFilterBtn').on('click', function() {


            window.location.href = '{{ route('admin.pembelian_fcl') }}'; 
    })

    //untuk membuat datatable
    $(document).ready(function() {
        

        var table= $('#tabe-stok').DataTable({

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
                    data: 'name_perusahaan',
                    title: 'Nama Perusahaan'
                },
                {
                    data: 'telp',
                    title: 'No. Telp'
                },
                 {
                    data: 'total',
                    title: 'Total'
                },
               
                {
                    data: null,
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        
                        let invoiceValue = data.invoice.split('INV-')[1] || data.invoice;
                        return `
                            <button type="button" 
                                onclick="detailFcl(this)" 
                                data-id="${invoiceValue}" 
                                name="${invoiceValue}" 
                                class="btn btn-large btn-info btn-light" 
                                style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="Detail">
                            <i class="fas fa-eye"></i>
                        </button>

                        <button type="button" 
                                data-id="${invoiceValue}" 
                                name="${invoiceValue}" 
                                class="btn btn-large btn-info btn-edit" 
                                style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="${invoiceValue}"
                                onclick="editInvoice(this)">
                            <i class="fas fa-edit"></i>
                        </button>

                    
                        <button type="button" 
                                onclick="deleteFcl(this)" 
                                data-id="${invoiceValue}" 
                                name="${invoiceValue}" 
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

                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...'); // Menyesuaikan placeholder
            }
        });
        window.dataTableInstance = table;
    });

</script>


<script>
    function editInvoice(element) {
        event.preventDefault();
        var invoice = $(element).data('id');


        $.ajax({
            type: 'GET',
            url: '{{ route('admin.pembelian_fcl') }}',
            data: {
                menu: 'update',
                invoice: invoice,
            },
            success: function(response) {
                $('main.main-content').removeClass('wider ps ps--active-y');
                $('.btn-tambah').remove();
                
                if (window.dataTableInstance) {
                    window.dataTableInstance.destroy();
                }
                $('#tabe-stok').remove();
                $('.radio-button-container').remove();
                $('#clearFilterBtn').remove();
                $('#FilterBtn').remove();
                $('#Formedit').html(response);
                $('#judulFcl').html('<i class="fas fa-database"></i> &nbsp Edit FCL');
                document.title = 'Edit FCL | PT. Maxipro Group Indonesia';
                $('#editFclContainer').show();

                
            }
        });
    }


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
                                        //   console.log(formData)
                                    // Mengirim permintaan AJAX
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ route('admin.pembelian_restok_tambah_filter') }}', // Ganti URL_TARGET dengan URL tujuan Anda
                                        data: formData,
                                        success: function(response) {
                                            // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                                        //    console.log(response);
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
                url: '{{ route('admin.pembelian_fcl_filter') }}', // Replace with your server endpoint
                method: 'GET',
                data: { 
                    filterValue: selectedValue 
                },
                success: function(response) {
                    // Handle success response
                    // console.log(response);
            var newRoute = "{{ route('admin.pembelian_fcl_filter') }}?filterValue="+lastSelectedValue;

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
    document.getElementById('FilterBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });


   
    // Menangani klik pada tombol tambah
    function tambahFcl(element) {
        event.preventDefault();

        $('#product-restok-tambah-filter').val('');
        // console.log($('#product-restok-tambah-filter').val());
        if ($('#product-restok-tambah-filter').val() === null) {
          $('#product-restok-tambah-filter').remove();

          }

          
          var url = "{{ route('admin.pembelian_fcl') }}";

          $.ajax({
            url: url,
            type: 'GET', // Menggunakan metode GET
            data: {
                menu: 'create',

            },
            success: function(response) {
    
                $('.btn-tambah').remove()
                // $('main.main-content').removeClass('wider ps ps--active-y');
                if (window.dataTableInstance) {
                        window.dataTableInstance.destroy();
                    }
                    $('#tabe-stok').remove()
                    $('.radio-button-container').remove()
                    $('#clearFilterBtn').remove()
                    $('#FilterBtn').remove()
                // Insert the response into the form
                $('#Formtambah').html(response);
                $('#judulFcl').html('<i class="fas fa-database"></i> &nbsp Create FCL');
                document.title='Create FCL   | PT. Maxipro Group Indonesia'
                // Show the container that holds the form
                $('#addFclContainer').show(); // Display the form container
                
            },
            error: function(xhr, status, error) {
                // Sembunyikan elemen overlay dengan efek fade-out jika terjadi kesalahan

                // Handle error jika terjadi kesalahan
                console.error(xhr.responseText);
                return;
            }
        });

    }
    
  
    

    //Membuka modal update
    function updateRestok(element) {
        event.preventDefault();
        var id = $(element).data('id');
        // console.log(id);

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

    function deleteFcl(element) {
    event.preventDefault();
    var invoice = $(element).data('id');
    console.log('id',invoice)
    var restokName = $(element).attr('name');

    // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
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
            var url = "{{ route('admin.pembelian_fcl') }}";
            $('#reload-icon').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    invoice: invoice,
                    menu:'delete_fcl'
                },
                success: function(response) {
                    // Handle response jika sukses
                    // console.log(response);

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

    function detailFcl(element) {
        event.preventDefault();
        
        // Scroll halaman ke atas sebelum mengirim AJAX request
        window.scrollTo(0, 0); 

        var invoice = $(element).data('id');
        var restokName = $(element).attr('name');
        

        $.ajax({
            url: '{{ route('admin.pembelian_fcl') }}',
            data: {
                invoice: invoice,
                menu: 'detail_fcl'
            },
            success: function(response) {
                // Menghapus elemen yang tidak dibutuhkan
                $('aside.sidenav').remove();
                $('.btn-tambah').remove();

                if (window.dataTableInstance) {
                    window.dataTableInstance.destroy();
                }

                $('#tabe-stok').remove();
                $('.radio-button-container').remove();
                $('#clearFilterBtn').remove();
                $('#FilterBtn').remove();

                // Mengisi div detail dengan response
                $('#divDetail').html(response);
                $('#detailFclContainer').css({
                    'background-image': 'url(https://i.pinimg.com/originals/e4/5f/54/e45f54e2cc5516e2210c34453db5ab6e.jpg)',
                    'background-size': 'cover',
                    'background-position': 'center',
                    'background-repeat': 'no-repeat',
                    'min-height': '100vh',       // Membuat elemen memenuhi tinggi viewport
                    'min-width':'100vh',
                    'display': 'flex',           // Mengaktifkan flexbox
                    'flex-direction': 'column',  // Susunan elemen secara vertikal
                    'justify-content': 'center', // Posisi elemen di tengah secara vertikal
                    'align-items': 'center'      // Posisi elemen di tengah secara horizontal
                });
                $('#detailFclContainer').show();

                $('#judulFcl').hide();
                $('.display-block').hide();
                document.title = 'Detail FCL   | PT. Maxipro Group Indonesia';
                $('.container-fluid').hide();

                // Menyembunyikan card
                $('.card').css({
                    'display': 'none'
                });
                

                // Atur tampilan main agar background image memenuhi halaman
                // $('main.main-content').css({
                //     'background-image': 'url(https://i.pinimg.com/originals/e4/5f/54/e45f54e2cc5516e2210c34453db5ab6e.jpg)',
                //     'background-size': 'cover',
                //     'background-position': 'center',
                //     'background-repeat': 'no-repeat',
                //     'min-height': '100vh', // Agar main content memenuhi viewport
                //     'display': 'flex',      // Mengaktifkan flexbox untuk alignment
                //     'flex-direction': 'column', // Vertikal stack
                //     'justify-content': 'center', // Center vertikal
                //     'align-items': 'center' // Center horizontal
                // });
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
            var id_nama_supplier = document.getElementById('id_nama_supplier').value;
              var filterValue = document.querySelector('input[name="filter"]:checked').value;
              console.log(id_nama_supplier)
              // var filterValue = document.querySelector('input[name="filter-status"]:checked').value;

  
            // Membuat query string dari data yang akan dikirim
            // console.log(id_kode_barang)
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&id_nama_supplier=' + encodeURIComponent(id_nama_supplier)+'&filterValue=' + encodeURIComponent(filterValue);

            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.pembelian_fcl_filter') }}" + '?' + queryString;

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

                     var reloadUrl = "{{ route('admin.pembelian_fcl_filter') }}" + '?' + queryString;
                
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
                    // console.log(response);
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