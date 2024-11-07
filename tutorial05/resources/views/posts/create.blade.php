<x-layout>
    <x-slot:pageContent>
        <h1>{{ __("Posts Create Page") }}</h1>
        <div class="max-w-2xl mx-auto p-4">
            <form action="" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Title") }}</label>
                    <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Message") }}</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Type your message here') }}"></textarea>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>
