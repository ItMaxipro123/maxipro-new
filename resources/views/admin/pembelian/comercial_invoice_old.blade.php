@extends('admin.templates_baru')


@section('title')
Commercial Invoice    | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link href="{{ asset('css/comercialinvoice.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                                <a href="javascript:void(0)"  name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add Commercial Invoice</a>
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

                        <label for="">
                        <div class="color-box " id="color-list-order"></div>
                            From Order Pembelian
                        </label>
                    </div>
                    
                    <div id="reload-icon">
                        <i class="fas fa-sync-alt"></i> Reloading...
                    </div>
                    @if($Data['msg']['total_rows_penjualan'] >$Data['msg']['total_rows']  && $Data['msg']['requested_check'] =='requested') 
                        <!-- <p>Masuk</p>     -->
                        @php
                            $num = 1;
                            $listorderData = $Data['msg']['listorder'];
                            $penjualanData = $Data['msg']['penjualan'];
                            $maxLength = max(count($listorderData), count($penjualanData));
                        @endphp

                        <table id="tabe-stok">
                            <thead>
                                
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $maxLength; $i++)
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
                                            <td id="td-3"><span id="span-on-td">{{ $data['category'] }}</span></td>
                                            <td id="td-2">
                                                @if ($data['status'] == 'requested')
                                                <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                @else
                                                <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                @endif
                                                <a href="javascript:void(0)" onclick="rejectOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Reject Order"><i class="fas fa-times"></i></a>
                                                <a href="javascript:void(0)" onclick="deleteOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            td
                                        </tr>
                                        @php
                                        $num++;
                                        @endphp
                                    @endif

                                    @if (isset($listorderData[$i]))
                                        @php
                                        $data_listorder = $listorderData[$i];
                                        \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                        $formattedDateListOrder = \Carbon\Carbon::parse($data_listorder['tgl_request'])->translatedFormat('d F Y');
                                        @endphp
                                        <tr id="color-list-order">
                                            <td id="td-1">{{ $num }}</td>
                                            <td id="td-2">{{ $formattedDateListOrder }}</td>
                                            <td id="td-2"></td>
                                            <td id="td-2">{{ $data_listorder['supplier_name'] }}</td>
                                            <td id="td-2">{{ $data_listorder['supplier_company'] }}</td>
                                            <td id="td-2">{{ $data_listorder['supplier_telp'] }}</td>
                                            
                                            
                                            <td id="td-1"></td>
                                            <td id="td-3"></td>
                                            <td id="td-2">
                                                <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                        $num++;
                                        @endphp
                                    @endif
                                @endfor
                            </tbody>
                        </table>
                    @elseif($Data['msg']['total_rows_penjualan'] < $Data['msg']['total_rows'] && $Data['msg']['requested_check'] =='requested')      
                     
                        @php
                            $num = 1;
                            $listorderData = $Data['msg']['listorder'];
                            $penjualanData = $Data['msg']['penjualan'];
                            $maxLength = max(count($listorderData), count($penjualanData));
                        @endphp
                        
    
                        <table id="tabe-stok">
                            <thead>
                     
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $maxLength; $i++)
                                    @if (isset($listorderData[$i]))
                                        @php
                                        $data_listorder = $listorderData[$i];
                                        \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                        $formattedDateListOrder = \Carbon\Carbon::parse($data_listorder['tgl_request'])->translatedFormat('d F Y');
                                        @endphp
                                        <!-- element tr menampilkan data dari order pembelian -->
                                        <tr id="color-list-order">
                                            <td id="td-1">{{ $num }}</td>
                                            <td id="td-2"></td>
                                            <td id="td-2"></td>
                                            <td id="td-2">{{ $data_listorder['supplier_name'] }}</td>
                                            <td id="td-2">{{ $data_listorder['supplier_company'] }}</td>
                                            <td id="td-2">{{ $data_listorder['supplier_telp'] }}</td>
                                            
                                            
                                            <td id="td-1"></td>
                                            <td id="td-3"></td>
                                            <td id="td-2"></td>
                                                
                                            <td id="td-2">
                                                <a href="{{ route('admin.pembelian_add_comercial_invoice', ['id' => $data_listorder['id']]) }}" class="btn btn-info" style="width: 35px; height: 38px; padding: 9px 10px;" title="Add Comercial">
                                                 
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                        $num++;
                                        @endphp
                                    @endif

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
                                            <td id="td-3"><span id="span-on-td">{{ $data['category'] }}</span></td>
                                            <td id="td-2">
                                                @if ($data['status'] == 'requested')
                                                <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                @else
                                                <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;" title="Edit"><i class="fas fa-edit"></i></a>
                                                @endif
                                                <a href="javascript:void(0)" onclick="rejectOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Reject Order"><i class="fas fa-times"></i></a>
                                                <a href="javascript:void(0)" onclick="deleteOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td id="td-2"></td>
                                        </tr>
                                        @php
                                        $num++;
                                        @endphp
                                    @endif
                                @endfor
                            </tbody>
                        </table>

                    @else
                         
                        <table id="tabe-stok">
                            <thead>
                                <!-- Add table headers if needed -->
                            </thead>
                            <tbody>
                                @php
                                $num = 1;
                                @endphp
                                <!-- Table data will be populated here -->
                                @foreach($Data['msg']['penjualan'] as $index => $data)
                                @php
                                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                $formattedDate = \Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y');
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
                                @endphp
                                    <tr style="{{ $rowStyle }}">
                                        
                                        <td id="td-1">{{ $num }}</td>
                                        <td id="td-2">{{ $formattedDate }}</td>
                                        
                                        <td id="td-2">INV-{{ $data['invoice_no'] }}</td>
                                        <td id="td-2">{{ $data['supplier']['name'] }}</td>
                                        <td id="td-2">{{ $data['supplier']['company'] }}</td>
                                        @php
                                            $total        = 0;

                                            $total_usd    = 0;

                                            foreach($data['detail'] as $index_detail => $result)
                                            {
                                                $total      = $total + $result['total_price_without_tax'];

                                            
                                                $total_usd  = $total_usd + $result['total_price_usd'];
                                            }
                                        @endphp
                                        <td id="td-1">{{ $data['supplier']['telp'] }}</td>
                                        <td id="td-1">{{ $data['matauang']['simbol'] }} {{$data['matauang']['kode'] == 'USD' ? ($total_usd + $data['freight_cost'] + $data['insurance']) : ($total + $data['freight_cost'] + $data['insurance'])}}</td>
                                        
                                    
                                        
                                        <td id="td-3">
                                            <span id="span-on-td">{{ $data['category'] }}</span>
                                        </td>


                                        <td id="td-2">
                                            @if($data['status'] == 'requested')
                                            <a href="javascript:void(0)" onclick="updateComercialInvoice(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;"title="Edit"> <i class="fas fa-edit"></i></a>
                                            @else
                                            <a href="javascript:void(0)" onclick="updateRestokFailed(this); return false;" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit"style="width: 35px; height: 38px; padding: 9px 10px;"title="Edit"><i class="fas fa-edit"></i></a>
                                            @endif
                                            <a href="javascript:void(0)" 
                                            onclick="rejectOrderPembelian(this)" 
                                            data-id="{{ $data['id'] }}" 
                                            name="{{ $data['invoice_no'] }}" 
                                            class="btn btn-large btn-info btn-danger" 
                                            style="width: 35px; height: 38px; padding: 9px 10px;" 
                                            title="Reject Order">
                                            <i class="fas fa-times"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice_no'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" 
                                            title="Delete"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                             

                                @php
                                $num++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>           
                   
                    @endif
                  
                    
                    <!-- modal tambah commercial invoice -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        
                        <div id="tabe-stok"></div>

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
                                                        <input type="checkbox" id="customCodeCheckbox" class="styled customcode">
                                                        <input type="hidden" name="modeadmin_tambah" value="0">
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
                                                    <input type="number" class="form-control" name="invoice_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number</label>
                                                    <input type="number" class="form-control" name="contract_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number</label>
                                                    <input type="number" class="form-control" name="packing_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
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
                    
                                            <div style="position: relative; width: 100%;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                                                <input type="number" class="form-control" name="telp_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 32%" placeholder="Telp. Perusahaan">
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
                                        <!-- Tombol untuk menutup modal -->
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('admin.pembelian_comercial_invoice') }}'">Close</button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal edit commercial invoice -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        <div id="tabe-stok"></div>

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

