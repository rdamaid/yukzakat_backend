<?php

namespace App\Http\Controllers;

use App\AdditionalHelper\ReturnGoodWay;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Auth;
Use Alert;
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

            if($users){
                return ReturnGoodWay::successReturn(
                    $users,
                    $this->modelName,
                    'A list of all Users',
                    'success'
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

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     try {
    //         $user = User::find($id);
    //         if(!$user){
    //             return ReturnGoodWay::failedReturn(
    //                 'user not found',
    //                 'bad request'
    //             );
    //         } else {
    //             return ReturnGoodWay::successReturn(
    //                 $user,
    //                 $this->modelName,
    //                 'Show user with id ' . $id,
    //                 'success'
    //             );
    //         }

    //     } catch (Exception $err) {
    //         return $err;
    //     }
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
                    'Please fill all requirment',
                    'bad request'
                );
            }

            $user = User::find($id);
            $user->update([
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

    public function saveprofil(Request $request)
    {
        $this->validate($request, [
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'password_confirmation' => 'sometimes|nullable|required_with:password|same:password'
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
        if(!is_null(request('password'))) {
            $users->password = bcrypt(request('password'));
        }
        $users->no_telepon = $request->input('no_telepon');
        $users->alamat = $request->input('alamat');
        $users->save(); //save all

        return redirect('/profil')->with('success', 'Profil berhasil diupdate!');
    }
}
