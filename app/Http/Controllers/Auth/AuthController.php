<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(){
        return view('Admin.Auth.sign-in');
    }


    public function signIn(Request $request)
    {
       
        $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        \Log::info('User logged in successfully.');
        return redirect()->route('employee.index');
    } else {
        \Log::error('Authentication failed.');
        return redirect('/')->with('error', 'Invalid credentials. Please try again.');
    }
    }

    public function signOut()
    {
        Auth::logout();

        return redirect('/');
    }

}
