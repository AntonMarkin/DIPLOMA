@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')

    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <h2>Пользователи</h2>
                <hr>
                <button onclick="showForm('userForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новый
                    пользователь
                </button>
            </div>
            @include('admin.forms.user_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.users') }}">№</a></th>
                    <th scope="col">@sortablelink('login', 'Логин')</th>
                    <th scope="col">@sortablelink('name', 'Имя')</th>
                    <th scope="col">@sortablelink('surname', 'Фамилия')</th>
                    <th scope="col">@sortablelink('post_id', 'Должность')</th>
                    <th scope="col">@sortablelink('office_id', 'Кабинет')</th>
                    <th scope="col">@sortablelink('role', 'Роль')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время регистрации')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr onclick="showInfo('userInfo', {{ $user->id }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $user->id }}</div>
                        </th>
                        <td>
                            <div class="d-flex align-items-center">{{ $user->login }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $user->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $user->surname }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $user->post->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $user->office->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $user->role }}</div>
                        </td>
                        <td>
                            <div
                                class="d-flex align-items-center">{{ $user->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.user_info')
                @endforeach
                </tbody>
            </table>
            {{ $users->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
