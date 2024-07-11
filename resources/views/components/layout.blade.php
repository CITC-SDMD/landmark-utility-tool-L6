<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Landmark Legislation Utility Tool</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>

    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
                <a class="navbar-brand text-monospace" href="{{ route ('home') }}"><b>Landmark Legislation Utility Tool</b></a>

                <ul class='navbar-nav'>
                    @auth
                        <li class='nav-item'>
                            <a href="{{ route ('add') }}" class="nav-link active">Add Landmark Ordinance</a>
                        </li>
                        <li class='nav-item'>
                            <a href="{{ route ('logout') }}" class="nav-link active">Logout</a>
                        </li>
                    @endauth
                    @guest
                        <li class='nav-item'>
                            <a href="{{ route ('login') }}" class="nav-link active">Login</a>
                        </li>
                    @endguest

                </ul>
            </nav>
        </header>

        <main>
            <div>
                @yield('content')
            </div>
        </main>

        <footer class='justify-content-between align-items-center py-3 my-4 border-top'>
            <div>
                <span>
                © 2024 Sangguniang Panlungsod - IT Team. All Rights Reserved.
                </span>
            </div>
        </footer>
    </body>

</html>