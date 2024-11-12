<x-layout>
    <x-slot:pageContent>
        <x-header>Posts Show Page</x-header>
        <x-messages />

        <article class="mt-2">
            <div class="flex justify-end">
                <a href="{{ route('posts.edit', $post) }}" class="text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">{{ __("Edit") }}</a>
            </div>
        </article>

        <div class="m-4 p-6 bg-slate-300 dark:bg-slate-800">
            <main>
                <div class="mx-auto text-center">
                    <div class="max-w-full p-6 bg-slate-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow">
                        <a href="{{ route("posts.show", $post->id) }}">
                            <h5 class="mb-2 text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                        </a>
                        <pre class="mb-3 text-lg font-normal text-balance text-gray-700 dark:text-gray-400">{{ $post->content }}</pre>
                    </div>
                </div><br>
            </main>
        </div>
    </x-slot>
</x-layout>
