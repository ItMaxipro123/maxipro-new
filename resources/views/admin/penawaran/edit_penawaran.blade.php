@extends('admin.templates_asetjs')
@section('link')

@endsection
@section('style')
<style>


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


</style>
@endsection


@section('content')
 
     
            <form action="" class="form-horizontal" id="form-input" method="get">
                @csrf

                <div class="form-group" style="display: flex; align-items: center; margin-top:10px; margin-bottom: 20px;">

                    <div style="position: relative; width: 100%;">
                        <input type="hidden" class="form-control" data-id="{{ $Data['msg']['penawaran']['id'] }}" name="id_edit"  value="{{ $Data['msg']['penawaran']['id'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                    </div>
                </div>
                
                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama</label>
                    <div style="position: relative; width: 100%;">
                        <input type="text" class="form-control" data-id="{{ $Data['msg']['penawaran']['name'] }}" name="name_edit"  value="{{ $Data['msg']['penawaran']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                    </div>
                </div>

                
                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Perusahaan</label>
                    <div style="position: relative; width: 100%;">
                        <input type="text" class="form-control" name="company_edit" value="{{ $Data['msg']['penawaran']['company'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                    </div>
                </div>

                



                
                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Handphone</label>
                    <div style="position: relative; width: 100%;">
                        <input type="number" class="form-control" name="handphone" value="{{ $Data['msg']['penawaran']['handphone'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                    </div>
                </div>

                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Email</label>
                    <div style="position: relative; width: 100%;">
                        <input type="email" class="form-control" name="email_edit" value="{{ $Data['msg']['penawaran']['email'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;">Produk Penawaran</label>
                 
                    <select class="select-search form-control" id="product-penawaran-edit" name="product_penawaran" style="border: 1px solid #ced4da; width: 100%; display: none;">
                        <option value="1" style="text-align: center;">Pilih Produk</option>
                        @foreach($Data['msg']['product'] as $index => $product)
                        <option value="{{ $product['id'] }}" style="text-align: center;">{{ $product['new_kode'] }} - {{ $product['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                    @php
                        function formatRupiah($number){
                        return 'Rp ' . number_format($number, 0, ',', '.');
                    }
                    @endphp

                <div class="form-group" style="display: flex; align-items: center; margin-top: 50px; margin-bottom: 20px;">
                        <div style="position: relative; width: 100%;">
                            @foreach($Data['msg']['penawaran_barang'] as $index => $penawaran_barang)
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <input type="text" class="form-control" name="selected_product_edit_display[]" value="{{ $penawaran_barang['name'] }}" data-id="{{ $penawaran_barang['id'] }}" style="border: 1px solid #ced4da; width: 40%; padding-left: 20px; margin-right: 10px;" disabled>
                                <input type="hidden" class="form-control" name="selected_product_edit" value="{{ $penawaran_barang['id'] }}">

                                <input type="text" class="form-control" name="price_product_edit" value="{{ formatRupiah($Data['msg']['penawaran_detail'][$index]['price']) }}" style="border: 1px solid #ced4da; width: 20%; padding-left: 20px; margin-right: 10px;">
                                <textarea class="form-control" name="spesification_product_edit" style="border: 1px solid #ced4da; width: 25%;">{{ $Data['msg']['penawaran_detail'][$index]['spesification'] }}</textarea>
                                <button type="button" class="btn btn-danger" onclick="deleteProduct(this)" style="margin-left: 24px;">Delete</button>
                            </div>
                            @endforeach
                        </div>
                </div>

                <div class="form-group"id="alamat_edit" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Alamat</label>
                    <div style="position: relative; width: 100%;">
                        <input type="text" class="form-control"  name="address_edit" value="{{ $Data['msg']['penawaran']['address'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                    </div>
                </div>

                <div class="form-group" id="alamat_edit" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;">Pembayaran:</label>
                    <div style="position: relative; width: 100%;">

                      <input type="radio" name="option" value="1" {{ $Data['msg']['penawaran']['id_account']=='1' ? 'checked' : '' }}>
                      <label for="option1">Rekening UD</label><br>

                      <input type="radio" name="option" value="2" {{ $Data['msg']['penawaran']['id_account']=='2' ? 'checked' : '' }}>

                      <label for="option1">Rekening PT</label><br>
                      <input type="radio" name="option" value="3" {{ $Data['msg']['penawaran']['id_account']=='3' ? 'checked' : '' }}>
                      <label for="option1">Stephen Santoso</label><br>



                    </div>
                </div>
                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;">Status PPN:</label>
                    <div style="position: relative; width: 100%;">
                      <input type="checkbox" id="checkppn" name="ppn" value="1" {{ $Data['msg']['penawaran']['ppn']=='1' ? 'checked' : '' }} style="transform: scale(1.5);">


                  </div>
                </div>

                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Atas</label>
                    <div style="position: relative; width: 100%;">
                        @if( $Data['msg']['penawaran']['text_top'] =='')
                        <textarea class="form-control" name="text_top" placeholder="Dengan hormat, Kami dari Maxipro selaku supplier mesin perlengkapan cetak, dengan ini mengajukan penawaran harga untuk mesin - mesin yang mungkin anda butuhkan. Adapun mesin yang ingin kami tawarkan kepada anda sebagai berikut :" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;"></textarea>


                        @else
                        <textarea class="form-control" name="text_top" data-id="{{ $Data['msg']['penawaran']['text_top'] }}" value="{{ $Data['msg']['penawaran']['text_top'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">{{ $Data['msg']['penawaran']['text_top'] }}</textarea>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Tengah</label>
                    <div style="position: relative; width: 100%;">
                        @if( $Data['msg']['penawaran']['text_middle'] !='')
                        <textarea class="form-control" name="text_middle" data-id="{{ $Data['msg']['penawaran']['text_middle'] }}" value="{{ $Data['msg']['penawaran']['text_middle'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">{{ $Data['msg']['penawaran']['text_middle'] }}</textarea>



                        @else
                        <textarea class="form-control" name="text_middle" placeholder="Demikian surat penawaran ini, kiranya surat penawaran ini bisa menjadi bahan pertimbangan anda. Bila ada yang kurang jelas jangan segan untuk menghubungi kami. Anda bisa juga melihat produk kami yang lain di website kami (http://www.maxipro.co.id).Terima kasih atas perhatiannya." style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 120px;"></textarea>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Bawah</label>
                    <div style="position: relative; width: 100%;">

                        @if($Data['msg']['penawaran']['id_account']=='1')
                        <textarea id="keteranganTextArea" name="text_bottom" class="form-control" placeholder="Keterangan:&#10;Pembayaran Maxipro ke Rekening:&#10;&#10;Bank BCA0&#10;104 300 100&#10;&#10;Stephen Santoso" name="text_bottom"style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 190px;"></textarea>
                        @elseif($Data['msg']['penawaran']['id_account']=='2')
                        <textarea id="keteranganTextArea" name="text_bottom" class="form-control" placeholder="Keterangan:&#10;Pembayaran Maxipro ke Rekening:&#10;&#10;Bank BCA&#10;0103 800 100&#10;&#10;PT Maxipro Group Indonesia" name="text_bottom"style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 190px;"></textarea>
                        @elseif($Data['msg']['penawaran']['id_account']=='3')
                        <textarea id="keteranganTextArea" name="text_bottom" class="form-control" placeholder="Keterangan:&#10;Pembayaran Maxipro ke Rekening:&#10;&#10;Bank BCA&#10;0108 800 600&#10;&#10;Stephen Santoso" name="text_bottom"style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 190px;"></textarea>
                        @endif

                    </div>
                </div>

                <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                    <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Deskripsi Syarat dan Ketentuan Berlaku</label>
                    <div style="position: relative; width: 100%;">
                        @if( $Data['msg']['penawaran']['text_bothbottom'] !='')
                        <textarea class="form-control" name="text_bothbottom" data-id="{{ $Data['msg']['penawaran']['text_bothbottom'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">{{ $Data['msg']['penawaran']['text_bothbottom'] }}</textarea>



                        @else
                        <textarea class="form-control" name="text_bothbottom" placeholder="Demikian surat penawaran ini, kiranya surat penawaran ini bisa menjadi bahan pertimbangan anda. Bila ada yang kurang jelas jangan segan untuk menghubungi kami. Anda bisa juga melihat produk kami yang lain di website kami (http://www.maxipro.co.id).Terima kasih atas perhatiannya." style="border: 1px solid #ced4da; width: 100%; padding-left:20px; height: 120px;"></textarea>
                        @endif
                    </div>
                </div>



                <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                   <button type="submit" id="selectButton" class="btn btn-primary" style="margin-left: auto;">Select</button>
               </div>
            </form>
  
@endsection

@section('script')

<!-- DataTables JavaScript -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

     function deleteProduct(button) {
        // Mengambil parent node dari input yang akan dihapus
        var parentDiv = button.parentNode;
        // Menghapus parent node (div) yang berisi input
        parentDiv.remove();
    }
</script>

<script>
    var radios = document.querySelectorAll('input[name="option"]');
    var keteranganTextArea = document.getElementById('keteranganTextArea');

    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            var selectedValue = this.value;
            switch (selectedValue) {
                case '1':
                    keteranganTextArea.placeholder = 'Keterangan:\n\nPembayaran Maxipro ke Rekening:\n\nBank BCA\n0104 300 100\n\nStephen Santoso';
                    break;
                case '2':
                    keteranganTextArea.placeholder = 'Keterangan:\n\nPembayaran Maxipro ke Rekening:\n\nBank BCA\n0103 800 100\n\nPT Maxipro Group Indonesia';
                    break;
                case '3':
                    keteranganTextArea.placeholder = 'Keterangan:\n\nPembayaran Maxipro ke Rekening:\n\nBank BCA\n0108 800 600\n\nStephen Santoso';
                    break;
               
            }
        });
    });





    $(document).ready(function () {
        // Initialize Choices on the select element
        const element = document.getElementById('product-penawaran-edit');
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });

        // Handle the 'addItem' event from Choices
        element.addEventListener('addItem', function(event) {
    
            
            var data = event.detail; // Use event.detail instead of event.params
            var produk = @json($Data['msg']['product']);
            var produk_price = @json($Data['msg']['barang_price']);
            var product_spesifikasi;
            var price_product;
            
            if (Array.isArray(produk)) {
            produk.forEach(product => {
                if (product.id == data.value) { // Check if product and product.id exist
                product_spesifikasi=product.spesification;
                console.log('produk id', product.id)
                produk_price.forEach(price => {
                    if(product.id == price.id_barang){
                        
                        price_product= price.price_list
                    }
                });
                }
            });
            } else {
            console.error('produk is not an array');
            }
            console.log('price',data)

            var newInput = $('<input>').attr({
                type: 'text',
                name: 'selected_product_edit_display[]',
                value: data.label,
                class: 'form-control',
                style: 'border: 1px solid #ced4da; width: 40%; padding-left: 20px; margin-right: 10px;'
            });

            // Membuat input hidden untuk nilai id
            var newHiddenInput = $('<input>').attr({
                type: 'hidden',
                name: 'selected_product_edit',
                value: data.value,
                class: 'form-control'
            });
            var formattedValue = formatRupiah(price_product);
            var newInput2 = $('<input>').attr({
                type: 'text',
                
                name: 'price_product_edit',
                
                class: 'form-control',
                style: 'border: 1px solid #ced4da; width: 20%; padding-left: 20px; margin-right: 10px;'
            }).val(formattedValue);
            newInput2.on('input', function() {
               
                var value = $(this).val().replace(/\D/g, ''); // Menghapus karakter non-digit dari nilai input
                var formattedValue = formatRupiah(value); // Memformat nilai input menjadi format Rupiah
                $(this).val(formattedValue); // Mengatur nilai input sesuai format Rupiah
            });

            // Fungsi untuk memformat nilai menjadi format Rupiah
            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/\D/g, '');
                var split = number_string.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
                
                // Tambahkan titik jika angka memiliki ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                // Cetak hasil
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp. ' + rupiah;
            }

            var paragraphContent = '<p></p>';
            var newInput3 = $('<textarea>').attr({
                type: 'text',
                
                name: 'spesification_product_edit',
                
                class: 'form-control',
                style: 'border: 1px solid #ced4da; width: 25%; padding-left: 20px; margin-right: 10px;'
            }).val(product_spesifikasi);

            var deleteButton = $('<button>').attr({
                type: 'button',
                class: 'btn btn-danger',
                style: 'margin-left: 10px;'
            }).text('Delete').click(function() {
                inputsDiv.remove(); // Menghapus div inputsDiv saat tombol di klik
            });

            var inputsDiv = $('<div>').css({
                display: 'flex',
                alignItems: 'center',
                marginBottom: '10px' 
            });

            // Append the new input and delete button to the container div
            inputsDiv.append(newInput, newInput2,newInput3,newHiddenInput,deleteButton);

            // Append the container div to a specific part of the form
            $('#alamat_edit').before(inputsDiv);
        });
    });



  



