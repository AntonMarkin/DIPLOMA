@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <div class="card">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->surname }} {{ $user->name }} {{ $user->patronymic }}</h5>
                        <p class="card-text">Логин: <i>{{ $user->login}}</i></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Номер телефона:</b> <i>{{ $user->phone_number }}</i></li>
                        <li class="list-group-item"><b>Должность:</b> <i>{{ $user->post->name }}</i></li>
                        <li class="list-group-item"><b>Отдел:</b> <i>{{ $user->office->department->name }}</i></li>
                        <li class="list-group-item"><b>Кабинет:</b> <i>{{ $user->office->name }}</i></li>
                    </ul>
                    @if(Auth::user()->role != 'client')
                        <div class="card-footer">
                            <h5 class="card-title">Запросы в работе:</h5>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col"><a href="{{ route('users-requests') }}">№</a></th>
                                    <th scope="col">@sortablelink('user_id', 'Логин')</th>
                                    <th scope="col">@sortablelink('name', 'Название')</th>
                                    <th scope="col">@sortablelink('status_id', 'Статус')</th>
                                    <th scope="col">@sortablelink('created_at', 'Дата подачи')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requests as $request)
                                    <tr onclick="showInfo('reqInfo' ,{{ $request->id }})" data-bs-toggle="tooltip"
                                        data-bs-placement="left"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Кликните, чтобы просмотреть">
                                        <th scope="row">
                                            <div class="d-flex align-items-center">{{ $request->id }}</div>
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-center">{{ $request->user->login }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">{{ $request->name }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2"><span
                                                    class="d-inline-block {{ $request->status->style }} "></span>{{ $request->status->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="d-flex align-items-center">{{ $request->created_at->format('d.m.Y ') }}</div>
                                        </td>
                                    </tr>
                                    @include('admin.infos.request_info', ['i' => $request->id])
                                @endforeach
                                </tbody>
                            </table>
                            {{ $requests->appends(\Request::except('page'))->render() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
