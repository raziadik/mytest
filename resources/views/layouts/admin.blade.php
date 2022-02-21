<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles admin panel -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/my.css') }}" rel="stylesheet">--}}

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
<header class="navbar navbar-dark sticky-top bg-dark ">
    <a class="navbar-brand col-md-3 col-lg-2 text-center m-0" href="#">АДМИН</a>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button style="width: 50px" type="button" class="btn btn-info">{{DB::table('contact_profile')->count()}}</button>
        <button style="width: 50px" type="button" class="btn btn-success">{{\App\Models\User::where('status',1)->count()}}</button>
        <button style="width: 50px" type="button" class="btn btn-secondary">{{\App\Models\User::where('status',0)->count()}}</button>
        <button style="width: 50px" type="button" class="btn btn-warning">{{\App\Models\User::where('status',2)->count()}}</button>
        <button style="width: 50px" type="button" class="btn btn-primary">{{\App\Models\User::count()}}</button>
    </div>

    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

<div class="container-fluid mt-2">
    <nav id="sidebarMenu" class="col-md-4 col-lg-3 col-xl-2 d-md-block sidebar collapse" style="background-color: #cccccc">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <span data-feather="users"></span>
                        Пользователи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search') }}">
                        <span data-feather="users"></span>
                        Продвинутый поиск
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('searchContacts') }}">
                        <span data-feather="users"></span>
                        Поиск по контактам
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.cutaway.contacts.index') }}">
                        <span data-feather="plus-square"></span>
                        Контакты
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ route("permissions.index") }}">
                        <span data-feather="plus-square"></span>
                        Доступы
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("roles.index") }}">
                        <span data-feather="plus-square"></span>
                        Роли
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <span data-feather="layers"></span>
                        Сайт
                    </a>
                </li>
                <div class="navbar-nav">
                    <div class="nav-item text-nowrap">
                        <a class="nav-link px-3" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                            Выход
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </ul>
        </div>
        <br>
        <br>
        <div class="text-center mt-8">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
        <div class="text-center">Версия v2.0.0</div>
    </nav>
</div>

<main class="col-md-8 ms-sm-auto col-lg-9 col-xl-10 px-md-2">
    @yield('content')
</main>

<!-- Scripts -->
<script src="{{ asset('js/dashboard.js') }}" defer></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>

@if(\Route::currentRouteName()!=='search')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endif
</body>
</html>
