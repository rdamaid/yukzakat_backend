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
            $users =  User::where('role', 'user')->get();
            $admins =  User::where('role', 'admin')->get();
    
            return view('admin.user', [
                'title' => 'Admin User | YukZakat',
                'users' => $users,
                'admins' => $admins
            ]);  
        } catch (Exception $err) {
            return $err;
        }
    }

    public function addUserPage()
    {
        try {
            $title= 'Add User | YukZakat';
           
            return view('admin.userAdd', [
                'title' => 'Admin User | YukZakat',
            ]);  

        } catch (Exception $err) {
            return $err;
        }
    }

    public function addUser(Request $request)
    {
        try {  
            $this->validate($request, [
                'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'email' => 'required',
                'no_telepon' => 'required',
                'alamat' => 'required',
                'role' => 'required',
                'password' => 'required|string|min:8'
            ]);  

            $user = new User();
            
            if ($request->hasFile('user_image')) {
                $request->file('user_image')->move('img/user_img/', $request->file('user_image')->getClientOriginalName());
                $user->user_image = $request->file('user_image')->getClientOriginalName();
            };
            
            // $user->id =  User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->no_telepon = $request->input('no_telepon');
            $user->alamat = $request->input('alamat');
            $user->role = $request->input('role');
            $user->save(); //save all   
            
            // dd($user);
         
            if ($user){
                return redirect('/admin/user')->with('success', 'User berhasil di Tambah');
            } 
        } catch (Exception $err) {
            return $err;
        }
    }

    public function editUserPage($id)
    {
        try {
            $title= 'Edit User | YukZakat';
            $users = User::find($id);
            // dd($users);
            return view('admin.userEdit', [
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
            $this->validate($request, [
                'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'email' => 'required',
                'no_telepon' => 'required',
                'alamat' => 'required',
                'role' => 'required',
                'password' => 'sometimes|nullable|string|min:8|confirmed',
                'password_confirmation' => 'sometimes|nullable|required_with:password|same:password'
            ]);  

            // $user->update($request->all());
            $user = User::findOrFail($id);
            if ($request->hasFile('user_image')) {
                $request->file('user_image')->move('img/user_img/', $request->file('user_image')->getClientOriginalName());
                $user->user_image = $request->file('user_image')->getClientOriginalName();
            }
            
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if(!is_null(request('password'))) {
                $user->password = bcrypt(request('password'));
            }
            $user->no_telepon = $request->input('no_telepon');
            $user->alamat = $request->input('alamat');
            $user->role = $request->input('role');
            $user->save(); //save all   
    
         
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
            $title= 'Admin Transaksi | YukZakat';
            $transactions = Transaction::get();
    
            return view('admin.transaksi', [
                'title' => 'Admin Transaksi | YukZakat',
                'transactions' => $transactions
            ]);  
        } catch (Exception $err) {
            return $err;
        }

    }

    public function edit_transaksi($id)
    {
        try {   
            $transaction = Transaction::find($id);
            $transaction->status = '1';
            $transaction->save();
    
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
