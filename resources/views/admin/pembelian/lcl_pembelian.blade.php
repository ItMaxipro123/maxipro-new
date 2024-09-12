@extends('admin.templates_baru')


@section('title')
LCL   | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{ asset('css/lcl.css') }}">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Choices.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection
@section('style')


@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp LCL</h4>
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">LCL {{ $username['data']['teknisi']['name'] }}</small>
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" id="tambah_lcl" onclick="tambahRestok()" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add LCL</a>

                                <div class="d-flex justify-content-end">
                                   
                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="openModalBtn">Filter</button>
                                       
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" style="width: 10%; margin-right: 5px;" id="clearFilterBtn">Clear Filter</button>

                                    </div>

                                </div>
                                <!-- tab nav  -->
                                <ul id="tab-nav" class="nav nav-tabs fade show" style="display: none;">
                                    <li class="nav-item"><a class="nav-link active" href="#" id="master-tab">Master</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" id="pembayaran-tab">Pembayaran</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" id="ekspedisi-tab">Ekspedisi</a></li>
                                </ul>

                                <div id="master-content" class="tab-content" style="display: none;">
                                        
                                    <div class="row" id="padding-top">
                                        <div class="col-md-12 d-flex justify-content-end">
                                        <button type="button" id="importData" class="btn btn-large btn-info">Import Data</button>
                                        </div>
                                    </div>
                                    <div class="row" id="row-supplier">
                                        <div class="col-md-6">
                                            
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                        
                                                        <label id="label" for="">Database</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <select class="form-control pilih-db" name="" id="select_db">
                                                            <option value="">Pilih Database</option>
                                                            <option value="PT">PT</option>
                                                            <option value="UD">UD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="col-supplier">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                <label id="label" for="">Supplier</label>
                                                </div>
                                                <div class="col-md-9">

                                                    <select class="form-control pilih-supplier" name="supplier_select" id="select_supplier">
                                                        <option value="">Pilih Supplier</option>
                                                        @foreach($Data['msg']['supplier'] as $index => $result)
                                                            <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
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
                                                        
                                                        <label id="label" for="">No. Referensi</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <input class="form-control"type="text" placeholder="No. Referensi" id="input-input">
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6" id="col-select">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                <label id="label" for="">Mata Uang</label>
                                                </div>
                                                <div class="col-md-9">

                                                    <select name="select_namematauang" class="form-control pilih-matauang"  id="select_matauang">

                                                            <option value="">Pilih Mata Uang</option>
                                                        @foreach($Data_barang['matauang'] as $index => $result)
                                                            <option value="{{ $result['id'] }}">( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                                <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                        
                                                        <label id="label" for="">Tanggal Transaksi</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <input class="form-control" id="tgl_request" type="text" placeholder="Tanggal Transaksi" id="input-input">
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-md-6"id="padding-top">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                
                                                </div>
                                                <div class="col-md-9 d-flex justify-content-end">
                                                    <button type="button" id="convert_idr" class="btn btn-large btn-warning">Convert to IDR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" >
                                        <div class="col-md-9">
                                                <div class="row" >
                                                    <div class="col-md-2">
                                                        
                                                        <label id="label" for="">Termin</label>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <select class="form-control" name="" id="select_termin">
                                                            @foreach($Data['msg']['termin'] as $index => $result)
                                                                <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    

                                                        
                                                    </div>
                                                    <div class="col-md-3">

                                                        <select class="form-control" name="" id="select_termin">
                                                            @foreach($Data['msg']['account'] as $index => $result)  
                                                                <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
                                                            @endforeach
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
                                                        <th>PPN</th>
                                                        <th>Gudang</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="container-import">
                                                
                                                 
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
                                                        <select class="form-control item-barang" name="" id="select_barang">
                                                            <option value="">Pilih Item</option>
                                                            @foreach($Data_barang['product'] as $index => $result)
                                                                <option value="{{ $result['id'] }}"data-new-kode="{{ $result['new_kode'] }}" 
                                                                 data-name="{{ $result['name'] }}">{{ $result['new_kode'] }} - {{ $result['name'] }}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-check text-start">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label for="">PPN</label>
                                                    </div>
                                                </div>
                                                   
                                               
                                                <div class="col-md-6"id="harga_ppn">
                                                    <div class="form-group form-check ">
                                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                               
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
                                                        <label for="select_cabang">Cabang</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select class="form-control pilih-cabang" name="" id="select_cabang">
                                                            <option value="">Pilih Cabang</option>
                                                            @foreach($Data_barang['cabang'] as $index => $result)
                                                                <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
                                                            @endforeach    
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <table class="table table-striped">
                                                <tr id="border">
                                                    <td id="border">Subtotal(Rp)</td>
                                                    <td id="border">0</td>
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
                                                    <td id="border">0</td>
                                                </tr>
                                                <tr id="border">
                                                    <td id="border">Total (Rp)</td>
                                                    <td id="border">0</td>
                                                </tr>
                                           </table>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div style="text-align:right; margin-top: 30px;">
                                    
                                                <button type="button" id="sendSave" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="importDataModal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Import From Commercial Invoice</h5>
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
                                                                                <!-- <input type="checkbox" id="filterChecked"> Show only checked -->
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-9 d-flex justify-content-end">
                                                                            <label id="supplier-importData" for="">Supplier</label>
                                                                            <input type="text" id="search-box" class="form-control d-inline-block" style="width: 100px;" placeholder="Supplier...">
                                                                        </div>
                                                                    </div>

                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Kode</th>
                                                                        <th scope="col">Perusahaan</th>
                                                                        <th scope="col">Supplier</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $number =0;
                                                                        $number2 =0;
                                                                    @endphp
                                                                    @foreach($Data['msg']['penjualan'] as $index => $result)
                                                                        @php
                                                                            $number2++;

                                                                        @endphp
                                                                        <form action="" class="form-horizontal" id="importBarang" method="get">
                                                                            @csrf
                                                                            
                                                                            <tr>
                                                                                <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">
                                                                                
                                                                            
                                                                                <input type="radio" class="kubik-checkbox-tambah" name="checkbox_{{ $number2 }}">
                                                                                <input type="hidden" class="form-control restok-input-tambah"  name="id_restok_{{ $number2 }}" value="{{ $result['id'] }}">
                                                                                
                                                                                        
                                                                                </td>
                                                                            
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">INV-{{ $result['invoice_no'] }}</td>
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['name'] }}</td>
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['supplier']['name'] }}</td>
                                                                                
                                                                                
                                                                            </tr>
                                                                            
                                                                        </form>
                                                                    @endforeach
                                                                </tbody>
                                                                
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="sendImportBarang" class="btn btn-primary">Simpan</button>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- modal convert to idr -->
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="title_convert"></h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <select class="form-control" name="" id="select_category_convert">
                                                        <option value="default">Default</option>
                                                        <option value="custom">Custom</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" >
                                                    <label for="">Nominal</label>
                                                    <input type="number" class="form-control" id="input_nominal" placeholder="" disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" id="saveConvert" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div id="pembayaran-content" class="tab-content" style="display: none;">
                                    <div>
                                        <label for="">Belum Ada LCL</label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi LCL</h5>
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
                                            <label for="kodebaranglabel">Invoice</label>
                                            <input type="text" class="form-control" placeholder="Invoice"  id="invoice"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                        </div>
                                    
                                         

                                    </form>
                                </div>

                                <div class="modal-footer">

                                    
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Simpan</button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="radio-button-container" id="radio-button">
                        <label>
                            <div class="color-box bg-light-blue"></div>
                            <input type="radio" name="filter" value="requested" id="filter-status" {{ $Data['msg']['request_check'] == 'requested' ? 'checked' : '' }}>
                            Process
                            
                        </label>
                        <label>
                            <div class="color-box bg-light-red"></div>
                            <input type="radio" name="filter" value="process" id="filter-status" {{ $Data['msg']['request_check'] == 'process' ? 'checked' : '' }}>
                            Pending / Terima Sebagian
                          
                        </label>
                        <label>
                            <div class="color-box bg-light-green"></div>
                            <input type="radio" name="filter" value="complete" id="filter-status" {{ $Data['msg']['request_check'] == 'complete' ? 'checked' : '' }}>
                            Complete
                          
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
                            @endphp
                            <!-- Table data will be populated here -->
                            @foreach($Data['msg']['pembelianlcl'] as $index => $data)
                            @php
                            \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                            $formattedDate = \Carbon\Carbon::parse($data['tgl_transaksi'])->translatedFormat('d F Y');
                           $rowStyle = '';
                            if ($data['status_process'] == 'requested') {
                                $rowStyle = 'background-color: #97ebfb;';
                            } elseif ($data['status_process'] == 'process') {
                                $rowStyle = 'background-color: #feb3aa;';
                            }
                            elseif ($data['status_process'] == 'complete') {
                                $rowStyle = 'background-color: #6cf670;';
                            }                            
                            @endphp
                        <tr style="{{ $rowStyle }}">
                            
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $num }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $formattedDate }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['invoice'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 150px; text-overflow: ellipsis;">{{ $data['supplier']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['teknisi']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['cabang']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['subtotal_idr'] }}</td>
                            
                            @if(count($data['ekspedisilcl']) >0)
                                @foreach($data['ekspedisilcl'] as $resultekspedisi)
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $resultekspedisi['tgl_kirim'] }}</td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $resultekspedisi['ekspedisi']['name'] }}</td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $resultekspedisi['resi'] }}</td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $resultekspedisi['matauang']['simbol'] }} {{ $resultekspedisi['price'] }}</td>
                                @endforeach
                            @else
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></td>
                            @endif
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['category'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    @if($data['status_converttorupiah'] == '1')
                                    <label class="label label-success"><i class="icon-check"></i></label>

                                    @else
                                    <label class="label label-danger"><i class="icon-cross"></i></label>
                                    @endif
                            </td>
                            <td style="border: 1px solid #d7d7d7;">
                                @if($data['status_process'] == 'requested')
                                <a href="javascript:void(0)" onclick="updateRestok(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-info btn-edit" style="width: 35px; height: 38px; padding: 9px 10px;"title="Edit"> <i class="fas fa-edit"></i></a>
                                
                                
                                @endif
                                <a href="javascript:void(0)" 
                                onclick="rejectOrderPembelian(this)" 
                                data-id="{{ $data['id'] }}" 
                                name="{{ $data['invoice'] }}" 
                                class="btn btn-large btn-info btn-danger" 
                                style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="Reject Order">
                                <i class="fas fa-times"></i>
                                  </a>
                                <a href="javascript:void(0)" onclick="deleteOrderPembelian(this)" data-id="{{ $data['id'] }}" name="{{ $data['invoice'] }}" class="btn btn-large btn-info btn-danger" style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="Delete"><i class="fas fa-trash-alt"></i></a>

                            </td>
                        </tr>


                            @php
                            $num++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
 

                  
                    <!-- modal edit lcl -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="overlay" style="display: none;"></div>
                        <div id="tabe-stok"></div>

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                       

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="Formedit">

                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload()" >Close</button>
                                   
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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


            window.location.href = '{{ route('admin.pembeliaan_restok') }}'; 
    })

    //untuk membuat datatable
    $(document).ready(function() {
        var table = $('#tabe-stok').DataTable({
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
                    data: 'sales',
                    title: 'Sales'
                },
                {
                    data: 'cabang',
                    title: 'Cabang'
                },
                {
                    data: 'subtotal_idr',
                    title: 'Total'
                },
                {
                    data: 'tgl_pengiriman',
                    title: 'Tanggal Pengiriman'
                },
                {
                    data: 'ekspedisi',
                    title: 'Ekspedisi'
                },
                {
                    data: 'resi',
                    title: 'Resi'
                },
                {
                    data: 'harga',
                    title: 'Harga'
                },
                {
                    data: 'category',
                    title: 'Kategori'
                },
                {
                    data: 'convert',
                    title: 'Convert'
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

        // Store the table instance globally
        window.dataTableInstance = table;
    });

</script>


<script>
   
    
    //filter untuk status
    $(document).ready(function(){
       
        var lastSelectedValue = $('input[type=radio][name=filter]:checked').val();

        // Function to handle AJAX request
        function sendFilterData(selectedValue) {
            // console.log('filter',selectedValue)
            $.ajax({
                url: '{{ route('admin.pembelian_lcl_filter') }}', // Replace with your server endpoint
                method: 'GET',
                data: { 
                    filterValue: selectedValue 
                },
                success: function(response) {
                    // Handle success response
                    // console.log(response);
            var newRoute = "{{ route('admin.pembelian_lcl_filter') }}?filterValue="+lastSelectedValue;

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
    document.getElementById('importData').addEventListener('click', function() {
        console.log('modal impor data')
        $('#importDataModal').modal('show');
    })
    $('#master-tab').on('click', function() {
                $('.tab-content').hide();
                $('#master-content').show();
            });

            $('#pembayaran-tab').on('click', function() {
                $('.tab-content').hide();
                $('#pembayaran-content').show();
    });
   
    // Menangani klik pada tombol tambah
    window.tambahRestok = function() {
                if (window.dataTableInstance) {
                    window.dataTableInstance.destroy();
                }
                $('#openModalBtn').remove();
                $('#tabe-stok').remove();
                $('#radio-button').remove();
                $('#clearFilterBtn').remove();
                $('#tambah_lcl').remove();
                $('#tab-nav').show();
                $('#master-tab').trigger('click'); // Show master content by default
    };
    
    //Untuk Menjumlahkan total kubik yang telah dicentang
    function calculateTotalKubik() {
        var checkboxes = document.querySelectorAll('.kubik-checkbox');
        var totalKubik = 0;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var kubikValue = parseFloat(checkbox.closest('tr').querySelector('.kubik-value').textContent);
                totalKubik += kubikValue;

            }
        });
        
        document.getElementById('total-kubik').textContent = totalKubik;
    }

    //Untuk Mereset data input checkbox dan total kubik di modal hitung kubk
    document.getElementById('tambahModal').addEventListener('hidden.bs.modal', function () {
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

        var url = "{{ route('admin.pembelian_lcl_editview') }}";

        $.ajax({
            url: url,
            type: 'GET', // Menggunakan metode GET
            data: {
                id_lcl: id
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

<script src="../assets/js/lcl/lcl.js"></script>

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
            var invoice = document.getElementById('invoice').value;
              var filterValue = document.querySelector('input[name="filter"]:checked').value;
            console.log(tgl_awal)
  
            // Membuat query string dari data yang akan dikirim
            
            var queryString = 'tgl_awal=' + encodeURIComponent(tgl_awal) + '&tgl_akhir=' + encodeURIComponent(tgl_akhir)+'&invoice=' + encodeURIComponent(invoice)+'&filterValue=' + encodeURIComponent(filterValue);
            console.log('queryString',queryString)
            // Menambahkan nilai 'checked' jika checkbox dicentang
            if (checkdatevalue === 'checked') {
                queryString += '&checkdatevalue=' + encodeURIComponent(checkdatevalue);
            }

            // Mendefinisikan URL target
            var url = "{{ route('admin.pembelian_lcl_filter') }}" + '?' + queryString;

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

                     var reloadUrl = "{{ route('admin.pembelian_lcl_filter') }}" + '?' + queryString;
                
                    window.location.href = reloadUrl;

                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        });
    });
</script>

<script>

    var clickConvert = false;
    var selectBarang =[];
    var tdHargaBelumPpnProduct;
    var inputtdHargaBelumPpnProduct;
    var nominalHargaInvoice;
    $(document).ready(function() {

        var contentImport = $('.container-import');
             var newBoolHargaBelumPpn = false;
          var nominal_convert;
          
          var isHeaderCreated =false;
        //untuk proses select item
        document.getElementById('select_barang').addEventListener('change',function(){
            var importBarang = this.value
  
            
            $.ajax({
                url:"{{ route('admin.pembelian_lclimportbarang') }}",
                method:'GET',
                data:{id:importBarang},
                success: function(response){
                   console.log('clickConvertPilihItem',clickConvert)
                    console.log('response',response)
                    selectBarang.push(response.product);
                    console.log('selectBarang',selectBarang)

                    response.product.forEach(function(optionBarang,index){

                       
                            var trProduct = $('<tr>');
                            var tdProduct = $('<td>').css({
                                'padding': 'auto',
                                'width': '10%'
                            });
                        
                            var imgProduct = $('<img class="img-fluid" style="max-width: 20%%; height: auto;">');
                            imgProduct.attr('src',response.directory+optionBarang.image)
                            tdProduct.append(imgProduct);
                            var td1Product = $('<td>').css({
                                    'padding': 'auto',
                                    'width': '25%',  
                            });
                            var inputtd1Product = $('<input>', {
                                    type: 'text', 
                                    class: 'form-control', 
                                    value: optionBarang.name 
                            });
                            inputtd1Product.css({
                                    'border': '1px solid #696868', 
                                    'color': 'black', 
                                    'padding': '10px',
                                    'width': '100%' 
                            });
                            var td2Product = $('<td>').css({
                                    'padding': 'auto',
                                    'width': '10%', 
                            });
                           
                            var inputtd2Product = $('<input>', {
                                    type: 'number', 
                                    class: 'form-control',
                                    value: optionBarang.price_list 
                            });
                            nominalHargaInvoice =optionBarang.price_list 
                            inputtd2Product.css({
                                    'border': '1px solid #696868', 
                                    'color': 'black', 
                                    'padding': '10px',
                                    'width': '100%' 
                            });

                            tdHargaBelumPpnProduct = $('<td>').css({
                                    'padding': 'auto',
                                    'width': '10%', 
                                    'display': 'none'
                            });
                            
                            inputtdHargaBelumPpnProduct = $('<input>', {
                                    type: 'number', 
                                    class: 'form-control',
                                    value: '',
                                    disabled:'true'
                            });
                            inputtdHargaBelumPpnProduct.css({
                                    'border': '1px solid #696868', 
                                    'color': 'black', 
                                    'padding': '10px',
                                    'width': '100%' 
                            });
                            tdHargaBelumPpnProduct.append(inputtdHargaBelumPpnProduct)
                            var td3Product = $('<td>').css({
                                    'padding': 'auto', 
                                    'width': '7%',  
                            });
                           
                             if(clickConvert==true){
                                // clickConvertFunction();
                                
                            
                             
                                tdHargaBelumPpnProduct.css({
                                                        'display': 'table-cell' // or 'block' depending on your layout
                                                    });
                                inputtdHargaBelumPpnProduct.css({
                                                        'opacity': 1, // Make the <input> fully visible
                                                        'visibility': 'visible' // Make the <input> visible
                                                    });
                                inputtdHargaBelumPpnProduct.val(nominal_convert*optionBarang.price_list)
                            }   
                           
                            var inputtd3Product = $('<input>', {
                                    type: 'number', 
                                    class: 'form-control',
                                    value: 1 
                            });
                            inputtd3Product.css({
                                    'border': '1px solid #696868', 
                                    'color': 'black', 
                                    'padding': '10px', 
                                    'width': '100%' 
                            });
                        
                            var td4Product = $('<td>').css({
                                    'padding': 'auto', 
                                    'width': '7%',  
                            });
                            var inputtd4Product = $('<input>', {
                                    type: 'text', 
                                    class: 'form-control', 
                                    value: 0 
                            });
                            inputtd4Product.css({
                                    'border': '1px solid #696868', 
                                    'color': 'black', 
                                    'padding': '10px', 
                                    'width': '100%' 
                            });
                            var td5Product = $('<td>').css({
                                    'padding': 'auto', 
                                    'width': '10%',  
                            });
                            var inputtd5Product = $('<input>', {
                                    type: 'text', 
                                    class: 'form-control', 
                                    value: ''
                            });
                            inputtd5Product.css({
                                    'border': '1px solid #696868', 
                                    'color': 'black', 
                                    'padding': '10px', 
                                    'width': '100%' 
                            });
                            function updateCalculatedValue() {
                                // Parse the values or default to 0 if not a number
                                var value1 = parseFloat(inputtd2Product.val()) || 0;
                                var value2 = parseFloat(inputtd3Product.val()) || 0;
                                // Calculate the new value
                                var calculatedValue = value1 * value2;
                                // Set the calculated value to inputtd5Product
                                inputtd5Product.val(calculatedValue);
                            }

                            // Initial calculation
                            updateCalculatedValue();

                            // Update calculation when values change
                            inputtd2Product.on('input', updateCalculatedValue);
                            inputtd3Product.on('input', updateCalculatedValue);
                            td1Product.append(inputtd1Product)
                            td2Product.append(inputtd2Product)
                            td3Product.append(inputtd3Product)
                            td4Product.append(inputtd4Product)
                            td5Product.append(inputtd5Product)
                            var td6Product = $('<td>').css({
                                    'padding': 'auto', 
                                    'width': '5%',  
                            });
                            var checkboxElementProduct = $('<input>', {
                                    type: 'checkbox',
                                    
                                    id: 'checkboxId',
                                    value: 'checkboxValue'
                            });
                            checkboxElementProduct.css({
                                    
                                        'border': '1px solid #696868',
                            })
                           
                           
                            // Append the checkbox and label to the table cell
                            td6Product.append(checkboxElementProduct)
                            
                            var td7Product = $('<td>')
                            var selectGudang = $('<select>', {
                                class: 'form-control choices-select-gudang' // class for styling
                            }).css({
                                'border': '1px solid #696868', // Border color and style
                                'color': 'black', // Text color
                                'padding': '10px', // Padding inside the select
                                'width': '100%' // Full width of the container
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
                          

                            trProduct.append(tdProduct,td1Product,td2Product,tdHargaBelumPpnProduct,td3Product,td4Product,td5Product,td6Product,td7Product,td8Product)
                            contentImport.append(trProduct)
                    });
                    document.querySelectorAll('.choices-select-gudang').forEach(function(selectElement) {
                            new Choices(selectElement, {
                                searchEnabled: true,
                                removeItemButton: true,
                                itemSelectText: 'Select an option'
                            });
                    });
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('Error:',textStatus,errorThrown);
                }
            })
        });
     

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
     
        //untuk proses import data barang
        $('#sendImportBarang').click(function(event) {
            event.preventDefault();
            
            var selectedCheckboxes = $('.kubik-checkbox-tambah:checked');
            var hiddenInput = selectedCheckboxes.siblings('.restok-input-tambah');
            var hiddenValue = hiddenInput.val();
            var formData = {
                idcommercial:hiddenValue,
                
            };
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_lclimport') }}',
                data: formData,
                success: function(response) {
                   // console.log('response',response)
                   // console.log('response product',response.commercialid.detail)
                   var responseMataUangId = response.matauang.id;
                   var responseSimbolMataUang = response.matauang.simbol;
                   var responseSupplierId = response.supplier.id;
                   var responseSupplierName = response.supplier.name;
                    
                   
                    var colsupplierElement = $('#col-supplier');
                    colsupplierElement.remove()
                    var newDivContentSupplier = `
                    <div class="col-md-6" id="col-supplier">
                                            <div class="row" id="padding-top">
                                                <div class="col-md-3">
                                                <label id="label" for="">Supplier</label>
                                                </div>
                                                <div class="col-md-9">

                                                    <select class="form-control pilih-supplier-choices" name="supplier_select" id="select_supplier_choices" disabled>
                                                        <option value="${responseSupplierId}">${responseSupplierName}</option>
                                                    </select>
                                                </div>
                                            </div>
                    </div>
                    `;
                    $('#row-supplier').append(newDivContentSupplier);
                    var colselectElement = $('#col-select');
                    colselectElement.remove()
                    var newDivContent = `
                    <div class="col-md-6">
                    <div class="row" id="padding-top">
                    <div class="col-md-3">
                    <label id="label" for="">Mata Uang</label>
                    </div>
                    <div class="col-md-9">
                    <select name="select_namematauang" class="form-control pilih-matauang-choices" id="select_matauang_choices">
                    <option value="">Pilih Mata Uang</option>
                    @foreach($Data_barang['matauang'] as $index => $result)
                    <option value="{{ $result['id'] }}" ${responseMataUangId == "{{ $result['id'] }}" ? 'selected' : ''}>
                    ( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}
                    </option>
                    @endforeach
                    </select>
                    </div>
                    </div>
                    </div>
                    `;
                    $('#row-select').append(newDivContent);
            
                        // if (Array.isArray(response.commercialid.detail)) {
                    
                        contentImport.empty();
                        var gudangId =[];
                        var gudangName =[];
                      
                        response.gudang.forEach(function(importGudang,index){
                            gudangId.push(importGudang.id)
                            gudangName.push(importGudang.name)
                        })


                        // Iterate over the array and build table rows
                        response.commercialid.detail.forEach(function(importItem, index) {
                            var name =importItem.restok.product.name
                            var image =response.directory+''+importItem.restok.product.image
                            var price_without_tax = importItem.unit_price_without_tax
                            var Qty =importItem.qty
                            var disc = importItem.restok.product.hpp
                            var total_price_without_tax = importItem.total_price_without_tax
                           
                            var netTr1 = $('<tr>');

                            // element td img
                            var newTd1 = $('<td>').css({
                                'padding': 'auto',
                                'width': '10%',
                            });
                            var img = $('<img class="img-fluid" style="max-width: 20%%; height: auto;">');

                            img.attr('src', image);
                            newTd1.append(img)
                            
                            // element td name
                            var newTd2 = $('<td>').css({
                                'padding': 'auto',  
                                'width': '25%',  
                            });
                            
                            var inputName = $('<input>', {
                                type: 'text', 
                                class: 'form-control', 
                                value: name 
                            });
                            inputName.css({
                                'border': '1px solid #696868', // Border color and style
                                'color': 'black', // Text color
                                'padding': '10px', // Padding inside the input
                                'width': '100%' // Full width of the container
                            });
                            newTd2.append(inputName)
                           
                            //element td price belum ppn
                            var newTd3 = $('<td>').css({
                                'padding': 'auto', 
                                'width': '10%',  
                            });;
                           
                            
                            var inputElement = $('<input>', {
                                type: 'number', 
                                class: 'form-control', 
                                value: price_without_tax 
                            });

                            
                            inputElement.css({
                                'border': '1px solid #696868', 
                                'color': 'black', 
                                'padding': '10px',
                                'width': '100%'
                            });

                            newTd3.append(inputElement);

                           //element td qty
                            var newTd4 = $('<td>').css({
                                'padding': 'auto',  
                                'width': '7%',  
                            });
                            var inputQty = $('<input>',{
                                type: 'number',
                                class: 'form-control',
                                value: Qty
                            });
                            inputQty.css({
                                'border': '1px solid #696868', 
                                'color': 'black', 
                                'padding': '10px',
                                'width': '100%' 
                            });
                            newTd4.append(inputQty)

                            //element td discount
                            var newTd5 = $('<td>').css({
                                'padding': 'auto',
                                'width': '7%',  
                            });
                            var inputDisc = $('<input>',{
                                type: 'number',
                                class: 'form-control',
                                value: disc
                            });
                            inputDisc.css({
                                'border': '1px solid #696868', 
                                'color': 'black', 
                                'padding': '10px',
                                'width': '100%' 
                            });
                            newTd5.append(inputDisc)

                            //element td subtotal
                            var newTd6 = $('<td>').css({
                                'padding': 'auto', 
                                'width': '10%',  
                            });
                            var inputSubtotal = $('<input>',{
                                type: 'number',
                                class: 'form-control',
                                value: ''
                            });
                            newTd6.append(inputSubtotal)

                            //var global kalkulasi subtotal
                            var calculatedValueTotal;
                            //var global convert to idr
                            var convert_idr=0;
                            

                            //calculate subtot
                            function updateCalculatedTotalValue() {
                                
                                var value1Price = parseFloat(inputElement.val()) || 0; //input price belum ppn

                                var value2Qty = parseFloat(inputQty.val()) || 0; //input qty
                                
                                //utk calculate subtotal, harga invoice, disable input
                                if(convert_idr >0){
                                
                                    calculatedValueTotal = value1Price * value2Qty*convert_idr;
                                
                                    inputHargaInvoice.val(convert_idr * value1Price); //val input harga invoice

                                    inputSubtotal.val(calculatedValueTotal); //val input subtotal

                                    inputHargaInvoice.prop('disabled', true); //val input disabled

                                    return;
                                }
                                //calculate subtotal
                                calculatedValueTotal = value1Price * value2Qty;
                                
                                //display to subtotal
                                inputSubtotal.val(calculatedValueTotal);
                            }

                            // call function calculate subtotal
                            updateCalculatedTotalValue();
                            
                            //call function calculate subtot saat inputkan price belum ppn
                            inputElement.on('input', updateCalculatedTotalValue);
                            
                            //call function calculate subtot saat inputkan qty
                            inputQty.on('input', updateCalculatedTotalValue);

                            inputSubtotal.css({
                                'border': '1px solid #696868', 
                                'color': 'black', 
                                'padding': '10px',
                                'width': '100%' 
                            });

                          
                            var newTd7 = $('<td>').css({
                                'padding': 'auto', 
                                'width': '5%',  
                            });
                            var checkboxElement = $('<input>', {
                                type: 'checkbox',
                                
                                id: 'checkboxId',
                                value: 'checkboxValue'
                            });
                            checkboxElement.css({
                                
                                    'border': '1px solid #696868',
                            })
                           
                           
                            // Append the checkbox and label to the table cell
                            newTd7.append(checkboxElement)
                            
                            //element td gudang
                            var newTd8 = $('<td>')
                            var selectGudang = $('<select>', {
                                class: 'form-control choices-select'
                            }).css({
                                'border': '1px solid #696868',
                                'color': 'black',
                                'padding': '10px',
                                'width': '100%'
                            });
                            var defaultOption = $('<option>', {
                                value: '',
                                text: 'Pilih Gudang'
                            }).attr('disabled', 'disabled').attr('selected', 'selected');
                            selectGudang.append(defaultOption);
                            
                            gudangName.forEach(function(item,index) {
                                var optionElement = $('<option>', {
                            
                                    value: gudangId[index],
                                    text: item

                                });
                                selectGudang.append(optionElement);
                            });

                          
                            newTd8.append(selectGudang);
                            
                            //element td delete
                            var newTd9 = $('<td>')
                          
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
                            
                            //td untuk price belum ppn saat convert idr
                            var newTdHargaInvoice = $('<td>').css({
                                'padding': 'auto',  
                                'width': '10%',  
                                'display': 'none' 
                            });
                            
                            // input price belum ppn saat convert idr
                            var inputHargaInvoice = $('<input>', {
                                id:'input_harga_invoice',
                                type: 'number',
                                class: 'form-control',
                                value: 0 
                            }).css({
                                'border': '1px solid #696868', 
                                'color': 'black', 
                                'padding': '10px',
                                'width': '100%' 
                            });

                            

                                
                            newTdHargaInvoice.append(inputHargaInvoice);
                            newTd9.append(deleteButton);
                            
                            //menampilkan td harga belum ppn
                                function showNewTdHargaInvoice() {

                                    if(newBoolHargaBelumPpn==true){
                                        console.log('masuk');
                                        newTdHargaInvoice.css({
                                                'display': 'table-cell', // Show the element as a table cell
                                                'visibility': 'visible', // Ensure it's visible
                                                'opacity': 1 // Fully opaque
                                        });    
                                        
                                                   

                                        nominal_convert= $('#input_nominal').val();

                                        //initialize value var global convet idr
                                        convert_idr = nominal_convert;
                                        $('#input_harga_invoice').val(''); // Clear the current value

                                        // Set the new value based on the calculation
                                        $('#input_harga_invoice').val(nominal_convert * parseFloat(inputElement.val()) || 0);
                                        
                                        //mengganti thead harga belum ppn ke harga invoice
                                        $('#harga-belum-ppn').text('Harga Invoice '+'('+responseSimbolMataUang+')');
                                        
                                        //menambahkan thead harga belum ppn
                                        // newHeader = $('<th>Harga Belum PPN</th>');
                                        
                                        //disable input harga invoice
                                        inputHargaInvoice.prop('disabled', true);
                                        
                                        //menambahkan thead harga belum ppn after harga invoice
                                        
                                        if (!isHeaderCreated) {
                                            // Create the new header element
                                            var newHeader = $('<th>Harga Belum PPN</th>');
                                            
                                            
                                            
                                            // Append the new header after the specified element
                                            $('#harga-belum-ppn').after(newHeader);

                                            // Set the flag to true to indicate the header has been created
                                            isHeaderCreated = true;
                                        } 

                                    }
                                 
                                }

                      
                                //untuk offkan action popup gagal convert             
                                $('#convert_idr').off('click');

                                $('#convert_idr').on('click', function() {
                                    if(response.matauang.kode=='RMB'){

                                        $('#title_convert').text('Convert RMB to IDR');
                                        $('#myModal').modal('show');
                                    }
                                    else if(response.matauang.kode=='USD'){
                                        $('#title_convert').text('Convert USD to IDR');
                                        $('#myModal').modal('show');

                                    }
                                    //action save di contert idr
                                    $('#saveConvert').click(function(event) {
                                        event.preventDefault();
                                        clickConvert = true;
                                        newBoolHargaBelumPpn = true;
                                       
                                        //menampilkan harga belum ppn
                                        showNewTdHargaInvoice();
                                        $(this).prop('disabled', true);
                                        if(clickConvert==true){
                                        
                                            showHargaBelumPpnProduct();    
                                        }
                                        
                                           
                                    });
                                });
                                showNewTdHargaInvoice();         
                             
                                netTr1.append(newTd1, newTd2, newTd3, newTdHargaInvoice, newTd4, newTd5, newTd6, newTd7, newTd8, newTd9);
                                contentImport.append(netTr1);
                        });
                        //untuk select gudang ketika import data comercial invoice & pilih item
                        document.querySelectorAll('.choices-select').forEach(function(selectElement) {
                            new Choices(selectElement, {
                                searchEnabled: true,
                                removeItemButton: true,

                            });
                        });
                        //untuk select pilih mata uang ketika import data comercial invoice
                        document.querySelectorAll('.pilih-matauang-choices').forEach(function(selectElement) {
                            new Choices(selectElement, {
                                searchEnabled: true,
                                removeItemButton: true,

                            });
                        });
                        document.querySelectorAll('.pilih-supplier-choices').forEach(function(selectElement) {
                            new Choices(selectElement, {
                                searchEnabled: true,
                                removeItemButton: true,

                            });
                        });
                        
                      
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan:',error);
                }
            });
        })

        function showHargaBelumPpnProduct() {
            console.log('showHargaBelumPpn')
            tdHargaBelumPpnProduct.css({
                'display': 'table-cell' // or 'block' depending on your layout
            });
            inputtdHargaBelumPpnProduct.css({
                'opacity': 1, // Make the <input> fully visible
                'visibility': 'visible' // Make the <input> visible
            });
             inputtdHargaBelumPpnProduct.val(nominal_convert*nominalHargaInvoice)
            
        }
       
    });
    
    //popup gagal convert
    $('#convert_idr').on('click', functionFailedModal);
    function functionFailedModal(){
        console.log('failed convert');
        Swal.fire({
            title: 'Gagal',
            text: 'Harus Import Data Dahulu.',
            icon: 'error',
            showCancelButton: false, // Menonaktifkan tombol batal
            confirmButtonText: 'Tutup', // Mengganti teks tombol konfirmasi menjadi "Tutup"
        });
    }
</script>
@endsection