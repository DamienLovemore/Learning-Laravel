@php
    $custom_attr = [
        "class" => "rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-pink-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600 cursor-pointer"
    ];
    $attr        = $attributes->merge($custom_attr);//Get the attributes, and add our custom classes to the class attribute

    $text        = (string)$slot;//Slot does not come as string, but as a class
@endphp
<button type="submit" {{ $attr->except("type") }}>{{ __($text) }}</button>
