<div class="modal fade" id="userInfo{{ $user->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $user->id }}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="modalLabel{{ $user->id }}">Пользователь
                    №{{ str_pad($user->id, 8, '0', STR_PAD_LEFT) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" id="edit-form{{ $user->id }}" action="{{ route('admin.edit-user', ['user' => $user->id]) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="login" name="login" value="{{ $user->login }}">
                        <label for="nameForm">Логин</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="name" name="name" value="{{ $user->name }}">
                        <label for="nameForm">Имя</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-5" type="text" id="surname" name="surname"
                               value="{{ $user->surname }}">
                        <label for="nameForm">Фамилия</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-4" type="text" id="patronymic" name="patronymic"
                               value="{{ $user->patronymic }}">
                        <label for="nameForm">Отчество</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input class="form-control fs-4" type="text" id="phone_number" name="phone_number"
                               value="{{ $user->phone_number }}">
                        <label for="nameForm">Номер телефона</label>
                    </div>

                    <h3 class="fs-5">Список должностей</h3>
                    <select id="post_id" name="post_id" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите должность" data-size="10" data-width="100%"
                            data-live-search="true">
                        <div class="form-select">
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}"
                                        @if($user->post_id == $post->id) selected @endif>{{ $post->name }}</option>
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
                                        @if($user->office_id == $office->id) selected @endif>{{ $office->name }}</option>
                            @endforeach
                        </div>
                    </select>
                    @if($user->role != 'admin')
                    <h3 class="fs-5">Список ролей</h3>
                    <select id="role" name="role" class="selectpicker" data-style="btn-outline-light"
                            title="Выберите роль" data-size="10" data-width="100%">
                        <div class="form-select">
                            @foreach($roles as $key => $value)
                                <option value="{{ $key }}"
                                        @if($user->role == $key) selected @endif>{{ $value }}</option>
                            @endforeach
                        </div>
                    </select>
                        @endif
                </form>
            </div>

            <div class="modal-footer">
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="event.preventDefault();
                        document.getElementById('edit-form{{ $user->id }}').submit()"
                            class="btn btn-light form-control">Сохранить
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
