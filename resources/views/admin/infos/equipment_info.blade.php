<div class="modal fade" id="equipInfo{{ $equip->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $equip->id }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="modalLabel{{ $equip->id }}">Оборудование
                    №{{ str_pad($equip->id, 5, '0', STR_PAD_LEFT) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="edit-form{{ $equip->id }}"
                      action="{{ route('admin.edit-equipment', ['id' => $equip->id]) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name" value="{{ $equip->name }}">
                        <label for="nameForm">Название</label>
                    </div>
                    <h3 class="fs-5">Список типов оборудования</h3>
                    <select id="equipment_type_id" name="equipment_type_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите тип оборудования" data-size="10" data-width="100%"
                            data-live-search="true">
                        <div class="form-select">
                            @foreach($equipmentTypes as $type)
                                <option value="{{ $type->id }}"
                                        @if($equip->equipment_type_id == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </div>
                    </select>
                    <h3 class="fs-5">Список кабинетов</h3>
                    <select id="office_id" name="office_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите кабинет" data-size="10" data-width="100%"
                            data-live-search="true">
                        <div class="form-select">
                            @foreach($offices as $office)
                                <option value="{{ $office->id }}"
                                        @if($equip->office_id == $office->id) selected @endif>{{ $office->name }}</option>
                            @endforeach
                        </div>
                    </select>
                    <div class="m-3">
                    <input type="hidden" name="is_deleted" value="1">
                    <input class="form-check-inline" type="checkbox" id="is_deleted" name="is_deleted"
                           value="0" @if($equip->is_deleted) checked @endif><label class="form-check-label" for="is_deleted">Удалено</label>
            </div>
                    <h3 class="fs-5">Описание:</h3>
                    <textarea name="description" class="border-2 form-control" style="background-color: rgba(43,48,53,0.94); resize: none"
                              rows="5" >{{ $equip->description }}</textarea>
                </form>
            </div>

            <div class="modal-footer">
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="event.preventDefault();
                        document.getElementById('edit-form{{ $equip->id }}').submit()"
                            class="btn btn-light form-control">Сохранить
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
