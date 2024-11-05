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
                    [ 'id' => 1, 'done' => false, 'date' => '2021-03-01', 'title' => 'minha primeira task', 'category' => '1', 'delete_url' => '#1', 'edit_url' => '#1', 'desc' => 'descrição task 01'],
                    [ 'id' => 2, 'done' =>  true, 'date' => '2020-02-05', 'title' => 'minha segunda task' , 'category' => '2', 'delete_url' => '#2', 'edit_url' => '#2', 'desc' => 'descrição task 02'],
                    [ 'id' => 3, 'done' => false, 'date' => '2022-05-21', 'title' => 'minha terceira task', 'category' => '3', 'delete_url' => '#3', 'edit_url' => '#3', 'desc' => 'descrição task 03'],
                    [ 'id' => 4, 'done' =>  true, 'date' => '2020-06-03', 'title' => 'minha quarta task'  , 'category' => '4', 'delete_url' => '#4', 'edit_url' => '#4', 'desc' => 'descrição task 04'],
                    [ 'id' => 5, 'done' => false, 'date' => '2024-07-10', 'title' => 'minha quinta task'  , 'category' => '5', 'delete_url' => '#5', 'edit_url' => '#5', 'desc' => 'descrição task 05'],
                    [ 'id' => 6, 'done' => false, 'date' => '2020-09-20', 'title' => 'minha terceira task', 'category' => '6', 'delete_url' => '#3', 'edit_url' => '#3', 'desc' => 'descrição task 06'],
                    [ 'id' => 7, 'done' =>  true, 'date' => '2018-04-20', 'title' => 'minha quarta task'  , 'category' => '7', 'delete_url' => '#4', 'edit_url' => '#4', 'desc' => 'descrição task 07'],
                    [ 'id' => 8, 'done' => false, 'date' => '2020-08-05', 'title' => 'minha quinta task'  , 'category' => '8', 'delete_url' => '#5', 'edit_url' => '#5', 'desc' => 'descrição task 08'],
                    [ 'id' => 9, 'done' => false, 'date' => '2019-03-23', 'title' => 'minha terceira task', 'category' => '9', 'delete_url' => '#3', 'edit_url' => '#3', 'desc' => 'descrição task 09'],
                    [ 'id' => 10, 'done' =>  true, 'date' => '2023-12-10', 'title' => 'minha quarta task'  , 'category' => '10', 'delete_url' => '#4', 'edit_url' => '#4', 'desc' => 'descrição task 10'],
                    [ 'id' => 11, 'done' => false, 'date' => '2025-11-20', 'title' => 'minha quinta task'  , 'category' => '1', 'delete_url' => '#5', 'edit_url' => '#5', 'desc' => 'descrição task 11'],
                ];
            @endphp

            @foreach ($tasks as $task)
            <div class="task-item">
                <x-task :data=$task  :categories=$categories />
            </div>
            @endforeach
        </div>
    </section>

    {{-- New Task Modal --}}
    <div class="modal fade" id="NewTaskModal" tabindex="-1" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="NewTaskModalLabel">Nova Tarefa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="new-task-form" method="POST" action="{{route('task.crate')}}">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Titulo da Tarefa</label>
                        <input name="titulo" type="text" class="form-control" id="inputTitle" placeholder="Escreva o título da Tarefa" required>
                      </div>
                      <div class="mb-3">
                        <label for="inputDate" class="form-label">Data Realização</label>
                        <input name="prazo" type="date" class="form-control" id="inputDate" required>
                      </div>
                      <div class="mb-3">

                          <select id="selectCategory" name="categoria_id" class="form-select" aria-label="Default select example">
                            <option hidden disabled selected value="">Selecione a categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category['id']}}">{{$category['nome']}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="inputDescription" class="form-label">Descrição da Task</label>
                        <textarea name="descricao" class="form-control" placeholder="Escreva a descrição" id="inputDescription"></textarea>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" onclick="clear_inputs(['inputTitle', 'inputDate', 'selectCategory','inputDescription'])">Limpar</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="confirm_create_task('new-task-form', ['inputTitle', 'inputDate', 'selectCategory','inputDescription'])">Criar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    {{-- --  --}}

</x-layout>

