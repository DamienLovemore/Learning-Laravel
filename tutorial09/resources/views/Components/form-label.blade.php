@php
    mb_internal_encoding("UTF-8");
    $custom_attr = ["class" => "block text-sm/6 font-medium text-gray-90"];
    $attr        = $attributes->merge($custom_attr);
@endphp
<!-- Slot comes as a object not a string -->
<label {{ $attr }}>{{ __((string)$slot) }}</label>
