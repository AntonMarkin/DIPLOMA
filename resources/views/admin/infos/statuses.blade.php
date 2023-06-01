<div class="row">
    @if($request->status_id == 1)
        <form action="{{ route('start-work', ['request' => $i]) }}">
            @csrf
            <button class="btn btn-outline-warning my-1" type="submit">Принять в работу
            </button>
        </form>
    @elseif($request->status_id == 2)
        <form action="{{ route('success-work', ['request' => $i]) }}">
            @csrf
            <button class="btn btn-outline-success my-1" type="submit">Завершить работу
            </button>
        </form>
    @endif
        @if($request->status_id == 5)
        <div class="d-flex align-items-center gap-2"><span
                class="d-inline-block {{ $request->status->style }} "></span>{{ $request->status->name }} по причине:
        </div>
        <textarea name="comment" class="mt-2 border-2 form-control"
                  style="background-color: rgba(43,48,53,0.94); resize: none"
                  readonly
                  rows="2">{{ $request->comment }}</textarea>
    @elseif($request->status_id != 3 && $request->status_id != 4)
        <button class="btn btn-outline-danger my-1" data-bs-target="#rejectFormModal{{ $i }}" data-bs-toggle="modal">
            Отклонить
            запрос
        </button>
    @else
        <div class="d-flex align-items-center gap-2"><span
                class="d-inline-block {{ $request->status->style }} "></span>{{ $request->status->name }}
        </div>
    @endif
</div>
