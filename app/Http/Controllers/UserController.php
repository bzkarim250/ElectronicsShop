<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed',
            'role_id'=>'integer'
        ]);

        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password']),
            'role_id'=>$fields['role_id']
        ]);

        $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'this is the email test'
        ];
        Mail::to($fields['email'])->send(new MailNotify($data));
        
        return response([
            'user'=>$user,
        ],201);
    }

    public function login(Request $request){
        $fields=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $user=User::where('email',$fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response(["message"=>"Wrong Credentials"],401);
        }

        $token= $user->createToken('MyAppToken')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,200);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response(["message"=>"user Loggedout!"],200);
    }
}
