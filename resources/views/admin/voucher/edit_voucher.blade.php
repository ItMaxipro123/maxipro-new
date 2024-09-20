@extends('admin.templates_asetjs')
                    <form action="" class="form-horizontal" id="form-input" method="get">
                        @csrf
                        <h4 style="margin-bottom: 10px;">Form Edit Voucher</h4>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Kode Voucher</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="kode" data-id="{{ $Data['msg']['voucher']['id'] }}" value="{{ $Data['msg']['voucher']['kode'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Status</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="status" style="border: 1px solid #ced4da; width: 100%;">

                                    <option value="1" style="text-align: center;" {{ $Data['msg']['voucher']['status'] == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" style="text-align: center;" {{ $Data['msg']['voucher']['status'] == 0 ? 'selected' : '' }}>Expired</option>
                                    <option value="0" style="text-align: center;" {{ $Data['msg']['voucher']['status'] != 0 && $Data['msg']['voucher']['status'] != 1 ? 'selected' : '' }}>Pilih Aktif</option>

                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Select</button>
                        </div>
                    </form>
@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
<script>
    

    // Menangkap acara submit formulir
    $('#form-input').submit(function(event) {
        // Mencegah perilaku default formulir
        event.preventDefault();

        // Mengumpulkan data formulir
        var formData = {
            id: $('input[name=kode]').data('id'), // Mengambil data-id dari elemen input
            kode: $('input[name=kode]').val(),
            status: $('select[name=status]').val()
        };
        console.log(formData);
        // Mengirim permintaan AJAX
        $.ajax({
            type: 'GET',
            url: '{{ route('admin.edit_voucher') }}', // Ganti URL_TARGET dengan URL tujuan Anda
            data: formData,
            success: function(response) {
                // Tanggapan berhasil, lakukan apa yang perlu dilakukan di sini
                console.log(response);
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Voucher berhasil diedit!',
                }).then((result) => {
                    // Mengalihkan halaman ke halaman tertentu setelah mengklik OK pada SweetAlert
                    window.location.href = "{{ route('admin.voucher') }}";
                });
            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan jika terjadi
                console.error(error);
            }
        });
    });
</script>
@endsection