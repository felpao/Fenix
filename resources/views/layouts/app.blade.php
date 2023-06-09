<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('usuario.index') }}" class="nav-link">Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('setor.index') }}" class="nav-link">Setor</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('insumo.index') }}" class="nav-link">Insumos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('saidainsumo.index') }}" class="nav-link">Saida de Insumos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('compra.index') }}" class="nav-link">Compras</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('desccompras.index') }}" class="nav-link">Descrição das Compras</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('equipamento.index') }}" class="nav-link">Equipamentos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('saidaequipamento.index') }}" class="nav-link">Saida de Equipamento</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('fornecedor.index') }}" class="nav-link">Fornecedor</a>
                            </li>

                        @endauth
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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
    <div class="animated-word">
        <div class="letra">F</div>
        <div class="letra">E</div>
        <div class="letra">N</div>
        <div class="letra">I</div>
        <div class="letra">X</div>

        <style>
            .animated-word {
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 300%;
            }

            .letra {
                transition: 0.4s;
                transform: translatex(0);
                cursor: grab;
                color: #000000;
            }

            .letra:hover {
                transform: translatey(-1rem);
                background: -webkit-linear-gradient(120deg, hsl(19, 90%, 52%), hsl(56, 100%, 50%));
                -webkit-background-clip: text;
                -webkit-text-fill-color:transparent;
            }
        </style>




    </div>

    <!-- JS -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.js"></script>


@yield('scripts')

</body>

</html>
