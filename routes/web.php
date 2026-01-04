<?php

use App\Http\Middleware\MustAdmin;
use App\Http\Middleware\MustKepsek;
use App\Http\Middleware\MustOperator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubkriteriaController;



Route::get('/', [HomeController::class, 'home']);

//LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
});

// ADMIN
Route::middleware(['auth'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //USER
    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware(MustAdmin::class);
    Route::post('/user-add', [UserController::class, 'store'])->name('user.store')->middleware(MustAdmin::class);
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->middleware(MustAdmin::class);
    Route::post('/user-edit/{id}', [UserController::class, 'update'])->middleware(MustAdmin::class);
    Route::get('/user-destroy/{id}', [UserController::class, 'destroy'])->middleware(MustAdmin::class);
    Route::get('/user-show/{id}', [UserController::class, 'show'])->name('user.show')->middleware(MustAdmin::class);
    //Penginapan
    Route::get('/penginapan', [PenginapanController::class, 'index'])->name('penginapan.index');
    Route::post('/penginapan-add', [PenginapanController::class, 'store'])->name('penginapan.store');
    Route::get('/penginapan-edit/{id}', [PenginapanController::class, 'edit']);
    Route::post('/penginapan-edit/{id}', [PenginapanController::class, 'update']);
    Route::get('/penginapan-destroy/{id}', [PenginapanController::class, 'destroy']);
    Route::get('/penginapan-show/{id}', [PenginapanController::class, 'show'])->name('penginapan.show');
    Route::get('/penginapan-cetak', [PenginapanController::class, 'cetakpenginapan'])->name('penginapan.cetak');
    //KRITERIA DAN SUB
    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::post('/kriteria-add', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit']);
    Route::post('/kriteria-edit/{id}', [KriteriaController::class, 'update']);
    Route::get('/kriteria-destroy/{id}', [KriteriaController::class, 'destroy']);
    Route::get('/kriteria-show/{id}', [KriteriaController::class, 'show'])->name('kriteria.show');
    Route::get('/kriteria/{kriteria}/sub', [SubkriteriaController::class, 'showSubPage'])->name('kriteria.sub');
    Route::post('/subkriteria-add', [SubkriteriaController::class, 'store'])->name('subkriteria.store');
    Route::get('/subkriteria-destroy/{id}', [SubkriteriaController::class, 'destroy']);
    //Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::post('/penilaian-add', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian-destroy/{fasilitas_id}', [PenilaianController::class, 'destroy']);
    //Perhitungan
    Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::get('/perhitungan-cetak', [PerhitunganController::class, 'cetakperhitungan'])->name('perhitungan.cetak');
    //Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan-cetak', [LaporanController::class, 'cetaklaporan'])->name('laporan.cetak');
    //BANTUAN
    Route::get('/bantuan', [PerhitunganController::class, 'index'])->name('bantuan.index');
    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout']);
});
