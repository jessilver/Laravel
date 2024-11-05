<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $r){

        $categories = Categoria::all()->toArray();

        $contex = [
            'categories' => $categories
        ];
        return view('home',$contex);
    }
}
