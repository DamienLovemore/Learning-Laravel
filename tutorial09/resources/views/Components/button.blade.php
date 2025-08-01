@props(["type" => "link", "target" => ""])
@php
    $defaultCSS     = "relative inline-block items-center px-2 py-2 -ml-px text-sm font-medium text-white-500 bg-indigo border border-indigo-300 rounded-md leading-5 focus:z-10 focus:outline-none focus:ring ring-pink-300 focus:border-pink-300 active:bg-pink-100 active:text-pink-500 transition ease-in-out duration-150 dark:bg-pink-800 dark:border-indigo-600 dark:active:bg-pink-700 dark:focus:border-pink-800 text-white hover:text-black hover:border-indigo-800 text-center";
    $class_css      = $attributes->merge(["class" => $defaultCSS])->get("class");//Adiciona as classes css com a nossa classe, e depois pega só esse valor
@endphp
@if ($type === "link")
    <a class="{{ $class_css }}" href="{{ $attributes->get('href') }}">{{ $slot }}</a>
@else
    <button class="{{ $class_css }}" form="{{ $target }}">{{ $slot }}</button>
@endif
