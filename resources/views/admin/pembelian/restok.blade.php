@extends('admin.templates_baru')


@section('title')
Pembeliaan    | PT. Maxipro Group Indonesia
@endsection
@section('link')

<link href="{{ asset('css/restok.css') }}" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


  

@endsection
@section('style')



@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div class="row">
        <div class="col-md-6">

            <div class="container-fluid">
                <h4 id="judulRestok"><i class="fas fa-database"></i> &nbsp Restok</h4>
                <small class="display-block" id="subjudul">Restok {{ $username['data']['teknisi']['name'] }}</small>
                
            </div>
        </div>
        <div class="col-md-6">
            <!-- navbar untuk membuka sidebar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                    <div class="container-fluid py-1 px-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">


                                </ol>
                                <h6 class="font-weight-bolder mb-0"></h6>
                            </nav>
                            <div  id="navbar">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                
                                </div>
                                    <ul class="navbar-nav  justify-content-end">
                                
                                
                                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                                <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                </div>
                                            </a>
                                        </li>

                                
                                

                                
                                
                                    </ul>

                            </div>
                    </div>
                </nav>
        </div>
    </div>


    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" onclick="tambahRestok(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Tambah Restok</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info filter" id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning filter" id="clearFilterBtn">Clear Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Restok</h5>
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
                                            <label for="kodebaranglabel">Kode Barang</label>
                                            <input type="text" class="form-control barang" placeholder="Kode Barang"  id="kode_barang">
                                        </div>
                                         <div class="form-group">
                                            <label for="namabaranglabel">Nama Barang</label>
                                            <input type="text" class="form-control barang" placeholder="Nama Barang" name="nama_barang" id="id_nama_barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenislabel">Jenis</label>
                                            <select class="form-control" name="jenis" id="id_jenis" style="background-color:  #f0f0f0">
                                                     <option value="all">All</option>
                                                         @foreach($Data['msg']['category'] as $index => $jenis)
                                                <option value="{{ $jenis['id'] }}">{{ $jenis['name'] }}</option>
                                                @endforeach
                                                
                                            </select>
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

                    <div class="radio-button-container">
                        <label>
                            <div class="color-box bg-light-yellow"></div>
                            <input type="radio" name="filter" value="requested" id="filter-status" {{ $Data['msg']['statusarray'][0] == 'requested' ? 'checked' : '' }}>
                            Requested
                            
                        </label>
                        <label>
                              <div class="color-box bg-light-blue"></div>
                            <input type="radio" name="filter" value="process" id="filter-status" {{ $Data['msg']['statusarray'][0] == 'process' ? 'checked' : '' }}>
                            Process
                          
                        </label>
                         <label>
                            <div class="color-box bg-light-green"></div>
                            <input type="radio" name="filter" value="complete" id="filter-status" {{ $Data['msg']['statusarray'][0] == 'complete' ? 'checked' : '' }}>
                            Completed
                            
                        </label>
                         <label>
                            <div class="color-box bg-light-red"></div>
                            <input type="radio" name="filter" value="reject" id="filter-status" {{ $Data['msg']['statusarray'][0] == 'reject' ? 'checked' : '' }}>
                            Reject
                            
                        </label>
                        <label>
                            <div class="color-box bg-light-grey"></div>
                            <input type="radio" name="filter" value="semua" id="filter-status" {{ $Data['msg']['statusarray'][0] == 'semua' ? 'checked' : '' }}>
                            All
                        </label>

                    </div>
                    
                    <div id="reload-icon">
                        <i class="fas fa-sync-alt"></i> Reloading...
                    </div>
                    <div class="table-responsive">

                        <table id="tabe-stok" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%; border: 1px solid #d7d7d7;">No</th>
                                    <th style="width: 10%; border: 1px solid #d7d7d7;">Tanggal</th>
                                    <th style="width: 10%; border: 1px solid #d7d7d7;">Kode</th>
                                    <th style="width: 30%; border: 1px solid #d7d7d7;">Nama Barang</th>
                                    <th style="width: 5%; border: 1px solid #d7d7d7;">Qty</th>
                                    
                                    <th style="width: 5%; border: 1px solid #d7d7d7;">Stok</th>
                                    <th style="width: 5%; border: 1px solid #d7d7d7;">Kubik</th>
                                    <th style="width: 5%; border: 1px solid #d7d7d7;">User</th>
                                    <th style="width: 20%; border: 1px solid #d7d7d7;">Keterangan</th>
                                    <th style="width: 5%; border: 1px solid #d7d7d7;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $num = 1; @endphp
                                @foreach($Data['msg']['restok'] as $index => $data)
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                        $formattedDate = \Carbon\Carbon::parse($data['tgl_request'])->translatedFormat('d M Y');
                                        $rowStyle = '';
                                        if ($data['status'] == 'requested') {
                                            $rowStyle = 'background-color: #fff17a;';
                                        } elseif ($data['status'] == 'process') {
                                            $rowStyle = 'background-color: #97ebfb;';
                                        } elseif ($data['status'] == 'complete') {
                                            $rowStyle = 'background-color: #6cf670;';
                                        } elseif ($data['status'] == 'reject') {
                                            $rowStyle = 'background-color: #feb3aa;';
                                        }
                                        $gambar = json_encode($data['image_url']);
                                        $kubik = $data['kubik'] == 0 ? 0 : $data['jml_permintaan'] * $data['kubik'];
                                    @endphp
                                    <tr style="{{ $rowStyle }}">
                                        <td style="border: 1px solid #d7d7d7; color: black;">{{ $num }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">{{ $formattedDate }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">
                                            <a href="javascript:void(0)" onclick="gambarRestok(this, '{{ $gambar }}')" data-id="{{ $data['id'] }}" name="gambarButton">{{ $data['new_kode'] }}</a>
                                        </td>
                                        <td style="border: 1px solid #d7d7d7; color: black;" id="data-nama-barang">{{ $data['nama_barang'] }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['jml_permintaan'] }}</td>
                                        <td id="td-table" style="border: 1px solid #d7d7d7; color: black;">
                                            <a href="javascript:void(0)" onclick="modalRestok(this)" data-new-code="{{ $data['new_kode'] }}" data-nama-barang="{{ $data['nama_barang'] }}">{{ $data['last_stok'] }}</a>
                                        </td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">{{ $kubik }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['name_teknisi'] }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['keterangan'] }}</td>
                                        <td style="border: 1px solid #d7d7d7;">
                                            @if($data['status'] == 'requested' || $data['status'] == 'reject')
                                                <a href="javascript:void(0)" onclick="updateRestok(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit">Edit</a>
                                            @else
                                                <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit">Edit</a>
                                            @endif
                                            <a href="javascript:void(0)" onclick="deleteRestok(this)" data-id="{{ $data['id'] }}" name="{{ $data['nama_barang'] }}" class="btn btn-large btn-info btn-danger" style="width: 75px; height: 38px; padding: 9px 10px;">Delete</a>
                                        </td>
                                    </tr>
                                    @php $num++; @endphp
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    
                    <!-- modal menampilkan gambar -->
                    <div class="col-sm-12">
                        <div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="gambarModallabel">Gambar</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <img id="gambarImage" src="" alt="Gambar" style="max-width: 100%;">
                                    </div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal tambah restok -->
                    <div class="col-sm-12" style="margin-top: 15px;">

                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahModalLabel">Tambah Restok</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" onclick="location.reload()"  aria-label="Close">    <span aria-hidden="true">&times;</span></button>
                                   

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                    <div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000;"></div>

                                      <form action="" class="form-horizontal" id="tambahForm" method="get">
                                            <div class="form-group">
                                                <label for="enableDatepicker">Centang untuk Aktifkan Tanggal:</label>
                                                <input type="checkbox" id="checkdatevaluetambah">
                                            </div>
                                            <div class="form-group">
                                                
                                                <input type="hidden" class="form-control" value="{{ $username['data']['teknisi']['id'] }}" id="id_teknisi" name="teknisi"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                            </div>

                                            <div class="form-group">
                                                <label for="startDatepicker">Tanggal Request:</label>
                                                <input type="text" placeholder="Pilih Tanggal Request" class="form-control" id="tgl_request" name="tgl_request_name" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" readonly>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="jumlahpermintaanlabel">Jumlah Permintaan</label>
                                                <input type="number" class="form-control" placeholder="Jumlah Permintaan" id="jml_permintaan" name="jml_permintaan_name"style="border: 1px solid #ced4da; width: 100%; padding-left:10px;">
                                            </div>
                                
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;">Produk</label>
                                                <select class="select select2 select-search form-control" id="product-restok-tambah-filter" name="id_product" style="border: 1px solid #ced4da; width: 100%; display: none;">
                                                    <option value="" style="text-align: center;" selected>Pilih Produk</option>
                                                    @foreach($Data['msg']['product'] as $index => $product)
                                                    <option value="{{ $product['id'] }}" style="text-align: center;" >{{ $product['new_kode'] }} - {{ $product['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div id="new-input-container-gambar"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="new-input-container"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="new-input-container2"></div>
                                                </div>
                                            </div>
                                              <div id="new-input-container-kosong"></div>
                                            
                                            <div class="form-group">
                                                <label for="kodebaranglabel">Keterangan</label>
                                                <textarea type="text" class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan_name" style="border: 1px solid #ced4da; width: 100%; padding-left:22px;"></textarea>
                                            </div>
                                            <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                              <button type="submit" id="selecttambahButton" class="btn btn-primary" style="margin-left: auto;">Simpan
                                              </button>
                                          </div>
                                      </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                       
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal menampilkan mutasi stok -->
                    <div class="col-sm-12">
                        <div class="modal fade" id="mutasistokModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mutasistokModallabelCode">Mutasi Stok </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                       
                                    </div>
                                    <div class="modal-body">
                                    
                                        <div class="row" id="rowFilterTahun">

                                        </div>
                                        <table id="product-details-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Action</th>
                                                    <th>In</th>
                                                    <th>Out</th>
                                                    <th>Saldo</th>
                                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data akan diisi oleh JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal edit restok -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        <div id="tabe-stok"></div>

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                       
                                    <h5 class="modal-title" id="mutasistokModallabel">Restok</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" onclick="location.reload()"  aria-label="Close">    <span aria-hidden="true">&times;</span></button>
                                   

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="Formedit">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                
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

<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   
   const today = new Date().toISOString().split('T')[0];

    // Mengaktifkan input dan menambahkan nilai tanggal hari ini
    const inputTanggal = document.getElementById('tgl_request');
    inputTanggal.disabled = false; // Mengaktifkan input
    inputTanggal.value = today;

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('product-restok-tambah-filter');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });

    });




  document.addEventListener('DOMContentLoaded', function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_jenis');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });

        // Enable/disable date inputs based on checkbox state
        
    });





