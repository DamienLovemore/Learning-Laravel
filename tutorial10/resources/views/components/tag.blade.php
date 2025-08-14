@props(["size" => "base"])

@php
    $classes = "bg-white/10 hover:bg-white/20 px-3 py-1 rounded-xl text-2xs font-bold transition-colors duration-300";

    if($size === "base")
    
@endphp

<a href="#" class="bg-white/10 hover:bg-white/20 px-3 py-1 rounded-xl text-2xs font-bold transition-colors duration-300">{{ $slot }}</a>
