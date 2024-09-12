@extends('admin.templates_baru')


@section('title')
Commercial Invoice    | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link href="{{ asset('css/comercialinvoice.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
@section('style')

<style>
    /* Gaya untuk elemen overlay */
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Hitam dengan opacity 0.5 */
    z-index: 9999; /* Pastikan lebih tinggi dari elemen lain */
}

    .flatpickr-input {
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 4px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.previous {
        width: auto;
        /* Atur lebar tombol menjadi otomatis */
        padding-right: 0px;
        /* Berikan padding di sisi kanan tombol */

    }

    /* Ganti warna latar belakang tabel */
    #tabe-stok {
        background-color: #f0f0f0;
        /* Ganti dengan warna yang Anda inginkan */

    }
    #tabe-stok {
        border-collapse: collapse; /* Ensure borders collapse */
        width: 100%; /* Set table width to fill its container */
    }

    #tabe-stok th,
    #tabe-stok td {
        padding: 5px; /* Adjust padding as needed */
        border: 1px solid #ddd; /* Add border */
        overflow: auto; /* Enable overflow */
        word-wrap: break-word; /* Wrap long words */
    }


     #tabe-stok-hitung-kubik {
        background-color: #f0f0f0;
        /* Ganti dengan warna yang Anda inginkan */

    }
    #tabe-stok-hitung-kubik {
        border-collapse: collapse; /* Ensure borders collapse */
        width: 100%; /* Set table width to fill its container */
    }

    #tabe-stok-hitung-kubik th,
    #tabe-stok-hitung-kubik td {
        padding: 5px; /* Adjust padding as needed */
        border: 1px solid #ddd; /* Add border */
        overflow: auto; /* Enable overflow */
        word-wrap: break-word; /* Wrap long words */
    }


    .dataTables_filter input[type="search"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        /* Opsional: untuk membuat sudut border melengkung */
        padding: 5px;
        /* Opsional: untuk memberi jarak antara border dan teks */
    }

    

 

    /* Style untuk tombol Delete */
    .btn-delete {
        width: 15%;
        /* Lebar default */
    }

    /* Mengatur lebar tombol saat layar berukuran kecil (misalnya pada perangkat mobile) */
    @media only screen and (max-width: 600px) {
        .btn-delete {
            width: 40%;
            /* Mengisi lebar penuh */
        }
    }

       .color-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-left: 5px;
            margin-bottom: 10px;
            vertical-align: middle;
        }

        .bg-light-yellow {
            background-color:#fff17a; /* Light yellow color */
        }
         .bg-light-blue {
            background-color:#97ebfb; /* Light blue color */
        }
           .bg-light-green {
            background-color: #6cf670; /* Light green color */
        }
          .bg-light-red {
            background-color: #feb3aa; /* Light red color */
        }
         .bg-light-grey {
            background-color: #f4f7f7; /* Light grey color */
        }

        .tooltip-container {
             position: relative;
             display: inline-block;
         }

         .tooltip-container .tooltip-text {
             visibility: hidden;
             width: 120px;
             background-color: black;
             color: #fff;
             text-align: center;
             border-radius: 6px;
             padding: 5px 0;
             position: absolute;
             z-index: 1;
             bottom: 125%; /* Position the tooltip above the button */
             left: 50%;
             margin-left: -60px; /* Center the tooltip */
             opacity: 0;
             transition: opacity 0.3s;
         }

         .tooltip-container:hover .tooltip-text {
             visibility: visible;
             opacity: 1;
         }
</style>

