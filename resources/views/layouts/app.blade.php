<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel=”shortcut” type=“image/x-icon” href="public/favicon.ico">
    
    <!-- Inclusão do CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Icones do open iconic -->
    <link href="{{ asset('/icons/font/css/open-iconic-bootstrap.css') }}" rel="stylesheet">

    <!-- Icones do open iconic -->
    <link href="{{ asset('/vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- CSS do Datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Inclusão da Lib do jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Inclusão do JS Bootstrap 5 -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JS do Datatable -->
    <script type="text/javascript" src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    
    <!-- JS do SweetAlert -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS do jQuery.form -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    
    <!-- JS do BlockUI -->
    <script type="text/javascript" src="//malsup.github.io/jquery.blockUI.js"></script>

    <!-- JS do Mask -->
    <script type="text/javascript" src="{{ asset('/vendor/jquery-mask/jquery.mask.min.js') }}"></script>

    <!-- JS jQuery UI -->
    <script type="text/javascript" src="{{ asset('/vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-info fw-bold" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if(Auth::check())
                            <li class="nav-item me-2">
                                <a class="nav-link text-white" aria-current="page" href="{{ url('/') }}">
                                    <span class="oi oi-home"></span>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown me-2">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="oi oi-document me-1"></span> Cadastros
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('clientes') }}">Clientes</a></li>
                                    <li><a class="dropdown-item" href="{{ route('produtos') }}">Produtos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link text-white" href="{{ route('registrarVenda') }}">
                                    <span class="oi oi-pencil me-1"></span>
                                    Registrar Venda
                                </a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link text-white" href="{{route('relatorioVenda')}}">
                                    <span class="oi oi-graph me-1"></span>
                                    Relatório
                                </a>
                            </li>
                        @endif
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('jsPagina')
</body>
</html>
