@extends('admin.templates_baru')


@section('title')
Order Penjualan  | PT. Maxipro Group Indonesia
@endsection
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<link rel="stylesheet" href="{{ asset('css/penjualan/orderpenjualan.css') }}">


@endsection

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg wider">
    <div id="overlay"> <i class="fas fa-spinner fa-spin"></i> </div>
    <div class="row">
        <div class="col-md-6">

            <div class="container-fluid">
                <h4 id="judulOrderPenjualan" style="margin-top: 40px;"><i class="fas fa-database"></i> &nbsp Order Penjualan</h4>
        
                <small class="display-block" style="position: absolute; left: 50px;">Order Penjualan {{ $username['data']['teknisi']['name'] }}</small>
            </div>
        </div>
        <div class="col-md-6">
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                    <div class="container-fluid py-1 px-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">


                                </ol>
                                <h6 class="font-weight-bolder mb-0"></h6>
                            </nav>
                            <div  id="navbar">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                
                                </div>
                                    <ul class="navbar-nav  justify-content-end">
                                
                                
                                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                                <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                </div>
                                            </a>
                                        </li>

                                
                                

                                
                                
                                    </ul>

                            </div>
                    </div>
                </nav>
        </div>
    </div>



    <div class="container-fluid py-4 h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div id="content" class="card p-0 p-md-4 wider" style="height: auto; min-height: 360px;">
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                         <a href="javascript:void(0)" onclick="tambahOrderPenjualan(this)" name="tambahButton" class="btn btn-large btn-primary btn-tambah">Add Order Penjualan</a>

                                <div class="d-flex justify-content-end">

                                  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" style="width: 10%; margin-right: 5px;" id="filterBtn">Filter</button>

                                    </div>
                                    
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" style="width: 10%; margin-right: 5px;" id="clearFilterBtn">Clear Filter</button>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- Modal Filter-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Order Penjualan</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="dateForm">
                                        <div class="form-group">
                                            <label for="enableDatepicker">Centang untuk Aktifkan Tanggal:</label>
                                            <input type="checkbox" id="checkdatevalue" >
                                        </div>
                                        <div class="form-group">
                                            <label for="startDatepicker">Pilih Periode Awal:</label>
                                            <input type="text" value="{{ $Data['msg']['tgl_awal'] }}" class="form-control" id="tgl_awal" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="endDatepicker">Pilih Periode Akhir:</label>
                                            <input type="text" value="{{ $Data['msg']['tgl_akhir'] }}" class="form-control" id="tgl_akhir" disabled>
                                        </div>
                                        
                                       
                                    </form>
                                </div>
                                <div class="modal-footer">

                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    <!-- code diatas untuk modal bootstrap 4 -->

                                    
                                    <!-- code diatas untuk modal bootstrap 5 -->

                                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="tabe-stok" class="table table-bordered table-striped">
                            <thead>
                                
                            </thead>
                            <tbody>
                                @php 
                                $num = 1;

                                @endphp
                                @foreach($Data['msg']['penawaran'] as $index => $data)
                                    @php
                                    \Carbon\Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
                                    $formattedDate = \Carbon\Carbon::parse($data['tgl_transaksi'])->translatedFormat('d M Y');
                                    @endphp
                                    <tr>
                                    <td style="border: 1px solid #d7d7d7; color: black; width: 10px;">{{ $num }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black;width: 10px;">{{ $formattedDate }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black; width: 10px;">{{ $data['no_transaksi'] }}</td>
                                        <td style="border: 1px solid #d7d7d7; color: black; width: 10px; max-width: 80px;white-space: normal;word-break: break-word;">

                                            <strong>
    
                                                <select name="select_invoice_penjualan1" class="select" style="width: 100%;" >
    
    
    
                                                    @foreach ($Data['msg']['nopenjualan'] as $key => $resultpenjualan) 
                                                    

                                                    <option value=""></option>
                                                        
                                                    <option value="{{ $resultpenjualan['no_penjualan'] }}" 
                                                        @if ($resultpenjualan['no_orderpenjualan'] == $data['id']) selected @endif>
                                                        {{ $resultpenjualan['no_penjualan'] }}
                                                    </option>
                                                        
                                                        


                                                    
                                                    @endforeach
                                                </select>

                                            </strong>

 
                                        </td>
                                        @php
                                            $mitra = ''; // Inisialisasi variabel $mitra
                                            foreach ($Data['msg']['mitraBisnis'] as $index_mitra => $result_mitra) {
                                                if ($result_mitra['code'] == $data['code_mitrabisnis']) {
                                                    $mitra = $result_mitra['name'] . ' - ' . $result_mitra['nama_perusahaan'] . ' ' . $result_mitra['alamat_pengiriman'];
                                                }
                                            }
                                        @endphp

                                        <td style="border: 1px solid #d7d7d7; color: black; width: 10px; max-width: 80px; 
    white-space: normal;
    word-break: break-word;">{{ $mitra }}</td>
                                         @php
    $sales_loop = ''; // Inisialisasi variabel $sales_loop
    foreach ($Data['msg']['adminsales'] as $index_sales => $result_sales) {
        if ($result_sales['id_bee'] == $data['id_sales']) {
            $sales_loop = $result_sales['name'];
            break; // Hentikan loop jika sudah ditemukan
        }
    }
@endphp
<td style="border: 1px solid #d7d7d7; color: black; width: 10px; max-width: 80px; 
    white-space: normal;
    word-break: break-word;">
    {{ $sales_loop }}
</td>
@php
                                        $cabang_loop='';
                                        foreach($Data['msg']['cabang'] as $index_cabang => $result_cabang){

                                            if($result_cabang['id']== $data['id_cabang']){
                                               $cabang_loop= $result_cabang['name'];
                                            }
                                        }
                                        @endphp
                                            <td  style="border: 1px solid #d7d7d7; color: black; width: 10px; max-width: 80px; 
    white-space: normal;
    word-break: break-word;"  > {{ $cabang_loop }} </td>
                                        <td style="border: 1px solid #d7d7d7; color: black;">Rp.<br>{{ number_format($data['subtotal']) }}</td>
                                        <td style="text-align:center;width: 10px;">

                                            @if($data['status_bayar'] == 'F')

                                            <label class="label label-success">Lunas</label>

                                            @elseif($data['status_bayar'] == 'N')

                                            <label class="label label-danger">Belum<br>Lunas</label>

                                            @elseif($data['status_bayar'] == 'P')

                                            <label class="label label-primary">Dalam Proses</label>

                                            @endif

                                        </td>
                                        <td style="text-align:center;">

                                            <select name="select_order" class="select" style="width: 100px;">

                                            @foreach($Data['msg']['statusorder'] as $value)

                                            <option value="{{$data['id']}}-{{$value['id']}}" {{ $data['id_statusorder'] == $value['id'] ? 'selected' : ''}}>{{$value['name']}}</option>

                                            @endforeach

                                            </select>

                                        </td>
                                        <td class="text-center">

                                            <select name="select_option" class="select" style="width: 100px;">

                                            @foreach($Data['msg']['option'] as $values)

                                                <option value="{{$data['id']}}-{{$values['id']}}" {{$data['id_opsi'] == $values['id'] ? 'selected' : ''}}>{{$values['name']}}</option>

                                            @endforeach

                                            </select>

                                        </td>
                                        <td>
                                            

                                        </td>
                                    </tr>
                                    @php $num++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div id="tambahPembelianContainer" style="display: none;" class="col-sm-12" style="margin-top: 15px;">
                            
                            <form action=""id="Formtambah"></form>
                    
</div>
               


                </div>
            </div>
        </div>
        
    </div>
</main>

@endsection

@section('script')




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 4 Integration -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Choices.js JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
    document.getElementById('filterBtn').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal Filter
    });
            $(document).ready(function() {
                // Initialize DataTable and store its instance in window.dataTableInstance
                
                   

                var table= $('#tabe-stok').DataTable({

                        "dom": '<"top"lf>rt<"bottom"ip><"clear">', // Mengatur posisi elemen filter/search
                        "language": { // Menyesuaikan teks placeholder
                            "searchPlaceholder": "Cari...",
                            "search": "Cari:",
                            "paginate": {
                                "previous": "back", // Ganti teks untuk tombol "previous"
                                "next": "next" // Ganti teks untuk tombol "next"
                            }
                        },
                        columns: [
                            { data: 'num', title: 'No' },
                            { data: 'tgl_transaksi', title: 'Tgl' },
                            { data: 'no_orderpenjualan',  title: 'No.<br>Order<br>sPenjualan' },
                            { data: 'invoice_penjualan', title: 'Invoice Penjualan' },
                            { data: 'customer', title: 'Cus<br>tomer' },
                            { data: 'sales', title: 'Sales' },
                            { data: 'cabang', title: 'Cabang' },
                            { data: 'total', title: 'Total' },
                            { data: 'status_bayar', title: 'Status<br>Bayar' },
                            { data: 'status_order', title: 'Status<br>Order' },
                            { data: 'tag', title: 'Tag' },
                            {
                                data: null,
                                title: 'Action',
                                render: function(data, type, full, meta) {
                                    let id_pembelian = data.no_orderpenjualan;
                                    return `
                                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; text-align: center;">
                                            <button type="button" 
                                                    data-id="${id_pembelian}" 
                                                    name="${id_pembelian}" 
                                                    class="btn btn-large btn-primary btn-edit" 
                                                    style="width: 100%; padding: 5px;" 
                                                    title="Print Surat Jalan"
                                                    onclick="detailPembelian(this)">
                                                <i class="fas fa-truck" style="font-size: 16px;"></i>
                                            </button>
                                            <button type="button" 
                                                    data-id="${id_pembelian}" 
                                                    name="${id_pembelian}" 
                                                    class="btn btn-large btn-warning btn-edit" 
                                                    style="width: 100%; padding: 5px;" 
                                                    title="Print Invoice"
                                                    onclick="detailPembelian(this)">
                                                <i class="fas fa-print" style="font-size: 16px;"></i>
                                            </button>
                                            <button type="button" 
                                                    data-id="${id_pembelian}" 
                                                    name="${id_pembelian}" 
                                                    class="btn btn-large btn-dark btn-edit" 
                                                    style="width: 100%; padding: 5px;" 
                                                    title="Print Invoice PDF"
                                                    onclick="printInvoicePdf(this)">
                                                <i class="fas fa-book" style="font-size: 16px;"></i>
                                            </button>
                                            <button type="button" 
                                                    data-id="${id_pembelian}" 
                                                    name="${id_pembelian}" 
                                                    class="btn btn-large btn-light btn-edit" 
                                                    style="width: 100%; padding: 5px;" 
                                                    title="Detail Order"
                                                    onclick="detailPembelian(this)">
                                                <i class="fas fa-eye" style="font-size: 16px;"></i>
                                            </button>
                                            <button type="button" 
                                                    data-id="${id_pembelian}" 
                                                    name="${id_pembelian}" 
                                                    class="btn btn-large btn-info btn-edit" 
                                                    style="width: 100%; padding: 5px;" 
                                                    title="Edit"
                                                    onclick="editPembelian(this)">
                                                <i class="fas fa-edit" style="font-size: 16px;"></i>
                                            </button>
                                            <button type="button" 
                                                    onclick="deletePembelian(this)" 
                                                    data-id="${id_pembelian}" 
                                                    
                                                    class="btn btn-large btn-danger" 
                                                    style="width: 100%; padding: 5px;" 
                                                    title="Delete">
                                                <i class="fas fa-trash-alt" style="font-size: 16px;"></i>
                                            </button>
                                        </div>
                                    `;
                                }
                            }


                        ],
                        "initComplete": function(settings, json) {
                            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Cari ...');
                        }
                    });
                    window.dataTableInstance = table;

                // Panggil fungsi untuk inisialisasi DataTable
               

            });

       

 </script>
 <script>
     function tambahOrderPenjualan(element){
            event.preventDefault();
            $.ajax({
                url:'{{ route('admin.tambah_order_penjualan') }}',
                data: {
                    menu:'create_orderpenjualan',
                },  
                beforeSend: function () {
                    // Tampilkan overlay
                    $('#overlay').show();
                },
                success: function(response){
                    $('#overlay').hide();
                    // console.log(response)
                    $('#divBack').show()
                    $('#judulOrderPenjualan').html('<i class="fas fa-database"></i> &nbsp Tambah Order Penjualan');
                    document.title='Tambah Order Penjualan   | PT. Maxipro Group Indonesia'
                    $('.btn-tambah').hide();
                            $('.radio-button-container').hide();
                            $('#clearFilterBtn').hide();
                            $('#filterBtn').hide();
                            
                            // Menghancurkan DataTable jika ada
                            if (window.dataTableInstance) {
                                window.dataTableInstance.destroy();
                            }
                            $('#tabe-stok').hide();
                        $('#tambahPembelianContainer').show()
                        $('#Formtambah').show()
                        $('#Formtambah').html(response)
                        history.pushState({ page: 'tambah_orderpenjualan' }, 'Tambah Order Penjualan', '{{ route('admin.tambah_order_penjualan') }}');
                }
            })
        }

        function printInvoicePdf(element) {
            event.preventDefault();
            var code = $(element).data('id')
            console.log('code',code)
            $.ajax({
                url: '{{ route('admin.invoice_order_penjualan') }}',
                type: 'GET',
                data: {
                    menu: 'invoice_pdf',
                    code: code
                },
                success: function(response) {
                    console.log('res',response)
                    // Redirect to another page after the PDF is streamed
                    window.location.href = '{{ route('admin.invoice_order_penjualan') }}?menu=invoice_pdf&code='+code;
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

 </script>
@endsection