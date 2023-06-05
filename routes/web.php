<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GulaController;
use App\Http\Controllers\JadwalPengirimanController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TrukController;
use App\Models\Jadwalpengiriman;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index']);
Route::resource('admin', AdminController::class);

// Route::resource('gudang', GudangController::class);

Route::get('/gudang', [GudangController::class, 'index'])->name('gudang');
Route::get('/gudang/add', [GudangController::class, 'create'])->name('gudang.create');
Route::post('/gudang/add', [GudangController::class, 'store'])->name('gudang.store');
Route::get('/gudang/edit/{id}', [GudangController::class, 'edit'])->name('gudang.edit');
Route::post('/gudang/update/{id}', [GudangController::class, 'update'])->name('gudang.update');
Route::get('/gudang/delete/{id}', [GudangController::class, 'destroy'])->name('gudang.destroy');

Route::resource('gula', GulaController::class);

// Route::resource('jadwalpengiriman', JadwalpengirimanController::class);
Route::get('/jadwalpengiriman', [JadwalpengirimanController::class, 'index'])->name('jadwalpengiriman');
Route::get('/jadwalpengiriman/add', [JadwalpengirimanController::class, 'create'])->name('jadwalpengiriman.create');
Route::post('/jadwalpengiriman/add', [JadwalpengirimanController::class, 'store'])->name('jadwalpengiriman.store');
Route::get('/jadwalpengiriman/edit/{id}', [JadwalpengirimanController::class, 'edit'])->name('jadwalpengiriman.edit');
Route::post('/jadwalpengiriman/update/{id}', [JadwalpengirimanController::class, 'update'])->name('jadwalpengiriman.update');
Route::get('/jadwalpengiriman/delete/{id}', [JadwalPengirimanController::class, 'destroy'])->name('jadwalpengiriman.destroy');

Route::resource('outlet', OutletController::class);
Route::resource('pegawai', PegawaiController::class);

// Route::resource('pengiriman', PengirimanController::class);
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman');
Route::get('/pengiriman/add', [PengirimanController::class, 'create'])->name('pengiriman.create');
Route::post('/pengiriman/add', [PengirimanController::class, 'store'])->name('pengiriman.store');
Route::get('/pengiriman/edit/{id}', [PengirimanController::class, 'edit'])->name('pengiriman.edit');
Route::post('/pengiriman/update/{id}', [PengirimanController::class, 'update'])->name('pengiriman.update');
Route::get('/pengiriman/delete/{id}', [PengirimanController::class, 'destroy'])->name('pengiriman.destroy');

Route::resource('rute', RuteController::class);

//Route::resource('supir', SupirController::class);

Route::get('/supir', [SupirController::class, 'index'])->name('supir');
Route::get('/supir/add', [SupirController::class, 'create'])->name('supir.create');
Route::post('/supir/add', [SupirController::class, 'store'])->name('supir.store');
Route::get('/supir/edit/{id}', [SupirController::class, 'edit'])->name('supir.edit');
Route::post('/supir/update/{id}', [SupirController::class, 'update'])->name('supir.update');
Route::get('/supir/delete/{id}', [SupirController::class, 'destroy'])->name('supir.destroy');

Route::resource('truk', TrukController::class);

Route::get('print-admin', [AdminController::class, 'print']);
Route::get('print-gudang', [GudangController::class, 'print']);
Route::get('print-outlet', [OutletController::class, 'print']);
Route::get('print-supir', [SupirController::class, 'print']);
Route::get('print-truk', [TrukController::class, 'print']);
Route::get('print-jadwalpengiriman', [JadwalPengirimanController::class, 'print']);
Route::get('print-pengiriman', [PengirimanController::class, 'print']);
Route::get('print-gula', [GulaController::class, 'print']);
Route::get('print-rute', [RuteController::class, 'print']);
Route::get('print-pegawai', [PegawaiController::class, 'print']);
