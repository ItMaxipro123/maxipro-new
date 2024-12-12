
<style>
    .with-border {
        border: 1px solid #696868;
        height: 42px;
    }
    .custom-input {
            border: 1px solid #696868;
            width: 50%;
            padding-left: 10px;
    }
    /* CSS untuk gaya select2 custom */
    .empty-row {
        border: none;
    }

    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Warna gelap dengan opasitas */
        z-index: 9999;
        /* Layer di atas semua konten */
        display: none;
        /* Default tidak ditampilkan */
    }

    #overlay i {
        color: white;
        /* Warna ikon */
        font-size: 50px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Sesuaikan ukuran ikon sesuai kebutuhan */
    }

     .custom-border {
        border: 1px solid #ced4da;
        padding-left: 20px;
    }
</style>

   <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="comercial_invoice_tab" href="#comercial_invoice" data-toggle="tab">Comercial Invoice</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="packing_list_tab" href="#packing_list" data-toggle="tab">Packing List</a>
        </li>
    </ul>

    <div class="tab-content" style="margin-top: 20px;">
        <div class="tab-pane fade show active" id="comercial_invoice">

                <div class="row">
                    <div class="col-md-3">

                        <!-- <h6 style="margin-bottom: 10px;"> Comercial Invoice12</h4> -->
                    </div>
                    <div class="col-md-9" style="text-align: right;">
                    <a href="javascript:void(0)"  onclick="importData(event)" name="importButton" class="btn btn-large btn-info btn-edit" style="width: 140px; height: 38px; padding: 9px 10px;">Import Data </a>
                    </div>
                </div>
          
                <div class="form-group">
                    <input type="hidden" class="form-control custom-border" id="id_edit" name="id_edit_name" value="{{ $Data['msg']['commercialinvoice']['id'] }}">
               
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div style="position: relative; width: 100%;">
                              <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Custom Kode</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <input type="checkbox" id="customCodeCheckboxEdit" class="styled customcode" {{ $Data['msg']['commercialinvoice']['mode_admin'] == '1' ? 'checked' : '' }}>
                                                        <input type="hidden" name="modeadmin" value="{{ $Data['msg']['commercialinvoice']['mode_admin'] }}">
                                                    </div>
                    </div>
                 
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div style="position: relative; width: 100%;">
                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="invoice_no">Invoice Number <span style="color: red;">(Wajib Diisi)</span></label>
                        <input type="number" class="form-control" id="invoice_no" data-id="{{ $Data['msg']['commercialinvoice']['invoice_no'] }}" name="invoice_no_name" value="{{ $Data['msg']['commercialinvoice']['invoice_no'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;"{{ $Data['msg']['commercialinvoice']['mode_admin'] == '0' ? 'disabled' : '' }} >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="position: relative; width: 100%;">
                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number <span style="color: red;">(Wajib Diisi)</span></label>
                        <input type="number" class="form-control" id="contract_no" data-id="{{ $Data['msg']['commercialinvoice']['contract_no'] }}" name="contract_no_name" value="{{ $Data['msg']['commercialinvoice']['contract_no'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" {{ $Data['msg']['commercialinvoice']['mode_admin'] == '0' ? 'disabled' : '' }} >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="position: relative; width: 100%;">
                        <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number <span style="color: red;">(Wajib Diisi)</span></label>
                        <input type="number" class="form-control" id="packing_no" data-id="{{ $Data['msg']['commercialinvoice']['packing_no'] }}" name="packing_no_name" value="{{ $Data['msg']['commercialinvoice']['packing_no'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" {{ $Data['msg']['commercialinvoice']['mode_admin'] == '0' ? 'disabled' : '' }} >
                        </div>
                    </div>
                </div>
                
                <div class="row">
                            <div class="col-md-2">
                            
                                <div style="position: relative; width: 100%; margin-top:10px;">
                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Database <span style="color: red;">(Wajib Diisi)</span></label>
                                    
                                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-edit" id="database_id" name="database_name"  required>
                                        <option value="">Database</option>
                                        <option value="PT" {{ $Data['msg']['commercialinvoice']['name_db'] == 'PT' ? 'selected' : '' }}>PT</option>
                                        <option value="UD" {{ $Data['msg']['commercialinvoice']['name_db'] == 'UD' ? 'selected' : '' }}>UD</option>
                                    </select>

                                </div>
                            
                            </div>

                            <div class="col-md-10">
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="startDateTglRequest">Tanggal Request <span style="color: red;">(Wajib Diisi)</span></label>
                                    <input type="text" style="height:55px;" class="form-control custom-border" id="tgl_request" name="tgl_request_edit" value="{{ $Data['msg']['commercialinvoice']['date'] }}">
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;margin-top: 10px;">
                                <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%">Supplier <span style="color: red;">(Wajib Diisi)</span></label>
        
                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="supplier-edit-id" name="supplier_supplier" required>
                                    <option value="supplier_option">Supplier</option>
                                    @foreach($Data['msg']['supplier'] as $index => $supplier)
                                    <option value="{{ $supplier['id'] }}" {{ $Data['msg']['commercialinvoice']['id_supplier'] == $supplier['id'] ? 'selected' : ''}} >{{ $supplier['name'] }}</option>
                                    @endforeach
                                 </select>
                            </div>
                </div>
                 
                 <div class="row">
                      <div class="col-md-4">
                               <div style="position: relative; width: 100%;">
                                <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%;width: 100%" for="">Nama Perusahaan <span style="color: red;">(Wajib Diisi)</span></label>
                                <input type="text" class="form-control" id="company_id" name="company" value="{{ $Data['msg']['commercialinvoice']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" required>
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div style="position: relative; width: 100%;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan</label>
                            <textarea type="text" class="form-control" id="address_id" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">{{ $Data['msg']['commercialinvoice']['address'] }}</textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div style="position: relative; width: 100%;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan</label>
                            <input type="text" class="form-control" id="city_id" name="city" value="{{ $Data['msg']['commercialinvoice']['city'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                        </div>
                      </div>
                 </div>
                
             
               
                
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                    <input type="number" class="form-control" id="telp_id" name="telp" value="{{ $Data['msg']['commercialinvoice']['phone'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 32%">
                </div>

                <form action="" class="form-horizontal" id="editForm" method="get">
                    @csrf
                    <div style="margin-top:20px;position: relative; width: 100%;">

                        @php
                            $ascendingIndex = 0;
                            $data = [];
                        @endphp
                        @php
                                        $tot_without_tax_usd=0;
                                @endphp
                        <div id="content-container"></div>
                        

                
                        @foreach($Data['msg']['listordercheck'] as $index => $result)
                            <div class="table-responsive">

                                <table id="table-atas2">
                                    <input type="hidden" class="form-control custom-border" id="id_detail_{{ $ascendingIndex }}" name="id_detail_name" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['id'] }}">
                                    <input type="hidden" class="form-control custom-border" id="id_barang_{{ $ascendingIndex }}" name="id_barang_name" value="{{ $result['id_barang'] }}">
                                    <input type="hidden" class="form-control restok-input" id="restok_{{ $ascendingIndex }}" name="id_restok_name" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['id_restok'] }}">
                                        <tr>
                                            <td style="border: 1px solid #696868; color: black;">
                                                <image src="https://maxipro.id/images/barang/{{ $result['image'] }}" style="width: 350px;height: 320px;">
                                            </td>
                                            <td style="border: 1px solid #696868; color: black; width: 100%;">
                                                <table style="width: 100%;padding-left: 25px; height: 100%;">
                                                        <tr style="border: 1px solid #d7d7d7; color: black;">
                                                            <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">{{ $result['name'] }}</td>
                                                            <input type="hidden" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="name_barang_{{ $ascendingIndex }}" value="{{ $result['name'] }}">
                                                        </tr>
                                                        <tr>
                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Chinese Name <br>中文品名</td>
                                                            <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">      
                                                                <input type="text" class="form-control chinese-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="chinese_name_{{ $ascendingIndex }}" name="chinese_name_name" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['name'] }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">English Name <br>英文品名</td>
                                                            <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                                <input class="form-control english-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" type="text" id="english_name_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['name_english'] }}" name="english_name_name">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Model<br>型号</td>
                                                        <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                            <input type="text" class="form-control model-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['model'] }}" id="model_name_{{ $ascendingIndex }}" name="model_name">
                                                        </td>
                                                        </tr>
        
                                                        <tr>
                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Brand<br>品牌</td>
                                                            <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                                <input type="text" class="form-control brand-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['brand'] }}" id="brand_name_{{ $ascendingIndex }}" name="brand_name_name">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">HS Code<br>海关编码</td>
        
        
                                                            <td style="border: 1px solid #d7d7d7; color: black;">
                                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="form-control hscode-edit-filter new-hscode-edit-filter_{{ $ascendingIndex }}" id="edit_supplier_id_{{ $ascendingIndex }}" name="edit_supplier_{{ $index }}">
                                                                    <option value="">Pilih Hs Code </option>
                                                                    @foreach($Data['msg']['hscodehistory'] as $index2 => $hscode)
                                                                        @if($result['id_barang']==$hscode['restok']['id_barang'])
                                                                            @php
                                                                                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                                                                $formattedDate = \Carbon\Carbon::parse($hscode['commercialinvoice']['date'])->translatedFormat('d F Y');
                                                                            @endphp
                                                                            <option value="{{ $hscode['hs_code'] }}">{{ $hscode['hs_code'] }} - {{ $formattedDate }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
        
                                                            
                                                            <td style="border: 1px solid #d7d7d7; color: black;">
                                                                <input type="text" class="form-control hs-input new-hscode-input_{{ $ascendingIndex }}" style="width:150%; border: 1px solid #696868; color: black; padding: 10px;" id="hscode-input_{{ $ascendingIndex }}" name="hscode-input-name" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['hs_code'] }}">
                                                            </td>
                                                        </tr>
                                                        
                                                        <br>
                                                </table>
        
                                            </td>
                                        </tr>
                                        <br></br>
                                </table>
                            </div>
                            <div class="table-responsive">

                                <table style="width:100%;">
                                    <tr>
                                            <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Size(CM) <br>每件尺寸</td>
                                            <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Package Size(CM) <br>每个包装的尺寸</td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Quantity <br>数量</td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Nett Weight <br>(KG) <br>净重 </td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Gross Weight <br>(KG) <br>毛重 </td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">CBM Volume <br>(M3) <br>体积 </td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Unit Price Without<br> Tax <br>不含税单价 </td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Unit Price USD</td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Total Price Without Tax <br>不含税总价</td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Total Price <br>USD</td>
                                            <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Use<br>用途</td>
                                        </tr>
                                        <tr>
                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Length(CM) <br>长</td>
                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Width(CM) <br>长</td>
                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Height(CM) <br>长</td>
                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Length(CM) <br>长</td>
                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Width(CM) <br>长</td>
                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Height(CM) <br>长</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control long-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" name="long_{{ $ascendingIndex }}" id="long_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['length_m'] }}">
                                        </td>
                                            <td style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control width-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " name="width_{{ $ascendingIndex }}" id="width_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['width_m'] }}">
                                        </td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control height-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; "  name="height_{{ $ascendingIndex }}" id="height_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['height_m'] }}">
                                        </td>
                                            <td style="border: 1px solid #d7d7d7; color: black;">      
                                                <input type="text" class="form-control long-p-input calculate-cbm" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="long_p_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['length_p'] }}">
                                            </td>
                                            <td style="border: 1px solid #d7d7d7; color: black;">      
                                                <input type="text" class="form-control width-p-input calculate-cbm" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="width_p_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['width_p'] }}">
                                            </td>
                                            <td style="border: 1px solid #d7d7d7; color: black;">      
                                                <input type="text" class="form-control height-p-input calculate-cbm" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="height_p_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$index]['height_p'] }}">
                                            </td>
                                        
                                            @php
                                                        $id_commercial = array();
                                                        $qty = 0; // Variabel untuk menyimpan jumlah qty
                                                        $id = $Data['msg']['commercialinvoice']['id'];
                                                        $all_qty = array(); // Array untuk menyimpan semua qty untuk ditampilkan di konsol
                                                        $net_weight=0;
                                                        $gross_weight=0;
                                                        $cbm =0;
                                                        $unit_price_without_tax =0;
                                                        $unit_price_usd=0;
                                                        $total_price_usd=0;
                                                        $total_price_without_tax = 0;
                                                        $use_name =0;
                                                        foreach($Data['msg']['hscodehistory'] as $index => $hscode) {
                                                            $id_commercial[] = $hscode['id_penjualanfromchina'];
                                                            $all_qty[] = $hscode['qty']; // Menyimpan semua qty untuk ditampilkan di konsol
                                                            $total_price_usd_loop = $hscode['total_price_usd'];
                                                            if ($id == $hscode['id_penjualanfromchina']) {
                                                                $qty += $hscode['qty']; // Menambahkan qty jika id cocok
                                                                $net_weight += $hscode['nett_weight'];
                                                                $gross_weight += $hscode['gross_weight'];
                                                                $cbm += $hscode['cbm'];
                                                                $unit_price_without_tax += $hscode['unit_price_without_tax'];
                                                                $total_price_without_tax += $hscode['total_price_without_tax'];
                                                                $unit_price_usd = $hscode['unit_price_usd'];
                                                                
                                                                $use_name = $hscode['use_name'];
                                                            }
                                                            $total_price_usd = $total_price_usd+$total_price_usd_loop;
                                                        }
                                            @endphp
        
                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">   
        
                                        
                                        <input type="text" class="form-control calculate-cbm total-price-without-tax" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="qty_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['qty'] }}">
                                            </td>
                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control nett-weight-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="net_weight_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['nett_weight'] }}">
                                        </td>
                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control gross-weight-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="gross_weight_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['gross_weight'] }}">
                                        </td>
                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                <input type="text" class="form-control cbm-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="cbm_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['cbm'] }}">
                                            </td>
                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">
                                                <!-- Unit Price without Tax Input -->
                                                <input type="text" class="form-control total-price-without-tax" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="unit_price_without_tax_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['unit_price_without_tax'] }}">
        
                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" id="edit-unit-price-without-tax-{{ $ascendingIndex }}" name="edit_unit_price_without_tax">
                                                <option value="" style="display:none;">&#xf078; Show More</option>
                                                @foreach($Data['msg']['hscodehistory'] as $index => $hscode)
                                                @if($result['id_barang']==$hscode['restok']['id_barang'])
                                                @php
                                                \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                                $formattedDate = \Carbon\Carbon::parse($hscode['commercialinvoice']['date'])->translatedFormat('d F Y');
                                                @endphp
                                                <option value="" >{{ $Data['msg']['penjualanfromchina'][0]['matauang']['simbol'] }} {{ $hscode['unit_price_without_tax'] }} - {{ $formattedDate }}</option>
                                                @endif
                                                @endforeach
                                                </select>
        
                                            </td>
                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control unit-price-usd" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="unit_price_usd_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['unit_price_usd'] }}" disabled>
                                        </td>
                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                <!-- Total Price without Tax Input -->
                                                <input type="text" class="form-control tot-price-without-tax" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="total_price_without_tax_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['total_price_without_tax'] }}" readonly>
        
                                        </td>
                                        
                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control total-price-usd" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="total_price_usd_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['total_price_usd'] }}" disabled>
                                        </td>
                                        @php
                                                $tot_without_tax_usd =  $tot_without_tax_usd +$Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['total_price_usd'];
                                        @endphp
                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                            <input type="text" class="form-control use-name" style="width: calc(70% - 10px); border: 1px solid #696868; color: black;padding: 10px; display: inline-block; vertical-align: top;" id="use_name_{{ $ascendingIndex }}" value="{{ $Data['msg']['commercialinvoice']['detail'][$ascendingIndex]['use_name'] }}">
                                            <a href="#" class="delete-input" style="color: red; display: inline-block; vertical-align: top; padding: 10px;">X</a>
                                        </td>
        
                                    </tr>
                                        
                                </table>
                            </div>

                            <div class="form-group" style="display: flex; padding-top: 30px; text-align: end;">
                                <button type="button" id="submitButtonEditComercialInvoice_{{ $ascendingIndex }}" class="btn btn-primary" data-index="{{ $ascendingIndex }}" style="margin-left: auto;">simpan item</button>
                            </div>
                            
                            @php
                            $data[] = [
                                    'ascendingIndex' => $ascendingIndex,
                                
                                ];
                                $ascendingIndex++;
                            @endphp
                            @php
                            $jsonData = json_encode($data);
                            @endphp
                        
                        @endforeach
            
                        
                    </div>

                

                </form>
                            
           
                <form action="" class="form-horizontal" id="editForm2" method="get">
                    @csrf
                    <div class="d-flex justify-content-end">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td style="border: 1px solid #696868; color: black;width: 75%;">Freight Cost</td>
                                    <td style="border: 1px solid #696868; color: black;">
                                        <input type="number" class="form-control freight-cost custom-border" id="freight_cost_id_tab" name="freight_cost" value="{{ $Data['msg']['commercialinvoice']['freight_cost'] }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #696868; color: black;">Insurance</td>
                                    <td style="border: 1px solid #696868; color: black;">
                                        <input type="number" class="form-control insurance-classs custom-border" id="insurance_edit_id_tab" name="insurance" value="{{ $Data['msg']['commercialinvoice']['insurance'] }}">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>



                    <div class="d-flex justify-content-end mt-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center" style="border: 1px solid #696868; color: black;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 75%;border: 1px solid #696868; color: black;">Quantity</td>
                                        <td id="qty-td" style="border: 1px solid #696868; color: black;">{{ $qty }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #696868; color: black;">CBM Volume (M<sup>3</sup>)</td>
                                        <td id="total_cbm" style="border: 1px solid #696868; color: black;">{{ $cbm }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #696868; color: black;">Total Price Without Tax</td>
                                        <td id="custom-tot-price-without-tax-td" style="border: 1px solid #696868; color: black;">
                                            {{ $total_price_without_tax + $Data['msg']['commercialinvoice']['freight_cost'] +  $Data['msg']['commercialinvoice']['insurance'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #696868; color: black;">Total Price Without Tax USD</td>
                                        <td id="custom-tot-price-without-tax-usd-td" style="border: 1px solid #696868; color: black;">
                                            {{ round($tot_without_tax_usd, 2) + $Data['msg']['commercialinvoice']['freight_cost'] +  $Data['msg']['commercialinvoice']['insurance'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="form-group" style="padding-top: 100px; padding-left: 20px;">
                        <h4>NOTES</h4>
                        <hr style="border: none; border-top: 1px solid #000; margin-top: 20px;">
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 15px;" class="col-md-1">
                                <label for="kodebaranglabel">Incoterms</label>
                    
                            </div>
                            <div class="col-lg-6 ">

                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control incoterms-edit" id="incoterms-edit-id" name="incoterms">    
                                <option value="">Select Incoterms</option>
                                        <option value="FOB" {{ $Data['msg']['commercialinvoice']['incoterms'] == 'FOB' ? 'selected' : ''}}>FOB </option>
                                        <option value="CIF" {{ $Data['msg']['commercialinvoice']['incoterms'] == 'CIF' ? 'selected' : ''}}>CIF </option>
                                        <option value="EXWORK" {{ $Data['msg']['commercialinvoice']['incoterms'] == 'EXWORK' ? 'selected' : ''}}>EXWORK </option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-md-1">
                                <label for="kodebaranglabel">Location</label>
                    
                            </div>
                            <div class="col-lg-6 ">
                                <input type="text" style="width:100%;" class="form-control custom-border" id="location_id_tab" name="location" value="{{ $Data['msg']['commercialinvoice']['location'] ?: ''}}" placeholder="{{ $Data['msg']['commercialinvoice']['location'] ?: 'Location' }}">
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
                            <div class="col-lg-6 ">
                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control banksupplier-edit" id="banksupplier-edit-id" name="supplierbank">
                                        <option value="0">Pilih Bank Supplier</option>
                                    @foreach($Data['msg']['supplierbank'] as $result)

                                        <option value="{{$result['id']}}" {{ $Data['msg']['commercialinvoice']['id_supplierbank']  == $result['id'] ? 'selected' : ''}}>({{$result['matauang']['simbol']}}) {{$result['matauang']['kode']}} - {{$result['bank_name']}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 15px;" class="col-md-1">
                                <label for="kodebaranglabel">Currency</label>
                    
                            </div>
                            <div class="col-lg-6 ">
                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control currency-edit" id="currency-edit-id" name="currency">
                                        <option value="0">Pilih Currency</option>
                                        @foreach($Data['msg']['matauang'] as $index => $result)
                
                                            <option value="{{$result['id']}}" {{$Data['msg']['commercialinvoice']['id_matauang'] == $result['id'] ? 'selected' : ''}}>({{$result['simbol']}}) {{$result['kode']}} - {{$result['name']}}</option>

                                        @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    @php
                        $bankName = $Data['msg']['commercialinvoice']['bank_name'];
                        $bankAddress= $Data['msg']['commercialinvoice']['bank_address'];
                        $swiftCode= $Data['msg']['commercialinvoice']['swift_code'];
                        $accountNo= $Data['msg']['commercialinvoice']['account_no'];
                        $beneficiaryName= $Data['msg']['commercialinvoice']['beneficiary_name'];
                        $beneficiaryAddress= $Data['msg']['commercialinvoice']['beneficiary_address'];

                    @endphp
                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-md-1">
                                <label for="kodebaranglabel">Bank Name</label>
                    
                            </div>
                            <div class="col-lg-6 ">


                                <input type="text" style="width:100%;" class="form-control custom-border" id="bank_name_id_tab" name="bank_name" value="{{ $bankName ?: '' }}" placeholder="{{ $bankName ?: 'Bank Name' }}">

                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-md-1">
                                <label for="kodebaranglabel">Bank Address</label>
                    
                            </div>
                            <div class="col-lg-6 ">


                                <input type="text" style="width:100%;" class="form-control custom-border" id="bankAddress_id_tab" name="bank_address" value="{{ $bankAddress ?: '' }}" placeholder="{{ $bankAddress ?: 'Bank Address' }}">

                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-md-1">
                                <label for="kodebaranglabel">Swift Code</label>
                    
                            </div>
                            <div class="col-lg-6 ">


                                <input type="text" style="width:100%;" class="form-control custom-border" id="swiftCode_id_tab" name="swift_code" value="{{ $swiftCode ?: '' }}" placeholder="{{ $swiftCode ?: 'Swift Code' }}">

                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-md-1">
                                <label for="kodebaranglabel">Account No</label>
                    
                            </div>
                            <div class="col-lg-6 ">


                                <input type="text" style="width:100%;" class="form-control custom-border" id="accountNo_id_tab" name="account_no" value="{{ $accountNo ?: '' }}" placeholder="{{ $accountNo ?: 'Account No' }}">

                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                        
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-lg-1">
                                <label for="kodebaranglabel">Beneficiary Name</label>
                    
                            </div>
                            <div class="col-lg-6 ">


                                <input type="text" style="width:100%;" class="form-control custom-border" id="beneficiaryName_id_tab" name="beneficiary_name" value="{{ $beneficiaryName ?: '' }}" placeholder="{{ $beneficiaryName ?: 'Beneficiary Name' }}">

                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group" style="padding-top: 30px; padding-left: 20px; width: 100%;">
                        <div class="row">
                            <div style="padding-top: 10px;" class="col-lg-1">
                                <label for="kodebaranglabel">Beneficiary Address</label>
                            </div>
                            <div class="col-lg-6 ">
                                <input type="text" class="form-control custom-border" id="beneficiaryAddress_id_tab" 
                                    name="beneficiary_address" 
                                    value="{{ $beneficiaryAddress ?: '' }}" 
                                    placeholder="{{ $beneficiaryAddress ?: 'Beneficiary Address' }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                        <button type="button" id="submitButtonFormNotes" class="btn btn-primary" style="margin-left: auto;">Simpan Comercial Invoice</button>
                    </div>

                </form>
            
              
           
        </div>
        
      

        <div class="tab-pane fade show" id="packing_list" style="margin-top: 20px;">
            <form action="" class="form-horizontal" id="editFormPacking" method="get">
                @csrf
                <h6 style="margin-bottom: 10px;">Packing List</h4>
                  

                   
               <table style="width: 100%;">
                   <tr>
                        <td style="padding-left:20px;border: 1px solid #696868; color: black;">
                           No
                        </td>
                        <td style="padding-left:20px;border: 1px solid #696868; color: black;">
                           Name
                        </td>
                        <td style="padding-left:20px;border: 1px solid #696868; color: black;">
                           Qty
                        </td>
                   </tr>
                   @php
                    $totalQtyArray = [];
                   @endphp
                        @foreach($Data['msg']['commercialinvoice']['detail'] as $key => $result_detail)
                            @php
                                $totalQty = 0;
                                $id_penjualanfromchina = null;
                            @endphp

                            @foreach($Data['msg']['packinglist'] as $packingList)
                                @php
                                    $sumQtyPacking = 0;
                                @endphp

                                @foreach($packingList['detail'] as $detail)
                                    @if($result_detail['id'] == $detail['id_penjualanfromchinadetail'])
                                        @php
                                            $sumQtyPacking += $detail['qty'];
                                        @endphp
                                    @endif
                                @endforeach

                                @php
                                    $totalQty += $sumQtyPacking;
                                    $id_penjualanfromchina = $packingList['id_penjualanfromchina'];
                                @endphp
                            @endforeach

                            <!-- Menyimpan nomor urutan -->
                            @php
                                $sequenceNumber = $key + 1;
                            @endphp
                      
                            <tr>
                                <td style="padding-left:20px;border: 1px solid #696868; color: black;">
                                    {{ $sequenceNumber }}
                                </td>
                                <td style="padding-left:20px;border: 1px solid #696868; color: black;">
                                    {{ $result_detail['name_english'] }}
                                </td>
                                <td style="padding-left:20px;border: 1px solid #696868; color: black;" data-id="{{ $result_detail['id'] }}" data-nilai="{{ $result_detail['qty'] }}">
                                  
                                    {{ $result_detail['qty'] - $totalQty}} 
                                </td>
                            </tr>
                       @endforeach


               </table>
               
                      
               
                
            </form>
                    @php
                        $totalPacking =0;
                        $indexSelect = 0;
                        $indexqty=0;
                        $id_detail_packinglist=[];
                        $detailIndexNew=0;
                    @endphp
                    @if($Data['msg']['packinglist'] && count($Data['msg']['packinglist']) > 0)
                        <div class="tab-pane fade show" id="packing_list2"style="margin-top: 20px;">
                            <div  id="newInputContainer2" style="padding-top: 20px;">
                                    @foreach($Data['msg']['packinglist'] as $urutan_packinglist => $row_packinglist)
                                            @foreach($row_packinglist['detail'] as $urutan_detail => $row_detail)
                                                @php
                                                    $id_detail_packinglist[] =$row_detail['id_penjualanfromchinadetail'];
                                           
                                                @endphp
                                            @endforeach
                                                
                                    @endforeach
                                   
                                @foreach($Data['msg']['packinglist'] as $index => $packing)
                                    @php
                                        $totalPacking +=1;
                                    @endphp
                                

                                    @if($index+1 < 2)
                                        <div style="padding-top: 10px;" class="col-md-6">


                                            <label for="kodebaranglabel">Packing {{ $index+1 }}</label>
                                            <!-- untuk number_packing -->
                                            <input type="hidden" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px; " name="id_packingList" value="{{ $result_detail['id_penjualanfromchina'] }}">

                                            <input type="hidden" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;" name="number_packing_edit[]" value="{{ $index }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;width: 100%" name="name_packing_edit[]" value="{{ $packing['name'] }}">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-warning" >Tidak Bisa Delete</button>
                                            </div>
                                            
                                        </div>
                                    @else
                                        <div class="packing-group">
                                                        <div style="padding-top: 10px;" class="col-md-6">


                                                                <label for="kodePacking">Packing {{ $index+1 }}</label>
                                                                <!-- untuk number_packing -->
                                                            
                                                                <input type="hidden" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;" name="number_packing_edit[]" value="{{ $index }}">
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                <input type="text" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;width: 100%" name="name_packing_edit[]" value="{{ $packing['name'] }}">   
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <button type="button" class="btn btn-danger"  onclick="deletePacking(this, {{ $index }})" >Delete </button>
                                                                </div>
                                                        </div>
                                        </div>
                                        
                                    @endif
                                 
                                    <br>

                                    <div class="packing-group2" id="packingDetails{{ $index }}">
                                        @foreach($packing['detail'] as $detailIndex => $detail)
                                            <div class="row" id="detailRow{{ $index }}{{ $detailIndex }}">

                                                <div class="col-md-4">

                                                
                                                @foreach($Data['msg']['commercialinvoice']['detail'] as $key => $result2)
                                                    
                                                    @php
                                                        $totalQty = 0;
                                                    @endphp

                                                    @foreach($Data['msg']['packinglist'] as $packingList)
                                                        @php
                                                            $sumQtyPacking = 0;
                                                        @endphp

                                                        @foreach($packingList['detail'] as $detail)
                                                            @if($result2['id'] == $detail['id_penjualanfromchinadetail'])
                                                                    @php
                                                                        
                                                                        $sumQtyPacking += $detail['qty'];
                                                                    @endphp
                                                            @endif
                                                        @endforeach

                                                        @php
                                                            $totalQty += $sumQtyPacking;
                                                        @endphp
                                                    @endforeach

                                                    <!-- Menyimpan nomor urutan -->
                                                    @php
                                                        $sequenceNumber = $key + 1;
                                                    @endphp

                                                
                                                @endforeach
                                                @php
                                               
                                                if($detailIndexNew<$detailIndex){
                                                    $detailIndexNew = $detailIndex+1;
                                                }
                                                else{
                                                    $detailIndexNew += 1;

                                                }
                                                @endphp
                                                
                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="form-control" id="id_itempacking" name="itempacking_edit[]">
                                                <option value="0">Pilih Item</option>

                                                    @foreach($Data['msg']['commercialinvoice']['detail'] as $key2 => $result_option)
                                                        <option value="{{  $result_option['id'] }}" {{ $id_detail_packinglist[$detailIndexNew-1] == $result_option['id'] ? 'selected' : ''  }}> {{ $result_option['name_english'] }} </option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="col-md-4">
                                                
                                                    <input type="text" id="qtylabel{{ $index }}{{ $detailIndex }}" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;" name="qtyitempacking[{{ $index }}][{{ $detailIndex }}]" value="{{ $Data['msg']['packinglist'][$index]['detail'][$detailIndex]['qty'] }}">
                                                </div>
                                                <div class="col-md-4">
                                                    @if($index+1 ==1 && $detailIndex < 1)
                                                    <button type="button" class="btn btn-warning" >Tidak Bisa Delete</button>
                                                    @else
                                                    <button type="button" class="btn btn-danger" onclick="removeDetailRow({{ $index }}, {{ $detailIndex }})">Delete</button>
                                                    @endif
                                                
                                                </div>
                                            </div>
                                       
                                        @endforeach
                                        @php
                                            $indexSelect = $index;
                                            $indexqty = $detailIndex ?? 0;
                                            $packing =$packing['name'];
                                        @endphp
                                    </div>

                                  <button type="button" id="button_tambah_{{ $index }}" class="btn btn-primary add-btn" style="margin-top: 20px;" onclick="addDetailRow({{ $index }})">Tambah Kolom</button>
                                
                                @endforeach
                            </div>
                        </div>

                        @php
                            $totalQtyArray[] = [
                                'sequenceNumber' => $totalPacking,
                                'totalQty' => $totalQty,
                                'name_english' =>  $result_detail['name_english'],
                                'id' =>  $result_detail['id'],
                                'id_penjualanfromchina' => $result_detail['id_penjualanfromchina'],
                                'id_penjualanfromchina_list' => $id_penjualanfromchina,
                                'index_number_pack'=>$indexSelect,
                                'index_qtyitem'=>$indexSelect+1,
                                'index_qtyitem2' =>$indexqty,
                                'packing' =>$packing
                            ];

                            $totalQtyJson = json_encode($totalQtyArray);
                            
                        @endphp
                    @else
                        @php
                            $totalQtyArrayWithoutPacking = [];
            
                            foreach($Data['msg']['commercialinvoice']['detail'] as $index => $withoutPacking) {
                                $totalQtyArrayWithoutPacking[] = [
                                'name_english' => $withoutPacking['name_english'],
                                'id' => $withoutPacking['id'],
                                'id_penjualanfromchina' => $result_detail['id_penjualanfromchina'],
                                
                                ];
                            }

                                $totalQtyJsonWithoutPacking  = json_encode($totalQtyArrayWithoutPacking);
                        @endphp
                    @endif

                    <div class="tab-pane fade show" id="packing_list3"style="margin-top: 20px;">
                      <div id="newInputContainer" style="padding-top: 20px;"></div>
                      
                    
                        @if(isset($totalQtyJson) && $totalQtyJson)
                            <div class="form-group" id="form_input_add" style="display: flex; justify-content: flex-end; padding-top: 30px;">
                                        <button type="button" class="btn btn-success" onclick="addNewInput()">Add Input</button>
                            </div>

                            <div class="form-group" id="button_save_add" style="display: flex;padding-top:30px; text-align:end;">
                                    <button type="button" id="submitButtonPacking" class="btn btn-primary" style="margin-left: auto;">Simpan Packing List</button>
                            </div>

                        @else
                            <div class="form-group" id="form_input_add2" style="display: flex; justify-content: flex-end; padding-top: 30px;">
                                    <button type="button" class="btn btn-success" onclick="addNewInputWithoutPacklingList()">Add Input Without PackingList</button>
                            </div>

                            <div class="form-group" id="button_save_add2" style="display: flex;padding-top:30px; text-align:end;">
                                    <button type="button" id="submitButtonWithoutPacking" class="btn btn-primary" style="margin-left: auto;">Simpan Packing List</button>
                            </div>
                        @endif
                    </div>
        </div>

    </div>
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Import From Order Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
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
                                @foreach($Data['msg']['listordercheck'] as $index => $resultordercheck)
                                    @php
                                    $number++;
                                    $isChecked = (boolean) $resultordercheck;
                                    @endphp
                                <tr>
                                    <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">
                                        <input type="checkbox" class="kubik-checkbox" name="checkbox_{{ $number }}" {{ $isChecked ? 'checked' : '' }}>
                                    </td>
                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;"><img src="{{ $Data['msg']['directory_gambar'] }}{{ $resultordercheck['image'] }}" style="width:200px; height:200px;"></td>
                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $resultordercheck['new_kode'] }}</td>
                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $resultordercheck['name'] }}</td>
                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $resultordercheck['jml_permintaan'] }}</td>
                                    <td style="max-width: 200px;white-space: normal; word-wrap: break-word;">{{ $resultordercheck['supplier_name'] }}</td>
                                    
                                </tr>    
                                @endforeach
    
                                @foreach($Data['msg']['listorder'] as $index => $result)
                                @php
                                $number2++;
                                @endphp
                                <form action="" class="form-horizontal" id="importBarang" method="get">
                                    @csrf
                                    <input type="hidden" name="id_product" value="{{ $Data['msg']['idcommercial'] }}" >
                                    <tr>
                                        <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">
                                        
                                        <input type="checkbox" class="kubik-checkbox2" name="checkbox2_{{ $number2 }}">
                                        <input type="hidden" name="number_{{ $number2 }}" value="{{ $result['restok_id'] }}">
                                            
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
                            <div style="text-align:right;">
                                    
                                    <button type="button" id="sendData" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                            </div>
                </div>
                <div class="modal-footer">
                   
                </div>
            </div>
        </div>
    </div>
        
    <!-- note -->
     


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../assets/js/edit-commercial-invoice/custom_code.js"></script> 
<script src="../assets/js/edit-commercial-invoice/select_choices.js"></script> 



<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    let masterRmbToUsd = @json($Data['msg']['masterrmbtousd']);
    let RmbToUsd = masterRmbToUsd[0]['nominal'];
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
    var freigh_out =0;
    var insurance_out =0;
    var jsonData = {!! $jsonData !!};      //  data JSON di JavaScript
    // console.log('jsonData',jsonData.length)
    var array_history_hscode = []
    var number_history_hscode = []
    var date_history_hscode = []
    var unit_price_without_tax_history_hscode=[]
            
    $(document).ready(function() {

        $('.hscode-edit-filter').change(function() {
            //untuk mengambil nilai yang dipilih dari kelas hscode-edit-filter
            var selectedValue = $(this).val();
            console.log('selectedValue:', selectedValue);
            
            // untuk mengambil index ke berapa dari kelas hscode-edit-filter
            var index = $('.hscode-edit-filter').index(this);
            console.log('Element index:', index);

            
            $('.new-hscode-input_'+index).val(selectedValue); //untuk mengupdate nilain input hscode
        });

        // $('.new-hscode-edit-filter_0').change(function() {
        //     // Get the selected value from the select element
        //     var selectedValue = $(this).val();
        //     console.log('selectedValue',selectedValue)
        //     // Update the value of the corresponding input field
        //     $('.new-hscode-input_{{ $ascendingIndex }}').val(selectedValue);
        // });
        


        // Select semua input dengan class .calculate-cbm
        $('.calculate-cbm').on('input', function() {
            var totalCbm = 0;
         
            jsonData.forEach(function(item) {
                    var ascendingIndex = item.ascendingIndex; 
            
                    var qty = parseFloat($('#qty_' + ascendingIndex).val()) || 0;
                  
                    var long_p = parseFloat($('#long_p_' + ascendingIndex).val()) || 0;
                    var width_p = parseFloat($('#width_p_' + ascendingIndex).val()) || 0; 
                    var height_p = parseFloat($('#height_p_' + ascendingIndex).val()) || 0; 
                         
                    // Menghitung cbm
                    var cbm = (long_p * width_p * height_p *qty /1000000).toFixed(2);
                    totalCbm+=parseFloat(cbm);
                    cbm_cbm[ascendingIndex] =totalCbm;
                    qty_qty[ascendingIndex] =qty;
                     
                    // console.log('totaCbm',totalCbm)
                    cbm1 =totalCbm;
                    $('#cbm_' + ascendingIndex).val(cbm);
             });
              
            
              calculateTotalCBM();
              
        });

        $('.total-price-without-tax').on('input', function() {
            jsonData.forEach(function(item) {
                    
                    var ascendingIndex = item.ascendingIndex; 
            
                    var qty = parseFloat($('#qty_' + ascendingIndex).val()) || 0;
                
                
                    var unit_price_without_tax_ = parseFloat($('#unit_price_without_tax_' + ascendingIndex).val()) || 0;
                    
                    var total_price_without_tax = (qty *unit_price_without_tax_);
               
                    $('#total_price_without_tax_' + ascendingIndex).val(total_price_without_tax);

                    var unit_price_usd = (parseFloat(unit_price_without_tax_) / parseFloat(RmbToUsd)).toFixed(2);
                    
                    var tot_price_usd = (parseFloat(unit_price_without_tax_) / parseFloat(RmbToUsd) * parseFloat(qty)).toFixed(2);
                    
                    $('#unit_price_usd_' +ascendingIndex).val(unit_price_usd);
                    $('#total_price_usd_'+ascendingIndex).val(tot_price_usd);

              
                    tot_price_without_tax_usd[ascendingIndex] = parseFloat(tot_price_usd)
                    tot_without_tax_arr[ascendingIndex] =total_price_without_tax
                    // console.log('tot_without_tax_arr',tot_without_tax_arr)
                    var total_wth_tax_arr = tot_without_tax_arr.reduce(function(acc, curr) {
                        return acc + curr;
                    }, 0);
            
                    calculatewithouttaxarr();
                    calculatewithouttaxusdarr();
                    
            });
        });
       
        $('.freight-cost').on('input', function() {
            
         
            
                    var freight = parseFloat($('#freight_cost_id_tab').val()) || 0;
                    console.log('freight_cost',freight)                    
                    freigh_out = freight
                    calculatewithouttaxarr();
                    calculatewithouttaxusdarr()
            
              
        });
        
        $('.insurance-classs').on('input', function() {
            
         
   
                    var inusrance = parseFloat($('#insurance_edit_id_tab').val()) || 0;
                    console.log('inusrance',inusrance)                    
                    insurance_out = inusrance
                    calculatewithouttaxarr();
                    calculatewithouttaxusdarr();
            
   
              
        });

    });
</script>
<script>
    
    function deletePacking(button, index) {
        
        var packingGroup = button.closest('.packing-group');
        if (packingGroup) {
            packingGroup.remove();
        }
          
        var addButton = document.getElementById('button_tambah_' + index);
        if (addButton) {
            addButton.remove();
        }
    }
</script>

<script>

    @if(isset($totalQtyJson) && $totalQtyJson)
      var totalQtyData = <?php echo $totalQtyJson ? $totalQtyJson : 'null'; ?>;
      console.log('totalQtyJson',totalQtyData)
      var sequenceNumbers = totalQtyData.map(function(item) {
          return item.sequenceNumber;
      });
      var packings = totalQtyData.map(function(item) {
          return item.packing;
      });
      var index_number_pack = totalQtyData.map(function(item) {
          return item.index_qtyitem;
      });
      var indexqty = totalQtyData.map(function(item) {
          return item.index_qtyitem2;
      });

      var index_number_pack2 = totalQtyData.map(function(item) {
          return item.index_qtyitem;
      });
     
      // Simpan nilai array sequenceNumbers ke dalam variabel baru
      var newArrayValue = sequenceNumbers.slice();
      var packing = packings.slice();
    @endif
    @if(isset($totalQtyJsonWithoutPacking) && $totalQtyJsonWithoutPacking)
              var totalQtyDataWithoutPacking = <?php echo $totalQtyJsonWithoutPacking ? $totalQtyJsonWithoutPacking : 'null'; ?>;
              var name_packing_english = totalQtyDataWithoutPacking.map(function(item) {
                  return item.name_english;
              });
              var idpacklist = totalQtyDataWithoutPacking[0].id_penjualanfromchina.toString();

              console.log('totalQtyWithoutPacking',totalQtyDataWithoutPacking);
              console.log('idpacklist',idpacklist);
    @endif
</script>

<script>
 



    function removeDetailRow(index, detailIndex) {
        var detailRow = document.getElementById('detailRow' + index + detailIndex);

        if (detailRow) {
            detailRow.remove();
            document.getElementById('br' + index + detailIndex).remove();
        }
    }

    //untuk menambahkan element qty packing dan itempacking  ketika sudah ada packing list
   function addDetailRow(index) {
      var packingDetails = document.getElementById('packingDetails' + index);
      var newDetailIndex = packingDetails.children.length ; // Calculate new detail index based on existing rows and <br> tags
      var newRow = document.createElement('div');
      newRow.className = 'row';
      newRow.id = 'detailRow' + index + newDetailIndex;

      var newCol = document.createElement('div');
      newCol.className = 'col-md-4';
      var newSelect = document.createElement('select');
      newSelect.className = 'form-control';
      newSelect.style = 'border: 1px solid #696868; color: black; padding-left: 10px;';
      newSelect.id = 'selectPackingDetails' + index + newDetailIndex;
      newSelect.name ='itempacking_edit';
      // Add default "Pilih Item" option
      var defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.text = 'Pilih Item';
      defaultOption.selected = true;
      defaultOption.disabled = true;
      newSelect.appendChild(defaultOption);

      // Add options to the select element
      totalQtyData.forEach(function(item) {
        console.log('item',item.name_english)
          var option = document.createElement('option');
          option.value = item.id;
          option.text = item.name_english;
          if (item.id_penjualanfromchina == item.id_penjualanfromchina_list) {
              option.selected = true;
          }
          newSelect.appendChild(option);
      });

      newCol.appendChild(newSelect);

      var newCol1 = document.createElement('div');
      newCol1.className = 'col-md-4';
      var newInput = document.createElement('input');
      newInput.type = 'text';
      newInput.placeholder = 'qty kolom';
      newInput.className = 'form-control';
      newInput.name ='qtyitempacking['+index+']'+'['+newDetailIndex+']';
      newInput.style = 'border: 1px solid #696868; color: black; padding-left: 10px;';
      newInput.id = 'qtylabel' + index + newDetailIndex;
      newCol1.appendChild(newInput);

      var newCol2 = document.createElement('div');
      newCol2.className = 'col-md-4';
      var newButton = document.createElement('button');
      newButton.type = 'button';
      newButton.className = 'btn btn-danger';
      newButton.innerHTML = 'X';
      newButton.onclick = function() {
          removeDetailRow(index, newDetailIndex);
      };
      newCol2.appendChild(newButton);
      newRow.appendChild(newCol);
      newRow.appendChild(newCol1);
      newRow.appendChild(newCol2);

      packingDetails.appendChild(newRow);

      // Initialize Choices.js on the new select element
      const choices = new Choices(newSelect, {
          searchEnabled: true,
          itemSelectText: '',
          classNames: {
              containerInner: 'form-control with-border',
              input: 'form-control',
              inputCloned: 'form-control',
              list: 'form-control',
              listItems: 'form-control',
              dropdown: 'choices-dropdown-border', // Add CSS class for dropdown
          },
          searchFields: ['label'],
          shouldSort: false,
      });

      // Add CSS style for Choices.js dropdown
      const dropdownStyle = document.createElement('style');
      dropdownStyle.innerHTML = `
          .choices .choices__list--dropdown {
              border: 1px solid #696868;
              z-index: 999; /* Set dropdown z-index */
              background-color: white; /* Set background color */
          }
      `;
      document.head.appendChild(dropdownStyle);

      // Adjust Choices.js style
      newSelect.style.color = 'black';

      updateAddButtonPosition(index);
   }

   function updateAddButtonPosition(index) {
        var packingDetails = document.getElementById('packingDetails' + index);
        var addButton = packingDetails.nextElementSibling; // Get the Add button

        var lastDetailRow = packingDetails.lastElementChild.previousElementSibling; // Get the last detail row
        if (lastDetailRow) {
            addButton.style.marginTop = '0px'; // Adjust margin top of the Add button to maintain its position
        } else {
            addButton.style.marginTop = '0'; // Reset margin top if there are no detail rows
        }
   }

   


</script>

<script>

    
    var inputArray2 = []; // Membuat array untuk menyimpan referensi ke setiap input yang dibuat
    var inputArray3 = 0;
    var inputArray = []; // Membuat array untuk menyimpan referensi ke setiap input yang dibuat
    var totalSum =0;

    //untuk menambahkan  inputan baru dan melanjutkan packing list yang sudah ada
    function addNewInput() {
        
        var indexSelect = <?php echo json_encode($indexSelect); ?>;
        
        // Buat elemen input baru
    

        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.className = 'form-control';
        newInput.style.border = '1px solid #696868';
        newInput.style.width = '50%';
        newInput.style.paddingLeft = '10px'; // Menambahkan padding kiri
        newInput.id = 'name_packing';
        newInput.name = 'name_packing_edit[]';
        newInput.placeholder = packing;
        newInput.value=packing;
        // Menambahkan efek placeholder dengan padding kiri
        
        newInput.addEventListener('focus', function() {
            if (this.value.trim() === packing) {
            
            this.style.paddingLeft = '10px'; // Tetapkan kembali padding-left jika kosong
            }
        });
        newInput.addEventListener('blur', function() {
            if (this.value.trim() === packing) {
            
            this.style.paddingLeft = '10px'; // Tetapkan kembali padding-left jika kosong
            }
        });

        // Tambahkan elemen input baru ke dalam array
        inputArray.push(newInput);

        // Buat elemen label baru dengan indeks arraynya
        var newLabel = document.createElement('label');
        var totalValue = inputArray.length;
        var current =0;
        // console.log('total',totalValue)
        totalSum= index_number_pack2.reduce(function(accumulator,currentValue) {
            // console.log('accumulator',accumulator)
            // console.log('currentValue',currentValue)
            if(sequenceNumbers[0]===0){
                
                return accumulator;
            }
        
            else{

                return accumulator + currentValue;
            }
        }, totalValue);
        newLabel.innerText = 'Packing Name ' + totalSum;
        newLabel.style.marginRight = '10px'; // Spasi antara label dan input
        newLabel.id = 'id_newLabel';

        var newInputHidden = document.createElement('input');
        newInputHidden.type = 'hidden';
        newInputHidden.className = 'form-control';
        newInputHidden.style.border = '1px solid #696868';
        newInputHidden.style.width = '50%';
        newInputHidden.style.paddingLeft = '10px'; // Menambahkan padding kiri
        newInputHidden.id = 'number_packing';
        newInputHidden.name = 'number_packing_edit[]';
        
        newInputHidden.value=totalSum-1;

        var addButton = document.createElement('button');
        addButton.innerText = 'Tambah';
        addButton.className = 'btn btn-primary';
        addButton.type = 'button';
        addButton.id = 'tambah_id';

        // Buat tombol delete
        var deleteButton = document.createElement('button');
            
            deleteButton.innerText = 'Delete';
            deleteButton.className = 'btn btn-danger';
            deleteButton.style.marginLeft = '15px';
            deleteButton.style.marginTop = '10px';
            deleteButton.type = 'button';
            deleteButton.id = 'delete_id';
            deleteButton.addEventListener('click', function() {
                var labelToRemove = document.getElementById('id_newLabel');
                labelToRemove.parentElement.removeChild(labelToRemove);

                var tambahToRemove = document.getElementById('tambah_id');
                tambahToRemove.parentElement.removeChild(tambahToRemove);

                var deleteToRemove = document.getElementById('delete_id');
                deleteToRemove.parentElement.removeChild(deleteToRemove);

                var newUnputToRemove = document.getElementById('name_packing');
                newUnputToRemove.parentElement.removeChild(newUnputToRemove);

                var inputToRemove = document.getElementById('number_packing');
                inputToRemove.parentElement.removeChild(inputToRemove);
            });

        var divContainerLabel = document.createElement('div');
        divContainerLabel.style.display = 'flex';
        divContainerLabel.style.alignItems = 'center'; // Posisikan elemen dalam satu baris

        divContainerLabel.appendChild(newLabel);
        // Buat div untuk mengelompokkan label, input, dan tombol delete
        var divContainer = document.createElement('div');
        divContainer.style.display = 'flex';
        divContainer.style.alignItems = 'center'; // Posisikan elemen dalam satu baris
        // divContainer.style.padding = '10px'; // Tambahkan padding

        divContainer.appendChild(newInput);
        divContainer.appendChild(newInputHidden);
        divContainer.appendChild(deleteButton);

        // **Tambahkan div untuk tombol tambah dengan margin**
        var addButtonDiv = document.createElement('div');
        addButtonDiv.style.margin = '10px 0'; // Tambahkan margin atas dan bawah

        // Buat tombol "Tambah"
        addButtonDiv.appendChild(addButton);

        // Tambahkan divContainerLabel dan divContainer ke container
        document.getElementById('newInputContainer').appendChild(divContainerLabel);
        document.getElementById('newInputContainer').appendChild(divContainer);

        // Tambahkan div untuk tombol tambah ke container
        document.getElementById('newInputContainer').appendChild(addButtonDiv);
        
        // Tambahkan elemen input baru (newInput2) saat tombol tambah ditekan
        addButton.addEventListener('click', function() {
    var packingDetails = document.getElementById('packingDetails' + indexSelect);

    if (packingDetails) {
        var newDetailIndex = packingDetails.children.length / 2;

        // Create a new row for the packing detail
        var newRow = document.createElement('div');
        newRow.className = 'row';
        newRow.id = 'detailRow' + indexSelect + newDetailIndex;

        // Column for the select dropdown
        var newCol = document.createElement('div');
        newCol.className = 'col-md-4';
        newCol.style.width = '180px';

        // Create and style the select element
        var newSelect = document.createElement('select');
        newSelect.className = 'form-control';
        newSelect.style = 'border: 1px solid #696868; color: black; padding-left: 10px; width:205%;';
        newSelect.id = 'selectPackingDetails2' + indexSelect + newDetailIndex;
        newSelect.name = 'itempacking_edit[]';

        // Default option for the select
        var defaultOption = document.createElement('option');
        defaultOption.value = '0';
        defaultOption.text = 'Pilih Item 1';
        defaultOption.selected = true;
        defaultOption.disabled = true;
        newSelect.appendChild(defaultOption);

        // Append options from `totalQtyData`
        totalQtyData.forEach(function(item) {
            console.log('name_english',item.name_english)
            var option = document.createElement('option');
            option.value = item.id;
            option.text = item.name_english;
            if (item.id_penjualanfromchina === item.id_penjualanfromchina_list) {
                option.selected = true;
            }
            newSelect.appendChild(option);
        });

        newCol.appendChild(newSelect);

        // Create input for quantity
        var newInput2 = document.createElement('input');
        newInput2.type = 'text';
        newInput2.className = 'form-control custom-input';
        newInput2.style.border = '1px solid #696868';
        newInput2.style.width = '31.8%';
        newInput2.style.marginLeft = '220px';
        newInput2.placeholder = 'Qty';

        // Set the name dynamically based on conditions
        var totalSum2 = totalSum - 1;
        if (inputArray.length === inputArray3) {
            newInput2.name = `qtyitempacking[${totalSum2}][${inputArray2.length}]`;
        } else {
            inputArray2.length = 0;
            newInput2.name = `qtyitempacking[${totalSum2}][0]`;
        }

        // Placeholder effect
        newInput2.addEventListener('focus', function() {
            if (this.value.trim() === 'Qty') this.value = '';
            this.style.paddingLeft = '20px';
        });
        newInput2.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.value = 'Qty';
                this.style.paddingLeft = '20px';
            }
        });

        // Container to hold the select and input elements
        var divContainer2 = document.createElement('div');
        divContainer2.style.display = 'flex';
        divContainer2.style.alignItems = 'center';
        divContainer2.style.paddingTop = '12px';
        divContainer2.id = 'container2-id';

        // Add delete button
        var deleteButtonBawah = document.createElement('button');
        deleteButtonBawah.innerText = 'Delete';
        deleteButtonBawah.className = 'btn btn-danger';
        deleteButtonBawah.style.marginLeft = '15px';
        deleteButtonBawah.style.marginTop = '12px';
        deleteButtonBawah.type = 'button';
        deleteButtonBawah.addEventListener('click', function() {
            divContainer2.remove(); // Remove the entire container
        });

        // Append elements to the container and the container to the parent
        divContainer2.appendChild(newCol);
        divContainer2.appendChild(newInput2);
        divContainer2.appendChild(deleteButtonBawah);

        // Append the container to the target div
        document.getElementById('newInputContainer').insertBefore(divContainer2, addButtonDiv);

        // Update input array tracking
        inputArray2.push(newInput2);
        inputArray3 = inputArray.length;
    }
});
    }
    var inputCounter = 0;
    var inputArrayWithoutPackingList = [];  // Array untuk menyimpan elemen input
    var inputArray2WithoutPackingList = [];  // Array untuk menyimpan elemen input
    var inputArray3WithoutPackingList = [];  // Array untuk menyimpan elemen input

    // untuk menambahkan inputan baru yang belum ada packinglist
    function addNewInputWithoutPacklingList(){
        var newInput_Id = document.createElement('input');

        newInput_Id.type = 'hidden';
        newInput_Id.className = 'form-control';
        newInput_Id.style.border = '1px solid #696868';
        newInput_Id.style.width = '50%';
        newInput_Id.style.paddingLeft = '10px'; // Menambahkan padding kiri
        newInput_Id.placeholder='Packing Name';
        newInput_Id.id = 'name_packing';
        newInput_Id.name = 'id_packingList';
        newInput_Id.value = idpacklist;

        var newInput = document.createElement('input');

        newInput.type = 'text';
        newInput.className = 'form-control';
        newInput.style.border = '1px solid #696868';
        newInput.style.width = '50%';
        newInput.style.paddingLeft = '10px'; // Menambahkan padding kiri
        newInput.placeholder='Packing Name';
        newInput.id = 'name_packing';
        newInput.name = 'name_packing_edit[]';
        var deleteButton = document.createElement('button');
                            deleteButton.innerText = 'Delete';
                            deleteButton.className = 'btn btn-danger';
                            deleteButton.style.marginLeft = '15px';
                            deleteButton.style.marginTop = '12px';
                            deleteButton.type = 'button';
                            deleteButton.id = 'delete_id_bawah';

        newInput.addEventListener('focus', function() {
            if (this.value.trim() === packing) {

            this.style.paddingLeft = '10px'; // Tetapkan kembali padding-left jika kosong
            }
        });
        newInput.addEventListener('blur', function() {
            if (this.value.trim() === packing) {

            this.style.paddingLeft = '10px'; // Tetapkan kembali padding-left jika kosong
            }
        });

        // Tambahkan elemen input baru ke dalam array
        inputArrayWithoutPackingList.push(newInput);
        var newInputHidden = document.createElement('input');
        newInputHidden.type = 'hidden';
        newInputHidden.className = 'form-control';
        newInputHidden.style.border = '1px solid #696868';
        newInputHidden.style.width = '50%';
        newInputHidden.style.paddingLeft = '10px'; // Menambahkan padding kiri
        newInputHidden.id = 'number_packing';
        newInputHidden.name = 'number_packing_edit[]';
        newInputHidden.value=inputCounter;

        var newLabel = document.createElement('label');
        newLabel.innerText = 'Packing Name ' +(inputCounter+1);
        newLabel.style.marginRight = '10px'; // Spasi antara label dan input
        newLabel.id = 'id_newLabel';

        var divContainer = document.createElement('div');
        divContainer.style.display = 'flex';
        divContainer.style.alignItems = 'center'; // Posisikan elemen dalam satu baris
        // divContainer.style.padding = '10px'; // Tambahkan padding
        divContainer.id='cointainer_id';
        var divContainerLabel = document.createElement('div');
        divContainerLabel.style.display = 'flex';
        divContainerLabel.style.alignItems = 'center'; // Posisikan elemen dalam satu baris
        divContainerLabel.id='cointainer_label_id';
        divContainerLabel.appendChild(newLabel);
        
        divContainer.appendChild(newInputHidden);
        divContainer.appendChild(newInput);
        divContainer.appendChild(newInput_Id);
        divContainer.appendChild(deleteButton);
        
        var addButton = document.createElement('button');
        addButton.innerText = 'Tambah';
        addButton.className = 'btn btn-primary';
        addButton.type = 'button';
        addButton.id = 'tambah_id';

        var addButtonDiv = document.createElement('div');
        addButtonDiv.style.margin = '10px 0'; // Tambahkan margin atas dan bawah
        addButtonDiv.id = 'addButtonDiv';
        // Buat tombol "Tambah"
        addButtonDiv.appendChild(addButton);

        document.getElementById('newInputContainer').appendChild(divContainerLabel);
        document.getElementById('newInputContainer').appendChild(divContainer);
        
        document.getElementById('newInputContainer').appendChild(addButtonDiv);
        var inputCounter2=0;
        var inputCounterSame=inputCounter;
                addButton.addEventListener('click', function() {
                            var deleteButtonBawah = document.createElement('button');
                            deleteButtonBawah.innerText = 'Delete1';
                            deleteButtonBawah.className = 'btn btn-danger';
                            deleteButtonBawah.style.marginLeft = '15px';
                            deleteButtonBawah.style.marginTop = '22px';
                            deleteButtonBawah.type = 'button';
                            deleteButtonBawah.id = 'delete_id_paling_bawah';
                            // newCol.appendChild(newSelect);
                             //            var newInput2 = document.createElement('input');
                            var newCol = document.createElement('div');
                            newCol.className = 'col-md-4';
                            newCol.style.width='312.57px';

                            var newSelect = document.createElement('select');
                            newSelect.className = 'form-control';
                            newSelect.style = 'border: 1px solid #696868; color: black; padding-left: 10px;';
                            newSelect.id = 'selectPackingDetails2';
                            newSelect.name='itempacking_edit';
                            newSelect.style.marginTop='10px';
                            // Add default "Pilih Item" option
                            var defaultOption = document.createElement('option');
                            defaultOption.value = '';
                            defaultOption.text = 'Pilih Item';
                        
                            newSelect.appendChild(defaultOption);

                            // Add options to the select element
                            totalQtyDataWithoutPacking.forEach(function(item) {
                                var option = document.createElement('option');
                                option.value = item.id;
                                option.text = item.name_english;
                            
                                newSelect.appendChild(option);
                            });

                                    newCol.appendChild(newSelect);
                            var newInput2 = document.createElement('input');
                            newInput2.type = 'text';
                            newInput2.className = 'form-control';
                            newInput2.style.border = '1px solid #696868';
                            newInput2.style.width = '314.8px';
                            newInput2.style.paddingLeft = '10px'; // Menambahkan padding kiri
                            newInput2.style.marginTop = '10px'; // Menambahkan jarak dari atas
                            newInput2.style.marginLeft = '24px'; // Menambahkan jarak dari kiri
                            newInput2.placeholder = 'Qty';
                            newInput2.id = 'name_packing_additional';
                            console.log('inputCounterSame',inputCounterSame);
                            console.log('inputCounter',inputCounter2);
                            newInput2.name = 'qtyitempackingedit['+inputCounterSame+']'+'['+inputCounter2+']';
                            var divContainer3 = document.createElement('div');
                            divContainer3.style.display = 'flex';
                            divContainer3.style.paddingTop = '12px';
                            divContainer3.style.alignItems = 'center';
                            divContainer3.id ='div_conatiner3';
                            divContainer3.appendChild(newCol);
                            divContainer3.appendChild(newInput2); // Add newInput2 to the same container
                            divContainer3.appendChild(deleteButtonBawah);
                            document.getElementById('newInputContainer').insertBefore(divContainer3, addButtonDiv);
                            deleteButtonBawah.addEventListener('click', function() {
                    
                                
                                
                                    var deleteButtonBawahlToRemove = document.getElementById('div_conatiner3');
                                    deleteButtonBawahlToRemove.parentNode.removeChild(deleteButtonBawahlToRemove);

                    
                            });
                            inputCounter2++;
                            
                });

                deleteButton.addEventListener('click', function() {
                    
                            var deleteButtonBawahlToRemoveButtonDiv = document.getElementById('addButtonDiv');
                            deleteButtonBawahlToRemoveButtonDiv.parentNode.removeChild(deleteButtonBawahlToRemoveButtonDiv);
                            var deleteButtonBawahlToRemoveLabel = document.getElementById('cointainer_label_id');
                            deleteButtonBawahlToRemoveLabel.parentNode.removeChild(deleteButtonBawahlToRemoveLabel);
                            var deleteButtonBawahlToRemove = document.getElementById('cointainer_id');
                            deleteButtonBawahlToRemove.parentNode.removeChild(deleteButtonBawahlToRemove);

                    
                });
            inputCounter++; // Tingkatkan counter untuk input berikutnya
    }

    document.getElementById('dropdownLink').addEventListener('click', function(event) {
                event.preventDefault();  // Prevent the default action of the anchor link
                var list = document.getElementById('hscodeList');
                if (list.style.display === 'none') {
                    list.style.display = 'block';
                    this.textContent = 'Hide Items';  // Optional: Change link text when items are shown
                } else {
                    list.style.display = 'none';
                    this.textContent = 'Show Items';  // Optional: Change link text when items are hidden
                }
    });

</script>

<script>

    //untuk membuat select pilih item / item dari packing list menggunakan choices js ketika packing sudah ada
    $(document).ready(function() {
        // Initialize Choices.js on the select element
        const element = document.getElementById('id_itempacking');
        if (element) {
            const choices = new Choices(element, {
                searchEnabled: true,
                itemSelectText: '',
                
                classNames: {
                    containerInner: 'form-control with-border',
                    input: 'form-control',
                    inputCloned: 'form-control',
                    list: 'form-control',
                    listItems: 'form-control',
                    dropdown: 'choices-dropdown-border', // Tambahkan kelas CSS untuk dropdown
                },
                searchFields: ['label'],
                shouldSort: false,
            });

            // Menambahkan gaya CSS untuk dropdown
            const dropdownStyle = document.createElement('style');
            dropdownStyle.innerHTML = `
                .choices .choices__list--dropdown {
                    border: 1px solid #696868;
                    z-index: 999; /* Atur z-index dropdown */
                    background-color: white; /* Atur warna latar belakang */
                }
            `;
            document.head.appendChild(dropdownStyle);

            // Menyesuaikan style Choices.js
            element.style.color = 'black';
        }
    });

    //untuk membuat select baru pilih item / item dari packing list menggunakan choices js ketika menekan tombol tambah ketika packing sudah ada
    $(document).ready(function() {
        // Example of initializing Choices.js on an existing element if needed
        const element = document.getElementById('selectPackingDetails');
        if (element) {
            const choices = new Choices(element, {
                searchEnabled: true,
                itemSelectText: '',
                classNames: {
                    containerInner: 'form-control with-border',
                    input: 'form-control',
                    inputCloned: 'form-control',
                    list: 'form-control',
                    listItems: 'form-control',
                    dropdown: 'choices-dropdown-border', // Add CSS class for dropdown
                },
                searchFields: ['label'],
                shouldSort: false,
            });

            // Add CSS style for Choices.js dropdown
            const dropdownStyle = document.createElement('style');
            dropdownStyle.innerHTML = `
                .choices .choices__list--dropdown {
                    border: 1px solid #696868;
                    z-index: 999; /* Set dropdown z-index */
                    background-color: white; /* Set background color */
                }
            `;
            document.head.appendChild(dropdownStyle);

            // Adjust Choices.js style
            element.style.color = 'black';
        }
    });

   
    $(document).ready(function() {
            // Initialize Choices.js on any existing elements if needed
            const element = document.getElementById('selectPackingDetails2');
            if (element) {
                const choices = new Choices(element, {
                    searchEnabled: true,
                    itemSelectText: '',
                    classNames: {
                        containerInner: 'form-control with-border',
                        input: 'form-control',
                        inputCloned: 'form-control',
                        list: 'form-control',
                        listItems: 'form-control',
                        dropdown: 'choices-dropdown-border', // Add CSS class for dropdown
                    },
                    searchFields: ['label'],
                    shouldSort: false,
                });

                // Add CSS style for Choices.js dropdown
                const dropdownStyle = document.createElement('style');
                dropdownStyle.innerHTML = `
                    .choices .choices__list--dropdown {
                        border: 1px solid #696868;
                        z-index: 999; /* Set dropdown z-index */
                        background-color: white; /* Set background color */
                    }
                `;
                document.head.appendChild(dropdownStyle);

                // Adjust Choices.js style
                element.style.color = 'black';
            }
    });
 

   
    


    //untuk mengirim data dari form packing list
    $('#submitButtonPacking').click(function(event) {
                        // Mencegah perilaku default tombol
                        event.preventDefault();
                   
                        // Mengumpulkan data formulir
                        var formData = {
                            id: $('input[name=id_packingList]').val(),
                            
                            number_packing: $('input[name="number_packing_edit[]"]').map(function() {
                              return $(this).val();
                            }).get(),
                            name_packing: $('input[name="name_packing_edit[]"]').map(function() {
                              return $(this).val();
                            }).get(),
                        itempacking: $('select[name="itempacking_edit[]"]').map(function() {
                            return $(this).val();
                        }).get(),
                                qtyitempacking: {},
                            totPacking : sequenceNumbers
                        };
                        // Mengumpulkan semua nilai qtyitempacking_edit
                        $('input[name^="qtyitempacking"]').each(function() {
                          var name = $(this).attr('name');
                          formData.qtyitempacking[name] = $(this).val();
                        });
                        console.log('formData',formData)
                        // Mengirim permintaan AJAX
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('admin.pembelian_edit_packinglist_comercial_invoice') }}', // mengirim data melalui url
                            data: formData,
                            success: function(response) {
                                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                                console.log(response);
                                if (response !== null) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Packing list berhasil diedit!',
                                    }).then((result) => {
                                    // Jika pengguna menekan tombol "OK", muat ulang halaman
                                    if (result.isConfirmed || result.isDismissed) {
                                        // location.reload();
                                    }
                                });
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'Order Pembelian Gagal diedit!',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                // Penanganan kesalahan jika terjadi
                                console.error(error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat mengirim permintaan!',
                                });
                            }
                        });
    });

    //untuk mengirim data dari form packing list ketika belum ada packing list
    $('#submitButtonWithoutPacking').click(function(event) {
                        // Mencegah perilaku default tombol
                        event.preventDefault();
                        var formData = {
                            id: $('input[name=id_packingList]').val(),
                            
                            number_packing: $('input[name="number_packing_edit[]"]').map(function() {
                              return $(this).val();
                            }).get(),
                            name_packing: $('input[name="name_packing_edit[]"]').map(function() {
                              return $(this).val();
                            }).get(),
                            itempacking: $('select[name=itempacking_edit]').map(function() {
                            return $(this).val();
                        }).get(),
                            qtyitempacking: {}
                      
                        };
                        
                        $('input[name^="qtyitempackingedit"]').each(function() {
                          var name = $(this).attr('name');
                          formData.qtyitempacking[name] = $(this).val();
                        });
                        console.log('formData',formData)
                        // Mengirim permintaan AJAX
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('admin.pembelian_edit_packinglist_comercial_invoice') }}', // mengirim data melalui url
                            data: formData,
                            success: function(response) {
                                // respon berhasil, lakukan apa yang perlu dilakukan di sini
                                
                                if (response !== null) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Packing list berhasil diedit!',
                                    }).then((result) => {
                                    // Jika pengguna menekan tombol "OK", muat ulang halaman
                                    if (result.isConfirmed || result.isDismissed) {
                                        location.reload();
                                    }
                                });
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'Packing list Gagal diedit!',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                // Penanganan kesalahan jika terjadi
                                console.error(error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat mengirim permintaan!',
                                });
                            }
                        });
    });

    $(document).ready(function() {
           $('button[id^=submitButtonEditComercialInvoice]').on('click', function() {
            var index = $(this).data('index');
            var formData = {
              id: $('input[name=id_edit_name]').val(),
              id_detail: $('#id_detail_' + index).val(),
              id_barang: $('#id_barang_' + index).val(),
              name: $('#name_barang_' + index).val(),
              name_chinese: $('#chinese_name_' + index).val(),
              name_english: $('#english_name_' + index).val(),
              model: $('#model_name_' + index).val(),
              brand: $('#brand_name_' + index).val(),
              length: $('#long_' + index).val(),
              width: $('#width_' + index).val(),
              height: $('#height_' + index).val(),
              length_p: $('#long_p_' + index).val(),
              width_p: $('#width_p_' + index).val(),
              height_p: $('#height_p_' + index).val(),
              
              qty: $('#qty_' + index).val(),
              nett_weight: $('#net_weight_' + index).val(),
              gross_weight: $('#gross_weight_' + index).val(),
              cbm: $('#cbm_' + index).val(),
              unit_price_without_tax_ : $('#unit_price_without_tax_' + index).val(),
              unit_price_usd_ : $('#unit_price_usd_' + index).val(),
              total_price_without_tax_ : $('#total_price_without_tax_' + index).val(),
              total_price_usd_ : $('#total_price_usd_' + index).val(),
              use_name_ : $('#use_name_' + index).val(),
                
          
                hs_codes: '',
                hs_code_inputs: ''
                
            };
            

            // $('.hscode-edit-filter').each(function(index) {
            //     var hsCode = $(this).val();
            //     var hsCodeInput = $('#hscode-input_'+index).val(); // Mengambil input yang sesuai urutannya dengan select
                
            //     // Menyimpan nilai ke formData
            //     formData.hs_code = hsCode;
            //     formData.hs_code_input = hsCodeInput;
            // });
            
            // Initialize Choices.js and set up change event to update input
            $('.hscode-edit-filter').each(function(index) {
                var selectElement = this;

                // Destroy existing Choices instance if it exists to avoid duplicates
                if (selectElement.choicesInstance) {
                    selectElement.choicesInstance.destroy();
                }

                // Initialize Choices.js on the select element
                var choicesInstance = new Choices(selectElement, {
                    shouldSort: false,           // Keep the order as per the original options
                    searchEnabled: true,         // Enable search within the dropdown
                    placeholder: true,           // Show placeholder as the initial option
                });

                // Save the instance on the element to manage it if needed
                selectElement.choicesInstance = choicesInstance;

                // When an option is selected, update the corresponding input
                $(selectElement).on('change', function() {
                    var selectedValue = $(this).val();
                    $('#hscode-input_' + index).val(selectedValue); // Update the input with the selected value
                });
            });

            console.log(formData);
            $.ajax({
                url: '{{ route('admin.pembelian_update_formatas_comercial_invoice') }}',
                method: 'GET', 
                data: formData,
                success: function(response) {
                    // respon sukses di sini
                    Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Item berhasil diedit!',
                                        })
                                        .then((result) => {
                                        // Jika pengguna menekan tombol "OK", muat ulang halaman
                                        // if (result.isConfirmed || result.isDismissed) {
                                        //     location.reload();
                                        // }
                                    });
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan di sini
                    alert('Terjadi kesalahan saat mengirim data');
                }
            });
        });
    });

    //untuk mengirim data dari notes & payment
    $(document).ready(function() {
        $('#submitButtonFormNotes').on('click', function() {
            var formData = {
                id: $('input[name=id_edit_name]').val(),
                freight_cost: $('input[name=freight_cost]').val(),
                insurance: $('input[name=insurance]').val(), //menggunakan element name
                incoterms: $('.incoterms-edit').val(), //menggunakan element id
                location: $('input[name=location]').val(),
                supplierbank: $('.banksupplier-edit').val(),
                currency: $('.currency-edit').val(),
                bank_name: $('input[name=bank_name]').val(),
                bank_address: $('input[name=bank_address]').val(),
                swift_code: $('input[name=swift_code]').val(),
                account_no: $('input[name=account_no]').val(),
                date: $('input[name=tgl_request_edit]').val(),
                beneficiary_name: $('input[name=beneficiary_name]').val(),
                beneficiary_address: $('input[name=beneficiary_address]').val(),
                modeadmin: $('input[name="modeadmin"]').val(),
                invoice_no: $('input[name=invoice_no_name]').val(),
                contract_no: $('input[name=contract_no_name]').val(),
                packing_no: $('input[name=packing_no_name]').val(),
                address: $('#address_id').val(),
                name: $('#company_id').val(),
                city: $('#city_id').val(),
                telp: $('#telp_id').val(),
                id_supplier: $('select[name=supplier_supplier]').val(),
                database: $('select[name=database_name]').val(),
            
                
            };
               $('.restok-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.chinese-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.english-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.model-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.brand-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.hs-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.long-input').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.width-input').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.height-input').each(function() {
                var id = $(this).attr('name');
                formData[id] = $(this).val();
            });
            $('.long-p-input').each(function() {
                var id = $(this).attr('id');
                console.log('long-p-input',id)
                formData[id] = $(this).val();
            });
            $('.width-p-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.height-p-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.height-p-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.total-price-without-tax').each(function() {
                var id = $(this).attr('id');
                
                formData[id] = $(this).val();
            });
            $('.nett-weight-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.gross-weight-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.cbm-input').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.total-price-without-tax').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.unit-price-usd').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.tot-price-without-tax').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.total-price-usd').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });
            $('.use-name').each(function() {
                var id = $(this).attr('id');
                formData[id] = $(this).val();
            });

            // import
             $('.restok_import').each(function() {
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
            $.ajax({
                url: '{{ route('admin.pembelian_update_comercial_invoice') }}', // Ganti dengan route yang sesuai
                method: 'GET', // Ubah menjadi POST jika endpoint kamu mengharuskannya
                data: formData,
                success: function(response) {
                    // Tangani respon sukses di sini
                    Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Comercial invoice berhasil diedit!',
                                        })
                                      
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan di sini
                    alert('Terjadi kesalahan saat mengirim data');
                }
            });
        });
    });
  
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../assets/js/edit-commercial-invoice/import_barang.js"></script> 


