<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('People Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold pb-5"><span class="text-green-700 font-extrabold text-lg">{{ __('Create')}} </span>{{ __('a new person') }}</h3>

                    <form action="{{ route("person.store") }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                            <span class="sm:col-span-3">
                                <label class="block" for="firstname">{{ __("First name") }}</label>
                                <input class="block w-full text-black text-black" type="text" name="firstname" id="firstname" value="{{ old("firstname") }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="lastname">{{ __("Last name") }}</label>
                                <input class="block w-full text-black" type="text" name="lastname" id="lastname" value="{{ old("lastname") }}">
                            </span>

                            <span class="sm:col-span-3">
                                <label class="block" for="email">{{ __("Email") }}</label>
                                <input class="block w-full text-black" type="text" name="email" id="email" value="{{ old("email") }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="phone">{{ __("Phone") }}</label>
                                <input class="block w-full text-black" type="text" name="phone" id="phone" value="{{ old("phone") }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="business">{{ __("Business") }}</label>
                                <select class="block w-full text-black" name="business_id" id="business_id">
                                    <option value="">{{ __(" (No Business) ") }}</option>
                                    @foreach ($businesses as $business)
                                        <option value="{{ $business['id'] }}" @selected($business["id"] == old("business_id"))>{{ $business["business_name"] }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>

                        <div class="mt-8 flex items-center justify-end gap-x-6">
                            <a class="hover:text-black" href="{{ route("person.index") }}">{{ __("Cancel") }}</a>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-full hover:bg-green-900" type="submit">{{ __("Save") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
