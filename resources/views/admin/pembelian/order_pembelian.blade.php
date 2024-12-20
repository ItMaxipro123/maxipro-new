@extends('admin.templates_baru')


@section('title')
Order Pembeliaan    | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />

@endsection
@section('style')
<link href="{{ asset('css/orderpembelian.css') }}" rel="stylesheet">
<style>
     .select2-container--default .select2-selection--single {
            width: 100% !important; /* Force full width */
            box-sizing: border-box;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 0;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
        }
</style>
@endsection

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider" style="max-width: 100%; overflow-x: hidden;">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <h4 id="judul"><i class="fas fa-database"></i> &nbsp Order Pembelian</h4>
                <small class="display-block subjudul">Order Pembelian {{ $username['data']['teknisi']['name'] }}</small>
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
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider content-class">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" onclick="hitungKubikasi(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Hitung Kubikasi</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info"  id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" id="clearFilterBtn">Clear Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Order Pembelian</h5>
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
                                            <input type="text" class="form-control" placeholder="Kode Barang"  id="kode_barang">
                                        </div>
                                         <div class="form-group">
                                            <label for="namabaranglabel">Nama Barang</label>
                                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" id="id_nama_barang">
                                        </div>
                                         <div class="form-group">
                                            <label for="jenislabel">Jenis</label>
                                            <select class="form-control" name="jenis" id="id_jenis">
                                                     <option value="all">All</option>
                                                         @foreach($Data['msg']['category'] as $index => $jenis)
                                                <option value="{{ $jenis['id'] }}">{{ $jenis['name'] }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>

                                    </form>
                                </div>

                                <div class="modal-footer">

                                    

                                    <!-- code diatas untuk modal bootstrap 5 -->

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="radio-button-container">
                        <label>
                            <div class="color-box bg-light-yellow"></div>
                            <input type="radio" name="filter" value="requested" id="filter-status" {{ $Data['msg']['requested_check'] == 'requested' ? 'checked' : '' }}>
                            Requested
                            
                        </label>
                        <label>
                              <div class="color-box bg-light-blue"></div>
                            <input type="radio" name="filter" value="process" id="filter-status" {{ $Data['msg']['requested_check'] == 'process' ? 'checked' : '' }}>
                            Process
                          
                        </label>
                         <label>
                            <div class="color-box bg-light-green"></div>
                            <input type="radio" name="filter" value="complete" id="filter-status" {{ $Data['msg']['requested_check'] == 'complete' ? 'checked' : '' }}>
                            Completed
                            
                        </label>
                         <label>
                            <div class="color-box bg-light-red"></div>
                            <input type="radio" name="filter" value="reject" id="filter-status" {{ $Data['msg']['requested_check'] == 'reject' ? 'checked' : '' }}>
                            Reject
                            
                        </label>
                        <label>
                            <div class="color-box bg-light-grey"></div>
                            <input type="radio" name="filter" value="all" id="filter-status" {{ $Data['msg']['requested_check'] == 'all' ? 'checked' : '' }}>
                            All
                        </label>

                    </div>

                    <div id="reload-icon">
                        <i class="fas fa-sync-alt"></i> Reloading...
                    </div>
                    <div class="table-responsive">

                    <table id="tabe-stok" class="tabel_order_pembelian" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 3%; border: 1px solid #d7d7d7;">#</th>
                                <th style="width: 10%; border: 1px solid #d7d7d7;">Tanggal</th>
                                <th style="width: 7%; border: 1px solid #d7d7d7;">Kode</th>
                                <th style="width: 15%; border: 1px solid #d7d7d7;">Nama Barang</th>
                                <th style="width: 5%; border: 1px solid #d7d7d7;">Qty</th>
                                <th style="width: 5%; border: 1px solid #d7d7d7;">Stok</th>
                                <th style="width: 7%; border: 1px solid #d7d7d7;">Kubik</th>
                                <th style="width: 5%; border: 1px solid #d7d7d7;">Teknisi</th>
                                <th style="width: 12%; border: 1px solid #d7d7d7;">Keterangan</th>
                                <th style="width: 10%; border: 1px solid #d7d7d7;">Supplier</th>
                                <th style="width: 10%; border: 1px solid #d7d7d7;">Kategori</th>
                                <th style="width: 15%; border: 1px solid #d7d7d7;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num = 1; @endphp
                            @foreach($Data['msg']['fullorderpembelian'] as $index => $data)
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
                                    $gambar = json_encode($data['image']);
                                    $kubik = $data['kubik'] == 0 ? 0 : $data['jml_permintaan'] * $data['kubik'];
                                @endphp
                                <tr style="{{ $rowStyle }}">
                                    <td style="border: 1px solid #d7d7d7; color: black;">{{ $num }}</td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">{{ $formattedDate }}</td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">
                                        <a href="javascript:void(0)" onclick="gambarOrderPembelian(this, '{{ $gambar }}')" data-id="{{ $data['id'] }}" name="gambarButton">{{ $data['new_kode'] }}</a>
                                    </td>
                                    <td style="border: 1px solid #d7d7d7; color: black;" id="data-nama-barang">{{ $data['nama_barang'] }}</td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['jml_permintaan'] }}</td>
                                    <td id="td-table" style="border: 1px solid #d7d7d7; color: black;">
                                        <a href="javascript:void(0)" onclick="modalOrderPembelian(this)" data-new-code="{{ $data['new_kode'] }}" data-nama-barang="{{ $data['nama_barang'] }}">{{ $data['last_stok'] }}</a>
                                    </td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">{{ $kubik }}</td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['name_teknisi'] }}</td>
                                    <td class="td4-table" style="border: 1px solid #d7d7d7; color: black;">{{ $data['keterangan'] }}</td>
                                    <td style="border: 1px solid #d7d7d7;">
                                        <select name="supplier_name_select" id="edit_supplier_{{ $index }}" data-id="{{ $data['id'] }}" class="select_supplier form-control" style="background-color: white">
                                            <option value="0">-</option>
                                            @foreach($Data['msg']['supplier'] as $index2 => $supplier)
                                                <option value="{{ $supplier['id'] }}" {{ $data['supplier_id'] == $supplier['id'] ? 'selected' : '' }}>{{ $supplier['name'] }} - {{ $supplier['company'] }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="border: 1px solid #d7d7d7;">
                                        <select name="category_name_select" id="edit_kategori_{{ $index }}" data-id="{{ $data['id'] }}" class="select_kategori form-control" style="background-color: white">
                                            <option value="0">Pilih Kategori</option>
                                            <option value="import" {{ $data['category'] == 'import' ? 'selected' : '' }}>Import</option>
                                            <option value="lainnya" {{ $data['category'] == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            <option value="local" {{ $data['category'] == 'local' ? 'selected' : '' }}>Local</option>
                                            <option value="produksi_sendiri" {{ $data['category'] == 'produksi_sendiri' ? 'selected' : '' }}>Produksi Sendiri</option>
                                        </select>    
                                    </td>
                                    <td style="border: 1px solid #d7d7d7;">
                                        @if($data['status'] == 'requested' || $data['status'] == 'reject')
                                            <a href="javascript:void(0)" onclick="updateRestok(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" id="id-edit-button" title="Edit"><i class="fas fa-edit"></i></a>
                                        @else
                                            <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" id="id-edit-button" title="Edit"><i class="fas fa-edit"></i></a>
                                        @endif
                                        <a href="javascript:void(0)" onclick="rejectOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['nama_barang'] }}" class="btn btn-large btn-info btn-danger" id="id-reject-button" title="Reject Order"><i class="fas fa-times"></i></a>
                                        <a href="javascript:void(0)" onclick="deleteOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['nama_barang'] }}" class="btn btn-large btn-info btn-danger" id="id-delete-button" title="Delete"><i class="fas fa-trash-alt"></i></a>
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

                  
                    
                    <!-- modal Hitung Kubikasi -->
                    <div class="col-sm-12" id="div-kubikasi">

                        <div class="modal fade" id="hitungkubikasiModal" tabindex="-1" role="dialog" aria-labelledby="hitungkubikasiModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                        <div class="row" style="width:100%;">
                                            <div class="col-md-4">

                                                <h5 class="modal-title" id="exampleModalLabel">Hitung Kubikasi</h5>
                                            </div>
                                            <div class="col-md-4">

                                                <h5>Total Volume/Kubik : <span id="total-kubik">0</span></h5>
                                            </div>
                                            <div class="col-md-4" style="text-align:right;">

                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">

                                      <form action="" class="form-horizontal" id="hitungkubikasiForm" method="get">
                                            <div class="table-responsive">

                                                <table id="tabe-stok-hitung-kubik2" style="width:100%;">
                                                    <thead>
                                                        <div class="row mb-2">
                                                            <div class="col-md-3">
    
                                                                <label>
                                                                <input type="checkbox" id="filterCheckedToggle" style="accent-color: red;"> Filter Barang <span style="color: red;">*</span>
    
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6" id="id-search">
                                                                <label>
                                                                    Search:
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" id="search-box" class="form-control d-inline-block w-round" placeholder="Cari...">
                                                            </div>
                                                        </div>
                                                            <tr>
                                                                <th scope="col" style="width:1%;">#</th>
                                                                <th scope="col" style="width:5%;">Image</th>
                                                                <th scope="col" style="width:5%;">Nama Barang</th>
                                                                <th scope="col" style="width:5%;">Qty</th>
                                                                <th scope="col" style="width:5%;">Sisa Stok</th>
                                                                <th scope="col" style="width:5%;">Kubik</th>
                                                                <th scope="col" style="width:5%;">Tanggal Request</th>
                                                                <th scope="col" style="width:5%;">User</th>
                                                                <th scope="col" style="width:5%;">Supplier</th>
                                                            
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                  
                                                        @php
                                                        $num = 1;
                                                        @endphp
                                                        <!-- Table data will be populated here -->
                                                        @foreach($Data['msg']['fullorderpembelian'] as $index => $data)
                                                        @php
                                                        \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                                        $formattedDate = \Carbon\Carbon::parse($data['tgl_request'])->translatedFormat('d M Y');
                                                        $rowStyle = '';
                                                        if ($data['status'] == 'requested') {
                                                                        $rowStyle = 'background-color: #fff17a;';
                                                                    } elseif ($data['status'] == 'process') {
                                                                    $rowStyle = 'background-color: #97ebfb;';
                                                                }
                                                                elseif ($data['status'] == 'complete') {
                                                                $rowStyle = 'background-color: #6cf670;';
                                                            }
                                                            elseif ($data['status'] == 'reject') {
                                                            $rowStyle = 'background-color: #feb3aa;';
                                                        }
                                                        $gambar2 = json_encode($data['image']);                                  
                                                        @endphp
                                                        <tr style="{{ $rowStyle }}">
                                                            <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">
                                                                
                                                                <input type="checkbox" class="kubik-checkbox" name="checkbox_{{ $num }}" value="{{ $kubik }}" data-new_kode="{{ $data['new_kode'] }}" data-jml_permintaan="{{ $data['jml_permintaan'] }}" data-nama_barang_english="{{ $data['nama_barang_english'] }}" data-nama_barang_china="{{ $data['nama_barang_china'] }}" data-nama_barang="{{ $data['nama_barang'] }}" data-image="{{ $data['image'] }}" data-nama_supplier="{{ $data['name_supplier'] }}"
                                                                onchange="calculateTotalKubik()">
                                                            </td>
                                                            <td id="td-table"><a href="javascript:void(0)" onclick="gambaFromrOrderPembelian(this, '{{ $gambar2 }}')" data-id="{{ $data['id'] }}" name="gambarButton">{{ $data['new_kode'] }}</a></td>
                                                            <td class="nama_barang" id="td-table">{{ $data['nama_barang'] }}</td>
                                                            <td id="td-table">{{ $data['jml_permintaan'] }}</td>
                                                            <td id="td-table">{{ $data['last_stok'] }}</td>
                                                            @php
                                                            $kubik = $data['kubik'] == 0 ? 0 : $data['jml_permintaan'] * $data['kubik'];
                                                            @endphp
                                                            <td class="kubik-value" id="td-table">{{ $kubik }}</td>
                                                            <td id="td-table">{{ $formattedDate }}</td>
                                                            <td id="td-table">{{ $data['name_teknisi'] }}</td>
                                                            <td id="td-table">{{ $data['name_supplier'] }}</td>
                                                        </tr>
    
    
    
    
                                                        @php
                                                        $num++;
                                                        @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="form-group" id="div-select">
                                            
                                              <button type="button" id="downloadpdfButton" class="btn btn-primary" >Download PDF
                                              </button>
                                          </div>
                                      </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                   
                                      
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
                                        <h5 class="modal-title" id="mutasistokModallabelCode">Mutasi Stok</h5>
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


                    <div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="secondModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="secondModalLabel">Gambar</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <img id="gambarImageSecondModal" src="" alt="Gambar" style="max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal edit order pembelian -->
                    <div class="col-sm-12" id="div-edit-restok">
                        <div id="overlay" class="overlay-class"></div>
                        <!-- <div id="tabe-stok"></div> -->

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Order Pembelian</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" onclick="window.location.reload()"aria-label="Close" > <span aria-hidden="true">&times;</span></button>
                                   

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="Formedit">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                    
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- untuk load datatable -->
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Choices.js on the select element
            const element = document.getElementById('id_jenis');
            const choices = new Choices(element, {
                searchEnabled: true,
                itemSelectText: '',
            });
            
        });

        //button clear Filter 
        $('#clearFilterBtn').on('click', function() {


                window.location.href = '{{ route('admin.pembeliaan_orderpembelian') }}'; 
        })
  
        //untuk membuat datatable halaman datatable
        $(document).ready(function() {
                // Initialize DataTable
                var table = $('#tabe-stok').DataTable({
            "dom": '<"top"lf>rt<"bottom"ip><"clear">', // Positioning of filter/search elements
            "language": {
                "searchPlaceholder": "Cari...",
                "search": "Cari:",
                "paginate": {
                    "previous": "back", // Custom text for "previous" button
                    "next": "next" // Custom text for "next" button
                }
            },
            columns: [
                { data: 'num', title: 'No' },
                { data: 'tgl_request', title: 'Tanggal Request' },
                { data: 'new_kode', title: 'Kode' },
                { data: 'name', title: 'Nama Barang' },
                { data: 'jml_permintaan', title: 'Jml Permintaan' },
                { data: 'last_stok', title: 'Stok' },
                { data: 'kubik', title: 'Kubik Value' },
                { data: 'name_teknisi', title: 'User' },
                { data: 'keterangan', title: 'Keterangan' },
                { data: 'supplier', title: 'Supplier' },
                { data: 'category', title: 'Kategori' },
                {
                    data: 'link',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        return '<a href="' + data + '</a>';
                    }
                }
            ],
            "initComplete": function(settings, json) {
                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...');
                initializeSelect2(); // Initialize Select2 for supplier
                initializeSelect1(); // Initialize Select2 for category
            }
        });

        function initializeSelect1() {
            // $('.select_kategori').select2({
            //     placeholder: '-',
            //     allowClear: true,
            //     width: 'resolve' // Adjust width as needed
            // });
        }

        // Function to initialize Select2 for supplier
        function initializeSelect2() {
            $('.select_supplier').select2({
                placeholder: '-',
                allowClear: true,
                width: 'resolve' // Adjust width as needed
            });
        }

        // Re-initialize Select2 after every DataTable draw event (e.g., page change)
        table.on('draw', function() {
            initializeSelect2(); // Reinitialize supplier Select2
            initializeSelect1(); // Reinitialize category Select2
        });

        // Handle changes with Select2
        $(document).on('change', '.select_supplier', function() {
            var selectedValue = $(this).val();
            var dataId = $(this).data('id');
            
            $('#reload-icon').show();

            // Send data using AJAX
            $.ajax({
                url: "{{ route('admin.pembelian_select_supplier_order_pembelian') }}",
                type: 'GET',
                data: {
                    id: dataId,
                    supplier: selectedValue,
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
        });
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
        
        var currentPage = table.page.info().page; // inisiasi dengan page 1
        var previousPage = currentPage;  //inisiasi halaman sekarang dan sebelumnya sama

        // Reload the page when the "previous" button or an earlier page index is clicked
        // $(document).on('click', '.paginate_button', function() {
        //     previousPage = currentPage;

        //     // Get the new current page
        //     currentPage = table.page.info().page;

        //     console.log('previous', previousPage);
        //     console.log('current', currentPage);

        //     // Get the target page from button text
        //     var targetPage = $(this).text().trim();
        //     console.log('target', targetPage);

        //     // Check if the "previous" button was clicked or if we're on the first page
        //     if ($(this).hasClass('previous') || currentPage == 0 || previousPage==targetPage) {
        //        console.log('masuk')
        //         // location.reload(); // Reload the page
        //     }
            
    
        // });

        //proses reload bila klik previous button dan halaman sebelumnya
        table.on('page.dt', function() {
            var info = table.page.info();
            var currentPage = info.page; // Get current page
            var previousPage = info.page - 1; // Previous page is current page - 1

            console.log('Previous Page:', previousPage);
            console.log('Current Page:', currentPage);

            
            //bila user click button previous sama dengan page sekaran dan page sekarang = 0
            if (currentPage === 0 || previousPage === currentPage) {
                location.reload()
            }
        });

        
    });


    // //untuk membuat datatable untuk  hitung kubikasi
    // $(document).ready(function() {
    //     $('#tabe-stok-hitung-kubik').DataTable({

    //         "dom": '<"top"lf>rt<"bottom"ip><"clear">', // Mengatur posisi elemen filter/search
    //         "language": { // Menyesuaikan teks placeholder
    //             "searchPlaceholder": "Cari...",
    //             "search": "Cari:",
    //             "paginate": {
    //                 "previous": "back", // Ganti teks untuk tombol "previous"
    //                 "next": "next" // Ganti teks untuk tombol "next"
    //             }
    //         },

    //         columns: [
    //             {
    //                 data: 'check_box',
    //                 title: '<>'
    //             },
    //             {
    //                 data: 'new_kode',
    //                 title: 'Kode'
    //             },
    //             {
    //                 data: 'name',
    //                 title: 'Nama Barang'
    //             },
                
    //             {
    //                 data: 'jml_permintaan',
    //                 title: 'Jml Permintaan'
    //             },
    //              {
    //                 data: 'last_stok',
    //                 title: 'Stok'
    //             },
    //              {
    //                 data: 'kubik',
    //                 title: 'Kubik'
    //             },
    //               {
    //                 data: 'request_date',
    //                 title: 'Request Date'
    //             },
    //              {
    //                 data: 'name_teknisi',
    //                 title: 'User'
    //             },
    //              {
    //                 data: 'name_supplier',
    //                 title: 'Supplier'
    //             },
                 
               

    //         ],
    //         "initComplete": function(settings, json) {

    //             $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...'); // Menyesuaikan placeholder
    //         }
    //     });
    // });

    //untuk membuat datatable untuk modal hitung kubikasi
    $(document).ready(function() {

            
        // Initialize DataTable
        var table2 = $('#tabe-stok-hitung-kubik2').DataTable({
            dom: 'lrtip', // Customize the DataTable DOM
            responsive: true, // Enable responsive mode
            
        });
        
        $('#search-box').on('keyup', function() {
            table2.search(this.value).draw();
        });
        $('#downloadpdfButton').click(function() {
            if (!$('#filterCheckedToggle').is(':checked')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pilih barang, lalu centang filter',
                    confirmButtonText: 'OK'
                });
                return false; // Prevent any default action or further code execution
            }
        });
            $('#filterCheckedToggle').on('change', function() {
                
                if (this.checked) {
                    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                        return $(table2.row(dataIndex).node()).find('.kubik-checkbox').is(':checked');
                    });
                    
                } else {
                    $.fn.dataTable.ext.search.pop();
                }
                table2.draw();
                $('#downloadpdfButton').click(function() {
                    // Collect checked items
                    
                    var selectedItems = [];
                    var selectedItemsEnglish = [];
                    var selectedItemsChina = [];
                    var new_kode = [];
                    var jml_permintaan = [];
                    var image =[];
                    var nama_supplier=[];
                    $('.kubik-checkbox:checked').each(function() {
                        selectedItemsEnglish.push($(this).data('nama_barang_english'));
                        selectedItemsChina.push($(this).data('nama_barang_china'));
                        selectedItems.push($(this).data('nama_barang'));
                        new_kode.push($(this).data('new_kode'));
                        jml_permintaan.push($(this).data('jml_permintaan'));
                        image.push($(this).data('image'));
                        nama_supplier.push($(this).data('nama_supplier'));
                    });
                    
                    // Perform an action with selectedItems, e.g., send them via AJAX
                    if (selectedItems.length > 0) {
                        
                        function submitForm() {
                            // Create a form element
                            var form = document.createElement('form');
                            form.method = 'GET'; // Use 'POST' if needed
                            form.action = "{{ route('admin.pembelian_print_pdfpo_order_pembelian') }}"; // Replace with your actual route

                            // Create input fields for each piece of data
                            var data = {
                                nama_barang_english: selectedItemsEnglish,
                                nama_barang_china: selectedItemsChina,
                                nama_barang: selectedItems,
                                new_kode: new_kode,
                                jml_permintaan: jml_permintaan,
                                image: image,
                                nama_supplier:nama_supplier
                            };
                            console.log('data',data)
                            if (data.nama_supplier && data.nama_supplier.every(supplier => supplier === data.nama_supplier[0])) {
                                for (var key in data) {
                                    if (data.hasOwnProperty(key)) {
                                        var input = document.createElement('input');
                                        input.type = 'hidden';
                                        input.name = key;
                                        input.value = data[key];
                                        form.appendChild(input);
                                    }
                                }

                                // Append the form to the body and submit
                                document.body.appendChild(form);
                                form.submit();
                            }
                            else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Warning...',
                                    text: 'Maaf, nama supplier yang dipilih berbeda',
                                    confirmButtonText: 'OK'
                                });
                                return false;
                            }
                        }

                        // Call the function to submit the form
                        submitForm();
                    } else {
                        alert('Please select at least one item.');
                    }
                });
            });

    
    });
    
