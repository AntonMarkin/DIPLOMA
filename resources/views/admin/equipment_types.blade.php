@extends('layouts.app')

@section('title', 'Типы оборудования')

@section('content')

    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <h2>Типы оборудования</h2>
                <hr>
                <button onclick="showForm('equipTypeForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новый
                    тип оборудования
                </button>
            </div>
            @include('admin.forms.equipment_type_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.equipment-types') }}">№</a></th>
                    <th scope="col">@sortablelink('name', 'Название')</th>
                    <th scope="col">@sortablelink('is_deleted', 'Удалено')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время добавления')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipmentTypes as $type)
                    <tr onclick="showInfo('equipTypeInfo' ,{{ $type->id }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $type->id }}</div>
                        </th>
                        <td>
                            <div class="d-flex align-items-center">{{ $type->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">@if($type->is_deleted) да@else нет@endif</div>
                        </td>
                        <td>
                            <div
                                class="d-flex align-items-center">{{ $type->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.equipment_type_info')
                @endforeach
                </tbody>
            </table>
            {{ $equipmentTypes->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
