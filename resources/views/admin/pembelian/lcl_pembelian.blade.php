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

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    
    <div class="container-fluid">
        <h4 id="judulLcl" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp LCL</h4>
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;" id="subjudulLcl">LCL {{ $username['data']['teknisi']['name'] }}</small>
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" id="tambah_lcl" onclick="tambahRestok()" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add LCL</a>
                               <input type="hidden" id="lclValue" value="0">
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

                                <!-- untuk tab master -->
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
                                                        
                                                        <label id="label" for="">Database <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <select class="form-control pilih-db" style="width: 100%;" name="" id="select_db" required>
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

                                                    <select class="form-control pilih-supplier" style="width: 100%;" name="supplier_select" id="select_supplier">
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
                                                        
                                                        <label id="label" for="">Tanggal Transaksi <span style="color:red">*</span></label>
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
                                                <div class="col-md-3 d-flex justify-content-start" id="text_convert">
                                                
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-end">
                                                   
                                                    <button type="button" id="convert_idr" class="btn btn-large btn-warning">Convert to IDR</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" >
                                        <div class="col-md-9">
                                                <div class="row" >
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
                                                        <label for="select_cabang">Cabang <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select class="form-control pilih-cabang" style="width:100%;" name="" id="select_cabang">
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
                                                                        <th scope="col">Kategori</th>
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
                                                                                <input type="hidden" class="form-control restok-input-tambah"  name="id_commercial_{{ $number2 }}" value="{{ $result['id'] }}">
                                                                                @foreach($result['detail'] as $resultrestok)
                                                                                <input type="hidden" class="form-control restok-id-input-tambah"  name="id_restok_{{ $number2 }}" value="{{ $resultrestok['id_restok'] }}">
                                                                                @endforeach
                                                                                </td>
                                                                            
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">INV-{{ $result['invoice_no'] }}</td>
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['name'] }}</td>
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['supplier']['name'] }}</td>
                                                                                <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $result['category_comercial_invoice'] }}</td>
                                                                                
                                                                                
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
                                            <button type="button" id="saveConvert" disabled class="btn btn-primary">Simpan</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                                <!-- untuk tab pembayaran -->
                                <div id="pembayaran-content" class="tab-content" style="display: none;">
                                    
                                    <div id="label-lcl">
                                        <label  for=""><h3>Belum Ada LCL</h3></label>
                                    </div>
                                    
                                    <div id="content-pembayaran">
                                        
                                        <div class="row" id="padding-top">
                                            <div class="col-md-12 d-flex justify-content-end">
                                            <button type="button" id="importData" class="btn btn-large btn-info">Import Data</button>
                                            </div>
                                        </div>

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
                                                        <label id="label" for="">Nominal <span id="required-star">*</span></label>
                                                        </div>
                                                        
                                                            <div class="col-md-9">
                                                                    <div class="row" >
                                                                      
                                                                        <div class="col-md-6">

                                                                            <select class="select2 form-control matauang_pembayaran" style="width:100%" name="" id="matauang_pembayaran">
                                                                                    <option value="">Pilih mata Uang</option>
                                                                                    @foreach($Data_barang['matauang'] as $index => $result)
                                                                                        <option value="{{ $result['id'] }}">( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}</option>

                                                                                    @endforeach
                                                                            </select>
                                                                        

                                                                            
                                                                        </div>
                                                                        <div class="col-md-6">

                                                                            <input type="text" class="form-control nominal" id="input-input" placeholder="Nominal">

                                                                            
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

                                                                        <input class="form-control tgl_bayar" id="tgl_request" type="text" placeholder="Tanggal Bayar" id="input-input">
                                                                    </div>
                                                        </div>
                                                            
                                                    </div>
                                                    
                                                    <div class="col-md-6" id="col-supplier">
                                                        <div class="row" id="padding-top">
                                                            <div class="col-md-3">
                                                            <label id="label" for="">Bukti <span id="required-star">*</span></label>
                                                            </div>
                                                            
                                                                <div class="col-md-9">
                                                                        <div class="row" >
                                                                        
                                                                            <div class="col-md-12">

                                                                            
                                                                            <div class="form-control" id="input-input" >
                                                                            <input type="file" name="fileInput">
                                                                            </div>
                                                                           
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
                                                                
                                                                <label id="label" for="">Keterangan <span id="required-star">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                            <textarea class="form-control" name="" id="text_area" rows="3"placeholder="Keterangan"></textarea>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        
                                        <div class="element">
                                            <div id="element-button-tambah">

                                                <button class="btn btn-info" id="tambah-pembayaran">Tambah Pembayaran</button>
                                            </div>
                                            <div class="table-wrapper tabel-pembayaran">
                                                <table class="responsive-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tgl</th>
                                                            <th>Kode</th>
                                                            <th>Nominal</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody class="container-pembayaran">
                                                    
                                                    
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div id="element-button-tambah">

                                                <button class="btn btn-primary" id="simpan-pembayaran">Simpan Pembayaran</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- untuk tab ekspedisi -->
                                <div id="ekspedisi-content" class="tab-content" style="display: none;">
                                    
                                    <div id="label-lcl-ekspedisi">
                                        <label  for=""><h3>Belum Ada LCL</h3></label>
                                    </div>
                                    
                                    <div id="content-pembayaran">
                                        
                                        <div class="row" id="padding-top">
                                            <div class="col-md-12 d-flex justify-content-end">
                                            <button type="button" id="importData" class="btn btn-large btn-info">Import Data</button>
                                            </div>
                                        </div>

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
                                                                                       
                                                                                    @foreach($Data['msg']['select_ekspedisi'] as $index => $result)
                                                                                        <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>

                                                                                    @endforeach
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
                                                                                    @foreach($Data_barang['matauang'] as $index => $result)
                                                                                        <option value="{{ $result['id'] }}">( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}</option>

                                                                                    @endforeach
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

                                    </div>

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
                                                                                    @foreach($Data_barang['matauang'] as $index => $result)
                                                                                        <option value="{{ $result['id'] }}">( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}</option>

                                                                                    @endforeach
                                                                            </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                               <input type="text" class="form-control edit_biaya_ekspedisi_lcl" id="input-input">
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Rute</label>
                                                        <select class="select2 form-control edit_rute_ekspedisi" style="width:100%" name="" id="rute_ekspedisi">
                                                                

                                                                <option value="localchina">Lokal China</option>

                                                                <option value="chinaindo">China Indo</option>

                                                                <option value="localindo">Lokal Indo</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                                <label for="">Ekspedisi</label>

                                                                <select class="select2 form-control edit_ekspedisi_lcl" style="width:100%" name="" id="edit_ekspedisi_lcl">
                                                                                        
                                                                                       
                                                                                    @foreach($Data['msg']['select_ekspedisi'] as $index => $result)
                                                                                        <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>

                                                                                    @endforeach
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
                            $name_ekspedisi;
                            $resi;
                            $price;
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
                            
                      
                        
                        <td style="border: 1px solid #d7d7d7; color: black;">
                            {{ $num }}     
                        </td>

                            <td style="border: 1px solid #d7d7d7; color: black; width:5px;">{{ $formattedDate }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black; width:10px;">{{ $data['invoice'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 10px; text-overflow: ellipsis;">{{ $data['supplier']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black; width:5px;">{{ $data['teknisi']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black; width:5px;">{{ $data['cabang']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black; width:10px;">{{ $data['status_converttorupiah'] == '1' ? 'Rp' : $data['matauang']['simbol'] }} 
                                {{ $data['status_converttorupiah'] == '1' ? number_format($data['subtotal_idr'], 0, ',', '.') : number_format($data['subtotal'], 0, ',', '.') }}
                            </td>
                            
                            <!-- jika ekspedisilcl pada pembelian lcl lebih dari 0 -->
                            @if(count($data['ekspedisilcl']) >0)
                                @php
                                    $num_baris=0;
                                @endphp
                                <td style="border: 1px solid #d7d7d7; color: black; width:5px;">
                                @foreach($data['ekspedisilcl'] as $resultekspedisi)
                                    @php
                                   
                                    foreach($Data['msg']['ekspedisi'] as $result){
                                        if($resultekspedisi['id_ekspedisi'] == $result['id']){
                                            $name_ekspedisi = $result['name'];
                                            $resi = $resultekspedisi['resi'];
                                            $price = $resultekspedisi['price'];
                                            $num_baris++;
                                        }
                                   
                                    }
                                    
                                    
                                    @endphp
                                    <span style="color: black;">

                                       <p style="color:black;font-weight:400;">
                                       {{ $formattedDate = \Carbon\Carbon::parse($resultekspedisi['tgl_kirim'])->translatedFormat('d F Y')}}
                                       </p> 
                                </span>
                                 @endforeach
                                </td>
                                <td style="border: 1px solid #d7d7d7; color: black; width:10px">
                                @foreach($data['ekspedisilcl'] as $resultekspedisi)
                                    
                                        @foreach($Data['msg']['select_ekspedisi'] as $selectEkspedisi)
                                            @if($resultekspedisi['id_ekspedisi'] == $selectEkspedisi['id'])    
                                                <span style="color: black;">
                                                    <p style="color:black; font-weight:400;">
                                                    {{ $selectEkspedisi['name'] }}  
                                                    </p> 
                                                </span>
                                            @endif
                                        @endforeach
                                @endforeach
                                </td>
                                <td style="border: 1px solid #d7d7d7; color: black; width:10px">
                                @foreach($data['ekspedisilcl'] as $resultekspedisi)
                                   
                                   <span style="color: black;">
                                       <p style="color:black; font-weight:400;">
                                           {{$resultekspedisi['resi']}}
                                       </p> 
                                   </span>
                             
                                @endforeach
                                </td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 10px;">
                                    @foreach($data['ekspedisilcl'] as $resultekspedisi)
                                    
                                    @foreach($Data['msg']['matauang'] as $selectmatauang)
                                            @if($resultekspedisi['id_matauang'] == $selectmatauang['id'])    
                                                <span style="color: black;">
                                                    <p style="color:black; font-weight:400;">
                                                    
                                                    {{ $selectmatauang['simbol'] }} {{ number_format($resultekspedisi['price'],0,',','.') }}  
                                                    </p> 
                                                </span>
                                            @endif
                                        @endforeach
                                
                                    @endforeach
                                </td>
                                
                               
                            <!-- bila ekspedisilcl pada lcl null -->
                            @else
                                <td style="border: 1px solid #d7d7d7; color: black; width:5px;"></td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 40px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></td>
                                <td style="border: 1px solid #d7d7d7; color: black; width:10px"></td>
                                <td style="border: 1px solid #d7d7d7; color: black;max-width: 10px;"></td>
                            @endif
                            <td style="border: 1px solid #d7d7d7; color: black; width:5px;">LCL</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    @if($data['status_converttorupiah'] == '1')
                                    <label class="label icon-box-check">
                                        <i class="fas fa-check" style="color: white; font-weight:bold;"></i>
                                    </label>

                                    @else
                                    <label class="label icon-box-times">
                                        <i class="fas fa-times" style="color: white; font-weight:bold;"></i>
                                    </label>

                                    @endif
                            </td>
                            <td style="border: 1px solid #d7d7d7;">
                                
                                <button type="button" 
                                     
                                        data-id="{{ $data['id'] }}" 
                                        name="editButton" 
                                        class="btn btn-large btn-info btn-edit" 
                                        style="width: 35px; height: 38px; padding: 9px 10px;" 
                                        title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                
                                <button type="button" 
                                        onclick="rejectOrderPembelian(this)" 
                                        data-id="{{ $data['id'] }}" 
                                        name="{{ $data['invoice'] }}" 
                                        class="btn btn-large btn-info btn-danger" 
                                        style="width: 35px; height: 38px; padding: 9px 10px;" 
                                        title="Reject Order">
                                    <i class="fas fa-times"></i>
                                </button>

                                <button type="button" 
                                        onclick="deleteOrderPembelian(this)" 
                                        data-id="{{ $data['id'] }}" 
                                        name="{{ $data['invoice'] }}" 
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
         
            {
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
                data: null,
                title: 'Action',
                render: function(data, type, full, meta) {
         
                    return `
                        <button type="button" 
                                data-id="${data.invoice}" 
                                name="${data.invoice}" 
                                class="btn btn-large btn-info btn-edit" 
                                style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="${data.invoice}"
                                onclick="editInvoice(this)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" 
                                onclick="rejectOrderPembelian(this)" 
                                data-id="${data.id}" 
                                name="${data.invoice}" 
                                class="btn btn-large btn-info btn-danger" 
                                style="width: 35px; height: 38px; padding: 9px 10px;" 
                                title="Reject Order">
                            <i class="fas fa-times"></i>
                        </button>
                        <button type="button" 
                                onclick="deleteOrderPembelian(this)" 
                                data-id="${data.id}" 
                                name="${data.invoice}" 
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
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...');
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
    $('#ekspedisi-tab').on('click', function() {
        
                $('.tab-content').hide();
                $('#ekspedisi-content').show();
    });
   
    // Menangani klik pada tombol tambah
   
     
       
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
    
    //Membuka modal update
    function upadetLcl(element) {
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
                // $('#overlay').fadeOut();
                console.log('response',response)
                // Handle response jika sukses
                // $('#Formedit').html(response);
                // Tampilkan modal
                // $('#editModal').modal('show');
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
    function upadetLclFailed(button) {

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
    var editClick=false;
    $(document).ready(function() {
                
                var contentImport = $('.container-import2');
                var newBoolHargaBelumPpn = false;
                var nominal_convert;
                var isHeaderCreated =false;
                var allIndexSelectBarang = [];
                var product_product=[];

                //untuk proses select item
                document.getElementById('select_barang').addEventListener('change',function(){
                    var importBarang = this.value
                    
                    contentImport.empty()
                    
                    $.ajax({
                        url:"{{ route('admin.pembelian_lcl') }}",
                        method:'GET',
                        data:{
                            menu:'select_item',
                            id:importBarang},
                        success: function(response){
                            selectedValuesArray = []
                            harga_asal2=[]
                            changeHistory = []
                            discount_arr_select=[]
                            
                            qty_arr_select=[]
                        
                            subtot_arr_select=[]
                            iditem_select=[]
                            product_product.push(response);
                            // console.log('response',response)
                        
                            selectBarang.push(response.product[0].name);
                            selectBarangId.push(response.product[0].id)

                            
                        
                            var index_select_barang = selectBarangId.indexOf(response.product[0].id);
                            allIndexSelectBarang.push(index_select_barang);
                        
                            
                            product_product.forEach((item, itemIndex) => {
                                
                                // Check if product array exists and is not empty
                                if (item.product && item.product.length > 0) {

                                    // Iterate over each product in the product array
                                    item.product.forEach((productItem, productIndex) => {
                                        
                                    
                                    var trProduct = $('<tr>');
                                    var tdProduct = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '10%'
                                    });
                                    iditem_select[itemIndex] = productItem.id;
                                    // console.log('iditem_select',iditem_select)
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

                                        changeHistory[itemIndex] = newValue;
                                
                                    
                                    });

                                    changeHistory[itemIndex]=0;
                                    console.log('change history',changeHistory)
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
                                
                                    
                                    trProduct.append(tdProduct,td1Product,td2Product,tdHargaBelumPpnProduct,td3Product,td4Product,td5Product,td6Product,td7Product,td8Product)
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
                            // function async_select(){
                            //     var val_select=0
                            //     subtot_arr_select_global=[]
                            //     for (var i = 0; i < subtot_arr_select.length; i++) {
                            //         var value = parseFloat(subtot_arr_select[i]) || 0; // Pastikan elemen dikonversi ke angka, jika tidak valid, anggap 0
                            //         val_select += value;
                                
                            //         subtot_arr_select_global.push(val_select)
                                
                                
                            //     }
                            //     async()
                                
                            // }
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

                var newDivContent
                var idcomercialimport=[]
                var idrestokimport = []
                var hiddenInputRestokId 
                var item_import=[]
                var item =[]
                var total_subtot_arr
                var valueDiscount
                //untuk proses import data barang
                $('#sendImportBarang').click(function(event) {
                    boolSendImportBarang=true;
                    event.preventDefault();
                    selectBarang = [];  //menghapus item selectBarang
                    idrestokimport=[] //menghapus id_restok dari import data
                    item_import=[]
                    harga_asal=[]
                    qty_arr=[]
                    discount_arr=[]
                    subtot_arr=[]
                    iditem_arr=[]
                    var selectedCheckboxes = $('.kubik-checkbox-tambah:checked');
                    //mengambil id commercial
                    var hiddenInput = selectedCheckboxes.siblings('.restok-input-tambah');
                    var hiddenValue = hiddenInput.val();
            

                    // console.log('idrestokimport',idrestokimport)
                    var formData = {
                        idcommercial:hiddenValue,
                        menu:'importbarang'
                    };
                    idrestokimport=[]
                    var contentImport2 = $('.container-import');
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('admin.pembelian_lcl') }}',
                        data: formData,
                        success: function(response) {
                        console.log('response',response)
                        
                        var responseMataUangId = response.matauang.id;
                        responseSimbolMataUang = response.matauang.simbol;
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
                            newDivContent = `
                            <div class="col-md-6" id="col-matauang-choices">
                            <div class="row" id="padding-top">
                            <div class="col-md-3">
                            <label id="label" for="">Mata Uang</label>
                            </div>
                            <div class="col-md-9">
                            <select name="select_namematauang" class="form-control pilih-matauang-choices" id="select_matauang_choices">
                                <option value="">Pilih Mata Uang</option>
                                @foreach($Data_barang['matauang'] as $index => $result)
                                <option value="{{ $result['id'] }}" data-simbol="{{ $result['simbol'] }}"
                                    ${responseMataUangId == "{{ $result['id'] }}" ? 'selected' : ''}>
                                    ( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}
                                </option>
                                @endforeach
                            </select>

                            </div>
                            </div>
                            </div>
                            `;
                            $('#row-select').append(newDivContent);
                            var selectedItemSimbol = response.matauang.simbol;
                            var matauangData = @json($Data_barang['matauang']); // Pass PHP array to JavaScript

                                document.getElementById('select_matauang_choices').addEventListener('change', function() {
                                    var selectedId = this.value; // Get the value of the selected option
                                    console.log("Selected ID:", selectedId); // You can use this variable as needed
                                    // $('.').prop('disabled',true)
                                    // Example: Filter data based on the selected ID
                                    var filteredData = matauangData.filter(function(item) {
                                        return item.id == selectedId;
                                    });

                                    // Example: Update some part of your page with the filtered data
                                    if (filteredData.length > 0) {
                                        var selectedItem = filteredData[0];
                                        // Do something with selectedItem
                                        console.log("Selected Item:", selectedItem);
                                        selectedItemSimbol = selectedItem.simbol
                                        // For example, update a display element
                                        // document.getElementById('selectedItemDisplay').innerText = 
                                        //     '( ' + selectedItem.simbol + ' ) ' + selectedItem.kode + ' - ' + selectedItem.name;
                                    } else {
                                        // Handle case where no item matches (optional)
                                        // document.getElementById('selectedItemDisplay').innerText = 'No item selected';
                                    }
                                });
                                // if (Array.isArray(response.commercialid.detail)) {
                            
                                contentImport2.empty();
                                var gudangId =[];
                                var gudangName =[];
                            
                                response.gudang.forEach(function(importGudang,index){
                                    gudangId.push(importGudang.id)
                                    gudangName.push(importGudang.name)
                                })


                                // Iterate over the array and build table rows
                                response.commercialid.detail.forEach(function(importItem, index2) {
                                 

                                        
                                    idcomercialimport.push(hiddenValue)
                                    var name =importItem.restok.product.name
                                    var image =response.directory+''+importItem.restok.product.image
                                    var price_without_tax = importItem.unit_price_without_tax
                                    var Qty =importItem.qty
                                    var disc = importItem.restok.product.hpp
                                    var total_price_without_tax = importItem.total_price_without_tax
                                var id_restok = importItem.id_restok
                                idrestokimport.push(id_restok) //menyimpan idrestok
                                item_import.push(name) //menyimpan name item yang diimport
                                    //    harga_asal.push(price_without_tax)
                                item =selectBarang
                                    
                                    // item_import = $('#item').val()
                                    item.push(name)
                                    iditem_arr[index2]=importItem.restok.product.id
                                    console.log('iditem_arr',iditem_arr)
                                    var netTr1 = $('<tr>');
                                    ppnitemList2=0
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
                                        value: name,
                                        id:'item'
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
                                        value: price_without_tax,
                                        id: 'harga_belum_ppn_import' 
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
                                        value: Qty,
                                        id:'qty_import'
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
                                        value: disc,
                                        id:'disc_import'
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
                                        value: '',
                                        id:'subtot_import'
                                    });
                                    newTd6.append(inputSubtotal)

                                    //var global kalkulasi subtotal
                                    var calculatedValueTotal=[];
                                    //var global convert to idr
                                    var convert_idr=0;
                                    

                                    //calculate subtot
                                    function updateCalculatedTotalValue() {
                                        
                                        var value1Price = parseFloat(inputElement.val()) || 0; //input price belum ppn
                                        console.log('valuePrice',value1Price)
                                        harga_asal[index2] = value1Price
                                        console.log('harga_asal_arr',harga_asal)
                                        var value2Qty = parseFloat(inputQty.val()) || 0; //input qty
                                        qty_arr[index2]=value2Qty
                                        console.log('qty_arr',qty_arr)
                                        

                                        // discount_arr
                                        var discountValue = parseFloat(inputDisc.val()) ||0;
                                        console.log('discountValue',discountValue)
                                        discount_arr[index2] =discountValue
                                        console.log('discount_arr',discount_arr)
                                        //utk calculate subtotal, harga invoice, disable input
                                        if(convert_idr >0){
                                        
                                            calculatedValueTotal = (value1Price * value2Qty*convert_idr)-discountValue;
                                            
                                            inputHargaInvoice.val(convert_idr * value1Price); //val input harga invoice

                                            inputSubtotal.val(calculatedValueTotal); //val input subtotal

                                            inputHargaInvoice.prop('disabled', true); //val input disabled
                                        
                                            return;
                                        }
                                        //calculate subtotal
                                        calculatedValueTotal = (harga_asal * qty_arr)-discountValue;
                                        console.log('calculatedValueTotal',calculatedValueTotal)
                                        //display to subtotal
                                        inputSubtotal.val((value1Price*value2Qty)-discountValue);
                                        var tot_ar = inputSubtotal.val()
                                        subtot_arr[index2]=tot_ar
                                        async()
                                        
                                    }
                                    console.log('harga_asal',harga_asal)
                                    // call function calculate subtotal
                                    updateCalculatedTotalValue();
                                    
                                    //call function calculate subtot saat inputkan price belum ppn
                                    inputElement.on('input', updateCalculatedTotalValue);
                                    
                                    //call function calculate subtot saat inputkan qty
                                    inputQty.on('input', updateCalculatedTotalValue);
                                    inputDisc.on('input', updateCalculatedTotalValue);

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
                                    checkboxElement = $('<input>', {
                                        type: 'checkbox',
                                        id: 'checkbox2' + index2,
                                        value: 0
                                    }).css({
                                        'border': '1px solid #696868',
                                    }).on('change', function() {
                                        if ($(this).is(':checked')) {
                                            $(this).attr('data-value', '1');
                                            changeHistory_arr[index2] = 1; // Update list at index when checked
                                            
                                        
                                        } else {
                                            $(this).removeAttr('data-value');
                                            changeHistory_arr[index2] = 0; // Update list at index when unchecked
                                            
                                        
                                        }
                                    });
                                
                                    changeHistory_arr[index2]=0;
                                    
                                    // Append the checkbox and label to the table cell
                                    newTd7.append(checkboxElement)
                                    
                                    //element td gudang
                                    var newTd8 = $('<td>')
                                    var selectGudang = $('<select>', {
                                        class: 'form-control choices-select',
                                        id:'gudang_import'
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
                                    
                                    selectGudang.on('change', function() {


                                    // Loop through all selected options
                                    if(selectedValuesArray_arr.length <index2){

                                        $(this).find('option:selected').each(function(index, option) {
                                            selectedValuesArray_arr.push($(option).val());
                                        });
                                    }else{
                                        $(this).find('option:selected').each(function(index, option) {
                                            
                                            selectedValuesArray_arr[index2] =$(option).val();
                                        });
                                    }


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

                                    

                                        
                        
                                    newTd9.append(deleteButton);
                                    
                                        //untuk offkan action popup gagal convert             
                                        $('#convert_idr').off('click');

                                        $('#convert_idr').on('click', function() {
                                            console.log('select_matauang')
                                
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
                                                mata_uang_disabled = true;
                                                console.log('matauang_disabled')
                                                category_convert =$('#select_category_convert').val()
                                                var text_convert_idr = $('#text_convert')
                                                convert_nominal_after_save = $('#input_nominal').val()
                                                var paragraph = $('<p>').text(selectedItemSimbol+' 1 = Rp. '+convert_nominal_after_save)
                                                text_convert_idr.append(paragraph)
                                                event.preventDefault();
                                                clickConvert = true;
                                                newBoolHargaBelumPpn = true;
                                                statusConvertRupiah =1;
                                                $('#col-matauang-choices').remove();
                                                var newDivContent2 = `
                                                    <div class="col-md-6" id="">
                                                    <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                    <label id="label" for="">Mata Uang</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                    <select name="select_namematauang" class="form-control pilih-matauang-choices-again" id="select_matauang_choices" disabled>
                                                        <option value="">Pilih Mata Uang</option>
                                                        @foreach($Data_barang['matauang'] as $index => $result)
                                                        <option value="{{ $result['id'] }}" data-simbol="{{ $result['simbol'] }}"
                                                            ${responseMataUangId == "{{ $result['id'] }}" ? 'selected' : ''}>
                                                            ( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                    </div>
                                                    </div>
                                                    </div>
                                                    `;
                                                    $('#row-select').append(newDivContent2);
                                                    const selectElementsAgain = document.querySelectorAll('.pilih-matauang-choices-again');
                                                    selectElementsAgain.forEach(function(selectElement) {
                                                        // Destroy Choices.js instance if it exists
                                                        if (selectElement.choices) {
                                                            selectElement.choices.destroy();
                                                        }

                                                        // Disable the <select> element
                                                        selectElement.disabled = true;
                                                        new Choices(selectElement, {
                                                            searchEnabled: true,
                                                            removeItemButton: true,
                                                        });
                                                    });
                                                //menampilkan harga belum ppn
                                                
                                                $(this).prop('disabled', true);
                                                if(clickConvert==true){
                                                    console.log('newBoolHargaBelumPpn',newBoolHargaBelumPpn)
                                                    netTr1.empty()
                                                    contentImport2.empty()
                                                    subtot_arr=[]
                                                    showBaruTdHargaInvoice();
                                                    showHargaBelumPpnProduct();    
                                                    return;
                                                }
                                                
                                                
                                            });
                                        });
                                    
                                        
                                    
                                        netTr1.append(newTd1, newTd2, newTd3, newTdHargaInvoice, newTd4, newTd5, newTd6, newTd7, newTd8, newTd9);
                                        contentImport2.append(netTr1);
                                });

                                //function untuk menampilkan dom element di tabel ketika convert idr dipilih
                                function showBaruTdHargaInvoice(){
                                    subtot_arr=[]
                                    console.log('masuk baru')
                                    iditem_arr=[]
                                    idrestokimport=[]
                                    response.commercialid.detail.forEach(function(importItem, index2) {
                                
                                    var name =importItem.restok.product.name
                                    var image =response.directory+''+importItem.restok.product.image
                                    var price_without_tax = importItem.unit_price_without_tax
                                    var Qty =importItem.qty
                                    var disc = importItem.restok.product.hpp
                                    var total_price_without_tax = importItem.total_price_without_tax
                                    var id_restok = importItem.id_restok
                                    idrestokimport.push(id_restok) //menyimpan idrestok
                                    item_import.push(name) //menyimpan name item yang diimport
                                    
                                    item =selectBarang
                                    
                                    
                                    // item.push(name)
                                    iditem_arr[index2]=importItem.restok.product.id
                                    console.log('iditem_arr',iditem_arr)
                                    var netTr1 = $('<tr>');
                                    ppnitemList2=0
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
                                        value: name,
                                        id:'item'
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
                                        value: price_without_tax,
                                        id: 'harga_belum_ppn_import' 
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
                                        value: Qty,
                                        id:'qty_import'
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
                                        value: disc,
                                        id:'disc_import'
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
                                        value: '',
                                        id:'subtot_import'
                                    });
                                    newTd6.append(inputSubtotal)

                                    //var global kalkulasi subtotal
                                    var calculatedValueTotal=[];
                                    
                                    //var global convert to idr
                                    var convert_idr=0;
                                    

                                    //calculate subtot
                                    function updateCalculatedTotalValue() {
                                        
                                

                                        var value1Price = parseFloat(inputElement.val()) || 0; //input price belum ppn
                                        console.log('valuePrice',value1Price)
                                        harga_asal[index2] = value1Price
                                        console.log('harga_asal_arr',harga_asal)
                                        var value2Qty = parseFloat(inputQty.val()) || 0; //input qty
                                        qty_arr[index2]=value2Qty
                                    
                                        
                                        
                                        // discount_arr
                                        var discountValue = parseFloat(inputDisc.val()) ||0;
                                    
                                        discount_arr[index2] =discountValue
                                    
                                        //utk calculate subtotal, harga invoice, disable input
                                        if(convert_idr >0){
                                        
                                            calculatedValueTotal = (value1Price * value2Qty*nominal_convert)-discountValue;
                                            
                                            inputHargaInvoice.val(convert_idr * value1Price); //val input harga invoice
                                            
                                            inputSubtotal.val(calculatedValueTotal); //val input subtotal
                                            
                                            
                                            inputHargaInvoice.prop('disabled', true); //val input disabled
                                            price_invoice_arr[index2] = inputHargaInvoice.val()
                                            subtot_arr[index2]=(price_invoice_arr[index2]*value2Qty)-discountValue
                                            async()
                                            console.log('price_invoice_arr',price_invoice_arr)
                                            console.log('subtot_arr berubah value convert',subtot_arr)
                                            return;
                                        }
                                        //calculate subtotal
                                        calculatedValueTotal = (harga_asal * qty_arr)-discountValue;

                                        //display to subtotal
                                        inputSubtotal.val((value1Price*value2Qty)-discountValue);
                                        
                                
                                        
                                    }
                            
                                    // call function calculate subtotal
                                    updateCalculatedTotalValue();
                                    
                                    //call function calculate subtot saat inputkan price belum ppn
                                    inputElement.on('input', updateCalculatedTotalValue);
                                    
                                    //call function calculate subtot saat inputkan qty
                                    inputQty.on('input', updateCalculatedTotalValue);
                                    inputDisc.on('input', updateCalculatedTotalValue);

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
                                    checkboxElement = $('<input>', {
                                        type: 'checkbox',
                                        id: 'checkbox2' + index2,
                                        value: 0
                                    }).css({
                                        'border': '1px solid #696868',
                                    }).on('change', function() {
                                        if ($(this).is(':checked')) {
                                            $(this).attr('data-value', '1');
                                            changeHistory_arr[index2] = 1; // Update list at index when checked
                                            
                                        
                                        } else {
                                            $(this).removeAttr('data-value');
                                            changeHistory_arr[index2] = 0; // Update list at index when unchecked
                                            
                                            
                                        }
                                    });
                                    
                                    changeHistory_arr[index2]=0;
                                
                                    // Append the checkbox and label to the table cell
                                    newTd7.append(checkboxElement)
                                    
                                    //element td gudang
                                    var newTd8 = $('<td>')
                                    var selectGudang = $('<select>', {
                                        class: 'form-control choices-select',
                                        id:'gudang_import'
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
                                    
                                    selectGudang.on('change', function() {


                                    // Loop through all selected options
                                    if(selectedValuesArray_arr.length <index2){

                                        $(this).find('option:selected').each(function(index, option) {
                                            selectedValuesArray_arr.push($(option).val());
                                        });
                                    }else{
                                        $(this).find('option:selected').each(function(index, option) {
                                            
                                            selectedValuesArray_arr[index2] =$(option).val();
                                        });
                                    }


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
                                            
                                        });
                                    
                                        // input price belum ppn saat convert idr
                                        var inputHargaInvoice = $('<input>', {
                                            id:'input_harga_invoice2',
                                            type: 'number',
                                            class: 'form-control harga2-invoice',
                                        
                                        });
                                        inputHargaInvoice.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                        });
                                
                                    
                                        newTdHargaInvoice.append(inputHargaInvoice);
                        
                                        newTd9.append(deleteButton);
                                    
                                
                                            
                                        function showNewTdHargaInvoice() {

                                                    nominal_convert= $('#input_nominal').val();
                                                    // price_nominal_convert=nominal_convert
                                            
                                                    //initialize value var global convet idr
                                                    convert_idr = nominal_convert;
                                                    

                                                    // Set the new value based on the calculation
                                                    inputHargaInvoice.val(nominal_convert * parseFloat(inputElement.val()) || 0);
                                                    price_invoice_arr[index2] =  inputHargaInvoice.val()
                                            

                                                    //mengganti thead harga belum ppn ke harga invoice
                                                    $('#harga-belum-ppn').text('Harga Invoice '+'('+responseSimbolMataUang+')');
                                                    inputSubtotal.val((nominal_convert * parseFloat(inputElement.val())*parseFloat(inputQty.val())))
                                                    subtot_arr[index2] = parseFloat(inputSubtotal.val()) || 0;
                                                    async()
                                                    
                                                    
                                                    //disable input harga invoice
                                                    inputHargaInvoice.prop('disabled', true);
                                                    
                                                    //menambahkan thead harga belum ppn after harga invoice
                                                    
                                                    if (!isHeaderCreated) {
                                                        // Create the new header element
                                                        var newHeader = $('<th>Harga Belum PPN (Rp)</th>');
                                                        
                                                        
                                                        
                                                        // Append the new header after the specified element
                                                        $('#harga-belum-ppn').after(newHeader);

                                                        // Set the flag to true to indicate the header has been created
                                                        isHeaderCreated = true;
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
                                                mata_uang_disabled = true;
                                                console.log('matauang_disabled')
                                                category_convert =$('#select_category_convert').val()
                                                convert_nominal_after_save = $('#input_nominal').val()
                                                var text_convert_idr = $('#text_convert')
                                                var paragraph = $('<p>').text(selectedItemSimbol+' 1 = Rp. '+convert_nominal_after_save)
                                                text_convert_idr.append(paragraph)
                                                event.preventDefault();
                                                clickConvert = true;
                                                newBoolHargaBelumPpn = true;
                                                statusConvertRupiah =1;
                                                $('#col-matauang-choices').remove();
                                                var newDivContent2 = `
                                                    <div class="col-md-6" id="">
                                                    <div class="row" id="padding-top">
                                                    <div class="col-md-3">
                                                    <label id="label" for="">Mata Uang</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                    <select name="select_namematauang" class="form-control pilih-matauang-choices-again" id="select_matauang_choices" disabled>
                                                        <option value="">Pilih Mata Uang</option>
                                                        @foreach($Data_barang['matauang'] as $index => $result)
                                                        <option value="{{ $result['id'] }}" data-simbol="{{ $result['simbol'] }}"
                                                            ${responseMataUangId == "{{ $result['id'] }}" ? 'selected' : ''}>
                                                            ( {{ $result['simbol'] }} ) {{ $result['kode'] }} - {{ $result['name'] }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                    </div>
                                                    </div>
                                                    </div>
                                                    `;
                                                    $('#row-select').append(newDivContent2);
                                                    const selectElementsAgain = document.querySelectorAll('.pilih-matauang-choices-again');
                                                    selectElementsAgain.forEach(function(selectElement) {
                                                        // Destroy Choices.js instance if it exists
                                                        if (selectElement.choices) {
                                                            selectElement.choices.destroy();
                                                        }

                                                        // Disable the <select> element
                                                        selectElement.disabled = true;
                                                        new Choices(selectElement, {
                                                            searchEnabled: true,
                                                            removeItemButton: true,
                                                        });
                                                    });
                                                //menampilkan harga belum ppn
                                    
                                                // showNewTdHargaInvoice();
                                                $(this).prop('disabled', true);
                                                if(clickConvert==true){
                                                    
                                                    netTr1.empty()
                                                    contentImport2.empty()
                                                    showBaruTdHargaInvoice();
                                                    showHargaBelumPpnProduct();    
                                                    return;
                                                }
                                                
                                                    
                                            });
                                        });
                                        
                                        showNewTdHargaInvoice();         
                                    
                                        netTr1.append(newTd1, newTd2, newTd3, newTdHargaInvoice, newTd4, newTd5, newTd6, newTd7, newTd8, newTd9);
                                        contentImport2.append(netTr1);
                                    });
                        
                                    
                                    
                                }

                                function enableSelectElements() {

                                            
                                    const selectElements = document.querySelectorAll('.pilih-matauang-choices');
            
                                    if (mata_uang_disabled==true) {
                                        // Disable Choices.js and <select> elements
                                        selectElements.forEach(function(selectElement) {
                                            // Destroy Choices.js instance if it exists
                                            if (selectElement.choices) {
                                                selectElement.choices.destroy();
                                            }

                                            // Disable the <select> element
                                            selectElement.disabled = true;
                                        });
                                    } else {
                                        console.log('matauang_disabled')
                                        // Re-enable Choices.js and <select> elements
                                        selectElements.forEach(function(selectElement) {
                                            // Re-enable the <select> element
                                            selectElement.disabled = false;

                                            // Re-initialize Choices.js
                                            new Choices(selectElement, {
                                                searchEnabled: true,
                                                removeItemButton: true,
                                            });
                                        });
            
                                    }

                                
                                }
                                if(mata_uang_disabled==false){

                                    enableSelectElements();
                                }
                                //untuk select gudang ketika import data comercial invoice & pilih item
                        
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
                
                    document.getElementById('sendSave').addEventListener('click',function(){
                        
                        
                    
                                
                        var database= $('#select_db').val()
                        var valueCategory = $('#select_category_convert').val()
                        
                        var noreferensi=$('.no-referensi').val()
                        var tgl_transaksi = $('#tgl_request').val()
            
                        var termin = $('#select_termin_cash').val()
                        var account = $('#select_termin_rekening').val()
                    
                        var selectedSupplierValue = $('select[name="supplier_select"]').val();
                        var select_namematauang = $('select[name="select_namematauang"]').val()
                        
                        var harga_belum_ppn_import = $('#harga_belum_ppn_import').val() ||''
                        var qty_import = $('#qty_import').val()
                        var disc_import = $('#disc_import').val()

                        var statusconvert = statusConvertRupiah
                        var valuenominalconvert=convert_nominal_after_save;
                        var valuecategoryconvert = category_convert;
                        var keterangan = $('#text_area').val()
                        var cabang = $('#select_cabang').val()  
                        
                        var ppnValueText = $('.ppn_element').text();
                        var discount_save = $('#discount_percent').val()
                        var discount_nominal_save = $('#discount_nominal').val()

                        var subtotalValueText = $('.sutotal_element').text()
                        var total_elementValueText= $('.total_element').text()
                        var include_ppn = $('#flexCheckDefaultTermasukkPPN').val()
                        var ppnCentang =$('#flexCheckDefault').val()
                
                        
                        
                        if (!database) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Pilih Database!',
                            });
                            return; // Stop further execution if validation fails
                        }
                    
                        
                        if (!tgl_transaksi) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Pilih Tanggal Transaksi!',
                            });
                            return; // Stop further execution if validation fails
                        }
                
                        if (!cabang) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Pilih Cabang!',
                            });
                            return; // Stop further execution if validation fails
                        }
                        if(iditem_arr.length!=0 && selectedValuesArray_arr.length!=iditem_arr.length){
                            Swal.fire({
                                icon:'error',
                                title: 'Error',
                                text:'Pilih Gudang Dahulu!'
                            });
                            return

                        }
                        if(iditem_select.length!=0 && selectedValuesArray.length!=iditem_select.length){
                            Swal.fire({
                                icon:'error',
                                title: 'Error',
                                text:'Pilih Gudang Dahulu!'
                            });
                            return

                        }
                

                        var formDataSend = {
                            menu:'tambah',
                            database:database,
                            noreferensi,noreferensi,
                            tgl_transaksi:tgl_transaksi,
                            termin:termin,
                            account:account,
                            item:item,
                            iditem_arr:iditem_arr,
                            iditem_select:iditem_select,
                            idcommercial:idcomercialimport,
                            idrestok:idrestokimport,
                            price_asal_select:harga_asal_select,
                            price_asal:harga_asal,
                            qty:qty_arr,
                            qty_select:qty_arr_select,
                            discount:discount_arr,
                            discount_select:discount_arr_select,
                            ppn_select:changeHistory,
                            ppn: changeHistory_arr,
                            include_ppn:include_ppn,
                            ppnCentang:ppnCentang,
                            gudang_select: selectedValuesArray,
                            gudang:selectedValuesArray_arr,
                            supplier:selectedSupplierValue,
                            matauang:select_namematauang,
                            statusconvert:category_convert,
                            nominalconvert:nominal_convert,
                            keterangan:keterangan,
                            cabang:cabang,
                            subtot_arr_select:subtot_arr_select,
                            subtot_arr:subtot_arr,
                            price_invoice_select:price_invoice_select,
                            price_invoice_arr:price_invoice_arr,
                            td_ppn:ppnValueText,
                            td_subtotal:subtotalValueText,
                            td_total:total_elementValueText,
                            td_discount:discount_save,
                            td_discount_nominal:discount_nominal_save,
                            valuecategoryconvert:valueCategory
                            
                        };
                        
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('admin.pembelian_tambah_lcl') }}',
                            data: formDataSend,
                            success: function(response) {
                            Swal.fire({
                                icon:'success',
                                title:'Success',
                                text:'LCL Berhasil Ditambahkan'
                            }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.reload();
                            }
                            });
                            },error: function(xhr, status, error) {
                                console.log('Terjadi kesalahan:',error);
                            }
                        })
                    })

                })
                
                // Deklarasi variabel global
                var discountValue = 1; // Default value
                var valueDiscount = 1; // Nilai diskon yang diambil dari handlediscountValue
                var valueNominalDiscount=0;
                var nominaldiscountValue=0;
                // Event listener untuk perubahan pada input 'discount_percent'
                $('#discount_percent').on('change', function() {
                    discountValue = (100 - $(this).val()) / 100;
                    handlediscountValue(discountValue);
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

                    console.log('Discount Value:', valueDiscount);

                    // Menampilkan subtotal
                    $('.sutotal_element').text(val + val_select);

                    // Menghitung dan menampilkan PPN dan total
                    if ($('#flexCheckDefault').prop('checked')) {
                        
                        ppnValue = (val + val_select) * 0.11;
                        $('.ppn_element').text((ppnValue * valueDiscount).toFixed(2));
                        $('.total_element').text(((((val + val_select) * valueDiscount) - valueNominalDiscount)+ppnValue).toFixed(2));

                    } else {
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
            

                function updateCalculatedValueSubtot() {
                                    
                    var value_1 = parseFloat(inputtd2Product.val()) || 0;
                    var value_2 = parseFloat(inputtd3Product.val()) || 0;
                                        // Calculate the new value
                    var calculatedValue_1 = value_1 * value_2;

                                        // menghitung dan menyetting value harga subtotal
                    
                    inputtd5Product.val(nominal_convert*calculatedValue_1)
                }

                                


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
                    inputtd5Product.val(nominal_convert*nominalHargaInvoice*inputtd3Product.val())
                
                    
                        // Update calculation when values change
                        inputtd2Product.on('input', updateCalculatedValueSubtot);
                        inputtd3Product.on('input', updateCalculatedValueSubtot);
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

<!-- script untuk edit view -->
<script>
    // $(document).ready(function() {
        
        function editInvoice(element) {
            event.preventDefault();
            var invoice = $(element).data('id');
            
            editClick =true;
            
            var idcomercialimport =[]
            var idrestokimport = []
            var subtot_arr=[]
            var harga_asal=[]
            var qty_arr=[]
            var discount_arr=[]
            var changeHistory=[]
            var price_invoice_arr=[]
            var statusconvert=0
            var ppn_item=[]
            var valuenominalconvert=0
            var id_lcl
            var td_ppn
            var td_subtotal
            var td_total
            var td_discount
            var td_discount_nominal

            //array menampung row in ekspedisi table
            var array_kode=[]
            var array_tgl=[]
            var array_rute=[]
            var array_nama=[]
            var array_resi=[]
            var array_price=[]
            var array_keterangan=[]
            var array_matauang=[]
            var id_pembelian_savelcl=0;

            // Example: You can now use this ID in an AJAX request or any other logic
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_lcl') }}',
                data: { 
                    menu:'edit',
                    invoice: invoice },
                success: function(response) {
                    id_pembelian_savelcl=response.msg.pembelianlcl.id
                    console.log(id_pembelian_savelcl)
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
                    $('#judulLcl').html('<i class="fas fa-database"></i> &nbsp Edit LCL');
                    document.title='Edit LCL   | PT. Maxipro Group Indonesia'
                    
                    //menambah ekspedisi
                  
                    
                    //mengirim data ke tab master dan ekspedisi
                    var pembelianLcl = response.msg.pembelianlcl
                    var image_barang = response.msg.image_barang
                    var matauang = response.msg.matauang
                    var gudang = response.msg.gudang
                    var ekspedisilcl = response.msg.ekspedisilcl
                    var statuspenerimaan = response.msg.statuspenerimaan
                    var penerimaan = response.msg.penerimaan
                    var name_ekspedisi_lcl = response.msg.nama_ekspedisi
                    var nama_matauang = response.msg.matauang_ekspedisi
                    editLcl(pembelianLcl,image_barang,matauang,gudang)
                    editEkspedisi(pembelianLcl,ekspedisilcl,statuspenerimaan,penerimaan,name_ekspedisi_lcl,nama_matauang)
                    var tambah_tbody_container_ekspedisi = $('.tambah-tbody-container-ekspedisi')
                    var ekspedisi_row_tambah = [];
             
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
                                // if(array_keterangan.length!=0){
                                    
                                // }
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
                }
            });
            window.editEkspedisi = function(pembelianLcl,ekspedisilcl,statuspenerimaan,penerimaan,name_ekspedisi_lcl,nama_matauang){
                id_pembelian_savelcl=pembelianLcl.id
                var tbody_container_ekspedisi = $('.tbody-container-ekspedisi')
                if(statuspenerimaan=='true'){
                    
                    
                    $('#ekspedisi').val(penerimaan.id_ekspedisi).trigger('change');
                }
                console.log('name_ekspedisi_lcl',name_ekspedisi_lcl)
                
             
                if(ekspedisilcl){
                    ekspedisilcl.forEach(function(result, itemIndex) 
                 
                    {
                  
                        var tglKirim = new Date(result.tgl_kirim); // Assuming result.tgl_kirim is in a parseable format

                        // Array of month names in Indonesian
                        var bulan = [
                            "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                        ];

                        // Format the date as 'dd Month yyyy'
                        var formattedDate = ('0' + tglKirim.getDate()).slice(-2) + ' ' + 
                                            bulan[tglKirim.getMonth()] + ' ' + 
                                            tglKirim.getFullYear();
                       var tr = $('<tr>')
                       var td1Product = $('<td>',{
                            id:'tgl_ekspedisi_edit-'+itemIndex
                       }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(formattedDate);

                        var td2Product = $('<td>', {
                            id: 'produk_ekspedisi_edit-' + itemIndex // Add hyphen to separate 'produk-ekspedisi' and itemIndex
                        }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(result.kode);

                       var td3Product = $('<td>',{
                            id:'rute_ekspedisi_edit-'+itemIndex
                       }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(result.rute);

                     
                       var td4Product = $('<td>',{
                            id:'nama_ekspedisi_edit-'+itemIndex
                       }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(name_ekspedisi_lcl[itemIndex].name);
                       
                        var td5Product = $('<td>',{
                            id:'resi_ekspedisi_edit-'+itemIndex
                        }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(result.resi);
                        
                        var td6Product = $('<td>',{
                            id:'price_ekspedisi_edit-'+itemIndex
                        }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(nama_matauang[itemIndex].simbol+' '+result.price);

                        var td7Product = $('<td>',{
                            id:'keterangan_edit-'+itemIndex
                        }).css({
                            'padding': 'auto',
                            'width': '10%', 
                        }).text(result.keterangan);
                        var td8Product = $('<td>').css({
                            'padding': 'auto',
                            'width': '10%', 
                        })
                            array_kode[itemIndex] = result.kode
                            array_tgl[itemIndex] = result.tgl_kirim
                            array_rute[itemIndex] = result.rute
                            array_nama[itemIndex] = name_ekspedisi_lcl[itemIndex].id
                            array_resi[itemIndex] = result.resi
                            array_price[itemIndex] = result.price
                            array_keterangan[itemIndex] = result.keterangan
                            array_matauang[itemIndex]=result.id_matauang
                            id_pembelian_savelcl= result.id_pembelianlcl
                            var editButtonEkspedisi = $('<button>')
                            .addClass('btn btn-sm btn-primary')
                            .css({
                                'margin-left': '5px',
                            })
                            .html('<i class="fas fa-edit"></i>')  // Assuming you're using Font Awesome for icons
                            .attr('title', 'Edit')
                            .attr('data-kode', result.kode)
                            .on('click', function() {
                                // Your edit logic here
                                var kode = $(this).data('kode');
                                var getIndex = itemIndex;
                                console.log('array_keterangan[getIndex]',array_keterangan)
                                // Open the modal and populate it with kode
                                $('#editModalEksepedisiLcl').modal('show');
                                $('.edit_kode_ekspedisi_lcl').val(array_kode[getIndex]);
                                $('.edit_tgl_kirim_ekspedisi').val(array_tgl[getIndex])
                                   
                                $('.edit_matauang_ekspedisi').val(array_matauang[getIndex]).trigger('change');
                                $('.edit_biaya_ekspedisi_lcl').val(array_price[getIndex])
                                $('.rute_ekspedisi').val(array_rute[getIndex]).trigger('change')
                                $('.edit_ekspedisi_lcl').val(array_nama[getIndex]).trigger('change')
                                $('.edit_no_resi').val(array_resi[getIndex])
                                $('.edit_keterangan').val(array_keterangan[getIndex])
                                $('#update_ekspedisi').data('index', getIndex); 
                                
                            });
                          
                              
                        // Create the delete button
                        var deleteButtonEksepedisi = $('<button>')
        .addClass('btn btn-sm btn-danger')
        .css({ 'margin-left': '5px' })
        .html('<i class="fas fa-trash"></i>')
        .attr('title', 'Delete')
        .on('click', function() {
            var itemIndex3 = $(this).closest('tr').index(); // Get index of the row

            // Remove item from arrays
            array_kode.splice(itemIndex3, 1);
            array_tgl.splice(itemIndex3, 1);
            array_rute.splice(itemIndex3, 1);
            array_nama.splice(itemIndex3, 1);
            array_resi.splice(itemIndex3, 1);
            array_price.splice(itemIndex3, 1);
            array_keterangan.splice(itemIndex3, 1);
            array_matauang.splice(itemIndex3, 1);

            // Remove the row from the table
            $(this).closest('tr').remove();

            // Log the updated arrays after deletion
            console.log('Deleted row and updated arrays for index:', itemIndex3);
            console.log('array_kode:', array_kode);
            console.log('array_tgl:', array_tgl);
            console.log('array_rute:', array_rute);
            console.log('array_nama:', array_nama);
            console.log('array_resi:', array_resi);
            console.log('array_price:', array_price);
            console.log('array_keterangan:', array_keterangan);
            console.log('array_matauang:', array_matauang);
        });
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
                                var itemIndex2 = $(this).data('index');
                                // console.log('itemIndex2',itemIndex2)
                                $.ajax({
                            
                                    type: 'GET',
                                    url: '{{ route('admin.pembelian_lcl') }}',
                                    data: formUpdateEkspedisi,
                                    success: function(response) {
                                        console.log('res',response)

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
                                        $('#produk_ekspedisi_edit-' + itemIndex2).text(response.kodepengiriman);
                                        $('#tgl_ekspedisi_edit-' + itemIndex2).text(formattedDateEkspedisiEdit);
                                        $('#rute_ekspedisi_edit-' + itemIndex2).text(response.rute);
                                        $('#nama_ekspedisi_edit-' + itemIndex2).text(response.ekspedisi_name);
                                        $('#resi_ekspedisi_edit-' + itemIndex2).text(response.resi);
                                        $('#price_ekspedisi_edit-' + itemIndex2).text(response.matauang_simbol+' '+response.price);
                                        $('#keterangan_edit-' + itemIndex2).text(response.keterangan);
                                        
                                        //menginisiasi nilai yang telah diupdate
                                        array_kode[itemIndex2] = response.kodepengiriman
                                        array_tgl[itemIndex2] = response.tgl_kirim
                                        array_nama[itemIndex2] = response.ekspedisi
                                        array_keterangan[itemIndex2]= response.keterangan
                                        array_resi[itemIndex2]=response.resi
                                        array_price[itemIndex2]= response.price
                                        array_rute[itemIndex2]= response.rute
                                        array_matauang[itemIndex2]=response.matauang
                                        
                                        $('#editModalEksepedisiLcl').modal('hide');
                                    }


                                })
                           
                                
                            })
                           
                            td8Product.append(editButtonEkspedisi,deleteButtonEksepedisi)
                        tr.append(td1Product,td2Product,td3Product,td4Product,td5Product,td6Product,td7Product,td8Product)
                        tbody_container_ekspedisi.append(tr) 
                    });
                    $('#simpan-ekspedisi').on('click',function(){
                                    $.ajax({
                            
                                    type: 'GET',
                                    url: '{{route('admin.pembelian_lcl') }}',
                                    data: {
                                        menu:'save_ekspedisi',
                                        id_lcl:id_pembelian_savelcl,
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
                }
            };

            window.editLcl = function(pembelianLcl,image_barang,matauang,gudang) {
                $('#label-lcl').remove()
                $('#label-lcl-ekspedisi').remove()
                $('#matauang_pembayaran').select2({
                    placeholder: "Pilih Mata Uang", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                $('#tambah_matauang_ekspedisi').select2({
                    placeholder: "Pilih Mata Uang", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                $('#edit_matauang_ekspedisi').select2({
                    placeholder: "Pilih Mata Uang", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                $('#rute').select2({
                    placeholder: "Pilih Rute", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                $('#rute_ekspedisi').select2({
                    placeholder: "Pilih Rute", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                $('#ekspedisi').select2({
                    placeholder: "Pilih ekspedisi", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                
                $('#edit_ekspedisi_lcl').select2({
                    placeholder: "Pilih ekspedisi", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
                });
                
                    id_lcl = pembelianLcl.id
                    // console.log('pembelianLcl',pembelianLcl)
                    var checboxppn = $('#flexCheckDefault');
                    var newValueDiscountNominal=0
                    var newvalue_discount_percent=0
                    var totalBaru=0;
                    var checkboxincludeppn = $('#flexCheckDefaultTermasukkPPN');
                    var subtotal_edit=0;
                    $('#text_area').val(pembelianLcl.keterangan)
                    valuenominalconvert=pembelianLcl.nominal_convert
                    
                    if(pembelianLcl.status_ppn ==1){
                        checboxppn.prop('checked', true);
            
                        // Ganti nilai checkbox menjadi 1
                        checboxppn.val('1');
                    }
                    if(pembelianLcl.status_includeppn ==1){
                        checkboxincludeppn.prop('checked', true);
            
                        // Ganti nilai checkbox menjadi 1
                        checkboxincludeppn.val('1');
                    }
                    var item_item =[]
                    // Get the dropdown element
                    const $selectDb = $('#select_db');

                    // Initialize Select2
                    $selectDb.select2({

                        placeholder: 'Select Database', // Customize as needed
                        allowClear: true, // Optional, allows clearing the selection
                        width: 'resolve' // Adjusts width to fit the container
                    });

                    // Set the selected value of the dropdown
                    $selectDb.val(pembelianLcl.name_db).trigger('change');
                    
                    const $select_supplier = $('#select_supplier');
                    // Initialize Select2
                    $select_supplier.select2({
                
                        placeholder: 'Pilih Supplier', // Placeholder text
                        allowClear: true, // Optional, to allow clearing the selection
                        width: 'resolve' // Automatically adjust width to fit the container
                    });

                    // Set the selected value
                    $select_supplier.val(pembelianLcl.id_supplier).trigger('change');
                    
                    const $select_matauang = $('#select_matauang');
                    // Initialize Select2
                    $select_matauang.select2({
                
                        placeholder: 'Pilih Supplier', // Placeholder text
                        allowClear: true, // Optional, to allow clearing the selection
                        width: 'resolve' // Automatically adjust width to fit the container
                    });

                    // Set the selected value
                    $select_matauang.val(pembelianLcl.id_matauang).trigger('change');
                    
                    const $select_termin_cash = $('#select_termin_cash');
                    // Initialize Select2
                    $select_termin_cash.select2({
                
                        placeholder: 'Pilih Supplier', // Placeholder text
                        allowClear: true, // Optional, to allow clearing the selection
                        width: 'resolve' // Automatically adjust width to fit the container
                    });

                    // Set the selected value
                    $select_termin_cash.val(pembelianLcl.id_termin).trigger('change');
                    
                    const $select_account = $('#select_termin_rekening');
                    // Initialize Select2
                    $select_account.select2({
                
                        placeholder: 'Pilih Supplier', // Placeholder text
                        allowClear: true, // Optional, to allow clearing the selection
                        width: 'resolve' // Automatically adjust width to fit the container
                    });

                    // Set the selected value
                    $select_account.val(pembelianLcl.id_account).trigger('change');
                    
                    const $select_cabang = $('#select_cabang');
                    // Initialize Select2
                    $select_cabang.select2({
                
                        placeholder: 'Pilih Supplier', // Placeholder text
                        allowClear: true, // Optional, to allow clearing the selection
                        width: 'resolve' // Automatically adjust width to fit the container
                    });

                    // Set the selected value
                    $select_cabang.val(pembelianLcl.id_cabang).trigger('change');

                    const $select_barang = $('#select_barang');
                    // Initialize Select2
                    $select_barang.select2({
                
                        placeholder: 'Pilih Item', // Placeholder text
                        allowClear: true, // Optional, to allow clearing the selection
                        width: 'resolve' // Automatically adjust width to fit the container
                    });


                    $('#tgl_request').val(pembelianLcl.tgl_transaksi);
                    $('.no-referensi').val(pembelianLcl.noreferensi)
                    if (window.dataTableInstance) {
                        window.dataTableInstance.destroy();
                    }
              

                    var contentImport = $('.container-import2');
                    item =[]
                    
                    //jika status convert =1
                    if(pembelianLcl.status_converttorupiah==1){
                        
                            var newHeader = $('<th>Harga Belum PPN (Rp)</th>');                                    
                            // Append the new header after the specified element
                            $('#harga-belum-ppn').after(newHeader);
                            $('#harga-belum-ppn').text('Harga Invoice '+'('+matauang[0].simbol+')');
                        
                            var text_convert_idr = $('#text_convert')
                            var paragraph = $('<p>').text(matauang[0].simbol+' 1 = Rp. '+pembelianLcl.nominal_convert)
                            text_convert_idr.append(paragraph)
                            
                    }

                    pembelianLcl.detail.forEach((result, itemIndex) => 
                    {
                                  
                                    ppn_item[itemIndex] = result.ppn
                                    iditem_arr[itemIndex] = result.id_barang,
                                    idcomercialimport[itemIndex]= result.id_penjualanfromchina ||''
                                    idrestokimport[itemIndex]= result.id_restok ||''
                                    var tr=$('<tr>')
                                    var tdProduct = $('<td>').css({
                                                    'padding': 'auto',
                                                    'width': '10%'
                                            });
                                    var imgProduct = $('<img class="img-fluid" style="max-width: 20%%; height: auto;">');
                                    imgProduct.attr('src',image_barang[itemIndex].imagedir)
                                    tdProduct.append(imgProduct);
                                    
                                    var td1Product = $('<td>').css({
                                            'padding': 'auto',
                                            'width': '25%',  
                                    });
                                    var inputtd1Product = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value:image_barang[itemIndex].name,
                                            id:'name'+itemIndex
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
                                            id:'price_asal'+itemIndex,
                                            value: result.price
                                    }).css({
                                        'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    harga_asal[itemIndex] = inputtd2Product.val()
                                    var td3Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '7%',  
                                    });
                                    
                                
                            
                                    var inputtd3Product = $('<input>', {
                                            type: 'number', 
                                            class: 'form-control',
                                            value: result.qty,
                                            id: 'qty_qty'+itemIndex
                                    }).css({
                                        'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                    });
                                    td3Product.append(inputtd3Product)
                                    qty_arr[itemIndex] = inputtd3Product.val()
                                    var td4Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '7%',  
                                    });
                                    //row input disc
                                    var inputtd4Product = $('<input>', {
                                            type: 'number', 
                                            class: 'form-control', 
                                            value: result.disc,
                                            id: 'discount'+itemIndex
                                    });
                                    inputtd4Product.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px', 
                                            'width': '100%' 
                                    });
                                    td4Product.append(inputtd4Product)
                                    discount_arr[itemIndex] = inputtd4Product.val()

                                    var td5Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '10%',  
                                    });
                                    var inputtd5Product = $('<input>', {
                                            type: 'text', 
                                            class: 'form-control', 
                                            value: result.subtotal_idr,
                                            id:'subtotal'+itemIndex
                                    });
                                    inputtd5Product.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px', 
                                            'width': '100%' 
                                    });
                                    td5Product.append(inputtd5Product)

                                    var td6Product = $('<td>').css({
                                            'padding': 'auto', 
                                            'width': '5%',  
                                    });
                                    var checkboxElementProduct = $('<input>', {
                                        type: 'checkbox',
                                        id: 'checkboxId_' + itemIndex,
                                        value: result.status_ppn,
                                        checked: result.status_ppn == 1
                                    }).css({
                                        'border': '1px solid #696868',
                                    }).on('change', function() {
                                        var newValue = this.checked ? 1 : 0;
                                        $(this).val(newValue);

                                        changeHistory[itemIndex] = newValue;
                                
                                    
                                    });
                                    changeHistory[itemIndex] = checkboxElementProduct.val()
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
                                    gudang.forEach(function(gudangitem,index) {
                                        var optionElement = $('<option>', {
                                            // text: gudangitem, // Use id as the value
                                            
                                            value: gudangitem.id,
                                            text: gudangitem.name

                                        });
                                        if(gudangitem.id==result.id_gudang){
                                            optionElement.attr('selected','selected')
                                            selectedValuesArray[itemIndex] = optionElement.val()
                                        }
                                        selectGudang.append(optionElement);
                                    });
                                    selectGudang.on('change', function() {
                                        
                                
                                        var newValue = $(this).val();
    
                                        // Update the selectedValuesArray with the new value
                                        selectedValuesArray[itemIndex] = newValue;
                                        
                                 
                                        
                                        
                                    });
                                    
                                    td7Product.append(selectGudang)

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
                                    newTd9.append(deleteButton)

                                    
                                    

                                    
                                    subtotal_edit += result.subtotal_idr
                                    subtot_arr[itemIndex] = result.subtotal_idr

                                    if(pembelianLcl.status_converttorupiah==1){
                                        statusconvert =1
                                        var newTdHargaInvoice = $('<td>').css({
                                            'padding': 'auto',  
                                            'width': '10%',  
                                            
                                        });

                                        var inputHargaInvoice = $('<input>', {
                                            id:'input_harga_invoice2',
                                            type: 'number',
                                            class: 'form-control harga2-invoice',
                                            value:pembelianLcl.nominal_convert * result.price
                                        });
                                        inputHargaInvoice.css({
                                            'border': '1px solid #696868', 
                                            'color': 'black', 
                                            'padding': '10px',
                                            'width': '100%' 
                                        });
                                        inputHargaInvoice.prop('disabled', true);
                                        price_invoice_arr[itemIndex] = inputHargaInvoice.val()
                                        newTdHargaInvoice.append(inputHargaInvoice)
                                    }
                                    function updateCalculatedValue() {
                                        console.log('masuk calculate')
                                        var inputField = $(`#price_asal${itemIndex}`);
                                        
                                        var value_belumppn = parseFloat(inputField.val())  ;
                               
                                        console.log('harga_asal',value_belumppn)
                                        var input_discount = $(`#discount${itemIndex}`);
            
                                        var value_discount = parseFloat(input_discount.val()) || 0;
                                        // console.log('value_discount',value_discount)
                                        // discount_arr_select[itemIndex]=value_discount
                                        
                                        var value3 = value_discount
                                        console.log('value_discount',value3)

                                        var value1 = value_belumppn;
                                    
                                        var inputFieldqty = $(`#qty_qty${itemIndex}`);
            
                                
                                        var value_qty = parseFloat(inputFieldqty.val()) || 1;

                                        harga_asal[itemIndex] = value1; 
                                        qty_arr[itemIndex] = value_qty;
                                        
                                
                                        // harga_asal_select[itemIndex] = value_belumppn;
                                            
                                        
                                        discount_arr[itemIndex] = value3;
                                    
                                        
                                        var value2 = value_qty;

                                        // Calculate the new value
                                        var calculatedValue = (value1 * value2);
                                   
                                        
                                        // menghitung dan menyetting value harga subtotal
                                        if(result.status_converttorupiah==0){
                                            
                                            statusconvert =0
                                            //inisiasi value subtotal
                                            $(`#subtotal${itemIndex}`).val(calculatedValue);
                                            subtot_arr[itemIndex]=$(`#subtotal${itemIndex}`).val()
                                            // subtot_arr_select[itemIndex] = calculatedValue;
                                            
                                            // async()
                                            
                                        }
                                        else{
                                            
                                            inputHargaInvoice.val(value1*pembelianLcl.nominal_convert)
                                            price_invoice_arr[itemIndex] =pembelianLcl.nominal_convert*value1
                                            
                                            $(`#subtotal${itemIndex}`).val((calculatedValue*pembelianLcl.nominal_convert)-value3);
                                            // subtot_arr_select[itemIndex]= calculatedValue*nominal_convert
                                            // async()
                                            subtot_arr[itemIndex]=$(`#subtotal${itemIndex}`).val()
                                            // console.log('subtot_arr',subtot_arr)
                                            subtotal_edit = subtot_arr.reduce(function(accumulator, currentValue) {
                                                return accumulator + parseFloat(currentValue || 0); // Menambahkan nilai, konversi ke angka
                                            }, 0);
                                            $('.sutotal_element').text(subtotal_edit)
                                            td_subtotal=subtotal_edit
                                            var discount_percent_new = (subtotal_edit*0.11)-(subtotal_edit*0.11*newvalue_discount_percent).toFixed(2)
                                            var discount_nominal_new =newValueDiscountNominal||0
                                            $('.ppn_element').text(discount_percent_new||subtotal_edit*0.11)
                                            td_ppn=discount_percent_new||subtotal_edit*0.11
                                            $('.total_element').text(subtotal_edit+(discount_percent_new||subtotal_edit*0.11)-discount_nominal_new)
                                            td_total=subtotal_edit+(discount_percent_new||subtotal_edit*0.11)-discount_nominal_new

                                            $('#discount_nominal').on('change',function(){
                                                
                                                $('.sutotal_element').text(subtotal_edit)
                                                td_subtotal=subtotal_edit
                                                var ppnmerge=((subtotal_edit*0.11)-(subtotal_edit*0.11)*newvalue_discount_percent)
                                                console.log('ppnmerge',ppnmerge)
                                                $('.ppn_element').text(ppnmerge.toFixed(2)||(subtotal_edit*0.11).toFixed(2))
                                                td_ppn = ppnmerge||subtotal_edit*0.11
                                                console.log('discount nominal')
                                                
                                                
                                                newValueDiscountNominal = $(this).val()
                                                
                                                td_discount_nominal = newValueDiscountNominal
                                                var subtotal_new =((subtotal_edit+parseFloat(ppnmerge))-newValueDiscountNominal)
                                                $('.total_element').text(subtotal_new.toFixed(2))
                                                td_total = subtotal_new.toFixed(2)
                                            })  
                                            $('#discount_percent').on('change',function(){
                                                // console.log('discount percent edit')
                                                newvalue_discount_percent = ($(this).val())/100;
                                                
                                                td_discount=$(this).val()
                                                $('.sutotal_element').text(subtotal_edit)
                                                td_subtotal=subtotal_edit
                                                var ppnmerge=(subtotal_edit*0.11-(subtotal_edit*0.11*newvalue_discount_percent))
                                                $('.ppn_element').text(ppnmerge.toFixed(2))
                                                td_ppn =ppnmerge.toFixed(2)
                                                $('#discount_nominal').text(newValueDiscountNominal||pembelianLcl.discount_nominal)
                                                td_discount_nominal = newValueDiscountNominal||pembelianLcl.discount_nominal
                                                var newTotal = (subtotal_edit + ppnmerge)-newValueDiscountNominal;
                                                
                                                $('.total_element').text(newTotal.toFixed(2));
                                                td_total = newTotal.toFixed(2)
                                            })  
                                        }
                    
                                    }
                                            $('.sutotal_element').text(subtotal_edit)
                                            td_subtotal = subtotal_edit
                                            $('.ppn_element').text(pembelianLcl.ppn)
                                            td_ppn = pembelianLcl.ppn
                                            $('#discount_percent').val(pembelianLcl.discount)
                                            td_discount = pembelianLcl.discount
                                            $('#discount_percent').on('change',function(){
                                                $('.sutotal_element').text(subtotal_edit)
                                                td_subtotal=subtotal_edit
                                                // $('.ppn_element').text(pembelianLcl.ppn)
                                                td_discount_nominal=newValueDiscountNominal
                                                newvalue_discount_percent = ($(this).val())/100;
                                                td_discount =$(this).val()
                                                var value_ppn_discount_percent = pembelianLcl.ppn-(newvalue_discount_percent*pembelianLcl.ppn)
                                                td_ppn = value_ppn_discount_percent
                                                $('.ppn_element').text(value_ppn_discount_percent)
                                                $('.total_element').text((subtotal_edit+value_ppn_discount_percent)-newValueDiscountNominal)
                                                td_total = (subtotal_edit+value_ppn_discount_percent)-newValueDiscountNominal
                                            })
                                            $('#discount_nominal').val(pembelianLcl.discount_nominal)
                                            td_discount_nominal = pembelianLcl.discount_nominal
                                            $('#discount_nominal').on('change',function(){
                                                $('.sutotal_element').text(subtotal_edit)
                                                td_subtotal=subtotal_edit
                                                $('#discount_percent').val(pembelianLcl.discount||newvalue_discount_percent*100)
                                                newValueDiscountNominal = $(this).val()
                                                td_discount_nominal=newValueDiscountNominal
                                                var discount_percent_input = newvalue_discount_percent || 0;
                                                
                                                
                                                var value_ppn_discount_percent = pembelianLcl.ppn - (discount_percent_input * pembelianLcl.ppn);
                                                td_ppn = value_ppn_discount_percent
                                                $('.ppn_element').text(value_ppn_discount_percent)
                                                $('.total_element').text((subtotal_edit+value_ppn_discount_percent)-newValueDiscountNominal)
                                                td_total = (subtotal_edit+value_ppn_discount_percent)-newValueDiscountNominal
                                            })
                                            $('.total_element').text(
                                                ((subtotal_edit + pembelianLcl.ppn) - pembelianLcl.discount_nominal) * 
                                                (pembelianLcl.discount !== 0 ? pembelianLcl.discount : 1)
                                            );
                                            td_total= ((subtotal_edit + pembelianLcl.ppn) - pembelianLcl.discount_nominal) * 
                                            (pembelianLcl.discount !== 0 ? pembelianLcl.discount : 1)
                                            // td_discount =pembelianLcl.discount
                                            // Update calculation when values change
                                            
                                            inputtd2Product.on('input', updateCalculatedValue);
                                            inputtd3Product.on('input', updateCalculatedValue);
                                            inputtd4Product.on('input',updateCalculatedValue)

                                            item[itemIndex] = inputtd1Product.val()
                                            
                                                        
                                            td1Product.append(inputtd1Product)
                                            td2Product.append(inputtd2Product)
                                            tr.append(tdProduct,td1Product,td2Product,newTdHargaInvoice,td3Product,td4Product,td5Product,td6Product,td7Product,newTd9);
                                            contentImport.append(tr)
                    });
                             
            };     

                if(editClick==true){
                
                    document.getElementById('sendSave').addEventListener('click',function(){
                                
                        
                            
                                        
                                var database= $('#select_db').val()
                                var valueCategory = $('#select_category_convert').val()
                                
                                var noreferensi=$('.no-referensi').val()
                                var tgl_transaksi = $('#tgl_request').val()
                    
                                var termin = $('#select_termin_cash').val()
                                var account = $('#select_termin_rekening').val()
                            
                                var selectedSupplierValue = $('select[name="supplier_select"]').val();
                                var select_namematauang = $('select[name="select_namematauang"]').val()
                                
                                var harga_belum_ppn_import = $('#harga_belum_ppn_import').val() ||''
                                var qty_import = $('#qty_import').val()
                                var disc_import = $('#disc_import').val()

                       
                          
                                if(statusconvert==1){

                                    var valuecategoryconvert = 'custom';
                                }else{
                                    var valuecategoryconvert = 'default';

                                }
                                var keterangan = $('#text_area').val()
                                var cabang = $('#select_cabang').val()  
                                
                                var ppnValueText = $('.ppn_element').text();
                                var discount_save = $('#discount_percent').val()
                                var discount_nominal_save = $('#discount_nominal').val()

                                var subtotalValueText = $('.sutotal_element').text()
                                var total_elementValueText= $('.total_element').text()
                                var include_ppn = $('#flexCheckDefaultTermasukkPPN').val()
                                var ppnCentang =$('#flexCheckDefault').val()
                        
                                
                                
                                // if (!database) {
                                //     Swal.fire({
                                //         icon: 'error',
                                //         title: 'Error',
                                //         text: 'Pilih Database!',
                                //     });
                                //     return; // Stop further execution if validation fails
                                // }
                            
                                
                                // if (!tgl_transaksi) {
                                //     Swal.fire({
                                //         icon: 'error',
                                //         title: 'Error',
                                //         text: 'Pilih Tanggal Transaksi!',
                                //     });
                                //     return; // Stop further execution if validation fails
                                // }
                        
                                // if (!cabang) {
                                //     Swal.fire({
                                //         icon: 'error',
                                //         title: 'Error',
                                //         text: 'Pilih Cabang!',
                                //     });
                                //     return; // Stop further execution if validation fails
                                // }
                                // if(iditem_arr.length!=0 && selectedValuesArray_arr.length!=iditem_arr.length){
                                //     Swal.fire({
                                //         icon:'error',
                                //         title: 'Error',
                                //         text:'Pilih Gudang Dahulu!'
                                //     });
                                //     return

                                // }
                                // if(iditem_select.length!=0 && selectedValuesArray.length!=iditem_select.length){
                                //     Swal.fire({
                                //         icon:'error',
                                //         title: 'Error',
                                //         text:'Pilih Gudang Dahulu!'
                                //     });
                                //     return

                                // }
                            

                                var formDataSendEdit = {
                                    menu:'edit',
                                    id_lcl:id_lcl,
                                    database:database,
                                    noreferensi,noreferensi,
                                    tgl_transaksi:tgl_transaksi,
                                    termin:termin,
                                    account:account,
                                    item:item,
                                    iditem_arr:iditem_arr,
                                    idcommercial:idcomercialimport,
                                    idrestok:idrestokimport,
                                    price_asal:harga_asal,
                                    price_invoice_arr:price_invoice_arr,
                                    qty:qty_arr,
                                    discount:discount_arr,
                                    ppn:changeHistory,
                                    subtot_arr:subtot_arr,
                                    gudang:selectedValuesArray,
                                    include_ppn:include_ppn,
                                    ppnCentang:ppnCentang,
                                    supplier:selectedSupplierValue,
                                    matauang:select_namematauang,
                                    statusconvert:statusconvert,
                                    valuecategoryconvert:valuecategoryconvert,
                                    nominalconvert:valuenominalconvert,
                                    keterangan:keterangan,
                                    cabang:cabang,
                                    ppn_item:ppn_item,
                                    td_ppn:td_ppn,
                                    td_subtotal:td_subtotal,
                                    td_total:td_total,
                                    td_discount:td_discount,
                                    td_discount_nominal:td_discount_nominal
                                };
                                console.log('formDataSendEdit',formDataSendEdit)
                                $.ajax({
                                    type: 'GET',
                                    url: '{{ route('admin.pembelian_tambah_lcl') }}',
                                    data: formDataSendEdit,
                                    success: function(response) {
                                    Swal.fire({
                                        icon:'success',
                                        title:'Success',
                                        text:'LCL Berhasil Diupdate'
                                    }).then((result)=>{
                                    if(result.isConfirmed){
                                        window.location.reload();
                                    }
                                    });
                                    },error: function(xhr, status, error) {
                                        console.log('Terjadi kesalahan:',error);
                                    }
                                })
                    })
                   
                }
        }
        // });
        
       
    // });
</script> 
@endsection