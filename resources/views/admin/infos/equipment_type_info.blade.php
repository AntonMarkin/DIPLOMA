<div class="modal fade" id="equipTypeInfo{{ $type->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $type->id }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="modalLabel{{ $type->id }}">Тип оборудования
                    №{{ str_pad($type->id, 4, '0', STR_PAD_LEFT) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="edit-form{{ $type->id }}"
                      action="{{ route('admin.edit-equipment-type', ['id' => $type->id]) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name" value="{{ $type->name }}">
                        <label for="nameForm">Название</label>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="is_deleted" value="1">
                        <input class="form-check-inline" type="checkbox" id="is_deleted" name="is_deleted"
                               value="0" @if($type->is_deleted) checked @endif><label class="form-check-label" for="is_deleted">Удалено</label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="event.preventDefault();
                        document.getElementById('edit-form{{ $type->id }}').submit()"
                            class="btn btn-light form-control">Сохранить
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
