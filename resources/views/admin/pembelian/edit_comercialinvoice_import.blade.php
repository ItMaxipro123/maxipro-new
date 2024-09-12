@extends('admin.templates_asetjs')
@section('link')

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('style')
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
@endsection

@section('content')
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

                    <h6 style="margin-bottom: 10px;"> Comercial Invoice</h4>
                </div>
                <div class="col-md-9" style="text-align: right;">
                <a href="javascript:void(0)"  onclick="importData(event)" name="importButton" class="btn btn-large btn-info btn-edit" style="width: 140px; height: 38px; padding: 9px 10px;">Import Data </a>
                </div>
            </div>
          

            <form action="" class="form-horizontal" id="editForm" method="get">
                @csrf

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
                      <input type="checkbox" id="customCodeCheckbox" class="styled customcode" {{ $Data['msg']['commercialinvoice']['mode_admin'] == '0' ? '' : 'checked' }}>
                      <input type="hidden" name="modeadmin" value="{{ $Data['msg']['commercialinvoice']['mode_admin'] }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div style="position: relative; width: 100%;">
                      <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Invoice Number</label>
                      <input type="number" class="form-control" data-id="{{ $Data['msg']['commercialinvoice']['invoice_no'] }}" name="invoice_no" value="{{ $Data['msg']['commercialinvoice']['invoice_no'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div style="position: relative; width: 100%;">
                      <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number</label>
                      <input type="number" class="form-control" data-id="{{ $Data['msg']['commercialinvoice']['contract_no'] }}" name="contract_no" value="{{ $Data['msg']['commercialinvoice']['contract_no'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div style="position: relative; width: 100%;">
                      <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number</label>
                      <input type="number" class="form-control" data-id="{{ $Data['msg']['commercialinvoice']['packing_no'] }}" name="packing_no" value="{{ $Data['msg']['commercialinvoice']['packing_no'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" disabled>
                    </div>
                  </div>
                </div>

                 <div class="form-group" style="margin-bottom: 20px;margin-top: 10px;">
                        <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%">Supplier</label>

                        <select class="select select2 select-search form-control" id="product-supplier-edit-filter" name="edit_supplier">
                         <option value="supplier_option">Supplier</option>
                         @foreach($Data['msg']['supplier'] as $index => $supplier)
                         <option value="{{ $supplier['id'] }}" {{ $Data['msg']['commercialinvoice']['id_supplier'] == $supplier['id'] ? 'selected' : ''}} >{{ $supplier['name'] }}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="row">
                      <div class="col-md-4">
                               <div style="position: relative; width: 100%;">
                                <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%;width: 100%" for="">Nama Perusahaan</label>
                                <input type="text" class="form-control" data-id="{{ $Data['msg']['supplier'][0]['company'] }}" name="company" value="{{ $Data['msg']['supplier'][0]['company'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div style="position: relative; width: 100%;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan</label>
                            <textarea type="text" class="form-control" data-id="{{ $Data['msg']['supplier'][0]['address'] }}" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">{{ $Data['msg']['supplier'][0]['address'] }}</textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div style="position: relative; width: 100%;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan</label>
                            <input type="text" class="form-control" data-id="{{ $Data['msg']['supplier'][0]['city'] }}" name="city" value="{{ $Data['msg']['supplier'][0]['city'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                        </div>
                      </div>
                 </div>
                
             
               
                
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                    <input type="number" class="form-control" data-id="{{ $Data['msg']['supplier'][0]['telp'] }}" name="telp" value="{{ $Data['msg']['supplier'][0]['telp'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 32%">
                </div>
                <div style="margin-top:20px;position: relative; width: 100%;">

                     @if(!empty($DataImport))
                     <!-- 2 tabel dibawah untuk menampilkan barang yang diimportkan -->

                        <table>
                            <tr>
                                @foreach($DataImport['msg']['orderpembelian'] as $index => $result1)
                               
                                <td style="border: 1px solid #696868; color: black;">
                                    {{ $result1['status'] }}
                                </td>
                               
                               @endforeach
                            </tr>

                        </table>
                      
                      
                     
                      <!-- 2 tabel dibawah menampilkan barang yang sudah ditambahkan di add comercial invoice -->

                        <table>
                            <tr>
                                <td style="border: 1px solid #696868; color: black;">
                                    <image src="{{ $Data['msg']['barang'][0]['image'] }}" style="width: 350px;height: 320px;">
                                </td>
                                <td style="border: 1px solid #696868; color: black; width: 100%;">
                                     <table style="width: 100%;padding-left: 25px; height: 100%;">
                                            <tr style="border: 1px solid #d7d7d7; color: black;">
                                                  <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">{{ $Data['msg']['barang'][0]['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Chinese Name <br>中文品名</td>
                                                <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">      
                                                     <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $Data['msg']['hscodehistory'][0]['name'] }}">
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">English Name <br>英文品名</td>
                                                <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                     <input class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" type="text" value="{{ $Data['msg']['hscodehistory'][0]['name_english'] }}">
                                                 </td>
                                            </tr>
                                            <tr>
                                              <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Model<br>型号</td>
                                              <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['hscodehistory'][0]['model'] }}">
                                              </td>
                                            </tr>
                                            <tr>
                                                  <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Brand<br>品牌</td>
                                                  <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                       <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['hscodehistory'][0]['brand'] }}">
                                                   </td>
                                            </tr>
                                            <tr>
                                                  <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">HS Code<br>海关编码</td>


                                                <td style="border: 1px solid #d7d7d7; color: black;">
                                                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="hscode-edit-filter" name="edit_supplier">
                                                        <option value="">Pilih Hs Code</option>
                                                        @foreach($Data['msg']['hscodehistory'] as $index => $hscode)
                                                        @php
                                                        \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                                        $formattedDate = \Carbon\Carbon::parse($hscode['commercialinvoice']['date'])->translatedFormat('d F Y');
                                                        @endphp
                                                        <option value="{{ $hscode['hs_code'] }}">{{ $hscode['hs_code'] }} - {{ $formattedDate }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                 <td style="border: 1px solid #d7d7d7; color: black;">
                                                    <input type="text" class="form-control" style="width:100%; border: 1px solid #696868; color: black; padding: 10px;" id="hscode-input" value="">
                                                </td>

                                            </tr>
                                     </table>

                                </td>
                            </tr>

                        </table>
                      
                      <table>
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
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['long'] * 100) }}">
                               </td>
                                <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['width'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['height'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['long_p'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['width_p'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['height_p'] * 100) }}">
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
                                                if ($id == $hscode['id_penjualanfromchina']) {
                                                    $qty += $hscode['qty']; // Menambahkan qty jika id cocok
                                                    $net_weight += $hscode['nett_weight'];
                                                    $gross_weight += $hscode['gross_weight'];
                                                    $cbm += $hscode['cbm'];
                                                    $unit_price_without_tax += $hscode['unit_price_without_tax'];
                                                    $total_price_without_tax += $hscode['total_price_without_tax'];
                                                    $unit_price_usd = $hscode['unit_price_usd'];
                                                    $total_price_usd = $hscode['total_price_usd'];
                                                    $use_name = $hscode['use_name'];
                                                }
                                            }
                                @endphp

                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">   

                                    <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $qty }}">
                                </td>
                                  <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $net_weight }}">
                               </td>
                                <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $gross_weight }}">
                               </td>
                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $cbm }}">
                               </td>
                                <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">
                                    <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $unit_price_without_tax }}">
                                     <select style="border: 1px solid #696868; color: black; padding: 10px;" id="edit-unit-price-without-tax" name="edit_unit_price_without_tax">
                                      <option value="" style="display:none;">&#xf078; Show More</option>
                                      @foreach($Data['msg']['hscodehistory'] as $index => $hscode)
                                      @php
                                      \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                      $formattedDate = \Carbon\Carbon::parse($hscode['commercialinvoice']['date'])->translatedFormat('d F Y');
                                      @endphp
                                      <option value="" >{{ $Data['msg']['penjualanfromchina'][0]['matauang']['simbol'] }} {{ $hscode['unit_price_without_tax'] }} - {{ $formattedDate }}</option>
                                      @endforeach
                                    </select>

                                </td>
                                 <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $unit_price_usd }}">
                               </td>
                                <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $total_price_without_tax }}">
                               </td>
                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                 <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $total_price_usd }}">
                               </td>
                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                <input type="text" class="form-control" style="width: calc(70% - 10px); border: 1px solid #696868; color: black;padding: 10px; display: inline-block; vertical-align: top;" value="{{ $use_name }}">
                                <a href="#" class="delete-input" style="color: red; display: inline-block; vertical-align: top; padding: 10px;">X</a>
                              </td>

                           </tr>
                            
                      </table>
                    @else
                      <table>
                            <tr>
                                <td style="border: 1px solid #696868; color: black;">
                                    <image src="{{ $Data['msg']['barang'][0]['image'] }}" style="width: 350px;height: 320px;">
                                </td>
                                <td style="border: 1px solid #696868; color: black; width: 100%;">
                                     <table style="width: 100%;padding-left: 25px; height: 100%;">
                                            <tr style="border: 1px solid #d7d7d7; color: black;">
                                                  <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">{{ $Data['msg']['barang'][0]['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Chinese Name <br>中文品名</td>
                                                <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">      
                                                     <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $Data['msg']['hscodehistory'][0]['name'] }}">
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">English Name <br>英文品名</td>
                                                <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                     <input class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" type="text" value="{{ $Data['msg']['hscodehistory'][0]['name_english'] }}">
                                                 </td>
                                            </tr>
                                            <tr>
                                              <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Model<br>型号</td>
                                              <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['hscodehistory'][0]['model'] }}">
                                              </td>
                                            </tr>
                                            <tr>
                                                  <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Brand<br>品牌</td>
                                                  <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                       <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" value="{{ $Data['msg']['hscodehistory'][0]['brand'] }}">
                                                   </td>
                                            </tr>
                                            <tr>
                                                  <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">HS Code<br>海关编码</td>


                                                <td style="border: 1px solid #d7d7d7; color: black;">
                                                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="hscode-edit-filter" name="edit_supplier">
                                                        <option value="">Pilih Hs Code</option>
                                                        @foreach($Data['msg']['hscodehistory'] as $index => $hscode)
                                                        @php
                                                        \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                                        $formattedDate = \Carbon\Carbon::parse($hscode['commercialinvoice']['date'])->translatedFormat('d F Y');
                                                        @endphp
                                                        <option value="{{ $hscode['hs_code'] }}">{{ $hscode['hs_code'] }} - {{ $formattedDate }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                 <td style="border: 1px solid #d7d7d7; color: black;">
                                                    <input type="text" class="form-control" style="width:100%; border: 1px solid #696868; color: black; padding: 10px;" id="hscode-input" value="">
                                                </td>

                                            </tr>
                                     </table>

                                </td>
                            </tr>

                      </table>
                      
                      <table>
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
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['long'] * 100) }}">
                               </td>
                                <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['width'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['height'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['long_p'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['width_p'] * 100) }}">
                               </td>
                               <td style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ round($Data['msg']['barang'][0]['height_p'] * 100) }}">
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
                                                if ($id == $hscode['id_penjualanfromchina']) {
                                                    $qty += $hscode['qty']; // Menambahkan qty jika id cocok
                                                    $net_weight += $hscode['nett_weight'];
                                                    $gross_weight += $hscode['gross_weight'];
                                                    $cbm += $hscode['cbm'];
                                                    $unit_price_without_tax += $hscode['unit_price_without_tax'];
                                                    $total_price_without_tax += $hscode['total_price_without_tax'];
                                                    $unit_price_usd = $hscode['unit_price_usd'];
                                                    $total_price_usd = $hscode['total_price_usd'];
                                                    $use_name = $hscode['use_name'];
                                                }
                                            }
                                @endphp

                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">   

                                    <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $qty }}">
                                </td>
                                  <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $net_weight }}">
                               </td>
                                <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $gross_weight }}">
                               </td>
                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $cbm }}">
                               </td>
                                <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">
                                    <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $unit_price_without_tax }}">
                                     <select style="border: 1px solid #696868; color: black; padding: 10px;" id="edit-unit-price-without-tax" name="edit_unit_price_without_tax">
                                      <option value="" style="display:none;">&#xf078; Show More</option>
                                      @foreach($Data['msg']['hscodehistory'] as $index => $hscode)
                                      @php
                                      \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                      $formattedDate = \Carbon\Carbon::parse($hscode['commercialinvoice']['date'])->translatedFormat('d F Y');
                                      @endphp
                                      <option value="" >{{ $Data['msg']['penjualanfromchina'][0]['matauang']['simbol'] }} {{ $hscode['unit_price_without_tax'] }} - {{ $formattedDate }}</option>
                                      @endforeach
                                    </select>

                                </td>
                                 <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $unit_price_usd }}">
                               </td>
                                <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                   <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $total_price_without_tax }}">
                               </td>
                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                 <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; " value="{{ $total_price_usd }}">
                               </td>
                               <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                <input type="text" class="form-control" style="width: calc(70% - 10px); border: 1px solid #696868; color: black;padding: 10px; display: inline-block; vertical-align: top;" value="{{ $use_name }}">
                                <a href="#" class="delete-input" style="color: red; display: inline-block; vertical-align: top; padding: 10px;">X</a>
                              </td>

                           </tr>
                            
                      </table>
                    @endif
                     
                      
                      
                      
                </div>
                <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                    <button type="button" id="submitButton" class="btn btn-primary" style="margin-left: auto;">Simpan Item</button>
                </div>

            </form>

           
              <form action="" class="form-horizontal" id="editForm2" method="get">
                @csrf
                <div style="padding-left: 1000px;">
                  <table>
                    <tr>
                      <td style="border: 1px solid #696868; color: black; width: 75%;"> <!-- Menambahkan padding -->
                        Freight Cost
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        <input type="text" class="form-control custom-border" id="freight_cost_id_tab" name="freight_cost_name_tab" value="{{ $Data['msg']['commercialinvoice']['freight_cost'] }}">
                      </td>
                    </tr>
                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        Insurance
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        <input type="text" class="form-control custom-border" id="insurance_edit_id_tab" name="insurance_edit_name_tab" value="{{ $Data['msg']['commercialinvoice']['insurance'] }}">
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
                      <td style="border: 1px solid #696868; color: black;">
                        {{ $qty }}
                        
                      </td>
                    </tr>

                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        CBM Volume (M3)
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        {{ $cbm }}
                        
                      </td>
                    </tr>

                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        Total Price Without Tax
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        {{ $total_price_without_tax }}
                        
                      </td>
                    </tr>
                    
                    <tr>
                        <td style="border: 1px solid #696868; color: black;">
                            Total Price USD
                        </td>
                        <td style="border: 1px solid #696868; color: black;">
                          {{ $total_price_usd }}
                            
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
                             <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="incoterms-edit-id" name="incoterms_edit">
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
                        <div class="col-md-11" style="padding-right: 600px;">
                             <input type="text" class="form-control custom-border" id="location_id_tab" name="location_name_tab" placeholder="Location">
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
                             <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="banksupplier-edit-id" name="banksupplier_edit">
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
                        <div class="col-md-11" style="padding-right: 600px;">
                             <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="currency-edit-id" name="currency_edit">
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
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="bank_name_id_tab" name="bank_name_name_tab" value="{{ $bankName ?: '' }}" placeholder="{{ $bankName ?: 'Bank Name' }}">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Bank Address</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="bankAddress_id_tab" name="bankAddress_name_tab" value="{{ $bankAddress ?: '' }}" placeholder="{{ $bankAddress ?: 'Bank Address' }}">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Swift Code</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="swiftCode_id_tab" name="swiftCode_name_tab" value="{{ $swiftCode ?: '' }}" placeholder="{{ $swiftCode ?: 'Swift Code' }}">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Account No</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="accountNo_id_tab" name="accountNo_name_tab" value="{{ $accountNo ?: '' }}" placeholder="{{ $accountNo ?: 'Account No' }}">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Beneficiary Name</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="beneficiaryName_id_tab" name="beneficiaryName_name_tab" value="{{ $beneficiaryName ?: '' }}" placeholder="{{ $beneficiaryName ?: 'Beneficiary Name' }}">

                        </div>
                    </div>
                    
                </div>

                  <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Beneficiary Address</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="beneficiaryAddress_id_tab" name="beneficiaryAddress_name_tab" value="{{ $beneficiaryAddress ?: '' }}" placeholder="{{ $beneficiaryAddress ?: 'Beneficiary Address' }}">

                        </div>
                    </div>
                    
                </div>
                     <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                    <button type="button" id="submitButtonForm2" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
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
                     @foreach($Data['msg']['commercialinvoice']['detail'] as $key => $result)
                        @php
                            $totalQty = 0;
                              $id_penjualanfromchina = null;
                        @endphp

                        @foreach($Data['msg']['packinglist'] as $packingList)
                            @php
                                $sumQtyPacking = 0;
                            @endphp

                            @foreach($packingList['detail'] as $detail)
                                @if($result['id'] == $detail['id_penjualanfromchinadetail'])
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
                            {{ $result['name_english'] }}
                        </td>
                        <td style="padding-left:20px;border: 1px solid #696868; color: black;" data-id="{{ $result['id'] }}" data-nilai="{{ $result['qty'] }}">
                            {{ $result['qty'] - $totalQty}} 
                        </td>
                    </tr>
                       @endforeach


               </table>
               
                      
               
                
            </form>
               @php
                   $totalPacking =0;
                   $indexSelect = 0;
                   $indexqty=0;
                  @endphp
                  @if($Data['msg']['packinglist'] && count($Data['msg']['packinglist']) > 0)
                       <div class="tab-pane fade show" id="packing_list2"style="margin-top: 20px;">
                          <div  id="newInputContainer2" style="padding-top: 20px;">
                              @foreach($Data['msg']['packinglist'] as $index => $packing)
                                @php
                                $totalPacking +=1;
                                @endphp
                                

                                  @if($index+1 < 2)
                                  <div style="padding-top: 10px;" class="col-md-6">


                                    <label for="kodebaranglabel">Packing {{ $index+1 }}</label>
                                    <!-- untuk number_packing -->
                                    <input type="hidden" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px; " name="id_packingList" value="{{ $result['id_penjualanfromchina'] }}">

                                    <input type="hidden" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;" name="number_packing_edit[]" value="{{ $index }}">
                                 </div>
                                  <div class="row">
                                   <div class="col-md-6">
                                   <input type="text" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;width: 100%" name="name_packing_edit[]" value="{{ $packing['name'] }}">
                                 </div>
                                 <div class="col-md-6">
                                       <button type="button" class="btn btn-warning" >Tidak Bisa Delete {{ $index+1 }}</button>
                                 </div>
                                   
                                 </div>
                                  @else
                                  <div class="packing-group">
                                                <div style="padding-top: 10px;" class="col-md-6">


                                                        <label for="kodebaranglabel">Packing {{ $index+1 }}</label>
                                                        <!-- untuk number_packing -->
                                                    
                                                        <input type="hidden" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;" name="number_packing_edit[]" value="{{ $index }}">
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                        <input type="text" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;width: 100%" name="name_packing_edit[]" value="{{ $packing['name'] }}">   
                                                        </div>
                                                        <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger"  onclick="deletePacking(this, {{ $index }})" >Delete {{ $index+1 }}</button>
                                                        </div>
                                                </div>
                                 </div>
                                      
                                  @endif
                                 
                                    <br>

                                    <div id="packingDetails{{ $index }}">
                                      @foreach($packing['detail'] as $detailIndex => $detail)
                                      <div class="row" id="detailRow{{ $index }}{{ $detailIndex }}">

                                        <div class="col-md-4">


                                          @foreach($Data['msg']['commercialinvoice']['detail'] as $key => $result)
                                          @php
                                          $totalQty = 0;
                                          @endphp

                                          @foreach($Data['msg']['packinglist'] as $packingList)
                                          @php
                                          $sumQtyPacking = 0;
                                          @endphp

                                          @foreach($packingList['detail'] as $detail)
                                          @if($result['id'] == $detail['id_penjualanfromchinadetail'])
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
                                         <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="id_itempacking" name="itempacking_edit[]">
                                           <option value="0">Pilih Item</option>

                                            
                                           <option value="{{$result['id']}}" {{$result['id_penjualanfromchina'] == $packingList['id_penjualanfromchina'] ? 'selected' : ''}}> {{$result['name_english']}}</option>

                                         </select>
                                        </div>
                                        <div class="col-md-4">
                                         
                                               <input type="text" id="qtylabel{{ $index }}{{ $detailIndex }}" class="form-control" style="border: 1px solid #696868; color: black; padding-left: 10px;" name="qtyitempacking[{{ $index }}][{{ $detailIndex }}]" value="{{ $Data['msg']['packinglist'][$index]['detail'][$detailIndex]['qty'] }}">
                                        </div>
                                      <div class="col-md-4">
                                        @if($index+1 ==1 && $detailIndex < 1)
                                        <button type="button" class="btn btn-warning" >Tidak Bisa Delete</button>
                                        @else
                                         <button type="button" class="btn btn-danger" onclick="removeDetailRow({{ $index }}, {{ $detailIndex }})">del</button>
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
                                </div>
                              @endforeach
                          </div>
                        </div>
                    @php
                          $totalQtyArray[] = [
                              'sequenceNumber' => $totalPacking,
                              'totalQty' => $totalQty,
                              'name_english' =>  $result['name_english'],
                              'id' =>  $result['id'],
                              'id_penjualanfromchina' => $result['id_penjualanfromchina'],
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
                          'id_penjualanfromchina' => $result['id_penjualanfromchina'],
                          
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
                            $number++;
                            @endphp
                            <form action="" class="form-horizontal" id="importBarang" method="get">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $Data['msg']['idcommercial'] }}" >
                                <tr>
                                    <td style="border: 1px solid #d7d7d7; color: black; text-align: center;">
                                    
                                        <input type="checkbox" class="kubik-checkbox" name="checkbox_{{ $number }}" >
                                        <input type="hidden" name="number_{{ $number }}" value="{{ $result['id'] }}">
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
                            <div style="text-align:right;">
                                    
                                    <button type="button" id="sendData" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function importData(event) {
            event.preventDefault();
            console.log('masuk modal import');
            $('#importModal').modal('show'); // Tampilkan modal
    }
    function deletePacking(button, index) {
        // Find the parent row of the clicked button
        // var row = button.closest('.row');
        // // Remove the row from the DOM
        // row.parentNode.removeChild(row);
        var packingGroup = button.closest('.packing-group');
        if (packingGroup) {
            packingGroup.remove();
        }
          // Remove the button with id 'button_tambah_' + index
        var addButton = document.getElementById('button_tambah_' + index);
        if (addButton) {
            addButton.remove();
        }
    }


    $('#sendData').click(function(event) {
        event.preventDefault();

        var selectedCheckboxes = $('.kubik-checkbox:checked');
        var formData = {
            id_product: $('input[name=id_product]').val(),
            idrestok: []
        };

        selectedCheckboxes.each(function(index) {
            var hiddenInputValue = $(this).next('input[type="hidden"]').val();
            formData.idrestok.push(hiddenInputValue);
        });

        if (formData.idrestok.length > 0 && !formData.idrestok[0]) {
            formData.idrestok.shift();
        }

        console.log('formData', formData);

        // Mengirim permintaan AJAX
        $.ajax({
            type: 'GET',
            url: '{{ route('admin.pembelian_editview_comercial_invoice') }}',
            data: formData,
            success: function(response) {
                console.log('Data berhasil dikirim:', response);
                // Lakukan sesuatu setelah data berhasil dikirim
                window.location.href = '{{ route('admin.pembelian_editview_comercial_invoice') }}';
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });



</script>
<script>
 
    @if(isset($totalQtyJson) && $totalQtyJson)
      var totalQtyData = <?php echo $totalQtyJson ? $totalQtyJson : 'null'; ?>;

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
      console.log('sequence',totalQtyData);
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

   

   //untuk mengaktifkan checkbox agar dapat mencustom nomor invoice
   document.getElementById('customCodeCheckbox').addEventListener('click', function() {
      const modeadminInput = document.querySelector('input[name="modeadmin"]');
      const invoiceInput = document.querySelector('input[name="invoice_no"]');
      const contractInput = document.querySelector('input[name="contract_no"]');
      const packingInput = document.querySelector('input[name="packing_no"]');

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
</script>


<script>

    
var inputArray2 = []; // Membuat array untuk menyimpan referensi ke setiap input yang dibuat
var inputArray3 = 0;
var inputArray = []; // Membuat array untuk menyimpan referensi ke setiap input yang dibuat
 var totalSum =0;

 //untuk menambahkan  inputan baru dan melanjutkan packing list yang sudah ada
function addNewInput() {
    console.log('masuk sini');
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
    // newInput.value = inputArray.length; // Placeholder
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
    console.log('total',totalValue)
    totalSum= index_number_pack2.reduce(function(accumulator,currentValue) {
        console.log('accumulator',accumulator)
        console.log('currentValue',currentValue)
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
        
        deleteButton.innerText = 'X';
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
            
             //packinglist ketika sudah ada
            if(packingDetails){
                console.log('packingDetails',packingDetails);
                var newDetailIndex = packingDetails.children.length / 2; // Calculate new detail index based on existing rows and <br> tags
                console.log('newDetailIndex',newDetailIndex);
                
                var newRow = document.createElement('div');
                newRow.className = 'row';
                newRow.id = 'detailRow' + indexSelect + newDetailIndex;

                var newCol = document.createElement('div');
                newCol.className = 'col-md-4';
                newCol.style.width='180px';

                var newSelect = document.createElement('select');
                newSelect.className = 'form-control';
                newSelect.style = 'border: 1px solid #696868; color: red; padding-left: 10px;';
                newSelect.id = 'selectPackingDetails2' + indexSelect + newDetailIndex;
                

                newSelect.name = 'itempacking_edit[]';
                
                // Add default "Pilih Item" option
                var defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Pilih Item 1';
                defaultOption.selected = true;
                defaultOption.disabled = true;
                newSelect.appendChild(defaultOption);

                // Add options to the select element
                totalQtyData.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.name_english;
                    if (item.id_penjualanfromchina == item.id_penjualanfromchina_list) {
                        option.selected = true;
                    }
                    newSelect.appendChild(option);
                });

                    newCol.appendChild(newSelect);
                    var newInput2 = document.createElement('input');
                            
                    // Hitung nilai totalSum2 saat ini
                    var totalSum2 = totalSum - 1;
                    console.log('totalSum',totalSum2);
                    
                    console.log('inputArray',inputArray.length);
                    console.log('inputArray3', inputArray3);
                    newInput2.type = 'text';
                    newInput2.className = 'form-control custom-input';
                    newInput2.style.border = '1px solid #696868';
                    newInput2.style.width = '15.4%';
                    newInput2.style.marginLeft = '24px'; // Menambahkan padding kiri
                    newInput2.id = 'qtyitempacking' + inputArray2.length;
                    // console.log('inputArray.lengt', inputArray.length);
                    if(inputArray.length == inputArray3){
                        
                        newInput2.name = 'qtyitempacking'+'['+(totalSum2)+']'+'['+ (inputArray2.length)+']';
                    }
                    else{
                        var set_array = inputArray2.length = 0;
                        newInput2.name = 'qtyitempacking'+'['+(totalSum2)+']'+'['+ (set_array)+']';
                    }

                    

                    // Menambahkan efek placeholder dengan padding kiri
                    newInput2.placeholder = 'Qty2'; // Placeholder
                    newInput2.addEventListener('focus', function() {
                        if (this.value.trim() === 'Qty') {
                            this.value = ''; // Hapus placeholder saat input mendapat fokus
                            this.style.paddingLeft = '20px'; // Tetapkan kembali padding-left jika kosong
                        }
                    });
                    newInput2.addEventListener('blur', function() {
                        if (this.value.trim() === '') {
                            this.value = 'Qty'; // Kembalikan placeholder saat input kehilangan fokus
                            this.style.paddingLeft = '20px'; // Tetapkan kembali padding-left jika kosong
                        }
                    });
                    var divContainer2 = document.createElement('div');
                    // Posisikan elemen dalam satu baris
                    divContainer2.style.display = 'flex';
                    divContainer2.style.alignItems = 'center'; // Posisikan elemen dalam satu baris
                    divContainer2.style.paddingTop = '12px'; // Tambahkan padding
                    divContainer2.id ='container2-id';
                    // Tambahkan elemen input baru ke dalam array
                    inputArray2.push(newInput2);
                    var deleteButtonBawah = document.createElement('button');
                    deleteButtonBawah.innerText = 'X';
                    deleteButtonBawah.className = 'btn btn-danger';
                    deleteButtonBawah.style.marginLeft = '15px';
                    deleteButtonBawah.style.marginTop = '12px';
                    deleteButtonBawah.type = 'button';
                    deleteButtonBawah.id = 'delete_id_bawah';
                    deleteButtonBawah.addEventListener('click', function() {
                    
                    var deleteButtonBawahlToRemove = document.getElementById('container2-id');
                    deleteButtonBawahlToRemove.parentNode.removeChild(deleteButtonBawahlToRemove);

                
                    });
                    divContainer2.appendChild(newCol);
                    divContainer2.appendChild(newInput2);
                    divContainer2.appendChild(deleteButtonBawah);
            

                    // Initialize Choices.js on the newly created select element
                    var choices = new Choices(newSelect, {
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

                    var dropdownStyle = document.createElement('style');
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
                // Tambahkan elemen input baru ke dalam divContainer
                document.getElementById('newInputContainer').insertBefore(divContainer2, addButtonDiv);
                
            }
            
            // //ketika belum ada packinglist
            // else{
            //     console.log('tidak ada child');
                
            //     // var deleteButton = document.createElement('button');
            //     // deleteButton.innerText = 'X';
            //     // deleteButton.className = 'btn btn-danger';
            //     // deleteButton.style.marginLeft = '15px';
            //     // deleteButton.style.marginTop = '10px';
            //     // deleteButton.type = 'button';
            //     // deleteButton.id = 'delete_id';
            //     // var divContainer = document.createElement('div');
            //     // divContainer.style.display = 'flex';
            //     // divContainer.style.alignItems = 'center'; // Posisikan elemen dalam satu baris
            //     // divContainer.appendChild(deleteButton);
            //     // document.getElementById('newInputContainer').appendChild(divContainer);

            //     var newRow = document.createElement('div');
            //     newRow.className = 'row';
            //     newRow.id = 'detailRow';

            //     var newCol = document.createElement('div');
            //     newCol.className = 'col-md-4';
            //     newCol.style.width='180px';

            //     var newSelect = document.createElement('select');
            //     newSelect.className = 'form-control';
            //     newSelect.style = 'border: 1px solid #696868; color: red; padding-left: 10px;';
            //     newSelect.id = 'selectPackingDetails2' ;
            //     newSelect.name='itempacking_edit';
            //     // Add default "Pilih Item" option
            //     var defaultOption = document.createElement('option');
            //     defaultOption.value = '';
            //     defaultOption.text = 'Pilih Item';
            //     defaultOption.selected = true;
            //     defaultOption.disabled = true;
            //     newSelect.appendChild(defaultOption);

            //     // Add options to the select element
            //     totalQtyData.forEach(function(item) {
            //         var option = document.createElement('option');
            //         option.value = item.id;
            //         option.text = item.name_english;
            //         if (item.id_penjualanfromchina == item.id_penjualanfromchina_list) {
            //             option.selected = true;
            //         }
            //         newSelect.appendChild(option);
            //     });

            //             newCol.appendChild(newSelect);
            //             var newInput2 = document.createElement('input');
                                
            //             // Hitung nilai totalSum2 saat ini
            //             var totalSum2 = totalSum - 1;

            //             console.log('totalSum',totalSum2);
                        
            //             // console.log('inputArray',inputArray.length);
            //             // console.log('inputArray3', inputArray3);
            //             newInput2.type = 'text';
            //             newInput2.className = 'form-control custom-input';
            //             newInput2.style.border = '1px solid #696868';
            //             newInput2.style.width = '15.4%';
            //             newInput2.style.marginLeft = '24px'; // Menambahkan padding kiri
            //             // newInput2.id = 'qtyitempacking' + inputArray2.length;
            //             // // console.log('inputArray.lengt', inputArray.length);
            //             if(inputArray.length == inputArray3){
                            
            //                 newInput2.name = 'qtyitempacking'+'['+(totalSum2)+']'+'['+ (inputArray2.length)+']';
            //             }
            //             else{
            //                 var set_array = inputArray2.length = 0;
            //                 newInput2.name = 'qtyitempacking'+'['+(totalSum2)+']'+'['+ (set_array)+']';
            //             }

                    
            //             // console.log('nilai pervieousTotalSum terakhir',previousTotalSum2)

            //             // Menambahkan efek placeholder dengan padding kiri
            //             newInput2.placeholder = 'Qty2'; // Placeholder
            //             newInput2.addEventListener('focus', function() {
            //                 if (this.value.trim() === 'Qty') {
            //                     this.value = ''; // Hapus placeholder saat input mendapat fokus
            //                     this.style.paddingLeft = '20px'; // Tetapkan kembali padding-left jika kosong
            //                 }
            //             });
            //             newInput2.addEventListener('blur', function() {
            //                 if (this.value.trim() === '') {
            //                     this.value = 'Qty'; // Kembalikan placeholder saat input kehilangan fokus
            //                     this.style.paddingLeft = '20px'; // Tetapkan kembali padding-left jika kosong
            //                 }
            //             });
            //             var divContainer2 = document.createElement('div');
            //             // Posisikan elemen dalam satu baris
            //             divContainer2.style.display = 'flex';
            //             divContainer2.style.alignItems = 'center'; // Posisikan elemen dalam satu baris
            //             divContainer2.style.paddingTop = '12px'; // Tambahkan padding
            //             divContainer2.id ='container2-id';
            //             // Tambahkan elemen input baru ke dalam array
            //             inputArray2.push(newInput2);
            //             var deleteButtonBawah = document.createElement('button');
            //             deleteButtonBawah.innerText = 'X';
            //             deleteButtonBawah.className = 'btn btn-danger';
            //             deleteButtonBawah.style.marginLeft = '15px';
            //             deleteButtonBawah.style.marginTop = '12px';
            //             deleteButtonBawah.type = 'button';
            //             deleteButtonBawah.id = 'delete_id_bawah';
            //             deleteButtonBawah.addEventListener('click', function() {
                        
            //             var deleteButtonBawahlToRemove = document.getElementById('container2-id');
            //             deleteButtonBawahlToRemove.parentNode.removeChild(deleteButtonBawahlToRemove);

                
            //             });

            //             divContainer2.appendChild(newCol);
            //             divContainer2.appendChild(newInput2);
            //             divContainer2.appendChild(deleteButtonBawah);
                

            //             // Initialize Choices.js on the newly created select element
            //             var choices = new Choices(newSelect, {
            //                 searchEnabled: true,
            //                 itemSelectText: '',
            //                 classNames: {
            //                     containerInner: 'form-control with-border',
            //                     input: 'form-control',
            //                     inputCloned: 'form-control',
            //                     list: 'form-control',
            //                     listItems: 'form-control',
            //                     dropdown: 'choices-dropdown-border', // Add CSS class for dropdown
            //                 },
            //                 searchFields: ['label'],
            //                 shouldSort: false,
            //             });

            //             var dropdownStyle = document.createElement('style');
            //             dropdownStyle.innerHTML = `
            //                 .choices .choices__list--dropdown {
            //                     border: 1px solid #696868;
            //                     z-index: 999; /* Set dropdown z-index */
            //                     background-color: white; /* Set background color */
            //                 }
            //             `;
            //             document.head.appendChild(dropdownStyle);

            //             // Adjust Choices.js style
            //             newSelect.style.color = 'black';
            //     // Tambahkan elemen input baru ke dalam divContainer
            //     document.getElementById('newInputContainer').insertBefore(divContainer2, addButtonDiv);
            // }
           
    // addNewInput();
    inputArray3= inputArray.length;
    
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
                        deleteButton.innerText = 'X';
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
                        deleteButtonBawah.innerText = 'X';
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
                        newSelect.style = 'border: 1px solid #696868;padding-left: 10px;';
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
                        newInput2.placeholder = 'Qty Item Without Packing';
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


      //untuk membuat select menggunakan choices js
    $(document).ready(function() {
                    
                    // Initialize Choices.js on the select element
                    const element = document.getElementById('hscode-edit-filter');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
                    }
    });
        
      // Initialize Choices.js on the select element
    $(document).ready(function() {
                    
                    // Initialize Choices.js on the select element
                    const element = document.getElementById('incoterms-edit-id');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
                    }
    });
       
       // Initialize Choices.js on the select element
    $(document).ready(function() {
                    
                    // Initialize Choices.js on the select element
                    const element = document.getElementById('banksupplier-edit-id');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
                    }
    });

      // Initialize Choices.js on the select element
    $(document).ready(function() {
                    
                 
                    const element = document.getElementById('currency-edit-id');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
                    }
    });
   
     
    // Initialize Choices.js on the select element
    $(document).ready(function() {
        
        const element = document.getElementById('hscode-edit-filter');
        if (element) {
            const choices = new Choices(element, {
                searchEnabled: true,
                itemSelectText: '',
            });

            // Handle change event of select element
            element.addEventListener('change', function(event) {
                const selectedValue = event.target.value;
                const inputElement = document.getElementById('hscode-input');
                if (inputElement) {
                    inputElement.value = selectedValue;
                }
            });
        }
    });


    //untuk berpindah ke tab
    $(document).ready(function(){
        console.log('tab');
        var packingLists = ['#packing_list', '#packing_list2', '#packing_list3'];
        // Fungsi untuk beralih tab
        $("#form_input_add").hide();
        $("#button_save_add").hide();
        $("#form_input_add2").hide();
        $("#button_save_add2").hide();
        
        function changeTab(tab) {

            if(tab === 'comercial_invoice') {
               console.log('tab commercialinvoice');
                $("#comercial_invoice").show();
                //  packingLists.forEach(function(list) {
                //     $(list).removeClass('show active').css('display', 'none');
                //     // Clear all elements inside each packing list tab
                //     $(list).html('');
                // });
                $("#form_input_add").hide();
                $("#button_save_add").hide();
                $("#form_input_add2").hide();
                $("#button_save_add2").hide();
                // $("#packing_list").addClass('show active').css('display', 'none');
                $("#packing_list").addClass('show active').css('display', 'none');
                $("#packing_list2").addClass('show active').css('display', 'none');
                $("#packing_list3").addClass('show active').css('display', 'none');
                // $("#newInputContainer2").addClass('show active').css('display', 'none');
                $("#newInputContainer2").hide();
                $("#comercial_invoice_tab").addClass('active');
                $("#packing_list_tab").removeClass('active');

            } else if(tab === 'packing_list') {
                $("#form_input_add").show();
                $("#button_save_add").show();
                $("#form_input_add2").show();
                $("#button_save_add2").show();
                $("#newInputContainer2").show();
                $("#packing_list").addClass('show active').css('display', 'block');
                $("#packing_list2").addClass('show active').css('display', 'block');
                $("#packing_list3").addClass('show active').css('display', 'block');
                
                $("#comercial_invoice").hide();
                $("#packing_list_tab").addClass('active');
                $("#comercial_invoice_tab").removeClass('active');
            }
            
        }

        // Event handler saat tab diubah
        $("#comercial_invoice_tab").click(function(){
            changeTab('comercial_invoice');

        });

        $("#packing_list_tab").click(function(){
            changeTab('packing_list');
            
        });
    });
    
    $(document).ready(function() {
                    
                    // Initialize Choices.js on the select element
                    const element = document.getElementById('product-supplier-edit-filter');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
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
                                        location.reload();
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
                                        location.reload();
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
</script>

@endsection
