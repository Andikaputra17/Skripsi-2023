<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TataUsahaController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['auth', 'level:admin,kepala sekolah'])->group(function() {
        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/pegawai/add', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('/pegawai/add', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/pegawai/edit/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/pegawai/destroy/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
        
        Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/guru/add', [GuruController::class, 'create'])->name('guru.create');
        Route::post('/guru/add', [GuruController::class, 'store'])->name('guru.store');
        Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('/guru/edit/{id}', [GuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/destroy/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    
        Route::get('/tatausaha', [TataUsahaController::class, 'index'])->name('tatausaha.index');
        Route::get('/tatausaha/add', [TataUsahaController::class, 'create'])->name('tatausaha.create');
        Route::post('/tatausaha/add', [TataUsahaController::class, 'store'])->name('tatausaha.store');
        Route::get('/tatausaha/edit/{id}', [TataUsahaController::class, 'edit'])->name('tatausaha.edit');
        Route::put('/tatausaha/edit/{id}', [TataUsahaController::class, 'update'])->name('tatausaha.update');
        Route::delete('/tatausaha/destroy/{id}', [TataUsahaController::class, 'destroy'])->name('tatausaha.destroy');
       
        Route::get('/kepalasekolah', [KepalaSekolahController::class, 'index'])->name('kepalasekolah.index');
        Route::get('/kepalasekolah/add', [KepalaSekolahController::class, 'create'])->name('kepalasekolah.create');
        Route::post('/kepalasekolah/add', [KepalaSekolahController::class, 'store'])->name('kepalasekolah.store');
        Route::get('/kepalasekolah/edit/{id}', [KepalaSekolahController::class, 'edit'])->name('kepalasekolah.edit');
        Route::put('/kepalasekolah/edit/{id}', [KepalaSekolahController::class, 'update'])->name('kepalasekolah.update');
        Route::delete('/kepalasekolah/destroy/{id}', [KepalaSekolahController::class, 'destroy'])->name('kepalasekolah.destroy');
    });
    
    Route::middleware(['auth', 'level:guru,siswa,kepala sekolah'])->group(function() {
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('/siswa/add', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/add', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/edit/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    Route::middleware(['auth', 'level:guru,admin,kepala sekolah'])->group(function() {
        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/add', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/kategori/add', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/edit/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });

    Route::middleware(['auth', 'level:siswa,guru,pegawai,kepala sekolah,tata usaha,admin'])->group(function() {
        Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
        Route::get('/dokumen/search', [DokumenController::class, 'search'])->name('dokumen.search');
        Route::get('/dokumen/add', [DokumenController::class, 'create'])->name('dokumen.create');
        Route::post('/dokumen/add', [DokumenController::class, 'store'])->name('dokumen.store');
        Route::get('/dokumen/download/{value}', [DokumenController::class, 'download'])->name('dokumen.download');
        Route::get('/dokumen/edit/{id}', [DokumenController::class, 'edit'])->name('dokumen.edit');
        Route::put('/dokumen/edit/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
        Route::delete('/dokumen/destroy/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
