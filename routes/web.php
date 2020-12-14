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
    
    // Transaksi PAGE
    Route::get('/admin/transaksi', 'AdminController@transaksi')->name('admintransaksi');
    Route::get('/admin/transaksi/{id}/edit', 'AdminController@edit_transaksi')->name('edit-transaksi');
    Route::get('/admin/transaksi/{id}/delete', 'AdminController@destroy_transaksi')->name('destroy-transaksi');
    
    // USER PAGE
    Route::get('/admin/user', 'AdminController@user')->name('adminuser');
    Route::get('/admin/user/add', 'AdminController@addUserPage')->name('addUserPage');
    Route::post('/admin/user/add', 'AdminController@addUser')->name('addUser');
    Route::get('/admin/user/{id}/edit', 'AdminController@editUserPage')->name('edit-user');
    Route::get('/admin/user/{id}/delete', 'AdminController@destroy_user')->name('destroy-user');
    Route::post('/admin/user/{id}/update', 'AdminController@edit_user')->name('edit-user');
});

    // Landing
    Route::get('/', 'SiteController@home')->name('home');
    Route::get('/bayar-zakat', 'SiteController@bayarzakat')->name('bayar-zakat');
    Route::get('/kalkulasi-zakat', 'SiteController@kalkulasizakat')->name('kalkulasi-zakat');
    Route::get('/rekening', 'SiteController@rekening')->name('rekening');
    Route::get('/tentang-kami', 'SiteController@aboutPage')->name('aboutPage');

    // Dashboard User
    Route::get('/profil', 'SiteController@profil')->name('profil');
    Route::get('/profil/{id}/edit', 'SiteController@editprofil')->name('edit-profil');
    Route::post('/profil/edit/save', 'UserController@saveprofil')->name('save-profil');

    Route::get('/transaksi', 'SiteController@transaksi')->name('transaksi');
    Route::get('/transaksi', 'TransactionController@riwayat')->name('transaksi');

    Route::post('/bayar-zakat', 'TransactionController@bayar')->name('bayar');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('sites.dashboard.index');
// })->name('dashboard');
