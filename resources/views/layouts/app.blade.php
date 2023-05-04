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
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-select.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet"
          href="{{ asset('/assets/css/bootstrap-select.css') }}"/>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                На главную
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth
                    @if (Auth::user()->role == 'technician')
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users-requests') }}">Запросы пользователей</a>
                            </li>
                        </ul>
                    @elseif(Auth::user()->role == 'admin')
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users-requests') }}">Запросы пользователей</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users') }}">Пользователи</a>
                            </li>
                        </ul>
                @endif
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

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
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

    function showRequestInfo(id) {
        var modal = new bootstrap.Modal('#reqInfo' + id);
        modal.show();
    }

    function showRequestForm() {
        var form = new bootstrap.Modal('#reqForm')
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
