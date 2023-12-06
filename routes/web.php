<?php

use App\Http\Controllers\noLoginController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\KomplainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});


Route::get('/about', function () {
    return view('about.aboutUs');
});

Route::get('/home', [noLoginController::class, 'index']);
Route::get('/home/faq', [noLoginController::class, 'faq']);
Route::get('/home/privacy', [noLoginController::class, 'privacy']);

Auth::routes();

Route::resource('sepatu', SepatuController::class);
Route::get('/sepatu_delete/{id}', [SepatuController::class, 'delete']);

Route::resource('profile', ProfileController::class);

// PROTECTED

Route::resource('konfirmasi', KonfirmasiController::class);
Route::get('/status_success/{id}', [KonfirmasiController::class, 'status_success']);

Route::post('/konfirmasi_order/{id}', [KonfirmasiController::class, 'show_post']);
Route::get('/inc_konfirmasi/{id}', [KonfirmasiController::class, 'inc_konfirmasi']);

Route::resource('komplain', KomplainController::class);
Route::get('/komplainMain', [KomplainController::class, 'komplainMain']);

Route::get('/komplain_delete/{id}', [KomplainController::class, 'delete']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
