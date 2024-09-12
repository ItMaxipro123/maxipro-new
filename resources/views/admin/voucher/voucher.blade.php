@extends('admin.templates')


@section('title')
Voucher | PT. Maxipro Group Indonesia
@endsection
@section('link')

@endsection
@section('style')

<style>

     /* Ganti warna latar belakang tabel */
        #tabe-stok {
            background-color: #f0f0f0; /* Ganti dengan warna yang Anda inginkan */

        }
    /* Ganti warna border pada input pencarian */
    .dataTables_filter input[type="search"] {
        border: 1px solid #ccc; /* Ganti dengan warna dan ukuran border yang Anda inginkan */
        border-radius: 5px; /* Opsional: untuk membuat sudut border melengkung */
        padding: 5px; /* Opsional: untuk memberi jarak antara border dan teks */
    }
    

    /* CSS untuk gaya select2 custom */
    .select2-container--custom .select2-selection--single {
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        width: 100%;
    }

    .empty-row {
        border: none;
    }

    .select2-container--custom .select2-selection--single .select2-selection__arrow {
        right: 10px;
    }

    .select2-container--custom .select2-selection--single .select2-selection__rendered {
        color: #495057;
        line-height: 1.5;
        text-align: center;
        font-size: 14px;
    }

    .select2-container--custom .select2-selection--single .select2-selection__placeholder {
        color: #6c757d;
    }

    .select2-container--custom .select2-selection--single:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .select2-container--custom .select2-results__options {
        overflow-y: auto;

        max-height: 200px;

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

    <style>

    /* Style untuk tombol Delete */
    .btn-delete {
        width: 25%;
        /* Lebar default */
    }

    /* Mengatur lebar tombol saat layar berukuran kecil (misalnya pada perangkat mobile) */
    @media only screen and (max-width: 600px) {
        .btn-delete {
            width: 100%;
            /* Mengisi lebar penuh */
        }
    }
</style>
</style>

@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Voucher</h4>
        <!-- <small class="display-block" style="padding-left: 35px;">Stok {{ $username['data']['teknisi']['name'] }}</small> -->
        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Voucher {{ $username['data']['teknisi']['name'] }}</small>
    </div>



    <div class="container-fluid py-4 h-100">

        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    <a href="{{ route('admin.tambah_datavoucher') }}" class="btn btn-large btn-primary" style="width:10%">Add Voucher</a>
                    <table id="tabe-stok" class="table table-bordered table-striped">
                        <thead style="border: 1px solid #ccc; ">

                        </thead>
                        <tbody style="border: 1px solid #ccc; ">
                            @php
                            $num =1;
                            @endphp
                            <!-- Table data will be populated here -->
                            @foreach($Data['msg']['voucher'] as $index => $data)

                            <tr style="border: 1px solid #ccc; ">
                                <td style="border: 1px solid #ccc; ">{{ $num }}</td>
                                <td style="border: 1px solid #ccc; ">{{ $data['kode'] }}</td>
                                @if($data['status']==1)


                                <td  style="width: 15%; border: 1px solid #ccc;">
                                    <span class="btn btn-large btn-success" style="background-color: green; color: white; display: inline-block; width: 50%;">Aktif</span>
                                </td>
                                @else
                                <td style="width: 15%; border: 1px solid #ccc; ">
                                    <span class="btn btn-large btn-danger" style="background-color: red; color: white; display: inline-block; width: 50%;">Expired</span>
                                </td>


                                @endif
                                <td style="width: 15%; border: 1px solid #ccc; ">

                                    <a href="javascript:void(0)" onclick="deleteVoucher(this)" data-id="{{ $data['id'] }}" name="{{ $data['kode'] }}" class="btn btn-large btn-primary btn-delete">Delete</a>

                                    <a href="javascript:void(0)" onclick="updateVoucher(this)" data-id="{{ $data['id'] }}" name="editButton" class="btn btn-large btn-secondary btn-edit">Edit</a>



                                </td>
                            </tr>
                            @php $num++
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="tabe-stok"></div>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- Header modal, termasuk tombol close -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Voucher</h5>

                                    </div>
                                    <!-- Isi modal -->
                                    <div class="modal-body">
                                        
                                        <form id="editForm">

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol untuk menutup modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection

@section('script')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>



<script>
    $(document).ready(function() {
        $('#tabe-stok').DataTable({
            "dom": '<"top"lf>rt<"bottom"ip><"clear">', // Mengatur posisi elemen filter/search
            "language": { // Menyesuaikan teks placeholder
                "searchPlaceholder": "Cari...",
                "search": "Cari:",
            },
            "columns": [{
                    data: 'id',
                    title: 'No'
                },
                {
                    data: 'kode',
                    title: 'Kode'
                },
                {
                    data: 'status',
                    title: 'Status'
                },
                {
                    data: 'link',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        return '<a href="' + data + '</a>';
                    }
                }
                // Tambahkan definisi kolom lainnya sesuai kebutuhan
            ],
            "initComplete": function(settings, json) {
              
                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari Kode...'); // Menyesuaikan placeholder
            }
        });
    });
</script>



<script>
    //delete voucher by ajax
    function deleteVoucher(element) {
        event.preventDefault();
        var voucherId = $(element).data('id');
        var voucherName = $(element).attr('name');
        var confirmation = confirm("Apakah Anda yakin ingin menghapus voucher ini " + voucherName + " ?");
        if (confirmation) {

            var url = "{{ route('admin.data_hapus_voucher') }}";


            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    voucherId: voucherId

                },
                success: function(response) {
                    // Handle response jika sukses
                    console.log(response);

                    //hapus data berdasarkan elemen, element berupa id
                    $(element).closest('tr').remove();
                    // Misalnya, muat ulang halaman atau perbarui bagian yang relevan
                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    return;
                }
            });
        }
    }

    function updateVoucher(element) {
        event.preventDefault();
        var id = $(element).data('id');


        var url = "{{ route('admin.edit_datavoucher') }}";

        $.ajax({
            url: url,
            type: 'GET', // Menggunakan metode POST
            data: {

                id: id
            },
            success: function(response) {
                // Handle response jika sukses

                $('#editForm').html(response);
                // Tampilkan modal
                $('#editModal').modal('show');
                //hapus data berdasarkan elemen, element berupa id

                // Misalnya, muat ulang halaman atau perbarui bagian yang relevan
            },
            error: function(xhr, status, error) {
                // Handle error jika terjadi kesalahan
                console.error(xhr.responseText);
                return;
            }
        });
    }
</script>
<!-- <script>
    $(document).ready(function() {
        $('#checkdatevalue').change(function() {
            // Periksa apakah checkbox dicentang
            if ($(this).is(':checked')) {
                $('#tgl_awal').prop('disabled', false);
                $('#tgl_akhir').prop('disabled', false);
            } else {
                $('#tgl_awal').prop('disabled', true);
                $('#tgl_akhir').prop('disabled', true);
            }
        });

        $('#dateForm').submit(function(event) {
            // Menghentikan pengiriman formulir normal
            event.preventDefault();
            
            // Mengumpulkan data formulir
            var formData = {
                'tgl_awal': $('#tgl_awal').val(),
                'tgl_akhir': $('#tgl_akhir').val()
            };

            // Mengirim data menggunakan AJAX
            $.ajax({
                type: 'GET',
                url: '/process-date-form', // Ganti dengan URL tujuan Anda
                data: formData,
                success: function(response) {
                    // Tanggapan sukses
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Penanganan kesalahan
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
 -->
@endsection