@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Commercial Invoice</h4>
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Commercial Invoice {{ $username['data']['teknisi']['name'] }}</small>
        
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                               <a href="javascript:void(0)" onclick="tambahRestok(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add Commercial Invoice</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="openModalBtn">Filter</button>

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" style="width: 10%; margin-right: 5px;" id="clearFilterBtn">Clear Filter</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Order Pembelian</h5>
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
                                        <!-- <div class="form-group">
                                            <label for="kodebaranglabel">Invoice</label>
                                            <input type="text" class="form-control" placeholder="No Invoice"  id="kode_barang"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                        </div> -->
                                         <div class="form-group">
                                            <label for="namabaranglabel">Nama Perusahaan</label>
                                            <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_barang" id="id_nama_perusahaan"style="border: 1px solid #ced4da; width: 100%; padding-left:22px;">
                                        </div>
                                        

                                    </form>
                                </div>

                                <div class="modal-footer">

                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    <!-- code diatas untuk modal bootstrap 4 -->

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- code diatas untuk modal bootstrap 5 -->

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
                            
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $num }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 70px; text-overflow: ellipsis">{{ $formattedDate }}</td>
                            
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 70px; text-overflow: ellipsis;">INV-{{ $data['invoice_no'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 70px; text-overflow: ellipsis">{{ $data['supplier']['name'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;max-width: 70px; text-overflow: ellipsis">{{ $data['supplier']['company'] }}</td>
                            @php
                                $total        = 0;

                                $total_usd    = 0;

                                foreach($data['detail'] as $index_detail => $result)
                                {
                                    $total      = $total + $result['total_price_without_tax'];

                                
                                    $total_usd  = $total_usd + $result['total_price_usd'];
                                }
                            @endphp
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['supplier']['telp'] }}</td>
                            <td style="border: 1px solid #d7d7d7; color: black;">{{ $data['matauang']['simbol'] }} {{$data['matauang']['kode'] == 'USD' ? ($total_usd + $data['freight_cost'] + $data['insurance']) : ($total + $data['freight_cost'] + $data['insurance'])}}</td>
                            
                         
                            
                            <td style="border: 1px solid #d7d7d7; color: black; text-align: center;max-width: 70px; text-overflow: ellipsis">
                                <span style="background-color: red; color: white; padding: 5px 10px; font-size: 14px; font-weight: bold;">{{ $data['category'] }}</span>
                            </td>


                            <td style="border: 1px solid #d7d7d7;max-width: 70px; text-overflow: ellipsis">
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
                                
                    
                  
                    
                    <!-- modal tambah commercial invoice -->
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <!-- <div id="overlay" style="display: none;"></div> -->
                        <div id="tabe-stok"></div>

                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
                           <div class="modal-dialog" role="document" style="max-width: 1800px;padding-left: 250px;">

                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                       

                                    </div>
                                    <!-- Isi modal -->
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
                                                    <input type="hidden" name="modeadmin" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Invoice Number</label>
                                                    <input type="number" class="form-control" name="invoice_no" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Contract Number</label>
                                                    <input type="number" class="form-control" name="contract_no" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Packing Number</label>
                                                    <input type="number" class="form-control" name="packing_no" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" placeholder="AUTO" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="margin-bottom: 20px;margin-top: 10px;">
                                                    <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%">Supplier</label>

                                                    <select class="select select2 select-search form-control" id="product-supplier-edit-filter" name="edit_supplier">
                                                    <option value="supplier_option">Supplier</option>
                                                    
                                                    <option value=""></option>
                                                    
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                        <div style="position: relative; width: 100%;">
                                                            <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%;width: 100%" for="">Nama Perusahaan</label>
                                                            <input type="text" class="form-control" name="company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Nama Perusahaan">
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Alamat Perusahaan</label>
                                                        <textarea type="text" class="form-control" name="address_company" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="position: relative; width: 100%;">
                                                        <label class="col-lg-3 control-label" style="font-size: 15px;width: 100%" for="">Kota Perusahaan</label>
                                                        <input type="text" class="form-control" name="city" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;" placeholder="Kota Perusahaan">
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div style="position: relative; width: 100%;">
                                                <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                                                <input type="number" class="form-control" name="telp" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 32%" placeholder="Telp. Perusahaan">
                                            </div>

                                            <div style="margin-top:20px;position: relative; width: 100%;">
                                                    <table>
                                                        <tr>
                                                            <td style="border: 1px solid #696868; color: black;">
                                                                <image src="" style="width: 350px;height: 320px;">
                                                            </td>
                                                            <td style="border: 1px solid #696868; color: black; width: 100%;">
                                                                <table style="width: 100%;padding-left: 25px; height: 100%;">
                                                                        <tr style="border: 1px solid #d7d7d7; color: black;">
                                                                            <td colspan="3" style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold "></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Chinese Name <br>中文品名</td>
                                                                            <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">      
                                                                                <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">English Name <br>英文品名</td>
                                                                            <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                                                <input class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;" type="text">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Model<br>型号</td>
                                                                        <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;">
                                                                        </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">Brand<br>品牌</td>
                                                                            <td colspan="2" style="border: 1px solid #d7d7d7; color: black;">
                                                                                <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border: 1px solid #d7d7d7; color: white; background-color: black; font-weight: bold ">HS Code<br>海关编码</td>


                                                                           
                                                                            <td style="border: 1px solid #d7d7d7; color: black;">
                                                                                <input type="text" class="form-control" style="width:100%; border: 1px solid #696868; color: black; padding: 10px;" id="hscode-input">
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
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                            <td style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        
                                                           

                                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">   

                                                                <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                            </td>
                                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">
                                                                <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                                <select style="border: 1px solid #696868; color: black; padding: 10px;" id="edit-unit-price-without-tax" name="edit_unit_price_without_tax">
                                                                <option value="" style="display:none;">&#xf078; Show More</option>
                                                                
                                                                </select>

                                                            </td>
                                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                            <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width:100%;border: 1px solid #696868; color: black;padding: 10px; ">
                                                        </td>
                                                        <td colspan="1" style="border: 1px solid #d7d7d7; color: black;">      
                                                            <input type="text" class="form-control" style="width: calc(70% - 10px); border: 1px solid #696868; color: black;padding: 10px; display: inline-block; vertical-align: top;" >
                                                            <a href="#" class="delete-input" style="color: red; display: inline-block; vertical-align: top; padding: 10px;">X</a>
                                                        </td>

                                                    </tr>
                                                        
                                                </table>
                                            </div>

                                            <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                                                <button type="button" id="submitButton" class="btn btn-primary" style="margin-left: auto;">Simpan Item</button>
                                            </div>


                                        </form>
                                        
                                        <form action="" class="form-horizontal" id="FormTambah2" method="get">
                @csrf
                <div style="padding-left: 1000px;">
                  <table>
                    <tr>
                      <td style="border: 1px solid #696868; color: black; width: 75%;"> <!-- Menambahkan padding -->
                        Freight Cost
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        <input type="text" class="form-control custom-border" id="freight_cost_id_tab" name="freight_cost_name_tab">
                      </td>
                    </tr>
                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        Insurance
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        <input type="text" class="form-control custom-border" id="insurance_edit_id_tab" name="insurance_edit_name_tab">
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
                       
                        
                      </td>
                    </tr>

                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        CBM Volume (M3)
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                       
                        
                      </td>
                    </tr>

                    <tr>
                      <td style="border: 1px solid #696868; color: black;">
                        Total Price Without Tax
                      </td>
                      <td style="border: 1px solid #696868; color: black;">
                        
                        
                      </td>
                    </tr>
                    
                    <tr>
                        <td style="border: 1px solid #696868; color: black;">
                            Total Price USD
                        </td>
                        <td style="border: 1px solid #696868; color: black;">
                          
                            
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
                             <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="banksupplier-edit-id" name="banksupplier_edit">
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
                             <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control" id="currency-edit-id" name="currency_edit">
                                     <option value="0">Pilih Currency</option>
                                       
            
                                        <option value=""></option>

                                      
                                  
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


                            <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="bankAddress_id_tab" name="bankAddress_name_tab" placeholder="Bank Address">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Swift Code</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" id="swiftCode_id_tab" name="swiftCode_name_tab" placeholder="Swift Code">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Account No</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="accountNo_id_tab" name="accountNo_name_tab" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Account No">

                        </div>
                    </div>
                    
                </div>

                <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel">Beneficiary Name</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="beneficiaryName_id_tab" name="beneficiaryName_name_tab" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;"placeholder="Beneficiary Name">

                        </div>
                    </div>
                    
                </div>

                  <div class="form-group" style="padding-top: 30px; padding-left: 20px;">
                    
                    <div class="row">
                        <div style="padding-top: 10px;" class="col-md-1">
                            <label for="kodebaranglabel" style="width: 100%;">Beneficiary Address</label>
                   
                        </div>
                        <div class="col-md-11" style="padding-right: 600px;">


                            <input type="text" class="form-control custom-border" id="beneficiaryAddress_id_tab" name="beneficiaryAddress_name_tab" style="border: 1px solid #ced4da; width: 100%; padding-left:10px;" placeholder="Beneficiary Address">

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
                           <div class="modal-dialog" role="document" style="max-width: 1800px;padding-left: 250px;">

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
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href = '{{ route('admin.pembelian_comercial_invoice') }}'">Close</button>

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
        // $('#product-restok-tambah-filter').val('');
        // console.log($('#product-restok-tambah-filter').val());
        // if ($('#product-restok-tambah-filter').val() === null) {
        //   $('#product-restok-tambah-filter').remove();

        //   }

        $('#tambahModal').modal('show'); // Tampilkan modal


    }
    
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

    //Membuka modal update
    function updateComercialInvoice(element) {
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
</script>
@endsection