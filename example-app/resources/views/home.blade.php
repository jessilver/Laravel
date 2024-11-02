<x-layout page='To-Do | Home'>


    <x-slot:btn>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#NewTaskModal">
            Nova Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph-header">
            <h3>Progresso do dia</h3>
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
                    [ 'id' => 6, 'done' => false, 'title' => 'minha terceira task', 'category' => 'categoria 01', 'delete_url' => '#3', 'edit_url' => '#3'],
                    [ 'id' => 7, 'done' =>  true, 'title' => 'minha quarta task'  , 'category' => 'categoria 03', 'delete_url' => '#4', 'edit_url' => '#4'],
                    [ 'id' => 8, 'done' => false, 'title' => 'minha quinta task'  , 'category' => 'categoria 02', 'delete_url' => '#5', 'edit_url' => '#5'],
                    [ 'id' => 9, 'done' => false, 'title' => 'minha terceira task', 'category' => 'categoria 01', 'delete_url' => '#3', 'edit_url' => '#3'],
                    [ 'id' => 10, 'done' =>  true, 'title' => 'minha quarta task'  , 'category' => 'categoria 03', 'delete_url' => '#4', 'edit_url' => '#4'],
                    [ 'id' => 11, 'done' => false, 'title' => 'minha quinta task'  , 'category' => 'categoria 02', 'delete_url' => '#5', 'edit_url' => '#5'],
                ];
            @endphp

            @foreach ($tasks as $task)
            <div class="task-item">
                <x-task :data=$task />
            </div>
            @endforeach
        </div>
    </section>

    {{-- New Task Modal --}}
    <div class="modal fade" id="NewTaskModal" tabindex="-1" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="NewTaskModalLabel">Nova Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('task.crate')}}">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Titulo da Task</label>
                        <input name="title" type="text" class="form-control" id="inputTitle" required>
                      </div>
                      <div class="mb-3">
                        <label for="inputDate" class="form-label">Data Realização</label>
                        <input type="date" class="form-control" id="inputDate" required>
                      </div>
                      <div class="mb-3">

                          <select id="selectCategory" name="category" class="form-select" aria-label="Default select example">
                            <option hidden disabled selected value="">Selecione a categoria</option>
                            <option value="1">categoria 1</option>
                            <option value="2">categoria 2</option>
                            <option value="3">categoria 3</option>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="inputDescription" class="form-label">Descrição da Task</label>
                        <textarea class="form-control" placeholder="Escreva a descrição" id="inputDescription"></textarea>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" onclick="clear_inputs(['inputTitle', 'inputDate', 'selectCategory','inputDescription'])">Clear</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="confirm_create_task('a', ['inputTitle', 'inputDate', 'selectCategory','inputDescription'])">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    {{-- --  --}}

</x-layout>

