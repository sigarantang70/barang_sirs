<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    PersediaanController,
    PrinterController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [PersediaanController::class, 'RekapPersediaan']);

    Route::get('/kategori_anggaran', [PersediaanController::class, 'KategoriAnggaran']);
    Route::post('/kategori_anggaran_tambah', [PersediaanController::class, 'createKategoriAnggaran']);
    Route::post('/kategori_anggaran_ubah/{id}', [PersediaanController::class, 'updateKategoriAnggaran']);

    Route::get('/kategori_barang', [PersediaanController::class, 'KategoriBarang']);
    Route::post('/kategori_barang_tambah', [PersediaanController::class, 'createKategoriBarang']);
    Route::post('/kategori_barang_ubah/{id}', [PersediaanController::class, 'updateKategoriBarang']);

    Route::get('/daftar_barang', [PersediaanController::class, 'daftarBarang']);
    Route::post('/daftar_barang_tambah', [PersediaanController::class, 'createBarang']);
    Route::post('/daftar_barang_ubah/{id}', [PersediaanController::class, 'updateBarang']);

    Route::get('/barang_masuk', [PersediaanController::class, 'BarangMasuk']);
    Route::post('/barang_masuk_tambah', [PersediaanController::class, 'createBarangMasuk']);
    Route::post('/barang_masuk_ubah/{id}', [PersediaanController::class, 'updateBarangMasuk']);

    Route::get('/barang_keluar', [PersediaanController::class, 'BarangKeluar']);
    Route::post('/barang_keluar_tambah', [PersediaanController::class, 'createBarangKeluar']);

    Route::get('/laporan_barang', [PersediaanController::class, 'LaporanBarang']);
    Route::post('/laporan_proses', [PersediaanController::class, 'LaporanProses']);

    Route::get('/rekap_printer', [PrinterController::class, 'RekapPrinter']);
    Route::get('/daftar_printer', [PrinterController::class, 'index']);
    Route::get('/form_create_printer', [PrinterController::class, 'formCreate']);
    Route::post('/simpan_printer', [PrinterController::class, 'create']);
    Route::get('/form_edit_printer/{id}', [PrinterController::class, 'formEdit']);
    Route::post('/update_printer', [PrinterController::class, 'UpdatePrinter']);

});