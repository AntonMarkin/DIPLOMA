<div class="modal fade" id="equipForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="modalLabel">Новое оборудование</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name">
                        <label for="nameForm">Название</label>
                    </div>
                    <h3 class="fs-5">Список типов оборудования</h3>
                    <select id="equipment_type_id" name="equipment_type_id" class="selectpicker"
                            data-style="btn-outline-light"
                            title="Выберите тип оборудования" data-size="10" data-width="100%"
                            data-live-search="true">
                        <div class="form-select">
                            @foreach($equipmentTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </div>
                    </select>
                    <h3 class="fs-5">Список кабинетов</h3>
                    <select id="office_id" name="office_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите кабинет" data-size="10" data-width="100%"
                            data-live-search="true">
                        <div class="form-select">
                            @foreach($offices as $office)
                                <option value="{{ $office->id }}">{{ $office->name }}</option>
                            @endforeach
                        </div>
                    </select>
                    <h3 class="fs-5">Описание:</h3>
                    <textarea class="border-2 form-control" style="background-color: rgba(43,48,53,0.94); resize: none"
                              rows="5" id="description" name="description"></textarea>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-light form-control" value="Отправить">
                </div>
            </form>
        </div>
    </div>
</div>
