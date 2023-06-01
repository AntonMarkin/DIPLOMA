@extends('layouts.app')

@section('title', 'Кабинеты')

@section('content')

    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <h2>Кабинеты</h2>
                <hr>
                <button onclick="showForm('officeForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новый кабинет
                </button>
            </div>
            @include('admin.forms.office_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.offices') }}">№</a></th>
                    <th scope="col">@sortablelink('name', 'Название')</th>
                    <th scope="col">@sortablelink('department_id', 'Отдел')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время добавления')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offices as $office)
                    <tr onclick="showInfo('officeInfo', {{ $office->id }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $office->id }}</div>
                        </th>
                        <td>
                            <div class="d-flex align-items-center">{{ $office->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $office->department->name }}</div>
                        </td>
                        <td>
                            <div
                                class="d-flex align-items-center">{{ $office->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.office_info')
                @endforeach
                </tbody>
            </table>
            {{ $offices->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
