<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    Route::post('/sres',[AuthController::class,'sres'])->name('sres');


    Route::get('/',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
    Route::get('/ulasan',[UlasanController::class,'index'])->name('ulasan')->middleware('auth');

    Route::middleware('can:admin')->group(function(){
        Route::get('/user',[UserController::class,'index'])->name('user')->middleware('auth');
        Route::post('/storeu',[UserController::class,'store'])->name('storeu')->middleware('auth');
        Route::post('/updateu/{id}',[UserController::class,'update'])->name('updateu')->middleware('auth');
        Route::delete('/delete/{id}/',[UserController::class,'destroy'])->name('deleteu')->middleware('auth');
    });

    Route::middleware('can:petugas')->group(function(){
        Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori')->middleware('auth');
        Route::post('/storek',[KategoriController::class,'store'])->name('storek')->middleware('auth');
        Route::post('/updatek/{id}',[KategoriController::class,'update'])->name('updatek')->middleware('auth');
        Route::post('/delete/{id}/',[KategoriController::class,'destroy'])->name('delete')->middleware('auth');

        Route::get('/buku',[BukuController::class, 'index'])->name('buku')->middleware('auth');
        Route::post('/store',[BukuController::class,'store'])->name('storeb')->middleware('auth');
        Route::post('/updateb/{id}',[BukuController::class,'update'])->name('updateb')->middleware('auth');
        Route::post('/deleteb/{id}/',[BukuController::class,'destroy'])->name('deleteb')->middleware('auth');

        Route::get('/transaksi',[PeminjamanController::class,'index'])->name('transaksi')->middleware('auth');
        Route::post('/kembali{id}',[PeminjamanController::class,'kembali'])->name('kembali')->middleware('auth');
        Route::get('/riwayat',[PeminjamanController::class,'riwayat'])->name('riwayat')->middleware('auth');
        Route::post('hapusrp/{id}',[PeminjamanController::class,'hapusrp'])->name('hapusrp')->middleware('auth');
    });

    Route::middleware('can:peminjam')->group(function(){
        Route::post('/pinjam', [PeminjamanController::class,'pinjam'])->name('pinjam')->middleware('auth');
        Route::get('/peminjaman', [PeminjamanController::class,'index'])->name('peminjaman')->middleware('auth');

        Route::get('/koleksi',[KoleksisController::class, 'index'])->name('koleksi')->middleware('auth');
        Route::post('/kolek',[KoleksisController::class, 'store'])->name('kolek')->middleware('auth');
        Route::post('/hapusk/{id}',[KoleksisController::class, 'destroy'])->name('hapusk')->middleware('auth');
    });



