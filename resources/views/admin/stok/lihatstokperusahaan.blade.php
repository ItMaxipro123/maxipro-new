<form class="form-horizontal" id="form-input" method="post">
    @csrf

    <div class="form-group" style="display: flex; align-items: center;">
        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Kategori</label>

        <div style="position: relative; width: 100%;">
            <select class="select select2 select-search form-control" name="category" style="border: 1px solid #ced4da; width: 100%;">
                <option value="" style="text-align: center;">Pilih Kategori</option>
                <option value="all" style="text-align: center;">Semua</option>

                @foreach($data['data'] as $item)
                <option value="{{ $item['id'] }}" style="text-align: center;">{{ $item['name'] }}</option>
                @endforeach

            </select>
            <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
        </div>
    </div>
    <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Cari Produk</label>
        <div style="position: relative; width: 100%;">
            <select class="select select2 product-search form-control" name="id[]" style="border: 1px solid #ced4da; width: 100%;">

                <option value="3" style="text-align: center;">Pilih Produk</option>
            </select>
            <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
        </div>
    </div>
    <div class="form-group" style="display: flex; align-items: center;padding-top:30px;">
        <label class="col-lg-3 control-label" style="font-size: 15px;" for="">Gudang</label>
        <div style="position: relative; width: 100%;">
            <select class="select select2 gudang-search form-control" name="gudang[]" style="border: 1px solid #ced4da; width: 100%;">
                <option value="" style="text-align: center;">Pilih Gudang</option>
                @foreach($dataGudang['data'] as $item)
                <option value="{{ $item['id'] }}-{{$item['kode_bee']}}" style="text-align: center;">{{ $item['name'] }}</option>
                @endforeach
            </select>
            <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
        </div>
    </div>
    <div class="form-group" style="display: flex;padding-top:30px; text-align:end;">
        <button type="submit" id="searchButton" class="btn btn-primary" style="margin-left: auto;">Search</button>
    </div>
</form>
<h2 id="judul-pt"></h2>
<table id="tabe-stok-pt" style="border: 1px solid black;">

</table>
<h2 id="judul"></h2>
<table id="tabe-stok" style="border: 1px solid black;">

</table>