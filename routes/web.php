<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlatMesinController;
use App\Http\Controllers\AsetLainController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GedungBangunanController;
use App\Http\Controllers\JalanIrigasiController;
use App\Http\Controllers\PengaturanController;
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


// Login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Mencegah Masuk Ilegal
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/operator', [HomeController::class, 'operator'])->middleware('userAkses:Operator');
    Route::get('/logout', [AuthController::class, 'logout']);
});

// CRUD Tanah
Route::get('/klasifikasi', [TanahController::class, 'index_klasifikasi']);
Route::get('klasifikasi/list', [TanahController::class, 'klasifikasi'])->name('klasifikasi.list');

Route::get('/kib-tanah', [TanahController::class, 'tampil_kibtanah']);
Route::post('/tanah/import', [TanahController::class, 'importExcel']);
Route::get('/tanah-html', [TanahController::class, 'returnHTML']);

Route::get('/surma/data', [TanahController::class, 'data']);
Route::post('/surma/tambah', [TanahController::class, 'tambah_surma']);
Route::get('/surma/buka/{kode_surat}', [TanahController::class, 'buka_surma',]);
Route::get('/surma/buka1/{kode_surat}', [TanahController::class, 'buka_surma1',]);
Route::get('/surma/buka2/{kode_surat}', [TanahController::class, 'buka_surma2',]);
Route::get('/surma/buka3/{kode_surat}', [TanahController::class, 'buka_surma3',]);
Route::post('/surma/{kode_surat}/update', [TanahController::class, 'update']);
Route::get('/surma/{kode_surat}/hapus', [TanahController::class, 'delete']);


// CRUD Alat Mesin
Route::get('/kib-alat', [AlatMesinController::class, 'index']);
Route::get('alat/list', [AlatMesinController::class, 'getAlat'])->name('alat.list');

Route::post('/alat/import', [AlatMesinController::class, 'importExcel']);


Route::get('/surke', [AlatMesinController::class, 'index']);
Route::get('/surke/data', [AlatMesinController::class, 'data']);
Route::post('/surke/tambah', [AlatMesinController::class, 'tambah_surke']);
Route::get('/surke/buka/{kode_surat}', [AlatMesinController::class, 'buka_surke',]);
Route::post('/surke/update/{kode_surat}', [AlatMesinController::class, 'update']);
Route::get('/surke/{kode_surat}/hapus', [AlatMesinController::class, 'delete']);

Route::get('/surke-direktur', [AlatMesinController::class, 'index_direktur']);
Route::get('/surke-direktur/data', [AlatMesinController::class, 'data_direktur']);
Route::get('/surke-direktur/validasi/{kode_surat}', [AlatMesinController::class, 'validasi_direktur',]);


// CRUD Gedung Bangunan
Route::get('/surkes', [GedungBangunanController::class, 'index']);
Route::get('/surke/data', [GedungBangunanController::class, 'data']);
Route::post('/surke/tambah', [GedungBangunanController::class, 'tambah_surke']);
Route::get('/surke/buka/{kode_surat}', [GedungBangunanController::class, 'buka_surke',]);
Route::post('/surke/update/{kode_surat}', [GedungBangunanController::class, 'update']);
Route::get('/surke/{kode_surat}/hapus', [GedungBangunanController::class, 'delete']);

Route::get('/surke-direktur', [GedungBangunanController::class, 'index_direktur']);
Route::get('/surke-direktur/data', [GedungBangunanController::class, 'data_direktur']);
Route::get('/surke-direktur/validasi/{kode_surat}', [GedungBangunanController::class, 'validasi_direktur',]);


// CRUD Jalan Irigasi Jaringan
Route::get('/surkel', [JalanIrigasiController::class, 'index']);
Route::get('/surke/data', [JalanIrigasiController::class, 'data']);
Route::post('/surke/tambah', [JalanIrigasiController::class, 'tambah_surke']);
Route::get('/surke/buka/{kode_surat}', [JalanIrigasiController::class, 'buka_surke',]);
Route::post('/surke/update/{kode_surat}', [JalanIrigasiController::class, 'update']);
Route::get('/surke/{kode_surat}/hapus', [JalanIrigasiController::class, 'delete']);

Route::get('/surke-direktur', [JalanIrigasiController::class, 'index_direktur']);
Route::get('/surke-direktur/data', [JalanIrigasiController::class, 'data_direktur']);
Route::get('/surke-direktur/validasi/{kode_surat}', [JalanIrigasiController::class, 'validasi_direktur',]);


// CRUD Aset Lain
Route::get('/surkeq', [AsetLainController::class, 'index']);
Route::get('/surke/data', [AsetLainController::class, 'data']);
Route::post('/surke/tambah', [AsetLainController::class, 'tambah_surke']);
Route::get('/surke/buka/{kode_surat}', [AsetLainController::class, 'buka_surke',]);
Route::post('/surke/update/{kode_surat}', [AsetLainController::class, 'update']);
Route::get('/surke/{kode_surat}/hapus', [AsetLainController::class, 'delete']);

Route::get('/surke-direktur', [AsetLainController::class, 'index_direktur']);
Route::get('/surke-direktur/data', [AsetLainController::class, 'data_direktur']);
Route::get('/surke-direktur/validasi/{kode_surat}', [AsetLainController::class, 'validasi_direktur',]);


// CRUD Pengaturan
Route::get('/kode-aset', [PengaturanController::class, 'index']);
Route::get('/kode-ruang', [PengaturanController::class, 'tampil_ruang']);
Route::post('/ruang/import', [PengaturanController::class, 'importExcel']);

Route::get('/profil/{kode_user}', [PengaturanController::class, 'profil']);
Route::post('/profil/update/{kode_user}', [PengaturanController::class, 'update_profil']);
Route::get('/password/{kode_user}', [PengaturanController::class, 'password']);
Route::post('/password/update/{kode_user}', [PengaturanController::class, 'update_password']);
Route::post('/user/tambah', [PengaturanController::class, 'store']);
Route::post('/user/update/{kode_user}', [PengaturanController::class, 'update']);
Route::get('/user/{kode_user}/hapus', [PengaturanController::class, 'delete']);


// CRUD User
Route::get('/user', [UserController::class, 'index']);
Route::get('/profil/{kode_user}', [UserController::class, 'profil']);
Route::post('/profil/update/{kode_user}', [UserController::class, 'update_profil']);
Route::get('/password/{kode_user}', [UserController::class, 'password']);
Route::post('/password/update/{kode_user}', [UserController::class, 'update_password']);
Route::post('/user/tambah', [UserController::class, 'store']);
Route::post('/user/update/{kode_user}', [UserController::class, 'update']);
Route::get('/user/{kode_user}/hapus', [UserController::class, 'delete']);
