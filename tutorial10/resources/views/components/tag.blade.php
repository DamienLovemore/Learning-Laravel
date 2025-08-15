@props(["tag", "size" => "base", "search" => false])

@php
    $classes = "bg-white/10 hover:bg-white/20 rounded-xl font-bold transition-colors duration-300";

    if($size === "small")
    {
        $classes .= " px-3 py-1 text-2xs";
    }
    else if($size === "base")
    {
        $classes .= " px-5 py-1 text-sm";
    }

    if($search)
        $url = route('tags.jobs', $tag->name);
    else
        $url = route('tags.show', $tag->name);
@endphp

<a href="{{ $url }}" class="{{ $classes }}">{{ $tag->name }}</a>
