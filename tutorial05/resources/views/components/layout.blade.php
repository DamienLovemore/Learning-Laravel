<!DOCTYPE html>
<html class="dark" lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="{{ asset("favicon.png") }}" sizes="32x32">
        <title>{{ __("Posts") }}</title>

        @vite(["resources/css/app.css", "resources/js/app.js"])
        <script async>
            const assetFolder = "{{ asset('/') }}";
        </script>
        <script src="{{ asset("js/layout.js") }}" defer></script>
    </head>

    <body class="bg-white dark:bg-gray-900 text-black dark:text-white ">
       <x-navbar />

        <div class="max-w-7xl mx-auto">
            {{ $pageContent }}
        </div>
    </body>
</html>