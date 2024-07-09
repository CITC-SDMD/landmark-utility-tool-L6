<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>


    <body class="bg-slate-200 text-slate-900 min-h-screen flex flex-col">
        <header class="bg-slate-800 shadow-lg">
            <nav>
                <a href="{{ route ('home') }}" class="nav-text"><b>Landmark Legislation Utility Tool</b></a>

                <div class="flex items-center gap-4">
                
                    @auth
                        <a href="{{ route ('add') }}" class="nav-link">Add Landmark Ordinance</a>
                        <a href="{{ route ('logout') }}" class="nav-link">Logout</a>
                    @endauth
                    @guest
                        <a href="{{ route ('login') }}" class="nav-link">Login</a>
                    @endguest

                </div>
            </nav>
        </header>
        <main class="py-8 px-4 mx-auto flex-grow w-full">
            <div class = 'body-container'>
                {{ $slot }}
            </div>
        </main>
    </body>


    <footer class="bg-white dark:bg-slate-800">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
          <hr class="my-6 border-slate-200 sm:mx-auto dark:border-slate-600 lg:my-8" />
          <div class="sm:flex sm:items-center sm:justify-between">
              <span class="text-sm text-slate-400 sm:text-center dark:text-slate-400">© 2024 Sangguniang Panlungsod - IT Team</a>. All Rights Reserved.
              </span>
          </div>
        </div>
    </footer>
</html>