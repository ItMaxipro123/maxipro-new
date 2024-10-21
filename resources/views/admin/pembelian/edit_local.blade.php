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
            <a class="nav-link active" id="comercial_invoice_tab" href="#comercial_invoice" data-toggle="tab">Master</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="packing_list_tab" href="#packing_list" data-toggle="tab">Pembayaran</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="packing_list_tab" href="#packing_list" data-toggle="tab">Ekspedisi</a>
        </li>
    </ul>

    <div class="tab-content" style="margin-top: 20px;">
        <div class="tab-pane fade show active" id="comercial_invoice">
            <div class="row">
                <div class="col-md-3">

                    <h6 style="margin-bottom: 10px;"> Comercial Invoice</h4>
                </div>
                <div class="col-md-9" style="text-align: right;">
                  <a href="javascript:void(0)"   name="importButton" class="btn btn-large btn-info btn-edit" style="width: 140px; height: 38px; padding: 9px 10px;">Import Data </a>
                </div>
            </div>
          

            

                <div class="form-group">
                    
               
                </div>

          

         
                <div class="row">
                    <div class="col-md-2">
                    
                        <div style="position: relative; width: 100%; margin-top:10px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px; width: 100%" for="">Database2222 <span style="color: red;">(Wajib Diisi)</span></label>
                            
                            <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-edit" id="database_id" name="database_name"  required>
                                <option value="">Database</option>
                                <option value="PT">PT</option>
                                <option value="UD">UD</option>
                            </select>

                        </div>
                    
                    </div>
                </div> 
                
             
               
                
                <div style="position: relative; width: 100%;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">No. Telp</label>
                    <input type="number" class="form-control" id="telp_id" name="telp"  style="border: 1px solid #ced4da; width: 100%; padding-left:20px;width: 32%">
                </div>
       
              
           
        </div>
        
      

       
    </div>
   
        
    <!-- note -->
     
 
@endsection


@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../assets/js/edit-commercial-invoice/custom_code.js"></script> 
<script src="../assets/js/edit-commercial-invoice/select_choices.js"></script> 


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../assets/js/edit-commercial-invoice/import_barang.js"></script> 








@endsection
