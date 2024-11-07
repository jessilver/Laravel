<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $r){ // get
        return view('tasks/show');
    }

    public function create(Request $r){ // post
        $r['user_id']='1';
        $task = $r->only(['titulo','categoria_id','prazo','descricao','user_id']);

        $dbTask = new Tarefa();
        $dbTask->titulo = $task['titulo'];
        $dbTask->categoria_id = $task['categoria_id'];
        $dbTask->prazo = $task['prazo'];
        $dbTask->descricao = $task['descricao'];
        $dbTask->user_id = $task['user_id'];
        $dbTask->save();
        return redirect()->route('home.page');
    }

    public function edit(Request $r){ // post

        $r['user_id']='1';
        $task = $r->only(['task_id', 'titulo','categoria_id','prazo','descricao','user_id','concluido']);

        $task['concluido'] = $task['concluido'] ?? 0;

        // dd([$task,$r->all()]);

        $dbTask = Tarefa::find($task['task_id']);
        $dbTask->titulo = $task['titulo'];
        $dbTask->categoria_id = $task['categoria_id'];
        $dbTask->concluido = $task['concluido'] == 'on' ? 1: 0;
        $dbTask->prazo = $task['prazo'];
        $dbTask->descricao = $task['descricao'];
        $dbTask->user_id = $task['user_id'];
        $dbTask->save();
        return redirect()->route('home.page');
    }

    public function delete(Request $r, $id){ // post
        $task = Tarefa::find($id);
        $task->delete();
        return redirect()->route('home.page');
    }
}
