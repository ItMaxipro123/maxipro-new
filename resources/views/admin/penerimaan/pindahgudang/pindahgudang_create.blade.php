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
                <label for="tglTerimaLabel">Tanggal Terima <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


            
            <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder= "Tanggal Terima" required >
            </div>
        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="barangPindalabel">Baramg Pindah Gudang <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">
                
                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="barang_pindahgudang_id" name="barang_pindahgudang" required>
                        <option value="">Pilih Barang</option>
                        @foreach($Data['msg']['pindahgudangPT'] as $index => $result)
                            @foreach($result['detail'] as $key => $result_name)

                                @if($result_name['stok_input'] - $result_name['stok_terima']!=0)
                                    <option value="{{ $result['code'] }}">{{ $result['code'] }} - {{ $result_name['barang_nama'] }} ({{ $result_name['stok_input'] }})</option>
                                @endif    
                            @endforeach
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
                            <td style="font-weight:bold; border: 0.1px solid black">ID Transfer</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Barang</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Stok Input</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Stok Terima</td>
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
    $(document).ready(function() {

  
        $('#database_tambah_id').select2({
            placeholder: 'Pilih Database',
            allowClear: true,
            width: '100%'
        });

        $('#barang_pindahgudang_id').select2({
            placeholder: 'Pilih Barang',
            allowClear: true,
            width: '100%'
        });
        
        flatpickr("#tgl_request_tambah", {
            dateFormat: "Y-m-d",
            
            disableMobile: true
        });

        $('#database_tambah_id').on('change', function() {
            var selectedValue = $(this).val();
            
            $(document).off('change', '#barang_pindahgudang_id');
            if(selectedValue=== 'UD'){
    
               
                var pembelianDropdown = $('#barang_pindahgudang_id');
                pembelianDropdown.empty();
                pembelianDropdown.append('<option value="">Pilih Barang </option>');
                @foreach($Data['msg']['pindahgudangUD'] as $index => $result)
                    @foreach($result['detail'] as $key => $result_name)
                        @if($result_name['stok_input'] - $result_name['stok_terima']!=0)
                            var option = $('<option></option>')
                                .attr('value', '{{ $result['code'] }}')
                                .attr('data-id', '{{ $result_name['id'] }}')
                                .attr('data-stok_input', '{{ $result_name['stok_input'] }}')
                                .attr('data-stok_terima', '{{ $result_name['stok_terima'] }}')
                        
                                .attr('data-type', 'UD')
                                .attr('data-name','{{ $result_name['barang_nama'] }}')
                                .text('{{ $result['code'] }} - ' +'{{ $result_name['barang_nama'] }}' +' ({{ $result_name['stok_input'] }})');
                            pembelianDropdown.append(option);
                        @endif
                    
                    @endforeach
                @endforeach
                var id_barang = [];
                var kode = [];
                var name = [];
                var stok_input = [];
                var stok_terima = [];
                var stok_terima_new_input = [];

                $(document).on('change', '#barang_pindahgudang_id', function() {
                        $('#tbody_addbarang').empty();
                        let newRows = '';
                        const selected_code = $(this).val();
                        kode.push(selected_code);

                        const selected_id = $('#barang_pindahgudang_id option:selected').attr('data-id');
                        id_barang.push(selected_id);

                        const selected_name = $('#barang_pindahgudang_id option:selected').attr('data-name');
                        name.push(selected_name);

                        const selected_stok_input = $('#barang_pindahgudang_id option:selected').attr('data-stok_input');
                        stok_input.push(selected_stok_input);

                        const selected_stok_terima = $('#barang_pindahgudang_id option:selected').attr('data-stok_terima');
                        stok_terima.push(selected_stok_terima);

                            id_barang.forEach(function(detail, index) {
                                newRows += `
                                    <tr id="row-${index}">
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <b id="stok-input-${index}">${kode[index]}</b>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <b id="stok-input-${index}">${name[index]}</b>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <b id="stok-input-${index}">${stok_input[index]}</b>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <input class="form-control bordered-input" style="border: 0.1px solid black;text-align:center;" id="stok-terima-${index}" value="${stok_terima[index]}" data-index="${index}">
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <button class="btn btn-danger delete-row" data-index="${index}">Delete</button>
                                        </td>
                                    </tr>
                                `;
                                
                            });
                            $(document).on('input', '.bordered-input', function() {
                                const index = $(this).data('index'); // Get the index of the row
                                const value = $(this).val();         // Get the current input value

                                // Update stok_terima array with the new value
                                stok_terima_new_input[index] = value;
                                
                              
                            });
                            $('#tbody_addbarang').append(newRows);

                           
                });
                
                // Event listener untuk tombol delete
                $(document).on('click', '.delete-row', function() {
                    const index = $(this).data('index');

                    // Hapus item dari array sesuai dengan index
                    id_barang.splice(index, 1);
                    kode.splice(index, 1);
                    name.splice(index, 1);
                    stok_input.splice(index, 1);
                    stok_terima.splice(index, 1);
                    stok_terima_new_input.splice(index, 1);
                    
                    // Hapus baris dari tabel
                    $(`#row-${index}`).remove();

                    // Render ulang tabel setelah penghapusan
                    $('#tbody_addbarang').empty();
                    let updatedRows = '';
                    
                    id_barang.forEach(function(detail, index) {
                        updatedRows += `
                            <tr id="row-${index}">
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b id="stok-input-${index}">${kode[index]}</b>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b id="stok-input-${index}">${name[index]}</b>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b id="stok-input-${index}">${stok_input[index]}</b>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <input class="form-control bordered-input" style="border: 0.1px solid black;text-align:center;" id="stok-terima-${index}" value="${stok_terima[index]}">
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <button class="btn btn-danger delete-row" data-index="${index}">Delete</button>
                                </td>
                            </tr>
                        `;
                    });

                    $('#tbody_addbarang').append(updatedRows);
                });
                
                $('#submitbutton').on('click', function(){
                    var database = $('#database_tambah_id').val()
                    var tgl_terima = $('#tgl_request_tambah').val()
                    var formSend = {
                        database:database,
                        tgl_terima:tgl_terima,
                        id_pindahgudangdetail : id_barang,
                        nama:name,
                        stok_terima:stok_terima_new_input,
                    }
                    
                    $.ajax({
                        url:'{{ route('admin.penerimaan_pindahgudang') }}',
                        data: {
                            menu:'created_pindahgudang',
                            form:formSend
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
                                        window.location.reload();
                                    }
                                })
                                return;
                            }
                        }
                    })
                                
                })
            }else if(selectedValue=== 'PT'){
    
              
                var pembelianDropdown = $('#barang_pindahgudang_id');
                pembelianDropdown.empty();
                pembelianDropdown.append('<option value="">Pilih Barang </option>');
                @foreach($Data['msg']['pindahgudangPT'] as $index => $result)
                    @foreach($result['detail'] as $key => $result_name)
                        @if($result_name['stok_input'] - $result_name['stok_terima']!=0)
                            var option = $('<option></option>')
                                .attr('value', '{{ $result['code'] }}')
                                .attr('data-id', '{{ $result_name['id'] }}')
                                .attr('data-stok_input', '{{ $result_name['stok_input'] }}')
                                .attr('data-stok_terima', '{{ $result_name['stok_terima'] }}')
                        
                                .attr('data-type', 'PT')
                                .attr('data-name','{{ $result_name['barang_nama'] }}')
                                .text('{{ $result['code'] }} - ' +'{{ $result_name['barang_nama'] }}' +' ({{ $result_name['stok_input'] }})');
                            pembelianDropdown.append(option);
                        @endif
                    
                    @endforeach
                @endforeach
                var id_barang = [];
                var kode = [];
                var name = [];
                var stok_input = [];
                var stok_terima = [];
                var stok_terima_new_input = [];

                $(document).on('change', '#barang_pindahgudang_id', function() {
                        $('#tbody_addbarang').empty();
                        let newRows = '';
                        const selected_code = $(this).val();
                        kode.push(selected_code);

                        const selected_id = $('#barang_pindahgudang_id option:selected').attr('data-id');
                        id_barang.push(selected_id);

                        const selected_name = $('#barang_pindahgudang_id option:selected').attr('data-name');
                        name.push(selected_name);

                        const selected_stok_input = $('#barang_pindahgudang_id option:selected').attr('data-stok_input');
                        stok_input.push(selected_stok_input);

                        const selected_stok_terima = $('#barang_pindahgudang_id option:selected').attr('data-stok_terima');
                        stok_terima.push(selected_stok_terima);

                            id_barang.forEach(function(detail, index) {
                                newRows += `
                                    <tr id="row-${index}">
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <b id="stok-input-${index}">${kode[index]}</b>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <b id="stok-input-${index}">${name[index]}</b>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <b id="stok-input-${index}">${stok_input[index]}</b>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <input class="form-control bordered-input" style="border: 0.1px solid black;text-align:center;" id="stok-terima-${index}" value="${stok_terima[index]}" data-index="${index}">
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <button class="btn btn-danger delete-row" data-index="${index}">Delete</button>
                                        </td>
                                    </tr>
                                `;
                                
                            });
                            $(document).on('input', '.bordered-input', function() {
                                const index = $(this).data('index'); // Get the index of the row
                                const value = $(this).val();         // Get the current input value

                                // Update stok_terima array with the new value
                                stok_terima_new_input[index] = value;
                                
                              
                            });
                            $('#tbody_addbarang').append(newRows);

                           
                });
                
                // Event listener untuk tombol delete
                $(document).on('click', '.delete-row', function() {
                    const index = $(this).data('index');

                    // Hapus item dari array sesuai dengan index
                    id_barang.splice(index, 1);
                    kode.splice(index, 1);
                    name.splice(index, 1);
                    stok_input.splice(index, 1);
                    stok_terima.splice(index, 1);
                    stok_terima_new_input.splice(index, 1);
                    
                    // Hapus baris dari tabel
                    $(`#row-${index}`).remove();

                    // Render ulang tabel setelah penghapusan
                    $('#tbody_addbarang').empty();
                    let updatedRows = '';
                    
                    id_barang.forEach(function(detail, index) {
                        updatedRows += `
                            <tr id="row-${index}">
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b id="stok-input-${index}">${kode[index]}</b>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b id="stok-input-${index}">${name[index]}</b>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b id="stok-input-${index}">${stok_input[index]}</b>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <input class="form-control bordered-input" style="border: 0.1px solid black;text-align:center;" id="stok-terima-${index}" value="${stok_terima[index]}">
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <button class="btn btn-danger delete-row" data-index="${index}">Delete</button>
                                </td>
                            </tr>
                        `;
                    });

                    $('#tbody_addbarang').append(updatedRows);
                });
                
                $('#submitbutton').on('click', function(){
                    var database = $('#database_tambah_id').val()
                    var tgl_terima = $('#tgl_request_tambah').val()
                    var formSend = {
                        database:database,
                        tgl_terima:tgl_terima,
                        id_pindahgudangdetail : id_barang,
                        nama:name,
                        stok_terima:stok_terima_new_input,
                    }
                    
                    $.ajax({
                        url:'{{ route('admin.penerimaan_pindahgudang') }}',
                        data: {
                            menu:'created_pindahgudang',
                            form:formSend
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
                                        if (result.isConfirmed) {
                                            // First, replace the current state with the desired URL
                                            history.pushState({ page: 'penerimaan_pindahgudang' }, '', '{{ route('admin.penerimaan_pindahgudang') }}');
                                            
                                            // Then reload the page
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
                                
                })
            }

        })

        


    })

 

</script>