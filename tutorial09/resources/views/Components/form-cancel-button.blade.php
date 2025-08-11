@php
    $custom_attr = [
        "class" => "text-sm/6 font-semibold text-gray-900 cursor-pointer p-1.5 hover:border-2 rounded-xl"
    ];
    $attr        = $attributes->merge($custom_attr);//Get the attributes, and add our custom classes to the class attribute

    $text        = (string)$slot;//Slot does not come as string, but as a class
@endphp
<button type="button" {{ $attr->except(["type", "onclick"]) }} onclick="window.history.back()">{{ __($text) }}</button>
