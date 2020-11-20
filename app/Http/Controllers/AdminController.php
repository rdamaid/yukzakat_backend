<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function transaksi()
    {
        return view('admin.transaksi');
    }

    public function admin()
    {
        return redirect('/admin/dashboard');
    }
}
