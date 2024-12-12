@if($menu=='edit_view')
<div class="col-md-12 d-flex justify-content-end">
    <button type="button" id="backbtn" class="btn btn-large btn-warning" onclick="window.location.href = 'data_pembelian_penerimaan';">Kembali</button>
</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Database <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


            <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="database_tambah_id" name="database_tambah_name" required>
                <option value="">Database</option>
                <option value="PT" <?php echo ($Data['msg']['penerimaan'][0]['name_db'] == 'PT') ? 'selected' : ''; ?>>PT</option>
                <option value="UD" <?php echo ($Data['msg']['penerimaan'][0]['name_db'] == 'UD') ? 'selected' : ''; ?>>UD</option>
            </select>

            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Tanggal Terima <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


            
            <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" value="{{ $Data['msg']['penerimaan'][0]['tgl_terima'] }}" >
            <input type="hidden"  class="form-control custom-border" id="id_penerimaan" value="{{ $Data['msg']['penerimaan'][0]['id'] }}" >
            </div>
        </div>

</div>
@endif
@if($menu == 'detail_view')
<div class="form-group" style="padding: 25px; width: 100%;">
    <div class="row">
        <div class="col-6">
            <h1 class="text-break" style="font-family: 'Roboto', 'Helvetica Neue', sans-serif; font-size: 30px;">
                {{ $Data['msg']['penerimaan'][0]['kode'] }}
            </h1>
        </div>
        <div class="col-6" style="text-align:right;" >

        @if($Data['msg']['penerimaan'][0]['category']=='lcl')  
        <a href="javascript:void(0)" id="tambahButton"  class="btn btn-large btn-primary btn-tambah">Add Ekspedisi</a>
        @endif
        </div>
    </div>
  
</div>

<div class="form-group" style="padding-left: 25px; width: 100%;">
    <div class="border-bottom" style="border-bottom: 1px solid black; width: 100%; margin: 0;">
    </div>
</div>

<div class="form-group" style="padding: 25px; width: 100%;">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    Tanggal Transaksi      
                </div>

                <div class="col-6">
                @if($Data['msg']['penerimaan'][0]['category']=='fcl')
                :      {{ \Carbon\Carbon::parse($Data['msg']['penerimaan'][0]['fcl']['date'])->translatedFormat('d F Y') }}
                @else
                :      {{ \Carbon\Carbon::parse($Data['msg']['penerimaan'][0]['lcl']['tgl_transaksi'])->translatedFormat('d F Y') }}
                @endif
                </div>
            </div>
          
        </div>
        <div class="col-6" >
            <div class="row" style="text-align:left;">
                <div class="col-6">
                    <p style="margin-left:50%;">Tanggal Penerimaan</p>     
                </div>

                <div class="col-6">
                    :
                {{ \Carbon\Carbon::parse($Data['msg']['penerimaan'][0]['tgl_terima'])->translatedFormat('d F Y') }}
                </div>
            </div>
          
        </div>
    </div>
    
    <div class="row" >
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    Kode     
                </div>

                <div class="col-6">
                :     @if($Data['msg']['penerimaan'][0]['category']=='fcl')
                        INV-{{ $Data['msg']['penerimaan'][0]['fcl']['invoice_no']}}
                      @else
                      {{ $Data['msg']['penerimaan'][0]['lcl']['invoice']}}
                    @endif
                    
                </div>
            </div>
          
        </div>
        <div class="col-6" >
            <div class="row" style="text-align:left;">
                <div class="col-6">
                    <p style="margin-left:50%;">User</p>     
                </div>

                <div class="col-6">
                    :
                {{ $Data['msg']['penerimaan'][0]['teknisi']['name'] }}
                </div>
            </div>
          
        </div>
    </div>
    
    <div class="row" >
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                      
                </div>

                <div class="col-6">
                
                    
                </div>
            </div>
          
        </div>
        <div class="col-6" >
            <div class="row" style="text-align:left;">
                <div class="col-6">
                    <p style="margin-left:50%;">No. Pembelian Bee</p>     
                </div>

                <div class="col-6">
                    :
                {{ $Data['msg']['penerimaan'][0]['invoicebee'] ?? '' }}
                </div>
            </div>
          
        </div>
    </div>
</div>


