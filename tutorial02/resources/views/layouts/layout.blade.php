<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <title>Aplicação CRUD no Laravel</title>

        <meta charset="utf-8">
        <meta name="author" content="Damien Lovemore">
        <meta name="description"content="Meu layout para o meu primeiro projeto 'CRUD'.">

        <meta name="viewport"content="width=device-width, initial-scale=1.0;">

        <!-- Fonts !-->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" />
        <script src="https://cdn.tailwindcss.com"></script>

        <style type="text/tailwindcss">
            @yield("style");
        </style>
    </head>

    <body>
        <div class="container">
            @yield("content");
        </div>
    </body>
</html>