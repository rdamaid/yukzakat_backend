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

        return redirect('/transaksi')->with('success', 'Berhasil! Silakan lakukan pembayaran.');
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

    public function upload_pembayaran(Request $request, $id){
      try {
        if (Auth::check()) {
          $this->validate($request, [
            'bukti_pembayaran' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);  
          $transaction = Transaction::find($id);
          if ($request->hasFile('bukti_pembayaran')) {
            $request->file('bukti_pembayaran')->move('img/transaksi_img/', $request->file('bukti_pembayaran')->getClientOriginalName());
            $transaction->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $transaction->save();
          }
          return redirect('/transaksi')->with('success', 'Bukti Pembayaran Berhasil di Upload');
        }
      } catch (Exception $err) {
          return $err;
      }
    }
}
