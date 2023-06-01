
<div class="modal fade" id="officeInfo{{ $office->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $office->id }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="modalLabel{{ $office->id }}">Кабинет
                    №{{ str_pad($office->id, 3, '0', STR_PAD_LEFT) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="edit-form{{ $office->id }}" action="{{ route('admin.edit-office', ['office' => $office->id]) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name" value="{{ $office->name }}">
                        <label for="nameForm">Название</label>
                    </div>

                    <h3 class="fs-5">Список отделов</h3>
                    <select id="department_id" name="department_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите отдел" data-size="10" data-width="100%">
                        <div class="form-select">
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}"
                                        @if($office->department_id == $dept->id) selected @endif>{{ $dept->name }}</option>
                            @endforeach
                        </div>
                    </select>
                </form>
            </div>

            <div class="modal-footer">
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="event.preventDefault();
                        document.getElementById('edit-form{{ $office->id }}').submit()"
                            class="btn btn-light form-control">Сохранить
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
