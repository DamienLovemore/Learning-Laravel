<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __("Document") }}</title>
    </head>

    <body>
        <h1>{{ __("Hello World") }}</h1>
        <br>

        <form action="/" method="POST">
            @csrf

            <input type="text" name="username" id="">
            <button type="submit">{{ __("Submit") }}</button>
        </form>
        <form action="/100" method="POST">
            @csrf
            @method("PUT")

            <input type="text" name="username" id="">
            <button type="submit">{{ __("Edit") }}</button>
        </form>
        <form action="/1000" method="POST">
            @csrf
            @method("DELETE")

            <button type="submit">{{ __("Delete") }}</button>
        </form>
    </body>
</html>