</script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$('#form-input').submit(function(event) {
        // Mencegah perilaku default formulir
        event.preventDefault();

        // Mengumpulkan data formulir
        var formData = {
               id: $('input[name=id_edit]').data('id'), // Mengambil data-id dari elemen input id
             name: $('input[name=name_edit]').val(), // Mengambil value dari elemen name_edit 
                                                     // Note: dibawah Mengikuti name_edit
             company: $('input[name=company_edit]').val(),
             address: $('input[name=address_edit]').val(),
             email: $('input[name=email_edit]').val(),
            pembayaran: $('input[name=option]:checked').val(),
             handphone: $('input[name=handphone]').val(),
             text_top: $('textarea[name=text_top]').val(),
             text_middle: $('textarea[name=text_middle]').val(),
             text_bottom: $('textarea[name=text_bottom]').val(),
             text_bothbottom: $('textarea[name=text_bothbottom]').val(),

              ppn: $('input[name=ppn]').is(':checked') ? '1' : '0',
             selected_product_edit: $('input[name=selected_product_edit]').map(function() {
                return $(this).val();
             }).get(),
             price_product_edit: $('input[name=price_product_edit]').map(function(){
                return $(this).val();
             }).get(),
             spesification_product_edit: $('textarea[name=spesification_product_edit]').map(function(){
                return $(this).val();
             }).get(),
            // status: $('select[name=status]').val()
        };
        console.log('formdata',formData)
        // Mengirim permintaan AJAX
        $.ajax({
            type: 'GET',
            url: '{{ route('admin.edit_penawaran') }}', // Ganti URL_TARGET dengan URL tujuan Anda
            data: formData,
            success: function(response) {
                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
               console.log(response);
                if(response !== null){
                     
                     Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Penawaran berhasil diedit!',
                    });
                    // .then((result) => {
                    //     // Mengalihkan halaman ke halaman tertentu setelah mengklik OK pada SweetAlert
                    //     window.location.reload();
                    // });
                }
                else{
                    console.log(response);
                     Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Penawaran Gagal diedit!',
                    });
                }
                 
            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan jika terjadi
                console.error(error);
            }
        });
    });
</script>
@endsection
