<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('frontend.auth.login');
    }
    public function registration(){
        return view('frontend.auth.registration');   
    }
    public function profile()
    {
        return view('frontend.auth.profile');
    }
}
