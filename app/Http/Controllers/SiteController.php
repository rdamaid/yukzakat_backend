<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;
use Auth;
Use Alert;

class SiteController extends Controller
{
    // Landing User
    public function home()
    {
        $title= 'Beranda | YukZakat';
        return view('sites.landingpage.home', compact('title'));
    }

    public function bayarzakat()
    {
        $users = Auth::user();
        // $title= 'Pembayaran Zakat | YukZakat';
        // return view('sites.landingpage.bayar-zakat', compact('title'));
        return view('sites.landingpage.bayar-zakat', [
          'title' => 'Pembayaran Zakat | YukZakat',
          'users' => $users
        ]);
    }

    public function kalkulasizakat()
    {
        $title= 'Kalkulasi Zakat | YukZakat';
        return view('sites.landingpage.kalkulasi-zakat', compact('title'));
    }

    public function rekening()
    {
        $title= 'Rekening | YukZakat';
        return view('sites.landingpage.rekening', compact('title'));
    }

    // Dashboard User View
    public function transaksi()
    {
        $title= 'Transaksi | YukZakat';
        return view('sites.dashboard.transaksi', compact('title'));
    }

    public function profil()
    {
        $users = Auth::user();
        // dd($users);
        return view('sites.dashboard.index', [
            'title' => 'Profil | YukZakat',
            'users' => $users
        ]);
    }

    public function editprofil(Request $request)
    {
        $users = Auth::user();
        return view('sites.dashboard.editprofil',  [
            'title' => 'Edit Profil | YukZakat',
            'users' => $users
        ]);
    }

    public function aboutPage()
    {
        $title= 'Tentang Kami | YukZakat';
        return view('sites.landingpage.aboutPage', compact('title'));
    }
    
}
