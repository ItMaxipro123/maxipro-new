<style>
@media (min-width: 768px) { /* Atur breakpoint untuk desktop */
  .row > .col-md-6 {
    width: 100%;
  }

  .col-md-12 {
    width: 100%;
  }
}
.form-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.form-group {
    flex: 1 1 calc(33.333% - 1rem);
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group label {
    font-size: 0.9rem;
    font-weight: bold;
}

.form-control,
.form-checkbox {
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.actions {
    flex: 1 1 100%;
    display: flex;
    justify-content: flex-end;
}

.add-row-btn-container {
    display: flex;
    justify-content: flex-start;
}

@media (max-width: 768px) {
    .form-group {
        flex: 1 1 100%;
    }
}

</style>
<link rel="stylesheet" href="{{ asset('css/penjualan/orderpenjualancreate.css') }}">
<div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
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
                <label for="tglTerimaLabel">Tanggal Penawaran <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


            
            <input type="text"  class="form-control custom-border" id="tgl_request_tambah" name="tgl_request" placeholder= "Tanggal Terima" required >
            </div>
        </div>

</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Cabang <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="cabang_tambah_id" name="cabang_tambah_name" required>
                        <option value="0">Pilih Cabang  </option>
                        
                        @foreach($Data['msg']['cabang'] as $key_cabang => $result_cabang)
                        <option value="{{ $result_cabang['id'] }}">{{ $result_cabang['name'] }}</option> 
                        @endforeach
                    </select>

            </div>
        </div>

</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Mitra Bisnis <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="mitrabisnis_tambah_id" name="mitrabisnis_tambah_name" required>
                        <option value="0">Pilih Mitra Bisnis  </option>
                        
                        @foreach($Data['msg']['combinedMitraBisnis'] as $key_mitrabisnis => $result_mitrabisnis)
                        <option value="{{ $result_mitrabisnis['id'] }}">{{ $result_mitrabisnis['code'] }} - {{ $result_mitrabisnis['name'] }} - {{ $result_mitrabisnis['address'] }}</option> 
                        @endforeach
                    </select>

            </div>
        </div>

</div>

<div id="table-container" class="form-group" style="padding-top: 30px; padding-left: 20px; width: 100%;">
    <div class="row">
        <!-- Label -->
        <div style="padding-top: 10px;" class="col-md-1">
            <label for="databaselabel">Item <span style="color: red;">*</span></label>
        </div>

        <!-- Tabel -->
        <div class="col-md-11">
        <div class="form-container">
            <div class="form-row">
                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <select id="barang" class="form-control select-barang">
                            <option value="">Pilih Barang</option>
                            @foreach($Data['msg']['masterItem'] as $key_masteritem => $result_masteritem)
                                <option value="{{ $result_masteritem['new_kode'] }}" data-id="{{ $result_masteritem['id'] }}">
                                    {{ $result_masteritem['new_kode'] }} - {{ $result_masteritem['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Belum PPN</label>
                        <input type="number" id="harga" class="form-control input-harga" placeholder="Harga Belum PPN">
                    </div>
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" id="qty" class="form-control input-qty" placeholder="QTY">
                    </div>
                    <div class="form-group">
                        <label for="disc">DISC</label>
                        <input type="number" id="disc" class="form-control input-disc" placeholder="DISC">
                    </div>
                    <div class="form-group">
                        <label for="subtotal">Subtotal</label>
                        <input type="number" id="subtotal" class="form-control input-subtotal" placeholder="Subtotal" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ppn">PPN</label>
                        <input type="checkbox" id="ppn" class="form-checkbox input-ppn">
                    </div>
                   
            </div>

    <div id="additional-rows">
        <!-- Baris tambahan akan ditambahkan di sini -->
    </div>
    <div id="addButtonRow">
        <!-- Baris tambahan akan ditambahkan di sini -->
    </div>
    
</div>

        </div>
    </div>
</div>


<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="databaselabel">Keterangan Pembayaran <span style="color: red;">*</span></label>
                            <textarea id="keterangan1" class="form-control" rows="4" placeholder="Masukkan keterangan Pembayaran" style="border: 1px solid black; padding:10px"></textarea>
                        </div>
                        <div class="col">
                            <label for="keterangan2">Keterangan Pengiriman <span style="color: red;">*</span></label>
                            <textarea id="keterangan2" class="form-control" rows="4" placeholder="Masukkan keterangan pengiriman" style="border: 1px solid black; padding:10px;"></textarea>
                        </div>
                    </div>
                </div>
    </div>


            </div>
            <div class="col-md-6">
                <div class="form-group d-flex align-items-center mb-3"style="margin-top:20px;">
                    <label class="me-3">
                        <input type="checkbox" class="ppncentang" id="ppn-checkbox" style="margin-right: 5px;"> PPN
                    </label>
                    <label>
                    <input type="checkbox" class="includeppn" id="harga-termasuk-ppn-checkbox" style="margin-right: 5px;"> Harga Termasuk PPN
                    </label>
                </div>
                <table class="table table-bordered" style="border: 1px solid black;">
                <tbody>
                    <tr>
                        <td>Subtotal (Rp)</td>
                        <td id="td_subtotal">0</td>
                    </tr>
                    <tr>
                        <td>PPN 11% (Rp)</td>
                        <td id="td_ppn">0</td>
                    </tr>
                    <tr>
                        <td>Total (Rp)</td>
                        <td id="td_total">0</td>
                    </tr>
                </tbody>
            </table> 
            </div>
            
        </div>
</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Yang Melayani <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="orang_tambah_id" name="orang_tambah_name" required>
                        <option value="0">Pilih Yang Melayani  </option>
                        
                        @foreach($Data['msg']['allteknisi'] as $key_teknisi => $result_teknisi)
                        <option value="{{ $result_teknisi['id'] }}">{{ $result_teknisi['name'] }}</option> 
                        @endforeach
                    </select>

            </div>
        </div>

</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Gudang <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="gudang_tambah_id" name="gudang_tambah_name" required>
                        <option value="0">Pilih Gudang  </option>
                        
                        @foreach($Data['msg']['gudang'] as $key_gudang => $result_gudang)
                        <option value="{{ $result_gudang['id'] }}">{{ $result_gudang['name'] }}</option> 
                        @endforeach
                    </select>

            </div>
        </div>

</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Sales <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="sales_tambah_id" name="sales_tambah_name" required>
                        <option value="0">Pilih Sales  </option>
                        
                        @foreach($Data['msg']['adminsales'] as $key_teknisi => $result_teknisi)
                        <option value="{{ $result_teknisi['id_bee'] }}">{{ $result_teknisi['name'] }}</option> 
                        @endforeach
                    </select>

            </div>
        </div>

</div>
<div class="form-group" style="padding-top: 30px; padding-left: 20px; width:100%;">

        <div class="row">
            <div style="padding-top: 10px;" class="col-md-1">
                <label for="databaselabel">Status Order <span style="color: red;">*</span></label>
                            
            </div>
            <div class="col-md-11" style="padding-right: 1em; margin-top:0.5em;">


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 select-search form-control database-tambah" id="statusorder_tambah_id" name="statusorder_tambah_name" required>
                        <option value="0">Pilih Status Order</option>
                        
                        @foreach($Data['msg']['statusorder'] as $key_statusorder => $result_statusorder)
                        <option value="{{ $result_statusorder['id'] }}">{{ $result_statusorder['name'] }}</option> 
                        @endforeach
                    </select>

            </div>
        </div>

</div>
<div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
    <button type="button" id="submitbutton" class="btn btn-primary" style="margin-left: auto;">Simpan Order Penjualan</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  var subtotal=[];
  var price=[];
  var qty=[];
  var disc=[];
  var subtotal_import=[];
  var price_import=[];
  var qty_import=[];
  var disc_import=[];
  var ppn=[]
  var ppn_import=[]

  var ppn_row=[]
  var ppn_row_import=[]
  var td_ppn=0;
  
  var td_subtotal_global=0;
  var td_total_global=0;
  var td_total=0;
  var purc_unit=[];
  var purc_name=[];
  var purc_unit_import=[];
  var purc_name_import=[];
  var id_purc_unit=[]
  var id_purc_unit_import=[]
  var include_ppn_global=0;
  var ppn_centang_global=0;
  var total_ppn_global=0;
  var subtotal_notinclude=[]
  var subtotal_import_notinclude=[]
    $(document).ready(function() {
        var json_harga = {!! json_encode($Data) !!};

      

        $(document).on('change', '.select-barang', function () {
            const selectedValue = $(this).val(); // Mengambil nilai opsi yang dipilih
            const selectedOption = $(this).find(':selected'); // Mengambil opsi yang dipilih
            var dataId = selectedOption.data('id');
            const selectedText = $(this).find('option:selected').text(); // Mengambil teks opsi yang dipilih
            console.log('Nilai yang dipilih:', selectedValue);
            const parts = selectedText.split('-');
            const name_item = parts[1].trim();
            console.log('dataId',dataId)
            console.log('name_item',name_item)
            purc_unit.push(selectedValue)
            purc_name.push(name_item)
            
           // Periksa apakah json_harga.msg dan json_harga.msg.hargaItem adalah objek
            if (json_harga && json_harga.msg && typeof json_harga.msg.hargaItem === 'object') {
                Object.entries(json_harga.msg.hargaItem).forEach(([key, itemHarga]) => {
                    if (itemHarga.itemid == selectedValue) {
                        let harga = itemHarga.price1 > 0 ? itemHarga.price1 : 1; // Jika harga 0, gunakan nilai 1
                        harga = parseFloat(harga); // Menghilangkan angka nol di belakang titik
                        console.log('masuk', harga);
                        $('.input-harga').val(harga); // Set nilai ke elemen dengan class `input-harga`
                        $('.input-qty').val(1); // Set nilai ke elemen dengan class `input-qty`
                        $('.input-disc').val(0); // Set nilai ke elemen dengan class `input-qty`
                        $('.input-subtotal').val(harga); // Set nilai ke elemen dengan class `input-qty`
                        price.push(harga);
                        subtotal.push(harga);
                        subtotal_notinclude.push(harga);
                        
                        qty.push($('.input-qty').val());
                        disc.push($('.input-disc').val());
                        ppn_row_import.push(0)
                        calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
                    }
                });
                

            } else {
                console.error("hargaItem bukan objek atau data tidak valid:", json_harga);
            }
            
            $('.includeppn').on('change', function() {
                    let include_ppn = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                    include_ppn_global = include_ppn;

                    if (include_ppn === 1) {
                        let subtotal_sementara = subtotal.map(value => parseInt(value / 1.11));
                        let subtotal_import_sementara = subtotal_import.map(value => parseInt(value / 1.11));

                        console.log('include ppn 1')

                        // console.log('ppn 11%', total_ppn_includeppn);
                        // total_ppn_global=total_ppn_includeppn
                        // console.log('total_includeppn', total_includeppn);
                        includeppn(subtotal_sementara,subtotal_import_sementara)
                        // subtotal = subtotal_sementara;
                        // subtotal_import = subtotal_import_sementara;
                        // td_subtotal_global=parseFloat(subtotal)+parseFloat(subtotal_import)
                        // td_total_global=total_includeppn+1
                        
                    } else {
                        // let harga = itemHarga.price1 > 0 ? itemHarga.price1 : 1; // Jika harga 0, gunakan nilai 1
                        // harga = parseFloat(harga); // Menghilangkan angka nol di belakang titik
                        // console.log('masuk', harga);
                        // $('.input-harga').val(harga); // Set nilai ke elemen dengan class `input-harga`
                        // $('.input-qty').val(1); // Set nilai ke elemen dengan class `input-qty`
                        // $('.input-disc').val(0); // Set nilai ke elemen dengan class `input-qty`
                        // $('.input-subtotal').val(harga); // Set nilai ke elemen dengan class `input-qty`
                        
                        // subtotal[]=harga;
                        
                        calculateSubtotal(subtotal_notinclude,subtotal_import_notinclude,ppn_row,ppn_row_import)
                    }
            });
         
            $('.input-harga').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
                updateData(index,value)
            });
            $('.input-ppn').on('change', function() {
                    let value_ppn = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                    console.log('value_ppn',value_ppn)
                    let index = $(this).data('index');
                    updatePPN(index,value_ppn)
            });
            $('.input-qty').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
                updateDataQty(index,value)
            });
            $('.input-disc').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
                updateDataDisc(index,value)
            });
            function updatePPN(index,value){
                ppn =[value]
                console.log('masuk ppn',ppn)
                // console.log('masuk subtotal',subtotal)
                let result = subtotal.map((priceValue, index) => {
                    
                   
                    return (parseFloat(priceValue) * 0.11); // Perkalian harga * qty, lalu kurangi diskon
                    // ppn_row.push(parseFloat(priceValue) * 0.11)
                  
                });
                if(ppn==0){
                    ppn_row=0;
                }else{

                    ppn_row =result
                }
             
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
            }
            function updateData(index,value){
                // price[index]=value
                price =[value]
                let result = price.map((priceValue, index) => {
                    let qtyValue = parseFloat(qty[index]) || 0; // Pastikan qty adalah angka
                    let discValue = parseFloat(disc[index]) || 0;
                    return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                });
                subtotal=[result]
                console.log('subtotal',subtotal)
                console.log('price',price)
                console.log('qty',qty)
                console.log('disc',disc)
                $('.input-subtotal').val(subtotal);
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
            }
            function updateDataQty(index,value){
                qty=[value]
                
                let result = price.map((priceValue, index) => {
                    let qtyValue = parseFloat(qty[index]) || 0; // Pastikan qty adalah angka
                    let discValue = parseFloat(disc[index]) || 0;
                    return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                });
                subtotal=[result]
                console.log('subtotal',subtotal)
                console.log('price',price)
                console.log('qty',qty)
                console.log('disc',disc)
                $('.input-subtotal').val(subtotal);
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
            }
            
            function updateDataDisc(index,value){
                 // price[index]=value
                 disc =[value]
                 let result = price.map((priceValue, index) => {
                    let qtyValue = parseFloat(qty[index]) || 0; // Pastikan qty adalah angka
                    let discValue = parseFloat(disc[index]) || 0; // Pastikan disc adalah angka
                    return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                });

                subtotal=[result]
                console.log('subtotal',subtotal)
                console.log('price',price)
                console.log('qty',qty)
                console.log('disc',disc)
                $('.input-subtotal').val(subtotal);
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
            }
         
        });

            $('#orang_tambah_id').select2({
                            placeholder: 'Pilih Yang Melayani',
                            allowClear: true
            });
            $('#gudang_tambah_id').select2({
                            placeholder: 'Pilih Gudang',
                            allowClear: true
            });
            $('#sales_tambah_id').select2({
                            placeholder: 'Pilih Sales',
                            allowClear: true
            });
            $('#statusorder_tambah_id').select2({
                            placeholder: 'Pilih Status Order',
                            allowClear: true
            });
            $('.select-barang').select2({
                placeholder: 'Pilih Item',
                allowClear: true,
                width: '100%'
            });
            $('#database_tambah_id').select2({
                placeholder: 'Pilih Database',
                allowClear: true,
                width: '100%'
            });
            $('#cabang_tambah_id').select2({
                placeholder: 'Pilih Cabang',
                allowClear: true,
                width: '100%'
            });
            $('#mitrabisnis_tambah_id').select2({
                placeholder: 'Pilih Mitra Bisnis',
                allowClear: true,
                width: '100%'
            });
            flatpickr("#tgl_request_tambah", {
                dateFormat: "Y-m-d",
                
                disableMobile: true
            });

            const addButton = $('<button>')
            .addClass('btn btn-primary')
            .text('Add Product')
            .css({ marginTop: '10px' })
            .on('click', function (event) {
                event.preventDefault();
                addRow();
            });

        // Tambahkan tombol ke dalam DOM sebelum tabel
        $('#addButtonRow').append(addButton);

        // Fungsi untuk menambahkan baris baru ke tabel
        function addRow() {
        
            const newRow = `
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="barang-import">Nama Barang</label>
                        <select id="barang-import" class="form-control select-barang-import">
                            <option value="">Pilih Barang</option>
                            @foreach($Data['msg']['masterItem'] as $key_masteritem => $result_masteritem)
                                <option value="{{ $result_masteritem['new_kode'] }}">
                                    {{ $result_masteritem['new_kode'] }} - {{ $result_masteritem['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Belum PPN</label>
                        <input type="number" id="harga-import" class="form-control input-harga-import" placeholder="Harga Belum PPN">
                    </div>
                    <div class="form-group">
                        <label for="qty-import">QTY</label>
                        <input type="number" id="qty-import" class="form-control input-qty-import" placeholder="QTY">
                    </div>
                    <div class="form-group">
                        <label for="disc-import">DISC</label>
                        <input type="number" id="disc-import" class="form-control input-disc-import" placeholder="DISC">
                    </div>
                    <div class="form-group">
                        <label for="subtotal-import">Subtotal</label>
                        <input type="number" id="subtotal-import" class="form-control input-subtotal-import" placeholder="Subtotal" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ppn-import">PPN</label>
                        <input type="checkbox" id="ppn-import" class="form-checkbox input-ppn-import">
                    </div>
                    <div class="form-group actions">
                        <button type="button" class="btn btn-danger btn-delete">Hapus</button>
                    </div>
                </div>

            `;

            $(document).on('change', '.select-barang-import', function () {
                const selectedValue = $(this).val(); // Nilai opsi yang dipilih
                const selectedText = $(this).find('option:selected').text(); // Teks opsi yang dipilih
                const parts = selectedText.split('-');
                const nameItem = parts[1]?.trim() || "";

                // Temukan baris terkait
                const currentRow = $(this).closest('.form-row');
                const rowIndex = currentRow.index(); // Indeks baris berdasarkan posisi dalam container

                if (json_harga && json_harga.msg && typeof json_harga.msg.hargaItem === 'object') {
                    Object.entries(json_harga.msg.hargaItem).forEach(([key, itemHarga]) => {
                        if (itemHarga.itemid == selectedValue) {
                            let harga = itemHarga.price1 > 0 ? itemHarga.price1 : 1;
                            harga = parseFloat(harga);

                            // Update nilai input di baris saat ini
                            currentRow.find('.input-harga-import').val(harga);
                            currentRow.find('.input-qty-import').val(1);
                            currentRow.find('.input-disc-import').val(0);
                            currentRow.find('.input-subtotal-import').val(harga);

                            // Inisialisasi array berdasarkan indeks baris
                            purc_unit_import[rowIndex] = selectedValue;
                            purc_name_import[rowIndex] = nameItem;
                            price_import[rowIndex] = harga;
                            qty_import[rowIndex] = 1;
                            disc_import[rowIndex] = 0;
                            subtotal_import[rowIndex] = harga; // Mengupdate nilai subtotal_import pada indeks tertentu
                            subtotal_import_notinclude = [...subtotal_import]; // Menyalin array subtotal_import ke subtotal_import_notinclude

                            ppn_import[rowIndex] = 0;

                            console.log(`Row Index: ${rowIndex}`);
                            console.log('price import:', price_import);
                            console.log('subtotal import:', subtotal_import);
                            console.log('qty import:', qty_import);
                            console.log('disc import:', disc_import);

                            calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import);
                        }
                    });
                } else {
                    console.error("hargaItem bukan objek atau data tidak valid:", json_harga);
                }
            });
                        // Tambahkan baris ke dalam tbody
                        $('#additional-rows').append(newRow);
                        $('.select-barang-import').last().select2({
                            placeholder: 'Pilih Barang',
                            allowClear: true
                        });


                        $('.input-ppn-import').on('input', function() {
                            let value_ppn = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                            console.log('value_ppn_import',value_ppn)
                            let index = $(this).data('index');
                            updateDataPPNImport(index,value_ppn)
                        });
                        $('.input-harga-import').on('input', function() {
                            let value = $(this).val(); // Ambil nilai dari input
                            let index = $(this).data('index');
                            console.log('Nilai berubah:', value);
                            updateDataImport(index,value)
                        });
                        $('.input-qty-import').on('input', function() {
                            let value = $(this).val(); // Ambil nilai dari input
                            let index = $(this).data('index');
                            console.log('Nilai berubah:', value);
                            updateDataQtyImport(index,value)
                        });
                        $('.input-disc-import').on('input', function() {
                            let value = $(this).val(); // Ambil nilai dari input
                            let index = $(this).data('index');
                            console.log('Nilai berubah:', value);
                            updateDataDiscImport(index,value)
                        });

                        function updateDataPPNImport(index,value){
                            ppn_import =[value]
                            console.log('masuk ppn import',ppn_import)
                            console.log('masuk subtotal',subtotal_import)
                            let result = subtotal_import.map((priceValue, index) => {
                                
                            
                                return (parseFloat(priceValue) * 0.11); // Perkalian harga * qty, lalu kurangi diskon
                                // ppn_row.push(parseFloat(priceValue) * 0.11)
                            
                            });
                            console.log('result import 0',result)
                            if(ppn_import==0){
                                ppn_row_import=0;
                                // console.log('result import 0',ppn_row_import)
                            }else{

                                ppn_row_import =result
                                console.log('result import',result)
                            }
                        
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
                        }

                        function updateDataImport(index,value){
                            // price[index]=value
                            price_import =[value]
                            let result = price_import.map((priceValue, index) => {
                                let qtyValue = parseFloat(qty_import[index]) || 0; // Pastikan qty adalah angka
                                let discValue = parseFloat(disc_import[index]) || 0;
                                return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                            });
                            subtotal_import=[result]
                            console.log('subtotal',subtotal_import)
                            console.log('price',price_import)
                            console.log('qty',qty_import)
                            console.log('disc',disc_import)
                            $('.input-subtotal-import').val(subtotal_import);
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
                        }
                        function updateDataQtyImport(index,value){
                            qty_import=[value]
                            
                            let result = price_import.map((priceValue, index) => {
                                let qtyValue = parseFloat(qty_import[index]) || 0; // Pastikan qty adalah angka
                                let discValue = parseFloat(disc_import[index]) || 0;
                                return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                            });
                            subtotal_import=[result]
                            console.log('subtotal',subtotal_import)
                            console.log('price',price_import)
                            console.log('qty',qty_import)
                            console.log('disc',disc_import)
                            $('.input-subtotal-import').val(subtotal_import);
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
                            
                        }
                        
                        function updateDataDiscImport(index,value){
                            // price[index]=value
                            disc_import =[value]
                            let result = price_import.map((priceValue, index) => {
                                let qtyValue = parseFloat(qty_import[index]) || 0; // Pastikan qty adalah angka
                                let discValue = parseFloat(disc_import[index]) || 0; // Pastikan disc adalah angka
                                return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                            });

                            subtotal_import=[result]
                            // console.log('subtotal',subtotal_import)
                            // console.log('price',price_import)
                            // console.log('qty',qty_import)
                            // console.log('disc',disc_import)
                            $('.input-subtotal-import').val(subtotal_import);
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import)
                        }
           

        }

        // Event delegation untuk tombol hapus
        $('#tbody_tambah').on('click', '.btn-delete', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove(); // Hapus baris yang sesuai
        });
        function includeppn(subtotal_sementara,subtotal_import_sementara){
                        console.log('subtotal_sementara', subtotal_sementara);
                        console.log('subtotal_import_sementara', subtotal_import_sementara);

                        let total_ppn_includeppn = parseInt((subtotal_sementara.reduce((acc, val) => acc + val, 0) + 
                                                            subtotal_import_sementara.reduce((acc, val) => acc + val, 0)) * 0.11);

                        let total_includeppn = parseFloat(total_ppn_includeppn) + 
                                            subtotal_sementara.reduce((acc, val) => acc + val, 0) + 
                                            subtotal_import_sementara.reduce((acc, val) => acc + val, 0);
                        let subtotal_includeppn =  
                                            subtotal_sementara.reduce((acc, val) => acc + val, 0) + 
                                            subtotal_import_sementara.reduce((acc, val) => acc + val, 0);
                        td_subtotal_global=subtotal_includeppn
                         $('.input-subtotal').val(subtotal_sementara); // Set nilai ke elemen dengan class `input-subtotal`
                         $('.input-subtotal-import').val(subtotal_import_sementara); // Set nilai ke elemen dengan class `input-subtotal-import`
                        console.log('td_subtotal_global',td_subtotal_global)
                        total_ppn_global=total_ppn_includeppn
                        console.log('total_ppn_global',total_ppn_global)

                        $('#td_ppn').text(total_ppn_includeppn)
                        document.getElementById("ppn-checkbox").checked = true;
                        subtotal =subtotal_sementara
                        subtotal_import = subtotal_import_sementara
                        // Beri nilai 1 (misalnya, simpan dalam variabel)
                        ppn =[1]
                        ppn_import=1
                        $('.input-ppn').prop('checked',true)
                        $('.input-ppn-import').prop('checked',true)
                        if (ppn == 1 || ppn_import == 1) {
                            document.getElementById("ppn-checkbox").checked = true;
                            
                                // Beri nilai 1 (misalnya, simpan dalam variabel)
                                let ppnValueCentang = 1;
                                console.log("Nilai PPN:", ppnValueCentang);
                                ppn_centang_global=ppnValueCentang;
                                // Opsional: Simpan nilai dalam atribut data
                                document.getElementById("ppn-checkbox").dataset.value = ppnValueCentang;
                        }

                        let formattedSubTotal = td_subtotal_global.toLocaleString('id-ID', { style: 'decimal', minimumFractionDigits: 0 });
                        // Perbarui elemen td_subtotal di DOM
                        $('#td_subtotal').text(formattedSubTotal); // Tampilkan total dengan format dua desimal
        }
        function calculateSubtotal(subtotal, subtotal_import,ppn_row,ppn_row_import) {
            
                // Validasi input sebagai array
                if (!Array.isArray(subtotal) || !Array.isArray(subtotal_import)) {
                    console.error('Input harus berupa array.');
                    return 0;
                }
                
        
                $('.input-subtotal').val(subtotal);
                

                let total = 0; // Inisialisasi total
                // Iterasi untuk menjumlahkan semua data dari kedua array
                for (let i = 0; i < Math.max(subtotal.length, subtotal_import.length); i++) {
                    let value = subtotal[i] || 0; // Ambil nilai dari subtotal, default 0 jika undefined
                    let importValue = subtotal_import[i] || 0; // Ambil nilai dari subtotal_import, default 0 jika undefined

                    let td_subtotal = parseFloat(value) + parseFloat(importValue); // Hitung jumlah kedua elemen
                    console.log(`Index ${i}: ${value} + ${importValue} = ${td_subtotal}`);

                    total += td_subtotal; // Tambahkan td_subtotal ke total
                }
                td_subtotal_global=total
                let formattedSubTotal = total.toLocaleString('id-ID', { style: 'decimal', minimumFractionDigits: 0 });
                // Perbarui elemen td_subtotal di DOM
                $('#td_subtotal').text(formattedSubTotal); // Tampilkan total dengan format dua desimal
                // return total;    
               console.log('ppn',ppn)
                // var allPPNValid = 
                //     ppn.every(value => value === 1) 
                    
                    

                // Mengecek apakah kondisi ppn dan ppn_import terpenuhi
                // var centangBoxPPN = (ppn === 1 && ppn_import.length === 0) ? 1 : 0;


                console.log('ppn ',ppn)
                console.log('ppn length ',ppn.length)
                console.log('ppn_import',ppn_import.length)
                console.log('centangBoxPPN',centangBoxPPN)

                var centangBoxPPN = (ppn === 1 || ppn_import === 1) ? 1 : 0;

                if (ppn == 1 || ppn_import == 1) {
                    document.getElementById("ppn-checkbox").checked = true;
                    
                        // Beri nilai 1 (misalnya, simpan dalam variabel)
                        let ppnValueCentang = 1;
                        console.log("Nilai PPN:", ppnValueCentang);
                        ppn_centang_global=ppnValueCentang;
                        // Opsional: Simpan nilai dalam atribut data
                        document.getElementById("ppn-checkbox").dataset.value = ppnValueCentang;
                }
                else{
                    document.getElementById("ppn-checkbox").checked = false;

                        // Beri nilai 1 (misalnya, simpan dalam variabel)
                        let ppnValueCentang = 0;
                        console.log("Nilai PPN:", ppnValueCentang);
                        ppn_centang_global=ppnValueCentang;
                        // Opsional: Simpan nilai dalam atribut data
                        document.getElementById("ppn-checkbox").dataset.value = ppnValueCentang;
                }
                let total_ppn = 0;

                        // Menjumlahkan nilai dari ppn_row
                        for (let i = 0; i < ppn_row.length; i++) {
                            total_ppn += parseFloat(ppn_row[i]) || 0; // Pastikan setiap nilai adalah angka
                        }

                        // Jika ppn_row_import memiliki lebih dari 1 elemen, tambahkan nilainya
                        if (ppn_row_import.length > 0) {
                            console.log('ppn_row_import lebih 0')
                            for (let i = 0; i < ppn_row_import.length; i++) {
                                total_ppn += parseFloat(ppn_row_import[i]) || 0; // Pastikan setiap nilai adalah angka
                            }
                        }

                        console.log('Total PPN:', total_ppn);


                // console.log('total_ppn',total_ppn)
                // console.log('ppn_row',ppn_row)
                total_ppn_global=total_ppn
                $('#td_ppn').text(total_ppn)

                let total_total_td =parseFloat(total_ppn+total)
                td_total_global=total_total_td  
                let formattedTotal = total_total_td.toLocaleString('id-ID', { style: 'decimal', minimumFractionDigits: 0 });
                $('#td_total').text(formattedTotal)
        }






        $('#submitbutton').on('click', function() {
            var database = $('#database_tambah_id').val()
            var tgl_request = $('#tgl_request_tambah').val()
            var cabang = $('#cabang_tambah_id').val()
            // var mitrabisnis = $('#mitrabisnis_tambah_id').val()
            let selectedOption = $('#mitrabisnis_tambah_id').find('option:selected');
            let id_mitra = $('#mitrabisnis_tambah_id').val(); // Mendapatkan nilai `value` dari opsi yang dipilih
            let text = selectedOption.text(); // Mendapatkan teks dari opsi yang dipilih
            
            // Pecah teks berdasarkan format "code - name - address"
            let [code_mitra, name_mitra, address] = text.split(' - ');

            // Cek apakah valid (tidak memilih default)
            if (id_mitra === "0") {
                alert("Pilih Mitra Bisnis terlebih dahulu!");
                return;
            }
            var keterangan = $('#keterangan1').val()
            var keterangan_pengiriman = $('#keterangan2').val()
            var orang_tambah = $('#orang_tambah_id').val()
            var gudang = $('#gudang_tambah_id').val()
            var sales = $('#sales_tambah_id').val()
            var status_order = $('#statusorder_tambah_id').val()
            var harga_belumppn = price;
            var qty_qty =qty;
            var disc_disc = disc;
            var harga_belumppn_import = price_import;
            var qty_qty_import =qty_import;
            var disc_disc_import = disc_import;
            var orderDetails = {
                include_ppn:include_ppn_global,
                ppn_centang_global:ppn_centang_global,
                database: database,
                code:purc_unit,
                code_import:purc_unit_import,
                name:purc_name,
                name_import:purc_name_import,
                tgl_request: tgl_request,
                cabang: cabang,
                id_mitrabisnis: id_mitra,
                code_mitrabisnis:code_mitra,
                name_mitrabisnis:name_mitra,
                keterangan: keterangan,
                keterangan_pengiriman:keterangan_pengiriman,
                orang_tambah: orang_tambah,
                gudang: gudang,
                sales: sales,
                status_order: status_order,
                harga_belumppn: harga_belumppn,
                qty_qty: qty_qty,
                disc_disc: disc_disc,
                ppn:ppn,
                ppn_import:ppn_row_import,
                subtotal:subtotal,
                harga_belumppn_import: harga_belumppn_import,
                qty_qty_import: qty_qty_import,
                disc_disc_import: disc_disc_import,
                subtotal_import:subtotal_import,
                td_subtotal:td_subtotal_global,
                td_total:td_total_global,
                td_ppn:total_ppn_global,
                orang:$('#orang_tambah_id').val()
            };
            console.log('orderDetails',orderDetails)
            $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.tambah_order_penjualan') }}',
                    data: {
                        formDataSend:orderDetails,
                        menu:'created'
                    },
                    beforeSend: function () {
                        // Tampilkan overlay
                        $('#overlay').show();
                    },
                    success: function(response) {
                        $('#overlay').hide();
                        console.log('response',response)
                        Swal.fire({
                                icon:'success',
                                title:'Success',
                                text:response.msg
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.href='/admin/data_orderpenjualan';
                            }
                        });
                    },error: function(xhr, status, error) {
                            console.log('Terjadi kesalahan:',error);
                    }
            })
        });

        
       
    })
    $(document).on('click', '#backbtn', function() {
            window.location.href='/admin/data_orderpenjualan'
        })
    
</script>