<nav class="border-2 border-gray-400 dark:border-sky-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="absolute top-0 left-0 w-auto h-auto m-1" onclick="togglePageLanguage()">
            <img id="toggle-Language">
        </div>

        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset("favicon.png") }}" class="h-8" alt="{{ config('app.name') }} Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ __("Posts") }}</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">{{ __('Open main menu') }}</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-column p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-slate-300 dark:bg-gray-800 md:dark:bg-gray-700 dark:border-gray-700">
                <x-navbar-link href="/" :active="request()->is('/')">Home</x-navbar-link><!-- website -->
                <x-navbar-link href="{{ route('posts.index') }}" :active="request()->is('posts')">Posts</x-navbar-link><!-- website/posts -->
                @if (Auth::check() && Auth::user()->is_admin)
                    <x-navbar-link href="{{ route('admin') }}" :active="request()->is('admin')">Admin</x-navbar-link>
                @endif
                @guest
                    <x-navbar-link href="{{ route('login') }}" :active="request()->is('login')">Login</x-navbar-link><!-- website/login -->
                    <x-navbar-link href="{{ route('register') }}" :active="request()->is('register')">Register</x-navbar-link><!-- website/register -->
                @endguest
                @auth
                    @php
                        //Pega as primeiras 3 palavras
                        $username = Str::words(Auth::user()->name, 3);

                        //Se ainda assim ficou grande, limita a aparecer 18 caracteres apenas
                        if (mb_strlen($username) > 18)
                            $username = Str::of($username)->take(15) . "...";
                    @endphp
                    <span class="text-blue-600 dark:text-blue-400 font-semibold">{{ $username }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <x-navbar-link href="{{ route('logout') }}" :active="request()->is('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-navbar-link><!-- website/logout -->
                    </form>
                @endauth

                <div class="!ml-12 !pl-12 w-auto relative bottom-4" onclick="togglePageTheme()">
                    <img id="toggle-DarkMode" class="w-auto h-auto" alt="{{ __("Toggle Dark Theme") }}">
                </div>
            </ul>
        </div>
    </div>
</nav>
