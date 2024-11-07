<!DOCTYPE html>
@php
    $language = session("language") ?? str_replace("_", "-", app()->getLocale());
@endphp
<html class="dark" lang="{{ $language }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="{{ asset("favicon.ico") }}" sizes="32x32">
        <title>{{ __("Clear Caches") }}</title>

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="bg-white dark:bg-gray-900 text-black dark:text-white">
        <div class="max-w-screen-xl mx-auto">
            <h1>{{ __("Laravel cache was cleared succesfully!") }}</h1>
        </div>
    </body>
</html>
