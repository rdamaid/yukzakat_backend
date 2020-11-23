<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;
Use Alert;

class SiteController extends Controller
{
    // Landing User
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
    
    // Dashboard User View
    public function transaksi()
    {
        return view('sites.dashboard.transaksi');
    }

    public function profil()
    {
        $users = Auth::user();
        // dd($users);
        return view('sites.dashboard.index', compact('users'));
    }

    public function editprofil(Request $request)
    {
        $users = Auth::user();
        return view('sites.dashboard.editprofil', compact('users'));
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

        return redirect('/profil')->with('success', 'Profil berhasil diupdate!');
    }



}
