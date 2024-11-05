<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __("Posts") }}</title>
    </head>

    <body>
        <h1>{{ __("Posts Index Page") }}</h1>

        <div>
            {{ __("My name is") . " " . $username . " " . __("and my age is") . " " . $age }}
        </div>
        <ul>
        @foreach ($posts as $post)
            <li>{{ __(Str::substr($post, 0, Str::length($post) - 2)) . " " . explode(" ", $post)[1] }}</li>
        @endforeach
        </ul><br>

        {{ __("Today's Date")}}: {{ date("d-m-Y") }}
    </body>
</html>
