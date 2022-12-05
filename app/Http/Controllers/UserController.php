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
        $user->assignRoleById(2);
        $user->update();

        $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'Congraturations, your account succesfully created .login with your creadentials'
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
 
        if (Auth::attempt($credentials) && auth()->user()->role_id==4) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        else if(Auth::attempt($credentials))
          {
            return redirect()->intended('/Admin');
            }
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
public function clients()
{
    $users=User::where("role_id",4)->get();
    return view('dashboard.tables.clientsTable')->with('clients',$users);
}
public function admin()
{
    $users=User::where("role_id",2)->get();
    return view('dashboard.tables.adminTable')->with('admin',$users);
}
public function supplier()
{
    $users=User::where("role_id",3)->get();
    return view('dashboard.tables.suppliersTable')->with('suppliers',$users);
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
