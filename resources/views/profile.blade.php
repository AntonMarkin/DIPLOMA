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
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
