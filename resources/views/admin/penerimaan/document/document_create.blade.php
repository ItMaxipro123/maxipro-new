<div class="col-md-12 d-flex justify-content-end">
    <button type="button" id="backbtn" class="btn btn-large btn-warning" >Kembali</button>
</div>


<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-2">
                <label for="databaselabel">Tanggal Terima <span style="color: red;">*</span></label>                            
            </div>
            
            <div class="col-md-10" style="padding-right: 1em; margin-top:0.5em;">
                <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder="Tanggal Terima">
                <input type="hidden" class="form-control custom-border" id="id_penerimaan" >
            </div>

        </div>

</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-2">
                <label for="pengirim_label">Pengirim <span style="color: red;">*</span></label>                            
            </div>
            <div class="col-md-10" style="padding-right: 1em; margin-top:0.5em;">
                <input type="text" class="form-control custom-border" id="pengirim_name" name="pengirim_name" placeholder="Pengirim">
            </div>
        </div>
</div>
<div class="form-group" style="padding-top:25px;">
    <div class="row">
        <div class="col-md-12" style="padding-left:35px;">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td style="font-weight:bold; border: 0.1px solid black">Nomor Dokumen</td>
                            <td style="text-align:center;font-weight:bold; border: 0.1px solid black">Action</td>
                            
                        </tr>
                    </thead>
                    <tbody id="tbody_barang"></tbody>
                   
                </table>
            </div>
        </div>
    </div>
    <div class="row" id="div_save"></div>
    <div class="row" id="div_keterangan"></div>
</div>
<div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
    <button type="button" id="submitbutton" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/baranglain/baranglain.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
        
        
        const previousUrl = document.referrer;
        const previousPath = new URL(previousUrl).pathname;
console.log('previousUrl:', previousUrl);    
console.log('previousPath:', previousPath);    
            $(document).ready(function() {
                var tbody=$('#tbody_barang');
                var arraydataBarang=[]
                    var div_save=$('#div_save').css({
                        'text-align': 'right'
                    });
                    var col_save = $('<div>',{
                        class:'col-md-12'
                    }).css({
                        'text-aligg':'right'
                    })
                    // Membuat tombol "Tambah Dokumen"
                    var buttonTambah = $('<button>', {
                        type: 'button', // Type button
                        class: 'btn btn-primary tambah-row', // Kelas button untuk styling
                        id: 'btn_tambah',
                        text: 'Tambah Dokumen' // Text yang ditampilkan pada button
                    });
                    col_save.append(buttonTambah)
                    div_save.append(col_save)

                    //Membuat keterangan
                    var div_keterangan =$('#div_keterangan').css({
                        'padding-left':'20px',
                        'margin-top':'10px'
                    });
                    var col_keterangan = $('<div>',{
                        class:'col-md-2'
                    })
                    var col_keterangan2 = $('<div>',{
                        class:'col-md-10'
                    })
                    var label_keterangan = $('<label>',{
                        for:'textarea_keterangan',
                        text:'Keterangan'
                    })
                    var text_area_keterangan = $('<textarea>',{
                        placeholder:'Keterangan',
                        id:'textarea_keterangan_edit',
                        class:'form-control',
                        
                    }).css({
                        'border': '1px solid #696868', // Gaya border
                        'border-radius': '5px', // Opsional: border melengkung
                        'padding': '10px' // Opsional: padding dalam textarea
                    });

                    col_keterangan.append(label_keterangan);
                    col_keterangan2.append(text_area_keterangan);

                    // Menambahkan kolom ke div_keterangan
                    div_keterangan.append(col_keterangan,col_keterangan2);
                    let dataBarangNew = [];
                    buttonTambah.on('click', function () {
                        let newItem = {
                           no_document: '', // Nama barang kosong untuk input pertama
                           
                        };
                        dataBarangNew.push(newItem);

                        console.log(dataBarangNew)
                        // Render ulang tabel berdasarkan array
                        renderTable();
                    })

                    function renderTable() {

                        // Looping array untuk membuat elemen <tr>
                        let trNew = $('<tr>');
                        dataBarangNew.forEach((itemNew, indexNew) => {
                            trNew.empty()
                            // Kolom untuk nama
                            let tdColumnNew = $('<td>').css({
                                'padding': 'auto',
                                'width': '80%',
                                'border': '0.1px solid black',
                                'font-weight': 'bold'
                            });
                            let inputColumnNew = $('<input>', {
                                type: 'text',
                                class: 'form-control',
                                value: '',
                                id: `no_document-${indexNew}`, // Berikan ID unik berdasarkan indeks
                            }).css({
                                'border': '1px solid #696868',
                                'color': 'black',
                                'padding': '10px',
                                'width': '100%'
                            }).on('input', function () {
                                // Update array saat input berubah
                                dataBarangNew[indexNew].no_document = $(this).val();
                                console.log(dataBarangNew)
                            });
                            let tdColumnNew2 = $('<td>').css({
                                'padding': 'auto',
                                'width': '20%',
                                'border': '0.1px solid black',
                                'font-weight': 'bold',
                                'text-align':'center'
                            });
                         
                            var buttonColumnNew = $('<button>', {
                                type: 'button', // Type button
                                class: 'btn btn-danger delete-row', // Kelas button untuk styling
                                id: 'btn_edit' + indexNew,
                                text:'X',  // Text yang ditampilkan pada button
                                'data-index':indexNew,
                            });


                            // Menambahkan input ke kolom
                            tdColumnNew.append(inputColumnNew);
                            tdColumnNew2.append(buttonColumnNew);
                           
                            

                            // Menambahkan kolom ke baris
                            trNew.append(tdColumnNew,tdColumnNew2);

                            // Menambahkan baris ke <tbody>
                            tbody.append(trNew);
                        });
                    }
                    $('#submitbutton').on('click',function(){
                        console.log('dataBarangNew',$('input[name="pengirim_name"]').val())
                        // console.log('dataBarangNew',arraydataBarang)
                        var dataSend = {
                            
                            dataNew:dataBarangNew,
                            keterangan:$('#textarea_keterangan_edit').val(),
                            
                            tgl_terima:$('#tgl_request_tambah').val(),
                            pengirim: $('#pengirim_name').val(),
                        }
                        console.log('dataSend',dataSend)
                        
                        $.ajax({
                            url: '{{ route('admin.penerimaan_document') }}', // Ganti dengan URL endpoint server Anda
                            type: 'GET',
                            data: {
                                dataSend:dataSend,
                                menu:'tambah_document'
                            }, // Konversi data menjadi JSON
                            
                            success: function (response) {
                                // Callback ketika permintaan berhasil
                                console.log('Data berhasil dikirim', response);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.msg,
                                });
                            },
                            error: function (xhr, status, error) {
                                // Callback ketika terjadi kesalahan
                                console.error('Gagal mengirim data:', status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan saat mengirim data.',
                                });
                            }
                        });
                    })
            })
            $(document).on('click', '#backbtn', function() {
                window.location.href='/admin/data_penerimaan_document'
            })
</script>