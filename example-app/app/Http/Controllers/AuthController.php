<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $r){
        return view('auth/login');
    }


    public function register(Request $r){
        return view('auth/register');
    }

    public function register_action(Request $r){
        // dd($r->all());
        $validatedData = $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        // dd($validatedData);


        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->save();

        return redirect(route('auth.login'));

        // dd($user);
    }

    // API

    public function verify_unique_email($email, Request $r){

        $return = ['exist' => false];

        $emailToVeryfy = $email;

        if(User::where('email', $emailToVeryfy)->exists()){
            $return = ['exist' => true];
        }

        return $return;
    }
}
