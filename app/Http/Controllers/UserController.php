<?php

namespace App\Http\Controllers;

use App\AdditionalHelper\ReturnGoodWay;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   

class UserController extends Controller
{
    private $modelName = 'User';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::get();

            return ReturnGoodWay::successReturn(
                $users,
                $this->modelName,
                'A list of all Users',
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
                'name' => 'required',
                'no_telepon' => 'required|max:15',
                'email' => 'required|max:255|email|unique:users',
                'password' => 'required|min:6'
            ]);

            if($validator->fails()) {

                return ReturnGoodWay::failedReturn(
                    'Please check all requirment or your email is already used',
                    'bad request'
                );
            }
    
            $user = new User();
            $user->name = $request->input('name');
            $user->no_telepon = $request->input('no_telepon');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();

            return ReturnGoodWay::successReturn(
                $user,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::whereId($id)->first();

            return ReturnGoodWay::successReturn(
                $user,
                $this->modelName,
                'Show user with id ' . $id,
                'success'
            );
        } catch (Exception $err) {
            return $err;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'no_telpon' => 'required|max:15',
                'email' => 'required|max:255|email|unique',
                'password' => 'required|min:6'
            ]);

            if($validator->fails()) {

                return ReturnGoodWay::failedReturn(
                    'Please fill all requirment',
                    'bad request'
                );
            }

            $user = User::whereId($request->input('id'))->update([
                'name' => $request->input('name'),
                'no_telepon' => $request->input('no_telepon'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            return ReturnGoodWay::successReturn(
                $user,
                $this->modelName,
                $this->modelName . " successfully updated",
                'success'
            );
        } catch (Exception $err) {
            return $err;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return ReturnGoodWay::successReturn(
                $user,
                $this->modelName,
                'Delete user with id ' . $id,
                'success'
            );
        } catch (Exception $err) {
            return $err;
        }
    }
}
