<?php

namespace App\Http\Controllers;

use App\AdditionalHelper\ReturnGoodWay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{

    protected $modelName = 'User';

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'no_telepon' => 'required|max:15',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);
        $user = new User([
            'name' => $request->name,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return ReturnGoodWay::successReturn(
            $user,
            $this->modelName,
            'User successfully created',
            'success'
        );
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember_me' => 'boolean'
            ]);
            $credentials = request(['email', 'password']);
            
            if(!Auth::attempt($credentials))
                return ReturnGoodWay::failedReturn(
                    'Unauthorized',
                    'unauthorized'
                );
            
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addDays(1);
            $token->save();

            return response()->json([
                'token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expired_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);

        } catch (Exception $err) {
            return $err;
        }
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return ReturnGoodWay::successReturn(
            $request,
            $this->modelName,
            'Logout success',
            'success'
        );
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
