<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class testController extends Controller
{
    public function index(){
        $user = User::find(1);

        $contex = [
            'user' => $user,
            'tarefas' => $user->tarefas,
            'categorias' => $user->categorias
        ];

        return $contex;

    }

    public function home(){
        return view('layouts/index');
    }
}