</script>

<!-- untuk load datatable -->
<script>
    
        //button clear Filter 
    $('#clearFilterBtn').on('click', function() {


            window.location.href = '{{ route('admin.pembeliaan_restok') }}'; 
    })

    //untuk membuat datatable
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

            columns: [
                {
                    data: 'num',
                    title: 'No'
                },
                {
                    data: 'tgl_request',
                    title: 'Tanggal Request'
                },
              
                {
                    data: 'new_kode',
                    title: 'Kode'
                },
                {
                    data: 'name',
                    title: 'Nama Barang'
                },
                
                {
                    data: 'jml_permintaan',
                    title: 'Qty'
                },
                 {
                    data: 'last_stok',
                    title: 'Stok'
                },
                 {
                    data: 'kubik',
                    title: 'Kubik Value'
                },
                 {
                    data: 'name_teknisi',
                    title: 'User'
                },
                 {
                    data: 'keterangan',
                    title: 'Keterangan'
                },
                {
                    data: 'link',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        return '<a href="' + data + '</a>';
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
    
    $(document).ready(function() {


                $(document).on('change', '.select_kategori', function() {
                    var selectedKategori = $(this).val()
                    var dataId = $(this).data('id');
                    
                    $('#reload-icon').show();
                    $.ajax({
                        url: "{{ route('admin.pembelian_select_category_order_pembelian') }}",
                        type: 'GET',
                        data: {
                            id: dataId,
                            category: selectedKategori,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            $('#reload-icon').hide();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                    
                })

        
        // Event listener for dropdown change
        $('#product-restok-tambah-filter').change(function() {
     
            $('#overlay').show();

      
            // Get selected value
            var selectedProductId = $(this).val();
        
            // Check if the selected value is not the default option
            let isSubmitting = false; // Variabel untuk melacak status pengiriman

            if (selectedProductId !== "") {
                // AJAX request
                $.ajax({
                    url: '{{ route('admin.pembelian_restok_getstok_filter') }}',
                    type: 'GET',
                    data: { id_product: selectedProductId },
                    success: function(response) {
                        $('#overlay').hide();
                        // console.log('import')
                        if ($.isEmptyObject(response)) { // Jika response kosong
                            function appendImage() {
                                var img = $('<img>').attr('src', "https://maxipro.id/images/placeholder/basic.png").css('width', '70px').css('height', '70px');
                                $('#new-input-container-gambar').empty().append(img);
                            }
                            appendImage();

                            var emptyTable = $('<table>').addClass('table').css('border', '1px solid black');
                            var emptyRow = $('<tr>').append($('<td>').text('Stok Kosong'));
                            emptyTable.append(emptyRow);
                            $('#new-input-container').empty();
                            $('#new-input-container2').empty();
                            $('#new-input-container-kosong').html(emptyTable);

                        } else { // Jika response berisi data
                            var countstokPT = 0;
                            var countstokUD = 0;

                            function appendImage() {
                                var img = $('<img>').attr('src', response.msg.image).css('width', '270px').css('height', '270px');
                                $('#new-input-container-gambar').empty().append(img);
                            }

                            if (response.msg.countStokPT !== 0 || response.msg.countStokUD !== 0) {
                                appendImage();

                                if (response.msg.countStokPT !== 0) {
                                    var newTable = $('<table>').addClass('table').css('border', '1px solid black');
                                    var tableHeader = $('<thead>').append($('<tr>').append($('<th>').text('Database PT').attr('colspan', '2').css('border', '1px solid black')));
                                    var tableBody = $('<tbody>');
                                    
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
                                    rowtotalpt.append($('<td>').html('<b>' + countstokPT + '</b>').css('border', '1px solid black'));
                                    tableBody.append(rowtotalpt);

                                    newTable.append(tableHeader).append(tableBody);
                                    $('#new-input-container').html(newTable);
                                    $('#new-input-container-kosong').empty();
                                } else {
                                    $('#new-input-container').html('');
                                    $('#new-input-container-kosong').empty();
                                }

                                if (response.msg.countStokUD !== 0) {
                                    var newTable2 = $('<table>').addClass('table').css('border', '1px solid black');
                                    var tableHeader2 = $('<thead>').append($('<tr>').append($('<th>').text('Database UD').attr('colspan', '2').css('border', '1px solid')));
                                    var tableBody2 = $('<tbody>');

                                    var row2title = $('<tr>');
                                    row2title.append($('<td>').text('Gudang').css('border', '1px solid black'));
                                    row2title.append($('<td>').text('Qty').css('border', '1px solid black'));
                                    tableBody2.append(row2title);

                                    response.msg.stokproductUD.forEach(function(item) {
                                        var row = $('<tr>');
                                        row.append($('<td>').text(item.name_gudang).css('border', '1px solid black'));
                                        row.append($('<td>').text(item.stok_gudang).css('border', '1px solid black'));
                                        tableBody2.append(row);

                                        countstokUD += parseInt(item.stok_gudang, 10);
                                    });

                                    var rowtotalud = $('<tr>');
                                    rowtotalud.append($('<td>').html('<b>Total</b>').css('border', '1px solid black'));
                                    rowtotalud.append($('<td>').html('<b>' + countstokUD + '</b>').css('border', '1px solid black'));
                                    tableBody2.append(rowtotalud);

                                    newTable2.append(tableHeader2).append(tableBody2);
                                    $('#new-input-container2').html(newTable2);
                                    $('#new-input-container-kosong').empty();
                                } else {
                                    $('#new-input-container2').html('');
                                    $('#new-input-container-kosong').empty();
                                }
                            }

                            var countStokTotal = countstokPT + countstokUD;

                            $('#tambahForm').off('submit').on('submit', function(event) {
                                event.preventDefault();

                                if (!isSubmitting) {
                                    isSubmitting = true;

                                    var formData = {
                                        tgl_request: $('input[name=tgl_request_name]').val(),
                                        laststok: countStokTotal,
                                        jml_permintaan: $('input[name=jml_permintaan_name]').val(),
                                        keterangan: $('textarea[name=keterangan_name]').val(),
                                        product: $('#product-restok-tambah-filter').val(),
                                    };

                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ route('admin.pembelian_restok_tambah_filter') }}',
                                        data: formData,
                                        success: function(response) {
                                            
                                            if (response.success==true) {
                                                Swal.fire('Success', response.message, 'success').then(() => {
                                                    window.location.reload(); // Reload page or redirect
                                                });
                                            }else{
                                                Swal.fire('Error', response.msg, 'error');
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        },
                                        complete: function() {
                                            isSubmitting = false; // Reset status setelah pengiriman
                                        }
                                    });
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            else{
                $('#overlay').hide();
                return;
            }
        });
    });
    
    //filter untuk status
    $(document).ready(function(){
       
        var lastSelectedValue = $('input[type=radio][name=filter]:checked').val();
        
        // Function to handle AJAX request
        function sendFilterData(selectedValue) {
            $.ajax({
                url: '{{ route('admin.pembeliaan_restok_filter') }}', // Replace with your server endpoint
                method: 'GET',
                data: { 
                    filterValue: selectedValue 
                },
                success: function(response) {
                    // Handle success response
                    
            var newRoute = "{{ route('admin.pembeliaan_restok_filter') }}?filterValue="+lastSelectedValue;

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
    
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });


   
    // Menangani klik pada tombol tambah
    function tambahRestok(element) {
        event.preventDefault();

        $('#product-restok-tambah-filter').val('');
        // console.log($('#product-restok-tambah-filter').val());
        if ($('#product-restok-tambah-filter').val() === null) {
          $('#product-restok-tambah-filter').remove();

          }

        $('#tambahModal').modal('show'); // Tampilkan modal


    }

    //Membuka modal update
    function updateRestok(element) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);

        // Tampilkan elemen overlay dengan efek fade-in sebelum mengirim permintaan AJAX
        $('#overlay').fadeIn();

        var url = "{{ route('admin.pembelian_editviewrestok_filter') }}";

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
    
    // membuka modal gambar
 
     function gambarRestok(element, gambar) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);
        
        // Set the ID in the modal body
        $('#gambarModalBody').text('ID: ' + id);

        // Parse the gambar data
        var gambarJSON = JSON.parse(gambar);
        console.log(gambarJSON);

        // Set the image source in the modal
        $('#gambarImage').attr('src', gambarJSON);

        // Show the modal
        $('#gambarModal').modal('show');
    }
    function modalRestok(element){
        event.preventDefault();
        // console.log('masuk modal');

        //mengambil nama barang menggunakan class di datatabel
        var nama_barang = element.getAttribute('data-nama-barang');

        //mengambil new code menggunakan class di datatabel
        var new_code = element.getAttribute('data-new-code');
        
        //mengirim nama barang dan new code untuk mengambil response
        $.ajax({
            url: '{{ route('admin.pembelian_orderpembelian_stokproduct') }}',
            type: 'GET',
            data: { 
                new_code: new_code,
                name_product: nama_barang 
            },
            success: function(response) {
                // console.log('response', response);

                var detailPenjualan = response.msg.detailProduct;
                var detailPenerimaan = response.msg.penerimaandetail;
                var totalQty = response.msg.totalQty;
                var namaBulan = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];

                // Function to update the table body
                function updateTableBody(detailPenerimaan, detailPenjualan, response) {
                    var tableBody = $('#product-details-table tbody');
                    tableBody.empty();
                    var saldo_penerimaan = 0;

                    detailPenerimaan.forEach(function(penerimaan, index) {
                        var tgl_penerimaan = new Date(response.msg.tgl_penerimaan[index]);
                        var day = ('0' + tgl_penerimaan.getDate()).slice(-2);
                        var month = namaBulan[tgl_penerimaan.getMonth()];
                        var year = tgl_penerimaan.getFullYear();
                        saldo_penerimaan += penerimaan.qty;

                        var formattedPenerimaanDate = day + ' ' + month + ' ' + year;
                        var row_penerimaan = '<tr>' +
                            '<td>' + formattedPenerimaanDate + '</td>' +
                            '<td><strong>' + 'Pembelian ' + penerimaan.name + '</strong></td>' +
                            '<td>' + penerimaan.qty + '</td>' +
                            '<td></td>' +
                            '<td>' + saldo_penerimaan + '</td>' +
                            '</tr>';
                        tableBody.append(row_penerimaan);
                    });

                    detailPenjualan.forEach(function(product, index) {
                        var tgl = new Date(response.msg.tgl[index]);
                        var day = ('0' + tgl.getDate()).slice(-2);
                        var month = namaBulan[tgl.getMonth()];
                        var year = tgl.getFullYear();
                        saldo_penerimaan -= product.qty;

                        if(saldo_penerimaan > 0){

                            var formattedDate = day + ' ' + month + ' ' + year;
                            var row = '<tr>' +
                                '<td>' + formattedDate + '</td>' +
                                '<td><strong>' + 'Penjualan Ke Customer ' + product.mitrabisnis + '</strong></td>' +
                                '<td></td>' +
                                '<td>' + product.qty + '</td>' +
                                '<td>' + saldo_penerimaan + '</td>' +
                                '</tr>';
                        }
                        else{
                            var formattedDate = day + ' ' + month + ' ' + year;
                            var row = '<tr>' +
                                '<td>' + formattedDate + '</td>' +
                                '<td><strong>' + 'Penjualan Ke Customer ' + product.mitrabisnis + '</strong></td>' +
                                '<td></td>' +
                                '<td>' + product.qty + '</td>' +
                                '<td>' + product.qty + '</td>' +
                                '</tr>';
                        }
                        tableBody.append(row);
                    });
                }

                // Initial population of the table
                updateTableBody(detailPenerimaan, detailPenjualan, response);

                // Populate select options
                var divTahunFilter = $('#rowFilterTahun');
                var divCol = '<div class="col-md-3">' +
                    '<select id="bulanSelect" class="form-control">' +
                    '<option value="">Pilih Bulan</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<select id="tahunSelect" class="form-control">' +
                    '<option value="">Pilih Tahun</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<select id="bulanAkhirSelect" class="form-control">' +
                    '<option value="">Pilih Bulan</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<select id="tahunAkhirSelect" class="form-control">' +
                    '<option value="">Pilih Tahun</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<button type="button" class="btn btn-info" id="filterMutasi">Filter</button>' +
                    '</div>';
                divTahunFilter.html(divCol);

                var select = divTahunFilter.find('#tahunSelect');
                for (var year = response.msg.thn_transaksi; year <= response.msg.thn_transaksi_terakhir; year++) {
                    var selected = response.msg.thn_transaksi_terakhir ? ' selected' : '';
                    var option = '<option value="' + year + '"' + selected + '>' + year + '</option>';
                    select.append(option);
                }

                var select_bulan = divTahunFilter.find('#bulanSelect');
                for (var i = 0; i < namaBulan.length; i++) {
                    var bulan = namaBulan[i];
                    var selected = (i === 0) ? ' selected' : '';
                    var option = '<option value="' + (i + 1) + '"' + selected + '>' + bulan + '</option>';
                    select_bulan.append(option);
                }

                var select_akhir = divTahunFilter.find('#tahunAkhirSelect');
                for (var year = response.msg.thn_transaksi; year <= response.msg.thn_transaksi_terakhir; year++) {
                    var selected = response.msg.thn_transaksi_terakhir ? ' selected' : '';
                    var option = '<option value="' + year + '"' + selected + '>' + year + '</option>';
                    select_akhir.append(option);
                }

                var select_bulan_akhir = divTahunFilter.find('#bulanAkhirSelect');
                for (var i = 0; i < namaBulan.length; i++) {
                    var bulan = namaBulan[i];
                    var selected = (i === 11) ? ' selected' : '';
                    var option = '<option value="' + (i + 1) + '"' + selected + '>' + bulan + '</option>';
                    select_bulan_akhir.append(option);
                }

                $('#mutasistokModal').modal('show');
              
                $('#mutasistokModallabelCode').text('Mutasi Stok ' +'('+new_code+ ') '+nama_barang)
                $('#filterMutasi').on('click', function() {
                    var bulanSelect = $('#bulanSelect').val();
                    var tahunSelect = $('#tahunSelect').val();
                    var bulanAkhirSelect = $('#bulanAkhirSelect').val();
                    var tahunAkhirSelect = $('#tahunAkhirSelect').val();

                    var dataFilter = {
                        bulanSelect: bulanSelect,
                        tahunSelect: tahunSelect,
                        bulanAkhirSelect: bulanAkhirSelect,
                        tahunAkhirSelect: tahunAkhirSelect,
                        new_code: new_code,
                        name_product: nama_barang
                    };
                    console.log('data', dataFilter);

                    $.ajax({
                        url: '{{ route('admin.pembelian_orderpembelian_stokproduct_filter') }}',
                        method: 'GET',
                        data: dataFilter,
                        success: function(response) {
                            console.log('Data saved successfully:', response);
                            // Update the table body with the new data
                            updateTableBody(response.msg.penerimaandetail, response.msg.detailProduct, response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error saving data:', error);
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                console.log('Terjadi kesalahan:', error);
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

    function deleteRestok(element) {
        event.preventDefault();
        var id = $(element).data('id');
        var restokName = $(element).attr('name');

        // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin menghapus penawaran ini " + restokName + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('admin.pembelian_restok_hapus_filter') }}";

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id
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
            var id_nama_barang = document.getElementById('id_nama_barang').value;
              var filterValue = document.querySelector('input[name="filter"]:checked').value;

              // var filterValue = document.querySelector('input[name="filter-status"]:checked').value;

            var id_jenis = document.getElementById('id_jenis').value;
            var id_kode_barang = document.getElementById('kode_barang').value;
            // Membuat query string dari data yang akan dikirim
            // console.log(id_kode_barang)
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&id_kode_barang=' + encodeURIComponent(id_kode_barang)+'&id_nama_barang=' + encodeURIComponent(id_nama_barang)+'&id_jenis=' + encodeURIComponent(id_jenis)+'&filterValue=' + encodeURIComponent(filterValue);

            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.pembeliaan_restok_filter') }}" + '?' + queryString;

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

                     var reloadUrl = "{{ route('admin.pembeliaan_restok_filter') }}" + '?' + queryString;
                
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

@endsection