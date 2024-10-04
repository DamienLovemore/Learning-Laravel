<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <title>App Name - @yield("title")</title>

        <meta charset="utf-8">
        <meta name="author"content="Damien Lovemore">
        <meta name="description"content="My first layout in Laravel">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style type="text/tailwindcss">

        </style>
    </head>

    <body>
        @section("sidebar")
            This is the master sidebar
        @show

        <div class="container">
            @yield("content")
        </div>       
    </body>
</html>
