<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', 'SiteController@home')->name('home');
Route::get('/bayar-zakat', 'SiteController@bayarzakat')->name('bayar-zakat');
Route::get('/kalkulasi-zakat', 'SiteController@kalkulasizakat')->name('kalkulasi-zakat');
Route::get('/rekening', 'SiteController@rekening')->name('rekening');
Route::get('/profil', 'SiteController@profil')->name('profil');
Route::get('/transaksi', 'SiteController@transaksi')->name('transaksi');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('sites.dashboard.index');
})->name('dashboard');
