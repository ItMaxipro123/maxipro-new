
@if($menu=='edit_view')
<div class="col-md-12 d-flex justify-content-end">
    <button type="button" id="backbtn" class="btn btn-large btn-warning" >Kembali</button>
</div>


<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-2">
                <label for="databaselabel">Tanggal Terima <span style="color: red;">*</span></label>                            
            </div>
            
            <div class="col-md-10" style="padding-right: 1em; margin-top:0.5em;">
                <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" value="{{ $Data['msg']['penerimaan']['tgl_terima'] }}" >
                <input type="hidden"  class="form-control custom-border" id="id_penerimaan" value="{{ $Data['msg']['penerimaan']['id'] }}" >
            </div>

        </div>

</div>

<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-2">
                <label for="pengirim_label">Pengirim <span style="color: red;">*</span></label>                            
            </div>
            
            <div class="col-md-10" style="padding-right: 1em; margin-top:0.5em;">
                <input type="text" class="form-control custom-border" id="pengirim_name" name="pengirim_name" value="{{ $Data['msg']['penerimaan']['pengirim'] }}" >
                
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
                            <td style="font-weight:bold; border: 0.1px solid black">Barang</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Qty</td>
                            <td style="font-weight:bold; border: 0.1px solid black">Keterangan</td>
                            
                            <td style="text-align:center;font-weight:bold; border: 0.1px solid black">Action</td>
                            
                        </tr>
                    </thead>
                    <tbody id="tbody_barang"></tbody>
                    <tbody id="tbody_barang2"></tbody>
                   
                </table>
            </div>
        </div>
    </div>
    <div class="row" id="div_save"></div>
    <div class="row" id="div_keterangan"></div>
