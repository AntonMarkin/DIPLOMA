<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-select.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('/assets/css/bootstrap-select.css') }}"/>
    <style>
        .custom-tooltip {
            --bs-tooltip-bg: var(--bs-secondary);
            --bs-tooltip-color: var(--bs-light);
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                На главную
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav me-auto">
                            @if (Auth::user()->role == 'technician')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users-requests') }}">Запросы пользователей</a>
                                </li>

                            @elseif(Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users-requests') }}">Запросы пользователей</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        Admin
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.departments') }}">Отделы</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.offices') }}">Кабинеты</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.posts') }}">Должности</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.users') }}">Пользователи</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.equipment-types') }}">Типы
                                                оборудования</a></li>
                                        <li><a class="dropdown-item"
                                               href="{{ route('admin.equipment') }}">Оборудование</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>

                    @endauth
                <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile', ['user' => Auth::id()]) }}">
                                    Профиль
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </li>
                    </ul>
                    @endguest
            </div>
        </div>
    </nav>


    <main class="pt-4">
        @yield('content')
    </main>
</div>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    const myModal = document.getElementById('myModal');
    const myInput = document.getElementById('myInput');

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus();
    })

    function showInfo(element, id) {
        var modal = new bootstrap.Modal('#' + element + id);
        modal.show();
    }

    function showForm(element) {
        var form = new bootstrap.Modal('#' + element)
        form.show();
    }


    //если приспичит то на ажаксе сделаю
    //function submitRequest() {
    //    var equipment = [];
    //    $('#equipment').each(function(i) {
    //        if (this.selected == true) {
    //            equipment.push(this.value);
    //        }
    //    });
    //    console.log(equipment);
    //}
</script>
</body>
</html>
