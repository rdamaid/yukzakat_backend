<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('sites.landingpage.home');
    }

    public function bayarzakat()
    {
        return view('sites.landingpage.bayar-zakat');
    }

    public function kalkulasizakat()
    {
        return view('sites.landingpage.kalkulasi-zakat');
    }

    public function rekening()
    {
        return view('sites.landingpage.rekening');
    }

    public function profil()
    {
        return view('sites.dashboard.index');
    }

    public function transaksi()
    {
        return view('sites.dashboard.transaksi');
    }
}
