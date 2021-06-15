<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App Name - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container mt-5">
            @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    {{Session::get('success')}}
                </div>
            @endif

            @yield('content')
        </div>
    </body>
</html>
