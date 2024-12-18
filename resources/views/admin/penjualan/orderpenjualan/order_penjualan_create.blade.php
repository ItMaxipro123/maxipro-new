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
.custom-container {
    width: 100%;          /* Lebar penuh */
    margin-right: auto;   /* Posisi tengah */
    margin-left: auto;
    padding-left: 0px;   /* Padding kiri */
    
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


                    <select style="border: 1px solid #ced4da; background-color: white;" class="select select2 select-search form-control" id="database_tambah_id" name="database_tambah_name" required>
                        <option value="0">Pilih Database</option>
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


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 cabang-search form-control" id="cabang_tambah_id" name="cabang_tambah_name" required>
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


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 mitra-search form-control" id="mitrabisnis_tambah_id" name="mitrabisnis_tambah_name" required>
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
                        <label for="">Harga Normal</label>
                        <input type="number" id="harga_nromal" class="form-control input-harga-normal" placeholder="Harga Normal">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Harga Deal</label>
                        <input type="number" id="harga_deal" class="form-control input-harga-deal" placeholder="Harga Deal">
                    </div>
                   
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" id="qty" class="form-control input-qty" placeholder="QTY">
                    </div>

                    <div class="form-group">
                        <label for="disc">DISC</label>
                        <input type="number" id="disc" class="input-disc" style="border:none;" disabled>
                    </div>
                    <div class="form-group">
                        <label for="belumppn">Harga Belum PPN</label>
                        <input type="number" id="harga" class="input-harga" style="border:none;" disabled>
                    </div>
                    <div class="form-group">
                        <label for="ppn">PPN</label>
                        <input type="checkbox" id="ppn" class="form-checkbox input-ppn">
                    </div>
                    
                   
                   
            </div>
            <div class="form-row">
                    <div class="form-group">
                        <label for="subtotal">Subtotal</label>
                        <input type="number" id="subtotal" class="form-control input-subtotal" placeholder="Subtotal" readonly>
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


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 orang-search form-control" id="orang_tambah_id" name="orang_tambah_name" required>
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


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 gudang-search form-control" id="gudang_tambah_id" name="gudang_tambah_name" required>
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


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 sales-search form-control" id="sales_tambah_id" name="sales_tambah_name" required>
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


                    <select style="border: 1px solid #696868; color: black; padding: 10px;" class="select select2 status-search form-control" id="statusorder_tambah_id" name="statusorder_tambah_name" required>
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


    $(document).ready(function() {
        $('#database_tambah_id').select2({
            allowClear: true, // Menampilkan tombol clear
            placeholder: "Pilih Database",
            width: '100%'
        });

        // Fokus otomatis pada input pencarian ketika dropdown terbuka
        $('.select-search').on('select2:open', function () {
            // Cari elemen input search Select2 yang aktif dan fokus
            let searchField = $('.select2-container--open .select2-search__field');
            searchField[0].focus();
        });
        

        var json_harga = {!! json_encode($Data) !!};
        var subtotal_notinclude=[]
        var subtotal_import_notinclude=[]
        var subtotal=[];
        var price=[];
        var price_import=[];
        var price_normal=[];
        var price_normal_import=[];
        var price_deal=[]
        var price_deal_import=[]
        var qty=[];
        var disc=[];
        var subtotal_import=[];

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


        var ppn_global_new =1;

        $(document).on('change', '.select-barang', function () {
            price =[]
            subtotal=[]
            subtotal_notinclude=[]
                    

            qty=[]
            disc=[]
            ppn_row_import=[]
            ppn=[]
            ppn_centang_global =0
            purc_unit=[]
            purc_name=[]
            const selectedValue = $(this).val(); // Mengambil nilai opsi yang dipilih
            const selectedOption = $(this).find(':selected'); // Mengambil opsi yang dipilih
            var dataId = selectedOption.data('id');
            const selectedText = $(this).find('option:selected').text(); // Mengambil teks opsi yang dipilih
            console.log('Nilai yang dipilih:', selectedValue);
            const parts = selectedText.split('-');
            const name_item = parts[1].trim();
            console.log('dataId',dataId)
            console.log('name_item',name_item)
           
            
           // Periksa apakah json_harga.msg dan json_harga.msg.hargaItem adalah objek
           if (json_harga && json_harga.msg && typeof json_harga.msg.hargaItem === 'object') {
                let found = Object.entries(json_harga.msg.hargaItem).find(([key, itemHarga]) => {
                    return itemHarga.itemid == selectedValue && itemHarga.price1 !== 0;
                });

                if (found) {
                    let itemHarga = found[1];
                    let harga = itemHarga.price1;

   

                    // Set nilai ke elemen input
                    $('.input-harga-normal').val(parseInt(harga));
                    $('.input-harga-deal').val(parseInt(harga));
                    $('.input-harga').val(parseInt(harga));
                    $('.input-qty').val(1);
                    $('.input-disc').val(0);
                    $('.belumppn').val(parseInt(harga));
                    $('.input-subtotal').val(parseInt(harga));
                    $('.input-ppn').prop('checked',true)
                    // Push nilai ke array hanya sekali
                    price.push(parseInt(harga));
                    subtotal.push(harga);
                    subtotal_notinclude.push(parseInt(harga));
                    console.log('subtotal_notinclude', subtotal_notinclude);

                    qty.push($('.input-qty').val());
                    disc.push(0);
                    ppn_row_import.push(0);
                    ppn.push(1);
                    ppn_centang_global =1
                    document.getElementById("ppn-checkbox").checked = true;
                    purc_unit.push(selectedValue)
                    purc_name.push(name_item)
                    var ppn_subtotal_sementara = subtotal.map(value => parseInt(value / ppn_global_new));
                        var ppn_subtotal_import_sementara = subtotal_import.map(value => parseInt(value / ppn_global_new));
                        let sub=ppn_subtotal_sementara
                        let subtot_import=ppn_subtotal_import_sementara
                        // Hitung subtotal
                    calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
                }
            }
 
            else {
                console.error("hargaItem bukan objek atau data tidak valid:", json_harga);
            }
            $('.ppncentang').on('change', function() {
                var ppn_chekbox = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                ppn_centang_global = ppn_chekbox;
                    if (ppn_centang_global === 1) {
                        var ppn_subtotal_sementara = subtotal.map(value => parseInt(value / ppn_global_new));
                        var ppn_subtotal_import_sementara = subtotal_import.map(value => parseInt(value / ppn_global_new));
                        let sub=ppn_subtotal_sementara
                        let subtot_import=ppn_subtotal_import_sementara
                        // Hitung subtotal
                        $('.input-ppn').prop('checked', true); // Nilai 1 jika dicentang, 0 jika tidak
                        
                        ppn =[1]
                        calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
                        
                    } else {
                        ppn_global_new=1;
                       
                        let value_ppn = 0; // Langsung tetapkan nilai 0
                        $('.input-ppn').prop('checked', false); // Pastikan checkbox tidak dicentang
                        console.log('value_ppn', value_ppn);

                        let index = $(this).data('index');
                        updatePPN(index, value_ppn);

                       
                    }
            })
            $('.includeppn').on('change', function() {
                    var include_ppn = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                    include_ppn_global = include_ppn;
                    
                    if (include_ppn === 1) {
                        ppn_global_new=(json_harga.msg.master_ppn.ppn/100)+0.01;
                        // console.log('masuk ppn global',ppn_global_new)
                        var ppn_subtotal_sementara = subtotal.map(value => parseInt(value / ppn_global_new));
                        var ppn_subtotal_import_sementara = subtotal_import.map(value => parseInt(value / ppn_global_new));

                        
                        
                        let ppnValueCentang = 1;
                                // console.log("Nilai PPN:", ppnValueCentang);
                                ppn_centang_global=ppnValueCentang;
                                document.getElementById("ppn-checkbox").checked = true;
                        let sub=ppn_subtotal_sementara
                        let subtot_import=ppn_subtotal_import_sementara

                        $('.input-ppn').prop('checked', true); // Nilai 1 jika dicentang, 0 jika tidak
                        
                        ppn =[1]
                        calculateSubtotal(sub,subtot_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
                      
                        
                    } else {
                        ppn_global_new=1;
  
                        calculateSubtotal(subtotal_notinclude,subtotal_import_notinclude,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
                    }
            });
         
            $('.input-harga-normal').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
              
                let harga_normal = parseFloat($(this).val()) || 0; // Pastikan nilainya angka
                let harga_deal = parseFloat($('.input-harga-deal').val()) || 0; // Pastikan nilainya angka
                price_normal =[harga_normal]
                price_deal =[harga_normal]
                // Hitung diskon
                let harga_disc = harga_normal - harga_deal;
                disc =[harga_disc]

                $('.input-disc').val(harga_disc)
                subtotal= price_deal
               
                calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
            });
            $('.input-harga-deal').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
              
                let harga_deal = parseFloat($(this).val()) || 0; // Pastikan nilainya angka
                let harga_normal = parseFloat($('.input-harga-normal').val()) || 0; // Pastikan nilainya angka
                price_normal =[harga_normal]
                price_deal =[harga_deal]
                // Hitung diskon
                let harga_disc = harga_normal - harga_deal;
                disc =[harga_disc]
                console.log('price_normal',price_normal)
                console.log('harga_deal',price_deal)
                console.log('harga_disc',disc)
                $('.input-disc').val(harga_disc)
                $('.input-harga').val(harga_deal)
                subtotal= price_deal
                // subtotal_notinclude= [$(this).val()]
                // console.log('subtotal_notinclude',subtotal_notinclude)
                calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
            });
            $('.input-harga').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
                subtotal= [$(this).val()]
                subtotal_notinclude= [$(this).val()]
                console.log('subtotal_notinclude',subtotal_notinclude)
                calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
            });
            $('.input-ppn').on('change', function() {
                    let value_ppn = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                    
                    ppn_centang_global=value_ppn
                    if(ppn_centang_global===1){
                        // console.log('value_ppn',value_ppn)
                        $('.ppncentang').prop('checked', true);
                        var ppn_subtotal_sementara = subtotal.map(value => parseInt(value / ppn_global_new));
                        var ppn_subtotal_import_sementara = subtotal_import.map(value => parseInt(value / ppn_global_new));
                        console.log('ppn_subtotal_sementara',ppn_subtotal_sementara)
                        console.log('ppn_subtotal_import_sementara',ppn_subtotal_import_sementara)
                        ppn =[value_ppn]
                        
                        calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
                    }else {
                        ppn_global_new=1;
                       
                        let value_ppn = 0; // Langsung tetapkan nilai 0
                        $('.input-ppn').prop('checked', false); // Pastikan checkbox tidak dicentang
                        console.log('value_ppn', value_ppn);

                        let index = $(this).data('index');
                        updatePPN(index, value_ppn);

                       
                    }
            });
            $('.input-qty').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai berubah:', value);
                qty= [$(this).val()]
                calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
            });
            $('.input-disc').on('input', function() {
                let value = $(this).val(); // Ambil nilai dari input
                let index = $(this).data('index');
                console.log('Nilai disc berubah:', value);
                disc= [$(this).val()]
                calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
                
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
             
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
            }

            function updateData(index,value){
                
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
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
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
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
            }
            
            function updateDataDisc(index,value){
                 // price[index]=value
                 disc =[value]
                 let result = price.map((priceValue, index) => {
                    let qtyValue = parseFloat(qty[index]) || 0; // Pastikan qty adalah angka
                    let discValue = parseFloat(disc[index]) || 0; // Pastikan disc adalah angka
                    return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                });
                console.log('discValue',result)
                // subtotal=[result]
                console.log('subtotal',subtotal)
                console.log('price',price)
                console.log('qty',qty)
                console.log('disc',disc)
                $('.input-subtotal').val(subtotal);
                calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
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
        
            $('#cabang_tambah_id').select2({
                placeholder: 'Pilih Cabang',
                allowClear: true,
                width: '100%'
            });

            // Fokus otomatis pada input pencarian ketika dropdown terbuka
            $('.cabang-search').on('select2:open', function () {
                // Cari elemen input search Select2 yang aktif dan fokus
                let searchField = $('.select2-container--open .select2-search__field');
                searchField[0].focus();
            });

            $('#mitrabisnis_tambah_id').select2({
                placeholder: 'Pilih Mitra Bisnis',
                allowClear: true,
                width: '100%'
            });
            
            // Fokus otomatis pada input pencarian ketika dropdown terbuka
            $('.mitra-search').on('select2:open', function () {
                // Cari elemen input search Select2 yang aktif dan fokus
                let searchField = $('.select2-container--open .select2-search__field');
                searchField[0].focus();
            });
            $('.select-barang').on('select2:open', function () {
                // Cari elemen input search Select2 yang aktif dan fokus
                let searchField = $('.select2-container--open .select2-search__field');
                searchField[0].focus();
            });
            flatpickr("#tgl_request_tambah", {
                dateFormat: "Y-m-d",
                
                disableMobile: true
            });
            let rowrowIndex = 0;
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
                        <label for="">Harga Normal</label>
                        <input type="number" id="harga_nromal_import" data-id="${rowrowIndex}"class="form-control input-harga-normal-import" placeholder="Harga Normal">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Harga Deal</label>
                        <input type="number" id="harga_deal_import" data-id="${rowrowIndex}" class="form-control input-harga-deal-import" placeholder="Harga Deal">
                    </div>


                    <div class="form-group">
                        <label for="qty-import">QTY</label>
                        <input type="number" id="qty-import" data-id="${rowrowIndex}" class="form-control input-qty-import" placeholder="QTY">
                    </div>
                    <div class="form-group">
                        <label for="disc-import">DISC</label>
                        <input type="number" id="disc-import"  data-id="${rowrowIndex}" class="input-disc-import" style="border:none;" disabled>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="">Harga Belum PPN</label>
                        <input type="number" id="harga-import" data-id="${rowrowIndex}" class="input-harga-import" style="border:none;" disabled>
                    </div>
                     <div class="form-group">
                        <label for="ppn-import">PPN</label>
                        <input type="checkbox" id="ppn-import" data-id="${rowrowIndex}" class="form-checkbox input-ppn-import">
                    </div>
                   
                   
                            <div class="form-group">
                                <label for="">Subtotal</label>
                                <input type="number" id="subtotal-import" data-id="${rowrowIndex}" class="form-control input-subtotal-import" readonly>
                            </div>
                   
                   

                    <div class="custom-container">
                        <div class="row">
                            <div class="form-group actions">
                                <button type="button" class="btn btn-danger btn-delete" data-id="${rowrowIndex}">Hapus</button>
                            </div>
                        </div>
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
                            let harga_import = itemHarga.price1 > 0 ? itemHarga.price1 : 1;
                            harga_import = parseFloat(harga_import);

                            // Update nilai input di baris saat ini
                            currentRow.find('.input-harga-normal-import').val(harga_import);
                            currentRow.find('.input-harga-deal-import').val(harga_import);
                            currentRow.find('.input-harga-import').val(harga_import);
                            currentRow.find('.input-qty-import').val(1);
                            currentRow.find('.input-disc-import').val(0);
                            currentRow.find('.input-subtotal-import').val(harga_import);
                            currentRow.find('#ppn-import').prop('checked', true);
                            // Inisialisasi array berdasarkan indeks baris
                            purc_unit_import[rowIndex] = selectedValue;
                            purc_name_import[rowIndex] = nameItem;
                            price_import[rowIndex] = harga_import;
                            price_deal_import[rowIndex]= harga_import;
                            qty_import[rowIndex] = 1;
                            disc_import[rowIndex] = 0;
                            subtotal_import[rowIndex] = harga_import; // Mengupdate nilai subtotal_import pada indeks tertentu
                            subtotal_import_notinclude = [...subtotal_import]; // Menyalin array subtotal_import ke subtotal_import_notinclude
                       
                            ppn_row_import[rowIndex] = 1;
                            let newSubtotal = 0;
                            for (let i = 0; i < 1; i++) {
                                newSubtotal = [subtotal[i]];
                            }
                            console.log('newSubtotal',newSubtotal)
                            calculateSubtotal(newSubtotal, subtotal_import, ppn_row, ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import);
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
                        $('.select-barang-import').on('select2:open', function () {
                            // Cari elemen input search Select2 yang aktif dan fokus
                            let searchField = $('.select2-container--open .select2-search__field');
                            searchField[0].focus();
                        });

                        $('.input-ppn-import').on('input', function() {
                            let value_ppn = $(this).is(':checked') ? 1 : 0; // Nilai 1 jika dicentang, 0 jika tidak
                            console.log('value_ppn_import',value_ppn)
                            let index = $(this).data('index');
                            
                        });
                        $('.input-harga-normal-import').on('input', function() {
                            let value = $(this).val(); // Ambil nilai dari input
                            let index = $(this).data('id'); // Ambil data-id dari parent .form-row
                            console.log('Nilai berubah:', value);
                            console.log('index', index);

                            let harga_normal = parseFloat(value) || 0; // Pastikan nilainya angka
                            let harga_deal = parseFloat($(`.input-harga-deal-import[data-id=${index}]`).val()) || 0; // Pastikan nilainya angka
                            let input_qty = parseFloat($(`.input-qty-import[data-id=${index}]`).val()) || 0; // Pastikan nilainya angka
                            price_normal_import[index] = harga_normal;
                            price_deal_import[index] = harga_deal;
                            qty_import[index]=input_qty
                            // Hitung diskon
                            let harga_disc = harga_normal - harga_deal;
                            console.log('harga_disc', harga_disc);
                            disc_import[index] = harga_disc;

                            // Set the value of the discount input field
                            $(`.input-disc-import[data-id=${index}]`).val(harga_disc);
                            subtotal_import = (harga_deal*input_qty)-(harga_disc*input_qty);
                            $(`.input-subtotal-import[data-id=${index}]`).val(subtotal_import[index]);


                            calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new, qty, qty_import, disc, disc_import);
                        });
                        //notfix
                        $('.input-harga-deal-import').on('input', function() {
                            let value = $(this).val(); // Ambil nilai dari input
                            let index = $(this).data('id');
                            console.log('Nilai berubah:', value);
                        
                            let harga_deal = parseFloat($(this).val()) || 0; // Pastikan nilainya angka
                            let harga_normal = parseFloat($('.input-harga-normal-import').val()) || 0; // Pastikan nilainya angka
                            price_normal_import =[harga_normal]
                            price_deal_import =[harga_deal]
                            // Hitung diskon
                            let harga_disc = harga_normal - harga_deal;
                            disc_import =[harga_disc]

                            $('.input-disc-import').val(harga_disc)
                            $('.input-harga-import').val(price_deal_import)
                            subtotal_import= price_deal_import
                        
                            calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new,qty,qty_import,disc,disc_import);
                        });
                      
                        $('.input-qty-import').on('input', function() {
                            let value = $(this).val(); // Ambil nilai dari input
                            let index = $(this).data('id'); // Ambil data-id dari parent .form-row
                            console.log('Nilai berubah:', value);

                            let harga_normal = parseFloat($(`.input-harga-normal-import[data-id=${index}]`).val()) || 0;
                            let harga_deal = parseFloat($(`.input-harga-deal-import[data-id=${index}]`).val()) || 0; // Pastikan nilainya angka
                            let input_qty = value; // Pastikan nilainya angka
                            price_normal_import[index] = parseFloat(harga_normal);
                            price_deal_import[index] = parseFloat(harga_deal);
                            qty_import[index]=parseFloat(input_qty)
                            // Hitung diskon
                            let harga_disc = harga_normal - harga_deal;
                            
                            disc_import[index] = parseFloat(harga_disc);

                            // Set the value of the discount input field
                            $(`.input-disc-import[data-id=${index}]`).val(harga_disc);
                            subtotal_import[index] = parseFloat((harga_deal*input_qty)-(harga_disc*input_qty));
                            $(`.input-subtotal-import[data-id=${index}]`).val(subtotal_import[index]);


                            calculateSubtotal(subtotal, subtotal_import, ppn_row, ppn_row_import, ppn_global_new, qty, qty_import, disc, disc_import);
                            
                        });

                        // $('.input-disc-import').on('input', function() {
                        //     let value = $(this).val(); // Ambil nilai dari input
                        //     let index = $(this).data('index');
                        //     console.log('Nilai berubah:', value);
                        //     updateDataDiscImport(index,value)
                        // });

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
                        
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
                        }

                        function updateDataImport(index,value){
                        
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
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
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
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
                            
                        }
                        
                        function updateDataDiscImport(index,value){
                            
                            disc_import =[value]
                            let result = price_import.map((priceValue, index) => {
                                let qtyValue = parseFloat(qty_import[index]) || 0; // Pastikan qty adalah angka
                                let discValue = parseFloat(disc_import[index]) || 0; // Pastikan disc adalah angka
                                return (parseFloat(priceValue) * qtyValue) - discValue; // Perkalian harga * qty, lalu kurangi diskon
                            });

                            subtotal_import=[result]
                
                            $('.input-subtotal-import').val(subtotal_import);
                            calculateSubtotal(subtotal,subtotal_import,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import)
                        }
           
                        rowrowIndex++;
        }

        // Event delegation untuk tombol hapus
        $('#tbody_tambah').on('click', '.btn-delete', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove(); // Hapus baris yang sesuai
        });
      
        function calculateSubtotal(subtotal_func, subtotal_import_func,ppn_row,ppn_row_import,ppn_global_new,qty,qty_import,disc,disc_import) {
        
                        for (let i = 0; i < 1; i++) {
                            subtotal_func = [subtotal_func[i]];
                        }
                        console.log('subtotal_func',subtotal_func)
                        console.log('subtotal_import_func',subtotal_import_func)
                for (let i = 0; i < Math.max(subtotal_func.length, subtotal_import_func.length); i++) {
                    subtotal[i] = parseFloat(subtotal_func[i])
                    $('.input-subtotal').val(parseFloat(subtotal[i]) || 0);

                    subtotal_import[i] = subtotal_import_func[i];

                    // Periksa apakah nilainya NaN, jika iya ganti dengan 0
                    if (isNaN(subtotal_import[i])) {
                        subtotal_import[i] = 0;
                    }
                }
                var total_qty_sementara = qty.map(value => parseInt(value));
                var total_qty_sementara_import = qty_import.map(value => parseInt(value));

                // Menjumlahkan kedua array langsung dalam satu langkah
                var total_qty_akhir = total_qty_sementara.reduce((acc, value) => acc + value, 0) + 
                                 total_qty_sementara_import.reduce((acc, value) => acc + value, 0);
                
                var total_disc_sementara = disc.map(value => parseInt(value));
                // console.log('total_disc_sementara',total_disc_sementara)
                var total_disc_sementara_import = disc_import.map(value => parseInt(value));

                // Menjumlahkan kedua array langsung dalam satu langkah
                var total_disc_akhir = total_disc_sementara.reduce((acc, value) => acc + value, 0) + 
                                      total_disc_sementara_import.reduce((acc, value) => acc + value, 0);
                console.log('ppn_row',ppn_row)
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
                
                
                // subtotal_notinclude,subtotal_notinclude_import
                
                console.log('total_ppn',total_ppn)
                // console.log('subtotal not include',subtotal_import_notinclude)
             
                // Menghitung total_lama_subtotal dan total_lama_subtotal_import
                var total_lama_subtotal = subtotal_notinclude.map(value => parseInt(value));
                var total_lama_subtotal_import = subtotal_import_notinclude.map(value => parseInt(value));

                
                // Menjumlahkan kedua array langsung dalam satu langkah
                var total_lama = total_lama_subtotal.reduce((acc, value) => acc + value, 0) + 
                                total_lama_subtotal_import.reduce((acc, value) => acc + value, 0);
                
                // let total = 0; // Inisialisasi total

                // // (masih belum fix tgl 17-12-2024)
                // console.log('subtotal_import',subtotal_import)
                // console.log('Math.max(subtotal_func.length, subtotal_import_func.length)',Math.max(subtotal_func.length, subtotal_import_func.length))
                // // Iterasi untuk menjumlahkan semua data dari kedua array
                // for (let i = 0; i < Math.max(subtotal_func.length, subtotal_import_func.length); i++) {
                //     // Ambil nilai dari subtotal_func, jika undefined atau NaN ganti dengan 0
                //     let value = isNaN(subtotal_func[i]) ? 0 : parseFloat(subtotal_func[i]);

                //     // Ambil nilai dari subtotal_import_func, default 0 jika undefined atau NaN
                //     let importValue = isNaN(subtotal_import_func[i]) ? 0 : parseFloat(subtotal_import_func[i]);

                //     // Perhitungan td_subtotal
                //     let td_subtotal = parseFloat((value * total_qty_sementara) - (total_disc_sementara * total_qty_sementara)) + 
                //                     parseFloat((importValue * total_qty_sementara_import) - (total_disc_sementara_import * total_qty_sementara_import));

                //     console.log(`Index ${i}: ${value} + ${importValue} = ${td_subtotal}`);

                //     // Tambahkan td_subtotal ke total
                //     total += td_subtotal;
                //     console.log('Total:', total);

                //     // Ambil nilai importValueSubtot dan set input field
                //     let importValueSubtot = price_deal_import[i] || 0; // Ganti dengan 0 jika undefined atau NaN
                //     $('.input-subtotal-import').val(importValueSubtot);
                // }

                let total = 0; // Inisialisasi total

                // Ambil panjang maksimal antara subtotal_func dan subtotal_func_import untuk menentukan jumlah iterasi
                var maxLength = Math.max(subtotal_func.length, subtotal_import_func.length);

                // Loop untuk memproses kedua array
             // Initialize total sums for value and importValue separately
                var totalValue = 0;
                var totalImportValue = 0;
                let td_subtotal=0
                for (var i = 0; i < maxLength; i++) {
                    // Ambil nilai dari subtotal_func, jika undefined atau NaN ganti dengan 0 (gunakan nilai pertama jika ada)
                    var value =((subtotal_func[0] * total_qty_sementara) - (total_disc_sementara * total_qty_sementara));
                    
                    // Ambil nilai dari subtotal_import_func, jika undefined atau NaN ganti dengan 0
                    var importValue = (i < subtotal_import_func.length && subtotal_import_func[i] !== undefined && !isNaN(subtotal_import_func[i])) 
                                        ? parseFloat(subtotal_import_func[i]) 
                                        : 0;


                    // Perhitungan td_subtotal dengan nilai yang sudah divalidasi
                    var subtotalImportValue = (i < subtotal_import_func.length && !isNaN(subtotal_import_func[i])) 
                                                ? parseFloat(subtotal_import_func[i]) 
                                                : 0;
                    var qtyImportValue = (i < qty_import.length && !isNaN(qty_import[i])) 
                                        ? parseFloat(qty_import[i]) 
                                        : 0;
                    var discImportValue = (i < disc_import.length && !isNaN(disc_import[i])) 
                                        ? parseFloat(disc_import[i]) 
                                        : 0;

                    // Calculate the subtotal for the current index using the formula
                    var currentSubtotal = (subtotalImportValue * qtyImportValue) - (discImportValue * qtyImportValue);
                    
                    // Add the calculated subtotal to the overall td_subtotal
                    td_subtotal += currentSubtotal;
                    // var td_subtotal=0
                    let td_subtotal_akhir = value+td_subtotal;
                    // Log the value and importValue separately for debugging
                    console.log('currentSubtotal:', currentSubtotal);
                    console.log('Value:', value[i]);
                    console.log('Import Value:', subtotal_import_func[i]);
                    console.log('qty_import:', qty_import[i]);
                    console.log('Import Value:', subtotal_import_func[i]);
                    console.log('Subtotal for this iteration (td_subtotal):', td_subtotal_akhir);


                    // Pastikan td_subtotal bukan NaN sebelum menambahkannya ke total
                    total = !isNaN(td_subtotal_akhir) ? td_subtotal_akhir : 0; // Hanya tambah jika td_subtotal valid

                    console.log('Total Subtotal:', total);
                    
                    // Ambil nilai importValueSubtot dan set input field (asumsi hanya mengambil nilai pertama dari price_deal_import)
                
                    // $('.input-subtotal-import').val(importValueSubtot);
                }



                            
                
                //includeppn tidak centang, ppn centang
                if(include_ppn_global==0 && ppn_centang_global==1){
                    td_subtotal_global=total
                    
                    // Get the value from the input field with class 'input-harga' and convert it to a float
                    let harga_sub_noimport = parseFloat($('.input-harga').val()) || 0;

                    // Calculate the subtotal for no import
                    let td_sub_noimport = (harga_sub_noimport * total_qty_sementara) - (total_disc_sementara * total_qty_sementara);

                    // Ensure the result is a valid number
                    td_sub_noimport = isNaN(td_sub_noimport) ? 0 : td_sub_noimport;

                    
                    $('.input-subtotal').val(td_sub_noimport)
                    

                    $('#td_subtotal').text(td_subtotal_global)

                    ppn_global_new =  Math.ceil(total * (json_harga.msg.master_ppn.ppn / 100));

                    total_ppn_global=ppn_global_new
              
                
                    $('#td_ppn').text(total_ppn_global)
                    
                    td_total_global = Math.ceil((total + total_ppn_global) / 10) * 10;


                    // Membulatkan ke atas ke kelipatan 10
                    
                    $('#td_total').text(td_total_global)
                }
                 //includeppn centang, ppn centang
                else if(include_ppn_global==1 && ppn_centang_global==1){
                    // Hitung subtotal termasuk PPN
                    let subtotal_include_ppnss = ((total_lama * total_qty_akhir) - (total_disc_akhir * total_qty_akhir)) * 100 / (100 + json_harga.msg.master_ppn.ppn);
                    

                    // Simpan hasil ke variabel global
                    td_subtotal_global = parseInt(subtotal_include_ppnss);
                    $('.input-subtotal').val(td_subtotal_global)

                    // Perbarui elemen HTML dengan hasil
                    $('#td_subtotal').text(td_subtotal_global); // Gunakan toFixed(2) untuk format angka desimal 2 digit
                    total_ppn_global = ((total_lama * total_qty_akhir) - (total_disc_akhir * total_qty_akhir))-(td_subtotal_global);
                    console.log('total_ppn_global',total_ppn_global)
                    
                    $('#td_ppn').text(total_ppn_global)
                    td_total_global=(total_lama * total_qty_akhir) - (total_disc_akhir * total_qty_akhir)
                    $('#td_total').text(td_total_global)

                }
                else if(include_ppn_global==1 && ppn_centang_global==0){
                    td_total_global=total
                    total_ppn_global=0
                    
                    
                    $('#td_ppn').text(total_ppn_global)
                    $('#td_total').text(td_total_global)

                }
                else{
          
                    td_total_global=total
                    total_ppn_global=0
                    td_subtotal_global=total
                    $('#td_subtotal').text(total)
                    $('#td_ppn').text(total_ppn_global)
                    $('#td_total').text(td_total_global)
                }
                
                
            
               
                
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
                price_normal:price_normal,
                price_deal:harga_belumppn,
                qty_qty: qty_qty,
                disc_disc: disc_disc,
                ppn:ppn,
                ppn_import:ppn_row_import,
                subtotal:     [$('.input-subtotal').val()],
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
                    // url: '{{ route('admin.tambah_order_penjualan') }}',
                    url:'',
                    data: {
                        formDataSend:orderDetails,
                        // menu:'created'
                    },
                    // beforeSend: function () {
                    //     // Tampilkan overlay
                    //     $('#overlay').show();
                    // },
                    success: function(response) {
                        $('#overlay').hide();
                        // console.log('response',response)
                        Swal.fire({
                                icon:'success',
                                title:'Success',
                                text:response.msg
                        }).then((result)=>{
                            // if(result.isConfirmed){
                            //     window.location.href='/admin/data_orderpenjualan';
                            // }
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