@endif
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;  @if($menu == 'detail_view') display: none; @endif">
     
        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">ID Pembelian <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" id="id_pembelian_UD" style="padding-right: 1em; margin-top:0.5em;">

            
            <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="pembelian_tambah_id" name="pembelian_tambah_name" required> 
                
            <option value="0">Pilih LCL / FCL</option>
                @php
                $id_detail_pembelian_lcl = array();
                $id_detail_pembelian_lcl_ud = array();
                $tot_detail_pembelian_lcl = array();
                $tot_terima_detail_pembelian_lcl = array();
                $id_pembelian_lcl = array();
                $count_pembelian_lcl = array();
                @endphp
                @foreach($Data['msg']['pembelianlcl'] as $key => $result)
                    @if($result['name_db']=='PT')
                        @php
                            $id_detail_pembelian_lcl[] = $result['id'];
                            
                        @endphp
                    @elseif($result['name_db']=='UD')
                        @php
                            $id_detail_pembelian_lcl_ud[] = $result['id'];
                            
                        @endphp
                    @endif
                @endforeach

                @php
                    $id_detail_pembelian_lcl_desc = array_reverse($id_detail_pembelian_lcl);
                    $id_detail_pembelian_lcl_desc_ud = array_reverse($id_detail_pembelian_lcl_ud);
                    
                    foreach($id_detail_pembelian_lcl_desc as $key => $id_lcl_detail){
                        // Initialize totals for the current id
                        $tot_detail_pembelian_lcl[$id_lcl_detail] = 0;
                        $tot_terima_detail_pembelian_lcl[$id_lcl_detail] = 0;

                        // Loop through the pembelianlcldetail data
                        foreach($Data['msg']['pembelianlcldetail'] as $data){
                            // Check if the id matches
                            if($data['id_pembelianlcl'] == $id_lcl_detail){
                                // Add to the totals
                                
                                $tot_detail_pembelian_lcl[$id_lcl_detail] += $data['qty'];
                                $tot_terima_detail_pembelian_lcl[$id_lcl_detail] += $data['qty_terima'];

                                // Calculate the difference between totals
                                $tot_detail_pembelian_lcl[$id_lcl_detail] -= $tot_terima_detail_pembelian_lcl[$id_lcl_detail];


                                $id_pembelian_lcl[$id_lcl_detail] = $data['id_pembelianlcl'];
                            }
                        }
                    }
                @endphp

                
                @foreach($Data['msg']['pembelianlcl'] as $key => $result)
                    @if($result['name_db']=='PT')
                    
                        <option value="lcl-{{ $result['id'] }}" {{ $Data['msg']['penerimaan'][0]['id_fcl_lcl'] == $result['id'] ? 'selected' : '' }} >LCL - {{ $result['invoice'] }} ({{ $tot_detail_pembelian_lcl[$result['id']]}}) </option>
                    @endif
                @endforeach
                
              
                @if($Data['msg']['penerimaan'][0]['fcl'] != null)
                        <option value="FCL-{{ $Data['msg']['penerimaan'][0]['fcl']['id'] }}" {{ 'selected' }}>
                            FCL - INV-{{ $Data['msg']['penerimaan'][0]['fcl']['invoice_no'] }} (0)
                        </option>
                @else
                        <option value="lcl-{{ $Data['msg']['penerimaan'][0]['lcl']['id'] }}" {{ 'selected' }}>
                            LCL - {{ $Data['msg']['penerimaan'][0]['lcl']['invoice'] }} (0)
                        </option>
                @endif
                @foreach($Data['msg']['fclcontainer'] as $index => $data)
                    @if($data['name_db']=='PT')
                    @php
                    $total=[];
                    $total_sum=[];
                    foreach($Data['msg']['tot_remaining_qty'] as $index2 => $result2){
                        $total[] =$result2; 
                    }
                    foreach($Data['msg']['sum_tot'] as $index2 => $result2){
                        $total_sum[] =$result2; 
                    }
                    @endphp
                        <option value="FCL-{{ $data['id'] }}">FCL - INV-{{ $data['invoice_no'] }} ({{ $total[$index] }})</option>
                    @endif
                @endforeach
            </select>

            </div>
        </div>

</div>
@if($menu=='detail_view')
<div class="form-group" style="padding-left: 25px; width: 100%;">
    <div class="border-bottom" style="border-bottom: 1px solid black; width: 100%; margin: 0;">
    </div>