</div>
@endif
@if($menu=='edit_view')
<div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
    <button type="button" id="submitbutton" class="btn btn-primary" style="margin-left: auto;">Simpan</button>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/baranglain/baranglain.js"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
                           
            $(document).ready(function() {
                var dataBarang = @json($Data);
                
                // var arraydataBarang=[]
                var tbody=$('#tbody_barang');
                    var arraydataBarang=[]
                    dataBarang.msg.detail.forEach((item,itemIndex) => {
                        
                        var tr=$('<tr>').attr('id','row-'+itemIndex);
                        let newItem = {
                            name: item.name , // Nama barang kosong untuk input pertama
                            qty: item.qty ,    // Kuantitas default
                            keterangan: item.keterangan,
                        };
                        arraydataBarang.push(newItem)
                        var tdColumn1=$('<td>').css({
                            'padding':'auto',
                            'width':'30%',
                            'border': '0.1px solid black',
                            'font-weight':'bold'
                        });
                        var inputColumn=$('<input>',{
                            type:'text',
                            class:'form-control',
                            value:item.name,
                            id:'name'+itemIndex,
                        }).on('input', function () {
                                // Update array saat input berubah
                                arraydataBarang[itemIndex].name = $(this).val();
                                console.log(arraydataBarang)
                        });
                       
                     
                        inputColumn.css({
                            'border': '1px solid #696868', 
                            'color': 'black', 
                            'padding': '10px',
                            'width': '100%' 
                        })
                        
                        var tdColumn2=$('<td>').css({
                            'padding':'auto',
                            'width':'20%',
                            'border': '0.1px solid black',
                            'font-weight':'bold'
                        });
                        var inputColumn2=$('<input>',{
                            type:'text',
                            class:'form-control',
                            value:item.qty,
                            id:'qty'+itemIndex,
                        }).on('input', function () {
                                // Update array saat input berubah
                                arraydataBarang[itemIndex].qty = $(this).val();
                                console.log(arraydataBarang)
                        });
                        inputColumn2.css({
                            'border': '1px solid #696868', 
                            'color': 'black', 
                            'padding': '10px',
                            'width': '100%' 
                        })
                        var tdColumn3=$('<td>').css({
                            'padding':'auto',
                            'width':'30%',
                            'border': '0.1px solid black',
                            'font-weight':'bold'
                        });
                        var inputColumn3=$('<input>',{
                            type:'text',
                            class:'form-control',
                            value:item.keterangan,
                            id:'keterangan'+itemIndex,
                        }).on('input', function () {
                                // Update array saat input berubah
                                arraydataBarang[itemIndex].keterangan = $(this).val();
                                console.log(arraydataBarang)
                        });
                        inputColumn3.css({
                            'border': '1px solid #696868', 
                            'color': 'black', 
                            'padding': '10px',
                            'width': '100%' 
                        })
                        var tdColumn4=$('<td>').css({
                            'padding':'auto',
                            'width':'30%',
                            'border': '0.1px solid black',
                            'font-weight':'bold',
                            'text-align':'center'
                        });
                        var buttonColumn4 = $('<button>', {
                            type: 'button', // Type button
                            class: 'btn btn-danger delete-row', // Kelas button untuk styling
                            id: 'btn_edit' + itemIndex,
                            text:'X',  // Text yang ditampilkan pada button
                            'data-index':itemIndex,
                        }).on('click',function(){
                            var indexDataBarang = $(this).data('index');
                            $('#row-'+indexDataBarang).remove()
                            arraydataBarang.splice(indexDataBarang,1)
                            console.log('Updaate',arraydataBarang)
                        });


                        
                        tdColumn1.append(inputColumn)
                        tdColumn2.append(inputColumn2)
                        tdColumn3.append(inputColumn3)
                        tdColumn4.append(buttonColumn4)
                        tr.append(tdColumn1,tdColumn2,tdColumn3,tdColumn4)
                        tbody.append(tr)
                    })
                   
                    var div_save=$('#div_save').css({
                        'text-align': 'right'
                    });
                    var col_save = $('<div>',{
                        class:'col-md-12'
                    }).css({
                        'text-aligg':'right'
                    })
                    // Membuat tombol "Tambah Barang"
                    var buttonTambah = $('<button>', {
                        type: 'button', // Type button
                        class: 'btn btn-primary tambah-row', // Kelas button untuk styling
                        id: 'btn_tambah',
                        text: 'Tambah Barang' // Text yang ditampilkan pada button
                    });
                    let dataBarangNew = [];
                    buttonTambah.on('click', function () {
                        let newItem2 = {
                            name: '', // Nama barang kosong untuk input pertama
                            qty: 0,    // Kuantitas default
                            keterangan: '',
                        };
                        dataBarangNew.push(newItem2);

                        console.log(dataBarangNew)
                        // Render ulang tabel berdasarkan array
                        renderTable();
                    })

                    //menambahahkan tr baru
                    function renderTable() {
                        var tbody2=$('#tbody_barang2');
                        tbody2.empty();
                        // Looping array untuk membuat elemen <tr>
                        dataBarangNew.forEach((itemNew, indexNew) => {
                            var trNew = $('<tr>').attr('id', 'rowNew-' + indexNew);

                            
                            // Kolom untuk nama
                            let tdColumnNew = $('<td>').css({
                                'padding': 'auto',
                                'width': '30%',
                                'border': '0.1px solid black',
                                'font-weight': 'bold'
                            });
                            let inputColumnNew = $('<input>', {
                                type: 'text',
                                class: 'form-control',
                                value: itemNew.name,
                                id: `name-${indexNew}`, // Berikan ID unik berdasarkan indeks
                            }).css({
                                'border': '1px solid #696868',
                                'color': 'black',
                                'padding': '10px',
                                'width': '100%'
                            }).on('input', function () {
                                // Update array saat input berubah
                                dataBarangNew[indexNew].name = $(this).val();
                                console.log(dataBarangNew)
                            });
                            let tdColumnNew2 = $('<td>').css({
                                'padding': 'auto',
                                'width': '30%',
                                'border': '0.1px solid black',
                                'font-weight': 'bold'
                            });
                            let inputColumnNew2 = $('<input>', {
                                type: 'text',
                                class: 'form-control',
                                value: itemNew.qty,
                                id: `qty-${indexNew}`, // Berikan ID unik berdasarkan indeks
                            }).css({
                                'border': '1px solid #696868',
                                'color': 'black',
                                'padding': '10px',
                                'width': '100%'
                            }).on('input', function () {
                                // Update array saat input berubah
                                dataBarangNew[indexNew].qty = $(this).val();
                                console.log(dataBarangNew)
                            });
                            let tdColumnNew3 = $('<td>').css({
                                'padding': 'auto',
                                'width': '30%',
                                'border': '0.1px solid black',
                                'font-weight': 'bold'
                            });
                            let inputColumnNew3 = $('<input>', {
                                type: 'text',
                                class: 'form-control',
                                value: itemNew.keterangan,
                                id: `keterangan-${indexNew}`, // Berikan ID unik berdasarkan indeks
                            }).css({
                                'border': '1px solid #696868',
                                'color': 'black',
                                'padding': '10px',
                                'width': '100%'
                            }).on('input', function () {
                                // Update array saat input berubah
                                dataBarangNew[indexNew].keterangan = $(this).val();
                                console.log(dataBarangNew)
                            });
                            var tdColumnNew4=$('<td>').css({
                                'padding':'auto',
                                'width':'30%',
                                'border': '0.1px solid black',
                                'font-weight':'bold',
                                'text-align':'center'
                            });
                            var buttonColumnNew = $('<button>', {
                                type: 'button', // Type button
                                class: 'btn btn-danger delete-row', // Kelas button untuk styling
                                id: 'btn_edit' + indexNew,
                                text:'X',  // Text yang ditampilkan pada button
                                'data-index':indexNew,
                            }).on('click', function () {
                                // Hapus elemen <tr> berdasarkan ID
                                $('#rowNew-' + indexNew).remove();
                                // Hapus data dari array
                                dataBarangNew.splice(indexNew, 1);
                                // Render ulang tabel setelah penghapusan
                                renderTable();
                            });
                        

                            // Menambahkan input ke kolom
                            tdColumnNew.append(inputColumnNew);
                            tdColumnNew2.append(inputColumnNew2);
                            tdColumnNew3.append(inputColumnNew3);
                            tdColumnNew4.append(buttonColumnNew);
                            

                            // Menambahkan kolom ke baris
                            trNew.append(tdColumnNew,tdColumnNew2,tdColumnNew3,tdColumnNew4);

                            // Menambahkan baris ke <tbody>
                            tbody2.append(trNew);
                        });
                    }

                    col_save.append(buttonTambah)
                    div_save.append(col_save)
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
                        value:dataBarang.msg.penerimaan.keterangan,
                        text:dataBarang.msg.penerimaan.keterangan
                    }).css({
                        'border': '1px solid #696868', // Gaya border
                        'border-radius': '5px', // Opsional: border melengkung
                        'padding': '10px' // Opsional: padding dalam textarea
                    });
                    col_keterangan.append(label_keterangan);
                    col_keterangan2.append(text_area_keterangan);

                    // Menambahkan kolom ke div_keterangan
                    div_keterangan.append(col_keterangan,col_keterangan2);
                    $('#submitbutton').on('click',function(){
                        
                        
                        var dataSend = {
                            dataNew:dataBarangNew,
                            dataOld:arraydataBarang,
                            keterangan:$('#textarea_keterangan_edit').val(),
                            id:dataBarang.msg.penerimaan.id,
                            tgl_terima:$('#tgl_request_tambah').val(),
                            pengirim: $('#pengirim_name').val(),

                        }
                        
                        $.ajax({
                            url: '{{ route('admin.penerimaan_barang_lain') }}', // Ganti dengan URL endpoint server Anda
                            type: 'GET',
                            data: {
                                dataSend:dataSend,
                                menu:'edit_baranglain'
                            }, // Konversi data menjadi JSON
                            
                            success: function (response) {
                                // Callback ketika permintaan berhasil
                               
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
                window.location.href='/admin/data_penerimaan_barang_lain'
            })
</script>