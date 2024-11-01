<x-layout page='To-Do | Home'>


    <x-slot:btn>
        <a href="{{route('task.new.page')}}" class="btn btn-primary">
            Nova Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do dia</h2>
            <hr>
            data
        </div>
        <div class="graph-header-subtitle">
            Tarefas <b>3/6</b>
        </div>

        <div class="graph-placeholder">

        </div>

        <p>Restam 3 tarefas paar serem realizadas</p>
    </section>
    <section class="list">
        <div class="list-header">
            <select name="" id="" class="list-header-select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task-list">



            @php
                $tasks = [
                    [ 'id' => 1, 'done' => false, 'title' => 'minha primeira task', 'category' => 'categoria 01', 'delete_url' => '#1', 'edit_url' => '#1'],
                    [ 'id' => 2, 'done' =>  true, 'title' => 'minha segunda task' , 'category' => 'categoria 02', 'delete_url' => '#2', 'edit_url' => '#2'],
                    [ 'id' => 3, 'done' => false, 'title' => 'minha terceira task', 'category' => 'categoria 01', 'delete_url' => '#3', 'edit_url' => '#3'],
                    [ 'id' => 4, 'done' =>  true, 'title' => 'minha quarta task'  , 'category' => 'categoria 03', 'delete_url' => '#4', 'edit_url' => '#4'],
                    [ 'id' => 5, 'done' => false, 'title' => 'minha quinta task'  , 'category' => 'categoria 02', 'delete_url' => '#5', 'edit_url' => '#5'],
                ];
            @endphp

            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>
    </section>
</x-layout>
