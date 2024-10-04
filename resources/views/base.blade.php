<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} - @yield('title') </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!--  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

        <link rel="stylesheet" href="{{ asset('assets/app.css') }}">

    </head>
    <body id="root">

        {{--Barre de navigation--}}
        @include('navbar/navbar')

        {{--Tous nos contenus seront affiché ici --}}
        @yield('content')
        <footer class="footer bg-light py-3 mt-5">
        <div class="container text-center">
            <span class="text-muted">&copy; {{ date('2024') }} MonMemoire. Tous droits réservés.</span>
        </div>
        </footer>
        {{--Nos scripts javascript--}}
        @include('script')
    </body>
</html>
