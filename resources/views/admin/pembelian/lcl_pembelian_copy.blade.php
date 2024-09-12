@extends('admin.templates_baru')


@section('title')
LCL  Copy | PT. Maxipro Group Indonesia
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

                                <div id="pembayaran-content" class="tab-content" style="display: none;">
                                    <div>
                                        <label for="">Belum Ada LCL</label>
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









<script src="../assets/js/lcl/lcl.js"></script>

<!-- digunakan untuk pick date filter -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>






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
                url:"{{ route('admin.pembelian_lclimportbarang') }}",
                method:'GET',
                data:{id:importBarang},
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
        var idcomercialimport
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

          
            idcomercialimport=hiddenValue
      

            // console.log('idrestokimport',idrestokimport)
            var formData = {
                idcommercial:hiddenValue
                
            };
            idrestokimport=[]
            var contentImport2 = $('.container-import');
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_lclimport') }}',
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
                           
                            
                            // if(newBoolHargaBelumPpn===true){
                            //    console.log('nominal_convert',nominal_convert)
                            //     inputHargaInvoice.val(5)
                            //     console.log('newBoolHargaBelumPpn',newBoolHargaBelumPpn)
                            // }

                            
                                         

                                            newTdHargaInvoice.append(inputHargaInvoice);
                
                            newTd9.append(deleteButton);
                            
                                //menampilkan td harga belum ppn
                                // if (newBoolHargaBelumPpn == true) {
                                    
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

        async function async() {
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
                console.log('centang')
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
                console.log('centang')
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
    $(document).ready(function() {
        // Handle the click event for the edit button
        $('.btn-edit').on('click', function() {
            // Get the data-id attribute value
            var invoice = $(this).attr('data-id');
            
            // Output the id to the console (or use it as needed)
            
            
            // Example: You can now use this ID in an AJAX request or any other logic
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_lcl_editview') }}',
                data: { invoice: invoice },
                success: function(response) {
                
                
                    var pembelianLcl = response.msg.pembelianlcl
                    var image_barang = response.msg.image_barang
                    var matauang = response.msg.matauang
                    // console.log(imageBarang)
                    editLcl(pembelianLcl,image_barang,matauang)
                }
            });
            window.editLcl = function(pembelianLcl,image_barang,matauang) {
                
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
                $('#openModalBtn').remove();
                $('#tabe-stok').remove();
                $('#radio-button').remove();
                $('#clearFilterBtn').remove();
                $('#tambah_lcl').remove();
                $('#tab-nav').show();
                $('#master-tab').trigger('click'); // Show master content by default
                

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
                    pembelianLcl.detail.forEach((result, itemIndex) => {
                                    console.log('pembelianLcl',pembelianLcl.detail)
                    console.log('imageBarang',image_barang[itemIndex].imagedir)
                    console.log('matauang',matauang)
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
                                value: result.status_ppn
                            }).css({
                                'border': '1px solid #696868',
                            });
                            td6Product.append(checkboxElementProduct)
                            // .on('change', function() {
                            //     var newValue = this.checked ? 1 : 0;
                            //     $(this).val(newValue);

                            //     changeHistory[itemIndex] = newValue;
                           
                            
                            // });

                            if(pembelianLcl.status_converttorupiah==1){
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
                                newTdHargaInvoice.append(inputHargaInvoice)
                            }
                            item[itemIndex] = inputtd1Product.val()
                            
                                        
                            td1Product.append(inputtd1Product)
                            td2Product.append(inputtd2Product)
                            tr.append(tdProduct,td1Product,td2Product,newTdHargaInvoice,td3Product,td4Product,td5Product,td6Product);
                            contentImport.append(tr)
                    });
                                console.log('item',item)
            };     
        });
    });
</script> 
@endsection