<script>

    $(document).ready(function() {

         
        $('#sendData').click(function(event) {
            event.preventDefault();

            var selectedCheckboxes = $('.kubik-checkbox2:checked');
            console.log('selectedCheckBoxes',selectedCheckboxes);
            var formData = {
                id_product: $('input[name=id_product]').val(),
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

            console.log('form data import',formData)
            

            // Mengirim permintaan AJAX
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.pembelian_importbarang_comercial_invoice') }}',
                data: formData,
                success: function(response) {
                    
            
                    array_history_hscode = [];
                    number_history_hscode = []
                    date_history_hscode = []
                    unit_price_without_tax_history_hscode =[]
                    var simbol_matauang=0;
                    // console.log('Data berhasil dikirim:', response);
                    response.hscodehistory.forEach(function(history,key){
                        function formatDateToDDMMYYYY(dateString) {
                            var date = new Date(dateString);
                            var day = String(date.getDate()).padStart(2, '0');
                            var monthNames = [
                                                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                            ];
                            var month = monthNames[date.getMonth()]; // Get month name
                            var year = date.getFullYear();
                            return `${day} ${month} ${year}`;
                        }
                        response.matauang.forEach(function(mt_uang,key_mt_uang){
                            if(mt_uang.id==history.commercialinvoice.id_matauang){
                                simbol_matauang=mt_uang.simbol;
                            }
                        })
                        // Assuming history.restok.tgl_request is in a standard date format (e.g., "2024-11-07")
                        var formattedDate = formatDateToDDMMYYYY(history.commercialinvoice.date);  
                        // console.log(history.restok.id_barang)
                        array_history_hscode.push(history.restok.id_barang)
                        number_history_hscode.push(history.hs_code)
                        date_history_hscode.push(formattedDate);
                        unit_price_without_tax_history_hscode.push(simbol_matauang + ' '+history.unit_price_without_tax)
                    })
                    // console.log('array_history_hscode',array_history_hscode)
                 
                    var contentContainer = $('#content-container');
                    contentContainer.empty();
               
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
                        // console.log(gambarName)
                        
                        var newTable1 = $('<table>');
                        var inputDetailElement = $('<input />').attr({
                            'id': 'id_edit_import'+index,          
                            'name': 'restok_'+(jsonData.length+index),      
                            'class': 'form-control restok_import',    
                            'placeholder': '',        
                            'type': 'hidden',          
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
                            'type': 'hidden',          // Tipe input
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
                            'name': 'chinese_name_' + (jsonData.length+index),  
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
                            'name': 'english_name_' + (jsonData.length+index),  
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
                            'name': 'model_name_' + (jsonData.length+index),  
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
                            'name': 'brand_name_' + (jsonData.length+index),  
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
                        console.log('array_history_hscode',array_history_hscode)
                        console.log('input_barangElement',input_barangElement.val())
                        var selectHsCode = $('<select style="width:100%;border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control hscode-import">' +
                                        '<option value="">Pilih Hs Code</option>' +            
                                        '</select>'); // Membuat elemen select
                                        array_history_hscode.forEach(function(hsCode,urutan_hscode) {
                                            // Add only if the hsCode matches input_barangElement
                                            // selectHsCode.append('<option value="' + hsCode + '">' + hsCode + '</option>');
                                            if (hsCode == input_barangElement.val()) {
                                                // console.log('hsCode',hsCode)
                                                
                                                
                                                selectHsCode.append('<option value="' + number_history_hscode[urutan_hscode] + '">' + number_history_hscode[urutan_hscode] +' - '+date_history_hscode[urutan_hscode] + '</option>');
                                            } 
                                            // else {
                                            // }
                                        });

                        newTdHsCode.append(selectHsCode);


                        newTdHsCode.append(selectHsCode);
                        var newTdHsCode2 = $('<td style="border: 1px solid #d7d7d7;">');
                       
                        var inputHsCode = $('<input />').attr({
                            'id': 'hscode-import-edit',
                            'name': 'hscode-input_' + (jsonData.length+index),  
                            'class': 'form-control hscode_import',    
                            'placeholder': '',        
                            'type': 'text',
                            // 'value': newTdBrand,
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '150%'           
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
                            'name': 'long_' + (jsonData.length+index),  
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
                            'name': 'width_'+ (jsonData.length+index),      
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
                            'name': 'height_'+ (jsonData.length+index),      
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
                            'name': 'long_p_'+ (jsonData.length+index),      
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
                            'name': 'width_p_'+ (jsonData.length+index),      
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
                            'name': 'height_p_'+ (jsonData.length+index),      
                            'class': 'form-control height_p_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': order.product.height_p * 100           
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
                            'name': 'qty_'+(jsonData.length+index),
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
                        newTd7Tr3Table2.append(inputElement7);
                       
                        var qty_json = <?php echo $qty ? $qty : 'null'; ?>;
                        // console.log('qty_json',qty_json)
                        tdTotQuantity[index] = parseFloat(inputElement7.val()) || 0;
                        var TotQuantity = tdTotQuantity.reduce(function(acc, curr) {
                            return acc + curr;
                        }, 0);
                        // console.log(tdTotQuantity)
                        // console.log(parseFloat(TotQuantity))
                        var SumAllTotQuantityOutCBM =parseFloat(TotQuantity); 
                        var tdElement = $('.custom-td'); 
                          

                        tdElement.text(SumAllTotQuantityOutCBM+qty_json);

                       
                         
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
                            'name': 'net_weight_'+(jsonData.length+index),      
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
                            'name': 'gross_weight_'+(jsonData.length+index),      
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
                            'name': 'cbm_'+(jsonData.length+index),      
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
                        // inputElement7.on('blur', updateCBM);
                       
                        inputElement10.on('input', updateCBM); // Tambahkan event listener untuk inputElement10 juga

                        var newTd11Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">');
                        
                        var inputElement11 = $('<input />').attr({
                            'id': 'unit_price_without_tax_import' + index,          
                            'name': 'unit_price_without_tax_' + (jsonData.length + index),      
                            'class': 'form-control unit_price_without_tax_import',  
                            'placeholder': '',        
                            'type': 'text',
                            'value': 0
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        
                    
                        var selectElementHistoryUnitPrice = $('<select></select>').attr({
                            'id': 'edit_supplier_id_' + index,
                            'name': 'edit_supplier_' + index,
                            'class': 'select select2 select-search form-control hscode-edit-filter'
                        }).css({
                            'border': '1px solid #696868',
                            'color': 'black',
                            'padding': '10px'
                        });

                        // Add the first option
                        selectElementHistoryUnitPrice.append($('<option></option>').attr('value', '').text('Show More'));

                        
                        array_history_hscode.forEach(function(hsCode,urutan_hscode) {
                                            if (hsCode == input_barangElement.val()) {                                               
                                                selectElementHistoryUnitPrice.append('<option value="' + number_history_hscode[urutan_hscode] + '">' + unit_price_without_tax_history_hscode[urutan_hscode] +' - '+date_history_hscode[urutan_hscode] + '</option>');
                                            } 
                        });
                        
                        // Append the input and select elements to the td
                        newTd11Tr3Table2.append(inputElement11);
                        newTd11Tr3Table2.append(selectElementHistoryUnitPrice);
                        
                        var newTd12Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement12 = $('<input />').attr({
                            'id': 'unit_price_usd_import'+index,          
                            'name': 'unit_price_usd_'+(jsonData.length+index),      
                            'class': 'form-control unit_price_usd_import',    
                            'placeholder': '',        
                            'type': 'text',
                            'value':0      
                        }).css({
                            'border': '1px solid #696868',
                            'color' : 'black',
                            'padding' : '10px',
                            'width': '100%'           
                        });
                        newTd12Tr3Table2.append(inputElement12);
                        function truncateToTwoDecimals(number) {
                            var numStr = number.toString();
                            var decimalIndex = numStr.indexOf('.');

                            if (decimalIndex !== -1) {
                                return numStr.substring(0, decimalIndex + 3);
                            }

                            return numStr; 
                        }
                        function updateUnitPriceUsd() {
                              

                               
                                var unit_without_tax = parseFloat(inputElement11.val()) || 0;
                                // console.log('masuk',unit_without_tax)
                                var unitPriceUsd = (unit_without_tax/parseFloat(RmbToUsd));
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
                        })
                   
                        var newTd13Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement13 = $('<input />').attr({
                            'id': 'total_price_without_tax_import'+index,          // ID untuk elemen input
                            'name': 'total_price_without_tax_'+(jsonData.length+index),      // Nama untuk elemen input
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
                            // console.log('without_tax_arr',without_tax_arr)
                            // tot_without_tax_arr = without_tax
                            // console.log('tot_without_tax_arr',tot_without_tax_arr) 
                             calculatewithouttaxarr();
                            inputElement13.val(without_tax_tot); 
                        }

                        
                        inputElement11.on('input', updateTotPriceWithoutTax);
                      
                   

                        var newTd14Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement14 = $('<input />').attr({
                            'id': 'total_price_usd_import'+index,  
                            'name': 'total_price_usd_'+(jsonData.length+index),      
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
                              
                              var totalPriceUsd = (parseFloat(unit_without_tax)/parseFloat(RmbToUsd))*parseFloat(qty_value);
                              totalPriceUsd = totalPriceUsd.toFixed(2);
                              tot_price_without_tax_usd_import[index] = parseFloat(totalPriceUsd)
                               calculatewithouttaxusdarr();
                              inputElement14.val(totalPriceUsd);
                        }
                        
                        var newTd15Tr3Table2 = $('<td style="border: 1px solid #d7d7d7; color: black; ">')
                        var inputElement15 = $('<input />').attr({
                            'id': 'use_name_import'+index,          
                            'name': 'use_name_'+(jsonData.length+index),
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
                                // array_history_hscode.empty()
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
                        var tableWrapper = $('<div>').addClass('table-responsive').append(newTable1);
                        var tableWrapper2 = $('<div>').addClass('table-responsive').append(newTable2);
                        newTrLast2.append(newTdLast2);
                        // contentContainer.append(newTable1); // Menggunakan newTrLast bukan newTr1
                        // contentContainer.append(newTable2,newDivSaveItem, newTrLast2)
                        contentContainer.append(tableWrapper); // Menggunakan newTrLast bukan newTr1
                        // tableWrapper2.append(newDivSaveItem)
                        // tableWrapper2.append(newTrLast2)
                        contentContainer.append(tableWrapper2)
                        
                            var selectElement = $('.hscode-import'); // Pilih elemen select
                       
                            
                            selectElement.on('change', function(event) {
                                const selectedValue = event.target.value;
                                const inputElement = document.getElementById('hscode-import-edit'); // Ganti dengan ID yang sesuai
                                if (inputElement) {
                                    inputElement.value = selectedValue;
                                }
                            });
                        
                    });

                },
                error: function(xhr, status, error) {
                    var contentContainer = $('#content-container');
                    contentContainer.empty();
                    console.error('Terjadi kesalahan:', error);
                    
                }
            });
        });
    });
    
    function calculateTotalCBM() {

        var cbm2String = cbm2Array.join(', ');
        var totalCBM2 = cbm2Array.reduce(function(acc, curr) {
            return acc + curr;
        }, 0);
        var tot = parseFloat(cbm1)+parseFloat(totalCBM2);
            $('#total_cbm').text(tot.toFixed(2));     
     
        var TotQuantity_Qty_Qty = qty_qty.reduce(function(acc, curr) {
            return acc + curr;
        }, 0);

        var qty2 = qty_qty2.reduce(function(acc, curr) {
            return acc + curr;
        }, 0);
        var tot_qty = parseFloat(TotQuantity_Qty_Qty)+parseFloat(qty2)
        console.log('qty_qty',tot_qty)
        $('.custom-td').text(tot_qty);    

    }
    function calculatewithouttaxarr(){
                var TotWithout_arr_tax = tot_without_tax_arr.reduce(function(acc, curr) {
                            return acc + curr;
                        }, 0);
               
                var without_arr_tax = without_tax_arr.reduce(function(acc, curr) {
                            return acc + curr;
                        }, 0);
               
                var total_akhir = without_arr_tax+TotWithout_arr_tax + parseFloat(insurance_out)+ parseFloat(freigh_out)
                var element = document.getElementById('custom-tot-price-without-tax-td');
                element.textContent = total_akhir
    }
    function calculatewithouttaxusdarr(){

        var TotWithout_tot_price_without_tax_usd = tot_price_without_tax_usd.reduce(function(acc, curr) {
                            return acc + curr;
        }, 0);
        var without_tot_price_without_tax_usd_import =tot_price_without_tax_usd_import.reduce(function(acc, curr) {
                            return acc + curr;
        }, 0);
        var total_akhir_without_tax_usd = TotWithout_tot_price_without_tax_usd +without_tot_price_without_tax_usd_import+ parseFloat(insurance_out)+ parseFloat(freigh_out)
        var element = document.getElementById('custom-tot-price-without-tax-usd-td');
        element.textContent = total_akhir_without_tax_usd.toFixed(2)
    }
</script>
