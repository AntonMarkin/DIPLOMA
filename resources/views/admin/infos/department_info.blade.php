<div class="modal fade" id="depInfo{{ $department->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $department->id }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="modalLabel{{ $department->id }}">Отдел
                    №{{ str_pad($department->id, 3, '0', STR_PAD_LEFT) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="edit-form{{ $department->id }}" action="{{ route('admin.edit-department', ['department' => $department->id]) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name" value="{{ $department->name }}">
                        <label for="nameForm">Название</label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="event.preventDefault();
                        document.getElementById('edit-form{{ $department->id }}').submit()"
                            class="btn btn-light form-control">Сохранить
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
