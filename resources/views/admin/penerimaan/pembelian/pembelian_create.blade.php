
<div class="col-md-12 d-flex justify-content-end">
    <button type="button" id="backbtn" class="btn btn-large btn-warning">Kembali </button>
</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Database <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="database_tambah_id" name="database_tambah_name" required>
                        <option value="">Database</option>
                        <option value="PT">PT</option>
                        <option value="UD">UD</option>
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


            
            <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder= "Tanggal Terima" required >
            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

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
                    
                        <option value="{{ $result['invoice'] }}">LCL - {{ $result['invoice'] }} ({{ $tot_detail_pembelian_lcl[$result['id']]}}) </option>
                    @endif
                @endforeach
                
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
                        <option value="{{ $data['invoice_no'] }}" data-type="UD">FCL - INV-{{ $data['invoice_no'] }} ({{ $total[$index] }})</option>
                    @endif
                @endforeach
            </select>

            </div>
        </div>

</div>

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
                            <td style="font-weight:bold; border: 0.1px solid black">Action</td>
                        </tr>
                    </thead>
                    <tbody id="tbody_addbarang" style="background-color:white;">
                        <!-- Rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="row" style="padding-top:25px;">

    
    <div class="col-md-6">
        <label class="col-lg-3 control-label" style="width:100%;padding-left:20px;" for="id_gudang">Ekspedisi <span style="color: red;">(Wajib Diisi)</span></label>
        <div style="position: relative; width: 100%;padding-left:20px;">
            <select class="form-control" name="id_db" id="ekspedisi_id" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                    <option value="">Pilih Ekspedisi</option>
                        @foreach($Data['msg']['ekspedisi'] as $index =>$ekspedisi)
                    <option value="{{ $ekspedisi['id'] }}">{{ $ekspedisi['name'] }}</option>
            
                        @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <label class="col-lg-3 control-label" style="width:100%;padding-left:20px;" for="id_gudang">Gudang <span style="color: red;">(Wajib Diisi)</span></label>
        <div style="position: relative; width: 100%;padding-left:20px;">
            <select class="form-control" name="id_db" id="gudang_id" style="border: 1px solid #ced4da; width: 100%; padding-left: 20px;" required>
                <option value="">Pilih Gudang</option>
                    @foreach($Data['msg']['gudang'] as $index =>$gudang)
                <option value="{{ $gudang['id'] }}">{{ $gudang['name'] }}</option>
        
                    @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
    <div class="col-md-6">

            <label class="col-lg-3 control-label" style="font-size: 15px;padding-left:20px;" for="">Keterangan <span style="color: red;">(Wajib Diisi)</span></label>
                                                        <div style="position: relative; width: 100%;padding-left:20px;">
                                                            <textarea style="border: 1px solid #ced4da;width:100%;height:100px;padding-left:20px;" name="" id="keterangan" placeholder="Keterangan" class="form-control" required></textarea>
                                                        </div>
    </div>
</div>                                                    

<div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
    <button type="button" id="submitbutton" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
</div>

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
    var linkPrevious = @json($history);
    const currentUrl = window.location.pathname;
    console.log('currentUrl')
    document.getElementById('backbtn').addEventListener('click', function () {
        // Periksa apakah URL saat ini adalah '/admin/tambah_pembelian_penerimaan'
        console.log('masuk',linkPrevious)
        if (currentUrl != linkPrevious) {
            console.log('masuk',linkPrevious)
            window.location.href = linkPrevious;
        }
        else{
            window.location.href = '/admin/data_pembelian_penerimaan';
            
        }
        
    });
