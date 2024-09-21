

<div class="row" id="padding-top">
    <div class="col-md-12 d-flex justify-content-end">
        <button type="button" id="importData" class="btn btn-large btn-info">Import Data</button>
    </div>
</div>

<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
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
                            <th scope="col">Invoice</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Supplier</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $number =0;
                        $number2 =0;
                        @endphp


                        @foreach($Data['msg']['importlistlcl'] as $result)
                        @php
                        $number2++;

                        @endphp

                        <form action="" class="form-horizontal" id="importBarang" method="get">
                            @csrf

                            <tr>
                                <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">


                                    <input type="checkbox" class="kubik-checkbox-tambah" name="checkbox_{{ $number2 }}">
                                    <input type="hidden" class="form-control restok-input-tambah"  name="id_commercial_{{ $number2 }}" value="{{ $result['id'] }}">


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
            <div class="modal-footer">
                 <button type="button" id="sendImportBarang" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
                                    
<form action=""id="TambahFcl">
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

            <select class="form-control supplier-supplier" id="supplier-tambah" name="supplier-tambah-name">
                
                <option value="">Supplier</option>
                @foreach($Data['msg']['list_supplier'] as $index => $result)
                    <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
           
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan</label>
                    <textarea type="text" class="form-control" id="address_company" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" ></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan</label>
                    <input type="text" class="form-control" id="city"name="city" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">No. Telp</label>
                    <input type="number" class="form-control" id="telp" name="telp" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                </div>
            </div>
        </div>

        

</form>

<form action="" class="form-horizontal" id="sendImportForm" method="get">
                    @csrf
                    <div style="margin-top:20px;position: relative; width: 100%;">
                        <div id="content-container2"></div>
                        <div id="content-container3"></div>
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="title_convert">Convert to USD</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <div class="form-group" >
                                                        <label for="">Rate <span style="color: red;">*</span></label>
                                                        <input type="number" class="form-control border-input" id="input_nominal" value="{{ $Data['msg']['rmbtousd']['nominal'] }}">
                                                    </div>

                                                    <h5 style="margin-top:10px;">Convert By Google: </h5>
                                                    <ul>

                                                        <li style="font-weight:bold;">{{ $Data['msg']['rmbtousd']['to_money'] }} to {{ $Data['msg']['rmbtousd']['from_money'] }} : {{ $Data['msg']['rmbtousd']['nominal'] }}</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="saveConvert" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                    </div>
</form>


                    
                    
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
        <div style="padding-top: 30px;" class="col-md-1">
            <label for="kodebaranglabel">Bank Supplier</label>
                        
        </div>
        <div class="col-md-11" style="padding-right: 600px;">
            <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control banksupplier-tambah" id="banksupplier-tambah-id" name="banksupplier_edit">
                    <option value="0">Pilih Bank Supplier</option>      

            
            </select>
        </div>
    </div>

</div>

<div class="form-group" style="padding-left: 20px;">

        <div class="row">
            <div style="padding-top: 30px;" class="col-md-1">
                <label for="kodebaranglabel">Currency</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;">
                
                <select class="form-control select2 currency-tambah" id="currency-tambah-id" name="currency_tambah">
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

