@extends('layouts.app')

@section('title', 'Отделы')

@section('content')

    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <h2>Отделы</h2>
                <hr>
                <button onclick="showForm('depForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новый
                    отдел
                </button>
            </div>
            @include('admin.forms.department_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.departments') }}">№</a></th>
                    <th scope="col">@sortablelink('name', 'Название')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время добавления')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr onclick="showInfo('depInfo' ,{{ $department->id }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $department->id }}</div>
                        </th>
                        <td>
                            <div class="d-flex align-items-center">{{ $department->name }}</div>
                        </td>
                        <td>
                            <div
                                class="d-flex align-items-center">{{ $department->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.department_info', ['i' => $department->id])
                @endforeach
                </tbody>
            </table>
            {{ $departments->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
