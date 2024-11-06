<x-layout>
    <x-slot:pageContent>
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
    </x-slot>
</x-layout>
