@php
    $defaults = [
        "class" => "p-4 bg-white/5 rounded-xl border border-transparent hover:border-blue-800 group transition-colors duration-300"
    ];
    $new_attr = $attributes->merge($defaults);
@endphp

<div {{ $new_attr }}>
    {{ $slot }}
</div>
