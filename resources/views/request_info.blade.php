<div class="modal fade" id="reqInfo{{ $i }}" tabindex="-1" aria-labelledby="modalLabel{{ $i }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="modalLabel{{ $i }}">Запрос
                    №{{ str_pad($request->id, 8, '0', STR_PAD_LEFT) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <h2 class="fs-4">{{ $request->name }}</h2>
                <hr>
                @if(request()->segment(2) == 'requests')
                    <p>{{$request->user->surname}} {{$request->user->name}} {{$request->user->surname}}</p>
                    <hr>
                <form id="status-form{{ $i }}" method="post">
                    @csrf
                    <input type="hidden" name="request_id" value="{{ $i }}">
                    <select name="status_id" class="selectpicker" data-style="btn-outline-light"
                                title="Смена статуса" data-width="100%">
                            @foreach($statuses as $status)
                                <option @if($request->status_id == $status->id) selected @endif value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                </form>
                    <hr>
                @endif
                <p><b>Дата и время подачи запроса:</b> {{ $request->created_at }}</p>
                <hr>
                <h3 class="fs-5">Описание:</h3>
                <textarea class="border-2 form-control" style="background-color: rgba(43,48,53,0.94); resize: none"
                          rows="5" readonly>{{ $request->description }}</textarea>
                <hr>
                <h3 class="fs-5">Список оборудования:</h3>
                <ul class="list-group list-group-flush" style="overflow-y: scroll; max-height: 15rem">
                    @foreach($request->equipment as $equip)
                        <li class="list-group-item">{{ $equip->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                @if (Auth::user()->role == 'technician' || Auth::user()->role == 'admin')
                    <button type="button" onclick="event.preventDefault();
                                                    document.getElementById('status-form{{ $i }}').submit()"
                            class="btn btn-light form-control">Сохранить
                    </button>
                @else
                    <button type="button" onclick="alert('Больше функций в платной подписке')"
                            class="btn btn-light form-control">Редактировать
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
