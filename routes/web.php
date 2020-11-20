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

// Middleware ADMIN
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    // Dashboard Admin
    Route::get('/admin', 'AdminController@admin')->name('admin');
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admindashboard');
    Route::get('/admin/transaksi', 'AdminController@transaksi')->name('admintransaksi');
});


    // Landing
    Route::get('/', 'SiteController@home')->name('home');
    Route::get('/bayar-zakat', 'SiteController@bayarzakat')->name('bayar-zakat');
    Route::get('/kalkulasi-zakat', 'SiteController@kalkulasizakat')->name('kalkulasi-zakat');
    Route::get('/rekening', 'SiteController@rekening')->name('rekening');
    
    // Dashboard User
    Route::get('/profil/id', 'SiteController@profil')->name('profil');
    Route::get('/profil/id/edit', 'SiteController@editprofil')->name('edit-profil');
    Route::get('/transaksi', 'SiteController@transaksi')->name('transaksi');



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('sites.dashboard.index');
// })->name('dashboard');
