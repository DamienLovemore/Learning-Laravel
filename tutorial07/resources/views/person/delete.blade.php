<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('People Erasing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 border border-red-300 rounded-lg">
                    <h3 class="font-semibold pb-5"><span class="text-red-700 font-extrabold text-lg">{{ __('Delete')}}</span> {{ __('a person')}}: <span class="hover:text-lg">{{ $person->firstname }} {{ $person->lastname }}</span></h3>

                    <form action="{{ route("person.destroy", $person->id) }}" method="POST">
                        @csrf
                        @method("DELETE")

                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                            <span class="sm:col-span-3">
                                <label class="block" for="firstname">{{ __("First name") }}</label>
                                <input class="block w-full text-black text-black" type="text" name="firstname" id="firstname" value="{{ $person->firstname }}" disabled>
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="lastname">{{ __("Last name") }}</label>
                                <input class="block w-full text-black" type="text" name="lastname" id="lastname" value="{{ $person->lastname }}" disabled>
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="email">{{ __("Email") }}</label>
                                <input class="block w-full text-black" type="text" name="email" id="email" value="{{ $person->email }}" disabled>
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="phone">{{ __("Phone") }}</label>
                                <input class="block w-full text-black" type="text" name="phone" id="phone" value="{{ $person->phone }}" disabled>
                            </span>
                        </div>

                        <div class="mt-8 flex items-center justify-end gap-x-6">
                            <a class="hover:text-black" href="{{ route("person.index") }}">{{ __("Cancel") }}</a>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-900" type="submit">{{ __("Delete") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
