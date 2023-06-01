<div class="modal fade" id="userForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="modalLabel">Новый пользователь</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="login" name="login">
                        <label for="nameForm">Логин</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-4" type="password" id="password" name="password">
                        <label for="nameForm">Пароль</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name">
                        <label for="nameForm">Имя</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="surname" name="surname">
                        <label for="nameForm">Фамилия</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-4" type="text" id="patronymic" name="patronymic">
                        <label for="nameForm">Отчество</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-4" type="text" id="phone_number" name="phone_number">
                        <label for="nameForm">Номер телефона</label>
                    </div>

                    <h3 class="fs-5">Список должностей</h3>
                    <select id="post_id" name="post_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите должность" data-size="10" data-width="100%"
                            data-live-search="true">
                        <div class="form-select">
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->name }}</option>
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
                    <h3 class="fs-5">Список ролей</h3>
                    <select id="role" name="role" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите роль" data-size="10" data-width="100%">
                        <div class="form-select">
                            @foreach($roles as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
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
