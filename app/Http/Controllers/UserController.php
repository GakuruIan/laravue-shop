<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Profile;
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

    // show profile form
    public function ShowProfile(){
        return Inertia::render('Profile/partials/Profile');
    }

    // create profile function
    public function CreateProfile(Request $request){

        $validatedData = $request->validate([
            'phone_number' => 'required',
            'county' => 'required|min:5|max:20',
            'sub_county' => 'required|min:5|max:20',
            'ward' => 'required|min:5|max:20',
        ]);

        if(Auth::check()){
            $validatedData['user_id'] = Auth::user()->id;
            
            Profile::create($validatedData);
            
            return redirect('/')->with('message','Profile successfully created');
        }

        return redirect()->back()->with('message',"You have to be Authenticated");
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

        return redirect()->back()->with('user',$user);
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
