<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'   =>'required|string',
            'email'  =>'required|email',
            'password'  =>'required|confirmed'
        ]);
        if($validator->fails()){
            return response()->json(['validation Error'=> $validator->errors()]);
        }
        $input['password']=bcrypt( $input['password']);
        $user =User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return response()->json(['data' => $success,'messege'=>'Registered Successfully'],201);
    }
     

    public function login(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'email'  =>'required|email',
            'password'  =>'required'
        ]);
        $user =User::where('email',$request->email)->first();    
        if(!Hash::check($request->password,$user->password)){
            return 'cannot login';  
        }
        $token = $user->createToken($user->name);
        return  response()->json(['token' =>$token->plainTextToken,'user'=>$user]);

    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return  response()->json(['messege' =>'User Successfully logged'],200);


    }
    
}
