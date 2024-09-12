@extends('admin.templates_asetjs')
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection

@section('scriptatas')
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

    .select2-results__option:hover {
        background-color: #f0f0f0;
        /* Warna latar belakang yang diinginkan saat kursor digerakkan */
        cursor: pointer;
        /* Ubah ikon kursor saat diarahkan ke opsi */
    }
</style>
@endsection




@section('content')
       @if(request()->routeIs('admin.kasedit'))
            <form action=""  class="form-horizontal" id="form-input" method="get" >
                      
                        <h4 style="margin-bottom: 10px;">Form Edit Kas Surabaya </h4>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <div style="position: relative; width: 100%;">
                                <input type="hidden" class="form-control" name="id" value="{{ $data['msg']['kaskeluar']['id'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <div class="input-group">


                                    <span class="input-group-text" style="padding-right: 710px"><i class="fas fa-calendar"></i></span>
                                    <input type="text" value="{{ $data['msg']['kaskeluar']['tgl_transaksi'] }}" class="form-control" name="tgl_transaksi" id="tgl_transaksi" style="padding-left:25px;border: 1px solid #ced4da;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama Penerima Uang-Vendor-Supplier</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="name" value="{{ $data['msg']['kaskeluar']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Harga</label>
                            <div style="position: relative; width: 100%;">
                                <input type="number" class="form-control" name="harga" value="{{ $data['msg']['kaskeluar']['price'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nota</label>
                            @php
                            $link = $data['msg']['link'];
                            $nota = $data['msg']['kaskeluar']['nota'];
                            $ext = pathinfo($nota, PATHINFO_EXTENSION);
                            @endphp

                            @if(!empty($nota) && in_array($ext, ['png', 'jpg', 'jpeg']))
                            <div style="text-align: center;">
                              <img src="{{ $link }}{{ $nota }}" alt="Nota" style="width: 500px; margin: 0 auto;">
                            </div>
                          @elseif(!empty($data['msg']['kasmutasifoto']['link']))
                          <a href="{{ $data['msg']['kasmutasifoto']['link'] }}">{{ $data['msg']['kasmutasifoto']['link'] }}</a>
                          @else
                          <a href="{{ $data['msg']['kasfotopdf']['link'] }}">{{ $data['msg']['kasfotopdf']['link'] }}</a>
                          @endif
                        </div>



                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PPN</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" id="ppn" name="ppn" style="border: 1px solid #ced4da; width: 100%;">
                                     <option value="1" style="text-align: center;" {{ $data['msg']['kaskeluar']['ppn'] == '1' ? 'selected' : '' }}>Ya</option>
                                        <option value="0" style="text-align: center;" {{ $data['msg']['kaskeluar']['ppn'] == '0' ? 'selected' : '' }}>Tidak</option>
                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PIC</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" id="pic" name="pic" value="{{ $data['msg']['kaskeluar']['pic'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Uang Diambil dari</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" id="money_from" name="money_from" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_surabaya' ? 'selected' : '' }}>Kas Surabaya</option>
                                    <option value="kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_jakarta' ? 'selected' : '' }}>Kas Jakarta</option>
                                    <option value="bank_kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_surabaya' ? 'selected' : '' }}>Bank Kas Surabaya</option>
                                    <option value="bank_kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_jakarta' ? 'selected' : '' }}>Bank Kas Jakarta</option>
                                    <option value="bank_pengeluaran_0109005900" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_pengeluaran_0109005900' ? 'selected' : '' }}>Bank Pengeluaran PT</option>


                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $data['msg']['kaskeluar']['keterangan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Invoice</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" id="invoice" name="invoice" value="{{ $data['msg']['kaskeluar']['invoice'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center;margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">COA</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 coa-search form-control" id="name_coa"name="name_coa" style="border: 1px solid #ced4da; width: 100%;">

                                    @php
                                    $nama_coa = $data['msg']['kaskeluar']['name_coa'];
                                    @endphp
                                    <option value="{{ $data['msg']['kaskeluar']['id_coa'] }}" style="text-align: center;">
                                        {{ $nama_coa }}
                                    </option>
                                    @foreach($data['msg']['allcoa'] as $index => $coa)

                                    @if($coa['name'] != $nama_coa)
                                    <option value="{{ $coa['id'] }}" style="text-align: center;">
                                        {{ $coa['name'] }}
                                    </option>
                                    @endif
                                    @endforeach




                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                         <button type="button" id="selectButton" class="btn btn-primary" style="margin-left: auto;" onclick="submitForm()">Select</button>
                        </div>
            </form>
            
        @elseif(request()->routeIs('admin.kasedit_banksurabaya'))
            <form action="" class="form-horizontal"  method="get">
                        @csrf
                        <h4 style="margin-bottom: 10px;">Form Edit Kas Bank Surabaya </h4>

       
                        <div class="form-group row">
                            <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <div class="input-group">


                                    <span class="input-group-text" style="padding-right: 710px"><i class="fas fa-calendar"></i></span>
                                    <input type="text" value="{{ $data['msg']['kaskeluar']['tgl_transaksi'] }}" class="form-control" id="tgl_transaksi" name="tgl_transaksi" style="padding-left:25px;border: 1px solid #ced4da;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama Penerima Uang-Vendor-Supplier</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="name" value="{{ $data['msg']['kaskeluar']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Harga</label>
                            <div style="position: relative; width: 100%;">
                                <input type="number" class="form-control" name="price" value="{{ $data['msg']['kaskeluar']['price'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nota</label>
                            @php
                            $link = $data['msg']['link'];
                            $nota = $data['msg']['kaskeluar']['nota'];
                            $ext = pathinfo($nota, PATHINFO_EXTENSION);
                            @endphp

                            @if(!empty($nota) && in_array($ext, ['png', 'jpg', 'jpeg']))
                            <div style="text-align: center;">
                              <img src="{{ $link }}{{ $nota }}" alt="Nota" style="width: 500px; margin: 0 auto;">
                            </div>
                          @elseif(!empty($data['msg']['kasmutasifoto']['link']))
                          <a href="{{ $data['msg']['kasmutasifoto']['link'] }}">{{ $data['msg']['kasmutasifoto']['link'] }}</a>
                          @else
                          <a href="{{ $data['msg']['kasfotopdf']['link'] }}">{{ $data['msg']['kasfotopdf']['link'] }}</a>
                          @endif
                        </div>



                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PPN</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="ppn" style="border: 1px solid #ced4da; width: 100%;">
                                    @if($data['msg']['kaskeluar']['ppn'] == 0)
                                    <option value="0" style="text-align: center;" selected>Tidak</option>
                                    <option value="1" style="text-align: center;">Ya</option>
                                    @else
                                    <option value="1" style="text-align: center;" selected>Ya</option>
                                    <option value="0" style="text-align: center;">Tidak</option>
                                    @endif

                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PIC</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="pic" value="{{ $data['msg']['kaskeluar']['pic'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Uang Diambil dari</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="money_form" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_surabaya' ? 'selected' : '' }}>Kas Surabaya</option>
                                    <option value="kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_jakarta' ? 'selected' : '' }}>Kas Jakarta</option>
                                    <option value="bank_kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_surabaya' ? 'selected' : '' }}>Bank Kas Surabaya</option>
                                    <option value="bank_kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_jakarta' ? 'selected' : '' }}>Bank Kas Jakarta</option>
                                    <option value="bank_pengeluaran_0109005900" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_pengeluaran_0109005900' ? 'selected' : '' }}>Bank Pengeluaran PT</option>


                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="keterangan" value="{{ $data['msg']['kaskeluar']['keterangan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Invoice</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="invoice" value="{{ $data['msg']['kaskeluar']['invoice'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center;margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">COA</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 coa-search form-control" name="name_coa" style="border: 1px solid #ced4da; width: 100%;">

                                    @php
                                    $nama_coa = $data['msg']['kaskeluar']['name_coa'];
                                    @endphp
                                    <option value="{{ $data['msg']['kaskeluar']['id_coa'] }}" style="text-align: center;">
                                        {{ $nama_coa }}
                                    </option>
                                    @foreach($data['msg']['allcoa'] as $index => $coa)

                                    @if($coa['name'] != $nama_coa)
                                    <option value="{{ $coa['id'] }}" style="text-align: center;">
                                        {{ $coa['name'] }}
                                    </option>
                                    @endif
                                    @endforeach




                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Select</button>
                        </div>
            </form>
        @elseif(request()->routeIs('admin.kasedit_bankjakarta'))
            <form action="" class="form-horizontal" method="get">
                        @csrf
                        <h4 style="margin-bottom: 10px;">Form Edit Kas Bank Jakarta </h4>

       
                        <div class="form-group row">
                            <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <div class="input-group">


                                    <span class="input-group-text" style="padding-right: 710px"><i class="fas fa-calendar"></i></span>
                                    <input type="text" value="{{ $data['msg']['kaskeluar']['tgl_transaksi'] }}" class="form-control" id="tgl_transaksi" name="tgl_transaksi" style="padding-left:25px;border: 1px solid #ced4da;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama Penerima Uang-Vendor-Supplier</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="name" value="{{ $data['msg']['kaskeluar']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Harga</label>
                            <div style="position: relative; width: 100%;">
                                <input type="number" class="form-control" name="price" value="{{ $data['msg']['kaskeluar']['price'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nota</label>
                            @php
                            $link = $data['msg']['link'];
                            $nota = $data['msg']['kaskeluar']['nota'];
                            $ext = pathinfo($nota, PATHINFO_EXTENSION);
                            @endphp

                            @if(!empty($nota) && in_array($ext, ['png', 'jpg', 'jpeg']))
                            <div style="text-align: center;">
                              <img src="{{ $link }}{{ $nota }}" alt="Nota" style="width: 500px; margin: 0 auto;">
                            </div>
                          @elseif(!empty($data['msg']['kasmutasifoto']['link']))
                          <a href="{{ $data['msg']['kasmutasifoto']['link'] }}">{{ $data['msg']['kasmutasifoto']['link'] }}</a>
                          @else
                          <a href="{{ $data['msg']['kasfotopdf']['link'] }}">{{ $data['msg']['kasfotopdf']['link'] }}</a>
                          @endif
                        </div>



                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PPN</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="ppn" style="border: 1px solid #ced4da; width: 100%;">
                                    @if($data['msg']['kaskeluar']['ppn'] == 0)
                                    <option value="0" style="text-align: center;" selected>Tidak</option>
                                    <option value="1" style="text-align: center;">Ya</option>
                                    @else
                                    <option value="1" style="text-align: center;" selected>Ya</option>
                                    <option value="0" style="text-align: center;">Tidak</option>
                                    @endif

                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PIC</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="pic" value="{{ $data['msg']['kaskeluar']['pic'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Uang Diambil dari</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="money_form" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_surabaya' ? 'selected' : '' }}>Kas Surabaya</option>
                                    <option value="kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_jakarta' ? 'selected' : '' }}>Kas Jakarta</option>
                                    <option value="bank_kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_surabaya' ? 'selected' : '' }}>Bank Kas Surabaya</option>
                                    <option value="bank_kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_jakarta' ? 'selected' : '' }}>Bank Kas Jakarta</option>
                                    <option value="bank_pengeluaran_0109005900" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_pengeluaran_0109005900' ? 'selected' : '' }}>Bank Pengeluaran PT</option>


                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="keterangan" value="{{ $data['msg']['kaskeluar']['keterangan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Invoice</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="invoice" value="{{ $data['msg']['kaskeluar']['invoice'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center;margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">COA</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 coa-search form-control" name="name_coa" style="border: 1px solid #ced4da; width: 100%;">

                                    @php
                                    $nama_coa = $data['msg']['kaskeluar']['name_coa'];
                                    @endphp
                                    <option value="{{ $data['msg']['kaskeluar']['id_coa'] }}" style="text-align: center;">
                                        {{ $nama_coa }}
                                    </option>
                                    @foreach($data['msg']['allcoa'] as $index => $coa)

                                    @if($coa['name'] != $nama_coa)
                                    <option value="{{ $coa['id'] }}" style="text-align: center;">
                                        {{ $coa['name'] }}
                                    </option>
                                    @endif
                                    @endforeach




                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Select</button>
                        </div>
            </form>
         @elseif(request()->routeIs('admin.kasedit_kasjakarta'))
            <form action="" class="form-horizontal" id="form-input-kasjakarta" method="get">
                        @csrf
                        <h4 style="margin-bottom: 10px;">Form Edit Kas Jakarta </h4>

       
                        <div class="form-group row">
                            <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <div class="input-group">


                                    <span class="input-group-text" style="padding-right: 710px"><i class="fas fa-calendar"></i></span>
                                    <input type="text" value="{{ $data['msg']['kaskeluar']['tgl_transaksi'] }}" class="form-control" id="tgl_transaksi" name="tgl_transaksi" style="padding-left:25px;border: 1px solid #ced4da;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama Penerima Uang-Vendor-Supplier</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="name" value="{{ $data['msg']['kaskeluar']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Harga</label>
                            <div style="position: relative; width: 100%;">
                                <input type="number" class="form-control" name="price" value="{{ $data['msg']['kaskeluar']['price'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nota</label>
                            @php
                            $link = $data['msg']['link'];
                            $nota = $data['msg']['kaskeluar']['nota'];
                            $ext = pathinfo($nota, PATHINFO_EXTENSION);
                            @endphp

                            @if(!empty($nota) && in_array($ext, ['png', 'jpg', 'jpeg']))
                            <div style="text-align: center;">
                              <img src="{{ $link }}{{ $nota }}" alt="Nota" style="width: 500px; margin: 0 auto;">
                            </div>
                          @elseif(!empty($data['msg']['kasmutasifoto']['link']))
                          <a href="{{ $data['msg']['kasmutasifoto']['link'] }}">{{ $data['msg']['kasmutasifoto']['link'] }}</a>
                          @else
                          <a href="{{ $data['msg']['kasfotopdf']['link'] }}">{{ $data['msg']['kasfotopdf']['link'] }}</a>
                          @endif
                        </div>



                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PPN</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="ppn" style="border: 1px solid #ced4da; width: 100%;">
                                    @if($data['msg']['kaskeluar']['ppn'] == 0)
                                    <option value="0" style="text-align: center;" selected>Tidak</option>
                                    <option value="1" style="text-align: center;">Ya</option>
                                    @else
                                    <option value="1" style="text-align: center;" selected>Ya</option>
                                    <option value="0" style="text-align: center;">Tidak</option>
                                    @endif

                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PIC</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="pic" value="{{ $data['msg']['kaskeluar']['pic'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Uang Diambil dari</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="money_form" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_surabaya' ? 'selected' : '' }}>Kas Surabaya</option>
                                    <option value="kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_jakarta' ? 'selected' : '' }}>Kas Jakarta</option>
                                    <option value="bank_kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_surabaya' ? 'selected' : '' }}>Bank Kas Surabaya</option>
                                    <option value="bank_kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_jakarta' ? 'selected' : '' }}>Bank Kas Jakarta</option>
                                    <option value="bank_pengeluaran_0109005900" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_pengeluaran_0109005900' ? 'selected' : '' }}>Bank Pengeluaran PT</option>


                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="keterangan" value="{{ $data['msg']['kaskeluar']['keterangan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Invoice</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="invoice" value="{{ $data['msg']['kaskeluar']['invoice'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center;margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">COA</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 coa-search form-control" name="name_coa" style="border: 1px solid #ced4da; width: 100%;">

                                    @php
                                    $nama_coa = $data['msg']['kaskeluar']['name_coa'];
                                    @endphp
                                    <option value="{{ $data['msg']['kaskeluar']['id_coa'] }}" style="text-align: center;">
                                        {{ $nama_coa }}
                                    </option>
                                    @foreach($data['msg']['allcoa'] as $index => $coa)

                                    @if($coa['name'] != $nama_coa)
                                    <option value="{{ $coa['id'] }}" style="text-align: center;">
                                        {{ $coa['name'] }}
                                    </option>
                                    @endif
                                    @endforeach




                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Select</button>
                        </div>
            </form>
        @elseif(request()->routeIs('admin.kasedit_pengeluaranpt'))
            <form action="" class="form-horizontal"  method="get">
                        @csrf
                        <h4 style="margin-bottom: 10px;">Form Edit Kas Pengeluaran PT </h4>

       
                        <div class="form-group row">
                            <label for="startDatepicker" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <div class="input-group">


                                    <span class="input-group-text" style="padding-right: 710px"><i class="fas fa-calendar"></i></span>
                                    <input type="text" value="{{ $data['msg']['kaskeluar']['tgl_transaksi'] }}" class="form-control" id="tgl_transaksi" name="tgl_transaksi" style="padding-left:25px;border: 1px solid #ced4da;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nama Penerima Uang-Vendor-Supplier</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="name" value="{{ $data['msg']['kaskeluar']['name'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Harga</label>
                            <div style="position: relative; width: 100%;">
                                <input type="number" class="form-control" name="price" value="{{ $data['msg']['kaskeluar']['price'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Nota</label>
                            @php
                            $link = $data['msg']['link'];
                            $nota = $data['msg']['kaskeluar']['nota'];
                            $ext = pathinfo($nota, PATHINFO_EXTENSION);
                            @endphp

                            @if(!empty($nota) && in_array($ext, ['png', 'jpg', 'jpeg']))
                            <div style="text-align: center;">
                              <img src="{{ $link }}{{ $nota }}" alt="Nota" style="width: 500px; margin: 0 auto;">
                            </div>
                          @elseif(!empty($data['msg']['kasmutasifoto']['link']))
                          <a href="{{ $data['msg']['kasmutasifoto']['link'] }}">{{ $data['msg']['kasmutasifoto']['link'] }}</a>
                          @else
                          <a href="{{ $data['msg']['kasfotopdf']['link'] }}">{{ $data['msg']['kasfotopdf']['link'] }}</a>
                          @endif
                        </div>



                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PPN</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="ppn" style="border: 1px solid #ced4da; width: 100%;">
                                    @if($data['msg']['kaskeluar']['ppn'] == 0)
                                    <option value="0" style="text-align: center;" selected>Tidak</option>
                                    <option value="1" style="text-align: center;">Ya</option>
                                    @else
                                    <option value="1" style="text-align: center;" selected>Ya</option>
                                    <option value="0" style="text-align: center;">Tidak</option>
                                    @endif

                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">PIC</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="pic" value="{{ $data['msg']['kaskeluar']['pic'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Uang Diambil dari</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 select-search form-control" name="money_form" style="border: 1px solid #ced4da; width: 100%;">
                                    <option value="kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_surabaya' ? 'selected' : '' }}>Kas Surabaya</option>
                                    <option value="kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'kas_jakarta' ? 'selected' : '' }}>Kas Jakarta</option>
                                    <option value="bank_kas_surabaya" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_surabaya' ? 'selected' : '' }}>Bank Kas Surabaya</option>
                                    <option value="bank_kas_jakarta" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_kas_jakarta' ? 'selected' : '' }}>Bank Kas Jakarta</option>
                                    <option value="bank_pengeluaran_0109005900" style="text-align: center;" {{ $data['msg']['kaskeluar']['money_from'] == 'bank_pengeluaran_0109005900' ? 'selected' : '' }}>Bank Pengeluaran PT</option>


                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>


                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Keterangan</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="keterangan" value="{{ $data['msg']['kaskeluar']['keterangan'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Invoice</label>
                            <div style="position: relative; width: 100%;">
                                <input type="text" class="form-control" name="invoice" value="{{ $data['msg']['kaskeluar']['invoice'] }}" style="border: 1px solid #ced4da; width: 100%; padding-left:20px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; align-items: center;margin-top:50px; margin-bottom: 20px;">
                            <label class="col-lg-3 control-label" style="font-size: 15px;" for="">COA</label>
                            <div style="position: relative; width: 100%;">
                                <select class="select select2 coa-search form-control" name="name_coa" style="border: 1px solid #ced4da; width: 100%;">

                                    @php
                                    $nama_coa = $data['msg']['kaskeluar']['name_coa'];
                                    @endphp
                                    <option value="{{ $data['msg']['kaskeluar']['id_coa'] }}" style="text-align: center;">
                                        {{ $nama_coa }}
                                    </option>
                                    @foreach($data['msg']['allcoa'] as $index => $coa)

                                    @if($coa['name'] != $nama_coa)
                                    <option value="{{ $coa['id'] }}" style="text-align: center;">
                                        {{ $coa['name'] }}
                                    </option>
                                    @endif
                                    @endforeach




                                </select>
                                <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%)"></i>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
                            <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Select</button>
                        </div>
            </form>

        @endif

@endsection

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
    flatpickr('#tgl_transaksi', {
    enableTime: true,
    dateFormat: "Y-m-d", // Format tanggal
    clickOpens: true,
    onChange: function(selectedDates, dateStr, instance) {
        document.getElementById('tgl_transaksi').value = dateStr;
    }
});
    
</script>
<script>

 function submitForm() {
    document.getElementById('tgl_transaksi').addEventListener('focus', function() {
    flatpickr('#tgl_transaksi', {
        enableTime: true,
        dateFormat: "Y-m-d", // Format tanggal
        clickOpens: true,
        onChange: function(selectedDates, dateStr, instance) {
            document.getElementById('tgl_transaksi').value = dateStr;
        }
    });
});



    var formData = {};

    // Loop melalui setiap elemen input dalam form
    $('#form-input input').each(function() {
        // Ambil nilai atribut 'name' dari setiap elemen input dan gunakan sebagai key
      var tanggalTransaksi = $('#tgl_transaksi').val();
           formData['tgl_transaksi'] = tanggalTransaksi;
      var ppn = $('#ppn').val();
      var money_from = $('#money_from').val();
      var harga = $('#harga').val();
      var pic = $('#pic').val();
      var keterangan = $('#keterangan').val();
      var invoice = $('#invoice').val();
      var name_coa = $('#name_coa').val();
        
   
        formData['ppn'] = ppn;
        formData['money_from'] = money_from;
      
        formData['pic'] = pic;
        formData['keterangan'] = keterangan;
        formData['invoice'] = invoice;
        formData['name_coa'] = name_coa;
        var fieldName = $(this).attr('name');
        // Ambil nilai dari elemen input dan gunakan sebagai value
        var fieldValue = $(this).val();
        // Tambahkan key dan value ke objek formData
        formData[fieldName] = fieldValue;
    });

    // Kirim data form menggunakan AJAX
    $.ajax({
        type: 'GET', // Sesuaikan dengan metode HTTP yang digunakan
        url: "{{ route('admin.kassurabaya_edit') }}", // Ganti dengan URL endpoint yang benar
        data: formData,
        success: function(response){
            // Tampilkan pesan atau lakukan aksi lain sesuai respons dari server
            
             Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Kas Berhasil Diedit',
            }).then((result) => {
                // Arahkan pengguna ke route lain setelah menutup SweetAlert2
                   location.reload();
            });
        },
        error: function(xhr, status, error){
            // Tangani kesalahan
            console.error(error);
        }
    });
}
    

  
</script>

@endsection