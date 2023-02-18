<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'LaravelApp') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
        <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
        <style>
            body{text-align:center;}
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <?php
                           // <a href="{{ route('register') }}" class="btn btn-primary ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                             ?>
                           @endif 

                    @endauth
                </div>
            @endif

            Salut! Aceasta este o aplicatie privata, de test. <br>
            Daca nu ati primit user si parola si dreptul de a o folosi <br>
            de la proprietarul site-ului, trebuie sa parasiti imediat acest website!!!<br>
            <br>
            Nota:
            <hr>
            Aplicatia foloseste doar cookie-uri absolut necesare: PHPSESSID.<br>
            Aplicatia este de test si toate datele sunt introduse de proprietarul site-ului.

        </div>
    </body>
</html>