$(document).ready(function() {

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

    $('#database_tambah_id').on('change', function() {
            var selectedValue = $(this).val();
            console.log('berubah')

            $(document).off('change', '#pembelian_tambah_id');

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

                // Mengatur event listener untuk memproses pemilihan di option select
                $(document).on('change', '#pembelian_tambah_id', function() {
                    $('#tbody_addbarang').empty();
                    const selected_id = $(this).val();
                    const otherChars = selected_id.substring(4);
                    const firstThreeChars = selected_id.substring(0, 3);

                    let ajaxMenu = '';
                    if (firstThreeChars === 'FCL') {
                        ajaxMenu = 'fcl_import';
                    } else if (firstThreeChars === 'lcl') {
                        ajaxMenu = 'lcl_import';
                    }

                    if (ajaxMenu) {
                        $.ajax({
                            url: '',
                            data: {
                                menu: ajaxMenu,
                                id: selected_id
                            },
                            success: function(response) {
                                let newRows = ''; // Initialize an empty string to store all the new rows

                                // Loop through each item in response.detail
                                response.detail.forEach(function(detail, index) {
                                    newRows += `
                                        <tr>
                                            <td class="text-center" style="border: 0.1px solid black;width: 150px; height: 150px;">
                                                <img src="${detail.image}" style="width: 150px; height: 150px;">
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
                                                    <button type="button" id="delete_barang" class="btn btn-primary">X</button>
                                                </div>
                                            </td>
                                        </tr>
                                    `;
                                });

                                $('#tbody_addbarang').append(newRows);
                            }
                        });
                    }
                });
            }
            else if (selectedValue === 'PT') {

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
                
                //untuk memproses import data ke tabel ketika memilih di option select
                $(document).on('change', '#pembelian_tambah_id', function() {
                    $('#tbody_addbarang').empty()
                    const selected_id = $(this).val();
                    console.log('selectedValue',selected_id)
                    const otherChars =selected_id.substring(4);
                    // console.log('otherChars',otherChars)
                    const firstThreeChars = selected_id.substring(0, 3);
                    // console.log('firstthreecars',firstThreeChars)
                    if(firstThreeChars=='FCL'){
                        $.ajax({
                            url:'',
                            data:{
                                menu:'fcl_import',
                                id:selected_id
                            },
                            success: function(response){
                                console.log('res',response)
                                let newRows = '';  // Initialize an empty string to store all the new rows

                                // Loop through each item in response.detail
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
                                                    <b id="category-detail-${index}" style="display: none;">${detail.category}</b>
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
                                                    <button type="button" id="delete_barang" class="btn btn-primary">X</button>
                                                </div>
                                            </td>
                                        </tr>
                                    `;
                                });

                                $('#tbody_addbarang').append(newRows);
                                $(document).on('click', '#delete_barang', function() {
                                    $(this).closest('tr').remove(); // Menghapus baris induk (tr) dari tombol yang diklik
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle error jika terjadi kesalahan
                                console.error(xhr.responseText);
                                return;
                            }
                        })
                        return 0;
                    }else if(firstThreeChars=='lcl'){
                        
                        $.ajax({
                            url:'',
                            data:{
                                menu:'lcl_import',
                                id:selected_id
                            },
                            success: function(response){
                                console.log('res pt',response)
                                let newRows = '';  // Initialize an empty string to store all the new rows

                                // Loop through each item in response.detail
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
                                                    <b id="name-detail-${index}" >${detail.name}</b>
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
                                                    <b id="stok-update-${index}" >${detail.qty_terima}</b>
                                                    <b id="stok-idbarang-${index}" style="display: none;">${detail.idbarang}</b>
                                                    <b id="stok-iddetail-${index}" style="display: none;">${detail.iddetail}</b>
                                                </p>
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <input class="form-control bordered-input" id="stok-terima-${index}" value="0">
                                            </td>
                                            <td style=" border: 0.1px solid black;">
                                                <div class="centered-text">
                                                    <button type="button" id="delete_barang" class="btn btn-primary">X</button>
                                                </div>
                                            </td>
                                        </tr>
                                    `;
                                });

                                $('#tbody_addbarang').append(newRows);
                                $(document).on('click', '#delete_barang', function() {
                                    $(this).closest('tr').remove(); // Menghapus baris induk (tr) dari tombol yang diklik
                                });
                                
                            },
                            error: function(xhr, status, error) {
                                // Handle error jika terjadi kesalahan
                                console.error(xhr.responseText);
                                return;
                            }
                        })
                        return 0;
                    } 
                });
                return 0;
            }

         
    });
   
    $('#submitbutton').on('click', function() {
        var database=$('#database_tambah_id').val()
        
        var tgl_terima = $('#tgl_request_tambah').val()
        
        var id_pembelian = $('#pembelian_tambah_id').val()
        
        var ekspedisi = $('#ekspedisi_id').val()
        
        var gudang = $('#gudang_id').val()
        

        var keterangan = $('#keterangan').val()
        
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
            database: database,
            tgl_terima: tgl_terima,
            id_pembelian: id_pembelian,
            ekspedisi: ekspedisi,
            gudang: gudang,
            keterangan: keterangan,
            details: []
            
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
                menu:'tambah_penerimaan',
                form:dataToSend
            },
            success: function(response){
                console.log('response',response)
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
                            window.location.reload();
                        }
                    })
                    return;
                }
            },
            error: function(xhr, status, error) {
                    // Handle error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    return;
            }
        })
    });

})

</script>