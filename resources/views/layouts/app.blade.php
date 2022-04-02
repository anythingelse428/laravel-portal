<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ИТмарафон') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/cust.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
    @stack('head')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">


</head>

<body>
    <div id="app">
        <nav class="navbar  navbar-expand-md  shadow">
            <div class="container collapse navbar-collapse">
                <a class="navbar-brand navbar-brand--color" href="{{ url('/') }}">
                    <div class="d-flex align-items-center"> <b class="text-success"><i
                                class="bi bi-bug-fill bug-size"></i></b>ИТМАРАФОН
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <i class="bi bi-grid text-light"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-normal Oauth-color"
                                        href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fw-normal Oauth-color"
                                        href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle  Oauth-color" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="bg-drop dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item  text-light" href="{{ route('home') }}">
                                        В личный кабинет
                                    </a>
                                    <a class="dropdown-item  text-light" href="/">
                                        На главную
                                    </a>
                                    <a class="dropdown-item text-light" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                        <li class="nav-item theme-toggle__holder">

                            <i onclick="theme.toggle()" class="bi theme-toggle"></i>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>


        <main class="py-4">
            @yield('content')


        </main>


        <div class="mt-5 pt-5 pb-5 footer" style="background: #161e2852;">
            <div class="container">
                <div class="row text-light ">
                    <div class="col-lg-5 col-xs-12 about-company">
                        <h2>Наши партнеры</h2>
                        <a href="http://atr73.ru">
                            <img src="http://atr73.ru/wp-content/uploads/2019/10/Untitled-2.png" width="150"
                                class="mb-2">
                        </a>
                        <br>
                        <a href="http://intelsi.ru">
                            <img src="http://intelsi.ru/images/logo_01-02.svg?crc=4214952120" width="150"
                                class="mb-2">
                        </a>
                        <br>
                        <a href="https://www.simbirsoft.com">
                            <img src="https://www.simbirsoft.com/local/templates/.default/img/ss-logo-symbol-blue-216-54.png"
                                width="150" class="mb-2">
                        </a>
                        <br>
                        <a href="https://ibs.ru/">
                            <img src="https://ibs.ru/local/templates/ibs-redesign/assets/images/ibs-logo.svg"
                                width="50">
                        </a>
                        <br>
                    </div>

                    <div class="col-lg-3 col-xs-12 links">
                        <h4 class="mt-lg-0 mt-sm-3">Контакты</h4>
                        <p>Мардамшина Анна Александровна</p>
                        <a class="lead " href="tel:+79603757217"><i
                                class="bi bi-telephone me-2"></i>+79603757217</a>
                        <br> <a class="lead " href="mailto:mardamshinaa@bk.ru"><i
                                class="bi bi-envelope me-2"></i>mardamshinaa@bk.ru</a>
                        <br>
                    </div>

                    <div class="col-lg-4 col-xs-12 location">
                        <h4 class="mt-lg-0 mt-sm-4">Мы в социальных сетях</h4>
                        <div class="d-flex flex-row">
                            <a href="https://vk.com/uaviakmck" class="d-flex flex-column">
                                <div class="vkIco text-center">VK</div>
                            </a>
                            <br>
                            <a href="https://www.instagram.com/uaviak_73/" class="d-flex flex-column">
                                <i class="bi bi-instagram mx-2 display-4"></i>
                            </a>
                            <br>
                            <a href="https://uaviak.ru/" class="d-flex flex-column">
                                <i class="bi bi-globe2 display-4"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col copyright">
                        <p><small class="text-white-50">© 2021. All Rights Reserved.</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    </div>
</body>

</html>
