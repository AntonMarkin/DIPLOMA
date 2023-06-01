@extends('layouts.app')

@section('title', 'Запросы пользователей')

@section('content')
    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
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
                            data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
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
        </div>
    </div>
@endsection
