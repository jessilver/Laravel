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
        <label>{{$data['category']}}</label>
    </div>
    <div class="actions">
        <a href="#" data-bs-toggle="modal" data-bs-target="#EditModal"> Editar </a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#DeleteModal"> Deletar </a>
    </div>
</div>
<hr>


{{-- Edit Modal --}}
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="EditModalLabel">Edit Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" name="" id="task_form_{{$data['id'] ?? ''}}">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title_form_{{$data['id'] ?? ''}}" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title_form_{{$data['id'] ?? ''}}" value="{{$data['title'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="category_form_{{$data['id'] ?? ''}}" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category_form_{{$data['id'] ?? ''}}" value="{{$data['category'] ?? ''}}">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
{{-- --  --}}

{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
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