</div>
@endif
<div class="form-group" style="padding-top:25px;">
    <div class="row">
        <div class="col-md-12">
            <!-- Add table-responsive class to make the table scrollable on mobile -->
            <div class="table-responsive" style="padding-left:25px;">
                <table class="table table-bordered  ">
                    <thead>
                        <tr>
                            <td style="font-weight:bold; border: 0.1px solid black">Image Barang</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Kode Barang</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Nama Barang</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Jumlah</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Jumlah Sudah Datang</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Jumlah Yang Datang</td>
                            @if($menu == 'edit_view')
                                <td style="font-weight:bold; border: 0.1px solid black">Action</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="tbody_addbarang" style="background-color:white;">
              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@if($menu=='detail_view')
    @if($Data['msg']['penerimaan'][0]['category']=='lcl')
    <div class="modal fade" id="addEkspedisiModal" tabindex="-1" role="dialog" aria-labelledby="addEkspedisiModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addEkspedisiModalLabel">Add Ekspedisi Lcl</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="dateForm">
                                            
                                     
                                                <div class="row padding">

                                                    <div class="col-md-6">
                                                        <div class="row">

                                                            <div class="col-md-3">
    
                                                                <label for="kodeLabel">Kode <span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
    
                                                                 <input type="hidden"  class="form-control custom-border" id="id_lcl" value="{{ $Data['msg']['penerimaan'][0]['id_fcl_lcl'] }}" >
                                                                 <input type="text"  class="form-control custom-border" id="kode" placeholder= "AUTO" disabled >
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3">

                                                                <label for="ruteLabel">Rute <span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                        <select class="select2 form-control tambah_rute" style="width:100%" name="" id="rute">
                                                                                            <option value="0">Pilih Rute</option>
        
                                                                                            <option value="localchina">Lokal China</option>
        
                                                                                            <option value="chinaindo">China Indo</option>
        
                                                                                            <option value="localindo">Lokal Indo</option>
                                                                        </select>
                                                            </div>
                                                        </div>
                                                                    
                                                    </div>
                                                </div>
                                     

                                                <div class="row padding">
                                                    <div class="col-md-6">
                                                        
                                                            <div class="row">
                                                                <div class="col-md-3">

                                                                    <label for="databaselabel">Tanggal <span style="color: red;">*</span></label>
                                                                </div>

                                                                <div class="col-md-9">

                                                                    <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder= "Tanggal Pengiriman" required >
                                                                </div>

                                                            </div>

                                                                            


        
        
                    

                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3">

                                                                <label for="EkpedisiLabel">Ekspedisi<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <select class="form-control" name="add_id_ekspedisi" id="ekspedisi_id" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                                                                    <option value="0">Pilih Ekspedisi</option>
                                                                    @foreach($Data['msg']['ekspedisi'] as $index => $result)
                                                                    <option value="{{ $result['id'] }}" data-name="{{ $result['name'] }}" >{{ $result['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            
                                                <div class="row padding">
                                                    <div class="col-md-6">
                                                        

                                                            <div class="row">
                                                                <div class="col-md-3">

                                                                    <label for="databaselabel">Biaya <span style="color: red;">*</span></label>
                                                                </div>
                                                                <div class="col-md-5">

                                                                    <select class="form-control" name="add_matauang_id" id="matauang_id" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                                                                        <option value="0">Pilih Mata Uang</option>
                                                                        @foreach($Data['msg']['matauang'] as $index => $result)
                                                                        <option value="{{ $result['id'] }}" data-simbol="{{ $result['simbol'] }}" >({{ $result['simbol'] }}) {{ $result['kode'] }} - {{ $result['name'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">

                                                                    <input type="text"  class="form-control custom-border" id="biaya" placeholder= "Biaya" required >
                                                                </div>
                                                            </div>
                                                                            
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="row">
                                                            <div class="col-md-3">

                                                                <label for="resiLabel">No. Resi<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text"  class="form-control custom-border" id="resi" placeholder= "No. Resi" required >
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row padding">
                                                    <div class="col-md-6">
                                                        

                                                            <div class="row">
                                                                <div class="col-md-3">

                                                                    <label for="databaselabel">Keterangan</label>
                                                                </div>
                                                                <div class="col-md-9">

                                                                <textarea style="border: 1px solid #ced4da;width:100%;height:100px;padding-left:20px;" name="" id="keterangan_ekepedisi"  class="form-control" placeholder="Keterangan"></textarea>
                                                                </div>
                                                              
                                                            </div>
                                                                            
                                                    </div>
                                                    
                                                </div>
                                            
                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <!-- code diatas untuk modal bootstrap 4 -->


                                        <!-- code diatas untuk modal bootstrap 5 -->

                                        <button type="button" class="btn btn-primary" id="saveEkspedisi">Simpan Ekspedisi</button>

                                    </div>
                                </div>
                            </div>
    </div>
    @endif

    <div class="form-group" style="padding-left: 25px; width: 100%;">
        <div class="border-bottom" style="border-bottom: 1px solid black; width: 100%; margin: 0;">
        </div>
    </div>
    @if($Data['msg']['penerimaan'][0]['category']=='lcl')
    <div class="form-group" style="padding-top:25px;">
        <p style="padding-left:25px;">Ekspedisi:</p>
        <div class="row">
            <div class="col-md-12">
                <!-- Add table-responsive class to make the table scrollable on mobile -->

                <div class="table-responsive" style="padding-left:25px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td style="font-weight:bold; border: 0.1px solid black">Tanggal</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Kode</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Rute</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Nama Ekspedisi</td>
                            <td style="font-weight:bold; border: 0.1px solid black">No. Resi</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Biaya</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Keterangan</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Action</td>
                        </tr>
                    </thead>
                    <tbody id="tbody_addekspedisi" style="background-color:white;">
                        @php
                            $penerimaan_idData = $Data['msg']['penerimaan'][0]['lcl']['id'];
                            $pembelianlclData = $Data['msg']['pembelianlcl'];
                            
                            $penerimaan_lclData = $Data['msg']['penerimaan'][0]['lcl']['invoice'];

                            
                            $id_ekspedisi_array = [];
                            $nama_ekspedisi_array = [];
                            $new_id_ekspedisi_array = [];
                            

                            $new_id_matauang_array = [];
                            $new_simbol_matauang_array = [];

                            foreach($pembelianlclData as $index => $result) {
                                if($result['id'] == $penerimaan_idData) {
                                    foreach($result['ekspedisilcl'] as $key => $query) {
                                        $id_ekspedisi_array[] = $query['id_ekspedisi']; // Menambahkan id_ekspedisi ke array
                                    }
                                }
                            }

                        

                            foreach($Data['msg']['pembelianlcl'] as $index3 => $result2) {
                                if($result2['invoice'] == $penerimaan_lclData) {
                                    foreach($result2['ekspedisilcl'] as $key => $sum_result2) {
                                        // Menyimpan semua ID, termasuk duplikat
                                        $new_id_ekspedisi_array[] = $sum_result2['id_ekspedisi'];
                                        $new_id_matauang_array[] = $sum_result2['id_matauang'];
                                    }
                                }
                            }

                            
                            

                            foreach ($Data['msg']['ekspedisi'] as $index2 => $sum_result) {
                                // Tambahkan nama ke dalam array tanpa memeriksa apakah ID sudah ada
                                foreach ($new_id_ekspedisi_array as $id) {
                                    if ($sum_result['id'] === $id) {
                                        // Tambahkan nama ke dalam array, termasuk duplikat
                                        $nama_ekspedisi_array[] = $sum_result['name'];
                                    }
                                }
                            }

                            foreach($Data['msg']['matauang'] as $index_mt => $result_mt){
                                foreach($new_id_matauang_array as $id_mt){
                                    if($result_mt['id'] == $id_mt){
                                        $new_simbol_matauang_array[] = $result_mt['simbol'];
                                    }
                                }
                            }

                            
                        @endphp
                    

                        @foreach($Data['msg']['pembelianlcl'] as $index => $result)
                            @if($result['id'] == $penerimaan_idData)
                                @foreach($result['ekspedisilcl'] as $key => $query)
                                    <tr>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ $query['tgl_kirim'] }}</td>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ $query['kode'] }}</td>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ $query['rute'] }}</td>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ isset($nama_ekspedisi_array[$key]) ? $nama_ekspedisi_array[$key] : '' }}</td>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ $query['resi'] }}</td>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ $new_simbol_matauang_array[$key] }} {{ number_format($query['price'],0,',','.') }}</td>
                                        <td style="font-weight:bold; border: 0.1px solid black">{{ $query['keterangan'] }}</td>
                                        <td style="border: 0.1px solid black">
                                            <!-- Tombol delete -->
                                            <button type="button" class="btn btn-danger btn-sm delete-button" data-id="{{ $query['id_ekspedisi'] }}" data-kode="{{ $query['kode'] }}">
                                                X
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>

                </div>
            
            </div>
        </div>
    </div>
    @endif
    <div class="form-group" style="padding-left: 25px; width: 100%;">
        <div class="border-bottom" style="border-bottom: 1px solid black; width: 100%; margin: 0;">
        </div>
    </div>
