<x-layout>
    <x-slot:pageContent>
        <x-header>Register User Page</x-header>
        <x-pagebuttons href="/" />

        <div class="max-w-2xl mx-auto p-4 bg-slate-300 dark:bg-slate-800 max-h-fit">
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Name") }}</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-300 dark:border-red-600 @enderror" id="name" name="name" required minlength="10" maxlength="100" pattern="^[a-zA-ZwáéíóúâêîôûãõçÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]+(\s+[a-zA-ZwáéíóúâêîôûãõçÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]+)+$" title="{{ __('Type your name') }}" value="{{ old('name') }}">
                    @error("name")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("E-Mail Address") }}</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-300 dark:border-red-600 @enderror" id="email" name="email" required minlength="7" maxlength="254" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="{{ __('Type your email address') }}" value="{{ old('email') }}">
                    @error("email")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Password") }}</label>
                    <div class="flex flex-row">
                        <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-11/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_confirmation') border-red-300 dark:border-red-600 @enderror" id="password" name="password" required minlength="8" maxlength="35">
                        <div class="relative left-2 w-1/12" id="containerPassSH">
                            <svg class="w-auto h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" identifier="passSH">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                                <g id="SVGRepo_iconCarrier">
                                    <path id="pass_sh" d="" fill="#000000" identifier="passSH"/>
                                </g>
                            </svg>
                        </div>
                    </div>

                    @error("password")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Password Confirmation") }}</label>
                    <div class="flex flex-row" id="containerPassConfSH">
                        <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-11/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_confirmation') border-red-300 dark:border-red-600 @enderror" id="password_confirmation" name="password_confirmation" required minlength="8" maxlength="35">
                        <div class="relative left-2 w-1/12">
                            <svg class="w-auto h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" identifier="passSHConf">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                                <g id="SVGRepo_iconCarrier">
                                    <path id="pass_conf_sh" d="" fill="#000000" identifier="passSHConf"/>
                                </g>
                            </svg>
                        </div>
                    </div>

                    @error("password_confirmation")
                        <span class="text-red-800 dark:text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">{{ __("Save") }}</button>
                </div>
            </form>
        </div>
        <script>
            const EYE_CLOSED = "{{ CSS::PATH_D_EYE_CLOSED }}";
            const EYE_OPENED = "{{ CSS::PATH_D_EYE_OPENED }}";
        </script>
        <script src="{{ asset("js/register.js") }}"></script>
    </x-slot>
</x-layout>
