<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class formController extends Controller
{
    public function login(){
        if(Auth::check()) { 
            return redirect()->route('dashboard');
        }
        return view('auth/login');
    }

    public function register(){
        return view('auth.register');
    }



}
