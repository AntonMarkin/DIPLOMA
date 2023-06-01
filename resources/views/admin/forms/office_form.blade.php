<div class="modal fade" id="officeForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="modalLabel">Новый кабинет</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name">
                        <label for="nameForm">Название</label>
                    </div>
                    <hr>
                    <h3 class="fs-5">Список отделов</h3>
                    <select id="department_id" name="department_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите отдел" data-size="10" data-width="100%">
                        <div class="form-select">
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </div>
                    </select>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-light form-control" value="Отправить">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
