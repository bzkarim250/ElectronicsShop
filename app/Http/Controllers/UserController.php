<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;

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
            'role_id'=>$fields['role_id'] //client default 4
        ]);

        $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'this is the email test'
        ];
        Mail::to($fields['email'])->send(new MailNotify($data));
        
        // return response([
        //     'user'=>$user,
        // ],201);
        return redirect()->intended('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        // else if(Auth::attempt($credentials))
        //   {
        //     return redirect()->intended('management/dashboard');
        //     }
      else{
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    
    }
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}
public function index()
{
    $users=User::all();
    return view('dashboard.tables.usersTable')->with('users',$users);
}
public function show($id)
{
    $user = User::find($id);
    return view('dashboard.forms.users.user')->with('user',$user);
}
public function update(Request $request, $id)
{
    $users = User::find($id);
    $users->update($request->all());
    return redirect('dashboard.forms.users.edit')->with('flash_message', 'user Updated!');  
}
public function destroy($id)
{
    User::destroy($id);
    $users =User::find($id);
    return redirect('/usertable')->with('flash_message', 'User deleted!');  
}
}
