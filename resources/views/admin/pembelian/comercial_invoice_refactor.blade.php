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

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    
    <div class="container-fluid">
        <h4 id="judulRestok"><i class="fas fa-database"></i> &nbsp Commercial Invoice</h4>
        <small class="display-block" id="subjudul">Commercial Invoice {{ $username['data']['teknisi']['name'] }}</small>
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="javascript:void(0)" id="tambahComercialLocal" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add Commercial Invoice</a>
                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info filter" id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning filter" id="clearFilterBtn">Clear Filter</button>

                                    </div>
                                </div>
                                <ul id="tab-nav" class="nav nav-tabs fade show" style="display: none;">
                                    <li class="nav-item"><a class="nav-link active" href="#" id="master-tab">Master</a></li>
                                    
                                    <li class="nav-item"><a class="nav-link" href="#" id="ekspedisi-tab">Ekspedisi</a></li>
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
                                            <label for="namabaranglabel">Nama Perusahaan</label>
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

                    <div class="radio-button-container">
                        <label>
                            <div class="color-box bg-light-yellow"></div>            <div class="color-box " id="color-list-order"></div>
                            <input type="radio" name="filter" value="requested" id="filter-status" {{ $Data['msg']['requested_check'] == 'requested' ? 'checked' : '' }}>
                            Requested & From Order Pembelian
                            
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
                  
                        <table id="tabe-stok">
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
                                            <td id="td-2"></td>
                                            <td>
                                                <a href="{{ route('admin.pembelian_add_comercial_invoice', ['name' => $supplierName]) }}" class="btn btn-info" style="width: 35px; height: 38px; padding: 9px 10px;" title="Add Comercial">+</a>
                                            </td>
                                        </tr>
                                        @php
                                            $num++;
                                        @endphp
                                    @endif
                                  @endfor
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
                                            
                                            
                                            <td id="td-3">   
                                                <select id="select_category_{{ $i }}" class="form-control select_select_category" data-id_commercial="{{ $data['id'] }}" style="background-color: white">
                                                    <option value="0">Pilih Kategori</option>
                                                    <option value="fcl" {{ $data['category_comercial_invoice'] == 'fcl' ? 'selected' : '' }}>FCL</option>
                                                    
                                                    
                                                    
                                                </select>
                                            </td>
                                           
                                            <td id="td-2">
                                                @if ($data['status'] == 'requested')
                                                    <a href="javascript:void(0)" onclick="detailComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-light" style="width: 35px; height: 38px; padding: 9px 10px;" title="Detail Commercial Invoice"><i class="fas fa-eye"></i></a>
                                                    <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                @endif
                                                
                                                    <a href="javascript:void(0)" onclick="deleteComercialInvoice(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Delet2e"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td>
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
                                                    @if ($data['status'] == 'requested')
                                                    <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                    @else
                                                    <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    <a href="javascript:void(0)" onclick="rejectOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Reject Order"><i class="fas fa-times"></i></a>
                                                    <a href="javascript:void(0)" onclick="deleteComercialInvoice(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Delete5"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <td>
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


                  
                    
                    <!-- modal tambah commercial invoice -->
                    <!-- <div class="col-sm-12" style="margin-top: 15px;">
                        
              

                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
                           <div class="modal-dialog" role="document" style="max-width: 2200px;padding-left: 250px;">

                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        
                                       <h5 class="modal-title" id="exampleModalLabel">Tambah Comercial Invoice</h5>

                                    </div>
                                    
                                    <div class="modal-body">
                                        
                                        <form id="FormTambah">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Custom Kode</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <input type="checkbox" id="customCodeCheckbox_modal" class="styled customcode_modal">
                                                        <input type="hidden" name="modeadmin_tambah_modal" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-4" style="text-align: right;">
                                                <a href="javascript:void(0)" onclick="importData(event)" name="importButton" class="btn btn-large btn-info btn-edit" style="width: 140px; height: 38px; padding: 9px 10px;">Import Data </a>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Invoice Number</label>
                                                    <input type="number" class="form-control" name="invoice_no_tambah_modal" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number</label>
                                                    <input type="number" class="form-control" name="contract_no_tambah_modal" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number</label>
                                                    <input type="number" class="form-control" name="packing_no_tambah_modal" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="position: relative; width: 100%; margin-top:10px;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Database <span style="color: red;">(Wajib Diisi)</span></label>
                                                        
                                                        <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="database_tambah_id" name="database_tambah_name" required>
                                                            <option value="">Database</option>
                                                            <option value="PT">PT</option>
                                                            <option value="UD">UD</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group" style="margin-top:10px;">
                                                        <label for="startDateTglRequest">Tanggal Request <span style="color: red;">(Wajib Diisi)</span></label>
                                                        <input type="text" style="height:55px;" class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder= "Pilih Tanggal" required >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="margin-bottom: 20px;margin-top: 10px;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%">Supplier <span style="color: red;">(Wajib Diisi)</span></label>

                                                    <select class="select select2 select-search form-control" id="product-supplier-edit-filter" name="tambah_supplier">
                                                    <option value="">Supplier</option>
                                                    @foreach($Data['msg']['supplier'] as $index => $supplier)
                                                    <option value="{{ $supplier['id'] }}">{{ $supplier['name'] }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                        <div style="position: relative; width: 100%;">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%;width: 100%" for="">Nama Perusahaan <span style="color: red;">(Wajib Diisi)</span></label>
                                                            <input type="text" class="form-control" name="company_name" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Nama Perusahaan">
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan</label>
                                                        <textarea type="text" class="form-control" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Alamat Perusahaan"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan</label>
                                                        <input type="text" class="form-control" name="city_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Kota Perusahaan">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                            

                                           


                                        </form>

                                        <form action="" class="form-horizontal" id="sendImportForm" method="get">
                                            @csrf
                                            <div style="margin-top:20px;position: relative; width: 100%;">
                                                 <div id="content-container2"></div>
                                                 <div id="content-container3"></div>
                                             </div>
                                        </form>

                                        <form action="" class="form-horizontal" id="FormTambah2" method="get">
                                            @csrf
                                           

                                            
                                            
                                            <div class="form-group" style="padding-top: 100px; padding-left: 20px;">
                                                <h4>NOTES</h4>
                                                <hr style="border: none; border-top: 1px solid #000; margin-top: 20px;">
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 15px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Incoterms</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">
                                                        <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control incoterms-tambah" id="incoterms-tambah-id" name="incoterms_tambah">
                                                            <option value="">Select Incoterms</option>
                                                                <option value="FOB">FOB </option>
                                                                <option value="CIF">CIF </option>
                                                                <option value="EXWORK">EXWORK </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Location</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">
                                                        <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da;padding-left:10px;" id="location_id_tab" name="location_name_tab" placeholder="Location">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 100px; padding-left: 20px;">
                                                <h4>PAYMENT</h4>
                                                <hr style="border: none; border-top: 1px solid #000; margin-top: 20px;">
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 15px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Bank Supplier</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">
                                                        <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control banksupplier-tambah" id="banksupplier-tambah-id" name="banksupplier_edit">
                                                                <option value="0">Pilih Bank Supplier</option>
                                                            

                                                                <option value=""></option>

                                                            

                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 15px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Currency</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">
                                                        <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control currency-tambah" id="currency-tambah-id" name="currency_tambah">
                                                                <option value="0">Pilih Currency</option>
                                                                
                                                                @foreach($Data['msg']['matauang'] as $index => $mt_uang)    
                                                                <option value="{{ $mt_uang['id'] }}"> ({{ $mt_uang['simbol'] }}) {{ $mt_uang['kode'] }} - {{ $mt_uang['name'] }} </option>
                                                                @endforeach
                                                                
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                
                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Bank Name</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">


                                                        <input type="text" class="form-control custom-border" id="bank_name_id_tab" name="bank_name_name_tab" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Bank Name">

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Bank Address</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">


                                                        <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="bankAddress_id_tab_tambah" name="bankAddress_name_tab_tambah" placeholder="Bank Address">

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Swift Code</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">


                                                        <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="swiftCode_id_tab_tambah" name="swiftCode_name_tab_tambah" placeholder="Swift Code">

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Account No</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">


                                                        <input type="text" class="form-control custom-border" id="accountNo_id_tab_tambah" name="accountNo_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Account No">

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel">Beneficiary Name</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">


                                                        <input type="text" class="form-control custom-border" id="beneficiaryName_id_tab_tambah" name="beneficiaryName_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;"placeholder="Beneficiary Name">

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                
                                                <div class="row">
                                                    <div style="padding-top: 10px;" class="col-md-1">
                                                        <label for="kodebaranglabel" style="width: 100%;">Beneficiary Address</label>
                                            
                                                    </div>
                                                    <div class="col-md-11" style="padding-right: 600px;">


                                                        <input type="text" class="form-control custom-border" id="beneficiaryAddress_id_tab_tambah" name="beneficiaryAddress_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Beneficiary Address">

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                <button type="button" id="submitButtonForm2" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('admin.pembelian_comercial_invoice') }}'">Close</button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- modal edit commercial invoice -->
                    <div id="editcomercial" class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        <!-- <div id="tabe-stok"></div> -->

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
                    
                    <!-- view tambah comercial invoice kategori local -->
                    <div id="addcomerialinvoicelocal" style="display: none;" class="col-sm-12" style="margin-top: 15px;">

                                              

                                    <!--<form action="" class="form-horizontal" id="sendImportForm" method="get">
                                                                    @csrf
                                                                    <div style="margin-top:20px;position: relative; width: 100%;">
                                                                        <div id="content-container2"></div>
                                                                        <div id="content-container3"></div>
                                                                    </div>
                                    </form>

                                    <form action="" class="form-horizontal" id="FormTambah2" method="get">
                                                                    @csrf
                                                                

                                                                    
                                                                    
                                                                    <div class="form-group" style="padding-top: 100px; padding-left: 20px;">
                                                                        <h4>NOTES</h4>
                                                                        <hr style="border: none; border-top: 1px solid #000; margin-top: 20px;">
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 15px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Incoterms</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">
                                                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control incoterms-tambah" id="incoterms-tambah-id" name="incoterms_tambah">
                                                                                    <option value="">Select Incoterms</option>
                                                                                        <option value="FOB">FOB </option>
                                                                                        <option value="CIF">CIF </option>
                                                                                        <option value="EXWORK">EXWORK </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Location</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">
                                                                                <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da;padding-left:10px;" id="location_id_tab" name="location_name_tab" placeholder="Location">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 100px; padding-left: 20px;">
                                                                        <h4>PAYMENT</h4>
                                                                        <hr style="border: none; border-top: 1px solid #000; margin-top: 20px;">
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 15px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Bank Supplier</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">
                                                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control banksupplier-tambah" id="banksupplier-tambah-id" name="banksupplier_edit">
                                                                                        <option value="0">Pilih Bank Supplier</option>
                                                                                    
                                                                                        
                                                                                        <option value=""></option>
                                                                                        

                                                                                    

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 15px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Currency</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">
                                                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control currency-tambah" id="currency-tambah-id" name="currency_tambah">
                                                                                        <option value="0">Pilih Currency</option>
                                                                                        
                                                                                        @foreach($Data['msg']['matauang'] as $index => $mt_uang)    
                                                                                        <option value="{{ $mt_uang['id'] }}"> ({{ $mt_uang['simbol'] }}) {{ $mt_uang['kode'] }} - {{ $mt_uang['name'] }} </option>
                                                                                        @endforeach
                                                                                        
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                        
                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Bank Name</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">


                                                                                <input type="text" class="form-control custom-border" id="bank_name_id_tab" name="bank_name_name_tab" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Bank Name">

                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Bank Address</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">


                                                                                <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="bankAddress_id_tab_tambah" name="bankAddress_name_tab_tambah" placeholder="Bank Address">

                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Swift Code</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">


                                                                                <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="swiftCode_id_tab_tambah" name="swiftCode_name_tab_tambah" placeholder="Swift Code">

                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Account No</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">


                                                                                <input type="text" class="form-control custom-border" id="accountNo_id_tab_tambah" name="accountNo_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Account No">

                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel">Beneficiary Name</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">


                                                                                <input type="text" class="form-control custom-border" id="beneficiaryName_id_tab_tambah" name="beneficiaryName_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;"placeholder="Beneficiary Name">

                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                                                                        
                                                                        <div class="row">
                                                                            <div style="padding-top: 10px;" class="col-md-1">
                                                                                <label for="kodebaranglabel" style="width: 100%;">Beneficiary Address</label>
                                                                    
                                                                            </div>
                                                                            <div class="col-md-11" style="padding-right: 600px;">


                                                                                <input type="text" class="form-control custom-border" id="beneficiaryAddress_id_tab_tambah" name="beneficiaryAddress_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Beneficiary Address">

                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                                        <button type="button" id="submitButtonForm2" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                                                                    </div>
                                    </form>        -->

                                    <div class="row" id="row-supplier">
                                        <form id="FormTambah">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Custom Kode</label>
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
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Invoice Number</label>
                                                        <input type="number" class="form-control" id="invoice_no_tambah" name="invoice_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number</label>
                                                        <input type="number" class="form-control" id="contract_no_tambah" name="contract_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number</label>
                                                        <input type="number" class="form-control" id="packing_no_tambah" name="packing_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                            </div>





                                        </form>
                                                
                                        <div class="col-md-6">

                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">

                                                    <label id="label" for="">Database <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-md-9">

                                                        <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="database_tambah_id" name="database_tambah_name" required>
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
                                                    <label id="label" for="">Supplier <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-md-9">

                                                    <select class="form-control pilih-supplier" style="width: 100%;" name="supplier_select" id="select_supplier">
                                                        <option value="">Pilih Supplier</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                                

                                    </div>

                                    <div class="row" id="row-select">
                                   
                                                                        <div class="col-md-6">
                                                                            <div class="row" id="padding-top">
                                                                                <div class="col-md-3">
                                                                                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%;width: 100%" for="">Nama Perusahaan <span style="color:red">*</span></label>
                                                                                </div>
                                                                                <div class="col-md-9">

                                                                                    <input type="text" class="form-control" id="company-name" name="company_name" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" value="">
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row" id="padding-top">
                                                                                <div class="col-md-3">

                                                                                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan</label>
                                                                                </div>
                                                                                <div class="col-md-9">

                                                                                    <textarea type="text" class="form-control" id="address_company" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" ></textarea>
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
                                                            
                                                            <input type="text" class="form-control" id="city" name="city" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Kota Perusahaan">
                                                        </div>                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" id="padding-top">
                                                        <div class="col-md-3">

                                                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <input type="number" class="form-control" id="telp" name="telp" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 100%" placeholder="Telp. Perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                    </div>

                                    <div class="row" id="row-select">
                                        <div class="col-md-6">
                                            
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                        
                                                        <label id="label" for="">No. Referensi</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <input class="form-control no-referensi"type="text" placeholder="No. Referensi" id="input-input">
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="col-select">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                <label id="label" for="">Mata Uang</label>
                                                </div>
                                                <div class="col-md-9">

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
                                                        
                                                        <label id="label" for="">Tanggal Transaksi <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <input class="form-control" id="tgl_request" type="text" placeholder="Tanggal Transaksi" id="input-input">
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="col-select">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                    <label id="label" for="">Kategori</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="" id="kategori_local">
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="lcl">LCL</option>
                                                        <option value="local">LOCAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="row" >
                                        <div class="col-md-9">
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-2">
                                                        
                                                        <label id="label" for="">Termin <span style="color:red">*</span></label>
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
                                            <div class="row">
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
                                                        <label for="text_area">Location</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <!-- <textarea class="form-control" name="" id="text_area" rows="3"placeholder="Keterangan"></textarea> -->
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
                                                    <td id="border">Subtotal(Rp)</td>
                                                    <td id="border" class="sutotal_element">0</td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">Discount Percent (Rp)</td>
                                                    <td id="border">
                                                        <div style="display: flex; align-items: center;">
                                                            <input type="number" class="form-control" id="discount_percent" value="0">
                                                            <span >%</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">Discount Nominal(Rp)</td>
                                                    <td id="border" ><input type="number" class="form-control" id="discount_nominal" value="0"></td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">PPN 11%(Rp)</td>
                                                    <td id="border" class="ppn_element">0</td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">Total (Rp)</td>
                                                    <td id="border" class="total_element">0</td>
                                                </tr>
                                           </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div style="text-align:right; margin-top: 30px;">
                                    
                                                <button type="button" id="sendSave" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
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

                                        <label id="label" for="">Resi <span id="required-star">*</span></label>
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
                                                                
                                                                <label id="label" for="">Keterangan <span id="required-star">*</span></label>
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
                                                        <label for="">Keterangan</label>
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

    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Import From2 Order Pembelian</h5>
                    
                </div>
                <div class="modal-body">
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
                                                <label>
                                                    Search:
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="search-box" class="form-control d-inline-block w-round" placeholder="Supplier...">
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
                                                
                                            
                                                <input type="checkbox" class="kubik-checkbox-tambah" name="checkbox_{{ $number2 }}">
                                                <input type="hidden" class="form-control restok-input-tambah"  name="id_restok_{{ $number2 }}" value="{{ $result['restok_id'] }}">
                                                
                                                        
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
                            <div style="text-align:right; margin-top: 30px;">
                                    
                                    <button type="button" id="sendImportBarang" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
