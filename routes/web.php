<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JsController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('template');
// });
Route::prefix('admin')->group(function () {
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('dashboard_filter', [AdminController::class, 'dashboard_filter'])->name('admin.dashboard_filter');
    //Feature Service
    Route::get('serviceall', [AdminController::class, 'serviceall'])->name('admin.serviceall');
    Route::get('service', [AdminController::class, 'service'])->name('admin.service');
    Route::get('servicepengerjaan', [AdminController::class, 'servicepengerjaan'])->name('admin.servicepengerjaan');
    Route::get('serviceselesai', [AdminController::class, 'serviceselesai'])->name('admin.serviceselesai');
    Route::get('servicehistory', [AdminController::class, 'servicehistory'])->name('admin.servicehistory');
    Route::get('datasparepart', [AdminController::class, 'datasparepart'])->name('admin.datasparepart');
    //End Featur Service

    //Feature Stok
    Route::get('lihatstok', [AdminController::class, 'lihatstok'])->name('admin.lihatstok');
    Route::get('lihatstok-produk', [AdminController::class, 'lihatstok_produk'])->name('admin.lihatstok-produk');
    Route::get('lihatstok-produk-perusahaan', [AdminController::class, 'lihatstok_produk_perusahaan'])->name('admin.lihatstok-produk-perusahaan');
    Route::get('lihatstok_stokproduk', [AdminController::class, 'lihatstok_stokproduk'])->name('admin.lihatstok_stokproduk');
    Route::get('lihatstoksubkategori_produk', [AdminController::class, 'lihatstoksubkategori_produk'])->name('admin.lihatstoksubkategori_produk');
    Route::post('cekstok_produk', [AdminController::class, 'cekstok_produk'])->name('admin.cekstok_produk');
    Route::post('cekstoksubkategori', [AdminController::class, 'cekstoksubkategori'])->name('admin.cekstoksubkategori');
    Route::get('lihatstokopname', [AdminController::class, 'lihatstokopname'])->name('admin.lihatstokopname');
    Route::get('lihatstokperusahaan', [AdminController::class, 'lihatstokperusahaan'])->name('admin.lihatstokperusahaan');
    Route::get('lihatstoksubkategori', [AdminController::class, 'lihatstoksubkategori'])->name('admin.lihatstoksubkategori');
    //End Feature Stok

    //Feature Kas
    Route::get('kaspengeluaranpt', [AdminController::class, 'kaspengeluaranpt'])->name('admin.kaspengeluaranpt');
    Route::get('kaspengeluaranpt_filter', [AdminController::class, 'kaspengeluaranpt_filter'])->name('admin.kaspengeluaranpt_filter');
    Route::get('kasbanksurabaya', [AdminController::class, 'kasbanksurabaya'])->name('admin.kasbanksurabaya');
    Route::get('kasbanksurabaya_filter', [AdminController::class, 'kasbanksurabaya_filter'])->name('admin.kasbanksurabaya_filter');
    Route::get('kasbankjakarta', [AdminController::class, 'kasbankjakarta'])->name('admin.kasbankjakarta');
    Route::get('kasbankjakarta_filter', [AdminController::class, 'kasbankjakarta_filter'])->name('admin.kasbankjakarta_filter');
    Route::get('kasbanksurabaya_edit', [AdminController::class, 'kasbanksurabaya_edit'])->name('admin.kasbanksurabaya_edit');


    

    Route::get('kasjakarta', [AdminController::class, 'kasjakarta'])->name('admin.kasjakarta');
    Route::get('kassurabaya', [AdminController::class, 'kassurabaya'])->name('admin.kassurabaya');
    Route::get('kassurabaya_filter', [AdminController::class, 'kassurabaya_filter'])->name('admin.kassurabaya_filter');
    Route::get('kasjakarta_filter', [AdminController::class, 'kasjakarta_filter'])->name('admin.kasjakarta_filter');

    //kas untuk edit
    Route::get('kassurabaya_edit', [AdminController::class, 'kassurabaya_edit'])->name('admin.kassurabaya_edit');

    //view untuk detail kas surabaya
    Route::get('kasdetail', [AdminController::class, 'kasdetail'])->name('admin.kasdetail');

    //kas untuk view tambah mutasi maupun kas
    Route::get('tambah_kas', [AdminController::class, 'tambah_kas'])->name('admin.tambah_kas');
    Route::get('tambah_mutasi', [AdminController::class, 'tambah_mutasi'])->name('admin.tambah_mutasi');

    //untuk menambahkan data kas
    Route::get('tambahpost_kas', [AdminController::class, 'tambahpost_kas'])->name('admin.tambahpost_kas');



    //view untuk edit kas surabaya
    Route::get('kasedit', [AdminController::class, 'kasedit'])->name('admin.kasedit');
    //view untuk edit kas jakarta
    Route::get('kasedit_kasjakarta', [AdminController::class, 'kasedit_kasjakarta'])->name('admin.kasedit_kasjakarta');
    //view untuk edit kas bank surabaya
    Route::get('kasedit_banksurabaya', [AdminController::class, 'kasedit_banksurabaya'])->name('admin.kasedit_banksurabaya');
    //view untuk edit kas bank jakarta
    Route::get('kasedit_bankjakarta', [AdminController::class, 'kasedit_bankjakarta'])->name('admin.kasedit_bankjakarta');
    //view untuk edit kas pengeluaran pt
    Route::get('kasedit_pengeluaranpt', [AdminController::class, 'kasedit_pengeluaranpt'])->name('admin.kasedit_pengeluaranpt');
    //End Feature Kas


    //Feature Voucher
    Route::get('data_voucher', [AdminController::class, 'datavoucher'])->name('admin.voucher');
    Route::get('data_hapus_voucher', [AdminController::class, 'hapus_datavoucher'])->name('admin.data_hapus_voucher');
    Route::get('data_tambah_voucher', [AdminController::class, 'tambah_viewdatavoucher'])->name('admin.tambah_datavoucher');
    Route::get('tambah_data_voucher', [AdminController::class, 'tambah_voucher'])->name('admin.tambah_voucher');
    Route::get('data_edit_voucher', [AdminController::class, 'edit_viewvoucher'])->name('admin.edit_datavoucher');
    Route::get('edit_voucher', [AdminController::class, 'edit_voucher'])->name('admin.edit_voucher');
    //End Feature Voucher

    //Feature Penawaran
    Route::get('data_penawaran', [AdminController::class, 'penawaran'])->name('admin.penawaran');
    Route::get('data_penawaran_filter', [AdminController::class, 'penawaran_filter'])->name('admin.penawaran_filter');
    Route::get('data_edit_filter', [AdminController::class, 'editview_penawaran_filter'])->name('admin.editview_penawaran_filter');
    Route::get('data_detail_filter', [AdminController::class, 'detail_penawaran_filter'])->name('admin.detailview_penawaran_filter');
    Route::get('data_pdf_filter', [AdminController::class, 'printPDF_filter'])->name('admin.printPDF_filter');
    Route::get('edit_penawaran', [AdminController::class, 'penawaran_edit'])->name('admin.edit_penawaran');
    Route::get('tambah_penawaran', [AdminController::class, 'penawaran_tambah_filter'])->name('admin.tambah_penawaran');
    Route::get('hapus_penawaran', [AdminController::class, 'hapus_penawaran_filter'])->name('admin.hapus_penawaran_filter');


    //Feature Pembeliaan Restok
    Route::get('data_restok', [AdminController::class, 'pembeliaan_restok'])->name('admin.pembeliaan_restok');
    Route::get('data_restok_filter', [AdminController::class, 'pembeliaan_restok_filter'])->name('admin.pembeliaan_restok_filter');
    Route::get('data_getrestok', [AdminController::class, 'pembelian_restok_getstok_filter'])->name('admin.pembelian_restok_getstok_filter');

    Route::get('data_tambahstok', [AdminController::class, 'pembelian_restok_tambah_filter'])->name('admin.pembelian_restok_tambah_filter');

    Route::get('data_editviewrestok', [AdminController::class, 'pembelian_editviewrestok_filter'])->name('admin.pembelian_editviewrestok_filter');
    
    Route::get('data_editstok', [AdminController::class, 'pembelian_restok_edit_filter'])->name('admin.pembelian_restok_edit_filter');
    Route::get('hapus_restok', [AdminController::class, 'pembelian_restok_hapus_filter'])->name('admin.pembelian_restok_hapus_filter');


    //Feature Pembelian Order Pembelian
    Route::get('data_orderpembelian', [AdminController::class, 'pembelian_order_pembelian'])->name('admin.pembeliaan_orderpembelian');
    
    Route::get('data_orderpembelian_printpdf', [AdminController::class, 'pembelian_print_pdfpo_order_pembelian'])->name('admin.pembelian_print_pdfpo_order_pembelian');
    
    Route::get('data_vieworderpembelian_printpdf', [AdminController::class, 'processData'])->name('admin.processData');

    Route::get('data_orderpembelian_filter', [AdminController::class, 'pembelian_order_pembelian_filter'])->name('admin.pembeliaan_orderpembelian_filter');

    Route::get('data_editvieworderpembelian', [AdminController::class, 'pembelian_editview_order_pembelian'])->name('admin.pembelian_editview_order_pembelian');
    
    Route::get('data_editorderpembelian', [AdminController::class, 'pembelian_edit_order_pembelian'])->name('admin.pembelian_edit_order_pembelian');
    
    Route::get('data_rejectorderpembelian', [AdminController::class, 'pembelian_reject_order_pembelian'])->name('admin.pembelian_reject_order_pembelian');
    
    Route::get('data_hapusorderpembelian', [AdminController::class, 'pembelian_hapus_order_pembelian'])->name('admin.pembelian_hapus_order_pembelian');

    Route::get('data_editsupplierorderpembelian', [AdminController::class, 'pembelian_select_supplier_order_pembelian'])->name('admin.pembelian_select_supplier_order_pembelian');

    Route::get('data_detailstokproduk', [AdminController::class, 'pembelian_orderpembelian_stokproduct'])->name('admin.pembelian_orderpembelian_stokproduct');
    
    Route::get('data_detailstokproduk_filter', [AdminController::class, 'pembelian_orderpembelian_stokproduct_filter'])->name('admin.pembelian_orderpembelian_stokproduct_filter');
    

    //Feature Pembelian Comercial Invoice
    Route::get('data_comercialinvoice', [AdminController::class, 'pembelian_comercial_invoice'])->name('admin.pembelian_comercial_invoice');
    Route::get('data_editcomercialinvoice', [AdminController::class, 'pembelian_editview_comercial_invoice'])->name('admin.pembelian_editview_comercial_invoice');
    
    Route::get('data_comercialinvoice_filter', [AdminController::class, 'pembelian_comercial_invoice_filter'])->name('admin.pembelian_comercial_invoice_filter');
    Route::get('data_edit_packinglist_comercial_invoice', [AdminController::class, 'pembelian_edit_packinglist_comercial_invoice'])->name('admin.pembelian_edit_packinglist_comercial_invoice');
    
    Route::get('data_editimportcomercialinvoice', [AdminController::class, 'pembelian_importbarang_comercial_invoice'])->name('admin.pembelian_importbarang_comercial_invoice');
    
    Route::get('data_tambahcomercialinvoice', [AdminController::class, 'pembelian_tambah_comercial_invoice'])->name('admin.pembelian_tambah_comercial_invoice');
    
    Route::get('data_updateeditcomercialinvoice', [AdminController::class, 'pembelian_update_comercial_invoice'])->name('admin.pembelian_update_comercial_invoice');
    
    Route::get('data_updatesaveitems_editcomercialinvoice', [AdminController::class, 'pembelian_update_formatas_comercial_invoice'])->name('admin.pembelian_update_formatas_comercial_invoice');
    
    Route::get('data_addcomercialinvoice', [AdminController::class, 'pembelian_add_comercial_invoice'])->name('admin.pembelian_add_comercial_invoice');
    
    Route::get('data_selectcategorycomercialinvoice', [AdminController::class, 'pembelian_selectcategory_comercial_invoice'])->name('admin.pembelian_selectcategory_comercial_invoice');
    
    //Feature Pembelian Local
    Route::get('data_localpembelian', [AdminController::class, 'pembelian_local'])->name('admin.pembelian_local');
    Route::get('data_localpembelian_filter', [AdminController::class, 'pembelian_local_filter'])->name('admin.pembelian_local_filter');
   
    //Feature Pembelian LCL
    Route::get('data_lclpembelian', [AdminController::class, 'pembelian_lcl'])->name('admin.pembelian_lcl');
    Route::get('data_lclpembelian_filter', [AdminController::class, 'pembelian_lcl_filter'])->name('admin.pembelian_lcl_filter');
    Route::get('data_lclpembelian_editview', [AdminController::class, 'pembelian_lcl_editview'])->name('admin.pembelian_lcl_editview');
    
    Route::get('data_lclpembelianimportdata', [AdminController::class, 'pembelian_lclimport'])->name('admin.pembelian_lclimport');
    
    Route::get('data_lclimportbarang',[AdminController::class,'pembelian_lclimportbarang'])->name('admin.pembelian_lclimportbarang');
    
    Route::get('data_tambahlclpembelian', [AdminController::class, 'pembelian_tambah_lcl'])->name('admin.pembelian_tambah_lcl');


    //Feature Pembelian FCL
    Route::get('data_fclpembelian', [AdminController::class, 'pembelian_fcl'])->name('admin.pembelian_fcl');
    Route::get('data_fclpembelian_detail_printpdf', [AdminController::class, 'pembelian_fcl_detail_printpdf'])->name('admin.pembelian_fcl_detail_printpdf');
    Route::get('data_fclpembelian_filter', [AdminController::class, 'pembelian_fcl_filter'])->name('admin.pembelian_fcl_filter');

    //Feature Penerimaan Pembelian
    Route::get('data_pembelian_penerimaan', [AdminController::class, 'penerimaan_pembelian'])->name('admin.penerimaan_pembelian');
    Route::get('data_pembelian_penerimaan_filter', [AdminController::class, 'penerimaan_pembelian_filter'])->name('admin.penerimaan_pembelian_filter');

    //Feature Penerimaan Pindah Gudang
    Route::get('data_penerimaan_pindahgudang', [AdminController::class, 'penerimaan_pindahgudang'])->name('admin.penerimaan_pindahgudang');
    Route::get('data_penerimaan_pindahgudang_filter', [AdminController::class, 'penerimaan_pindahgudang_filter'])->name('admin.penerimaan_pindahgudang_filter');
    
    //Feature Penerimaan Barang Lain
    Route::get('data_penerimaan_barang_lain', [AdminController::class, 'penerimaan_barang_lain'])->name('admin.penerimaan_barang_lain');
    Route::get('data_penerimaan_barang_lain_filter', [AdminController::class, 'penerimaan_barang_lain_filter'])->name('admin.penerimaan_barang_lain_filter');

    //Feature Penerimaan Document
    Route::get('data_penerimaan_document', [AdminController::class, 'penerimaan_document'])->name('admin.penerimaan_document');
    Route::get('data_penerimaan_document_filter', [AdminController::class, 'penerimaan_document_filter'])->name('admin.penerimaan_document_filter');


    // Untuk handling eror menampilkan eror page
    Route::get('/test-403', function () {
        return response()->view('errors.403', ['message' => 'This is a test message.'], 403);
    });



    //Feature Voucher Customer
    Route::get('data_voucher_customer', [AdminController::class, 'voucher_customer'])->name('admin.voucher_customer');
    Route::get('data_edit_voucher_customer', [AdminController::class, 'edit_voucher_customer'])->name('admin.data_edit_voucher_customer');
    Route::get('data_hapus_voucher_customer', [AdminController::class, 'hapus_voucher_customer'])->name('admin.data_hapus_voucher_customer');

    // Route::match(['get', 'post'], 'data_edit_voucher_customer', [AdminController::class, 'edit_voucher_customer'])->name('admin.data_edit_voucher_customer');
    //End Feature Voucher

});

Route::prefix('js')->group(function () {
    Route::get('kasbanksurabaya', [JsController::class, 'kas'])->name('js.kasbanksurabaya');
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('proses-login', [LoginController::class, 'proses_login'])->name('proses_login');
