<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('People Viewing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                        <span class="sm:col-span-3">
                            <label class="block" for="firstname">{{ __("First name") }}</label>
                            <input class="block w-full text-black text-black" type="text" name="firstname" id="firstname" value="{{ $person->firstname }}" readonly>
                        </span>
                        <span class="sm:col-span-3">
                            <label class="block" for="lastname">{{ __("Last name") }}</label>
                            <input class="block w-full text-black" type="text" name="lastname" id="lastname" value="{{ $person->lastname }}" readonly>
                        </span>

                        <span class="sm:col-span-3">
                            <label class="block" for="email">{{ __("Email") }}</label>
                            <input class="block w-full text-black" type="text" name="email" id="email" value="{{ $person->email }}" readonly>
                        </span>
                        <span class="sm:col-span-3">
                            <label class="block" for="phone">{{ __("Phone") }}</label>
                            <input class="block w-full text-black" type="text" name="phone" id="phone" value="{{ $person->phone }}" readonly>
                        </span>
                    </div>

                    <div class="mt-8 flex items-center justify-end gap-x-6">
                        <a class="hover:text-black" href="{{ route("person.index") }}">{{ __("Back") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
