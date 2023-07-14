<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


class UserController extends Controller
{
    //show register form
    public function RegisterForm(){
        return Inertia::render('Auth/Register');
    }

    //login form
    public function LoginForm(){
        return Inertia::render('Auth/Login');
    }
    
    //register function
    public function Register(Request $request){

        $validatedData = $request->validate([
            'firstname' => 'required|max:10|min:3',
            'lastname' => 'required|max:10|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        return redirect('/');
    }

    //login function
    public function Login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $remember = $request->has('remember');

        if(Auth::attempt($credentials,$remember)){
            $user = Auth::user();
            return redirect()->back()->with('user', $user);
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    // logout a user
    public function Logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
  
}
