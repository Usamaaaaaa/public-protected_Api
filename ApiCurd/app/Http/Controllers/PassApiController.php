<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
// use illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Auth\User as AuthUser;
// use Validator;
use illuminate\Support\Facades\Auth;

class PassApiController extends Controller
{
     public function __construct()
        {
            $this->middleware('auth.basic'); 
        }
    
    public $successStatus = 200;
public function Register(Request $request){
        return $request->all();
        //  $res=['name'=>'demo'];
        //  return $res;

    }
    public function passRegister(Request $request){
        // return $request->all();
        // $validate=Validator::make($request->all(),[
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'password'=>'required',
        // ]);
        // if($validate->fails()){
        //     return response( 
        //     'message',$validate->errors()
        //     );
        // }
            // $input=$request->all();
            // // $input['password']=bcrypt($input['password']);
            // $user=User::create($input);
            // $token=$user->createToken('MyApp')->accessToken;
            // return response([
            //     'status'=>"success",
            //     'token'=>$token
            // ],201);
            return "ok";
               $validator = Validator::make($request->all(), [ 
                'name' => 'required', 
                'email' => 'required|email', 
                'password' => 'required', 
                'c_password' => 'required|same:password', 
            ]);
            // return $validator;
            // if ($validator->fails()) { 
            //     return response()->json(['error'=>$validator->errors()], 401);            
            // }
            // $input = $request->all(); 
            // $input['password'] = bcrypt($input['password']); 
            // $user = User::create($input); 
            // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            // $success['name'] =  $user->name;
            //  return response()->json(['success'=>$success], $this-> successStatus);
}

    public function PassLogin(Request $request){
        
            $input=$request->all();
            // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                $users = Auth::user()->createToken; 
                // $user = User::create($input);
                $success['token'] = $users-> accessToken; 
                dd($success['token']);
                return response()->json(['success' => $success], $this-> successStatus); 
            // } 
            // else{ 
            //     return response()->json(['error'=>'Unauthorised'], 401); 
            // }
            
            // $input['password']=bcrypt($input['password']);
        // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        //     $user=Auth::user();
        //     //  $token=$user->createToken('MyApp')->accessToken;
        //     return response([
        //         'user'=>$user,
        //         // 'token'=>$token
        //     ],201);
        
        // }else{
        //     return response()( [
        //     'message','unauthorized'],401
        //     );
        // }

    }
    public function GetAll(){
        // $data=User::all();
        //  return response([
        //         'Status'=>'ok',
        //         'data'=>$data
        //     ]);
            $user = Auth::user(); 
            return response()->json(['success' => $user], $this-> successStatus); 
        

    }
}
