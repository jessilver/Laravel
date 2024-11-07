<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $r){

        $categories = Categoria::all()->toArray();
        $tarefas = Tarefa::all()->toArray();

        $contex = [
            'categories' => $categories,
            'tasks' => $tarefas
        ];
        return view('home',$contex);
    }
}
