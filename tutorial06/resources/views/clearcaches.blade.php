<!DOCTYPE html>
<html class="dark" lang="{{ str_replace("_","-", app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="{{ asset("favicon.png") }}" sizes="32x32">
        <title>{{ __("Clear Caches") }}</title>

        <!-- CDN Imports -->
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </head>

    <body class="bg-secondary text-white">
        <div class="mw-100 mx-auto m-1 p-3">
            <h1 class="mb-4 p-4 border border-light-subtle rounded shadow">{{ __('Laravel cache was cleared sucessfully!') }}</h1>
            <a type="menu" class="d-inline-block h-25 text-white bg-primary focus-ring focus-ring-light rounded-2 text-decoration-none text-sm px-5 py-2.5 me-2 mb-2 h-20" href="/">{{ __("Home") }}</a>
        </div>
    </body>
</html>
