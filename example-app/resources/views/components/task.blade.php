@props(['data','categories'])

<div class="task">
    <div class="title form-check">
        <input type="checkbox" class="form-check-input" name="task" id="check-id-{{$data['id'] ?? ''}}"

        @if ($data && $data['concluido'])
            checked
        @endif

        >
        <label for="check-id-{{$data['id'] ?? ''}}">{{$data['titulo'] ?? ''}}</label>
    </div>
    <div class="priority">
        <div class="sphere">

        </div>
        <label>
            @foreach ( $categories as $category )
                @if ($category['id'] == ($data['categoria_id'] ?? ''))
                    {{$category['nome']}}
                @endif
            @endforeach
        </label>
    </div>
    <div class="actions">
        <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal{{$data['id'] ?? ''}}"> Editar </a>
        <form method="POST" id="delete_form_{{$data['id'] ?? ''}}" action="{{route('task.delete', ['id' => $data['id'] ?? ''])}}">
            @csrf
            <a href="#" onclick="delete_task('delete_form_{{$data['id'] ?? ''}}')" > Deletar </a>
        </form>
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
        <form method="POST" id="edit_form_{{$data['id'] ?? ''}}" action="{{route('task.edit')}}">
            <input name="task_id" type="hidden" value="{{$data['id'] ?? ''}}">
            @csrf
            <div class="modal-body">

                <div class="mb-3">
                    <label for="inputTitle{{$data['id'] ?? ''}}" class="form-label">Titulo da Tarefa</label>
                    <input name="titulo" type="text" class="form-control" id="inputTitle{{$data['id'] ?? ''}}" placeholder="Escreva o título da Tarefa" required
                    value="{{$data['titulo'] ?? ''}}">
                  </div>
                  <div class="mb-3">
                    <label for="inputDate{{$data['id'] ?? ''}}" class="form-label">Data Realização</label>
                    <input name="prazo" type="date" class="form-control" id="inputDate{{$data['id'] ?? ''}}" required
                    value="{{$data['prazo'] ?? ''}}">
                  </div>
                  <div class="mb-3">
                      <select id="selectCategory{{$data['id'] ?? ''}}" name="categoria_id" class="form-select" aria-label="Default select example">
                        <option hidden disabled selected value="">Selecione a categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}" {{$data['categoria_id'] == $category['id'] ? 'selected' : ''}}>{{$category['nome']}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-check form-switch">
                    <input name="concluido" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheck{{($data['concluido'] == 1) ? 'Checked' : 'Default'}}" {{($data['concluido'] == 1) ? 'Checked' : 'Default'}}>
                    <label class="form-check-label" for="flexSwitchCheck{{($data['concluido'] == 1 ) ? 'Checked' : 'Default'}}">Tarefa concluida</label>
                  </div>
                  <div class="mb-3">
                    <label for="inputDescription{{$data['id'] ?? ''}}" class="form-label">Descrição da Task</label>
                    <textarea name="descricao" class="form-control" placeholder="Escreva a descrição" id="inputDescription{{$data['id'] ?? ''}}">{{$data['descricao'] ?? ''}}</textarea>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" onclick="clear_inputs(['inputTitle{{$data['id'] ?? ''}}', 'inputDate{{$data['id'] ?? ''}}', 'selectCategory{{$data['id'] ?? ''}}','inputDescription{{$data['id'] ?? ''}}'])">Limpar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="confirm_create_task('edit_form_{{$data['id'] ?? ''}}', ['inputTitle{{$data['id'] ?? ''}}', 'inputDate{{$data['id'] ?? ''}}', 'selectCategory{{$data['id'] ?? ''}}','inputDescription{{$data['id'] ?? ''}}'])">Salvar</button>
            </div>
        </form>
    </div>
    </div>
</div>
{{-- --  --}}

