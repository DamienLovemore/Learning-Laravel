@props(["active" => false, "type" => "a"])

@php
    $ativo      = "bg-indigo-900 text-white";
    $inativo    = "text-gray-300 hover:bg-gray-700 hover:text-pink-100";
@endphp

@if ($type === "a")
    <a
        {{$attributes}}
        class="{{ $active ? $ativo : $inativo }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? "page" : "false" }}"
    >
    {{$slot}}
    </a>
@elseif ($type === "button")
    <button
        class="{{ $active ? $ativo : $inativo }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? "page" : "false" }}"
    >
    {{$slot}}
    </button>
@endif
