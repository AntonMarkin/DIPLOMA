@extends('layouts.app')

@section('title', 'Должности')

@section('content')

    <div class="container vh-100 shadow">
        <div class="row justify-content-center">
            <div class="mb-lg-4">
                <h2>Должности</h2>
                <hr>
                <button onclick="showForm('postForm')" class="btn btn-outline-light fw-bold btn-lg form-control">Новая должность
                </button>
            </div>
            @include('admin.forms.post_form')
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><a href="{{ route('admin.posts') }}">№</a></th>
                    <th scope="col">@sortablelink('name', 'Название')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата и время добавления')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr onclick="showInfo('postInfo', {{ $post->id }})" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Кликните, чтобы просмотреть">
                        <th scope="row">
                            <div class="d-flex align-items-center">{{ $post->id }}</div>
                        </th>
                        <td>
                            <div class="d-flex align-items-center">{{ $post->name }}</div>
                        </td>
                        <td>
                            <div
                                class="d-flex align-items-center">{{ $post->created_at->format('h:m d.m.Y ') }}</div>
                        </td>
                    </tr>
                    @include('admin.infos.post_info')
                @endforeach
                </tbody>
            </table>
            {{ $posts->appends(\Request::except('page'))->render() }}

        </div>
    </div>
@endsection
