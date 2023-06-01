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
                    @if($request->technician)
                        <p>Специалист: <i>{{ $request->technician->login }}</i></p>
                        <hr>
                    @endif
                    @include('admin.infos.statuses')
                @else

                    @if($request->status_id == 5)
                        <div class="d-flex align-items-center gap-2"><span
                                class="d-inline-block {{ $request->status->style }} "></span>{{ $request->status->name }}
                            по причине:
                        </div>
                        <textarea name="comment" class="mt-2 border-2 form-control"
                                  style="background-color: rgba(43,48,53,0.94); resize: none"
                                  readonly
                                  rows="2">{{ $request->comment }}</textarea>
                    @else
                        <div class="d-flex align-items-center gap-2"><span
                                class="d-inline-block {{ $request->status->style }} "></span>{{ $request->status->name }}
                        </div>
                    @endif

                @endif
                <form id="delete-form{{ $i }}" action="{{ route('delete-request', ['request' => $request->id]) }}">
                    @csrf
                </form>
                <hr>
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
            @if($request->status_id != 4)
                <div class="modal-footer">
                    @if (request()->segment(2) == 'requests')
                        <button type="button" onclick="event.preventDefault();
                            document.getElementById('delete-form{{ $i }}').submit()"
                                class="btn btn-danger form-control">Удалить запрос
                        </button>
                    @else

                        <button type="button" onclick="event.preventDefault();
                            document.getElementById('delete-form{{ $i }}').submit()"
                                class="btn btn-outline-danger form-control">Отменить
                        </button>

                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="rejectFormModal{{ $i }}" aria-hidden="true" aria-labelledby="deleteLabel{{ $i }}"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteLabel{{ $i }}">Отклонение запроса</h1>
                <button type="button" class="btn btn-primary" data-bs-target="#reqInfo{{ $i }}" data-bs-toggle="modal">
                    Назад
                </button>
            </div>
            <div class="modal-body">
                <form id="reject-form{{ $i }}" action="{{ route('reject-request', ['request' => $i]) }}">
                    @csrf
                    <textarea name="comment" class="border-2 form-control"
                              style="background-color: rgba(43,48,53,0.94); resize: none"
                              placeholder="Причина..."
                              rows="3"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" onclick="event.preventDefault();
                    document.getElementById('reject-form{{ $i }}').submit()">Отправить
                </button>
            </div>
        </div>
    </div>
</div>

