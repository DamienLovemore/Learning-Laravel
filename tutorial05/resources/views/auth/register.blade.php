<x-layout>
    <x-slot:pageContent>
        <x-header>Register User Page</x-header>
        <x-pagebuttons href="/" />

        <div class="max-w-2xl mx-auto p-4 bg-slate-300 dark:bg-slate-800 max-h-fit">
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Name") }}</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-300 dark:border-red-600 @enderror" id="name" name="name" required minlength="10" maxlength="100" pattern="^[a-zA-Z]+(\s+[a-zA-Z]+)+$" title="{{ __('Type your name') }}" value="{{ old('name') }}">
                    @error("name")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("E-Mail Address") }}</label>
                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-300 dark:border-red-600 @enderror" id="email" name="email" required minlength="7" maxlength="254" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="{{ __('Type your email address') }}" value="{{ old('email') }}">
                    @error("email")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Password") }}</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-300 dark:border-red-600 @enderror" id="email" name="email" required minlength="3" maxlength="50" value="{{ old('password') }}">
                    @error("password")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Password Confirmation") }}</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_confirmation') border-red-300 dark:border-red-600 @enderror" id="email" name="email" required minlength="3" maxlength="50" value="{{ old('password_confirmation') }}">
                    @error("password_confirmation")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __("Save") }}</button>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>