</script>


<script>
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
                url: '{{ route('admin.pembeliaan_orderpembelian_filter') }}', // Replace with your server endpoint
                method: 'GET',
                data: { 
                    filterValue: selectedValue 
                },
                success: function(response) {
                    // Handle success response
                    // console.log(response);
            var newRoute = "{{ route('admin.pembeliaan_orderpembelian_filter') }}?filterValue="+lastSelectedValue;

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

    //Untuk Mereset data input checkbox dan total kubik di modal hitung kubk
    document.getElementById('hitungkubikasiModal').addEventListener('hidden.bs.modal', function () {
        var checkboxes = document.querySelectorAll('.kubik-checkbox'); //Inisiasi variabel yang mengambil value select dari class kubik-checkbox
        checkboxes.forEach(function(checkbox) { //Untuk mengambil input checkbox sesuai urutan berdasarkan array
            checkbox.checked = false; //Untuk menonaktifkan input checkbox
        });
        document.getElementById('total-kubik').textContent = 0; //menset nilai total-kubik menjadi 0
    });

    //Membuka modal update
    function updateRestok(element) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);

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

    function deleteOrderPembelian(element) {
    event.preventDefault();
    var id = $(element).data('id');
    var restokName = $(element).attr('name');

    // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin menghapus order pembelian ini " + restokName + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.pembelian_hapus_order_pembelian') }}";
            $('#reload-icon').show();
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

    function rejectOrderPembelian(element) {
        event.preventDefault();
        var id = $(element).data('id');
        var restokName = $(element).attr('name');

        // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin mereject Order Pembelian ini " + restokName + " ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Reject!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('admin.pembelian_reject_order_pembelian') }}";

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
                            text: 'Data berhasil direject!',
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

  
</script>

<!-- digunakan untuk pick date filter -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<!-- untuk mengaktifkan input tanggal di modal filter -->
<script src="../assets/js/order-pembelian/order-pembelian.js"></script> 



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
            var url = "{{ route('admin.pembeliaan_orderpembelian_filter') }}" + '?' + queryString;

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

                     var reloadUrl = "{{ route('admin.pembeliaan_orderpembelian_filter') }}" + '?' + queryString;
                
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>
<script>
    
     // membuka modal gambar
    function gambarOrderPembelian(element, gambar) {
        event.preventDefault();
        var id = $(element).data('id');
        console.log(id);
        
        // Set the ID in the modal body
        $('#gambarModalBody').text('ID: ' + id);

        // Parse the gambar data
        console.log('gambarJSON',gambar);
        var gambarJSON = JSON.parse(gambar);

        // Set the image source in the modal
        $('#gambarImage').attr('src', gambarJSON);

        // Show the modal
        $('#gambarModal').modal('show');
    }

    function gambaFromrOrderPembelian(element, gambar){
                console.log('masuk modal 2');

                // Extract the ID from the element
                var id = $(element).data('id');
                console.log(id);

                // Set the ID in the modal body
                $('#gambarModalBody').text('ID: ' + id);

                // Parse the gambar data
                console.log('gambarJSON', gambar);
                var gambarJSON = JSON.parse(gambar);

                // Handle modal z-index and backdrop layering
                $('#secondModal').on('show.bs.modal', function () {
                    var zIndex = 1040 + (10 * $('.modal:visible').length);
                    $(this).css('z-index', zIndex);
                    setTimeout(function() {
                        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                    }, 0);
                });

                $('#secondModal').on('hidden.bs.modal', function () {
                    if ($('.modal:visible').length) {
                        $(document.body).addClass('modal-open');
                    }
                });
                $('#gambarImageSecondModal').attr('src', gambarJSON);
                // Show the modal
                $('#secondModal').modal('show');
    }

  
    function modalOrderPembelian(element){
        event.preventDefault();

        var nama_barang = element.getAttribute('data-nama-barang');
        var new_code = element.getAttribute('data-new-code');
        
        $.ajax({
            url: '{{ route('admin.pembelian_orderpembelian_stokproduct') }}',
            type: 'GET',
            data: { 
                new_code: new_code,
                name_product: nama_barang 
            },
            success: function(response) {
                console.log('response', response);

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



</script>
@endsection