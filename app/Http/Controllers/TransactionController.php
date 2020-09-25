<?php

namespace App\Http\Controllers;

use App\AdditionalHelper\ReturnGoodWay;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;  

class TransactionController extends Controller
{
    private $modelName = 'Transaction';   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $transactions = Transaction::get();

            return ReturnGoodWay::successReturn(
                $transactions,
                $this->modelName,
                'A list of all transactions',
                'success'
            );
        } catch (Exception $err) {
            return $err;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'nominal' => 'required',
                'jenis' => 'required',
            ]);

            if($validator->fails()) {

                return ReturnGoodWay::failedReturn(
                    'Please fill all requirment',
                    'bad request'
                );
            }
    
            $transaction = new Transaction();
            $transaction->nominal = $request->input('nominal');
            $transaction->jenis = $request->input('jenis');
            $transaction->save();

            return ReturnGoodWay::successReturn(
                $transaction,
                $this->modelName,
                $this->modelName . " successfully created",
                'created'
            );
        } catch (Exception $err) {
            return $err;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'nominal' => 'required',
                'jenis' => 'required',
            ]);

            if($validator->fails()) {

                return ReturnGoodWay::failedReturn(
                    'Please fill all requirment',
                    'bad request'
                );
            }
    
            $transaction = Transaction::whereId($request->input('id'))->update([
                'nominal' => $request->input('nominal'),
                'jenis' => $request->input('jenis'),
            ]);

            return ReturnGoodWay::successReturn(
                $transaction,
                $this->modelName,
                $this->modelName . " successfully created",
                'created'
            );
        } catch (Exception $err) {
            return $err;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();

            return ReturnGoodWay::successReturn(
                $transaction,
                $this->modelName,
                'Delete transac$transaction with id ' . $id,
                'success'
            );
        } catch (Exception $err) {
            return $err;
        }
    }
}
