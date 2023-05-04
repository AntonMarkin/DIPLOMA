@extends('layouts.app')

@section('title', 'Запросы пользователей')

@section('content')
    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Название</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Дата и время подачи</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                        <tr onclick="showRequestInfo({{ $request->id }})" data-bs-toggle="tooltip"
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
                                    class="d-flex align-items-center">{{ $request->created_at }}</div>
                            </td>
                        </tr>
                        @include('request_info', ['i' => $request->id, 'statuses' => $statuses])
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
