<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index', [
            'title' => 'Admin Dashboard | YukZakat',
            
        ]);
    }

    public function transaksi()
    {
        $title= 'Beranda | YukZakat';
        return view('admin.transaksi', [
            'title' => 'Admin Transaksi | YukZakat',
            
        ]);
    }

    public function admin()
    {
        return redirect('/admin/dashboard');
    }
}
