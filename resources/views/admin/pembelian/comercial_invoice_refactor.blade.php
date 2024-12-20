@extends('admin.templates_baru')


@section('title')
Commercial Invoice    | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link href="{{ asset('css/comercialinvoice.css') }}" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
@endsection
@section('style')


@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider" style="max-width: 100%; overflow-x: hidden;">
    <div class="row">
        
        <div class="col-md-6">
            <div class="container-fluid">
                <h4 id="judulRestok" style="display:none;"><i class="fas fa-database"></i> &nbsp Commercial Invoice</h4>
                
                <small class="display-block" id="subjudul">Commercial Invoice {{ $username['data']['teknisi']['name'] }}</small>
              
            </div>
        </div>
        <div class="col-md-6" style="margin-top:20px;">
                 <!-- navbar untuk membuka sidebar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true" style="display:none;">
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
                                <div class="row btn-back" style="display:none;">

                                    <div class="btn-group" style="float: right; margin-right:30px;">
                                                    <!-- <button type="button" class="btn btn-warning filter" id="backbtn" onclick="window.location.href = 'data_comercialinvoice';">Kembali</button> -->
                                                <div class="col-md-12 d-flex justify-content-end">
                                                    <button type="button" id="backbtn" class="btn btn-large btn-warning" onclick="window.location.href = 'data_comercialinvoice';">Kembali</button>
                                                    <!-- <button type="button" class="btn btn-large btn-warning"  id="backBtn">Kembali</button> -->
                                                </div>
                                    </div>
                                </div>
                        <div class="row">
                            <div class="col-md-12" id="div_tambahComercialQuestion" style="display:none;">
                                <a href="javascript:void(0)" id="tambahComercialQuestion" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add Commercial Invoice</a>
                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info filter" id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning filter" id="clearFilterBtn">Clear Filter</button>

                                    </div>
                                </div>
                                    
                            </div>
                            <div class="col-md-12">

                                <ul id="tab-nav" class="nav nav-tabs fade show" style="display: none;">
                                    <li class="nav-item"><a class="nav-link active" href="#" id="master-tab">Master</a></li>
                                    
                                    <!-- <li class="nav-item"><a class="nav-link" href="#" id="ekspedisi-tab">Ekspedisi</a></li> -->
                                </ul>

                            </div>
                        </div>




                    </div>

                  



                    <!-- Modal Filter-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Comercial Invoice</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form id="dateForm">
                                        <div class="form-group">
                                            <label for="checkdatevalue">Centang untuk Aktifkan Tanggal:</label>
                                            <input type="checkbox" id="checkdatevalue">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_awal">Pilih Periode Awal:</label>
                                            <input type="text" value="{{ $Data['msg']['tgl_awal'] }}" class="form-control" id="tgl_awal" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_akhir">Pilih Periode Akhir:</label>
                                            <input type="text" value="{{ $Data['msg']['tgl_akhir'] }}" class="form-control" id="tgl_akhir" disabled>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="id_nama_perusahaan">Nama Perusahaan</label>
                                       
                                            <input type="text" class="form-control barang" placeholder="Nama Perusahaan" name="nama_barang" id="id_nama_perusahaan">
                                        </div>
                                        

                                    </form>
                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="radio-button-container" style="display:none;">
                        <label>
                            <div class="color-box " id="color-list-order"></div>
                            <input type="radio" name="filter" value="order_pembelian" id="filter-status" {{ $Data['msg']['requested_check'] == 'order_pembelian' ? 'checked' : '' }}>
                             Order Pembelian
                            
                        </label>
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
                            <div class="color-box bg-light-grey"></div>
                            <input type="radio" name="filter" value="all" id="filter-status" {{ $Data['msg']['requested_check'] == 'all' ? 'checked' : '' }}>
                            All
                        </label>

                       
                    </div>
                    
                        <div id="reload-icon">
                            <i class="fas fa-sync-alt"></i> Reloading...
                        </div>
                        <div class="table-responsive">

                            <table id="tabe-stok" style="display:none;">
                                <thead>
                                
                                </thead>
                                <tbody>
                                    @php
                                    $num =1;
                                    $maxLengthSupplier = $Data['msg']['row_counts_supplier'];
                                    $maxLengthPenjualan = $Data['msg']['total_rows_penjualan'];
                                    $sumTot = $maxLengthSupplier + $maxLengthPenjualan;
                                    $listSupplier = $Data['msg']['grouped_by_supplier'];
                                    $penjualanData = $Data['msg']['penjualan'];
                                    @endphp
                                @if($Data['msg']['requested_check'] == 'requested')    
                                    
                                    @for ($i = 0; $i < $maxLengthPenjualan; $i++)
                                        @if (isset($penjualanData[$i]))
                                            @php
                                            $data = $penjualanData[$i];
                                            \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                            $formattedDate = \Carbon\Carbon::parse($data['date'])->translatedFormat('d M Y');
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
                                            @endphp
                                            
                                            <tr style="{{ $rowStyle }}">
                                                <td id="td-1">{{ $num }}</td>
                                                <td id="td-2">{{ $formattedDate }}</td>
                                                <td id="td-2">INV-{{ $data['invoice_no'] }}</td>
                                                <td id="td-2">{{ $data['supplier']['name'] }}</td>
                                                <td id="td-2">{{ $data['supplier']['company'] }}</td>
                                                @php
                                                $total = 0;
                                                $total_usd = 0;
                                                foreach ($data['detail'] as $index_detail => $result) {
                                                    $total += $result['total_price_without_tax'];
                                                    $total_usd += $result['total_price_usd'];
                                                }
                                                @endphp
                                                <td id="td-1">{{ $data['supplier']['telp'] }}</td>
                                                <td id="td-1">{{ $data['matauang']['simbol'] }} {{ $data['matauang']['kode'] == 'USD' ? ($total_usd + $data['freight_cost'] + $data['insurance']) : ($total + $data['freight_cost'] + $data['insurance']) }}</td>
                                                
                                                
                                                <td id="td-3">   
                                                    <div class="custom-select-wrapper">
                                                        <select id="select_category_{{ $i }}" class="form-control select_select_category" data-id_commercial="{{ $data['id'] }}">
                                                            <option value="0">Pilih Kategori</option>
                                                            <option value="fcl" {{ $data['category_comercial_invoice'] == 'fcl' ? 'selected' : '' }}>FCL</option>
                                                            <option value="lcl" {{ $data['category_comercial_invoice'] == 'lcl' ? 'selected' : '' }}>LCL</option>
                                                            <option value="local" {{ $data['category_comercial_invoice'] == 'local' ? 'selected' : '' }}>LOCAL</option>
                                                        </select>
                                                        <i class="fas fa-chevron-down dropdown-icon"></i> <!-- Ikon panah dari Font Awesome -->
                                                    </div>
                                                </td>
                                            
                                                <td id="td-2">
                                                    @if ($data['status'] == 'requested')
                                                        <a href="javascript:void(0)" onclick="detailComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-light" style="width: 35px; height: 38px; padding: 9px 10px;" title="Detail Commercial Invoice"><i class="fas fa-eye"></i></a>
                                                        <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    
                                                        <a href="javascript:void(0)" onclick="deleteComercialInvoice(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            
                                            </tr>
                                            @php
                                            $num++;
                                            @endphp
                                        @endif
                                    @endfor
                                @elseif($Data['msg']['requested_check'] =='order_pembelian')
                                    @for ($i = 0; $i < $maxLengthSupplier; $i++)
                                        @php
                                            // Ambil nama supplier berdasarkan indeks
                                            $supplierName = array_keys($listSupplier)[$i] ?? null;
                                            $details = $supplierName ? $listSupplier[$supplierName] : [];
                                        @endphp

                                        @if ($supplierName)
                                            <tr id="color-list-order">
                                                <td>{{ $num }}</td>
                                                <td id="td-2"></td>
                                                <td id="td-2"></td>
                                                <td id="td-2">{{ $supplierName }}</td>
                                                <td id="td-2"></td>
                                                <td id="td-2">{{ $details[0]['supplier_telp'] }}</td>
                                                <td id="td-2"></td>
                                                <td id="td-2"></td>
                                                
                                                <td>
                                                    <a href="{{ route('admin.pembelian_add_comercial_invoice_supplier', ['name' => $supplierName]) }}" class="btn btn-info" style="width: 35px; height: 38px; padding: 9px 10px;" title="Add Comercial">+</a>
                                                </td>
                                            </tr>
                                            @php
                                                $num++;
                                            @endphp
                                        @endif
                                    @endfor
                                @else
                                    @for ($i = 0; $i < $maxLengthPenjualan; $i++)
                                        @if (isset($penjualanData[$i]))
                                                @php
                                                $data = $penjualanData[$i];
                                                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                                $formattedDate = \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y');
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
                                                @endphp
                                                
                                                <tr style="{{ $rowStyle }}">
                                                    <td id="td-1">{{ $num }}</td>
                                                    <td id="td-2">{{ $formattedDate }}</td>
                                                    <td id="td-2">INV-{{ $data['invoice_no'] }}</td>
                                                    <td id="td-2">{{ $data['supplier']['name'] }}</td>
                                                    <td id="td-2">{{ $data['supplier']['company'] }}</td>
                                                    @php
                                                    $total = 0;
                                                    $total_usd = 0;
                                                    foreach ($data['detail'] as $index_detail => $result) {
                                                        $total += $result['total_price_without_tax'];
                                                        $total_usd += $result['total_price_usd'];
                                                    }
                                                    @endphp
                                                    <td id="td-1">{{ $data['supplier']['telp'] }}</td>
                                                    <td id="td-1">{{ $data['matauang']['simbol'] }} {{ $data['matauang']['kode'] == 'USD' ? ($total_usd + $data['freight_cost'] + $data['insurance']) : ($total + $data['freight_cost'] + $data['insurance']) }}</td>
                                                    
                                                @if(!$data['fcl'])
                                                <td id="td-3">LCL</td>
                                                @else
                                                <td id="td-3">FCL</td>
                                                @endif
                                                    
                                                    <td id="td-2">
                                                        <a href="javascript:void(0)" onclick="detailComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-light" style="width: 35px; height: 38px; padding: 9px 10px;" title="Detail Commercial Invoice"><i class="fas fa-eye"></i></a>
                                                        @if ($data['status'] == 'requested')
                                                        <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                        @else
                                                        <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                        @endif
                                                        
                                                        <a href="javascript:void(0)" onclick="rejectOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Reject Order"><i class="fas fa-times"></i></a>
                                                        <a href="javascript:void(0)" onclick="deleteComercialInvoice(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Delete5"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                                @php
                                                $num++;
                                                @endphp
                                        @endif
                                    @endfor
                                @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- element untuk view edit  -->
                        <div id="editFclContainer" class="col-sm-12" style="margin-top: 15px;display: none;">
                                    <div class="row">
                                        <div class="col-md-12">

                                        <div class="btn-group" style="float: right;">
                                            <button type="button" class="btn btn-warning filter" id="backbutton" onclick="location.reload();">Kembali</button>
                                        </div>

                                        </div>
                                    </div>
                            <form action=""id="Formedit"></form>
                    
                        </div>
                  
                    
                

                    <!-- modal edit commercial invoice -->
                    <div id="editcomercial" class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document" style="max-width: 2200px;padding-left: 250px;">

                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Comercial Invoice</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('admin.pembelian_comercial_invoice') }}'" aria-label="Close">   <span aria-hidden="true">&times;</span></button>

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="Formedit2">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                     
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- view tambah comercial invoice kategori local -->
                    <div id="addcomerialinvoicelocal" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                                    
                                    <!-- modal import data barang -->
                                    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Import From Order Pembelian</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    
                                                </div>
                                                <div class="modal-body">
                                                            <div class="table-responsive">

                                                            
                                                                <table id="table-tambah-comercial-invoice" class="table table-striped">
                                                                        <thead>
                                                                            <div class="row mb-2">
                                                                                <div class="col-md-3">
                                                                                    <label>
                                                                                        <input type="checkbox" id="filterChecked"> Show only checked
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select id="filter-select" class="form-control select-supplier-tambah">
                                                                                        <option value="">Supplier</option>
                                                                                        @foreach(array_unique(array_column($Data['msg']['supplier'], 'name')) as $supplier)
                                                                                        <option value="{{ $supplier }}">{{ $supplier }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-3" id="id-search">
                                                                                    <label for="search-box">
                                                                                        Search:
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <input type="text" id="search-box" class="form-control d-inline-block w-round" placeholder="Cari...">
                                                                                </div>
                                                                            </div>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Image</th>
                                                                                <th scope="col">Kode</th>
                                                                                <th scope="col">Nama</th>
                                                                                <th scope="col">Jml Permintaan</th>
                                                                                <th scope="col">Supplier</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                            $number =0;
                                                                            $number2 =0;
                                                                            @endphp
                                                                        

                                                                            @foreach($Data['msg']['listorder'] as $index => $result)
                                                                            @php
                                                                            $number2++;

                                                                            @endphp
                                                                            <form action="" class="form-horizontal" id="importBarang" method="get">
                                                                                @csrf
                                                                                
                                                                                <tr>
                                                                                    <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">
                                                                                    
                                                                                
                                                                                    
                                                                                    
                                                                                    <input type="checkbox" class="kubik-checkbox-tambah" name="checkbox_{{ $number2 }}" data-supplier-name="{{ $result['supplier_name'] }}">
                                                                                    <input type="hidden" class="form-control restok-input-tambah" name="id_restok_{{ $number2 }}" value="{{ $result['restok_id'] }}">
                                                                                            
                                                                                    </td>
                                                                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;"><img src="{{ $Data['msg']['directory_gambar'] }}{{ $result['image'] }}" style="width:200px; height:200px;"></td>
                                                                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['new_kode'] }}</td>
                                                                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['name'] }}</td>
                                                                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['jml_permintaan'] }}</td>
                                                                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['supplier_name'] }}</td>
                                                                                    
                                                                                </tr>
                                                                                
                                                                            </form>
                                                                        @endforeach
                                                                        
                                                                        </tbody>
                                                                </table>
                                                            </div>
                                                            <div style="text-align:right; margin-top: 30px;">
                                                                    
                                                                    <button type="button" id="sendImportBarang" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                                                            </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                    <!-- button add import data -->
                                    <div class="row" id="padding-top">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button type="button" id="importData" class="btn btn-large btn-info">Import Data</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="btn-group" style="float: right; margin-right:30px;">
                                                            <button type="button" class="btn btn-warning filter" id="clearFilterBtn" onclick="window.location.href = 'data_comercialinvoice';">Kembali</button>

                                                        </div>

                                                    </div>
                                    </div>
                                    

                                    <div class="row" id="row-supplier">
                                        <form id="FormTambah">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="customCodeCheckbox">Custom Kode</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <input type="checkbox" id="customCodeCheckbox" class="styled customcode">
                                                        <input type="hidden" name="modeadmin_tambah" value="0">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="invoice_no_tambah">Invoice Number</label>
                                                        <input type="number" class="form-control" id="invoice_no_tambah" name="invoice_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="contract_no_tambah">Contract Number</label>
                                                        <input type="number" class="form-control" id="contract_no_tambah" name="contract_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="packing_no_tambah">Packing Number</label>
                                                        <input type="number" class="form-control" id="packing_no_tambah" name="packing_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                            </div>





                                        </form>
                                                
                                        <div class="col-md-6">

                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">

                                                    <label for="database_tambah_id">Database <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-md-9">

                                                        <select style="border: 1px solid #696868; color: black; padding: 10px; width:100%" class="form-control database-tambah" id="database_tambah_id" name="database_tambah_name" required>
                                                                                    <option value="">Database</option>
                                                                                    <option value="PT">PT</option>
                                                                                    <option value="UD">UD</option>
                                                        </select>
                                                </div>
                                            </div>

                                        </div>
                                                
                                        <div class="col-md-6" id="col-supplier">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                    <label id="label" class="supplier_label" for="select_supplier">Supplier <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <label for="" class="select_supplier_label"></label>
                                                    <select class="form-control pilih-supplier" style="width: 100%; display: none;" name="supplier_select" id="select_supplier">
                                                        <option value="">Pilih Supplier</option>
                                                        @foreach($Data['msg']['supplier'] as $index_supplier => $result_supplier)
                                                        <option value="{{ $result_supplier['id'] }}">{{ $result_supplier['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                                

                                    </div>

                                    <div class="row" id="row-select">
                                   
                                                                        <div class="col-md-6">
                                                                            <div class="row" id="padding-top">
                                                                                <div class="col-md-3">
                                                                                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%;width: 100%" for="company-name">Nama Perusahaan <span style="color:red">*</span></label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <label for="label_name_company" id="label_name_company"></label>
                                                                                    <input type="hidden" class="form-control" id="company-name" name="company_name" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" value="">
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row" id="padding-top">
                                                                                <div class="col-md-3">
                                                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="address_company">Alamat Perusahaan</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <label for="label_name_address" id="label_name_address"></label>
                                                                                    <textarea class="form-control" id="address_company" name="address_company" style="display: none; border: 1px solid #ced4da; width: 100%; padding-left:20px;"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                       
                                    </div>
                                    
                                    <div class="row" id="row_select">
                                                <div class="col-md-6">
                                                    <div class="row" id="padding-top">
                                                        <div class="col-md-3">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <label for="label_city" id="label_city"></label>
                                                            <input type="hidden" class="form-control" id="city" name="city" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Kota Perusahaan">
                                                        </div>                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" id="padding-top">
                                                        <div class="col-md-6">

                                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="label_telp" id="label_telp"></label>
                                                            <input type="hidden" class="form-control" id="telp" name="telp" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 100%" placeholder="Telp. Perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                    </div>

                                    <div class="row" id="row-select">
                                        <div class="col-md-6">
                                            
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                        
                                                        <label id="label" for="input-input">No. Referensi</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <input class="form-control no-referensi"type="text" placeholder="No. Referensi" id="input-input">
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="col-select">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                <label id="label" for="select_matauang">Mata Uang</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <!-- yg digunakan class untuk select2 -->
                                                    <select name="select_namematauang" class="form-control pilih-matauang" style="width:100%;" id="select_matauang">

                                                            <option value="">Pilih Mata Uang</option>
                                                        @foreach($Data['msg']['matauang'] as $index => $result)
                                                            <option value="{{ $result['id'] }}">( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="row-select">
                                        <div class="col-md-6">
                                            
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                        
                                                        <label id="label" for="tgl_request">Tanggal Transaksi <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <input class="form-control" id="tgl_request" type="text" placeholder="Tanggal Transaksi" id="input-input">
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="col-select">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                    <label id="label" for="banksupplier-tambah-id">Bank Supplier</label>
                                                </div>
                                                <div class="col-md-9">
                                                        <select style="border: 1px solid #696868; color: black; padding: 10px;" 
                                                                                        class="select select2 select-search form-control banksupplier-tambah" 
                                                                                        id="banksupplier-tambah-id" name="banksupplier_edit">
                                                                <option value="0">Pilih Bank Supplier</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="row" >
                                        <div class="col-md-9">
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-2">
                                                        
                                                        <label id="label" for="select_termin_cash">Termin <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <select class="form-control select_termin_cash" style="width:100%" name="" id="select_termin_cash">
                                                            @foreach($Data['msg']['termin'] as $index => $result)
                                                                <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    

                                                        
                                                    </div>
                                                    <div class="col-md-3">

                                                        <select class="form-control select_termin_rekening" style="width:100%" name="" id="select_termin_rekening">
                                                            
                                                        </select>
                                                    

                                                        
                                                    </div>
                                                </div>    

                                        </div>
                                    </div>

                                    <div class="element">
                                        <div class="table-wrapper">
                                            <table class="responsive-table">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Nama Barang</th>
                                                        <th id="harga-belum-ppn">Harga Belum PPN</th>
                                                        <th>QTY</th>
                                                        <th>DISC</th>
                                                        <th>Subtotal</th>
                                                        <th>Hs Code</th>
                                                        <th>PPN</th>
                                                        <th>Gudang</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="container-import">
                                                
                                                 
                                                </tbody>
                                                <tbody class="container-import2">
                                                
                                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row" id="padding-top">
                                        <div class="col-md-6">
                                            <div class="row div-bebas">
                                                <div class="col-md-3">
                                                    <label for="">Item</label>
                                                </div>
                                                <div class="col-md-9">
                                                        <select class="form-control item-barang" style="width:100%;" name="" id="select_barang">
                                                            <option value="">Pilih Item</option>
                                                            
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-check text-start">
                                                        <input class="form-check-input" type="checkbox" value="0" id="flexCheckDefault">
                                                        <label for="">PPN</label>
                                                    </div>
                                                </div>
                                                   
                                               
                                                <div class="col-md-6"id="harga_ppn">
                                                    <div class="form-group form-check ">
                                                        <input class="form-check-input " type="checkbox" value="0" id="flexCheckDefaultTermasukkPPN">
                                               
                                                            Harga Termasuk PPN
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row"id="padding-top">
                                        <div class="col-12 col-md-6">

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        <label for="text_area">Keterangan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea class="form-control" name="" id="text_area" rows="3"placeholder="Keterangan"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group" id="padding-top">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        <label for="select_incoterms">Incoterms</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select class="form-control pilih-incoterms" style="width:100%;" name="" id="select_incoterms">
                                                            <option value="">Pilih Incoterms</option>
                                                            <option value="FOB">FOB</option>
                                                            <option value="CIF">CIF</option>
                                                            <option value="EXWORK">EXWORK</option>
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" id="padding-top">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        <label for="input-input">Location</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        
                                                        <input type="text" class="form-control location" id="input-input" name="location" placeholder="Location">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" id="padding-top">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        <label for="select_cabang">Cabang <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select class="form-control pilih-cabang" style="width:100%;" name="" id="select_cabang">
                                                            <option value="">Pilih Cabang</option>
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <table class="table table-striped">
                                                <tr id="border">
                                                    <td id="border"  class="element_subtotal">Subtotal </td>
                                                    <td id="border" class="sutotal_element">0</td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border"  class="element_discount_percent">Discount Percent </td>
                                                    <td id="border">
                                                        <div style="display: flex; align-items: center;">
                                                            <input type="number" class="form-control" id="discount_percent" value="0">
                                                            <span >%</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border" class="element_discount_nominal">Discount Nominal</td>
                                                    <td id="border" ><input type="number" class="form-control" id="discount_nominal" value="0"></td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">Freight Cost</td>
                                                    <td id="border">
                                                        <div style="display: flex; align-items: center;">
                                                            <input type="number" class="form-control" id="freightcost_element" value="0">
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">Insurance</td>
                                                    <td id="border">

                                                        <div style="display: flex; align-items: center;">
                                                                <input type="number" class="form-control" id="insurance_element" value="0">
                                                                
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border"  class="element_total">Total </td>
                                                    <td id="border" class="total_element">0</td>
                                                </tr>
                                           </table>
                                        </div>
                                    </div>
                                    
                                    <div class="row sendSave" style="display:none;">
                                        <div style="text-align:right; margin-top: 30px;">
                                    
                                                <button type="button" id="sendSave" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                                        </div>
                                    </div>
                                     
                                    <div class="row sendSaveImport" style="display:none;">
                                        <div style="text-align:right; margin-top: 30px;">
                                    
                                                <button type="button" id="sendSaveImport" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                                        </div>
                                    </div>
                                    
                    </div>
                    
                    <!-- view content tambah ekspedisi -->
                    <div id="ekspedisi-content" class="tab-content" style="display: none;">
                        <div class="row" id="row-supplier">
                            <div class="col-md-6">

                                <div class="row" id="padding-top">
                                    <div class="col-md-3">

                                        <label id="label" for="">Kode <span id="required-star">*</span></label>
                                    </div>
                                    <div class="col-md-9">

                                        <input class="form-control kode"type="text" placeholder="AUTO" id="input-input" disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6" id="col-supplier">
                                <div class="row" id="padding-top">
                                    <div class="col-md-3">
                                        <label id="label" for="">Rute <span id="required-star">*</span></label>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="row" >

                                            <div class="col-md-12">

                                                <select class="select2 form-control tambah_rute" style="width:100%" name="" id="rute">
                                                    <option value="">Pilih Rute</option>

                                                    <option value="localchina">Lokal China</option>

                                                    <option value="chinaindo">China Indo</option>

                                                    <option value="localindo">Lokal Indo</option>
                                                </select>



                                            </div>

                                        </div>    

                                    </div>

                                </div>
                            </div>



                        </div>
                        <div class="row" id="row-supplier">
                            <div class="col-md-6">

                                <div class="row" id="padding-top">
                                    <div class="col-md-3">

                                        <label id="label" for="">Tanggal <span id="required-star">*</span></label>
                                    </div>
                                    <div class="col-md-9">

                                        <input class="form-control tambah_tgl_ekspedisi" id="tgl_request" type="text" placeholder="Tanggal Pengiriman" id="input-input">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6" id="col-supplier">
                                <div class="row" id="padding-top">
                                    <div class="col-md-3">
                                        <label id="label" for="">Ekspedisi <span id="required-star">*</span></label>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="row" >

                                            <div class="col-md-12">



                                                <select class="select2 form-control tambah_ekspedisi" style="width:100%" name="" id="ekspedisi">
                                                    <option value="">Pilih Ekspedisi</option>


                                                </select>


                                            </div>

                                        </div>    

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row" id="row-supplier">
                            <div class="col-md-6" id="col-supplier">
                                <div class="row" id="padding-top">
                                    <div class="col-md-3">
                                        <label id="label" for="">Biaya <span id="required-star">*</span></label>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="row" >

                                            <div class="col-md-6">

                                                <select class="select2 form-control tambah_matauang_ekspedisi" style="width:100%" name="" id="tambah_matauang_ekspedisi">
                                                    <option value="">Pilih mata Uang</option>
                                                   
                                                </select>



                                            </div>
                                            <div class="col-md-6">

                                                <input type="text" class="form-control tambah_biaya_ekspedisi" id="input-input" placeholder="Biaya">


                                            </div>
                                        </div>    

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="row" id="padding-top">
                                    <div class="col-md-3">

                                        <label id="label" for="resi_label">Resi <span id="required-star">*</span></label>
                                    </div>
                                    <div class="col-md-9">

                                        <input class="form-control tambah_resi_ekspedisi"type="text" placeholder="No. Resi" id="input-input">
                                    </div>
                                </div>

                            </div>



                        </div>

                        <!-- keterangan ekspedisi -->
                        <div class="row" id="row-supplier">
                                            <div class="col-md-6">
                                                        <div class="row" id="padding-top">
                                                            <div class="col-md-3">
                                                                
                                                                <label id="label" for="keterangan">Keterangan <span id="required-star">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                            <textarea class="form-control tambah_keterangan" name="" id="text_area" rows="3"placeholder="Keterangan"></textarea>
                                                            </div>
                                                        </div>
                                            </div>
                        </div>
                                        <div class="element">

                                            <div id="element-button-tambah">

                                                <button class="btn btn-info" id="tambah-ekspedisi">Tambah Ekspedisi</button>
                                            </div>

                                            <div class="table-wrapper tabel-ekspedisi">
                                                <table class="responsive-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tgl</th>
                                                            <th>Kode</th>
                                                            <th>Rute</th>
                                                            <th>Nama Ekspedisi</th>
                                                            <th>No. Resi</th>
                                                            <th>Biaya</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbody-container-ekspedisi">
                                                    
                                                    
                                                    </tbody>
                                                    <tbody class="tambah-tbody-container-ekspedisi">
                                                    
                                                    
                                                    </tbody>
                                                    
                                                    
                                                </table>
                                            </div>
                                            <div id="element-button-tambah">

                                                <button class="btn btn-primary" id="simpan-ekspedisi">Simpan Ekspedisi</button>
                                            </div>
                                        </div>
                        
                        <!-- modal menampilkan data ketika edit row di tabel ekspedisi  -->
                        <div class="modal fade" id="editModalEksepedisiLcl" tabindex="-1" role="dialog" aria-labelledby="editModalEksepedisiLclLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalEksepedisiLclLabel">Edit Ekspedisi</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="">Kode Pengiriman</label>
                                                        <input type="text" class="form-control edit_kode_ekspedisi_lcl" id="input-input">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Tanggal</label>
                                                        <input class="form-control edit_tgl_kirim_ekspedisi" id="tgl_request" type="text" placeholder="Tanggal Kirim" id="input-input">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Biaya</label>
                                                        
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                            <select class="select2 form-control edit_matauang_ekspedisi" style="width:100%" name="" id="edit_matauang_ekspedisi">
                                                                                    <option value="">Pilih mata Uang</option>
                          
                                                                            </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                               <input type="text" class="form-control edit_biaya_ekspedisi_lcl" id="input-input">
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Rute Edit</label>
                                                        <select class="select2 form-control edit_rute_ekspedisi" style="width:100%" name="" id="rute_ekspedisi">
                                                                

                                                                <option value="localchina">Lokal China</option>

                                                                <option value="chinaindo">China Indo</option>

                                                                <option value="localindo">Lokal Indo</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                                <label for="">Ekspedisi</label>

                                                                <select class="select2 form-control edit_ekspedisi_lcl" style="width:100%" name="" id="edit_ekspedisi_lcl">
                                                                                        
                                                                                   
                                                                </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">No. Resi</label>
                                                        <input type="text" class="form-control edit_no_resi" id="input-input">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text_area">Keterangan</label>
                                                        <textarea class="form-control edit_keterangan" name="" id="text_area" rows="3"placeholder="Keterangan"></textarea>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    
                                                    <button type="button" id="update_ekspedisi" class="btn btn-primary">Update Ekspedisi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>


      <!-- Modal Question After Click Add Commercial invoice -->
                                        
                <div class="modal fade" id="comercialQuestionModal" tabindex="-1" aria-labelledby="comercialQuestionPickModalLabel" aria-hidden="true" style="margin-top:200px;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="comercialQuestionPickModalLabel">Add Commercial Invoice</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                </div>
                                <div class="modal-body text-center">
                                    
                                    <!-- Two buttons inside the modal body -->
                                    <div class="row">
                                        <div class="col-md-6" style="text-align:center;">

                                            <button type="button" id="tambahComercialLclLocal" class="btn btn-primary me-2" id="optionOne">Add Comercial Invoice Lcl / Local</button>
                                        </div>
                                        <div class="col-md-6" style="text-align:center;">

                                            <a href="{{ route('admin.pembelian_add_comercial_invoice') }}" id="tambahComercialInvoice" class="btn btn-info me-2" id="optionTwo">Add Commercial Invoice</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
                <!-- modal untuk memilih import atau tidak -->
                <div class="modal fade" id="comercialQuestionPickModal" tabindex="-1" aria-labelledby="comercialQuestionPickModalLabel" aria-hidden="true" style="margin-top:200px;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="comercialQuestionPickModalLabel">Add Commercial Invoice</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                </div>
                                <div class="modal-body text-center">
                                    
                                    <!-- Two buttons inside the modal body -->
                                    <div class="row">
                                        <div class="col-md-6" style="text-align:center;">

                                            <button type="button" id="tambahComercialLclLocalPick" class="btn btn-primary me-2 with-import">Import Order Pembelian</button>
                                        </div>
                                        <div class="col-md-6" style="text-align:center;">
                                            
                                            <button type="button" id="no-import" class="btn btn-danger me-2">No Import</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
                <!-- Bootstrap Modal -->
                <div class="modal fade" id="unitpriceModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title_modal_import" id="modalLabel">Price History</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="table responsive">

                                    <table class="table">
                                        <thead>
                                            <th>
                                             HsCode
                                            </th>
                                            <th id="price_import">
                                                Price
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                        </thead>
                                        <tbody class="tbody-harga-belum-ppn">
    
                                        </tbody>
                                    </table>
                                </div>
                                <!-- You can add form fields, text, or any other content here -->
                            </div>
                            <div class="modal-footer">
                  
                                <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Simpan</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="../assets/js/commercial-invoice/commercial_invoice.js"></script> 
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->


<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>

    document.getElementById('importData').addEventListener('click', function() {
        console.log('modal impor data')
        // Show the modal
       $('#importModal').modal('show')

    })

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


            window.location.href = '{{ route('admin.pembelian_comercial_invoice') }}'; 
    })

    
    $(document).ready(function() {
            var discount_percent_td=0
            var discount_nominal=0
            
          
            var english_import=[]
            var china_import=[]
            var model_import=[]
            var brand_import=[]
            var length_m_import=[]
            var length_p_import=[]
            var width_m_import=[]
            var width_p_import=[]
            var height_m_import=[]
            var height_p_import=[]
            var qty_import=[]
            var nw_import=[]
            var gw_import=[]
            var cbm_import=[]
            var price_import=[]
            var priceusd_import=[]
            var use_name_import=[]
            var total_import=[]
            var totalusd_import=[]
            var use_import=[]
            var idrestok_import=[]
            var disc_import=[]
            var hs_import=[]
            var status_ppn_import=[]
            var status_include_ppn_import=[]
            var gudang_import=[]
            var restok_import=[]
            var freight_cost_import=0
            var insurance_import =0
            var bank_name_import=''
            var bank_address_import=''
            var swift_code_import=''
            var account_import=''
            var beneficiary_name_import=''
            var beneficiary_address_import=''
            var category_barang='';
            var simbol_mt_import='';
            // $('#select_supplier').select2({
            //             placeholder: "Pilih Supplier",
            //             allowClear: true,
            //             width: '100%' // Adjust width to fit the select element
            // });
            $('.pilih-matauang').select2({
                        placeholder: "Pilih Mata Uang",
                        allowClear: true,
                        width: '100%' // Adjust width to fit the select element
            });
            $('#banksupplier-tambah-id').select2({
                        placeholder: "Pilih Bank Supplier",
                        allowClear: true,
                        width: '100%' // Adjust width to fit the select element
            });
            $('#select_termin_cash').select2({
                       
                        allowClear: true,
                        width: '100%' // Adjust width to fit the select element
            });
        //memproses untuk menampikan barang menggunakan import di menu import
        $('#sendImportBarang').click(function(event) {
            
            var bank_supplier_tambah_id = $('#banksupplier-tambah-id');
            var table_container_import =$('.container-import');
            event.preventDefault();
            table_container_import.empty()
            var selectedCheckboxes = $('.kubik-checkbox-tambah:checked');
            var formData = {
                
                idrestok: [],
                valuerestok: []
            };
            var firstSupplierName = null;
            var hasDifferentSupplier = false;
         
            // console.log('formData',formData)
            selectedCheckboxes.each(function(index) {
                
                var hiddenInputValue = $(this).next('input[type="hidden"]').val();
                console.log('hiddenInputValue',hiddenInputValue)
                formData.idrestok.push(hiddenInputValue);
                if (hiddenInputValue) {
                    formData.valuerestok.push(1); 
                }
                var supplierName = $(this).data('supplier-name');
                console.log('Supplier Name:', supplierName);
                if (firstSupplierName === null) {
                    firstSupplierName = supplierName; // Set the first supplier name for comparison
                } else if (firstSupplierName !== supplierName) {
                    hasDifferentSupplier = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Supplier Berbeda',
                        text: 'Pilih Supplier Yang Sama!',
                        confirmButtonText: 'Okay'
                    });
                    return false; // Exit loop early if supplier names differ
                }
            });
            if (hasDifferentSupplier) {
                return; // Do not proceed to AJAX if supplier names are different
            }
            var directory_import='https://maxipro.id/images/barang/'
            
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_importbarang_comercial_invoice') }}',
                data: formData,
                success: function(response) {
                    $('#banksupplier-tambah-id').empty()
                    // $('#select_matauang').empty()
                    
                    console.log('response import',response)
                    category_barang=response.orderpembelian[0].category
                    response.supplierbank.forEach((supplier) => {

                        const option = $('<option>', {
                            value: supplier.id, // Assuming 'id' is the key you want to set as value
                            text: supplier.bank_name, // Assuming 'name' is the key you want to display
                            selected: supplier.id
                        });
                        $('#banksupplier-tambah-id').append(option);
                        $('#select_matauang').val(supplier.id_matauang).trigger('change');
                        bank_name_import=supplier.bank_name
                        bank_address_import = supplier.bank_address
                        swift_code_import = supplier.bank_address
                        account_import = supplier.account_number
                        beneficiary_name_import = supplier.beneficiary_name
                        beneficiary_address_import = supplier.beneficiary_address
                        response.matauang.forEach((mt_uang)=>{
                            if(mt_uang.id==supplier.id_matauang){
                                console.log('mt uang',mt_uang.simbol)
                                simbol_mt_import=mt_uang.simbol
                            }
                        })
                    });
                    $('.element_subtotal').text('Subtotal ('+simbol_mt_import+')')
                    $('.element_discount_percent').text('Discount Percent ('+simbol_mt_import+')')
                                        $('.element_discount_nominal').text('Discount Nominal ('+simbol_mt_import+')')
                                        
                                        $('.element_total').text('Total ('+simbol_mt_import+')')
                    response.supplier.forEach((supplier_supplier) => {
                        $('#select_supplier').val(supplier_supplier.id).trigger('change');
                        $('.select_supplier_label').text(supplier_supplier.name)
                        $('#label_name_company').text(supplier_supplier.company)
                        $('#company-name').val(supplier_supplier.company)
                        $('#label_name_address').text(supplier_supplier.address)
                        $('#address_company').val(supplier_supplier.address)
                        $('#label_city').text(supplier_supplier.city)
                        $('#city').val(supplier_supplier.city)
                        $('#label_telp').text(supplier_supplier.telp)
                        $('#telp').val(supplier_supplier.telp)
                    })
                    var id_barang_hs_codehistory =[];
                    var number_hs_codehistory=[]
                    var date_hs_code_history=[]
                    var hs_codehistory =[];
                    response.hscodehistory.forEach(function(hscodehistory,key1){
                        var dateString = hscodehistory.commercialinvoice.date;
                        var date = new Date(dateString);
    
                                // Format the date to "DD/MM/YYYY"
                        var day = date.getDate().toString().padStart(2, '0'); // Day with leading zero
                        var monthsIndo = [
                                    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                            ];
                                // var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Month with leading zero
                        var month = monthsIndo[date.getMonth()]; // Month in Indonesian
                        var year = date.getFullYear();
    
                        var DateFormat = `${day} ${month} ${year}`;

                        var id_barang_restok = hscodehistory.restok.id_barang;
                        id_barang_hs_codehistory.push(id_barang_restok)
                        
                      
                        number_hs_codehistory.push(hscodehistory.hs_code)
                        date_hs_code_history.push(DateFormat)
                        response.matauang.forEach(function(matauang,key) {
                                            if(matauang.id==response.hscodehistory[key1].commercialinvoice.id_matauang){
                                                var merge = matauang.simbol +''+hscodehistory.unit_price_without_tax
                                                hs_codehistory.push(merge)
                                            }
                                            else if(response.hscodehistory[key1].commercialinvoice.id_matauang==0){
                                                var merge2 = ''+hscodehistory.unit_price_without_tax
                                                hs_codehistory.push(merge2)
                                            }
                    
                        });
                    })
                    
                    response.orderpembelian.forEach((import_item, itemIndexImport) => {
                        restok_import.push(import_item.id)
                        use_name_import.push('')
                        console.log('res item',import_item.product.image)
                        var trProductImport = $('<tr>');
                                    var imgProductImport = $('<img class="img-fluid" style="max-width: 20%%; height: auto;">');
                                    imgProductImport.attr('src',directory_import+import_item.product.image)
                                    var tdProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '10%'
                                    });                     
                                    tdProductImport.append(imgProductImport);
                                    var td1ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '15%',  
                                    });
                                    var td2ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '15%',  
                                    });
                                    var td3ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '5%',  
                                    });
                                    var td4ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '5%',  
                                    });
                                    var td5ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '5%',  
                                    });
                                    var td6ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '15%',  
                                    });
                                    var td7ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '2%',  
                                    });
                                    var td8ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '15%',  
                                    });
                                    
                                    var td9ProductImport = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '5%',  
                                    });

                                    //get centang include ppn
                                    $('#flexCheckDefaultTermasukkPPN').on('change', function() {
                                                    if ($(this).is(':checked')) {
                                                        console.log('centang tambah')
                                                        $(this).val(1);
                                                        $(this).prop('checked', true);
                                                    } else {
                                                        $(this).val(0);  // Jika Anda ingin mengatur nilai saat tidak tercentang
                                                        $(this).prop('checked', false);
                                                    }
                                        
                                    });
                                    
                                      // td discount percent
            $('#freightcost_element').change(function(){
                                        console.log('freight_cost',$(this).val())
                                        freight_cost_import=$(this).val()
                                        updateSubtotal(); 
            })
            $('#insurance_element').change(function(){
                                        console.log('insurance',$(this).val())
                                        insurance_import=$(this).val()
                                        updateSubtotal(); 
            })
            $('#discount_percent').change(function(){
                                        console.log('discount Percent',$(this).val())
                                        discount_percent_td=$(this).val()
                                        updateSubtotal(); 
            })
            // td discount nominal
            $('#discount_nominal').change(function(){
                                        console.log('discount nominal',$(this).val())
                                        discount_nominal=$(this).val()
                                        updateSubtotal(); 
            })
                                    //tidak ditampilkan
                                    var inputhiddenenglishProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:import_item.product.name_english,
                                            id:'name_english'+itemIndexImport
                                    });
                                    var inputhiddenenglishProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:import_item.product.name_china,
                                            id:'name_china'+itemIndexImport
                                    });
                                    english_import.push(import_item.product.name_english)
                                    china_import.push(import_item.product.name_china)
                                    model_import.push(import_item.product.model)
                                    brand_import.push(import_item.product.merk)
                                    length_m_import.push(import_item.product.long || 0);
                                    length_p_import.push(import_item.product.long_p || 0);
                                    width_m_import.push(import_item.product.width || 0);
                                    width_p_import.push(import_item.product.width_p || 0);
                                    height_m_import.push(import_item.product.height || 0);
                                    height_p_import.push(import_item.product.height_p || 0);
                                    gw_import.push(import_item.product.weight || 0);
                                    nw_import.push(import_item.product.nett_weight || 0);
                                    cbm_import.push(import_item.product.cbm || 0);
                                 
                                    var inputtd1ProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:import_item.product.name,
                                            id:'name'+itemIndexImport
                                    });
                                    inputtd1ProductImport.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td1ProductImport.append(inputtd1ProductImport);

                                    var inputtd2ProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:0,
                                            id:'price_asal'+itemIndexImport
                                    });
                                    inputtd2ProductImport.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td2ProductImport.append(inputtd2ProductImport);
                                    

                                    var tbody_harga_belum_ppn = $('.tbody-harga-belum-ppn');
                                    var modalButton = $('<button>', {
                                        type: 'button',
                                        class: 'btn btn-primary',
                                        text: 'View Price',
                                        'data-bs-toggle': 'modal',
                                        'data-bs-target': '#unitpriceModal' // Replace 'unitpriceModal' with the actual ID of your modal
                                    });
                                    modalButton.css({
                                        'margin-top': '10px', // Adjust this value as needed
                                        'display': 'block' // Ensures button takes up its own line within the td
                                    });
                                    
                                    modalButton.on('click', function () {
                                        // Clear previous content in tbody
                                        $('.tbody-harga-belum-ppn').empty();
                                        $('#title_modal_import').text('Price History')
                                        $('#price_import').show()
                                        // Loop through `id_barang_hs_codehistory` to find matching data
                                        id_barang_hs_codehistory.forEach(function(item, urutan) {
                                            if (item === import_item.id_barang) {
                                                // Create a new table row with the matching hs_codehistory data
                                                var newRow = $('<tr>');
                                                
                                                // Append data cells
                                                newRow.append($('<td>').text(number_hs_codehistory[urutan])); // Assuming `number_hs_codehistory` is an array
                                                newRow.append($('<td>').text(hs_codehistory[urutan])); // Display hs_codehistory data
                                                newRow.append($('<td>').text(date_hs_code_history[urutan])); // Display date_hs_code_history data
                                                
                                                // Create a checkbox that, when checked, retrieves `number_hs_codehistory`
                                                var checkbox = $('<input>', {
                                                    type: 'checkbox',
                                                    class: 'hs-code-checkbox', // Optional class for easy identification
                                                    'data-number': hs_codehistory[urutan].substring(1), // Store the hs_code number in data attribute
                                                    change: function() { // Event to handle checking the checkbox
                                                        if (this.checked) {
                                                            inputtd2ProductImport.val($(this).data('number'));
                                                        }
                                                    }
                                                });
                                                
                                                // Append the checkbox inside a td
                                                newRow.append($('<td>').append(checkbox));
                                                
                                                // Append the new row to tbody_harga_belum_ppn
                                                tbody_harga_belum_ppn.append(newRow);
                                            }
                                        });
                                    });

                                    td2ProductImport.append(modalButton);
                                    var inputtd3ProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:0,
                                            id:'qty_qty'+itemIndexImport
                                    });
                                    inputtd3ProductImport.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td3ProductImport.append(inputtd3ProductImport)
                                    
                                    var inputtd4ProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:0,
                                            id:'disc'+itemIndexImport
                                    });
                                    inputtd4ProductImport.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td4ProductImport.append(inputtd4ProductImport)
                                    var inputtd5ProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:0,
                                            id:'subtotal'+itemIndexImport
                                    });
                                    inputtd5ProductImport.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td5ProductImport.append(inputtd5ProductImport)
                                    
                                    var inputtd6ProductImport = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:0,
                                            id:'hs_code_import_locallcl'+itemIndexImport
                                    });
                                    inputtd6ProductImport.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td6ProductImport.append(inputtd6ProductImport)
                                    
                                    var modalButtonHscode = $('<button>', {
                                        type: 'button',
                                        class: 'btn btn-primary',
                                        text: 'View HsCode',
                                        'data-bs-toggle': 'modal',
                                        'data-bs-target': '#unitpriceModal' // Replace 'unitpriceModal' with the actual ID of your modal
                                    });
                                    
                                    modalButtonHscode.css({
                                        'margin-top': '10px', // Adjust this value as needed
                                        'display': 'block' // Ensures button takes up its own line within the td
                                    });
                                    
                                    modalButtonHscode.on('click', function () {
                                        // Clear previous content in tbody
                                        $('.tbody-harga-belum-ppn').empty();
                                        $('#price_import').hide()    
                                        // Loop through `id_barang_hs_codehistory` to find matching data
                                        id_barang_hs_codehistory.forEach(function(item, urutan) {
                                            if (item === import_item.id_barang) {
                                                // Create a new table row with the matching hs_codehistory data
                                                var newRow = $('<tr>');
                                                $('#title_modal_import').text('Hscode History')
                                                // Append data cells
                                                newRow.append($('<td>').text(number_hs_codehistory[urutan])); // Assuming `number_hs_codehistory` is an array
                                                // newRow.append($('<td>').text(hs_codehistory[urutan])); // Display hs_codehistory data
                                                newRow.append($('<td>').text(date_hs_code_history[urutan])); // Display date_hs_code_history data
                                                
                                                // Create a checkbox that, when checked, retrieves `number_hs_codehistory`
                                                var checkbox = $('<input>', {
                                                    type: 'checkbox',
                                                    class: 'hs-code-checkbox', // Optional class for easy identification
                                                    'data-nomorhscode': number_hs_codehistory[urutan], // Store the hs_code number in data attribute
                                                    change: function() { // Event to handle checking the checkbox
                                                        if (this.checked) {
                                                            console.log('number hs code',$(this).data('nomorhscode'))
                                                            inputtd6ProductImport.val($(this).data('nomorhscode'));
                                                            hs_import[itemIndexImport]=inputtd6ProductImport.val()
                                                        }
                                                    }
                                                });
                                                
                                                // Append the checkbox inside a td
                                                newRow.append($('<td>').append(checkbox));
                                                
                                                // Append the new row to tbody_harga_belum_ppn
                                                tbody_harga_belum_ppn.append(newRow);
                                            }
                                        });
                                    });
                                    td6ProductImport.append(modalButtonHscode)
                                    var checkboxElementProductImport = $('<input>', {
                                        type: 'checkbox',
                                        id: 'checkboxId_' + itemIndexImport,
                                        value: 0
                                    }).css({
                                        'border': '1px solid #696868',
                                    }).on('change', function() {
                                        var newValue = this.checked ? 1 : 0;
                                        $(this).val(newValue);

                                        // changeHistory[itemIndexImport] = newValue;
                                        status_ppn_import[itemIndexImport] = newValue
                                        console.log('status_ppn_import',newValue);
                                    
                                    });
                                    status_ppn_import[itemIndexImport]=0
                                    td7ProductImport.append(checkboxElementProductImport)

                                    var selecttd7ProductImport = $('<select>', {
                                        class: 'form-control',
                                        id: 'gudang_import_locallcl' + itemIndexImport
                                    });

                                    selecttd7ProductImport.css({
                                        'border': '1px solid #696868', 
                                        'color': 'black', 
                                        'padding': '10px',
                                        'width': '100%' 
                                    });
                                    var defaultOptionImport = $('<option>', {
                                        value: '',
                                        text: 'Pilih Gudang' // Default text
                                    }).attr('disabled', 'disabled').attr('selected', 'selected'); // Disabled and selected
                                    selecttd7ProductImport.append(defaultOptionImport);
                                    response.gudang.forEach(function(import_gudang,index_gudang) {
                                        var optionElementGudang = $('<option>', {
                                            
                                            
                                            value: import_gudang.id,
                                            text: import_gudang.name

                                        });
                                        selecttd7ProductImport.append(optionElementGudang);
                                    });

                                    td8ProductImport.append(selecttd7ProductImport)
                                    selecttd7ProductImport.select2({
                                        placeholder: 'Pilih Gudang',
                                        width: '100%' // Ensure Select2 takes the full width
                                    });
                                    selecttd7ProductImport.on('change', function() {
                                        gudang_import[itemIndexImport] = $(this).val(); // Set gudang_import to the selected value
                                        // console.log('Selected Gudang ID:', gudang_import); // Log for debugging
                                    });
                                    var deleteButtonImport = $('<button>',{
                                        text: 'X',
                                        class: 'btn btn-danger btn-sm'
                                    }).css({
                                        'border': 'none',
                                        'color':'white',
                                        'background-color': '#dc3545',
                                        'padding': '5px 10px',
                                        'cursor': 'pointer'
                                    }).on('click',function(){
                                        $(this).closest('tr').remove();
                                    })
                                    td9ProductImport.append(deleteButtonImport)
                    
                                    function updateSubtotal() {
                                        // Get the values of inputtd2 and inputtd3, parse them as floats to handle calculations
                                        var price = parseFloat(inputtd2ProductImport.val()) || 0;
                                        price_import[itemIndexImport]=price
                                        priceusd_import[itemIndexImport]=price*0.15
                                        var qty = parseFloat(inputtd3ProductImport.val()) || 0;
                                        qty_import[itemIndexImport]=qty
                                        var discount_import = parseFloat(inputtd4ProductImport.val()) || 0;
                                        disc_import[itemIndexImport] = discount_import
                                        // Calculate subtotal and update inputtd5
                                        var subtotal = price * qty;
                                        inputtd5ProductImport.val(subtotal-discount_import);
                                        total_import[itemIndexImport] = inputtd5ProductImport.val()
                                        totalusd_import[itemIndexImport] = parseFloat((inputtd5ProductImport.val())*0.15)
                                        var sumTotalImport = 0;
                        
                                        for (var i = 0; i < total_import.length; i++) {
                                            sumTotalImport += parseFloat(total_import[i]);  // Ensures each value is treated as a number
                                        }

                                        console.log('total_import', total_import);
                                        console.log('discount_nominal lg',discount_nominal);
                                        $('.sutotal_element').text(sumTotalImport)     
                                        if (discount_percent_td !== 0) {
                                            finalTotal = sumTotalImport * ((100 - parseFloat(discount_percent_td)) / 100);
                                            $('.total_element').text(finalTotal-discount_nominal+parseFloat(freight_cost_import)+parseFloat(insurance_import))               
                                        }else{
                                            $('.total_element').text(sumTotalImport-discount_nominal+parseFloat(freight_cost_import)+parseFloat(insurance_import))
                                        }
                                        
                                    }
                                    function updateHs() {
                                        var hs = parseFloat(inputtd6ProductImport.val())
                                        hs_import[itemIndexImport] = hs
                                    }
                                    
                                    
                                    // Attach input event listeners to inputtd2ProductImport and inputtd3ProductImport
                                    inputtd2ProductImport.on('input', updateSubtotal);
                                    inputtd3ProductImport.on('input', updateSubtotal);
                                    inputtd4ProductImport.on('input', updateSubtotal);

                                    inputtd6ProductImport.on('input', updateHs);

                                    trProductImport.append(tdProductImport,td1ProductImport,td2ProductImport,td3ProductImport,td4ProductImport,td5ProductImport,td6ProductImport,td7ProductImport,td8ProductImport,td9ProductImport)


                                    table_container_import.append(trProductImport)
                    })
                }
            })
                
        })
        
        
        if (window.location.pathname === '/admin/data_comercialinvoice') {
            // Append or display the <h4> element if condition is met
            
            $('#navbarBlur').css('display', 'block');
            $('#judulRestok').css('display', 'block');
            $('#div_tambahComercialQuestion').css('display', 'block');
            $('.radio-button-container').css('display', 'block');
            $('#tabe-stok').show();


            
        }
        // if (window.location.pathname === '/admin/addcomercialinvoicelcllocal') {
        //     // Append or display the <h4> element if condition is met
        //     $('#judulRestok').css('display', 'block');
        //     $('#comercialQuestionPickModal').modal('hide'); // Show the Bootstrap modal
        // }
        
        var lastSelectedValue = $('input[type=radio][name=filter]:checked').val();

        //untuk menyimpan id_lcl yang dibuat
        var id_lcl;

        //untuk membuat datatable
        var tableInitialized = false;
        if (!tableInitialized) {
            console.log('masuk tabe stok lagi')
            var table = $('#tabe-stok').DataTable({
                "dom": '<"top"lf>rt<"bottom"ip><"clear">',
                "language": {
                    "searchPlaceholder": "Cari...",
                    "search": "Cari:",
                    "paginate": {
                        "previous": "back",
                        "next": "next"
                    }
                },
                columns: [
                    { data: 'num', title: 'No' },
                    { data: 'date', title: 'Tanggal' },
                    { data: 'invoice', title: 'Invoice' },
                    { data: 'supplier', title: 'Supplier' },
                    { data: 'company', title: 'Nama Perusahaan' },
                    { data: 'telp', title: 'No. Telp' },
                    { data: 'total', title: 'Total' },
                    { data: 'category', title: 'Kategori' },
                    { data: 'link2', title: 'Action' },
                    
                ],
                "initComplete": function(settings, json) {
                    $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...');
                    initializeSelect2();
                }
            });
            window.dataTableInstance = table;
              //initialize select2 category
            function initializeSelect2() {
                

                //proses mengirim memilih kategory
                $('.select_select_category').on('change', function() {
                    var selectedValue = $(this).val();
                    var idCommercial = $(this).data('id_commercial');
                    var $currentRow = $(this).closest('tr');
                    $('#reload-icon').show(); //icon reload ditampilkan
                
                    if (selectedValue) {
                        $.ajax({
                            url: '{{ route('admin.pembelian_selectcategory_comercial_invoice') }}',
                            method: 'GET',
                            data: {
                                selected_value: selectedValue,
                                id_commercial: idCommercial
                            },
                            success: function(response) {
                                console.log('response', response);
                                $('#reload-icon').hide();
                                $currentRow.remove();

                                // Show success alert
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.msg,
                                    confirmButtonText: 'OK'
                                });
                            },
                            error: function(error) {
                                console.log('response', response);
                                console.error('Error:', error);

                                // Show error alert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong! Please try again.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }

                });
            }
            tableInitialized = true;
            // initialize Select2 setelah tiap membuat datatable (e.g., page change)
            table.on('draw', function() {
                initializeSelect2();
                var previousPage = 0;

                    // Menggunakan event draw untuk mendeteksi perubahan halaman
                    table.on('draw', function() {
                    var currentPage = table.page.info().page;

                 

                    // Cek apakah halaman sebelumnya sama dengan halaman sekarang
                    if (currentPage === previousPage) {
                        // location.reload(); // Reload halaman jika berada di halaman yang sama
                    }

                    // Update halaman sebelumnya
                    previousPage = currentPage;
                });
            });
        }
        //aksi tambah comercial local/lcl
        $('#tambahComercialQuestion').on('click', function() {
            $('#comercialQuestionModal').modal('show'); // Show the Bootstrap modal
        })
        
        //view untuk menampikan add lcl/local
        $('#tambahComercialLclLocal').on('click', function() {
            $('#comercialQuestionModal').modal('hide'); // Show the Bootstrap modal
            $('#comercialQuestionPickModal').modal('show'); // Show the Bootstrap modal
            
            // $('#tambahComercialQuestion').hide(); 
            
        });
        //add invoice with import
        $('#tambahComercialLclLocalPick').on('click', function() {
                        $('.sendSaveImport').show();
                        $('.div-bebas').css('display','none')
                        $('#tambahComercialQuestion').hide()
                        history.pushState({ page: 'addcomercialinvoicelcllocal' }, 'Add Commercial Invoice Lcl/Local', '{{ route('admin.pembelian_comercial_invoice_add') }}');
                        getData();
        });
        // //add invoice no import
        $('#no-import').on('click',function(){
                        console.log('masuk block no import')
                        $('.select_supplier_label').css('display','none')
                        $('#select_supplier').show()
                        $('.sendSave').show();
                        $('#importData').hide()
                        $('#tambahComercialQuestion').hide()
                        history.pushState({ page: 'addcomercialinvoicelcllocalnoimport' }, 'Add Commercial Invoice Lcl/Local', '{{ route('admin.pembelian_comercial_invoice_add_no_import') }}');
                        getData();
        })
        
        function getData(){
            
            $('#comercialQuestionPickModal').modal('hide'); // Show the Bootstrap modal
            $('#pembayaran-tab').on('click', function() {
                  
                $('.tab-content').hide();
                $('#pembayaran-content').show();
                
            });

            $('#ekspedisi-tab').on('click', function() {
                                    $('#tambah_matauang_ekspedisi').select2({
                                                placeholder: "Pilih Mata Uang", // Optional placeholder
                                                allowClear: true, // Optional, to allow clearing the selection
                                                width: 'resolve' 
                                    });

                                    $('#rute').select2({
                                                placeholder: "Pilih Rute", // Optional placeholder
                                                allowClear: true, // Optional, to allow clearing the selection
                                                width: '100%',
                                                height: '100%' 
                                    });
                                  
                                    $('#ekspedisi').select2({
                                                placeholder: "Pilih ekspedisi", // Optional placeholder
                                                allowClear: true, // Optional, to allow clearing the selection
                                                width: '100%',
                                                height: '100%' 
                                    });
                                 
                        console.log('masuk ekspedisi')        
                       
                        $('#addcomerialinvoicelocal').css('display','none')
                        $('#ekspedisi-content').show();
                        // var pembelianLcl = response.msg.pembelianlcl
                        $.ajax({
                            url:'{{ route('admin.pembelian_lcl') }}',
                            type:'GET',
                            data:{
                                menu:'select_ekspedisi',
                            },
                            success: function(response){
                                var tambah_tbody_container_ekspedisi = $('.tambah-tbody-container-ekspedisi')
                                var ekspedisi_row_tambah = [];
                                var array_kode=[]
                                var array_tgl=[]
                                var array_rute=[]
                                var array_nama=[]
                                var array_resi=[]
                                var array_price=[]
                                var array_keterangan=[]
                                var array_matauang=[]
                                
                                var $select_ekspedisi = $('#ekspedisi');
                                var $edit_ekspedisi_lcl = $('#edit_ekspedisi_lcl');
                             
                                response.msg.select_ekspedisi.forEach(function(ekspedisi){
                                    
                                    $select_ekspedisi.append('<option value="' + ekspedisi.id + '">' + ekspedisi.name + '</option>');
                                    $edit_ekspedisi_lcl.append('<option value="' + ekspedisi.id + '">' + ekspedisi.name + '</option>');
                                    
                                })
                                
                                var $tambah_matauang_ekspedisi=$('#tambah_matauang_ekspedisi')
                                var $edit_matauang_ekspedisi = $('#edit_matauang_ekspedisi')
                                response.msg.matauang.forEach(function(matauang){
                                    $tambah_matauang_ekspedisi.append('<option value="'+matauang.id+'">'+'( '+matauang.simbol+' )'+ ' '+matauang.kode+' - '+matauang.name+'</option>')
                                    $edit_matauang_ekspedisi.append('<option value="'+matauang.id+'">'+'( '+matauang.simbol+' )'+ ' '+matauang.kode+' - '+matauang.name+'</option>')
                                })
                              

                                $('#tambah-ekspedisi').on('click',function(){
                                    

                                    var tambah_tgl_ekspedisi = $('.tambah_tgl_ekspedisi').val();
                                    var tambah_ekspedisi = $('.tambah_ekspedisi').val();
                                    var tambah_keterangan = $('.tambah_keterangan').val();
                                    var tambah_rute = $('.tambah_rute').val();
                                    var tambah_matauang_ekspedisi = $('.tambah_matauang_ekspedisi').val();
                                    var tambah_biaya_ekspedisi = $('.tambah_biaya_ekspedisi').val();
                                    var tambah_resi_ekspedisi = $('.tambah_resi_ekspedisi').val();
                                    
                            

                                    $.ajax({
                                        type:'GET',
                                        url:'{{ route('admin.pembelian_lcl') }}',
                                        data:{
                                            menu:'tambah_ekspedisi',
                                            tambah_tgl_ekspedisi:tambah_tgl_ekspedisi,
                                            tambah_ekspedisi:tambah_ekspedisi,
                                            tambah_keterangan:tambah_keterangan,
                                            tambah_rute:tambah_rute,
                                            tambah_matauang_ekspedisi:tambah_matauang_ekspedisi,
                                            tambah_biaya_ekspedisi:tambah_biaya_ekspedisi,
                                            tambah_resi_ekspedisi:tambah_resi_ekspedisi
                                        },
                                        success: function(response){
                                        
                                            array_tgl.push(response.tgl_kirim);
                                            array_kode.push(response.kodepengiriman);
                                            array_rute.push(response.rute);
                                            array_nama.push(response.ekspedisi);
                                            array_resi.push(response.resi);
                                            array_price.push(response.price);
                                            array_keterangan.push(response.keterangan);
                                            array_matauang.push(response.matauang);
                                            console.log('res',response)
                                            tambah_tbody_container_ekspedisi.empty()
                                        
                                            // Menambahkan data ke dalam array
                                            ekspedisi_row_tambah.push(response);
                                                    console.log('ekspedisi_row_tambah',ekspedisi_row_tambah)
                                                    ekspedisi_row_tambah.forEach(function(response, newIndex) {
                                                        
                                                        var bulan = [
                                                            "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                                                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                                        ];
                                                        var tgl_kirim_tambah_ekspedisi = new Date(response.tgl_kirim)
                                                        // Format the date as 'dd Month yyyy'
                                                        var formattedDate = ('0' + tgl_kirim_tambah_ekspedisi.getDate()).slice(-2) + ' ' + 
                                                                            bulan[tgl_kirim_tambah_ekspedisi.getMonth()] + ' ' + 
                                                                            tgl_kirim_tambah_ekspedisi.getFullYear();
                                                        var trtambah = $('<tr>')
                                            
                                                        var td1ProductTambah = $('<td>',{
                                                                id:'tgl_ekspedisi_tambah-'+newIndex
                                                        }).css({
                                                                'padding': 'auto',
                                                                'width': '10%', 
                                                        }).text(formattedDate)
                                                    
                                                        
                                                        var td2ProductTambah = $('<td>', {
                                                            id: 'kode_ekspedisi_tambah-'+newIndex
                                                        }).css({
                                                            'padding': 'auto',
                                                            'width': '10%', 
                                                        }).text(response.kodepengiriman)
                                            

                                                        var td3ProductTambah = $('<td>',{
                                                                id:'rute_ekspedisi_tambah-'+newIndex
                                                        }).css({
                                                                'padding': 'auto',
                                                                'width': '10%', 
                                                            }).text(response.rute)
                                                    
                                                        
                                                        var td4ProductTambah = $('<td>',{
                                                                id:'nama_ekspedisi_tambah-'+newIndex
                                                        }).css({
                                                                'padding': 'auto',
                                                                'width': '10%', 
                                                        }).text(response.ekspedisi_name)
                                                        
                                            

                                                        
                                                    
                                                        
                                                        var td5ProductTambah = $('<td>',{
                                                            id:'resi_ekspedisi_tambah-'+newIndex
                                                        }).css({
                                                            'padding': 'auto',
                                                            'width': '10%', 
                                                        }).text(response.resi)
                                                        
                                                        var td6ProductTambah = $('<td>',{
                                                            id:'price_ekspedisi_tambah-'+newIndex
                                                        }).css({
                                                            'padding': 'auto',
                                                            'width': '10%', 
                                                        }).text(response.matauang_simbol+' '+response.price)

                                                        var td7ProductTambah = $('<td>',{
                                                            id:'keterangan_tambah-'+newIndex
                                                        }).css({
                                                            'padding': 'auto',
                                                            'width': '10%', 
                                                        }).text(response.keterangan)
                                                        var td8ProductTambah = $('<td>').css({
                                                            'padding': 'auto',
                                                            'width': '10%', 
                                                        })
                                                        
                                                        var editButton = $('<button>', {
                                                            class: 'btn btn-sm btn-primary',
                                                            click: function() {
                                                                var getIndex = $(this).closest('tr').index(); // Ambil indeks baris
                                                                $('#editModalEksepedisiLcl').modal('show');
                                                                var currentIndex=0
                                                                var curIndex=0;
                                                                if (array_keterangan.length > 0 && array_keterangan.length !=ekspedisi_row_tambah.length) {
                                                                    currentIndex = (array_keterangan.length - (newIndex + 1)) + getIndex;
                                                                    curIndex=getIndex
                                                                    console.log('Current Index length:', currentIndex);
                                                                    console.log('curIndex length:', curIndex);
                                                                } else {
                                                                    currentIndex =newIndex
                                                                    curIndex=getIndex
                                                                    console.log('Current Index:', currentIndex);
                                                                }
                                                                console.log('array_kode',array_kode)                                       
                                                                $('.edit_kode_ekspedisi_lcl').val(array_kode[curIndex]);
                                                                $('.edit_tgl_kirim_ekspedisi').val(array_tgl[curIndex]);
                                                                $('.edit_matauang_ekspedisi').val(array_matauang[curIndex]).trigger('change');
                                                                $('.edit_biaya_ekspedisi_lcl').val(array_price[curIndex]);
                                                                $('.rute_ekspedisi').val(array_rute[curIndex]).trigger('change');
                                                                $('.edit_ekspedisi_lcl').val(array_nama[curIndex]).trigger('change');
                                                                $('#editModalEksepedisiLcl').on('shown.bs.modal', function () {

                                                                    const editRuteEkspedisi = new Choices('#rute_ekspedisi', {
                                                                        searchEnabled: true,  // Enable search
                                                                        removeItemButton: true,  // Allow clearing the selection
                                                                        shouldSort: false,  // Keep the order of the options
                                                                        itemSelectText: '',  // Text for selecting items (empty if you don't want text)
                                                                    });
                                                                    editRuteEkspedisi.setChoiceByValue(array_rute[getIndex]);
                                                                    const editMatauangEkspedisi = new Choices('#edit_matauang_ekspedisi', {
                                                                        searchEnabled: true,  // Enable search
                                                                        removeItemButton: true,  // Allow clearing the selection
                                                                        shouldSort: false,  // Keep the order of the options
                                                                        itemSelectText: '',  // Text for selecting items (empty if you don't want text)
                                                                    });
                                                                    editMatauangEkspedisi.setChoiceByValue(array_matauang[getIndex]);
                                                                    const editEkspedisi = new Choices('#edit_ekspedisi_lcl', {
                                                                        searchEnabled: true,  // Enable search
                                                                        removeItemButton: true,  // Allow clearing the selection
                                                                        shouldSort: false,  // Keep the order of the options
                                                                        itemSelectText: '',  // Text for selecting items (empty if you don't want text)
                                                                    });
                                                                    editEkspedisi.setChoiceByValue(array_nama[getIndex]);
                                                                })
                                                                $('.edit_no_resi').val(array_resi[curIndex]);
                                                                $('.edit_keterangan').val(array_keterangan[curIndex]);

                                                                
                                                                // Simpan index untuk update nanti
                                                                $('#update_ekspedisi').data('index', currentIndex);
                                                                $('#update_ekspedisi').data('curIndex', curIndex);
                                                            }
                                                        }).append($('<i>',{ class: 'fas fa-edit'}))
                                                        .attr('title','Edit')
                                                        ;

                                                        
                                                        td8ProductTambah.append(editButton);

                                                        $('#update_ekspedisi').on('click',function(){
                                                                
                                                                
                                                                var kode_ekspedisi = $('.edit_kode_ekspedisi_lcl').val()
                                                                var tgl_ekspedisi = $('.edit_tgl_kirim_ekspedisi').val()
                                                                var matauang_update = $('.edit_matauang_ekspedisi').val()
                                                                var price_update = $('.edit_biaya_ekspedisi_lcl').val()
                                                                var rute_update = $('.edit_rute_ekspedisi').val()
                                                                var ekspedisi_update = $('.edit_ekspedisi_lcl').val()
                                                                var resi_update = $('.edit_no_resi').val()
                                                                var keterangan_update = $('.edit_keterangan').val()
                                                                
                                                            
                                                                var formUpdateEkspedisi ={
                                                                    menu:'update_ekspedisi',
                                                                    kodepengiriman_update:kode_ekspedisi,
                                                                    tgl_kirim_update:tgl_ekspedisi,
                                                                    matauang_update:matauang_update,
                                                                    price_update:price_update,
                                                                    rute_update:rute_update,
                                                                    ekspedisi_update:ekspedisi_update,
                                                                    resi_update:resi_update,
                                                                    keterangan_update:keterangan_update,
                                                                    
                                                                }
                                                                console.log(formUpdateEkspedisi)
                                                                var currentIndex = $(this).data('index');
                                                                var curIndex = $(this).data('curIndex');
                                                                console.log('currentIndex',currentIndex)
                                                                console.log('curIndex',curIndex)
                                                                $.ajax({
                                                            
                                                                    type: 'GET',
                                                                    url: '{{ route('admin.pembelian_lcl') }}',
                                                                    data: formUpdateEkspedisi,
                                                                    success: function(response) {
                                                                        console.log('res update tambah',response)

                                                                        var tglKirim_ekspedisi_edit = new Date(response.tgl_kirim); // Assuming result.tgl_kirim is in a parseable format

                                                                        // Array of month names in Indonesian
                                                                        var bulan_ekspedisi_edit = [
                                                                            "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                                                                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                                                        ];

                                                                        // Format the date as 'dd Month yyyy'
                                                                        var formattedDateEkspedisiEdit = ('0' + tglKirim_ekspedisi_edit.getDate()).slice(-2) + ' ' + 
                                                                                            bulan_ekspedisi_edit[tglKirim_ekspedisi_edit.getMonth()] + ' ' + 
                                                                                            tglKirim_ekspedisi_edit.getFullYear();
                                                                        $('#kode_ekspedisi_tambah-' + curIndex).text(response.kodepengiriman);
                                                                        $('#tgl_ekspedisi_tambah-' + curIndex).text(formattedDateEkspedisiEdit);
                                                                        $('#rute_ekspedisi_tambah-' + curIndex).text(response.rute);
                                                                        $('#nama_ekspedisi_tambah-' + curIndex).text(response.ekspedisi_name);
                                                                        $('#resi_ekspedisi_tambah-' + curIndex).text(response.resi);
                                                                        $('#price_ekspedisi_tambah-' + curIndex).text(response.matauang_simbol+' '+response.price);
                                                                        $('#keterangan_tambah-'+curIndex).text(response.keterangan);
                                                                        
                                                                        //menginisiasi nilai yang telah diupdate
                                                                        array_kode[currentIndex] = response.kodepengiriman
                                                                        array_tgl[currentIndex] = response.tgl_kirim
                                                                        array_nama[currentIndex] = response.ekspedisi
                                                                        array_keterangan[currentIndex]= response.keterangan
                                                                        array_resi[currentIndex]=response.resi
                                                                        array_price[currentIndex]= response.price
                                                                        array_rute[currentIndex]= response.rute
                                                                        array_matauang[currentIndex]=response.matauang

                                                                        $('#editModalEksepedisiLcl').modal('hide');
                                                                    }


                                                                })
                                                        
                                                                
                                                            })
                                                        trtambah.append(td1ProductTambah,td2ProductTambah,td3ProductTambah,td4ProductTambah,td5ProductTambah,td6ProductTambah,td7ProductTambah,td8ProductTambah)
                                                        tambah_tbody_container_ekspedisi.append(trtambah)
                                                    })

                                        }
                                    });

                                    

                                })
                                
                                // untuk menyimpan ekspedisi
                                $('#simpan-ekspedisi').on('click',function(){
                                        // console.log(id_lcl)
                                        $.ajax({
                                            type:'GET',
                                            url: '{{route('admin.pembelian_lcl') }}',
                                            data: {
                                                menu:'save_ekspedisi',
                                                id_lcl:id_lcl,
                                                kode:array_kode,
                                                tgl:array_tgl,
                                                rute:array_rute,
                                                nama:array_nama,
                                                resi:array_resi,
                                                price:array_price,
                                                keterangan:array_keterangan,
                                                matauang:array_matauang,
                                                
                                            },
                                            success: function(response) {
                                                console.log(response)
                                                Swal.fire({
                                                icon:'success',
                                                title:'Success',
                                                text:response.msg
                                                }).then((result)=>{
                                                if(result.isConfirmed){
                                                    window.location.reload();
                                                }
                                                });
                                            },
                                        });

                                })

                            },
                        })
            });

            $('#master-tab').on('click', function() {
                
                $('.tab-content').hide();
                // $('#master-content').show();
                $('#addcomerialinvoicelocal').css('display','block')
            
            });

         
            // Destroy the existing DataTable instance
            table.destroy();
            
            $('#tabe-stok').remove();
            $('.radio-button-container').remove()
            $('.filter').remove()
            $('#tambahComercialLclLocal').remove()
            $('#tab-nav').show();
            $('#master-tab').trigger('click'); 
            $('.btn-back').show();
            $('#judulRestok').html('<i class="fas fa-database"></i> &nbsp Add Commercial Invoice Kategori LCL/Local');
            $('#subjudul').html('Add Commercial Invoice Kategori LCL/Local {{ $username["data"]["teknisi"]["name"] }}');
            $('#judulRestok').css('display', 'block');
            $('#comercialQuestionPickModal').modal('hide'); // Show the Bootstrap modal
            $('#addcomerialinvoicelocal').css('display','block')
            document.title='Add Commercial Invoice Lcl/Local   | PT. Maxipro Group Indonesia'
            
            $.ajax({
                url:'{{ route('admin.pembelian_comercial_invoice') }}',
                type:'GET',
                data:{
                    menu:'create_local'
                },
                success: function(response){
                    
                        
                    
                   
                    // const selectSupplier = $('#select_supplier');
                    // selectSupplier.empty();

                    // // Tambahkan opsi default
                    // selectSupplier.append('<option value="">Pilih Supplier</option>');

                    // // Loop melalui response.msg.new_supplier dan tambahkan opsi ke select
                    // response.msg.new_supplier.forEach(function(supplier) {
                    //     selectSupplier.append(
                    //         `<option value="${supplier.id}">${supplier.name}</option>`
                    //     );
                    // });
                    
  
                    // selectSupplier.on('change', function(event) {
                    //     const selectedValueSupplier = event.target.value;
                    //     const inputElementSelectedSupplier = document.getElementById('select_supplier'); // Ganti dengan ID yang sesuai
                    //     if (inputElementSelectedSupplier) {
                    //         inputElementSelectedSupplier.value = selectedValueSupplier;
                    //         console.log('selected_value',selectedValueSupplier)
                    //     }
                    //     $.ajax({
                    //         type:'GET',
                    //         url:'{{ route('admin.pembelian_fcl') }}',
                    //         data:{
                    //             menu:'select_supplier',
                    //             select_id_supplier:selectedValueSupplier
                    //         },
                    //         success: function(response){
                    //             console.log('response', response.filtered_supplier);
                    //             for (const key in response.filtered_supplier) { 
                    
                    //                     const supplier = response.filtered_supplier[key];
                                        
                    //                     if (supplier) {
                    //                        console.log('supplier address',supplier)
                    //                         $('#company-name').val(supplier.company)
                    //                         $('#address_company').val(supplier.address);
                    //                         $('#city').val(supplier.city);
                    //                         $('#telp').val(supplier.telp);
                    //                     }
                    //                      else {
                    //                         // console.log(`Address not found for key ${key}`);
                    //                         $('#company-name').val('')
                    //                         $('#address_company').val('');
                    //                         $('#city').val('');
                    //                         $('#telp').val('');
                    //                     }
                                    
                    //             }
                    //         },
                    //     })
                    // })

                    // // Inisialisasi Choices.js
                    // const choices_supplier = new Choices(selectSupplier[0], {
                    //     placeholderValue: 'Pilih Supplier',
                    //     searchEnabled: true,
                    //     removeItemButton: true,
                    //     shouldSort: false,
                    // });

                    //inisiasi Choices.js matauang
                    // const choices_matauang = new Choices($('.pilih-matauang')[0], {
                    
                    //     itemSelectText: '',   // Removes "Press to select" text
                    //     shouldSort: false     // Keeps the original order of options
                    // });

                    // const choices_kategori = new Choices($('#kategori_local')[0], {
                    
                    //     itemSelectText: '',   // Removes "Press to select" text
                    //     shouldSort: false     // Keeps the original order of options
                    // });
                    
                    // const select_termin_rekening = $('#select_termin_rekening');
                    // select_termin_rekening.empty();

    
                    // response.msg.account.forEach(function(rekening) {
                    //     select_termin_rekening.append(
                    //         `<option value="${rekening.id}">${rekening.name}</option>`
                    //     );
                    // });

                    // // Inisialisasi Choices.js
                    // const choices_rekening = new Choices(select_termin_rekening[0], {                   
                    //     searchEnabled: true,
                    //     removeItemButton: true,
                    //     shouldSort: false,
                    // });

                    // const select_termin_cash = $('#select_termin_cash');
                    // select_termin_cash.empty();

    
                    // response.msg.termin.forEach(function(termin) {
                    //     select_termin_cash.append(
                    //         `<option value="${termin.id}">${termin.name}</option>`
                    //     );
                    // });

                    // Inisialisasi Choices.js
                    // const choices_termin = new Choices(select_termin_cash[0], {                   
                    //     searchEnabled: true,
                    //     removeItemButton: true,
                    //     shouldSort: false,
                    // });

                    const select_termin_rekening = $('#select_termin_rekening');
                    select_termin_rekening.empty();

                    // Append options from response
                    response.msg.account.forEach(function(rekening) {
                        select_termin_rekening.append(
                            `<option value="${rekening.id}">${rekening.name}</option>`
                        );
                    });

                    // Initialize Select2
                    select_termin_rekening.select2({
                        placeholder: "Pilih Rekening",
                        allowClear: true,
                        width: '100%', // Ensure it takes up the full width
                        minimumResultsForSearch: Infinity // Enables the search only if there are enough items
                    });

                    $('#select_incoterms').select2({
                        placeholder: "Pilih Incoterms",
                        allowClear: true,
                        width: '100%', // Ensure it takes up the full width
                        minimumResultsForSearch: Infinity // Enables the search only if there are enough items
                    });
                
                    const item_barang = $('.item-barang');
                    item_barang.empty();

                    item_barang.append('<option value="">Pilih Item</option>');
                        response.msg.product.forEach(function(product) {
                            item_barang.append(
                                `<option value="${product.id}">${product.name}</option>`
                            );
                        });

                        // Inisialisasi Choices.js
                        const choices_item_barang = new Choices(item_barang[0], {                   
                            searchEnabled: true,
                            removeItemButton: true,
                            shouldSort: false,
                        });
                
                        const pilih_cabang = $('.pilih-cabang');
                        pilih_cabang.empty();

        
                        response.msg.cabang.forEach(function(cabang) {
                            pilih_cabang.append(
                                `<option value="${cabang.id}">${cabang.name}</option>`
                            );
                        });

                        // Inisialisasi Choices.js
                        const choices_pilih_cabang = new Choices(pilih_cabang[0], {                   
                            searchEnabled: true,
                            removeItemButton: true,
                            shouldSort: false,
                        });

                    // pilih-cabang

                },
            });

   
                var clickConvert = false;
                var selectBarang =[];
                var selectBarangId =[];
                var statusConvertRupiah = 0;
                var tdHargaBelumPpnProduct;
                var inputtdHargaBelumPpnProduct;
                var nominalHargaInvoice;
                var category_convert;
                var convert_nominal_after_save;
                var checkboxElementProduct;
                var checkboxElement;
                //element td dan input harga belum ppn
                var td2Product
                var inputtd2Product

                
                //element td dan input qty
                var td3Product
                var inputtd3Product 
                

                //element input discount
                var inputtd4Product

                // element td harga subtotal
                var td5Product
                
                //element input harga subtotal
                var inputtd5Product
                // var price_asal =[];
                var ppnitemList =[];
                var ppnitemList2;
                var mata_uang_disabled = false;
                var changeHistory = [];
                var changeHistory_arr = [];
                var qty_arr=[]; 
                var qty_arr_select=[]; // untuk array qty select barang
                var harga_asal=[]
                var harga_asal_select=[]
                
                var discount_arr=[]
                var discount_arr_select=[]
                var subtot_arr=[]
                var subtot_arr_select = []
                var selectedValuesArray = []; // Empty array for selected values
                var selectedValuesArray_arr = []; // Empty array for selected values
                var boolSendImportBarang=false;
                var iditem_arr =[]
                var iditem_select =[]
                var price_invoice_arr =[]
                var price_invoice_select =[]
                var subtot_arr_select_global=[]
                var length_m=[]
                var length_p=[]
                var width_m=[]
                var width_p=[]
                var height_m=[]
                var height_p=[]
                var brand_name=[]
                var model_name=[]
                var china_name=[]
                var english_name=[]
                var nett_weight=[]
                var gross_weight_name=[]
                var cbm_name =[]
                var hs_code_name=[]
                var editClick=false;
                var contentImport = $('.container-import2');
                
                var newBoolHargaBelumPpn = false;
                
                var nominal_convert;
                
                var isHeaderCreated =false;
                
                var allIndexSelectBarang = [];
                var td_ppn_select =[];
                var product_product=[];
                var valueDiscount
                var laststokRestok;
                var jmlPermintaanRestok;
                var idTeknisiRestok;
                var keteranganRestok ;
                var idBarangRestok ;
                var idSupplierRestok;
                var restok_id=[];
            
            // menampilkan data ketika memilih item di noimport
            document.getElementById('select_barang').addEventListener('change',function(){
                var pilihBarang = this.value
                
                contentImport.empty()
                
                //untuk inisiasi overlay loading dengan ajax
                $('body').append(`
                    <div id="ajaxPanel" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index:1050;">
                        <div style="color:#fff; font-size:20px; text-align:center; padding-top:20%;">
                            <i class="fas fa-spinner fa-spin"></i> Loading, please wait...
                        </div>
                    </div>
                `);

                //untuk mengambil response dari pembelian lcl
                $.ajax({
                        url:"{{ route('admin.pembelian_lcl') }}",
                        method:'GET',
                        data:{
                            menu:'select_item',
                            id:pilihBarang
                        },
                        beforeSend: function() {
                            //menampilkan icon spinner loading
                            $('#ajaxPanel').show();
                        },
                        success: function(response){
                           
                            console.log('res',response)
                              // Update overlay pesan success dan icon
                            if(response){
                                $('#ajaxPanel').html('<div style="color:#fff; font-size:20px; text-align:center; padding-top:20%;"><i class="fas fa-check"></i> Success!</div>');
                                                    
                                // menghilangkan overlay
                                setTimeout(function(){
                                    $('#ajaxPanel').fadeOut();
                                }, 0); 
                            }
                            selectedValuesArray = []
                            harga_asal2=[]
                            changeHistory = []
                            discount_arr_select=[]
                            
                            qty_arr_select=[]
                        
                            subtot_arr_select=[]
                            iditem_select=[]
                            product_product.push(response);
                            selectBarang.push(response.product[0].name);
                            selectBarangId.push(response.product[0].id)

                            
                        
                            var index_select_barang = selectBarangId.indexOf(response.product[0].id);
                            allIndexSelectBarang.push(index_select_barang);
                            product_product.forEach((item, itemIndex) => {
                                
                                // Check if product array exists and is not empty
                                if (item.product && item.product.length > 0) {

                                    // Iterate over each product in the product array
                                    item.product.forEach((productItem, productIndex) => {
                                    console.log('productItem',productItem)        
                                    length_m.push(productItem.long)
                                    width_m.push(productItem.width)
                                    height_m.push(productItem.height)
                                    length_p.push(productItem.long_p)
                                    width_p.push(productItem.width_p)
                                    height_p.push(productItem.height_p)
                                    brand_name.push(productItem.merk)
                                    model_name.push(productItem.model)
                                    china_name.push(productItem.name_china)
                                    english_name.push(productItem.name_english)
                                    nett_weight.push(productItem.nett_weight)
                                    gross_weight_name.push(productItem.weight)
                                    cbm_name.push(productItem.cbm)
                                    var trProduct = $('<tr>');
                                    var tdProduct = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '10%'
                                    });
                                    iditem_select[itemIndex] = productItem.id;
                                    
                                    var imgProduct = $('<img class="img-fluid" style="max-width: 20%%; height: auto;">');
                                    imgProduct.attr('src',response.directory+productItem.image)
                                    tdProduct.append(imgProduct);
                                    var td1Product = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '25%',  
                                    });
                                    var inputtd1Product = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:productItem.name,
                                            id:'name'+itemIndex
                                    });
                                    inputtd1Product.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    
                                    td2Product = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '10%', 
                                    });
                                
                                    inputtd2Product = $('<input>', {
                                            type: 'number', 
                                            class: 'form-control',
                                            id:'price_asal'+itemIndex,
                                            value: productItem.price_list 
                                    }).css({
                                        'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                                            
                                    nominalHargaInvoice =productItem.price_list 
                            
                                    tdHargaBelumPpnProduct = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '10%', 
                                            'display': 'none'
                                    });
                                    
                                    inputtdHargaBelumPpnProduct = $('<input>', {
                                            type: 'number', 
                                            class: 'form-control',
                                            value: '',
                                            id:'harga_belumppn_convert'+itemIndex,
                                            disabled:'true'
                                    });
                                    inputtdHargaBelumPpnProduct.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    tdHargaBelumPpnProduct.append(inputtdHargaBelumPpnProduct)
                                
                                    //row quantity
                                    td3Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '7%',  
                                    });
                                    
                                
                            
                                    inputtd3Product = $('<input>', {
                                            type: 'number', 
                                            class: 'form-control',
                                            value: 1,
                                            id: 'qty_qty'+itemIndex
                                    }).css({
                                        'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    
                                    
                                
                                    var td4Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '7%',  
                                    });
                                    //row input disc
                                    inputtd4Product = $('<input>', {
                                            type: 'number', 
                                            class: 'form-control', 
                                            value: 0,
                                            id: 'discount'+itemIndex
                                    });
                                    inputtd4Product.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px', 
                                            'width': '100%' 
                                    });
                                
                                    td5Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '10%',  
                                    });
                                    inputtd5Product = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value: productItem.price_list ,
                                            id:'subtotal'+itemIndex
                                    });
                                    inputtd5Product.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px', 
                                            'width': '100%' 
                                    });
                                    var tdHsProduct = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '7%',  
                                    });
                                    
                                    inputtdHsProduct = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            id: 'hs_code'+itemIndex
                                    });
                                    inputtdHsProduct.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    inputtdHsProduct.on('input', updateHscode);
                                    function updateHscode(){
                                       var inputHSCode = $(`#hs_code${itemIndex}`);
                                       hs_code_name[itemIndex] = inputHSCode.val()
                                    //    console.log('hscode',hs_code_name)
                                    }
                                    hs_code_name.push(inputtdHsProduct.val() ?? '')
                                    if(clickConvert==true){
                                        tdHargaBelumPpnProduct.css({
                                            'display': 'table-cell'
                                        });
                                        inputtdHargaBelumPpnProduct.css({
                                            'opacity': 1,
                                                'visibility': 'visible'
                                            });
                                            // Calculate the value based on the item index
                                            var productPrice = productItem.price_list; // Adjust to get price based on index
                                            var calculatedValue = nominal_convert * productPrice;
                                            // console.log('masuj',calculatedValue);
                                            
                                        // Update the value of the input field
                                        inputtdHargaBelumPpnProduct.val(calculatedValue);
                                        inputtd5Product.val(calculatedValue*(inputtd3Product.val()))
                                    }

                                    var inputField = $(`#price_asal${itemIndex}`);
                                    
                                    var value_belumppn = parseFloat(inputField.val()) || 0;
                        
                                                                
                                    var inputFieldqty = $(`#qty_qty${itemIndex}`);
                                    var value_qty = parseFloat(inputFieldqty.val())||1;
                                    
                                    var input_discount = $(`#discount${itemIndex}`)
                                    var value_discount = parseFloat(input_discount.val()) || 0;
                                    
                                    
                                    var input_subtot = $(`#subtotal${itemIndex}`);
                                    var value_subtot = parseFloat(input_subtot.val()) ||0;
                                    
                                
                                    function updateCalculatedValue() {
          
                                        inputField = $(`#price_asal${itemIndex}`);

                                        value_belumppn = parseFloat(inputField.val()) ||  productItem.price_list ;
                                        harga_asal_select[itemIndex] = value_belumppn; 
                                        console.log('harga_asal_select',harga_asal_select)
                                        input_discount = $(`#discount${itemIndex}`);
            
                                        value_discount = parseFloat(input_discount.val()) || 0;
                                        discount_arr_select[itemIndex]=value_discount
                                        console.log('value discount',value_discount)
                                        var value3 = value_discount

                                        var value1 = value_belumppn;
                                    
                                        inputFieldqty = $(`#qty_qty${itemIndex}`);
            
                                
                                        value_qty = parseFloat(inputFieldqty.val()) || 1;


                                        qty_arr_select[itemIndex] = value_qty;
                                        
                                
                                        harga_asal_select[itemIndex] = value_belumppn;
                                            
                                        
                                        discount_arr_select[itemIndex] = value_discount;
                                    
                                        
                                        var value2 = value_qty;

                                        // Calculate the new value
                                        var calculatedValue = (value1 * value2)-value3;
                                    
                                        
                                        // menghitung dan menyetting value harga subtotal
                                        if(clickConvert==false){
                                            console.log('tidak convert')
                                            //inisiasi value subtotal
                                            $(`#subtotal${itemIndex}`).val(calculatedValue);
                                            
                                            subtot_arr_select[itemIndex] = calculatedValue;
                                            
                                            async()
                                            
                                        }
                                        else{
                                           
                                            $(`#harga_belumppn_convert${itemIndex}`).val(nominal_convert*value1)
                                            price_invoice_select[itemIndex] =nominal_convert*value1
                                            $(`#subtotal${itemIndex}`).val(calculatedValue*nominal_convert);
                                            subtot_arr_select[itemIndex]= calculatedValue*nominal_convert
                                            async()
                                        }
                                        
                                    }
                                    updateCalculatedValue()
                                

                                    // Update calculation when values change
                                    inputtd2Product.on('input', updateCalculatedValue);
                                    inputtd3Product.on('input', updateCalculatedValue);
                                    inputtd4Product.on('input',updateCalculatedValue)
                                    td1Product.append(inputtd1Product)
                                    td2Product.append(inputtd2Product)
                                    td3Product.append(inputtd3Product)
                                    td4Product.append(inputtd4Product)
                                    td5Product.append(inputtd5Product)
                                    tdHsProduct.append(inputtdHsProduct)
                                    var td6Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '5%',  
                                    });
                                    checkboxElementProduct = $('<input>', {
                                        type: 'checkbox',
                                        id: 'checkboxId_' + itemIndex,
                                        value: 0
                                    }).css({
                                        'border': '1px solid #696868',
                                    }).on('change', function() {
                                        var newValue = this.checked ? 1 : 0;
                                        $(this).val(newValue);

                                        if(newValue==1){

                                            changeHistory[itemIndex] = newValue;
                                            console.log('change history',changeHistory)
                                            td_ppn_select[itemIndex] = 0.11 * subtot_arr_select[itemIndex];
                                            console.log('td_ppn_select',td_ppn_select)
                                        }
                                        else{
                                            td_ppn_select[itemIndex] = 0
                                        }
                                    
                                    });

                                    changeHistory[itemIndex]=0;
                                    td_ppn_select[itemIndex] =0;
                                    
                                    // Append the checkbox and label to the table cell
                                    td6Product.append(checkboxElementProduct)
                                    
                                    var td7Product = $('<td>')
                                    var selectGudang = $('<select>', {
                                        class: 'form-control choices-select-gudang', // class for styling
                                        id:'gudang'+itemIndex
                                    }).css({
                                        'border': '1px solid #696868', // Border color and style
                                        'color': 'black', // Text color
                                        'padding': '10px', // Padding inside the select
                                        'width': '100%', // Full width of the container
                                        
                                    });
                                    // console.log('responseGudang',response.gudang)
                                    var defaultOption = $('<option>', {
                                        value: '',
                                        text: 'Pilih Gudang' // Default text
                                    }).attr('disabled', 'disabled').attr('selected', 'selected'); // Disabled and selected
                                    selectGudang.append(defaultOption);
                                    // Iterate over each item in gudangName to create options
                                    response.gudang.forEach(function(item,index) {
                                        var optionElement = $('<option>', {
                                            // text: item, // Use id as the value
                                            
                                            value: item.id,
                                            text: item.name

                                        });
                                        selectGudang.append(optionElement);
                                    });
                                    selectGudang.on('change', function() {


                                        // Loop through all selected options
                                        if(selectedValuesArray.length <itemIndex){

                                            $(this).find('option:selected').each(function(index, option) {
                                                selectedValuesArray.push($(option).val());
                                            });
                                        }else{
                                            $(this).find('option:selected').each(function(index, option) {
                                                
                                                selectedValuesArray[itemIndex] =$(option).val();
                                            });
                                        }
                                        
                                        
                                    });
                                    
                                    var td8Product = $('<td>')
                                
                                    var deleteButton = $('<button>',{
                                        text: 'X',
                                        class: 'btn btn-danger btn-sm'
                                    }).css({
                                        'border': 'none',
                                        'color':'white',
                                        'background-color': '#dc3545',
                                        'padding': '5px 10px',
                                        'cursor': 'pointer'
                                    }).on('click',function(){
                                        $(this).closest('tr').remove();
                                    })
                                    td8Product.append(deleteButton);
                                    // Append the select element to the table cell
                                    td7Product.append(selectGudang);
                                
                                    
                                    trProduct.append(tdProduct,td1Product,td2Product,tdHargaBelumPpnProduct,td3Product,td4Product,td5Product,tdHsProduct,td6Product,td7Product,td8Product)
                                    contentImport.append(trProduct)


                                    });
                                }
                            });

                            document.querySelectorAll('.choices-select-gudang').forEach(function(selectElement) {
                                    new Choices(selectElement, {
                                        searchEnabled: true,
                                        removeItemButton: true,
                                        itemSelectText: 'Select an option'
                                    });
                            });

                            var discountValue = 1; // Default value
                        
                            var valueDiscount = 1; // Nilai diskon yang diambil dari handlediscountValue
                            var valueNominalDiscount=0;
                            var nominaldiscountValue=0;

                            $('#discount_percent').on('change', function() {
                                discountValue = (100 - $(this).val()) / 100;
                                handlediscountValue(discountValue);
                                console.log('valueDiscount',valueDiscount)
                                // Setelah mengubah nilai discountValue, panggil async untuk menghitung ulang total
                                async();
                            });

                            $('#discount_nominal').on('change',function(){
                                nominaldiscountValue=$(this).val()
                                handlenominaldiscount(nominaldiscountValue)
                                async()
                            })

                            function handlediscountValue(discountValue) {
                                valueDiscount = discountValue;
                               
                            }
                            
                            function handlenominaldiscount(nominaldiscountValue){
                                valueNominalDiscount=nominaldiscountValue
                            }

                            function async() {
                                var val = 0;
                                var val_select = 0;
                                var ppnValue = 0;
                                
                                // Loop untuk subtotal yang dipilih
                                for (var i = 0; i < subtot_arr_select.length; i++) {
                                    var value = parseFloat(subtot_arr_select[i]) || 0; // Konversi ke angka atau anggap 0
                                    val_select += value;
                                }

                                // Loop untuk subtotal
                                for (var i = 0; i < subtot_arr.length; i++) {
                                    var value = parseFloat(subtot_arr[i]) || 0; // Konversi ke angka atau anggap 0
                                    val += value;
                                }

                       

                                // Menampilkan subtotal
                                $('.sutotal_element').text(val + val_select);
                                var subtotal_element= $('.sutotal_element').text()
                                console.log('subtotal element',subtotal_element)
                               
                                if ($('#flexCheckDefault').prop('checked')) {
                        
                                    ppnValue = (val + val_select) * 0.11;
                                    $('.ppn_element').text((ppnValue * valueDiscount).toFixed(2));
                                    $('.total_element').text(((((val + val_select) * valueDiscount) - valueNominalDiscount)+ppnValue).toFixed(2));

                                } else {
                                    valueDiscount = valueDiscount || 1;
                                    valueNominalDiscount = valueNominalDiscount || 0
                                    
                                    $('.ppn_element').text(0);
                                    $('.total_element').text((((val + val_select) * valueDiscount)-valueNominalDiscount).toFixed(2));
                                }
                            }
                           
                            $('#flexCheckDefault').on('change', function() {
                                            if ($(this).is(':checked')) {
                                                console.log('centang tambah')
                                                $(this).val(1);
                                                $(this).prop('checked', true);
                                            } else {
                                                $(this).val(0);  // Jika Anda ingin mengatur nilai saat tidak tercentang
                                                $(this).prop('checked', false);
                                            }
                                async(); // Panggil ulang calculateTotals saat checkbox berubah
                            });

                            $('#flexCheckDefaultTermasukkPPN').on('change', function() {
                                            if ($(this).is(':checked')) {
                                                console.log('centang tambah')
                                                $(this).val(1);
                                                $(this).prop('checked', true);
                                            } else {
                                                $(this).val(0);  // Jika Anda ingin mengatur nilai saat tidak tercentang
                                                $(this).prop('checked', false);
                                            }
                                
                            });

                        }
                })

                //untuk mengecek stok gudang
                $.ajax({
                        url:"{{ route('admin.pembelian_lcl') }}",
                        method:'GET',
                        data:{
                            menu:'stok_gudang',
                            id:pilihBarang
                        },
                        success: function(response){
                            console.log('res stok gudang',response)
                            if(response && Object.keys(response).length > 0 ){
                                
                                
                                
                                idBarangRestok=response.msg.restok.id_barang
                                idTeknisiRestok=response.msg.restok.id_teknisi
                                idSupplierRestok=response.msg.restok.id_supplier
                                jmlPermintaanRestok=response.msg.restok.jml_permintaan
                                laststokRestok=response.msg.restok.last_stok
                                keteranganRestok=response.msg.restok.keterangan
                           
                            }
                            else{
                                idBarangRestok=0;
                                idTeknisiRestok=0;
                                idSupplierRestok=0;
                                jmlPermintaanRestok=0
                                laststokRestok=0
                                keteranganRestok=0
                                
                            }
                        }
                })
            })
            
            //mengirim data ketika di simpan
            $('#sendSave').on('click', function(){
             
                var formDataSendRestok = {
                    tgl_request:$('#tgl_request').val(),
                    laststok:laststokRestok,
                    jml_permintaan:jmlPermintaanRestok,
                    keterangan:keteranganRestok,
                    product:idBarangRestok
                }

                console.log('formDataSendRestok',formDataSendRestok)
       
                //restok
                $.ajax({
                                        type: 'GET',
                                        url: '{{ route('admin.pembelian_restok_tambah_filter') }}', //url send data
                                        data: formDataSendRestok,
                                        success: function(response) {
                                            console.log('response',response)
                                            if (response.success) {
                                                // Retrieve the newly created restok data
                                                var newRestok = response.data.restok;
                                                // console.log('newRestok',newRestok)
                                                restok_id.push(newRestok.id)
                                                // console.log('newRestok',newRestok,restok_id)


                                                // console.log('restok_id',restok_id)
                                                var formDataSend = {
                                                    database:$('#database_tambah_id').val(),
                                                    supplier:$('.pilih-supplier').val(),
                                                    modeadmin:$('input[name="modeadmin_tambah"]').val()||"",
                                                    invoice_no:$('#invoice_no_tambah').val()||"",
                                                    packing_no:$('#packing_no_tambah').val()||"",
                                                    contract_no:$('#contract_no_tambah').val()||"",
                                                    address_company:$('#address_company').val()||"",
                                                    city:$('#city').val()||"",
                                                    name:$('#company-name').val()||"",
                                                    telp:$('#telp').val()||"",
                                                    no_referensi:$('.no-referensi').val()||"",
                                                    tgl_transaksi:$('#tgl_request').val(),
                                                    matauang:$('.pilih-matauang').val(),
                                                    keterangan:$('#text_area').val(),
                                                    kategori:$('#kategori_local').val(),
                                                    termin:$('#select_termin_cash').val(),
                                                    account_lcl:$('#select_termin_rekening').val(),
                                                    account:$('#select_termin_rekening').val(),
                                                    cabang:$('.pilih-cabang').val(),
                                                    status_ppn:$('#flexCheckDefault').val(),
                                                    include_ppn:$('#flexCheckDefaultTermasukkPPN').val(),
                                                    td_subtotal:$('.sutotal_element').text(),
                                                    discount_percent:$('#discount_percent').val(),
                                                    discount_nominal:$('#discount_nominal').val(),
                                                    ppn_11:$('.ppn_element').text(),
                                                    total:$('.total_element').text(),
                                                    id_item:iditem_select,
                                                    nama_item:selectBarang,
                                                    harga_asal:harga_asal_select,
                                                    qty:qty_arr_select,
                                                    disc:discount_arr_select,
                                                    subtotal:subtot_arr_select,
                                                    ppn:changeHistory,
                                                    td_ppn_harga:td_ppn_select,
                                                    gudang:selectedValuesArray,
                                                    restok:restok_id,
                                                    location:$('.location').val(),
                                                    length_m:length_m,
                                                    length_p:length_p,
                                                    width_m:width_m,
                                                    width_p:width_p,
                                                    height_m:height_m,
                                                    height_p:height_p,
                                                    brand:brand_name,
                                                    model:model_name,
                                                    chinese_name:china_name,
                                                    english_name:english_name,
                                                    nett_weight:nett_weight,
                                                    gross_weight:gross_weight_name,
                                                    cbm:cbm_name,
                                                    hs_code:hs_code_name ?? '',
                                                    category_comercial_invoice:$('#kategori_local').val()
                                                }
                                                console.log('formDatasend',formDataSend)
                                                // comercial invoice
                                                $.ajax({
                                                    type: 'GET',
                                                    url: '{{ route('admin.pembelian_comercial_invoice') }}',
                                                    data: {
                                                        menu:'tambah_lcl_local',
                                                        form:formDataSend
                                                    },
                                                    success: function(response) {
                                                    console.log('response succes',response)
                                                    id_lcl = response.idpembelianlcl
                                                    console.log('id_lcl',id_lcl)
                                                        Swal.fire({
                                                        icon:'success',
                                                        title:'Success',
                                                        text:response.msg+' dan '+response.msg2
                                                    }).then((result)=>{
                                                    if(result.isConfirmed){
                                                        // window.location.reload();
                                                    }
                                                    });
                                                    },error: function(xhr, status, error) {
                                                        console.log('Terjadi kesalahan:',error);
                                                    }
                                                })

                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            // Penanganan kesalahan jika terjadi
                                            console.error(error);
                                        }
                });
                

                
                
            })

            //mengirim data menggunakan import ketika di simpan
            $('#sendSaveImport').on('click', function(){
                
               
                
                                                var formDataSend = {
                                                    category_barang:category_barang,
                                                    database:$('#database_tambah_id').val(),
                                                    supplier:$('.pilih-supplier').val(),
                                                    modeadmin:$('input[name="modeadmin_tambah"]').val()||"",
                                                    invoice_no:$('#invoice_no_tambah').val()||"",
                                                    packing_no:$('#packing_no_tambah').val()||"",
                                                    contract_no:$('#contract_no_tambah').val()||"",
                                                    address_company:$('#address_company').val()||0,
                                                    city:$('#city').val()||0,
                                                    name:$('#company-name').val()||0,
                                                    telp:$('#telp').val()||0,
                                                    no_referensi:$('.no-referensi').val()||"",
                                                    tgl_transaksi:$('#tgl_request').val(),
                                                    matauang:$('.pilih-matauang').val(),
                                                    keterangan:$('#text_area').val(),
                                                    kategori:$('#kategori_local').val(),
                                                    termin:$('#select_termin_cash').val(),
                                                    account:$('#select_termin_rekening').val(),
                                                    cabang:$('.pilih-cabang').val(),
                                                    status_ppn:$('#flexCheckDefault').val(),
                                                    include_ppn:$('#flexCheckDefaultTermasukkPPN').val(),
                                                    td_subtotal:$('.sutotal_element').text(),
                                                    discount_percent:$('#discount_percent').val(),
                                                    discount_nominal:$('#discount_nominal').val(),
                                                    ppn_11:$('.ppn_element').text(),
                                                    total:$('.total_element').text(),
                                                    bank_supplier:$('#banksupplier-tambah-id').val() ||0,
                                                    id_item:iditem_select,
                                                    
                                                    harga_asal:harga_asal_select,
                                                    qty:qty_import,
                                                    disc:disc_import,
                                                    subtotal:total_import,
                                                    subtotal_usd:totalusd_import,
                                                    ppn:status_ppn_import,
                                                    td_ppn_harga:td_ppn_select,
                                                    gudang:selectedValuesArray,
                                                    restok:restok_import,
                                                    location:$('.location').val(),
                                                    incoterms:$('#select_incoterms').val(),
                                                    length_m:length_m_import,
                                                    length_p:length_p_import,
                                                    width_m:width_m_import,
                                                    width_p:width_p_import,
                                                    height_m:height_m_import,
                                                    height_p:height_p_import,
                                                    brand:brand_import,
                                                    model:model_import,
                                                    chinese_name:china_import,
                                                    english_name:english_import,
                                                    nett_weight:nw_import,
                                                    gross_weight:gw_import,
                                                    cbm:cbm_import,
                                                    hs_code:hs_import,
                                                    category_comercial_invoice:$('#kategori_local').val(),
                                                    unit_price_without_taxt:price_import,
                                                    unit_price_without_taxt_usd:priceusd_import,
                                                    gudang:gudang_import,
                                                    use_name:use_name_import,
                                                    supplierbank:$('#banksupplier-tambah-id').val() || 0,
                                                    freight_cost:freight_cost_import,
                                                    insurance:insurance_import,
                                                    
                                                    bank_name:bank_name_import,
                                                    bank_address:bank_address_import,
                                                    swift_code:swift_code_import,
                                                    account_no:account_import,
                                                    beneficiary_name:beneficiary_name_import,
                                                    beneficiary_address:beneficiary_address_import
                                                }
                                                console.log('formDatasend',formDataSend)
                                                // comercial invoice
                                                $.ajax({
                                                    type: 'GET',
                                                    // url: '{{ route('admin.pembelian_tambah_comercial_invoice_new') }}',
                                                    data: {
                                                        menu:'tambah_lcl_local',
                                                        form:formDataSend
                                                    },
                                                    success: function(response) {
                                                    console.log('response succes',response)
                                                    id_lcl = response.idpembelianlcl
                                                    // console.log('id_lcl',id_lcl)
                                                        Swal.fire({
                                                        icon:'success',
                                                        title:'Success',
                                                        text:response.msg
                                                    }).then((result)=>{
                                                    if(result.isConfirmed){
                                                        // window.location.reload();
                                                    }
                                                    });
                                                    },error: function(xhr, status, error) {
                                                        console.log('Terjadi kesalahan:',error);
                                                    }
                                                })
                
            })
        }
        if (window.location.pathname === '/admin/addcomercialinvoicelcllocal' ) {
            console.log('window.location.pathname',window.location.pathname)
            
            reloadaddcomerciallcl();
        }
        else if(window.location.pathname === '/admin/addcomercialinvoicelcllocalnoimport'){
            
            reloadaddcomerciallcl();
        }
      

        if (lastSelectedValue == 'requested') {
            console.log('lastselect', lastSelectedValue);

            function sendFilterData(selectedValue) {
                $.ajax({
                    url: '{{ route('admin.pembelian_comercial_invoice_filter') }}',
                    method: 'GET',
                    data: { 
                        filterValue: selectedValue 
                    },
                    success: function(response) {
                        var newRoute = "{{ route('admin.pembelian_comercial_invoice_filter') }}?filterValue=" + selectedValue;
                        window.location.href = newRoute;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('input[type=radio][name=filter]').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue !== lastSelectedValue) {
                    sendFilterData(selectedValue);
                    lastSelectedValue = selectedValue;
                }
            });
        }
        else{
            console.log('lastselect', lastSelectedValue);

            function sendFilterData(selectedValue) {
                $.ajax({
                    url: '{{ route('admin.pembelian_comercial_invoice_filter') }}',
                    method: 'GET',
                    data: { 
                        filterValue: selectedValue 
                    },
                    success: function(response) {
                        var newRoute = "{{ route('admin.pembelian_comercial_invoice_filter') }}?filterValue=" + selectedValue;
                        window.location.href = newRoute;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('input[type=radio][name=filter]').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue !== lastSelectedValue) {
                    sendFilterData(selectedValue);
                    lastSelectedValue = selectedValue;
                }
            });
        }
      
    });

