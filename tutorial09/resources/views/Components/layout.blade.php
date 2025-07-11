<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ __("Home Page") }}</title>
    </head>

    <body>
        @php
            $path = Request::path();
        @endphp

        <nav>
            <a href="{{($path === '/') ? '#' : '/'}}">{{ __("Home") }}</a>
            <a href="{{($path === 'about' ? '#' : '/about')}}">{{ __("About") }}</a>
            <a href="{{($path === 'contact' ? '#' : '/contact')}}">{{ __("Contact") }}</a>
        </nav>

        {{ $slot }}
    </body>
</html>