<!-- <script src="../assets/js/commercial-invoice/select_choices.js"></script>  -->
<script src="../assets/js/commercial-invoice/commercial_invoice.js"></script> 
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->


<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

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

        // Enable/disable date inputs based on checkbox state
        
    });

        //button clear Filter 
    $('#clearFilterBtn').on('click', function() {


            window.location.href = '{{ route('admin.pembelian_comercial_invoice') }}'; 
    })

    //untuk proses inisiasi datatable & aksi tambah comercial local/lcl
    $(document).ready(function() {
        
        var lastSelectedValue = $('input[type=radio][name=filter]:checked').val();

        //untuk menyimpan id_lcl yang dibuat
        var id_lcl;

        //untuk membuat datatable
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
                { data: 'link', title: 'Action Add' }
            ],
            "initComplete": function(settings, json) {
                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...');
                initializeSelect2();
            }
        });
        //aksi tambah comercial local/lcl
        $('#tambahComercialLocal').on('click', function() {

            $('#pembayaran-tab').on('click', function() {
                console.log('masuk pembayaran')        
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
                console.log('masuk master')
                $('.tab-content').hide();
                // $('#master-content').show();
                $('#addcomerialinvoicelocal').css('display','block')
            
            });

         
            // Destroy the existing DataTable instance
            table.destroy();
            $('#tabe-stok').remove();
            $('.radio-button-container').remove()
            $('.filter').remove()
            $('#tambahComercialLocal').remove()
            $('#tab-nav').show();
            $('#master-tab').trigger('click'); 
            $('#judulRestok').html('<i class="fas fa-database"></i> &nbsp Add Commercial Invoice Kategori LCL/Local');
            $('#addcomerialinvoicelocal').css('display','block')
            
            $.ajax({
                url:'{{ route('admin.pembelian_comercial_invoice') }}',
                type:'GET',
                data:{
                    menu:'create_local'
                },
                success: function(response){
                
                    const selectSupplier = $('#select_supplier');
                    selectSupplier.empty();

                    // Tambahkan opsi default
                    selectSupplier.append('<option value="">Pilih Supplier</option>');

                    // Loop melalui response.msg.new_supplier dan tambahkan opsi ke select
                    response.msg.new_supplier.forEach(function(supplier) {
                        selectSupplier.append(
                            `<option value="${supplier.id}">${supplier.name}</option>`
                        );
                    });
                    
  
                    selectSupplier.on('change', function(event) {
                        const selectedValueSupplier = event.target.value;
                        const inputElementSelectedSupplier = document.getElementById('select_supplier'); // Ganti dengan ID yang sesuai
                        if (inputElementSelectedSupplier) {
                            inputElementSelectedSupplier.value = selectedValueSupplier;
                            console.log('selected_value',selectedValueSupplier)
                        }
                        $.ajax({
                            type:'GET',
                            url:'{{ route('admin.pembelian_fcl') }}',
                            data:{
                                menu:'select_supplier',
                                select_id_supplier:selectedValueSupplier
                            },
                            success: function(response){
                                console.log('response', response.filtered_supplier);
                                for (const key in response.filtered_supplier) { 
                    
                                        const supplier = response.filtered_supplier[key];
                                        
                                        if (supplier) {
                                           console.log('supplier address',supplier)
                                            $('#company-name').val(supplier.company)
                                            $('#address_company').val(supplier.address);
                                            $('#city').val(supplier.city);
                                            $('#telp').val(supplier.telp);
                                        }
                                         else {
                                            // console.log(`Address not found for key ${key}`);
                                            $('#company-name').val('')
                                            $('#address_company').val('');
                                            $('#city').val('');
                                            $('#telp').val('');
                                        }
                                    
                                }
                            },
                        })
                    })

                    // Inisialisasi Choices.js
                    const choices_supplier = new Choices(selectSupplier[0], {
                        placeholderValue: 'Pilih Supplier',
                        searchEnabled: true,
                        removeItemButton: true,
                        shouldSort: false,
                    });

                    //inisiasi Choices.js matauang
                    const choices_matauang = new Choices($('.pilih-matauang')[0], {
                    
                        itemSelectText: '',   // Removes "Press to select" text
                        shouldSort: false     // Keeps the original order of options
                    });

                    const choices_kategori = new Choices($('#kategori_local')[0], {
                    
                        itemSelectText: '',   // Removes "Press to select" text
                        shouldSort: false     // Keeps the original order of options
                    });
                    
                    const select_termin_rekening = $('#select_termin_rekening');
                    select_termin_rekening.empty();

    
                    response.msg.account.forEach(function(rekening) {
                        select_termin_rekening.append(
                            `<option value="${rekening.id}">${rekening.name}</option>`
                        );
                    });

                    // Inisialisasi Choices.js
                    const choices_rekening = new Choices(select_termin_rekening[0], {                   
                        searchEnabled: true,
                        removeItemButton: true,
                        shouldSort: false,
                    });

                    const select_termin_cash = $('#select_termin_cash');
                    select_termin_cash.empty();

    
                    response.msg.termin.forEach(function(termin) {
                        select_termin_cash.append(
                            `<option value="${termin.id}">${termin.name}</option>`
                        );
                    });

                    // Inisialisasi Choices.js
                    const choices_termin = new Choices(select_termin_cash[0], {                   
                        searchEnabled: true,
                        removeItemButton: true,
                        shouldSort: false,
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
                                // $('#flexCheckDefault').on('change', function() {
                                //     // Memeriksa apakah checkbox dicentang
                                //     var isChecked = $(this).prop('checked');
                                    
                                //     if (isChecked) {
                                //         console.log('centang masuk')
                                //         ppnValue = (val + val_select) * 0.11;
                                //         $('.ppn_element').text((ppnValue * valueDiscount).toFixed(2));
                                //         $('.total_element').text(((((val + val_select) * valueDiscount) - valueNominalDiscount)+ppnValue).toFixed(2));
                                        
                                //     } else {
                                //         console.log('centang tidak masuk')
                                //         $('.ppn_element').text(0);
                                //         $('.total_element').text((((val + val_select))).toFixed(2));
                                //         return
                                //     }
                                // });
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
                                
                                // console.log('idBarangRestok:', idBarangRestok);
                                // console.log('idTeknisiRestok:', idTeknisiRestok);
                                // console.log('idSupplierRestok:', idSupplierRestok);
                                // console.log('jmlPermintaanRestok:', jmlPermintaanRestok);
                                // console.log('laststokRestok:', laststokRestok);
                                // console.log('keteranganRestok:', keteranganRestok);
                            }
                            else{
                                idBarangRestok=0;
                                idTeknisiRestok=0;
                                idSupplierRestok=0;
                                jmlPermintaanRestok=0
                                laststokRestok=0
                                keteranganRestok=0
                                // console.log('kosong')

                                // console.log('idBarangRestok:', idBarangRestok);
                                // console.log('idTeknisiRestok:', idTeknisiRestok);
                                // console.log('idSupplierRestok:', idSupplierRestok);
                                // console.log('jmlPermintaanRestok:', jmlPermintaanRestok);
                                // console.log('laststokRestok:', laststokRestok);
                                // console.log('keteranganRestok:', keteranganRestok);
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
        
        });

        //initialize select2 category
        function initializeSelect2() {
            $('.select_select_category').select2({
                placeholder: '-',
                allowClear: true,
                width: 'resolve' // Adjust width as needed
            });

            //proses mengirim memilih kategory
            $('.select_select_category').on('change', function() {
                var selectedValue = $(this).val();
                var idCommercial = $(this).data('id_commercial');
                
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
                            console.log('Response from server:', response);
                            $('#reload-icon').hide();
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                }
            });
        }

        // initialize Select2 setelah tiap membuat datatable (e.g., page change)
        table.on('draw', function() {
            initializeSelect2();
        });

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
        var currentPage = table.page.info().page; // inisiasi halaman pertama
        var previousPage = currentPage; // inisiasi halaman sebelumnya dari halaman sekarang

        // Reload the page when the "previous" button or an earlier page index is clicked
        $(document).on('click', '.paginate_button', function() {
            previousPage = currentPage;

            // Get the new current page
            currentPage = table.page.info().page;

            console.log('previous', previousPage);
            console.log('current', currentPage);

            // Get the target page from button text
            var targetPage = $(this).text().trim();
            console.log('target', targetPage);

            // Check if the "previous" button was clicked or if we're previous page same with targetpage
            if ($(this).hasClass('previous') || currentPage == 0 || previousPage==targetPage) {
                location.reload(); // Reload the page
            }
            
    
        });
    });

</script>

<script>
    // Menangani peristiwa klik pada tombol "Filter"
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });


   
    // Menangani klik pada tombol tambah
    // function tambahRestok(element) {
    //     event.preventDefault();
    //     console.log('masuk modal tambah');
        
    //     $('#tambahModal').modal('show'); // Tampilkan modal

    // }


    //Untuk Mereset data input checkbox dan total kubik di modal hitung kubk
    // document.getElementById('tambahModal').addEventListener('hidden.bs.modal', function () {
    //     var checkboxes = document.querySelectorAll('.kubik-checkbox-tambah'); //Inisiasi variabel yang mengambil value select dari class kubik-checkbox-tambah
    //     checkboxes.forEach(function(checkbox) { //Untuk mengambil input checkbox sesuai urutan berdasarkan array
    //         checkbox.checked = false; //Untuk menonaktifkan input checkbox
    //     });
    //     document.getElementById('total-kubik').textContent = 0; //menset nilai total-kubik menjadi 0
    // });
    
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
        console.log('id',id)


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
                $('#judulFcl').hide()
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
            $('#overlay').fadeIn();

            var url = "{{ route('admin.pembelian_editview_comercial_invoice') }}";

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