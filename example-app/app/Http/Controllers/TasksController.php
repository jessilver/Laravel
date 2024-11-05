<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $r){ // get
        return view('tasks/show');
    }

    public function create(Request $r){ // post
        $r['user_id']='1';
        $task = $r->only(['titulo','categoria_id','prazo','descricao','user_id']);
        // dd([$task,$r->all()]);
        $dbTask = new Tarefa();
        $dbTask->titulo = $task['titulo'];
        $dbTask->categoria_id = $task['categoria_id'];
        $dbTask->prazo = $task['prazo'];
        $dbTask->descricao = $task['descricao'];
        $dbTask->user_id = $task['user_id'];
        $dbTask->save();

        dd ($dbTask);
    }

    public function edit(Request $r, $id){ // post

    }

    public function delete(Request $r, $id){ // post

    }
}
