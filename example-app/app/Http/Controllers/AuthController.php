<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $r){
        return view('auth/login');
    }


    public function register(Request $r){
        return view('auth/register');
    }
}