</script>
<script>
     function reloadaddcomerciallcl(){
        if(window.location.pathname === '/admin/addcomercialinvoicelcllocal'){
            
                $('#tambahComercialLclLocalPick').click();
            
        }
        else if(window.location.pathname === '/admin/addcomercialinvoicelcllocalnoimport'){

            
                $('#no-import').click();
        }
       }
</script>
<script>
    // Menangani peristiwa klik pada tombol "Filter"
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });
    
     //untuk mengaktifkan checkbox agar dapat mencustom nomor invoice
    document.getElementById('customCodeCheckbox').addEventListener('click', function() {
        const modeadminInput = document.querySelector('input[name="modeadmin_tambah"]');
        
        const invoiceInput = document.querySelector('input[name="invoice_no_tambah"]');
        const contractInput = document.querySelector('input[name="contract_no_tambah"]');
        const packingInput = document.querySelector('input[name="packing_no_tambah"]');

        if (this.checked) {
            
            modeadminInput.value = 1;
            invoiceInput.disabled = false;
            contractInput.disabled = false;
            packingInput.disabled = false;
        } else {
            modeadminInput.value = 0;
            invoiceInput.disabled = true;
            contractInput.disabled = true;
            packingInput.disabled = true;
        }
    });

    function detailComercialInvoice(element){
        event.preventDefault();
        var id = $(element).data('id');


        $('#overlay').fadeIn();

        var url = "{{ route('admin.pembelian_editview_comercial_invoice') }}";

        $.ajax({
            url: url,
            type: 'GET', // Menggunakan metode GET
            data: {
                menu:'detail_commercial',
                id_product: id
            },
            success: function(response) {
                $('aside.sidenav').remove();
                $('.btn-tambah').remove()
          
                if (window.dataTableInstance) {
                            window.dataTableInstance.destroy();
                }
                $('#tabe-stok').remove()
                $('.radio-button-container').remove()
                $('#clearFilterBtn').remove()
                $('#FilterBtn').remove()
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
                $('#judulComercialInvoice').hide()
                $('.display-block').hide()
                document.title='Detail FCL   | PT. Maxipro Group Indonesia'
                $('.container-fluid').hide()
           
                $('.card').css({
                   
                    'display':'none'
                    
                });
           
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

    function updateComercialInvoice(element) {
            //Membuka modal update
            event.preventDefault();
            var id = $(element).data('id');
            

            // Tampilkan elemen overlay dengan efek fade-in sebelum mengirim permintaan AJAX
            // $('#overlay').fadeIn();

            var url = "{{ route('admin.pembelian_editview_comercial_invoice') }}";

            $.ajax({
                url: url,
                type: 'GET', // Menggunakan metode GET
                data: {
                    id_product: id
                },
                success: function(response) {
                    $('main.main-content').removeClass('wider ps ps--active-y');
                    $('.btn-tambah').remove();
                    
                    if (window.dataTableInstance) {
                        window.dataTableInstance.destroy();
                    }
                    $('#tabe-stok').remove();
                    $('.radio-button-container').hide();
                    $('#openModalBtn').hide();
                    $('#clearFilterBtn').hide();
                    
                    $('#judulRestok').html('<i class="fas fa-database"></i> &nbsp Edit Commercial Invoice');
                    $('#subjudul').html('Edit Commercial Invoice {{ $username["data"]["teknisi"]["name"] }}');
                    // Sembunyikan elemen overlay dengan efek fade-out setelah mendapatkan respons
                    // $('#overlay').fadeOut();
                    document.title='Edit Commercial Invoice   | PT. Maxipro Group Indonesia'
                    // Handle response jika sukses
                    $('#Formedit').html(response);
                    // Tampilkan modal
                    // $('#editModal').modal('show');
                    $('#editFclContainer').show();
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
            text: 'Maaf, item sudah di proses di FCL / LCL',
        });

        // Prevent the default action (navigation)
        return false;
    }

  function deleteComercialInvoice(element) {
    event.preventDefault();
    var id = $(element).data('id');
    var restokName = $(element).attr('name');

    // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin menghapus comercial invoice ini " +'INV-'+ restokName + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "{{ route('admin.pembelian_comercial_invoice') }}";
            $('#reload-icon').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    menu: 'delete_comercial_invoice',
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
            text: "Apakah Anda yakin ingin mereject Order Pembelian ini " +'INV- '+ restokName + " ?",
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
            // Mendapatkan nilai input tanggal filter
            var checkdatevalue = document.getElementById('checkdatevalue').value;
            var tgl_awal = document.getElementById('tgl_awal').value;
            var tgl_akhir = document.getElementById('tgl_akhir').value;
            var id_nama_perusahaan = document.getElementById('id_nama_perusahaan').value;
           
            var filterValue = document.querySelector('input[name="filter"]:checked').value;
            // console.log(id_nama_perusahaan)
            

            
            // Membuat query string dari data yang akan dikirim
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&id_nama_perusahaan=' + encodeURIComponent(id_nama_perusahaan)+'&filterValue=' + encodeURIComponent(filterValue);

            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.pembelian_comercial_invoice_filter') }}" + '?' + queryString;

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

                     var reloadUrl = "{{ route('admin.pembelian_comercial_invoice_filter') }}" + '?' + queryString;
                
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

<script>
    let masterRmbToUsdTambah = @json($Data['msg']['masterrmbtousd']);
    let RmbToUsdTambah = masterRmbToUsdTambah[0]['nominal'];
    var qty_qty=[];
    var qty_qty2=[]
    var cbm1=0;
    var cbm_cbm=[];
    var tot_without_tax_arr =[];
    var cbm2Array = [];
    var tdTotQuantity = [];

    var without_tax_arr=[];
    var tot_price_without_tax_usd =[];
    var tot_price_without_tax_usd_import =[];

    $(document).ready(function() {
        // Menangkap perubahan pada elemen select
        $('.select').change(function() {
            // Mendapatkan nilai dari elemen select yang dipilih
              var supplier = document.getElementById('edit_supplier').value;
                       var id = $('#edit_supplier').data('id');
                       $('#reload-icon').show();

            console.log(supplier,id);
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
                    console.log(response);
                     $('#reload-icon').hide();
                       table.ajax.reload(null, false); // User paging is not reset on reload
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

        
    $(document).ready(function() {
        $('#submitButtonForm2').on('click', function() {
      
            var formData = {
                
                freight_cost: $('input[name=freight_cost_tambah]').val()||"",
                insurance: $('input[name=insurance_tambah]').val()||"", //menggunakan element name
                incoterms: $('.incoterms-tambah-id').val()||"", //menggunakan element id
                location: $('#location_id_tab').val()||"",
                supplierbank: $('#banksupplier-tambah-id').val()||"",
                currency: $('#currency-tambah-id').val()||"",
                bank_name: $('#bank_name_id_tab').val()||"",
                bank_address: $('#bankAddress_id_tab_tambah').val()||"",
                swift_code: $('#swiftCode_id_tab_tambah').val()||"",
                account_no: $('#accountNo_id_tab_tambah').val()||"",
                date: $('#tgl_request_tambah').val()||"",
                beneficiary_name: $('#beneficiaryName_id_tab_tambah').val()||"",
                beneficiary_address: $('#beneficiaryAddress_id_tab_tambah').val()||"",
                modeadmin: $('input[name="modeadmin_tambah"]').val()||"",
                invoice_no: $('input[name=invoice_no_tambah]').val()||"",
                contract_no: $('input[name=contract_no_tambah]').val()||"",
                packing_no: $('input[name=packing_no_tambah]').val()||"",
                address: $('#address_id').val()||"",
                name: $('input[name=company_name]').val()||"",
                city: $('input[name=city_tambah]').val()||"",
                telp: $('input[name=telp_tambah]').val()||"",
                id_supplier: $('select[name=tambah_supplier]').val()||"",
                database: $('#database_tambah_id').val()||"",
            
                
            };
            
            // import
             $('.restok_import_tambah').each(function() {
                console.log('masuk restok import')
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.hscode_import').each(function() {
                console.log('masuk hscode_import')
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.model_import').each(function() {
                console.log('masuk brand_import')
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });

            
            $('.brand_import').each(function() {
                console.log('masuk brand_import')
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });

            $('.chinese_import').each(function() {
                console.log('masuk chinese_import')
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            

            $('.english_import').each(function() {
                console.log('masuk english_import')
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });

            $('.long_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.long_p_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.width_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.width_p_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.height_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.height_p_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.qty_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.nett_weight_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.gross_weight_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.cbm_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.unit_price_without_tax_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.unit_price_usd_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.tot_price_without_tax_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.total_price_usd_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.use_name_import').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            console.log(formData);
            
            if(!$('#database_tambah_id').val().trim()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Database tidak boleh kosong.',
                });
            }
            else if(!$('#tgl_request_tambah').val().trim()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Tanggal Request tidak boleh kosong.',
                });
            }
            else if (!$('input[name="company_name"]').val().trim()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Nama Perusahaan tidak boleh kosong.',
                });
            }
            else{

                $.ajax({
                    url: '{{ route('admin.pembelian_tambah_comercial_invoice') }}', // Ganti dengan route yang sesuai
                    method: 'GET', // Ubah menjadi POST jika endpoint kamu mengharuskannya
                    data: formData,
                    success: function(response) {
                        console.log(response)
                        if (Object.keys(response).length === 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Gagal mengirim data!',
                            });
                        }
                        else{
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Comercial invoice berhasil ditambahkan!',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan di sini
                        alert('Terjadi kesalahan saat mengirim data');
                    }
                });

            }
        });
        
       
    });


</script>
@endsection