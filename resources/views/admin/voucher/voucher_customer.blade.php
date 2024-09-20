@extends('admin.templates_baru')


@section('title')
Voucher | PT. Maxipro Group Indonesia
@endsection

@section('style')

<style>
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

    /* Style untuk tombol Delete */
    .btn-delete {
        width: 65%;
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

@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="container-fluid">
        <h4 id="judulStok" style="margin-top: 40px;margin-bottom: 40px;"><i class="fas fa-database"></i> &nbsp Voucher</h4>

        <small class="display-block" style="position: absolute; top: 70px; left: 50px;">Voucher {{ $username['data']['teknisi']['name'] }}</small>
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">

                    <table id="tabe-stok" class="table table-bordered table-striped">
                        <thead>

                        </thead>
                        <tbody>
                            @php
                            $num =1;
                            @endphp
                            <!-- Table data will be populated here -->
                            @foreach($Data['msg']['voucher'] as $index => $data)

                            <tr>
                                <td>{{ $num }}</td>
                                <td>{{ $data['kode'] }}</td>
                                <td>{{ $data['name'] }}</td>
                                <td>{{ $data['start_date'] }}</td>
                                <td>{{ $data['finish_date'] }}</td>
                                @if($data['status']=="active")
                                <td>Aktif</td>
                                @else
                                <td>Tidak Aktif</td>
                                @endif
                                <td>

                                    <select class="select select2 statuspakai-search form-control" id="status_pakai" style="border: 1px solid #ced4da; width: 100%;">

                                        @if($data['status_pakai']=="1")
                                        <option value="1-{{ $data['id']  }}" style="text-align: center;">Sudah Dipakai</option>
                                        <option value="0-{{ $data['id'] }}" style="text-align: center;">Belum dipakai</option>
                                        @else
                                        <option value="0-{{ $data['id'] }}" style="text-align: center;">Belum dipakai</option>
                                        <option value="1-{{ $data['id']  }}" style="text-align: center;">Sudah Dipakai</option>
                                        @endif
                                    </select>

                                </td>
                                <td>

                                    <a href="javascript:void(0)" onclick="deleteVoucher(this)" data-id="{{ $data['id'] }}" name="{{ $data['name'] }}" class="btn btn-large btn-primary btn-delete">Delete</a>

                                </td>
                            </tr>
                            @php $num++
                            @endphp
                            @endforeach

                        </tbody>

                    </table>
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <div id="tabe-stok"></div>
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
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabe-stok').DataTable({



            columns: [{
                    data: 'num',
                    title: 'No'
                },
                {
                    data: 'kode',
                    title: 'Kode'
                },
                {
                    data: 'name',
                    title: 'Customer'
                },
                {
                    data: 'start_date',
                    title: 'Start Date'
                },
                {
                    data: 'finish_date',
                    title: 'End Date'
                },
                {
                    data: 'status',
                    title: 'Status'
                },
                {
                    data: 'status_pakai',
                    title: 'Status Pakai'
                },
                {
                    data: 'link',
                    title: 'Action',
                    render: function(data, type, full, meta) {
                        return '<a href="' + data + '</a>';
                    }
                }

            ]
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Menangkap perubahan pada elemen select
        $('.select').change(function() {
            // Mendapatkan nilai dari elemen select yang dipilih
            var statusPakai = $(this).val();
            var id = statusPakai.split('-')[1];
            // console.log(statusPakai, id);
            // Kirim data menggunakan AJAX
            $.ajax({
                url: "{{ route('admin.data_edit_voucher_customer') }}",
                type: 'GET',
                data: {
                    id: id,
                    statusPakai: statusPakai,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "{{ route('admin.voucher_customer') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>


<script>
    function deleteVoucher(element) {
        event.preventDefault();
        var voucherId = $(element).data('id');
        var voucherName = $(element).attr('name');
        var confirmation = confirm("Apakah Anda yakin ingin menghapus voucher ini " + voucherName + " ?");
        if (confirmation) {

            var url = "{{ route('admin.data_hapus_voucher_customer') }}";


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
</script>



@endsection