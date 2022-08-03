<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required|confirmed',
            ]
            );
            $user=Register::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            // $token=$user->createToken('mytoken')->plainTextToken;
            return response([
                'user'=>$user,
                // 'token'=>$token
            ],201);
    }
    public function logout(Request $request){
        
        $request->user()->currentAccessToken()->delete();
        return response( 
            [
                'message'=>'Successfully Logout'
            ]
            );
    }
    public function login( Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user=Register::where('email',$request->email)->first();
        // return $user->password." ";
        if(!$user || ! Hash::check($request->password,$user->password)){
            return response( 
            [
                'message'=>'user not found'
            ],401
            );
        }
        
            $token=$user->createToken('mytok')->plainTextToken;
            return response([
                'user'=>$user,
                'token'=>$token
            ],201);
    }
}