@endsection

@section('script')




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/commercial-invoice/select_choices.js"></script> 
<script src="../assets/js/commercial-invoice/import_barang.js"></script> 
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

            columns: [{
                    data: 'num',
                    title: 'No'
                },
                {
                    data: 'date',
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
                    data: 'company',
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
                    data: 'category',
                    title: 'Kategori'
                },

                {
                    data: 'link2',
                    title: 'Action ',
                    render: function(data, type, full, meta) {
                 
                        return '<a href="' + data + '</a>';
                    }
                },
                 
                {
                    data: 'link',
                    title: 'Action Add',
                    render: function(data, type, full, meta) {
                       if (full.invoice) {
                            invoiceNumber = full.invoice;

                            return '<span style="cursor: pointer;" title="No Add" ></span>';
                        } else {
                           // Extract the URL from the 'link' field
                    var url = $(data).attr('href'); // Assuming 'data' is the HTML string

                    // Log the URL for debugging
                    console.log('URL:', url);

                    // Return the button with an onclick event that redirects to the URL
                    return '<button type="button" title="Add Commercial Invoice" class="btn btn-info" onclick="window.location.href=\'' + url + '\'">' +
                           '<i class="fas fa-plus"></i>' +
                           '</button>';
                        }

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
                                  console.log(formData)
                                    // Mengirim permintaan AJAX
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ route('admin.pembelian_restok_tambah_filter') }}', // Ganti URL_TARGET dengan URL tujuan Anda
                                        data: formData,
                                        success: function(response) {
                                            // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                                           console.log(response);
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
                url: '{{ route('admin.pembelian_comercial_invoice_filter') }}', // Replace with your server endpoint
                method: 'GET',
                data: { 
                    filterValue: selectedValue 
                },
                success: function(response) {
                    // Handle success response
                    // console.log(response);
            var newRoute = "{{ route('admin.pembelian_comercial_invoice_filter') }}?filterValue="+lastSelectedValue;

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
    document.getElementById('openModalBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });


   
    // Menangani klik pada tombol tambah
    function tambahRestok(element) {
        event.preventDefault();
        console.log('masuk modal tambah');
        
        $('#tambahModal').modal('show'); // Tampilkan modal

    }


    //Untuk Mereset data input checkbox dan total kubik di modal hitung kubk
    document.getElementById('tambahModal').addEventListener('hidden.bs.modal', function () {
        var checkboxes = document.querySelectorAll('.kubik-checkbox-tambah'); //Inisiasi variabel yang mengambil value select dari class kubik-checkbox-tambah
        checkboxes.forEach(function(checkbox) { //Untuk mengambil input checkbox sesuai urutan berdasarkan array
            checkbox.checked = false; //Untuk menonaktifkan input checkbox
        });
        document.getElementById('total-kubik').textContent = 0; //menset nilai total-kubik menjadi 0
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
            var id_nama_perusahaan = document.getElementById('id_nama_perusahaan').value;
            // var id_kode_barang = document.getElementById('kode_barang').value;
              var filterValue = document.querySelector('input[name="filter"]:checked').value;
            console.log(id_nama_perusahaan)
            

            
            // Membuat query string dari data yang akan dikirim
            // console.log(id_kode_barang)
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

        $('#sendImportBarang').click(function(event) {
            event.preventDefault();
             var selectedCheckboxes = $('.kubik-checkbox-tambah:checked');
            var formData = {
                // id_product: $('input[name=id_product]').val(),
                idrestok: [],
                valuerestok: []
            };
             selectedCheckboxes.each(function(index) {
                
                var hiddenInputValue = $(this).next('input[type="hidden"]').val();
                
                formData.idrestok.push(hiddenInputValue);
                if (hiddenInputValue) {
                    formData.valuerestok.push(1); 
                }
            });
             console.log('formdata',formData)
              $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_importbarang_comercial_invoice') }}',
                data: formData,
                success: function(response) {
                    console.log('Data berhasil dikirim:', response);

                 
                    var contentContainer = $('#content-container2');
                    contentContainer.empty();
                    var contentContainer2 = $('#content-container3');
                    contentContainer2.empty();
               
                    var directory = response.url_gambar; 
                    var hscodehistory =[];
                    var grossWeight =0;
                    var nettWeight=0;
                    var without_tax=0;
                    var unitPriceUsd=0;
                    var totalPriceUsd=0;
                    var qty_input7  =0;
                    var tdElement =0;
                    response.orderpembelian.forEach(function(order,index) {
        
                      
               
    
                        
                        var productName = order.product.name;
                        var gambarName ='https://maxipro.id/images/barang/'+order.product.image;
                        console.log(gambarName)
                        
                        var newTable1 = $('<table>');
                        var inputDetailElement = $('<input />').attr({
                            'id': 'id_edit_import'+index,          
                            'name': 'restok_'+(index),      
                            'class': 'form-control restok_import_tambah',    
                            'placeholder': '',        
                            'type': 'text',          
                            'value':order.id
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });

                        var input_barangElement = $('<input />').attr({
                            'id': 'id_barang_import'+index,          // ID untuk elemen input
                            'name': 'inputName',      // Nama untuk elemen input
                            'class': 'form-control',    // Kelas CSS untuk elemen input
                            'placeholder': '',        // Placeholder untuk elemen input
                            'type': 'text',          // Tipe input
                            'value': order.id_barang
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        
                        var newTr1 = $('<tr>');
                        var newRowTd1 = $('<td style="border: 1px solid #696868; color: black;">');
                        
                        var img = $('<img style="width: 350px;height:320px;">');
                        img.attr('src', gambarName);
                        
                     
                        var newRowTd = $('<td style="border: 2px solid #696868; color: black; width: 100%;">');
                        var newTable = $('<table style="width: 100%;padding-left: 1px;">');
                        
                        var newTr = $('<tr style="border: 1px solid #d7d7d7; color: black;">');
                        var newTr2 = $('<tr style="border: 1px solid #d7d7d7;color: black;">');
                        var newTr3 = $('<tr style="border: 1px solid #d7d7d7;color: black;">');
                        var newTr4 = $('<tr style="border: 1px solid #d7d7d7;color: black;">');
                        var newTr5 = $('<tr style="border: 1px solid #d7d7d7;color: black;">');
                        var newTr6 = $('<tr style="border: 1px solid #d7d7d7;color: black;">');
                        var newTd = $('<td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">');
                            newTd.text(productName); // Mengatur teks sel dengan nama produk
                        var newTd2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">');
                            newTd2.html('Chinese Name<br>中文品名'); 
                        var newTdChineseName = $('<td colspan="2" style="border: 1px solid #d7d7d7;">');
                        var inputChineseName = $('<input />').attr({
                            'id': 'chinese_name_import'+index,
                            'name': 'chinese_name_' + (index),  
                            'class': 'form-control chinese_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.name_china,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });

                        newTdChineseName.append(inputChineseName);
                        var newTd3 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold;width:25.7%; ">');
                            newTd3.html('English Name<br>英文品名');

                        var newTdEnglishName = $('<td colspan="2" style="border: 1px solid #d7d7d7;">');
                        var inputEnglishName = $('<input />').attr({
                            'id': 'english_name_import'+index,
                            'name': 'english_name_' + (index),  
                            'class': 'form-control english_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.name_english,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                            newTdEnglishName.append(inputEnglishName);
                        var newTd4 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold;width:25.7%;">');
                            newTd4.html('Model<br>型号');
                        var newTdModel = $('<td colspan="2" style="border: 1px solid #d7d7d7;">');
                        var modelValue = order.product.model || ''; // Jika order.model null, maka gunakan string kosong
                        // var inputModel = $('<input type="text" style="width:100%;border: 1px solid #696868; color: black; padding: 10px;" value="' + modelValue + '">'); // Membuat elemen input dengan nilai dari modelValue
                        var inputModel = $('<input />').attr({
                            'id': 'model_import'+index,
                            'name': 'model_name_' + (index),  
                            'class': 'form-control model_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value': modelValue,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        }); 

                        newTdModel.append(inputModel);
                        var newTd5 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold;width:25.7%;">');
                            newTd5.html('Brand<br>品牌'); 
                            var brandValue = order.product.brand || '';
                        var newTdBrand = $('<td colspan="2" style="border: 1px solid #d7d7d7;">');
                        // var inputBrand = $('<input type="text" style="width:100%;border: 1px solid #696868; color: black; padding: 10px;" value="' + brandValue + '">'); // Membuat elemen input dengan nilai dari modelValue
                        var inputBrand = $('<input />').attr({
                            'id': 'brand_import'+index,
                            'name': 'brand_name_' + (index),  
                            'class': 'form-control brand_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value': brandValue,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        }); 

                        newTdBrand.append(inputBrand);
                        var newTd6 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold;width:25.7%;">');
                            newTd6.html('HS Code<br>海关编码'); 
                        var newTdHsCode = $('<td style="border: 1px solid #d7d7d7;">');
                        var selectHsCode = $('<select style="width:100%;border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control hscode-import">' +
                                        '<option value="">Pilih Hs Code</option>' +            
                                        '</select>'); // Membuat elemen select
                            newTdHsCode.append(selectHsCode);
                        var newTdHsCode2 = $('<td style="border: 1px solid #d7d7d7;">');
                       
                        var inputHsCode = $('<input />').attr({
                            'id': 'hscode-import-edit',
                            'name': 'hscode-input_' + (index),  
                            'class': 'form-control hscode_import',    
                            'placeholder': '',        
                            'type': 'text',
                            // 'value': newTdBrand,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        }); 

                        newTdHsCode2.append(inputHsCode);
                        newTr.append(newTd);
                        newTr2.append(newTd2);
                        newTr2.append(newTdChineseName);
                        newTr3.append(newTd3);
                        newTr3.append(newTdEnglishName);
                        newTr4.append(newTd4);
                        newTr4.append(newTdModel);
                        newTr5.append(newTd5);
                        newTr5.append(newTdBrand);
                        newTr6.append(newTd6);
                        newTr6.append(newTdHsCode);
                        newTr6.append(newTdHsCode2);
                        newTable.append(newTr);
                        newTable.append(newTr2);
                        newTable.append(newTr3);
                        newTable.append(newTr4);
                        newTable.append(newTr5);
                        newTable.append(newTr6);
                        newRowTd1.append(img);
                        newRowTd.append(newTable);
                        newTr1.append(newRowTd1);
                        newTr1.append(newRowTd);

 
                        var newTable2 = $('<table>')
                        var newTrTable2 = $('<tr>')
                        var newTdLast = $('<td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                            newTdLast.html('Size(CM)<br>每件尺寸');
                        var newTd2Last = $('<td  colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                            newTd2Last.html('Package Size(CM) <br>每个包装的尺寸');
                        var newTd3Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd3Last.html('Quantity <br>数量');
                        var newTd4Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd4Last.html('Nett <br> Weight <br>(KG) <br>净重 ');
                        var newTd5Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd5Last.html('Gross Weight <br>(KG) <br>毛重');
                        var newTd6Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd6Last.html('CBM<br>Volume <br>(M3) <br>体积');
                        var newTd7Last = $('<td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd7Last.html('Unit Price Without<br> Tax <br>不含税单价 ');
                        var newTd8Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd8Last.html('Unit Price USD');
                        var newTd9Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd9Last.html('Total Price Without Tax <br>不含税总价');
                        var newTd10Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd10Last.html('Total Price <br>USD');
                        var newTd11Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                            newTd11Last.html('Use<br>用途');
                        
                        var newTr2Table2 = $('<tr>')
                        var newTd2Tr2Table2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                        newTd2Tr2Table2.html('Length(CM) <br>长');
                        var newTd3Tr2Table2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                        newTd3Tr2Table2.html('Width(CM) <br>长<');
                        var newTd4Tr2Table2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                        newTd4Tr2Table2.html('Height(CM) <br>长');
                        var newTd5Tr2Table2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                        newTd5Tr2Table2.html('Length(CM) <br>长');
                        var newTd6Tr2Table2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                        newTd6Tr2Table2.html('Width(CM) <br>长');
                        var newTd7Tr2Table2 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center;">');
                        newTd7Tr2Table2.html('Height(CM) <br>长');

                        var newTr3Table2 = $('<tr>');
                        var newTdTr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')

                        var inputElement = $('<input />').attr({
                            'id': 'long_import'+index,          // index untuk urutan elemen input
                            'name': 'long_' + (index),  
                            'class': 'form-control long_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.long * 100,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTdTr3Table2.append(inputElement);
                        
                        var newTd2Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement2 = $('<input />').attr({
                            'id': 'width_import'+index,     
                            'name': 'width_'+ (index),      
                            'class': 'form-control width_import',    
                            'placeholder': '',   
                            'type': 'text',
                            'value': order.product.width * 100,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'   
                        });
                        newTd2Tr3Table2.append(inputElement2);

                        var newTd3Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement3 = $('<input />').attr({
                            'id': 'height_import'+index,         
                            'name': 'height_'+ (index),      
                            'class': 'form-control height_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value' : order.product.height * 100,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTd3Tr3Table2.append(inputElement3);
                        
                        var newTd4Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement4 = $('<input />').attr({
                            'id': 'long_p_import'+index,    
                            'name': 'long_p_'+ (index),      
                            'class': 'form-control long_p_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.long_p * 100,            
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        newTd4Tr3Table2.append(inputElement4);
                        
                        var newTd5Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement5 = $('<input />').attr({
                            'id': 'width_p_import'+index,   
                            'name': 'width_p_'+ (index),      
                            'class': 'form-control width_p_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.width_p * 100,            
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        newTd5Tr3Table2.append(inputElement5);
                        
                        var newTd6Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement6 = $('<input />').attr({
                            'id': 'height_p_import'+index,   
                            'name': 'height_p_'+ (index),      
                            'class': 'form-control height_p_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.height_p            
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        newTd6Tr3Table2.append(inputElement6);

                        var newTd7Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                       
                        var inputElement7 = $('<input />').attr({
                            'id': 'qty_import'+index,          
                            'name': 'qty_'+(index),
                            'class': 'form-control qty_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.jml_permintaan 
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        // .on('change', updateQuantity2); // Attach change event

                        // Initialize qty_qty2 with current values
                        // console.log('inputElement7',parseFloat(inputElement7.val()))
                        // qty_qty2[index] = parseFloat(inputElement7.val()) || 0;
                        // updateQuantity2();
                        newTd7Tr3Table2.append(inputElement7);
                       
                     

                       
                         
                        if (response.hscodehistory.length > 0) {
                            
                            grossWeight = response.hscodehistory[index].gross_weight;
                            nettWeight = response.hscodehistory[index].nett_weight;
                        } else {
                            grossWeight = 0;
                            nettWeight =0;
                     
                        }
                     
                        var newTd8Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement8 = $('<input />').attr({
                            'id': 'nett_weight_import'+index,          
                            'name': 'net_weight_'+(index),      
                            'class': 'form-control nett_weight_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': nettWeight,
                            
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTd8Tr3Table2.append(inputElement8);
                        
                        var newTd9Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement9 = $('<input />').attr({
                            'id': 'gross_weight_import'+index,          
                            'name': 'gross_weight_'+(index),      
                            'class': 'form-control gross_weight_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value':grossWeight
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTd9Tr3Table2.append(inputElement9);
                       
                        var newTd10Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement10 = $('<input />').attr({
                            'id': 'cbm_import'+index,       
                            'name': 'cbm_'+(index),      
                            'class': 'form-control cbm_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': 0 
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        newTd10Tr3Table2.append(inputElement10);
                        // Function to update CBM value based on input changes
            
                        function updateCBM() {

                            var long_p = parseFloat(inputElement4.val()) || 0;
                            var width_p = parseFloat(inputElement5.val()) || 0;
                            var height_p = parseFloat(inputElement6.val()) || 0;
                            var qty_value = parseFloat(inputElement7.val()) || 0;
                            var cbmValue = ((long_p/100) * (width_p/100) * (height_p/100) * qty_value);
                            cbmValue = cbmValue.toFixed(2);

                            inputElement10.val(cbmValue); // Inisialisasi nilai inputElement10 dengan cbmValue

                            var cbm2 = parseFloat(cbmValue); // Ambil nilai dari cbmValue

                            cbm2Array[index] = cbm2;
                            qty_qty2[index] =qty_value





                            calculateTotalCBM();

                        }

                            // Attach input event listeners to update CBM on input change
                            inputElement4.on('blur', updateCBM);
                            inputElement5.on('blur', updateCBM);
                            inputElement6.on('blur', updateCBM);
                            

                            inputElement10.on('input', updateCBM);

                       

                        var newTd11Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement11 = $('<input />').attr({
                            'id': 'unit_price_without_tax_import'+index,          
                            'name': 'unit_price_without_tax_'+(index),      
                            'class': 'form-control unit_price_without_tax_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value':0
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTd11Tr3Table2.append(inputElement11);
                        
                        var newTd12Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement12 = $('<input />').attr({
                            'id': 'unit_price_usd_import'+index,          
                            'name': 'unit_price_usd_'+(index),      
                            'class': 'form-control unit_price_usd_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value':0,
                            'disabled':true
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTd12Tr3Table2.append(inputElement12);
                        function updateUnitPriceUsd() {
                              

                               
                              var unit_without_tax = parseFloat(inputElement11.val()) || 0;
                              // console.log('masuk',unit_without_tax)
                              var unitPriceUsd = (unit_without_tax/parseFloat(RmbToUsdTambah));
                              unitPriceUsd= unitPriceUsd.toFixed(2);
                              // unitPriceUsd = parseFloat(truncateToTwoDecimals(unitPriceUsd));
                              inputElement12.val(unitPriceUsd);
                      }
                        inputElement11.on('input',updateTotalPriceUsd);
                        inputElement11.on('input',updateUnitPriceUsd);
                        inputElement7.on('input', function() {
                            updateCBM();
                            updateTotalPriceUsd();
                            updateTotPriceWithoutTax();
                            updateQuantity();
                        })
                        var newTd13Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement13 = $('<input />').attr({
                            'id': 'total_price_without_tax_import'+index,          // ID untuk elemen input
                            'name': 'total_price_without_tax_'+(index),      // Nama untuk elemen input
                            'class': 'form-control tot_price_without_tax_import',    // Kelas CSS untuk elemen input
                            'placeholder': '',        // Placeholder untuk elemen input
                            'type': 'text',
                            'value':0,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        newTd13Tr3Table2.append(inputElement13);
                                 
                        function updateTotPriceWithoutTax() {
                            
                            var unit_price_without_tax = parseFloat(inputElement11.val()) || 0;
                            var quantity = parseFloat(inputElement7.val()) || 0;
                         
                            var without_tax_tot = quantity*unit_price_without_tax;
                            without_tax_arr[index] =parseFloat(without_tax_tot)
                          
                             calculatewithouttaxarr();
                            inputElement13.val(without_tax_tot); 
                        }

                        
                        inputElement11.on('input', updateTotPriceWithoutTax);

                        var newTd14Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement14 = $('<input />').attr({
                            'id': 'total_price_usd_import'+index,  
                            'name': 'total_price_usd_'+(index),      
                            'class': 'form-control total_price_usd_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': 0            
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });
                        newTd14Tr3Table2.append(inputElement14);
                        
                        function updateTotalPriceUsd() {
                              

                              // var qty_value = parseFloat(inputElement7.val()) || 0;
                              var qty_value = parseFloat(inputElement7.val()) || 0;
                              var unit_without_tax = parseFloat(inputElement11.val()) || 0;
                              
                              var totalPriceUsd = (parseFloat(unit_without_tax)/parseFloat(RmbToUsdTambah))*parseFloat(qty_value);
                              totalPriceUsd = totalPriceUsd.toFixed(2);
                              tot_price_without_tax_usd_import[index] = parseFloat(totalPriceUsd)
                               calculatewithouttaxusdarr();
                              inputElement14.val(totalPriceUsd);
                        }
                        
                        var newTd15Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement15 = $('<input />').attr({
                            'id': 'use_name_import'+index,          
                            'name': 'use_name_'+(index),
                            'class': 'form-control use_name_import',    
                            'placeholder': '',        
                            'type': 'text'            
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                        });

                        var deleteLink = $('<a />').attr({
                            
                            'class': 'delete-input'
                        }).css({
                            'color': 'red',
                            'display': 'inline-block',
                            'vertical-align': 'top',
                            'padding': '10px'
                        }).html('X');
                        newTd15Tr3Table2.append(inputElement15);
                        newTd15Tr3Table2.append(deleteLink);
                        
                        // Menggabungkan sel baru ke dalam baris baru
                        newTrTable2.append(newTdLast);
                        newTrTable2.append(newTd2Last);
                        newTrTable2.append(newTd3Last);
                        newTrTable2.append(newTd4Last);
                        newTrTable2.append(newTd5Last);
                        newTrTable2.append(newTd6Last);
                        newTrTable2.append(newTd7Last);
                        newTrTable2.append(newTd8Last);
                        newTrTable2.append(newTd9Last);
                        newTrTable2.append(newTd10Last);
                        newTrTable2.append(newTd11Last);

                        newTr2Table2.append(newTd2Tr2Table2)
                        newTr2Table2.append(newTd3Tr2Table2)
                        newTr2Table2.append(newTd4Tr2Table2)
                        newTr2Table2.append(newTd5Tr2Table2)
                        newTr2Table2.append(newTd6Tr2Table2)
                        newTr2Table2.append(newTd7Tr2Table2)
                        
                        newTr3Table2.append(newTdTr3Table2)
                        newTr3Table2.append(newTd2Tr3Table2)
                        newTr3Table2.append(newTd3Tr3Table2)
                        newTr3Table2.append(newTd4Tr3Table2)
                        newTr3Table2.append(newTd5Tr3Table2)
                        newTr3Table2.append(newTd6Tr3Table2)
                        newTr3Table2.append(newTd7Tr3Table2)
                        newTr3Table2.append(newTd8Tr3Table2)
                        newTr3Table2.append(newTd9Tr3Table2)
                        newTr3Table2.append(newTd10Tr3Table2)
                        newTr3Table2.append(newTd11Tr3Table2)
                        newTr3Table2.append(newTd12Tr3Table2)
                        newTr3Table2.append(newTd13Tr3Table2)
                        newTr3Table2.append(newTd14Tr3Table2)
                        newTr3Table2.append(newTd15Tr3Table2)
                        
                        newTable2.append(newTrTable2);
                        newTable2.append(newTr2Table2);
                        newTable2.append(newTr3Table2);
                    
                        newTr1.append(newTable2);
                        
                        
                        newTable1.append(inputDetailElement)
                        newTable1.append(input_barangElement)
                        newTable1.append(newTr1)
                    
                        
            
                        // Buat elemen <div> dengan atribut, kelas, dan gaya yang sesuai
                        var newDivSaveItem = $('<div></div>', {
                            class: 'form-group',
                            css: {
                                display: 'flex',
                                paddingTop: '30px',
                                textAlign: 'end',
                                marginLeft:'1390px'
                            }
                        });

                        // Buat elemen <button> dengan atribut, kelas, dan gaya yang sesuai
                        var newButtonSaveItem = $('<button></button>', {
                            type: 'button',
                            id: 'submitButtonImportBarangComercialInvoice_'+index, // Gunakan variabel ascendingIndex sesuai kebutuhan Anda

                            class: 'btn btn-primary',
                            
                            text: 'Simpan Item',
                            css: {
                                marginLeft: 'auto'
                            }
                        });
                        
                        var currentIndex = index;
                         newButtonSaveItem.on('click', function() {
                                
                                var formData ={
                                    
                                    longValue : $('#long_import' + currentIndex).val(),
                                    widthValue : $('#width_import' + currentIndex).val(),
                                    heightValue : $('#height_import' + currentIndex).val(),
                                    long_pValue : $('#long_p_import' + currentIndex).val(),
                                    width_pValue : $('#width_p_import' + currentIndex).val(),
                                    height_pValue : $('#height_p_import' + currentIndex).val(),
                                    qty_Value : $('#qty_import' + currentIndex).val(),
                                    
                                };
                                console.log('formData',formData);
                                $.ajax({
                                    url: '', // Ganti dengan URL tujuan Anda
                                    type: 'GET',
                                    data: formData,
                                    
                                    success: function(response) {
                                        alert('Data berhasil disimpan!');
                                    },
                                    error: function(xhr, status, error) {
                                        alert('Terjadi kesalahan: ' + error);
                                    }
                                });
                                  
                            });
                        
                        var newTrLast2 = $('<tr>');
                        var newTdLast2 = $('<td colspan="12"><br></td>'); // Menambahkan colspan dan <td> yang benar
                        newTrLast2.append(newTdLast2);
                        contentContainer.append(newTable1); // Menggunakan newTrLast bukan newTr1


                        contentContainer.append(newTable2, newTrLast2)
                        
                            var selectElement = $('.hscode-import'); // Pilih elemen select
                            const choices = new Choices(selectElement[0], {
                                searchEnabled: true,
                                itemSelectText: '',
                            });

                            selectElement.on('change', function(event) {
                                const selectedValue = event.target.value;
                                const inputElement = document.getElementById('hscode-import-edit'); // Ganti dengan ID yang sesuai
                                if (inputElement) {
                                    inputElement.value = selectedValue;
                                }
                            });
                        
                    });
                    
                        var newDivTable3 = $('<div>').css({
                            'padding-left': '1000px'
                        });
                        var newTable3 = $('<table>')
                        var newTr1Table3 = $('<tr>')
                        var newTd1Tr1Table3 = $('<td>').css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            'width': '80%'
                        }).text('freight cost');
                     
                     

                        var newTd2Tr1Table3 = $('<td>').css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            
                        })
                       
                        var inputTd2Tr1Table3 = $('<input>').attr({
                            type: 'text',
                            id: 'freight_cost_id_tab_tambah',
                            name: 'freight_cost_tambah', 
                            value: 0,
                            class: 'form-control custom-border', 
                        });
                        newTd2Tr1Table3.append(inputTd2Tr1Table3)
                        newTr1Table3.append(newTd1Tr1Table3,newTd2Tr1Table3)
                        inputTd2Tr1Table3.on('input', function() {
                            
                            calculatewithouttaxarr();
                            calculatewithouttaxusdarr();
                        })
                        var newTr2Table3 = $('<tr>')
                        var newTd1Tr2Table3 = $('<td>').css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            'width': '75%'
                        }).text('Insurance');
                        var newTd2Tr2Table3 = $('<td>').css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            
                        })

                        var inputTd2Tr2Table3 = $('<input>').attr({
                            type: 'text',
                            id: 'insurance_edit_id_tab_tambah',
                            name: 'insurance_tambah', 
                            value: 0,
                            class: 'form-control custom-border', 
                        });
                        inputTd2Tr2Table3.on('input', function() {
                            calculatewithouttaxarr();
                            
                            calculatewithouttaxusdarr();
                        })
                        newTd2Tr2Table3.append(inputTd2Tr2Table3)
                        newTr2Table3.append(newTd1Tr2Table3,newTd2Tr2Table3)
                        newTable3.append(newTr1Table3,newTr2Table3)
                        newDivTable3.append(newTable3)
                        
                        var newDiv2Table4 = $('<div>').css({
                            
                            'padding-left': '1000px', 
                            'padding-top': '30px',
                        });
                        
                        var newTable4 = $('<table>').css({
                            'width': '100%', 
                        });
                        
                        var newTr1Table4 = $('<tr>');
                        var newTd1Tr1Table4 = $('<td>').attr('colspan', '2').css({
                            'border': '1px solid #696868', 
                            'color': 'black', 
                            
                            'text-align': 'center',
                        })
                        
                        var h5Tr1Table4 = $('<h5>').text('Total');
                        

                        var newTr2Table4 = $('<tr>');
                        var newTd1Tr2Table4 = $('<td>').css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            'width': '730px',
                        }).text('Quantity');
                        var newTd2Tr2Table4 = $('<td>').attr({
                            'class': 'custom-td-tambah', // Menambahkan kelas 'my-class'
                            'id': 'qty-td-tambah' // Menambahkan ID 'my-id'
                        }).css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            'width': '20%',
                            'padding-left': '20px'
                        }).text('0');;
                        // updateQuantity2();
                        newTd1Tr1Table4.append(h5Tr1Table4)
                        newTr1Table4.append(newTd1Tr1Table4)
                        newTr2Table4.append(newTd1Tr2Table4,newTd2Tr2Table4)
                        
                        var newTr3Table4 = $('<tr>');
                        var newTd1Tr3Table4 = $('<td>').css({
                            'border': '1px solid #696868', 
                            'color':'black',
                        }).text('CBM Volume (M3)');

                        var newTd2Tr3Table4 = $('<td>').attr({
                            'class': 'custom-cbm-tambah',
                            'id':'total_cbm_tambah'
                        }).css({
                            'border': '1px solid #696868', 
                            'color': 'black',
                            'padding-left': '20px'
                        }).text('0');
                        newTr3Table4.append(newTd1Tr3Table4,newTd2Tr3Table4)

                        var newTr4Table4 = $('<tr>');
                        var newTd1Tr4Table4 = $('<td>').css({
                            'border': '1px solid #696868', 
                            'color': 'black',
                        }).text('Total Price Without Tax');

                        var newTd2Tr4Table4 = $('<td>').attr({
                            'id': 'custom-tot-price-without-tax-td-tambah',
                        }).css({
                            'border': '1px solid #696868', 
                            'color': 'black',
                            'padding-left': '20px'
                        }).text('0');
                        newTr4Table4.append(newTd1Tr4Table4,newTd2Tr4Table4)

                        var newTr5Table4 = $('<tr>');
                        var newTd1Tr5Table4 = $('<td>').css({
                            'border': '1px solid #696868',
                            'color': 'black',
                        }).text('Total Price Without Tax USD');

                        var newTd2Tr5Table4 = $('<td>').attr({
                            'id':'custom-tot-price-without-tax-usd-td-tambah'
                        }).css({
                            'border': '1px solid #696868', 
                            'color': 'black',
                            'padding-left': '20px'
                        }).text('0');
                        newTr5Table4.append(newTd1Tr5Table4,newTd2Tr5Table4)
                        newDiv2Table4.append(newTr1Table4,newTr2Table4,newTr3Table4,newTr4Table4,newTr5Table4)
                       
                       contentContainer2.append(newDivTable3,newDiv2Table4)
                       function calculatewithouttaxarr(){
                            var freight_cost_tambah = parseFloat(inputTd2Tr1Table3.val())||0;
                            var insurance_tambah = parseFloat(inputTd2Tr2Table3.val()) || 0;
                            var TotWithout_arr_tax = tot_without_tax_arr.reduce(function(acc, curr) {
                                        return acc + curr;
                                    }, 0);
                        
                            var without_arr_tax = without_tax_arr.reduce(function(acc, curr) {
                                        return acc + curr;
                                    }, 0);
                        
                            var total_akhir = without_arr_tax+TotWithout_arr_tax+freight_cost_tambah+insurance_tambah
                            var element = document.getElementById('custom-tot-price-without-tax-td-tambah');
                            element.textContent = total_akhir
                        }
                        function calculatewithouttaxusdarr(){
                            var freight_cost_tambah = parseFloat(inputTd2Tr1Table3.val())||0;
                            var insurance_tambah = parseFloat(inputTd2Tr2Table3.val()) || 0;
                            
                            var TotWithout_tot_price_without_tax_usd = tot_price_without_tax_usd.reduce(function(acc, curr) {
                                                return acc + curr;
                            }, 0);
                            var without_tot_price_without_tax_usd_import =tot_price_without_tax_usd_import.reduce(function(acc, curr) {
                                                return acc + curr;
                            }, 0);
                            var total_akhir_without_tax_usd = TotWithout_tot_price_without_tax_usd +without_tot_price_without_tax_usd_import+freight_cost_tambah+insurance_tambah
                            var element = document.getElementById('custom-tot-price-without-tax-usd-td-tambah');
                            element.textContent = total_akhir_without_tax_usd.toFixed(2)
                        }
                        // function updateQuantity2(){
                            
                        //     var Qty_Qty2 = qty_qty2.reduce(function(acc, curr) {
                        //                         return acc + curr;
                        //     }, 0);
                        //     console.log('qty_qty2',Qty_Qty2)
                    
                        //     $('.custom-td-tambah').text(1);
                        // }
                        function updateQuantity(){
                            
                            var Qty_Qty2 = qty_qty2.reduce(function(acc, curr) {
                                                return acc + curr;
                            }, 0);
                            console.log('qty_qty2',Qty_Qty2)
                            var element = document.getElementById('qty-td-tambah');
                            element.textContent = Qty_Qty2
                        }
                        function calculateTotalCBM() {

                            
                            var totalCBM2 = cbm2Array.reduce(function(acc, curr) {
                                return acc + curr;
                            }, 0);
                            
                            var qty2 = qty_qty2.reduce(function(acc, curr) {
                                return acc + curr;
                            }, 0);
                            var tot_qty = parseFloat(totalCBM2);
                            console.log('calculateTotalCBM',tot_qty)
                            $('#total_cbm_tambah').text(tot_qty.toFixed(2));    

                        }
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', error);
                    
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