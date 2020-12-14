<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Exception;
// use Illuminate\Support\Facades\Validator;
use Auth;

class TransactionController extends Controller
{
    // private $modelName = 'Transaction';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bayar(Request $request) {
      // cek apakah dia sudah login atau belum
      if (Auth::check()) {
        $id = Auth::user()->id;
        $this->validate($request, [
          'nominal' => 'required',
          'jenis' => 'required' // jenis tipe pembayarannza
        ]);

        $transaksi = New Transaction;
        $transaksi->user_id = $id;
        $transaksi->nominal = $request->input('nominal');
        $transaksi->jenis = $request->input('jenis');
        $transaksi->save();

        return redirect('/rekening')->with('success', 'Berhasil! Silakan lakukan pembayaran.');
      } else {
        return redirect('/login')->with('warning', 'Anda belum login! Pembayaran dibatalkan.');
      }
    }

    public function riwayat(){
        try {
          if (Auth::check()) {
            $transactions = auth()->user()->transaction;
            return view('sites.dashboard.transaksi', compact('transactions'));       
          } 
        } catch (Exception $err) {
            return $err;
        }
    }  

    public function detail_transaksi($id){
        try {
          if (Auth::check()) {
            $transaction = Transaction::find($id);
            return view('sites.dashboard.detailtransaksi', compact('transaction'));
          }
        } catch (Exception $err) {
            return $err;
        }
    }
}
