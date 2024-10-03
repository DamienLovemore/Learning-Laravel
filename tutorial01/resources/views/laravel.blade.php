<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <title>Laravel Tutorial</title>

        <meta charset="utf-8">
        <meta name="author" content="Damien Lovemore">
        <meta name="description"content="The index page of our first laravel tutorial">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style type="text/tailwindcss">

        </style>
    </head>

    <body>
        <h2>Laravel Tutorial</h2>
        <p>Welcome to Laravel tutorial</p>
        <br/>

        <pre>Good to see you again, <strong>{{ $name }}</strong>.</pre>
    </body>
</html>