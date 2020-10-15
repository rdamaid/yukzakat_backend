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
    
            auth()->user()->transactions()->create([
                'nominal' => $request->input('nominal'),
                'jenis' => $request->input('jenis')
            ]);

            return response()->json([
                'message' => 'success'
            ], 201);

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
    public function show($id)
    {
        try {
            $transaction = Transaction::find($id);
            if(!$transaction){
                return ReturnGoodWay::failedReturn(
                    'transaction not found',
                    'bad request'
                );
            } else {
                return ReturnGoodWay::successReturn(
                    $transaction,
                    $this->modelName,
                    'Show trasnaction with id ' . $id,
                    'success'
                );
            }

        } catch (Exception $err) {
            return $err;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    
            $transaction = Transaction::find($id);
            $transaction->update([
                'nominal' => $request->input('nominal'),
                'jenis' => $request->input('jenis'),
            ]);

            if ($transaction){
                return ReturnGoodWay::successReturn(
                    $transaction,
                    $this->modelName,
                    $this->modelName . " successfully created",
                    'created'
                );
            } else {
                return ReturnGoodWay::failedReturn(
                    'failed',
                    'bad request'
                );
            }


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
                'Delete transaction with id ' . $id,
                'success'
            );
        } catch (Exception $err) {
            return $err;
        }
    }
}
