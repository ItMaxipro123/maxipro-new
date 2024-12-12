<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Database <span style="color: red;">*</span></label>
                <input type="hidden" id="id_pindahgudang" value="{{ $Data['msg']['penerimaan']['id'] }}">          
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="database_tambah_id" name="database_tambah_name" required>
                        <option value="">Database</option>
                        <option value="PT" {{ $Data['msg']['penerimaan']['name_db'] == 'PT' ? 'selected' : '' }}>PT</option>
                        <option value="UD" {{ $Data['msg']['penerimaan']['name_db'] == 'UD' ? 'selected' : '' }}>UD</option>
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
                <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder= "Tanggal Terima" value="{{ $Data['msg']['penerimaan']['tgl_terima'] }}">
            </div>

        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="barangPindalabel">Barang Pindah Gudang <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">
                
                <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="barang_pindahgudang_id" name="barang_pindahgudang" required>
                        <option value="">Pilih Barang</option>
                        @foreach($Data['msg']['pindahgudangPT'] as $index => $result)
                            @foreach($result['detail'] as $key => $result_name)

                                @if($result_name['stok_input'] - $result_name['stok_terima']!=0)
                                    <option value="{{ $result['code'] }}" data-stok_input="{{ $result_name['stok_input'] }}"
                                    data-stok_terima="{{ $result_name['stok_terima'] }}" data-id="{{ $result_name['id'] }}" data-name="{{ $result_name['barang_nama'] }}">{{ $result['code'] }} - {{ $result_name['barang_nama'] }} ({{ $result_name['stok_input'] }})</option>
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
            
            <div class="table-responsive" style="padding-left:25px;">
                <table class="table table-bordered">
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
              
                        @foreach($Data['msg']['detail'] as $key => $result_detail)
                        
                        <input type="hidden" id="id_pindahgudangdetail_{{ $key }}" value="{{ $result_detail['id_pindahgudangdetail'] }}">
                        @endforeach
                        @if(isset($Data['msg']['pindahgudangPTFilter']) && !empty($Data['msg']['pindahgudangPTFilter']))
                        
                            @foreach($Data['msg']['pindahgudangPTFilter'] as $index => $result)
                            <tr>

                                <td style="border: 0.1px solid black;font-weight:bold;" id="code_{{ $index }}">{{ $result['code'] }}</td>
                                <td style="border: 0.1px solid black;font-weight:bold;">{{ $result['barang_nama'] }}</td>
                                <td style="border: 0.1px solid black; font-weight:bold; text-align:center; vertical-align: center;">{{ $result['stok_input'] }}</td>
                                <td style="border: 0.1px solid black;font-weight:bold;" ><input type="number" class="form-control" style="border: 0.1px solid black;text-align:center;" id="stok_terima_{{ $index }}" value="{{ $result_detail['qty'] }}"></td>
                                <td style="border: 0.1px solid black;font-weight:bold;">
                                    <button class="btn btn-danger delete-row" data-index="{{ $index }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                 
                            @foreach($Data['msg']['pindahgudangUDFilter'] as $index => $result)
                                <tr>

                                    <td style="border: 0.1px solid black"id="code_{{ $index }}">{{ $result['code'] }}</td>
                                    <td style="border: 0.1px solid black">{{ $result['barang_nama'] }}</td>
                                    <td style="border: 0.1px solid black; text-align:center; vertical-align: center;">{{ $result['stok_input'] }}</td>
                                    <td style="border: 0.1px solid black"><input type="number" class="form-control" style="border: 0.1px solid black;text-align:center;" id="stok_terima_{{ $index }}" value="{{ $result_detail['qty'] }}"></td>
                                    <td style="border: 0.1px solid black;">
                                        <button class="btn btn-danger delete-row" data-index="{{ $index }}">X</button>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody id="tbody_addbarang_new" style="background-color:white;">
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
        var id_barang_new = [];
        var kode_new = [];
        var name_new = [];
        var stok_input_new = [];
        var stok_terima_new = [];
        

        $(document).on('change', '#barang_pindahgudang_id', function() {
            let newRows = '';
            const selected_code = $(this).val();
            kode_new.push(selected_code);
            
            const selected_id = $('#barang_pindahgudang_id option:selected').attr('data-id');
            id_barang_new.push(selected_id);
            

            const selected_name = $('#barang_pindahgudang_id option:selected').attr('data-name');
            name_new.push(selected_name);

            const selected_stok_input = $('#barang_pindahgudang_id option:selected').attr('data-stok_input');
            stok_input_new.push(selected_stok_input);

            const selected_stok_terima = $('#barang_pindahgudang_id option:selected').attr('data-stok_terima');
            stok_terima_new.push(selected_stok_terima);
            $('#tbody_addbarang_new').empty();
            id_barang_new.forEach(function(detail, index) {
                newRows += `
                    <tr id="row-${index}">
                        <td style="border: 0.1px solid black;">
                            <p class="centered-text">
                                <p id="stok-input-${index}">${kode_new[index]}</p>
                            </p>
                        </td>
                        <td style="border: 0.1px solid black;">
                            <p class="centered-text">
                                <p id="stok-input-${index}">${name_new[index]}</p>
                            </p>
                        </td>
                        <td style="border: 0.1px solid black; text-align:center;">
                            <p class="centered-text">
                                <p id="stok-input-${index}">${stok_input_new[index]}</p>
                            </p>
                        </td>
                        <td style="border: 0.1px solid black;">
                            <input class="form-control bordered_input" style="border: 0.1px solid black; text-align:center;" id="stokterima${index}" value="${stok_terima_new[index]}" data-index="${index}">
                        </td>
                        <td style="border: 0.1px solid black;">
                            <button class="btn btn-danger delete-row2" data-index="${index}">Delete2</button>
                        </td>
                    </tr>
                `;
            });
            $(document).on('click', '.delete-row2', function() {
                const row = $(this).closest('tr');
                const idToRemove = row.data('id'); // Ambil id dari data-id di elemen tr

               

                // Hapus baris (tr) yang terkait dengan tombol delete yang diklik
                row.remove();

                // Hapus nilai yang sesuai dari array id_barang_new
                id_barang_new = id_barang_new.filter(id => id !== idToRemove);

              
            });

            $('#tbody_addbarang_new').append(newRows);
        });

        // Listen to input changes on dynamically created inputs with the class `bordered_input`
        $(document).on('input', '.bordered_input', function() {
            const index = $(this).data('index'); // Get the index of the row
            const value = $(this).val();         // Get the current input value
            

            // Optionally update `stok_terima_new` array with the new value if needed
            stok_terima_new[index] = value;
        });


  
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
        let initialDatabaseValue = $('#database_tambah_id').val();

        $('#database_tambah_id').on('change', function() {
            var selectedValue = $(this).val();
            initialDatabaseValue =selectedValue
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
                var id_barang_new = [];
                var kode_new = [];
                var name_new = [];
                var stok_input_new = [];
                var stok_terima_new = [];
                var stok_terima_new_input = [];

                $(document).on('change', '#barang_pindahgudang_id', function() {
                    $('#tbody_addbarang_new').empty();
                    $('#tbody_addbarang').empty();
                    let newRows = '';
                    const selected_code_new = $(this).val();
                    kode_new.push(selected_code_new);

                    const selected_id_new = $('#barang_pindahgudang_id option:selected').attr('data-id');
                    id_barang_new.push(selected_id_new);

                    const selected_name_new = $('#barang_pindahgudang_id option:selected').attr('data-name');
                    name_new.push(selected_name_new);

                    const selected_stok_input_new = $('#barang_pindahgudang_id option:selected').attr('data-stok_input');
                    stok_input_new.push(selected_stok_input_new);

                    const selected_stok_terima_new = $('#barang_pindahgudang_id option:selected').attr('data-stok_terima');
                    stok_terima_new.push(selected_stok_terima_new);

                    id_barang_new.forEach(function(detail, index) {
                        newRows += `
                            <tr id="row-${index}">
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b>${kode_new[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b>${name_new[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <b>${stok_input_new[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <input class="form-control stok-terima-input-new" style="border: 0.1px solid black;text-align:center;" id="stok_terima_${index}" value="${stok_terima_new[index]}" data-index="${index}">
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <button class="btn btn-danger delete-row" data-index="${index}">Delete</button>
                                </td>
                            </tr>
                        `;
                    });

                    $('#tbody_addbarang').append(newRows);
                });

                // Listen to changes on the dynamically added inputs with class `stok-terima-input-new`
                $(document).on('input', '.stok-terima-input-new', function() {
                    const index = $(this).data('index'); // Get the index of the row
                    const value = $(this).val(); // Get the current input value

                    // Update the stok_terima_new array with the new value
                    stok_terima_new[index] = value + ' new';
                    
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
                    $('#tbody_addbarang_new').empty();
                    // Render ulang tabel setelah penghapusan
                    $('#tbody_addbarang').empty();
                    let updatedRows = '';
                    
                    id_barang.forEach(function(detail, index) {
                        updatedRows += `
                            <tr id="row-${index}">
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <p id="stok-input-${index}">${kode[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <p id="stok-input-${index}">${name[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <p id="stok-input-${index}">${stok_input[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <input class="form-control bordered-input" id="stok_terima_${$index}" value="${stok_terima[index]}">
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
                    var id_penerimaangudang = $('#id_pindahgudang').val()
                    var stok_terima=[]
                    $('[id^="stok_terima_"').each(function() {
                        let id= $(this).attr('id')
                        let value = $(this).val()
                        stok_terima.push(value)
                        
                    })
                    var formSend = {
                        database:database,
                        tgl_terima:tgl_terima,
                        id_pindahgudangdetail : id_barang,
                        nama:name,
                        stok_terima:stok_terima,
                        id_penerimaangudang: id_penerimaangudang,
                    }
                    
                    $.ajax({
                        url: '{{ route('admin.edit_pindah_gudangbaru') }}',
                        data: {
                            menu:'edit',
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
                                        // window.location.reload();
                                        window.location.href='/admin/penerimaan_pindahgudang'
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
                    $('#tbody_addbarang_new').empty();
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
                                                <p id="stok-input-${index}">${kode[index]}</p>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <p id="stok-input-${index}">${name[index]}</p>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <p class="centered-text">
                                                <p id="stok-input-${index}">${stok_input[index]}</p>
                                            </p>
                                        </td>
                                        <td style="border: 0.1px solid black;">
                                            <input class="form-control" style="border: 0.1px solid black;text-align:center;" id="stok_terima_${index}" value="${stok_terima[index]}" data-index="${index}">
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
                    $('#tbody_addbarang_new').empty();
                    // Render ulang tabel setelah penghapusan
                    $('#tbody_addbarang').empty();
                    let updatedRows = '';
                    
                    id_barang.forEach(function(detail, index) {
                        updatedRows += `
                            <tr id="row-${index}">
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <p id="stok-input-${index}">${kode[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <p id="stok-input-${index}">${name[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <p class="centered-text">
                                        <p id="stok-input-${index}">${stok_input[index]}</p>
                                    </p>
                                </td>
                                <td style="border: 0.1px solid black;">
                                    <input class="form-control bordered-input" id="stok_terima_${index}" value="${stok_terima[index]}">
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

                    var id_penerimaangudang = $('#id_pindahgudang').val()
                    var stok_terima =[]
                    $('[id^="stok_terima_"').each(function() {
                        let id= $(this).attr('id')
                        let value = $(this).val()
                        stok_terima.push(value)
                        
                    })
                    var formSend = {
                        id_penerimaangudang: id_penerimaangudang,
                        database:database,
                        tgl_terima:tgl_terima,
                        id_pindahgudangdetail : id_barang,
                        nama:name,
                        stok_terima:stok_terima,
                    }
                    
                    $.ajax({
                        url: '{{ route('admin.edit_pindah_gudangbaru') }}',
                        data: {
                            menu:'edit',
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
                                        // window.location.reload();
                                        window.location.href='/admin/penerimaan_pindahgudang'
                                    }
                                })
                                return;
                            }
                        }
                    })
                                
                })
            }

        })

        if ($('#database_tambah_id').val() === initialDatabaseValue) {
            $('#submitbutton').on('click', function(){
                
                var id_penerimaangudang = $('#id_pindahgudang').val()
                var database =$('#database_tambah_id').val()
                var tgl_terima = $('#tgl_request_tambah').val()
                var code=[];
                var id_gudang_detail =[]
                var stok_terima =[]
                $('[id^="code_"').each(function() {
                    let id= $(this).attr('id')
                    let value = $(this).text()
                    code.push(value)
                })
                $('[id^="stok_terima_"').each(function() {
                    let id= $(this).attr('id')
                    let value = $(this).val()
                    stok_terima.push(value)
                    
                })
                $('[id^="id_pindahgudangdetail_"').each(function() {
          
                    let value = $(this).val()
                    id_gudang_detail.push(value)
                    
                })
                
                var stok_terima_combined = stok_terima.concat(stok_terima_new);
                var id_gudang_detail_combined = id_gudang_detail.concat(id_barang_new);
                var formSend = {
                    id_penerimaangudang: id_penerimaangudang,
                    database: database,
                    tgl_terima: tgl_terima,
                    code:code,
                    id_pindahgudangdetail: id_gudang_detail_combined,
                    stok_terima: stok_terima_combined

                }
                
             
                $.ajax({
                    url: '',
                    data: {
                        menu:'edit',
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
                                        // window.location.reload();
                                        window.location.href='/admin/penerimaan_pindahgudang'
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

 

</script>