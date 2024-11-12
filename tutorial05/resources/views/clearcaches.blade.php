<!DOCTYPE html>
@php
    $sessionLang = str_replace("_", "-", session("language", ""));
    $language = (mb_strlen($sessionLang) > 0) ? $sessionLang : str_replace("_", "-", app()->getLocale());
@endphp
<html class="dark" lang="{{ $language }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="{{ asset("favicon.png") }}" sizes="32x32">
        <title>{{ __("Clear Caches") }}</title>

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="bg-white dark:bg-gray-900 text-black dark:text-white">
        <div class="max-w-screen-xl mx-auto m-1 p-3">
            <h1 class="mb-4 p-4 bg-slate-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow">{{ __("Laravel cache was cleared succesfully!") }}</h1>
            <a type="menu" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="/">{{ __("Home") }}</a>
        </div>
    </body>
</html>
