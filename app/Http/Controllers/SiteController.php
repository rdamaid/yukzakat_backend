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

    public function saveprofil(Request $request)
    {
        $this->validate($request, [
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);
        $users = User::find(Auth::user()->id);
        //buat upload gambar
        if ($request->hasFile('user_image')) {
            $request->file('user_image')->move('img/user_img/', $request->file('user_image')->getClientOriginalName());
            $users->user_image = $request->file('user_image')->getClientOriginalName();
        }

        $users->id = Auth::user()->id;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->no_telepon = $request->input('no_telepon');
        $users->alamat = $request->input('alamat');
        $users->save(); //save all

        // // PASSWORD
        // $hashedPassword = Auth::user()->password;
        // if (Hash::check($request->oldpassword, $hashedPassword)) {
        //     $users = User::find(Auth::id());
        //     $users->password = Hash::make($request->password);
        //     $users->save();
        //     Auth::logout();
        //     return redirect()->route('login')->with('success', "Password sudah diganti!");
        // } else {
        //     return redirect()->back()->with('failed', "Password error");
        // }

        return redirect('/profil')->with('success', 'Profil berhasil diupdate!');
    }

    public function bayar(Request $request) {
      // check kalo user udah login apa belum
      if (Auth::check()) {
        $id = Auth::user()->id;
      } else {
        $id = "0";
      }

      $this->validate($request, [

      ]);

      $transaksi = New Transaction;
      $transaksi->user_id = $id;
      $transaksi->nominal = $request->input('nominal');
      $transaksi->jenis = $request->input('jenis');
      $transaksi->save();

      return redirect('/bayar-zakat');
    }
}
