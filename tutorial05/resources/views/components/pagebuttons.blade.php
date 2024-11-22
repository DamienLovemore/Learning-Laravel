<article class="mt-2 mb-3">
    <div class="flex flex-row inline-block">
        <div class="max-w-fit">
            @php
                $href = $attributes["href"];

                if(session("showPostsFrom", "posts") === "admin" && ($href === route("posts.index")))
                    $href = route("admin");
            @endphp

            <a href="{{ $href }}" {{ $attributes->except("href") }} class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-sky-700 dark:bg-sky-600 rounded-lg hover:bg-sky-800 dark:hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 h-10">
                <svg class="rotate-180 rtl:rotate-0 w-3.5 h-3.5 ms-2 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
                {{ __("Back") }}
            </a>
        </div>

        {{ $slot }}
    </div>
</article>
