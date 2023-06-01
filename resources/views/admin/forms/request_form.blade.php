<div class="modal fade" id="reqForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post" action="{{ route('create-request') }}">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="modalLabel">Новый запрос</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input class="form-control fs-4" type="text" id="name" name="name">
                        <label for="nameForm">Название</label>
                    </div>
                    <hr>
                    <h3 class="fs-5">Описание:</h3>
                    <textarea class="border-2 form-control" style="background-color: rgba(43,48,53,0.94); resize: none"
                              rows="5" id="description" name="description"></textarea>
                    <hr>
                    <h3 class="fs-5">Список оборудования:</h3>
                    <select id="equipment" name="equipment[]" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите проблеммное оборудование" data-size="10" data-width="100%"
                            data-live-search="true" multiple>
                        <div class="form-select">
                            @foreach($equipmentTypes as $equipmentType)
                                <optgroup label="{{ $equipmentType->name }}">
                                    @foreach($equipmentType->equipments as $equipment)
                                        <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </div>

                    </select>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-light form-control" value="Отправить">
                </div>
            </form>
        </div>
    </div>
</div>
