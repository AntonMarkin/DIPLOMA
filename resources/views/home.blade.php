@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <button onclick="showForm('reqForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новый
                    запрос
                </button>
            </div>
            @include('admin.forms.request_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('home') }}">№</a></th>
                    <th scope="col">@sortablelink('name', 'Название')</th>
                    <th scope="col">@sortablelink('status_id', 'Статус')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время подачи')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr onclick="showInfo('reqInfo' ,{{ ++$i }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $i }}</div>
                        </th>
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
                                class="d-flex align-items-center">{{ $request->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.request_info', ['i' => $i])
                @endforeach
                </tbody>
            </table>
                {{ $requests->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
