@props(["columns" => "4"])

@php
    mb_internal_encoding("UTF-8");
@endphp

<div class="sm:col-span-{{ $columns }}">
    {{ $slot}}
</div>
