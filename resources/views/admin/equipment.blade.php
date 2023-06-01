@extends('layouts.app')

@section('title', 'Оборудование')

@section('content')

    <div class="container vh-100 shadow ">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <h2>Оборудование</h2>
                <hr>
                <button onclick="showForm('equipForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новое оборудование
                </button>
            </div>
            @include('admin.forms.equipment_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.equipment') }}">№</a></th>
                    <th scope="col">@sortablelink('name', 'Название')</th>
                    <th scope="col">@sortablelink('equipment_type_id', 'Тип оборудования')</th>
                    <th scope="col">@sortablelink('office_id', 'Кабинет')</th>
                    <th scope="col">@sortablelink('is_deleted', 'Удалено')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время добавления')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipment as $equip)
                    <tr onclick="showInfo('equipInfo' ,{{ $equip->id }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $equip->id }}</div>
                        </th>
                        <td>
                            <div class="d-flex align-items-center">{{ $equip->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $equip->type->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">{{ $equip->office->name }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">@if($equip->is_deleted) да@else нет@endif</div>
                        </td>
                        <td>
                            <div
                                class="d-flex align-items-center">{{ $equip->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.equipment_info')
                @endforeach
                </tbody>
            </table>
            {{ $equipment->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