<!-- script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/fcl-container/fcl-container.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
 $(document).ready(function() {
    
    $('#supplier-tambah').select2({
        placeholder: 'Supplier',
        allowClear: true,
        width: '100%'
    });
    $('#incoterms-tambah-id').select2({
        placeholder: 'Pilih Incoterms',
        allowClear: true,
        width: '100%'
    });
    $('#database_tambah_id').select2({
        placeholder: 'Pilih Database',
        allowClear: true,
        width: '100%'
    });
    $('#currency-tambah-id').select2({
        placeholder: 'Pilih Currency',
        allowClear: true,
        width: '100%'
    });

    // Apply margin-top after initializing Select2
    $('#currency-tambah-id').next('.select2-container').css('margin-top', '20px'); // Adjust margin-top value as needed
    
    $('#banksupplier-tambah-id').select2({
        placeholder: 'Pilih Bank Supplier',
        allowClear: true,
        width: '100%'
    });

    // Apply margin-top after initializing Select2
    $('#banksupplier-tambah-id').next('.select2-container').css('margin-top', '20px'); // Adjust margin-top value as needed

    var selectedSupplier = $('.supplier-supplier')
  
    selectedSupplier.on('change', function(event) {
        const selectedValueSupplier = event.target.value;
        const inputElementSelectedSupplier = document.getElementById('supplier-tambah'); // Ganti dengan ID yang sesuai
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

                // Iterate over the keys of filtered_supplier
                for (const key in response.filtered_supplier) { 
                    
                        const supplier = response.filtered_supplier[key];
                        
                        if (supplier) {
                            $('#address_company').val(supplier.address);
                            $('#city').val(supplier.city);
                            $('#telp').val(supplier.telp);
                        } else {
                            // console.log(`Address not found for key ${key}`);
                            $('#address_company').val(supplier.address);
                            $('#city').val(supplier.city);
                            $('#telp').val(supplier.telp);
                        }
                    
                }
                
                $('#currency-tambah-id').select2({
                    placeholder:'Pilih Currency',
                    allowClear:true,
                    width:'100%'
                })
                //select2
                if (response.filtered_bank_supplier.length == 0) {
                    var $select = $('#banksupplier-tambah-id'); // Get the raw DOM element
                    
                    // Clear existing options
                    $select.empty();
                    
                    // Add default option
                    $select.append('<option value="0">Pilih Bank Supplier</option>');

                    // Reinitialize Select2
                    $select.select2({
                        placeholder: 'Pilih Bank Supplier',
                        allowClear: true,
                        width: '100%' // Adjust the width if needed
                    });

                    //mengisi value menjadi string kosong
                    $('#bank_name_id_tab').val('');
                    $('#bankAddress_id_tab_tambah').val('');
                    $('#swiftCode_id_tab_tambah').val('');
                    $('#accountNo_id_tab_tambah').val('');
                    $('#beneficiaryName_id_tab_tambah').val('');
                    $('#beneficiaryAddress_id_tab_tambah').val('');

                    
                    $('#banksupplier-tambah-id').next('.select2-container').css('margin-top', '20px'); //mengatur posisi element dari atas
                    $('#currency-tambah-id').next('.select2-container').css('margin-top', '20px'); // mengatur posisi element dari atas

                } else {
                    var $select = $('#banksupplier-tambah-id'); // mengambil nilai dari id
                    
                    // menghapus nilai yang sudah ada
                    $select.empty();
                    
                    // menambah default option
                    $select.append('<option value="0">Pilih Bank Supplier</option>');

                    
                    // looping dari response filter bank ke option
                    for (const key2 in response.filtered_bank_supplier) {
                        var bank_supplier = response.filtered_bank_supplier[key2];
                        if (bank_supplier) {
                            console.log('select', bank_supplier.id);
                            console.log('select', bank_supplier.bank_name);
                            
                            // Create new option element
                            var newOption = $('<option></option>')
                                .val(bank_supplier.id) // The value for the option
                                .text(bank_supplier.bank_name); // The label for the option
                            
                            // Append the new option to the select element
                            $select.append(newOption);
                        }
                    }
                    
                   
             
                    // Handle perubahan select pada bank supplier
                    $select.on('change', function() {
                        var selectedId = $(this).val();
                        console.log('Selected ID:', selectedId);
                        //bila id yang dipilih bank supplier !=0
                        if(selectedId!=0){

                            $.ajax({
                                type: 'GET',
                                url: '{{ route('admin.pembelian_fcl') }}',
                                data: {
                                    menu: 'select_bank_supplier',
                                    select_id_banksupplier: selectedId
                                },
                                success: function(response) {
                                    console.log('response', response);
                                 
                                        for (const key2 in response.filtered_bank_supplier) {
                                            var bank_supplier2 = response.filtered_bank_supplier[key2];
                                            console.log('bank_supplier2.name', bank_supplier2.bank_name);
                                     
                                            $('#bank_name_id_tab').val(bank_supplier2.bank_name);
                                            $('#bankAddress_id_tab_tambah').val(bank_supplier2.bank_address);
                                            $('#swiftCode_id_tab_tambah').val(bank_supplier2.swiftcode);
                                            $('#accountNo_id_tab_tambah').val(bank_supplier2.account_number);
                                            $('#beneficiaryName_id_tab_tambah').val(bank_supplier2.beneficiary_name);
                                            $('#beneficiaryAddress_id_tab_tambah').val(bank_supplier2.beneficiary_address);
                                            var $currencyDropdown = $('#currency-tambah-id');
                                            
                                            //mengganti dropdown dengan value id_matauang dari response filterd_bank_supplier
                                            $currencyDropdown.val(bank_supplier2.id_matauang).trigger('change')
                                        }
                                    
                                     
                                },
                            });
                        }
                        else{
                            //mengisi value menjadi string kosong
                            $('#bank_name_id_tab').val('');
                            $('#bankAddress_id_tab_tambah').val('');
                            $('#swiftCode_id_tab_tambah').val('');
                            $('#accountNo_id_tab_tambah').val('');
                            $('#beneficiaryName_id_tab_tambah').val('');
                            $('#beneficiaryAddress_id_tab_tambah').val('');

                            var $currencyDropdown = $('#currency-tambah-id')
                            $currencyDropdown.val(0).trigger('change');
                        }
                    });
                    
                    $('#banksupplier-tambah-id').next('.select2-container').css('margin-top', '20px'); //mengatur posisi element dari atas
                    $('#currency-tambah-id').next('.select2-container').css('margin-top', '20px'); // mengatur posisi element dari atas

                }

                
                
            }
        })
        
    });      



    $('#importData').on('click', function() {
      $('#importModal').modal('show');
    });
    function convertFunction(){
        // console.log('masuk')
        $('#myModal').modal('show')
    }
    //memproses data ketika mengklik simpan di modal import data
    $('#sendImportBarang').on('click',function(){
                        
                                    var qty_qty=[];
                                    var qty_qty2=[]
                                    var cbm1=0;
                                    var cbm_cbm=[];
                                    var tot_without_tax_arr =[];
                                    var cbm2Array = [];
                                    var tdTotQuantity = [];

                                    var without_tax_arr=[];
                                    var tot_price_rmb =[];
                                    var tot_price_usd =[];
                    
                        var selectedIds = [];
    
                        // Dapatkan semua checkbox yang dicentang
                        var selectedCheckboxes = $('.kubik-checkbox-tambah:checked');
                        
                        // Iterasi setiap checkbox yang dicentang
                        selectedCheckboxes.each(function() {
                            // Ambil nilai dari input hidden yang ada di baris yang sama
                            var hiddenValue = $(this).closest('tr').find('.restok-input-tambah').val();
                            
                            // Tambahkan nilai hidden ke dalam array
                            selectedIds.push(hiddenValue);
                        });
                        
                        
                        $.ajax({
                            type:'GET',
                            url:'',
                            data:{
                                menu:'importbarang',
                                id_commercial:selectedIds
                            },
                            success: function(response){
                                    console.log('response',response)
                                    var contentContainer = $('#content-container2');
                                    contentContainer.empty();
                                    var contentContainer2 = $('#content-container3');
                                    contentContainer2.empty();
                            
                                    var directory = response.name; 
                                    var hscodehistory =[];
                                    var grossWeight =0;
                                    var nettWeight=0;
                                    var without_tax=0;
                                    var unitPriceUsd=0;
                                    var totalPriceUsd=0;
                                    var qty_input7  =0;
                                    var tdElement =0;

                                    var detail = response.msg.importlistlcl
                                    
                                    var num_key=0;
                                    var tot_freight_cost=0
                                    var tot_insurance=0
                                    detail.forEach(function(item,itemindex){
                                        item.detail.forEach(function(order,index){
                                            console.log('order',order)
                                            var id_barang = order
                                            var productName = response.msg.product[num_key].name || ' ';
                                            var gambarName ='https://maxipro.id/images/barang/'+response.msg.product[num_key].image;
                                            
                                            var title_import= $('<h2>').html(item.name+' - '+item.phone)
                                            var newTable1 = $('<table>');
                                            var inputDetailElement = $('<input />').attr({
                                                'id': 'id_edit_import'+num_key,          
                                                'name': 'restok_'+(num_key),      
                                                'class': 'form-control restok_import_tambah',    
                                                'placeholder': '',        
                                                'type': 'hidden',          
                                                'value':order.id_restok,
                                           
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                                            });

                                            var input_barangElement = $('<input />').attr({
                                                'id': 'id_barang_import'+num_key,          // ID untuk elemen input
                                                'name': 'inputComercial_'+(num_key),      // Nama untuk elemen input
                                                'class': 'form-control comercial_import_tambah',    // Kelas CSS untuk elemen input
                                                'placeholder': '',        // Placeholder untuk elemen input
                                                'type': 'hidden',          // Tipe input
                                                'value': order.id_penjualanfromchina
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                                            });

                                            var input_idCommercialElement = $('<input />').attr({
                                                'id': 'id_detail_barang_import'+num_key,          // ID untuk elemen input
                                                'name': 'inputComercialDetail_'+(num_key),      // Nama untuk elemen input
                                                'class': 'form-control comercial_detail_import_tambah',    // Kelas CSS untuk elemen input
                                                'placeholder': '',        // Placeholder untuk elemen input
                                                'type': 'hidden',          // Tipe input
                                                'value': order.id
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
                                                'id': 'chinese_name_import'+num_key,
                                                'name': 'chinese_name_' + (num_key),  
                                                'class': 'form-control chinese_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.name,
                                                'disabled':true
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
                                                'id': 'english_name_import'+num_key,
                                                'name': 'english_name_' + (num_key),  
                                                'class': 'form-control english_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': response.msg.product[num_key].name_english,
                                                'disabled':true
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
                                            var modelValue = order.model || ''; // Jika order.model null, maka gunakan string kosong
                                            
                                            var inputModel = $('<input />').attr({
                                                'id': 'model_import'+num_key,
                                                'name': 'model_name_' + (num_key),  
                                                'class': 'form-control model_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': modelValue,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            }); 

                                            newTdModel.append(inputModel);
                                            var newTd5 = $('<td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold;width:25.7%;">');
                                                newTd5.html('Brand<br>品牌'); 
                                                var brandValue = order.brand || '';
                                            var newTdBrand = $('<td colspan="2" style="border: 1px solid #d7d7d7;">');
                                            
                                            var inputBrand = $('<input />').attr({
                                                'id': 'brand_import'+num_key,
                                                'name': 'brand_name_' + (num_key),  
                                                'class': 'form-control brand_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': brandValue,
                                                'disabled':true
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
                                                'name': 'hscode-input_' + (num_key),  
                                                'class': 'form-control hscode_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.hs_code,
                                                'disabled':true
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
                                            // newTr6.append(newTdHsCode);
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
                                                newTd7Last.html('Unit Price <br>(RMB) ');
                                            var newTd8Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                                                newTd8Last.html('Unit Price <br>(USD)');
                                            var newTd9Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                                                newTd9Last.html('Total Price <br>(RMB)');
                                            var newTd10Last = $('<td  colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">');
                                                newTd10Last.html('Total Price <br>(USD)');
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
                                                'id': 'long_import'+num_key,          // index untuk urutan elemen input
                                                'name': 'long_' + (num_key),  
                                                'class': 'form-control long_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.length_m,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            });
                                            newTdTr3Table2.append(inputElement);
                                            
                                            var newTd2Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement2 = $('<input />').attr({
                                                'id': 'width_import'+num_key,     
                                                'name': 'width_'+ (num_key),      
                                                'class': 'form-control width_import',    
                                                'placeholder': '',   
                                                'type': 'text',
                                                'value': order.width_m,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'   
                                            });
                                            newTd2Tr3Table2.append(inputElement2);

                                            var newTd3Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement3 = $('<input />').attr({
                                                'id': 'height_import'+num_key,         
                                                'name': 'height_'+ (num_key),      
                                                'class': 'form-control height_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value' : order.height_m,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            });
                                            newTd3Tr3Table2.append(inputElement3);
                                            
                                            var newTd4Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement4 = $('<input />').attr({
                                                'id': 'long_p_import'+num_key,    
                                                'name': 'long_p_'+ (num_key),      
                                                'class': 'form-control long_p_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.length_p,            
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                                            });
                                            newTd4Tr3Table2.append(inputElement4);
                                            
                                            var newTd5Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement5 = $('<input />').attr({
                                                'id': 'width_p_import'+num_key,   
                                                'name': 'width_p_'+ (num_key),      
                                                'class': 'form-control width_p_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.width_p,
                                                'disabled':true            
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                                            });
                                            newTd5Tr3Table2.append(inputElement5);
                                            
                                            var newTd6Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement6 = $('<input />').attr({
                                                'id': 'height_p_import'+num_key,   
                                                'name': 'height_p_'+ (num_key),      
                                                'class': 'form-control height_p_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.height_p,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           // Sesuaikan dengan kebutuhan Anda
                                            });
                                            newTd6Tr3Table2.append(inputElement6);

                                            var newTd7Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                        
                                            var inputElement7 = $('<input />').attr({
                                                'id': 'qty_import'+num_key,          
                                                'name': 'qty_'+(num_key),
                                                'class': 'form-control qty_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.qty,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            });
                                            
                                            // Initialize qty_qty2 with current values
                                            
                                            qty_qty2[num_key] = parseFloat(inputElement7.val()) || 0;
                                            cbm_cbm[num_key] = order.cbm || 0;
                                            tot_price_rmb[num_key] = order.total_price_without_tax
                                            tot_price_usd[num_key] = order.total_price_usd
                                            console.log('totprice',tot_price_rmb)
                                           
                                            
                                            newTd7Tr3Table2.append(inputElement7);
                                        
                                        

                                        
                                            
                                            // if (response.hscodehistory.length > 0) {
                                                
                                            //     grossWeight = response.hscodehistory[index].gross_weight;
                                            //     nettWeight = response.hscodehistory[index].nett_weight;
                                            // } else {
                                            //     grossWeight = 0;
                                            //     nettWeight =0;
                                        
                                            // }
                                        
                                            var newTd8Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement8 = $('<input />').attr({
                                                'id': 'nett_weight_import'+num_key,          
                                                'name': 'net_weight_'+(num_key),      
                                                'class': 'form-control nett_weight_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.nett_weight,
                                                'disabled':true
                                                
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            });
                                            newTd8Tr3Table2.append(inputElement8);
                                            
                                            var newTd9Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement9 = $('<input />').attr({
                                                'id': 'gross_weight_import'+num_key,          
                                                'name': 'gross_weight_'+(num_key),      
                                                'class': 'form-control gross_weight_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value':order.gross_weight,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            });
                                            newTd9Tr3Table2.append(inputElement9);
                                        
                                            var newTd10Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement10 = $('<input />').attr({
                                                'id': 'cbm_import'+num_key,       
                                                'name': 'cbm_'+(num_key),      
                                                'class': 'form-control cbm_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.cbm,
                                                'disabled':true
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

                                                cbm_cbm[num_key] = cbm2;
                                                qty_qty2[num_key] =qty_value
                                                
                                                



                                                calculateTotalCBM();

                                            }
                                            updateCBM()
                                            // Attach input event listeners to update CBM on input change
                                            inputElement4.on('blur', updateCBM);
                                            inputElement5.on('blur', updateCBM);
                                            inputElement6.on('blur', updateCBM);
                                            

                                            inputElement10.on('input', updateCBM);

                                    

                                            var newTd11Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement11 = $('<input />').attr({
                                                'id': 'unit_price_without_tax_import'+num_key,          
                                                'name': 'unit_price_without_tax_'+(num_key),      
                                                'class': 'form-control unit_price_without_tax_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value':order.unit_price_without_tax,
                                                'disabled':true
                                            }).css({
                                                'border': '1px solid #696868',
                                                'color' : 'black',
                                                'padding' : '10px',
                                                'width': '100%'           
                                            });
                                            newTd11Tr3Table2.append(inputElement11);
                                            
                                            var newTd12Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement12 = $('<input />').attr({
                                                'id': 'unit_price_usd_import'+num_key,          
                                                'name': 'unit_price_usd_'+(num_key),      
                                                'class': 'form-control unit_price_usd_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value':order.unit_price_usd,
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
                                                
                                                var unitPriceUsd = (unit_without_tax);
                                                unitPriceUsd= unitPriceUsd.toFixed(2);
                                                
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
                                                'id': 'total_price_without_tax_import'+num_key,          // ID untuk elemen input
                                                'name': 'total_price_without_tax_'+(num_key),      // Nama untuk elemen input
                                                'class': 'form-control tot_price_without_tax_import',    // Kelas CSS untuk elemen input
                                                'placeholder': '',        // Placeholder untuk elemen input
                                                'type': 'text',
                                                'value':order.total_price_without_tax,
                                                'disabled':true
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
                                                without_tax_arr[num_key] =parseFloat(without_tax_tot)
                                            
                                                calculatewithouttaxarr();
                                                inputElement13.val(without_tax_tot); 
                                            }

                                            
                                            inputElement11.on('input', updateTotPriceWithoutTax);

                                            var newTd14Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement14 = $('<input />').attr({
                                                'id': 'total_price_usd_import'+num_key,  
                                                'name': 'total_price_usd_'+(num_key),      
                                                'class': 'form-control total_price_usd_import',  
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.total_price_usd            
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
                                                
                                                var totalPriceUsd = (parseFloat(unit_without_tax)/1)*parseFloat(qty_value);
                                                totalPriceUsd = totalPriceUsd.toFixed(2);
                                                tot_price_usd[num_key] = parseFloat(totalPriceUsd)
                                                calculatewithouttaxusdarr();
                                                inputElement14.val(totalPriceUsd);
                                            }
                                            
                                            var newTd15Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                                            var inputElement15 = $('<input />').attr({
                                                'id': 'use_name_import'+num_key,          
                                                'name': 'use_name_'+(num_key),
                                                'class': 'form-control use_name_import',    
                                                'placeholder': '',        
                                                'type': 'text',
                                                'value': order.use_name,
                                                'disabled':true
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
                                            newTable1.append(input_barangElement,input_idCommercialElement)
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
                                            // var newButtonSaveItem = $('<button></button>', {
                                            //     type: 'button',
                                            //     id: 'submitButtonImportBarangComercialInvoice_'+num_key, // Gunakan variabel ascendingIndex sesuai kebutuhan Anda

                                            //     class: 'btn btn-primary',
                                                
                                            //     text: 'Simpan Item',
                                            //     css: {
                                            //         marginLeft: 'auto'
                                            //     }
                                            // });
                                            
                                            // // var currentIndex = index;
                                            // newButtonSaveItem.on('click', function() {
                                                    
                                            //         var formData ={
                                                        
                                            //             longValue : $('#long_import' + num_key).val(),
                                            //             widthValue : $('#width_import' + num_key).val(),
                                            //             heightValue : $('#height_import' + num_key).val(),
                                            //             long_pValue : $('#long_p_import' + num_key).val(),
                                            //             width_pValue : $('#width_p_import' + num_key).val(),
                                            //             height_pValue : $('#height_p_import' + num_key).val(),
                                            //             qty_Value : $('#qty_import' + num_key).val(),
                                                        
                                            //         };
                                            //         console.log('formData',formData);
                                            //         $.ajax({
                                            //             url: '', // Ganti dengan URL tujuan Anda
                                            //             type: 'GET',
                                            //             data: formData,
                                                        
                                            //             success: function(response) {
                                            //                 alert('Data berhasil disimpan!');
                                            //             },
                                            //             error: function(xhr, status, error) {
                                            //                 alert('Terjadi kesalahan: ' + error);
                                            //             }
                                            //         });
                                                    
                                            // });
                                            
                                            var newTrLast2 = $('<tr>');
                                            var newTdLast2 = $('<td colspan="12"><br></td>'); // Menambahkan colspan dan <td> yang benar
                                            newTrLast2.append(newTdLast2);
                                            contentContainer.append(title_import,newTable1); // Menggunakan newTrLast bukan newTr1


                                            contentContainer.append(newTable2, newTrLast2)
                                

                                            //last
                                            num_key++;
                                        })
                                        tot_freight_cost +=item.freight_cost
                                        tot_insurance +=item.insurance
                                    
                                    })

                                    var buttonContainer = $('<div>')
                                        .css({
                                            'text-align': 'right',  // Align the content (button) to the right
                                            'width': '100%',         // Optional, ensures full width of the container
                                            'margin-left':'2%',
                                            'margin-bottom':'5%'
                                        });

                                    // Create the button
                                    var newButton = $('<button>')
                                        .attr({
                                            'id': 'customButtonId',     // Set an ID for the button
                                            'type': 'button',           // Set the type attribute
                                            'class': 'btn btn-primary'  // Add Bootstrap classes (optional)
                                        })
                                        .text('Convert to USD')         // Set the text for the button
                                        .css({
                                            'margin': '10px',           // Optional styling
                                            'padding': '10px 20px'
                                        });
                                        newButton.on('click', function() {
                                            convertFunction();
                                        })
                                    // Append the button to the container
                                    buttonContainer.append(newButton);

                                    var newDivTable3 = $('<div>').css({
                                        'margin-left': '70%'
                                    });
                                    var newTable3 = $('<table>')
                                    var newTr1Table3 = $('<tr>')
                                    var newTd1Tr1Table3 = $('<td>').css({
                                        'border': '1px solid #696868',
                                        'color': 'black',
                                        'width': '80%'
                                    }).text('Freight Cost');
                        
                        

                                    var newTd2Tr1Table3 = $('<td>').css({
                                        'border': '1px solid #696868',
                                        'color': 'black',
                                        
                                    })
                                    
                                    var inputTd2Tr1Table3 = $('<input>').attr({
                                        type: 'text',
                                        id: 'freight_cost_id_tab_tambah',
                                        name: 'freight_cost_tambah', 
                                        value: tot_freight_cost,
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
                                        value: tot_insurance,
                                        class: 'form-control custom-border', 
                                    });
                                    inputTd2Tr2Table3.on('input', function() {
                                        calculatewithouttaxarr();
                                        
                                        calculatewithouttaxusdarr();
                                    })
                                    newTd2Tr2Table3.append(inputTd2Tr2Table3)
                                    newTr2Table3.append(newTd1Tr2Table3,newTd2Tr2Table3)
                                    newTable3.append(newTr1Table3,newTr2Table3)
                                    newDivTable3.append(buttonContainer,newTable3)
                                    
                                    var newDiv2Table4 = $('<div>').css({
                                        
                                        'margin-left': '70%', 
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
                                    
                                    //untuk menghitung total dari qty array
                                    var totalQty = Object.values(qty_qty2).reduce((acc, value) => acc + value, 0);
                                    
                                    //untuk menghitung total dari price usd array
                                    var totalPriceUsd = Object.values(tot_price_usd).reduce((acc,value)=>acc+value,0)
                                    
                                    //untuk menghitung total dari rmb array
                                    var totalPriceRmb = Object.values(tot_price_rmb).reduce((acc,value)=>acc+value,0)
                                    
                                    let totalCbm = cbm_cbm.reduce((acc, value) => acc + parseFloat(value), 0);
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
                                    }).text(totalQty);
                                    
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
                                    }).text(totalCbm.toFixed(2));
                                    newTr3Table4.append(newTd1Tr3Table4,newTd2Tr3Table4)

                                    var newTr4Table4 = $('<tr>');
                                    var newTd1Tr4Table4 = $('<td>').css({
                                        'border': '1px solid #696868', 
                                        'color': 'black',
                                    }).text('Total Price (RMB)');

                                    var newTd2Tr4Table4 = $('<td>').attr({
                                        'id': 'custom-tot-price-without-tax-td-tambah',
                                    }).css({
                                        'border': '1px solid #696868', 
                                        'color': 'black',
                                        'padding-left': '20px'
                                    }).text(totalPriceRmb.toFixed(2));
                                    newTr4Table4.append(newTd1Tr4Table4,newTd2Tr4Table4)

                                    var newTr5Table4 = $('<tr>');
                                    var newTd1Tr5Table4 = $('<td>').css({
                                        'border': '1px solid #696868',
                                        'color': 'black',
                                    }).text('Total Price (USD)');

                                    var newTd2Tr5Table4 = $('<td>').attr({
                                        'id':'custom-tot-price-without-tax-usd-td-tambah'
                                    }).css({
                                        'border': '1px solid #696868', 
                                        'color': 'black',
                                        'padding-left': '20px'
                                    }).text(totalPriceUsd.toFixed(2));
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
                                    console.log('masuk')
                                    var freight_cost_tambah = parseFloat(inputTd2Tr1Table3.val())||0;
                                    var insurance_tambah = parseFloat(inputTd2Tr2Table3.val()) || 0;
                                    
                                    var TotWithout_tot_price_rmb = tot_price_rmb.reduce(function(acc, curr) {
                                                        return acc + curr;
                                    }, 0);
                                    var without_tot_price_usd =tot_price_usd.reduce(function(acc, curr) {
                                                        return acc + curr;
                                    }, 0);
                                    var total_akhir_without_tax_usd = TotWithout_tot_price_rmb +without_tot_price_usd+freight_cost_tambah+insurance_tambah
                                    var element = document.getElementById('custom-tot-price-without-tax-usd-td-tambah');
                                    element.textContent = total_akhir_without_tax_usd.toFixed(2)
                                }
                            
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
                               

                                }
                            }
                        })

                            //memproses data dan mengirim data ke controller
                            $('#submitButtonForm2').on('click',function(){
                                console.log('simpan')
                                console.log($('.database-tambah').val())
                                console.log($('#tgl_request_tambah').val())
                                console.log($('#supplier-tambah').val())
                                console.log($('#address_company').val())
                                console.log($('#city').val())
                                console.log($('#telp').val())
                                console.log($('#incoterms-tambah-id').val())
                                console.log($('#location_id_tab').val())
                                console.log($('#banksupplier-tambah-id').val())
                                console.log($('#currency-tambah-id').val())
                                console.log($('#bank_name_id_tab').val())
                                console.log($('#bankAddress_id_tab_tambah').val())
                                console.log($('#swiftCode_id_tab_tambah').val());
                                console.log($('#accountNo_id_tab_tambah').val())
                                console.log($('#beneficiaryName_id_tab_tambah').val())
                                console.log($('#beneficiaryAddress_id_tab_tambah').val())

                                console.log('invoice_no',$('#invoice_no_tambah').val())
                                console.log('contract_no',$('#contract_no_tambah').val())
                                console.log('packing_no',$('#packing_no_tambah').val()) 
                                
                                console.log('modeadmin',$('input[name="modeadmin_tambah"]').val())
                                var totalPriceUsdTd = $('#custom-tot-price-without-tax-usd-td-tambah').text();
                                console.log(totalPriceUsdTd);
                                var totalPriceRmbTd = $('#custom-tot-price-without-tax-td-tambah').text();
                                console.log(totalPriceRmbTd)
                                var totalCbmTd = $('#total_cbm_tambah').text();
                                console.log(totalCbmTd)
                                var totalQtyTd = $('#qty-td-tambah').text()
                                console.log(totalQtyTd)
                                var totalInsuranceTd= $('#insurance_edit_id_tab_tambah').val()
                                console.log(totalInsuranceTd)
                                var totalFreightCostTd = $('#freight_cost_id_tab_tambah')
                                                        
                                var formData = {

                                };
                                $('.comercial_import_tambah').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                
                                $('.comercial_detail_import_tambah').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });

                                $('.chinese_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.english_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.model_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.brand_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.hscode_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.long_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.width_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.height_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.long_p_import').each(function() {
                                    
                                    var id = $(this).attr('name');
                                    formData[id] = $(this).val();
                                    
                                });
                                $('.width_p_import').each(function() {
                                    
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
                                
                                
                                
                            })
                    })
    
   
    

    var table = $('#table-tambah-comercial-invoice').DataTable({
        dom: 'lrtip', // Customize the DataTable DOM
        responsive: true, // Enable responsive mode
    });
        
                 
                

    // Custom search box
    $('#search-box').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Checkbox filter
    $('#filterChecked').on('change', function() {
        if (this.checked) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                return $(table.row(dataIndex).node()).find('.kubik-checkbox-tambah').is(':checked');
            });
        } else {
            $.fn.dataTable.ext.search.pop();
        }
        table.draw();
    });

    // Supplier filter
    $('#filter-select').on('change', function() {
        var selectedSupplier = this.value;
        $.fn.dataTable.ext.search.pop(); // Remove previous filter

        if (selectedSupplier) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                return $(table.row(dataIndex).node()).find('td:eq(5)').text() === selectedSupplier;
            });
        }

        table.draw();
    });
  
  });
</script>