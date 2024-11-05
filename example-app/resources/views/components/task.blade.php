@props(['data','categories'])

<div class="task">
    <div class="title form-check">
        <input type="checkbox" class="form-check-input" name="task" id="check-id-{{$data['id'] ?? ''}}"

        @if ($data && $data['done'])
            checked
        @endif

        >
        <label for="check-id-{{$data['id'] ?? ''}}">{{$data['title'] ?? ''}}</label>
    </div>
    <div class="priority">
        <div class="sphere">

        </div>
        <label>
            @foreach ( $categories as $category )
                @if ($category['id'] == ($data['category'] ?? ''))
                    {{$category['nome']}}
                @endif
            @endforeach
        </label>
    </div>
    <div class="actions">
        <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{$data['id'] ?? ''}}"> Editar </a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#DeleteModal{{$data['id'] ?? ''}}"> Deletar </a>
    </div>
</div>
<hr>

{{-- Edit Modal --}}
<div class="modal fade" id="EditModal{{$data['id'] ?? ''}}" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditModalLabel">Editar Tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('task.crate')}}">
            @csrf
            <div class="modal-body">

                <div class="mb-3">
                    <label for="inputTitle{{$data['id'] ?? ''}}" class="form-label">Titulo da Tarefa</label>
                    <input name="title" type="text" class="form-control" id="inputTitle{{$data['id'] ?? ''}}" placeholder="Escreva o título da Tarefa" required
                    value="{{$data['title'] ?? ''}}">
                  </div>
                  <div class="mb-3">
                    <label for="inputDate{{$data['id'] ?? ''}}" class="form-label">Data Realização</label>
                    <input type="date" class="form-control" id="inputDate{{$data['id'] ?? ''}}" required
                    value="{{$data['date'] ?? ''}}">
                  </div>
                  <div class="mb-3">

                      <select id="selectCategory{{$data['id'] ?? ''}}" name="category" class="form-select" aria-label="Default select example">
                        <option hidden disabled selected value="">Selecione a categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}" {{$data['category'] == $category['id'] ? 'selected' : ''}}>{{$category['nome']}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="inputDescription{{$data['id'] ?? ''}}" class="form-label">Descrição da Task</label>
                    <textarea class="form-control" placeholder="Escreva a descrição" id="inputDescription{{$data['id'] ?? ''}}">{{$data['desc'] ?? ''}}</textarea>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" onclick="clear_inputs(['inputTitle{{$data['id'] ?? ''}}', 'inputDate{{$data['id'] ?? ''}}', 'selectCategory{{$data['id'] ?? ''}}','inputDescription{{$data['id'] ?? ''}}'])">Limpar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="confirm_create_task('a', ['inputTitle', 'inputDate', 'selectCategory','inputDescription'])">Salvar</button>
            </div>
        </form>
    </div>
    </div>
</div>
{{-- --  --}}

{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal{{$data['id'] ?? ''}}" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
{{-- --  --}}
