<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Dashboard Admin
     */

    public function admin()
    {
        return redirect('/admin/dashboard');
    }

    public function dashboard()
    {
        try{
            $user = User::all()->count();
            $transaksi = Transaction::all()->count();
            $belum = Transaction::all()->where('status', 0)->count();
            $selesai = Transaction::all()->where('status', 1)->count();
            return view('admin.index', [
                'title' => 'Admin Dashboard | YukZakat',
                'user' => $user,
                'transaksi' => $transaksi,
                'belum' => $belum,
                'selesai' => $selesai
            ]);
        } catch (Exception $err){

        }
    }

    /**
     * User Admin
     */
    public function user()
    {
        try {
            $title= 'Beranda | YukZakat';
            $users = User::get();
    
            return view('admin.user', [
                'title' => 'Admin User | YukZakat',
                'users' => $users
            ]);  
        } catch (Exception $err) {
            return $err;
        }
    }

    public function edit_user(Request $request, $id)
    {
        try {    
            $user = User::find($id);
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'no_telepon' => $request->input('no_telepon'),
                'alamat' => $request->input('alamat'),
            ]);
    
            if ($user){
                return redirect('/admin/user')->with('success', 'User berhasil di Update');
            } 
        } catch (Exception $err) {
            return $err;
        }
    }

    public function destroy_user($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
    
            return redirect('/admin/user')->with('success', 'User berhasil di Hapus');
        } catch (Exception $err) {
            return $err;
        }
    }


    /**
     * Transaksi Admin
     */
    public function transaksi()
    {
        try {
            $title= 'Beranda | YukZakat';
            $transactions = Transaction::get();
    
            return view('admin.transaksi', [
                'title' => 'Admin Transaksi | YukZakat',
                'transactions' => $transactions
            ]);  
        } catch (Exception $err) {
            return $err;
        }

    }

    public function edit_transaksi(Request $request, $id)
    {
        try {    
            $transaction = Transaction::find($id);
            $transaction->update([
                'nominal' => $request->input('nominal'),
                'jenis' => $request->input('jenis'),
            ]);
    
            if ($transaction){
                return redirect('/admin/transaksi')->with('success', 'Transaksi berhasil di Update');
            } 
        } catch (Exception $err) {
            return $err;
        }
    }

    public function destroy_transaksi($id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();
    
            return redirect('/admin/transaksi')->with('success', 'Transaksi berhasil di Hapus');
        } catch (Exception $err) {
            return $err;
        }
    }

}
