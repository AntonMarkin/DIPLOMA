<div class="modal fade" id="equipTypeForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="modalLabel">Новый тип оборудования</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name">
                        <label for="nameForm">Название</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-light form-control" value="Отправить">
                </div>
            </form>
        </div>
    </div>
</div>
