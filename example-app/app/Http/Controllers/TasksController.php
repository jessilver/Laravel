<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $r){ // get
        return view('tasks/show');
    }

    public function new(Request $r){ // get
        return view('tasks/new');
    }

    public function create(Request $r){ // post

    }

    public function edit(Request $r, $id){ // post

    }

    public function delete(Request $r, $id){ // post

    }
}