@endif

@if($menu=='edit_view')


<div class="row" style="padding-top:25px;">

    
    <div class="col-md-6">
        <label class="col-lg-3 control-label" style="width:100%;padding-left:20px;" for="id_gudang">Ekspedisi <span style="color: red;">(Wajib Diisi)</span></label>
        <div style="position: relative; width: 100%;padding-left:20px;">
            <select class="form-control" name="id_db" id="ekspedisi_id" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                <option value="0">Pilih Ekspedisi</option>
                @foreach($Data['msg']['ekspedisi'] as $index => $result)
                <option value="{{ $result['id'] }}"{{ $Data['msg']['penerimaan'][0]['ekspedisi']['id'] == $result['id'] ? 'selected' : '' }} >{{ $result['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <label class="col-lg-3 control-label" style="width:100%;padding-left:20px;" for="id_gudang">Gudang <span style="color: red;">(Wajib Diisi)</span></label>
        <div style="position: relative; width: 100%;padding-left:20px;">
            <select class="form-control" name="id_db" id="gudang_id" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                <option value="0">Pilih Gudang</option>
                @foreach($Data['msg']['gudang'] as $index => $result)
                <option value="{{ $result['id'] }}" {{ $Data['msg']['penerimaan'][0]['gudang']['id'] == $result['id'] ? 'selected' : '' }}>{{ $result['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@endif

<div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
    <div class="col-md-6">
            @if($menu=='edit_view')
            <label class="col-lg-3 control-label" style="font-size: 15px;padding-left:20px;" for="">Keterangan <span style="color: red;">(Wajib Diisi)</span></label>
 
            <div style="position: relative; width: 100%;padding-left:20px;">
                            <textarea style="border: 1px solid #ced4da;width:100%;height:100px;padding-left:20px;" name="" id="keterangan"  class="form-control">{{ $Data['msg']['penerimaan'][0]['keterangan'] }}</textarea>
            </div>
            @else
            <label class="col-lg-3 control-label" style="font-size: 15px;padding-left:20px;" for="">Keterangan :</label>
            <div style="position: relative; width: 100%;padding-left:20px;">
                <p style="padding:5px;margin:auto;"> {{ $Data['msg']['penerimaan'][0]['keterangan'] }}</p>
            </div>
            @endif

    </div>
</div>                                                    
@if($menu=='edit_view')
<div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
    <button type="button" id="submitbutton" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/fcl-container/fcl-container.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

$(document).ready(function() {
    $('#saveEkspedisi').on('click', function() {
    var id_lcl = $('#id_lcl').val();
    var tgl_kirim = $('#tgl_request_tambah').val();
    var rute = $('#rute').val();
    var ekspedisi = $('select[name="add_id_ekspedisi"]').val();
    var selectedName = $('#ekspedisi_id option:selected').data('name');
    
    var matauang = $('select[name="add_matauang_id"]').val();
    
    var selectedNameMatauang = $('#matauang_id option:selected').data('simbol')
    var biaya = $('#biaya').val();
    var resi = $('#resi').val();
    var keterangan_ekepedisi = $('#keterangan_ekepedisi').val();
    
    var formSend = {
        id_lcl: id_lcl,
        tgl_kirim: tgl_kirim,
        rute: rute,
        ekspedisi: ekspedisi,
        matauang: matauang,
        price: biaya,
        resi: resi,
        keterangan: keterangan_ekepedisi
    };
    var number_format_biaya = parseFloat(biaya).toLocaleString('id-ID',{
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    })
    
    
    $.ajax({
        url: '{{ route('admin.penerimaan_pembelian') }}',
        data: {
            menu: 'tambah_ekspedisi',
            form: formSend
        },
        success: function(response) {
    
            
            // Tampilkan pesan sukses dengan Swal sebelum menambahkan row
            Swal.fire({
                title: 'Berhasil!',
                text: 'Ekspedisi berhasil ditambahkan.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                // Setelah pengguna menutup SweetAlert, menambahkan row ke dalam tabel ekspedisi
                var newRow = `
                    <tr>
                        <td style="font-weight:bold; border: 0.1px solid black">${tgl_kirim}</td>
                        <td style="font-weight:bold; border: 0.1px solid black">${response.msg.data.kode || ''}</td>
                        <td style="font-weight:bold; border: 0.1px solid black">${rute}</td>
                        <td style="font-weight:bold; border: 0.1px solid black">${selectedName || ''}</td>
                        <td style="font-weight:bold; border: 0.1px solid black">${resi}</td>
                        <td style="font-weight:bold; border: 0.1px solid black">${selectedNameMatauang} ${number_format_biaya}</td>
                        <td style="font-weight:bold; border: 0.1px solid black">${keterangan_ekepedisi}</td>
                        <td style="border: 0.1px solid black">
                            <button type="button" class="btn btn-danger btn-sm delete-button" data-id="${ekspedisi}" data-kode="${response.msg.data.kode || ''}">
                                X
                            </button>
                        </td>
                    </tr>
                `;
                
                // Menyisipkan baris baru ke dalam tbody
                $('#tbody_addekspedisi').append(newRow);
            });
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat menambahkan ekspedisi.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});

    
        // Menangani event klik pada tombol delete
        $(document).on('click', '.delete-button', function() {
            const idEkspedisi = $(this).data('id');
            const kodeEkspedisi = $(this).data('kode');
            
            // Menggunakan SweetAlert2 untuk konfirmasi
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menghapus item ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan AJAX untuk menghapus data
                    $.ajax({
                        url: '{{ route('admin.penerimaan_pembelian') }}', // Ganti dengan URL endpoint penghapusan
                        
                        data: { 
                            menu:'delete_ekspedisi',
                            id: kodeEkspedisi },
                        success: function(response) {
                            // Hapus baris tabel
                            $(this).closest('tr').remove();
                            // Tindakan setelah berhasil menghapus
                            Swal.fire(
                                'Deleted!',
                                'Item berhasil dihapus.',
                                'success'
                            );
                        }.bind(this), // Bind `this` untuk referensi yang tepat
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus item.',
                                'error'
                            );
                        }
                    });
                }
            });
        });


    

    $('#rute').select2({
                    placeholder: "Pilih Rute", // Optional placeholder
                    allowClear: true, // Optional, to allow clearing the selection
                    width: 'resolve' 
    });



    var tambahButton = $('#tambahButton');

    // You can bind an event listener if you prefer
    tambahButton.on('click', function() {
        
        $('#addEkspedisiModal').modal('show'); // Menampilkan modal Filter
    });         
    
  
    $('#database_tambah_id').select2({
        placeholder: 'Pilih Database',
        allowClear: true,
        width: '100%'
    });

    $('#pembelian_tambah_id').select2({
        placeholder: 'Pilih LCL/FCL',
        allowClear: true,
        width: '100%',
        height: '100%'
    });

    $('#ekspedisi_id').select2({
        placeholder: 'Pilih Ekspedisi',
        allowClear: true,
        width: '100%',
        height: '100%'
    });

    $('#matauang_id').select2({
        placeholder: 'Pilih Mata Uang',
        allowClear: true,
        width: '100%',
        height: '100%'
    });

    $('#gudang_id').select2({
        placeholder: 'Pilih Gudang',
        allowClear: true,
        width: '100%',
        height: '100%'
    });

    flatpickr("#tgl_request_tambah", {
        dateFormat: "Y-m-d",
      
        disableMobile: true
    });


   
    //bila database berubah
    $('#database_tambah_id').on('change', function() {
            

            var selectedValue = $(this).val();
        

            if (selectedValue === 'UD') {
    
                const idDetailPembelianLcl = @json($id_detail_pembelian_lcl_desc_ud);
                const pembelianLclDetail = @json($Data['msg']['pembelianlcldetail']);

                // Initialize totals
                const totDetailPembelianLcl = {};
                const totTerimaDetailPembelianLcl = {};
                const idPembelianLcl = {};
                const totDifference = {}; // New variable to hold the differences

                // Initialize totals for each id
                idDetailPembelianLcl.forEach(idLclDetail => {
                    totDetailPembelianLcl[idLclDetail] = 0;
                    totTerimaDetailPembelianLcl[idLclDetail] = 0;
                });

                // Loop through the pembelianlcldetail data
                pembelianLclDetail.forEach(data => {
                    const idLclDetail = data.id_pembelianlcl;
                    
                    // Check if the id matches
                    if (idDetailPembelianLcl.includes(idLclDetail)) {
                        // Add to the totals
                        totDetailPembelianLcl[idLclDetail] += data.qty;
                        totTerimaDetailPembelianLcl[idLclDetail] += data.qty_terima;
                        
                        // Store the current id
                        idPembelianLcl[idLclDetail] = data.id_pembelianlcl;
                    }
                });

                // Calculate the differences and store them in totDifference
                idDetailPembelianLcl.forEach(idLclDetail => {
                    totDifference[idLclDetail] = totDetailPembelianLcl[idLclDetail] - totTerimaDetailPembelianLcl[idLclDetail];
                });

                var pembelianDropdown = $('#pembelian_tambah_id');

                // Clear all existing options
                pembelianDropdown.empty();
                pembelianDropdown.append('<option value="">Pilih LCL / FCL</option>');
                @foreach($Data['msg']['pembelianlcl'] as $index => $result)
                    @if($result['name_db']=='UD')
                    var option = $('<option></option>')
                        .attr('value', 'lcl-{{ $result['id'] }}')
                        .attr('data-type', 'PT')
                        .text('LCL - {{ $result['invoice'] }} '+'( '+totDifference['{{ $result['id'] }}'] +' )');
                    pembelianDropdown.append(option);
                    @endif
                @endforeach
                //untuk memproses import data ke tabel ketika memilih di option select
            return;
            }
            else{

                const idDetailPembelianLcl = @json($id_detail_pembelian_lcl_desc);
                const pembelianLclDetail = @json($Data['msg']['pembelianlcldetail']);

                // Initialize totals
                const totDetailPembelianLcl = {};
                const totTerimaDetailPembelianLcl = {};
                const idPembelianLcl = {};
                const totDifference = {}; // New variable to hold the differences

                // Initialize totals for each id
                idDetailPembelianLcl.forEach(idLclDetail => {
                    totDetailPembelianLcl[idLclDetail] = 0;
                    totTerimaDetailPembelianLcl[idLclDetail] = 0;
                });

                // Loop through the pembelianlcldetail data
                pembelianLclDetail.forEach(data => {
                    const idLclDetail = data.id_pembelianlcl;
                    
                    // Check if the id matches
                    if (idDetailPembelianLcl.includes(idLclDetail)) {
                        // Add to the totals
                        totDetailPembelianLcl[idLclDetail] += data.qty;
                        totTerimaDetailPembelianLcl[idLclDetail] += data.qty_terima;

                        // Calculate the difference between totals
                        

                        // Store the current id
                        idPembelianLcl[idLclDetail] = data.id_pembelianlcl;
                    }
                });

                // Calculate the differences and store them in totDifference
                idDetailPembelianLcl.forEach(idLclDetail => {
                    totDifference[idLclDetail] = totDetailPembelianLcl[idLclDetail] - totTerimaDetailPembelianLcl[idLclDetail];
                });

                

                var pembelianDropdown = $('#pembelian_tambah_id');

                // Clear all existing options
                pembelianDropdown.empty();
                pembelianDropdown.append('<option value="">Pilih LCL / FCL</option>');
                
                //menampilkan lcl di id pembelian
                @foreach($Data['msg']['pembelianlcl'] as $index => $result)
                    @if($result['name_db']=='PT')
                    var option = $('<option></option>')
                        .attr('value', 'lcl-{{ $result['id'] }}')
                        .attr('data-type', 'PT')
                        .text('LCL - {{ $result['invoice'] }} '+'( '+totDifference['{{ $result['id'] }}'] +' )');
                    pembelianDropdown.append(option);
                    @endif
                @endforeach
                
            
                //menampilkan fcl di id pembelian
                @foreach($Data['msg']['fclcontainer'] as $index => $data)
                    @if($data['name_db']=='PT')
                    
                    @php
                    $total=[];
                    $total_sum=[];
                    foreach($Data['msg']['tot_remaining_qty'] as $index2 => $result2){
                        $total[] =$result2; 
                    }
                    foreach($Data['msg']['sum_tot'] as $index2 => $result2){
                        $total_sum[] =$result2; 
                    }
                    @endphp


                    var option = $('<option></option>')
                        .attr('value', 'FCL-{{ $data['id'] }}')
                        .attr('data-type', 'PT')
                        .text('FCL - INV-{{ $data['invoice_no'] }} '+'('+'{{ $total[$index] }}' +')');
                    pembelianDropdown.append(option);
                    @endif
                @endforeach
                
         
                return;
            }

         
    });
    
    
                    
    
    
                
                        
                   
                         
                     
    let newRowsEdit = ''; 
    var edit = {!! json_encode($Data['msg']['detail']) !!};
    var barang = {!! json_encode($Data['msg']['barang']) !!};
    var menu = {!! json_encode($menu) !!}
    var img_barang = barang[0].imagedir

    edit.forEach(function(detail, index) {
        // bila detail lcl tidak null
        if(detail.lcldetail != null){
            
            if(menu=='edit_view'){
                newRowsEdit += `
                <tr>
                    <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                        <!-- Set the size of the <td> -->
                        <img src="${barang[index].imagedir}" alt="lcldetail" style="width: 150px; height: 150px;">
                        <!-- Image size -->
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                        <p class="centered-text">
                            <b>${barang[index].new_kode}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                      
                        <p class="centered-text">
                           <b id="idfcllcl-${index}" style="display: none;">${detail.id}</b>
                            <b id="name-detail-${index}" >${detail.name}</b>
                            <b id="category-detail-${index}"style="display: none;">${detail.category}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-input-${index}">${detail.lcldetail.qty}</b>
                        </p>
                    </td>
                
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-update-${index}">${detail.lcldetail.qty_terima}</b>
                            <b id="stok-idbarang-${index}" style="display: none;">${detail.id_barang}</b>
                            <b id="stok-iddetail-${index}" style="display: none;">${detail.id_detail}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                    <input class="form-control bordered-input" id="stok-terima-${index}" value=${detail.qty || ''}>
                        
                    </td>
                    <td style="border: 0.1px solid black;">
                        <div class="centered-text">
                            <button type="button" class="btn btn-primary">X</button>
                        </div>
                    </td>
                </tr>
            `;
            }
            else{
                newRowsEdit += `
                <tr>
                    <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                        <!-- Set the size of the <td> -->
                        <img src="${barang[index].imagedir}" alt="lcldetail" style="width: 150px; height: 150px;">
                        <!-- Image size -->
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                        <p class="centered-text">
                            <b>${barang[index].new_kode}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                      
                        <p class="centered-text">
                           <b id="idfcllcl-${index}" style="display: none;">${detail.id}</b>
                            <b id="name-detail-${index}" >${detail.name}</b>
                            <b id="category-detail-${index}"style="display: none;">${detail.category}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-input-${index}">${detail.lcldetail.qty}</b>
                        </p>
                    </td>
                
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-update-${index}">${detail.lcldetail.qty_terima}</b>
                            <b id="stok-idbarang-${index}" style="display: none;">${detail.id_barang}</b>
                            <b id="stok-iddetail-${index}" style="display: none;">${detail.id_detail}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                    <input class="form-control bordered-input" id="stok-terima-${index}" value=${detail.qty || ''}>
                        
                    </td>
              
                </tr>
            `;
            }
            
        }

        //menggunakan commercialdetail jika lcl null
        else{
            if(menu==='edit_view'){
                newRowsEdit += `
                <tr>
                    <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                        <!-- Set the size of the <td> -->
                        <img src="${barang[index].imagedir}" alt="" style="width: 150px; height: 150px;">
                        <!-- Image size -->
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                        <p class="centered-text">
                            <b>${detail.kode || ''}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                        <p class="centered-text">
                         <b id="idfcllcl-${index}" style="display: block;">${detail.id}</b>
                          <b id="name-detail-${index}" >${detail.name}</b>
                              <b id="category-detail-${index}"style="display: block;">${detail.category}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-input-${index}">${detail.qty || ''}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-update-${index}">${detail.commercialdetail.qty_terima}</b>
                            <b id="stok-idbarang-${index}" style="display: block;">${detail.id_barang}</b>
                                                    <b id="stok-iddetail-${index}" style="display: block;">${detail.id_detail}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                    <input class="form-control bordered-input" id="stok-terima-${index}" value=${detail.commercialdetail.qty}>
                        
                    </td>
                    <td style="border: 0.1px solid black;">
                        <div class="centered-text">
                            <button type="button" class="btn btn-primary">X</button>
                        </div>
                    </td>
                </tr>
            `;
            }
            else{
                
                newRowsEdit += `
                <tr>
                    <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                        <!-- Set the size of the <td> -->
                        <img src="${barang[index].imagedir}" alt="" style="width: 150px; height: 150px;">
                        <!-- Image size -->
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                        <p class="centered-text">
                            <b>${detail.kode || ''}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;" id="kode-detail-${index}">
                        <p class="centered-text">
                         <b id="idfcllcl-${index}" style="display: block;">${detail.id}</b>
                          <b id="name-detail-${index}" >${detail.name}</b>
                              <b id="category-detail-${index}"style="display: block;">${detail.category}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-input-${index}">${detail.qty || ''}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                        <p class="centered-text">
                            <b id="stok-update-${index}">${detail.commercialdetail.qty_terima}</b>
                            <b id="stok-idbarang-${index}" style="display: block;">${detail.id_barang}</b>
                                                    <b id="stok-iddetail-${index}" style="display: block;">${detail.id_detail}</b>
                        </p>
                    </td>
                    <td style="border: 0.1px solid black;">
                    <input class="form-control bordered-input" id="stok-terima-${index}" value=${detail.commercialdetail.qty}>
                        
                    </td>
                 
                </tr>
            `;
            }
         
        }
    });
    $('#tbody_addbarang').append(newRowsEdit);

           
                    
                      
    

    $(document).on('change', '#pembelian_tambah_id', function() {
        
        

                    $('#tbody_addbarang').empty()
                    const selected_id = $(this).val();
   
                    const otherChars =selected_id.substring(4);
                    
                    const firstThreeChars = selected_id.substring(0, 3);
                    if(firstThreeChars=='FCL'){
                      
                        
                        $.ajax({
                            url:'',
                            data:{
                                menu:'fcl_import',
                                id:selected_id
                            },
                            success: function(response){
                                let newRows = ''; 
                                response.detail.forEach(function(detail,index) {
                                    newRows += `
                                        <tr>
                                            <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                                                <!-- Set the size of the <td> -->
                                                <img src="${detail.image}" style="width: 150px; height: 150px;">
                                                <!-- Image size -->
                                            </td>
                                            <td style=" border:0.1px solid black;" id="kode-detail-${index}"> 
                                                <p class="centered-text">
                                                    <b>${detail.kode}</b>
                                                </p>
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <p class="centered-text" >
                                                    <b id="idfcllcl-${index}" style="display: none;">${detail.id}</b>
                                                    <b id="name-detail-${index}">${detail.name}</b>
                                                    <b id="category-detail-${index}"style="display: none;">${detail.category}</b>
                                                </p>
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <p class="centered-text">
                                                    <b id="stok-input-${index}">${detail.qty_input}</b>
                                                </p>
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <p class="centered-text">
                                                    <b id="stok-update-${index}">${detail.qty_terima}</b>
                                                    <b id="stok-idbarang-${index}" style="display: none;">${detail.idbarang}</b>
                                                    <b id="stok-iddetail-${index}" style="display: none;">${detail.iddetail}</b>
                                                </p>
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <input class="form-control bordered-input" id="stok-terima-${index}" value="0">
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <div class="centered-text">
                                                    <button type="button" class="btn btn-primary">X</button>
                                                </div>
                                            </td>
                                        </tr>
                                    `;
                                });

                                $('#tbody_addbarang').append(newRows);
                                return;
                            }
                        })
                        return;
                    }
                    else if (firstThreeChars == 'lcl') {
                        $.ajax({
                            url: '',
                            data: {
                                menu: 'lcl_import',
                                id: selected_id
                            },
                            success: function(response) {
                                
                                
                                // Clear the existing rows to prevent duplicates
                                $('#tbody_addbarang').empty();

                                let newRows = '';  // Initialize an empty string to store all the new rows

                                // Loop through each item in response.detail
                                response.detail.forEach(function(detail, index) {
                                    newRows += `
                                        <tr>
                                            <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                                                <!-- Set the size of the <td> -->
                                                <img src="${detail.image}" style="width: 150px; height: 150px;">
                                                <!-- Image size -->
                                            </td>
                                            <td style="border: 0.1px solid black;" id="kode-detail-${index}"> 
                                                <p class="centered-text">
                                                    <b>${detail.kode}</b>
                                                </p>
                                            </td>
                                            <td style="border: 0.1px solid black;">
                                                <p class="centered-text">
                                                    <b id="idfcllcl-${index}" style="display: none;">${detail.id}</b>
                                                    <b id="name-detail-${index}">${detail.name}</b>
                                                    <b id="category-detail-${index}" style="display: none;">${detail.category}</b>
                                                </p>
                                            </td>
                                            <td style="border: 0.1px solid black;">
                                                <p class="centered-text">
                                                    <b id="stok-input-${index}">${detail.qty_input}</b>
                                                </p>
                                            </td>
                                            <td style="border: 0.1px solid black;">
                                                <p class="centered-text">
                                                    <b id="stok-update-${index}">${detail.qty_terima}</b>
                                                    <b id="stok-idbarang-${index}" style="display: none;">${detail.idbarang}</b>
                                                    <b id="stok-iddetail-${index}" style="display: none;">${detail.iddetail}</b>
                                                </p>
                                            </td>
                                            <td style="border: 0.1px solid black;">
                                                <input class="form-control bordered-input" id="stok-terima-${index}" value="0">
                                            </td>
                                            <td style="border: 0.1px solid black;">
                                                <div class="centered-text">
                                                    <button type="button" class="btn btn-primary">X</button>
                                                </div>
                                            </td>
                                        </tr>
                                    `;
                                });
                           
                                // Append the new rows to the table body
                                $('#tbody_addbarang').append(newRows);
                            }
                        });
                    }


    })


    $('#submitbutton').on('click', function() {
        var database=$('#database_tambah_id').val()
        
        var tgl_terima = $('#tgl_request_tambah').val()
        
        var id_pembelian = $('#pembelian_tambah_id').val()
        
        var ekspedisi = $('#ekspedisi_id').val()
        
        var gudang = $('#gudang_id').val()
        

        var keterangan = $('#keterangan').val()
        var id_penerimaan = $('#id_penerimaan').val()
        // Arrays to store the values of each detail
        var kode_detail = [];
        var name_detail = [];
        var category_detail = [];
        var id_barang = [];
        var id_detail = [];
        var id_fcl_lcl =[];
        var stok_input  = [];
        var stok_update = [];
        var stok_terima = [];
        // Loop through all the <td> elements with id starting with 'name-detail' and collect their text
        $('b[id^="idfcllcl"]').each(function() {
            var idfcllcl = $(this).text();
            
            id_fcl_lcl.push(idfcllcl); // Push each value into the name_detail array
        });
        $('b[id^="stok-iddetail"]').each(function() {
            var iddetail = $(this).text();
            
            id_detail.push(iddetail); // Push each value into the name_detail array
        });
        $('b[id^="stok-idbarang"]').each(function() {
            var idbarang = $(this).text();
            
            id_barang.push(idbarang); // Push each value into the name_detail array
        });
        $('b[id^="category-detail"]').each(function() {
            var categoris = $(this).text();
            
            category_detail.push(categoris); // Push each value into the name_detail array
        });
        $('b[id^="name-detail"]').each(function() {
            var name = $(this).text();
            
            name_detail.push(name); // Push each value into the name_detail array
        });
        $('b[id^="stok-input"]').each(function() {
            var stok = $(this).text();
            
            stok_input.push(stok); // Push each value into the name_detail array
        });
        $('b[id^="stok-update"]').each(function() {
            var stok = $(this).text();
            
            stok_update.push(stok); // Push each value into the name_detail array
        });
        $('input[id^="stok-terima"]').each(function() {
            var stok = $(this).val();
            
            stok_terima.push(stok); // Push each value into the name_detail array
        });

       


        var dataToSend = {
            id_penerimaan:id_penerimaan,
            database: database,
            tgl_terima: tgl_terima,
            id_pembelian: id_pembelian,
            ekspedisi: ekspedisi,
            gudang: gudang,
            keterangan: keterangan,
            details: [],
     
            
        };

        // Assuming the arrays have the same length, loop through them and create an array of objects
        for (var i = 0; i < name_detail.length; i++) {
            dataToSend.details.push({
                name_detail: name_detail[i],
                stok_input: stok_input[i],
                stok_update: stok_update[i],
                stok_terima: stok_terima[i],
                id_detail:id_detail[i],
                id_barang:id_barang[i],
                id:id_fcl_lcl[i],
                category_detail:category_detail[i]
            });
        }


        
      
      $.ajax({
            url:'{{ route('admin.penerimaan_pembelian') }}',
            data: {
                menu:'edit_penerimaan',
                form:dataToSend
            },
            success: function(response){
                
                if(response.auth===false){
                     Swal.fire({
                        icon:'warning',
                        title:'Warning!',
                        text:response.msg
                    })
                    return;
                }else{

                    Swal.fire({
                        icon:'success',
                        title:'Success',
                        text:response.msg
                        }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.href='data_pembelian_penerimaan';
                        }
                    })
                    return;
                }
            }
        })
    });

})
var tbody_addekspedisi = $('#tbody_addekspedisi');

</script>