<x-layout>
    <x-slot:pageContent>
        <x-header>Posts Index Page</x-header>
        <section>
            <div class="flex justify-end">
                <a href="/posts/create" class="text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">{{ __("Create") }}</a>
            </div>
        </section>

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
