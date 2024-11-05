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
        $task = $r->only(['titulo','categoria_id','prazo','descricao']);
        dd($task);
        $task['user_id']='1';
        User::create

        $dbTask = Tarefa::create($task);
        return $dbTask;
    }

    public function edit(Request $r, $id){ // post

    }

    public function delete(Request $r, $id){ // post

    }
}
