@extends('admin.templates_asetjs')
@section('link')

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection

@section('style')
<style>
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
<form action="" class="form-horizontal" id="editForm" method="get">
    @csrf

     <div class="form-group">

        <input type="hidden" class="form-control custom-border" id="id_edit" name="id_edit_name" value="{{ $Data['msg']['restok']['id'] }}">
    </div>
    <div style="position: relative; width: 100%;">
        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Jumlah Permintaan</label>
        <input type="number" class="form-control" data-id="{{ $Data['msg']['restok']['jml_permintaan'] }}" name="jml_permintaan" value="{{ $Data['msg']['restok']['jml_permintaan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
    </div>
     <div style="position: relative; width: 100%;">
        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
        <textarea type="text" class="form-control" data-id="{{ $Data['msg']['restok']['keterangan'] }}" name="keterangan"  style="border: 1px solid #ced4da; width: 100%; padding-left:20px;height: 130px;">{{ $Data['msg']['restok']['keterangan'] }}</textarea>
    </div>
   <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-lg-3 control-label" style="font-size: 15px;">Supplier</label>
     
        <select class="select select2 select-search form-control" id="product-supplier-edit-filter" name="edit_supplier">
            <option value="">Pilih Supplier</option>
            @foreach($Data['msg']['supplier'] as $index => $supplier)
            <option value="{{ $supplier['id'] }}" {{ $Data['msg']['restok']['id_supplier'] == $supplier['id'] ? 'selected' : ''}} >{{ $supplier['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
     <button type="button" id="submitButton" class="btn btn-primary" style="margin-left: auto;">Select</button>

    </div>
</form>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
                    
                    // Initialize Choices.js on the select element
                    const element = document.getElementById('product-supplier-edit-filter');
                    if (element) {
                        const choices = new Choices(element, {
                            searchEnabled: true,
                            itemSelectText: '',
                        });
                    }
    });

     $('#submitButton').click(function(event) {
                        // Mencegah perilaku default tombol
                        event.preventDefault();
                   
                        // Mengumpulkan data formulir
                        var formData = {
                            id: $('input[name=id_edit_name]').val(),
                            
                            jml_permintaan: $('input[name=jml_permintaan]').val(),
                            keterangan: $('textarea[name=keterangan]').val(),
                            supplier: $('#product-supplier-edit-filter').val(),
                           
                            
                        };
                        console.log(formData)
                        // Mengirim permintaan AJAX
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('admin.pembelian_edit_order_pembelian') }}', // mengirim data melalui url
                            data: formData,
                            success: function(response) {
                                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                                console.log(response);
                                if (response !== null) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Order Pembelian berhasil diedit!',
                                    }).then((result) => {
                                    // Jika pengguna menekan tombol "OK", muat ulang halaman
                                    if (result.isConfirmed || result.isDismissed) {
                                        location.reload();
                                    }
                                });
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'Order Pembelian Gagal diedit!',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                // Penanganan kesalahan jika terjadi
                                console.error(error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat mengirim permintaan!',
                                });
                            }
                        });
                    });
</script>

@endsection
