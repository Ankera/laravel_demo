<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', '博客')</title>
        @include('layout.style')
    </head>
    <body>
        @include('layout.header')

        <section>
            @yield('content')
        </section>

        @include('layout.footer')
    </body>

    @include('layout.script')
</html>
