

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
                            <input type="checkbox" id="customCodeCheckbox" class="styled customcode" 
                            {{ $Data['msg']['fclcontainer']['mode_admin'] == 1 ? 'checked' : '' }}>
                                <input type="hidden" name="modeadmin_tambah" value="{{ $Data['msg']['fclcontainer']['mode_admin'] }}">
                                <input type="hidden" id="id_fclcontainer" value="{{ $Data['msg']['fclcontainer']['id'] }}">
                            </div>
                        </div>
                    
        </div>

        <div class="row">
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Invoice Number</label>
                <input type="number" 
                       class="form-control" 
                       id="invoice_no_tambah" 
                       name="invoice_no_tambah" 
                       style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" 
                       placeholder="AUTO" 
                       value="{{ $Data['msg']['fclcontainer']['invoice_no'] }}" 
                       {{ $Data['msg']['fclcontainer']['mode_admin'] == 1 ? '' : 'disabled' }}>
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number</label>
                <input type="number" class="form-control" id="contract_no_tambah" name="contract_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" value="{{ $Data['msg']['fclcontainer']['contract_no'] }}" {{$Data['msg']['fclcontainer']['mode_admin']== 1 ? '': 'disabled' }}>
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number</label>
                <input type="number" class="form-control" id="packing_no_tambah" name="packing_no_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" value="{{ $Data['msg']['fclcontainer']['packing_no'] }}" {{$Data['msg']['fclcontainer']['mode_admin']== 1 ? '': 'disabled' }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div style="position: relative; width: 100%; margin-top:10px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Database <span style="color: red;">(Wajib Diisi)</span></label>
                    
                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="database_edit_id" name="database_tambah_name" required>
                        <option value="">Database</option>
                        <option value="PT"{{ $Data['msg']['fclcontainer']['name_db'] == 'PT' ? 'selected' : '' }}>PT</option>
                        <option value="UD"{{ $Data['msg']['fclcontainer']['name_db'] == 'UD' ? 'selected' : '' }}>UD</option>
                    </select>

                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group" style="margin-top:10px;">
                    <label for="startDateTglRequest">Tanggal Transaksi <span style="color: red;">(Wajib Diisi)</span></label>
                    <input type="text" style="height:55px;" class="form-control custom-border" id="tgl_request_edit" name="tgl_request" placeholder= "Pilih Tanggal" value="{{ $Data['msg']['fclcontainer']['date'] }}" required >
                </div>
            </div>
        </div>
            
        <div class="form-group" style="margin-bottom: 20px;margin-top: 10px;">
            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%">Supplier <span style="color: red;">(Wajib Diisi)</span></label>

            <select class="form-control supplier-supplier" id="supplier-edit" name="supplier-edit-name">
                
                
                @foreach($Data['msg']['list_supplier'] as $index => $result)
                    <option value="{{ $result['id'] }}" {{ $Data['msg']['fclcontainer']['id_supplier'] == $result['id']  ? 'selected' : '' }}>{{ $result['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
           
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan  <span style="color: red;">(Wajib Diisi)</span></label>
                    <textarea type="text" class="form-control" id="address_company" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">{{ $Data['msg']['fclcontainer']['address'] }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan  <span style="color: red;">(Wajib Diisi)</span></label>
                    <input type="text" class="form-control" id="city"name="city" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" value="{{ $Data['msg']['fclcontainer']['city'] }}">
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">No. Telp  <span style="color: red;">(Wajib Diisi)</span></label>
                    <input type="number" class="form-control" id="telp" name="telp" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" value="{{ $Data['msg']['fclcontainer']['phone'] }}">
                </div>
            </div>
        </div>

        

</form>

<form action="" class="form-horizontal" id="sendImportForm" method="get">
                    @csrf
                    <div style="margin-top:20px;position: relative; width: 100%;">
                        @php
                            $ascendingIndex = 0;
                            $data = [];
                        @endphp
                        <div id="content-container2"></div>
                        <div id="content-container3"></div>

                            @foreach($Data['msg']['list_comercial_invoice'] as $index => $result)
                            <table id="table-atas2">
                              <input type="hidden" class="form-control custom-border" id="id_penjualanfromchinadetail_{{ $ascendingIndex }}" name="id_detail_name" value="{{$Data['msg']['list_comercial_invoice'][$ascendingIndex]['id'] }}">
                              <input type="hidden" class="form-control custom-border" id="id_penjualanfromchina_{{ $ascendingIndex }}" name="id_barang_name" value="{{ $Data['msg']['list_comercial_invoice'][$ascendingIndex]['id_penjualanfromchina'] }}">
                              <input type="hidden" class="form-control restok-input" id="restok_{{ $ascendingIndex }}" name="id_restok_name" value="">
                                <tr>
                                    <td style="border: 1px solid #696868; color: black;">
                                        <image src="https://maxipro.id/images/barang/{{ $Data['msg']['barang'][$ascendingIndex]['image'] }}" style="width: 350px;height: 320px;">
                                    </td>
                                    <td style="border: 1px solid #696868; color: black; width: 100%;">
                                         <table style="width: 100%;padding-left: 25px; height: 100%;">
                                                <tr style="border: 1px solid #d7d7d7; color: black;">
                                                      <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">{{ $Data['msg']['barang'][$index]['name'] }}</td>
                                                      <input type="hidden" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="name_barang_{{ $ascendingIndex }}" value="{{ $result['name'] }}">
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Chinese Name <br>中文品名</td>
                                                    <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">      
                                                         <input type="text" class="form-control chinese-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="chinese_name_{{ $ascendingIndex }}" name="chinese_name_name" value="{{ $Data['msg']['barang'][$ascendingIndex]['name_china'] }}" disabled>
                                                     </td>
                                                </tr>
                                                <tr>
                                                    <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">English Name <br>英文品名</td>
                                                    <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                         <input class="form-control english-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" type="text" id="english_name_{{ $ascendingIndex }}" value="{{ $result['name_english'] }}" name="english_name_name" disabled>
                                                     </td>
                                                </tr>
                                                <tr>
                                                  <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Model<br>型号</td>
                                                  <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                    <input type="text" class="form-control model-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['barang'][$index]['model'] }}" id="model_name_{{ $ascendingIndex }}" name="model_name" disabled>
                                                  </td>
                                                </tr>

                                                <tr>
                                                      <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Brand<br>品牌</td>
                                                      <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                           <input type="text" class="form-control brand-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['barang'][$ascendingIndex]['merk'] }}" id="brand_name_{{ $ascendingIndex }}" name="brand_name_name" disabled>
                                                       </td>
                                                </tr>
                                                <tr>
                                                      <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">HS Code<br>海关编码</td>


                                                    

                                                     <td style="border: 1px solid #d7d7d7; color: black;">
                                                        <input type="text" class="form-control hs-input" style="width:100%; border: 1px solid #696868; color: black; padding: 10px;" id="hscode-input_{{ $ascendingIndex }}" name="hscode-input-name" value="{{ $result['hs_code'] }}" disabled>
                                                    </td>

                                                </tr>
                                                
                                                <br>
                                         </table>

                                    </td>
                                </tr>
                                <br></br>
                            </table>

                            <table style="width:100%;">
                              <tr>
                                     <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Size(CM) <br>每件尺寸</td>
                                     <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; text-align: center; ">Package Size(CM) <br>每个包装的尺寸</td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Quantity <br>数量</td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Nett Weight <br>(KG) <br>净重 </td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Gross Weight <br>(KG) <br>毛重 </td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">CBM Volume <br>(M3) <br>体积 </td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Unit Price <br> (RMB)</td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Unit Price <br> (USD)</td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Total Price <br> (RMB) </td>
                                     <td colspan="1"rowspan="2" style="border: 1px solid #d7d7d7;color: white; background-color: black; text-align: center; ">Total Price <br>(USD)</td>
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
                                       <input type="text" class="form-control long-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" name="long_{{ $ascendingIndex }}" id="long_{{ $ascendingIndex }}" value="{{ round($result['length_m'] * 100) }}" disabled>
                                   </td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">      
                                       <input type="text" class="form-control width-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " name="width_{{ $ascendingIndex }}" id="width_{{ $ascendingIndex }}" value="{{ round($result['width_m'] * 100) }}" disabled>
                                   </td>
                                   <td style="border: 1px solid #d7d7d7; color: black;">      
                                       <input type="text" class="form-control height-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; "  name="height_{{ $ascendingIndex }}" id="height_{{ $ascendingIndex }}" value="{{ round($result['height_m'] * 100) }}" disabled>
                                   </td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">      
                                        <input type="text" class="form-control long-p-input calculate-cbm" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="long_p_{{ $ascendingIndex }}" value="{{ round($result['length_p'] * 100) }}" disabled>
                                    </td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">      
                                        <input type="text" class="form-control width-p-input calculate-cbm" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="width_p_{{ $ascendingIndex }}" value="{{ round($result['width_p'] * 100) }}" disabled>
                                    </td>
                                    <td style="border: 1px solid #d7d7d7; color: black;">      
                                        <input type="text" class="form-control height-p-input calculate-cbm" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="height_p_{{ $ascendingIndex }}" value="{{ round($result['height_p'] * 100) }}" disabled>
                                    </td>
                                  
                                

                                   <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">   

                                   
                                   <input type="text" class="form-control calculate-cbm total-price-without-tax" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="qty_{{ $ascendingIndex }}" value="{{ $result['qty']}}" disabled>
                                    </td>
                                      <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                       <input type="text" class="form-control nett-weight-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="net_weight_{{ $ascendingIndex }}" value="{{ $result['nett_weight'] }}" disabled>
                                   </td>
                                    <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                       <input type="text" class="form-control gross-weight-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="gross_weight_{{ $ascendingIndex }}" value="{{ $result['gross_weight'] }}" disabled>
                                   </td>
                                    <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                        <input type="text" class="form-control cbm-input" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " id="cbm_{{ $ascendingIndex }}" value="{{ $result['cbm'] }}" disabled>
                                    </td>
                                    <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">
                                        <!-- Unit Price without Tax Input -->
                                        <input type="text" class="form-control total-price-without-tax" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="unit_price_without_tax_{{ $ascendingIndex }}" value="{{ $result['unit_price_without_tax'] }}" disabled>

                                        

                                    </td>
                                     <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                       <input type="text" class="form-control unit-price-usd" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="unit_price_usd_{{ $ascendingIndex }}" value="{{ $result['unit_price_usd'] }}" disabled>
                                   </td>
                                    <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                        <!-- Total Price without Tax Input -->
                                        <input type="text" class="form-control tot-price-without-tax" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="total_price_without_tax_{{ $ascendingIndex }}" value="{{ $result['total_price_without_tax'] }}" disabled>

                                   </td>
                                
                                   <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                     <input type="text" class="form-control total-price-usd" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" id="total_price_usd_{{ $ascendingIndex }}" value="{{ $result['total_price_usd'] }}">
                                   </td>
                                   @php
                                   $tot_without_tax_usd =0;
                                        $tot_without_tax_usd =  $tot_without_tax_usd +$result['total_price_usd'];
                                   @endphp
                                   <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                    <input type="text" class="form-control use-name" style="width: calc(70% - 10px); border: 1px solid #696868; color: black;padding: 10px; display: inline-block; vertical-align: top;" id="use_name_{{ $ascendingIndex }}" value="{{ $result['use_name'] }}" disabled>
                                    <a href="#" class="delete-input" style="color: red; display: inline-block; vertical-align: top; padding: 10px;">X</a>
                                  </td>

                               </tr>
                                
                        </table>

                      
                        
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
                            <div style="margin-top:20px;position: relative; width: 100%;">
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
                                                        <input type="number" class="form-control border-input" id="input_nominal" value="{{ $Data['msg']['fclcontainer']['rate'] }}">
                                                        <input type="hidden" class="form-control border-statusrate" id="input_nominal" value="{{ $Data['msg']['fclcontainer']['status_rate'] }}">
                                                    </div>

                                                    <h5 style="margin-top:10px;">Convert By Google: </h5>
                                                    <ul>

                                                        <li style="font-weight:bold;">{{ $Data['msg']['rmbtousd']['to_money'] }} to {{ $Data['msg']['rmbtousd']['from_money'] }} : {{ $Data['msg']['rmbtousd']['nominal'] }}</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="saveConvert" data-dismiss="modal" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                                
                    </div>
                    <div style="text-align:right;margin-top: 20px;">
                                    
                                    <button type="button" id="convertButton" class="btn btn-primary" style="margin-left: auto;">Convert to USD</button>
                    </div>
                    
</form>



                <div style="padding-left: 1000px;">
                  <table style="width:100%;">
                    <tr>
                      <td style="border: 1px solid #696868; color: black; width: 75%;"> <!-- Menambahkan padding -->
                        Freight Cost
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        <input type="number" class="form-control freight-cost custom-border" id="freight_cost_id_tab" name="freight_cost" value="{{ $Data['msg']['fclcontainer']['freight_cost'] }}">
                      </td>
                    </tr>
                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        Insurance
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        <input type="number" class="form-control insurance-classs custom-border" id="insurance_edit_id_tab" name="insurance" value="{{ $Data['msg']['fclcontainer']['insurance'] }}">
                      </td>
                    </tr>
                  </table>
                </div>
                <div style="padding-left: 1000px; padding-top: 30px;">
                  <table style="width: 100%">
                    <tr>
                      <td colspan="2"style="border: 1px solid #696868; color: black; width: 75%; text-align: center;"> <!-- Menambahkan padding -->
                      <h5>Total</h5>
                      </td>
                      
                    </tr>
                    
                    <tr>
                      <td style="border: 1px solid #696868; color: black; width: 75%;"> <!-- Menambahkan padding -->
                       Quantity
                      </td>
                      <td class="custom-td" id="qty-td"  style="border: 1px solid #696868; color: black;">
                        @php
                            $total_qty=0;
                            $total_cbm=0;
                            $total_price_rmb_td =0;
                            $total_price_usd_td =0;
                        @endphp
                        @foreach($Data['msg']['list_comercial_invoice'] as $index =>$result)
                            @php
                                $total_qty += $result['qty'];
                                $total_cbm += $result['cbm'];
                                $total_price_rmb_td += $result['total_price_without_tax'];
                                $total_price_usd_td += $result['total_price_usd'];
                            @endphp
                        @endforeach
                        {{$total_qty}}
                      </td>
                    </tr>

                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        CBM Volume (M3)
                      </td>
                      <td class="custom-cbm" id="total_cbm" style="border: 1px solid #696868; color: black;">
                       
                        {{$total_cbm}}
                      </td>
                    </tr>

                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        Total Price (RMB)
                      </td>
                      <td style="border: 1px solid #696868; color: black;" id="custom-tot-price-without-tax-td">
                        {{$total_price_rmb_td + $Data['msg']['fclcontainer']['freight_cost'] +  $Data['msg']['fclcontainer']['insurance']}} 
                         
                      </td>
                    </tr>
                    
                    <tr>
                        <td style="border: 1px solid #696868; color: black;">
                            Total Price (USD)
                        </td>
                        <td style="border: 1px solid #696868; color: black;" id="custom-tot-price-without-tax-usd-td">
                            {{$total_price_usd_td + $Data['msg']['fclcontainer']['freight_cost'] +  $Data['msg']['fclcontainer']['insurance']}}
                            
                        </td>
                    </tr>

                  </table>
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
            <div class="col-md-11" style="padding-right: 600px;">
                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control incoterms-edit" id="incoterms-edit-id" name="incoterms_edit">
                        <option value="" {{ $Data['msg']['fclcontainer']['incoterms'] == ''  ? 'selected' : '' }}>Select Incoterms</option>
                        <option value="FOB" {{ $Data['msg']['fclcontainer']['incoterms'] == 'FOB'  ? 'selected' : '' }}>FOB </option>
                        <option value="CIF" {{ $Data['msg']['fclcontainer']['incoterms'] == 'CIF'  ? 'selected' : '' }}>CIF </option>
                        <option value="EXWORK" {{ $Data['msg']['fclcontainer']['incoterms'] == 'EXWORK'  ? 'selected' : '' }}>EXWORK </option>
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
                <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da;padding-left:10px;" id="location_id_tab" name="location_name_tab" value="{{ $Data['msg']['fclcontainer']['location'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['location'] == '' || $Data['msg']['fclcontainer']['location'] === null ? 'Location' : '' }}">
            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 100px; padding-left: 20px;">
    <h4>PAYMENT</h4>
    <hr style="border: none; border-top: 1px solid #000; margin-top: 20px;">
</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px;">

    <div class="row">
        <div id="label-banksupplier" style="padding-top: 30px;" class="col-md-1">
            <label for="kodebaranglabel">Bank Supplier</label>
                        
        </div>
        <div  class="col-md-11" style="padding-right: 600px;padding-top:20px;">
        <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control banksupplier-edit" id="banksupplier-edit-id" name="banksupplier_edit">
                    <option value="0" {{ $Data['msg']['fclcontainer']['id_supplierbank'] == 0  ? 'selected' : '' }}>Pilih Bank Supplier</option>
                    @foreach($Data['msg']['supplierbank'] as $key => $result)
                    @foreach($Data['msg']['matauang'] as $key2 => $result_mt)
                    @if($result['id_matauang']==$result_mt['id'])
                    @php
                        $matauang_kode = $result_mt['kode'];
                        $matauang_simbol = $result_mt['simbol'];
                    @endphp
                    @endif
                    
                    @endforeach
                    <option value="{{ $result['id'] }}" {{ $Data['msg']['fclcontainer']['id_supplierbank'] ==  $result['id'] ? 'selected' : '' }}>({{$matauang_simbol}}) {{ $matauang_kode }} - {{ $result['bank_name'] }}</option>
                    @endforeach

            
            </select>
        </div>
    </div>

</div>

<div class="form-group" style="padding-left: 20px;">

        <div class="row">
            <div id="label-currency" style="padding-top: 30px;" class="col-md-1">
                <label for="currencylabel">Currency</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;padding-top:20px;">
                
            <select class="form-control select2 currency-edit" id="currency-edit-id" name="currency_tambah">
                        <option value="0">Pilih Currency</option>
                        @foreach($Data['msg']['matauang'] as $key => $result)
                        <option value="{{ $result['id'] }}" {{ $Data['msg']['fclcontainer']['id_matauang'] == $result['id'] ? 'selected' : ''  }}>({{$result['simbol']}}) {{ $result['kode'] }} - {{ $result['name'] }}</option>
                        
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


                <input type="text" class="form-control custom-border" id="bank_name_id_tab" name="bank_name_name_tab" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;"  value="{{ $Data['msg']['fclcontainer']['bank_name'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['bank_name'] == '' || $Data['msg']['fclcontainer']['bank_name'] === null ? 'Bank Name' : '' }}">

            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="kodebaranglabel">Bank Address</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;">


                <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="bankAddress_id_tab_edit" name="bankAddress_name_tab_tambah" value="{{ $Data['msg']['fclcontainer']['bank_address'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['bank_address'] == '' || $Data['msg']['fclcontainer']['bank_address'] === null ? 'Bank Address' : '' }}">


            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="kodebaranglabel">Swift Code</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;">


                <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="swiftCode_id_tab_edit" name="swiftCode_name_tab_tambah" value="{{ $Data['msg']['fclcontainer']['swift_code'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['swift_code'] == '' || $Data['msg']['fclcontainer']['swift_code'] === null ? 'Swift Code' : '' }}">

            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="kodebaranglabel">Account No</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;">


                <input type="text" class="form-control custom-border" id="accountNo_id_tab_edit" name="accountNo_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" value="{{ $Data['msg']['fclcontainer']['account_no'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['account_no'] == '' || $Data['msg']['fclcontainer']['account_no'] === null ? 'Account No' : '' }}">

            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="kodebaranglabel">Beneficiary Name</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;">


                <input type="text" class="form-control custom-border" id="beneficiaryName_id_tab_edit" name="beneficiaryName_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;"value="{{ $Data['msg']['fclcontainer']['beneficiary_name'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['beneficiary_name'] == '' || $Data['msg']['fclcontainer']['beneficiary_name'] === null ? 'Beneficiary Name' : '' }}">

            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="kodebaranglabel" style="width: 100%;">Beneficiary Address</label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 600px;">


                <input type="text" class="form-control custom-border" id="beneficiaryAddress_id_tab_edit" name="beneficiaryAddress_name_tab_tambah" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" value="{{ $Data['msg']['fclcontainer']['beneficiary_address'] ?? '' }}" 
                placeholder="{{ $Data['msg']['fclcontainer']['beneficiary_address'] == '' || $Data['msg']['fclcontainer']['beneficiary_address'] === null ? 'Beneficiary Address' : '' }}">

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

<!-- Choices.js JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/fcl-container/fcl-container.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
     $(document).ready(function() {


                // Initial nilai price rmb dan usd
        let total_price_rmb = parseFloat("{{ $total_price_rmb_td }}");
        let total_price_usd = parseFloat("{{ $total_price_usd_td }}");
    
        //untuk mengupdate nilai price rmb dan usd dengan nilai inputan terbaru dari freight_cost dan insurance
        function updateTotals() {
            // Get current freight_cost and insurance values
            let freight_cost = parseFloat($('#freight_cost_id_tab').val()) || 0;
            let insurance = parseFloat($('#insurance_edit_id_tab').val()) || 0;
            
            // Calculate new totals
            let new_total_rmb = total_price_rmb + freight_cost + insurance;
            let new_total_usd = total_price_usd + freight_cost + insurance;
            
            // Update the display in the table cells
            $('#custom-tot-price-without-tax-td').text(new_total_rmb.toFixed(2));
            $('#custom-tot-price-without-tax-usd-td').text(new_total_usd.toFixed(2));
        }

        // mengupdate nilai insuracen dan freight cost dari inputan terbaru
        $('#freight_cost_id_tab, #insurance_edit_id_tab').on('input', function() {
            updateTotals();
        });
    


        
        var valuestatusrate=$('.border-statusrate').val()
        var valueelement = $('.border-input')
        var indexCounter
        var valuerate=$('.border-input').val();
        var array_tot_price_usd =[];
        var array_unit_price_usd =[]
        var td_tot_price_usd = $('#custom-tot-price-without-tax-usd-td').text()
        var input_freight_cost = $('#freight_cost_id_tab').val()
        var input_insurance    = $('#insurance_edit_id_tab').val()
        var new_tot_td_price_usd;
        console.log('valuestatusrate',valuestatusrate)
        console.log('valueelement',valueelement)
        console.log('valuerate',valuerate)
        
        var viewtojson = {!! $jsonData !!}
    


        //untuk mengatur nilai usd bila nilai convert usd berubah
        $('.border-input').on('change', function() {
                    valuerate = $(this).val()
                    valuestatusrate=1
                    indexCounter =0
                    new_tot_td_price_usd=0
                    viewtojson.forEach(function(result,key){
                        
                        var newUnitUsd =  ($('#unit_price_without_tax_'+key).val())/valuerate
                        array_unit_price_usd[key]=newUnitUsd.toFixed(2)
                        $('#unit_price_usd_'+key).val(newUnitUsd.toFixed(2))
                        console.log('array_unit_price_usd',array_unit_price_usd)
                        
                        var newTotUsd=($('#total_price_without_tax_'+key).val())/valuerate
                        array_tot_price_usd[key]=newTotUsd.toFixed(2)
                        $('#total_price_usd_'+key).val(newTotUsd.toFixed(2))
                        console.log('array_tot_price_usd',array_tot_price_usd)
                        new_tot_td_price_usd +=parseFloat(newTotUsd.toFixed(2))
                        $('#custom-tot-price-without-tax-usd-td').text(parseFloat(new_tot_td_price_usd.toFixed(2))+parseFloat(input_freight_cost)+parseFloat(input_insurance))
                        td_tot_price_usd = parseFloat(new_tot_td_price_usd)+parseFloat(input_freight_cost)+parseFloat(input_freight_cost)
                    })
                    
                    console.log('valuerate',valuerate)
        })

        viewtojson.forEach(function(result,key){
            array_tot_price_usd.push($('#total_price_usd_'+key).val())
            array_unit_price_usd.push($('#unit_price_usd_'+key).val())
        })

        $('#convertButton').on('click', function() {
            console.log('masuk')
            $('#myModal').modal('show')
        });

        $('#database_edit_id').select2({
            placeholder: 'Pilih Database',
            allowClear: true,
            width: '100%'
        });
        $('#supplier-edit').select2({
            placeholder: 'Supplier',
            allowClear: true,
            width: '100%'
        });
        $('#incoterms-edit-id').select2({
            placeholder: 'Pilih Incoterms',
            allowClear: true,
            width: '100%'
        });
        $('#banksupplier-edit-id').select2({
            placeholder: 'Pilih Bank Supplier',
            allowClear: true,
            width: '100%'
        });
        $('#currency-edit-id').select2({
            placeholder: 'Pilih Currency',
            allowClear: true,
            width: '100%'
        });

        var selectedSupplier = $('.supplier-supplier')
  
        selectedSupplier.on('change', function(event) {
            const selectedValueSupplier = event.target.value;
            const inputElementSelectedSupplier = document.getElementById('supplier-edit'); // Ganti dengan ID yang sesuai
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
                    
                    
                            //select2
                            //   if (response.filtered_bank_supplier.length == 0) {
                                
                            //       var $select = $('#banksupplier-edit-id'); // Get the raw DOM element
                                
                            //       // Clear existing options
                            //       $select.empty();
                                
                            //       // Add default option
                            //       $select.append('<option value="0">Pilih Bank Supplier</option>');

                            //       // Reinitialize Select2
                            //       $select.select2({
                            //           placeholder: 'Pilih Bank Supplier',
                            //           allowClear: true,
                            //           width: '100%' // Adjust the width if needed
                            //       });

                            //       //mengisi value menjadi string kosong
                            //       $('#bank_name_id_tab').val('');
                            //       $('#bankAddress_id_tab_edit').val('');
                            //       $('#swiftCode_id_tab_edit').val('');
                            //       $('#accountNo_id_tab_edit').val('');
                            //       $('#beneficiaryName_id_tab_edit').val('');
                            //       $('#beneficiaryAddress_id_tab_edit').val('');

                                
                            //       $('#banksupplier-edit-id').next('.select2-container').css('margin-top', '20px'); //mengatur posisi element dari atas
                            //       $('#currency-edit-id').next('.select2-container').css('margin-top', '20px'); // mengatur posisi element dari atas

                            //   }
                            //    else {
                        
                        var $select = $('#banksupplier-edit-id'); // mengambil nilai dari id
                        
                        // menghapus nilai yang sudah ada
                        $select.empty();
                        
                        $('#bank_name_id_tab').val('');
                            $('#bankAddress_id_tab_edit').val('');
                            $('#swiftCode_id_tab_edit').val('');
                            $('#accountNo_id_tab_edit').val('');
                            $('#beneficiaryName_id_tab_edit').val('');
                            $('#beneficiaryAddress_id_tab_edit').val('');

                            
                            $('#banksupplier-edit-id').next('.select2-container').css('margin-top', '20px'); //mengatur posisi element dari atas
                            $('#currency-edit-id').next('.select2-container').css('margin-top', '20px'); // mengatur posisi element dari atas


                        // menambah default option
                        $select.append('<option value="0">Pilih Bank Supplier</option>');
                        var label_banksupplier = $('#label-banksupplier')
                        label_banksupplier.css({
                            'margin-top':'20px',
                        });
                        var label_currency = $('#label-currency')
                        label_currency.css({
                            'margin-top':'20px',
                        });
                        console.log('$select',$select.val())
                        // looping dari response filter bank ke option
                        for (const key2 in response.filtered_bank_supplier) {
                            var bank_supplier = response.filtered_bank_supplier[key2];
                            if (bank_supplier) {
                                console.log('select id', bank_supplier.id);
                                console.log('select', bank_supplier.bank_name);
                                
                                // Create new option element
                                var newOption = $('<option></option>')
                                    .val(bank_supplier.id) // The value for the option
                                    .text(bank_supplier.bank_name); // The label for the option
                                
                                // Append the new option to the select element
                                $select.append(newOption);
                            }
                        }
                        
                        
                            
                        // Handle perubahan select di bank supplier pada bank supplier
                        $('#banksupplier-edit-id').on('change', function() {
                            var selectedId = $(this).val();
                            
                            //   //bila id yang dipilih bank supplier !=0
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
                                                $('#bankAddress_id_tab_edit').val(bank_supplier2.bank_address);
                                                $('#swiftCode_id_tab_edit').val(bank_supplier2.swiftcode);
                                                $('#accountNo_id_tab_edit').val(bank_supplier2.account_number);
                                                $('#beneficiaryName_id_tab_edit').val(bank_supplier2.beneficiary_name);
                                                $('#beneficiaryAddress_id_tab_edit').val(bank_supplier2.beneficiary_address);
                                                var $currencyDropdown = $('#currency-edit-id');
                                                
                                                //mengganti dropdown dengan value id_matauang dari response filterd_bank_supplier
                                                $currencyDropdown.val(bank_supplier2.id_matauang).trigger('change')
                                            }
                                        
                                        
                                    },
                                });
                            }
                            else{
                                //mengisi value menjadi string kosong
                                $('#bank_name_id_tab').val('');
                                $('#bankAddress_id_tab_edit').val('');
                                $('#swiftCode_id_tab_edit').val('');
                                $('#accountNo_id_tab_edit').val('');
                                $('#beneficiaryName_id_tab_edit').val('');
                                $('#beneficiaryAddress_id_tab_edit').val('');

                                var $currencyDropdown = $('#currency-edit-id')
                                $currencyDropdown.val(0).trigger('change');
                            }
                        });
                        
                        $('#banksupplier-edit-id').next('.select2-container').css('margin-top', '20px'); //mengatur posisi element dari atas
                        $('#currency-edit-id').next('.select2-container').css('margin-top', '20px'); // mengatur posisi element dari atas

                            //   }

                    
                    
                }
            })
            
        });      
        $('#submitButtonForm2').on('click',function(){
            var id_penjualanfromchina=[]
            var id_penjualanfromchinadetail=[]
            viewtojson.forEach(function(result,key){
                id_penjualanfromchina.push($('#id_penjualanfromchina_'+key).val())
                id_penjualanfromchinadetail.push($('#id_penjualanfromchinadetail_'+key).val())
            })

            
            console.log('array_tot_price_usd',array_tot_price_usd)
            console.log('array_unit_price_usd',array_unit_price_usd)
            console.log('td_tot_price_usd',td_tot_price_usd)
            var formData = {
                id_fclcontainer:$('#id_fclcontainer').val(),
                id_penjualanfromchina:id_penjualanfromchina,
                id_penjualanfromchinadetail:id_penjualanfromchinadetail,
                database: $('#database_edit_id').val(),
                tgl_request: $('#tgl_request_edit').val(),
                supplier: $('#supplier-edit').val(),
                address_company: $('#address_company').val(),
                city: $('#city').val(),
                telp: $('#telp').val(),
                incoterms_id: $('#incoterms-edit-id').val()||"",
                location_id: $('#location_id_tab').val(),
                banksupplier_id: $('#banksupplier-edit-id').val()||0,
                currency_id: $('#currency-edit-id').val()||0,
                bank_name_id: $('#bank_name_id_tab').val()||"",
                bank_address: $('#bankAddress_id_tab_edit').val()||"",
                swift_code: $('#swiftCode_id_tab_edit').val(),
                account_no: $('#accountNo_id_tab_edit').val(),
                beneficiary_name: $('#beneficiaryName_id_tab_edit').val(),
                beneficiary_address: $('#beneficiaryAddress_id_tab_edit').val(),
                valuerate:valuerate,
                valuestatusrate:valuestatusrate,
                invoice_no: $('#invoice_no_tambah').val(),
                contract_no: $('#contract_no_tambah').val(),
                packing_no: $('#packing_no_tambah').val(),
                modeadmin: $('input[name="modeadmin_tambah"]').val(),
                unit_price_usd:array_unit_price_usd,
                tot_price_usd:array_tot_price_usd,
                total_price_usd:parseFloat(td_tot_price_usd),
                total_insurance: input_insurance,
                total_freight_cost: input_freight_cost
            }
            console.log('formData',formData)
            $.ajax({
                url:'{{ route('admin.pembelian_fcl') }}',
                type:'GET',
                data:{
                    form:formData,
                    menu:'updated_fcl',
                },
                success: function(response){
                        Swal.fire({
                            icon:'success',
                            title:'Success',
                            text:response.msg
                            }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.reload();
                            }
                        })
                },error: function(xhr,status,error){
                        alert('Terjadi kesalahan')
                }
            })
        })
})
</script>