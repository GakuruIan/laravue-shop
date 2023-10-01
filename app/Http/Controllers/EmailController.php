<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailController extends Controller
{
    //show the email verification page
    public function show(){
        return Inertia::render('Auth/VerifyEmail');
    }

    //handles the email verification
    public function HandleVerification(EmailVerificationRequest $request){
        
        $request->fulfill();

        return redirect('/');
    }

    //resends the verification link
    public function ResendVerificationLink(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

}
