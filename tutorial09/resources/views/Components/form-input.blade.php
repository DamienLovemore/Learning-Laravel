@props(["target", "placeholder" => "", "required" => true, "type" => "text"])

@php
    mb_internal_encoding("UTF-8");

    $div_class      = "flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600";
    $input_class    = "block min-w-0 grow py-1.5 pr-3 px-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6";
    //Disable input type number arrows
    $css_noarrows = "[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none";

    $target         = mb_convert_case($target, MB_CASE_LOWER);
    $target         = preg_replace("/\h+/", "_", $target);
@endphp

<div
    class="{{ $div_class }}">
    @if ($type === "text")
        <input id="{{ $target }}" type="text" name="{{ $target }}" placeholder="{{ __($placeholder) }}"
        class="{{$input_class }}"
        value="{{ request()->old($target) }}" {{ ($required) ? "required" : ""}} />
    @elseif ($type === "number")
        @php
            $min_value = str_replace(".", "", $placeholder);
            $min_value = str_replace(",", ".", $min_value);
            $min_value = (float)$min_value;
        @endphp

        <input id="{{ $target }}" type="number" min="{{ round($min_value/2) }}" max="1000000" step="0.01" name="{{ $target }}" placeholder="{{ $placeholder }}" class=" {{ "$input_class $css_noarrows" }}" value="{{ request()->old($target) }}" {{ ($required) ? "required" : ""}}/><!-- step="0.01" to allow float, not only integers -->
    @elseif ($type === "email")
        <input id="{{ $target }}" type="email" name="{{ $target }}" placeholder="{{ __($placeholder) }}"
        class="{{$input_class }}"
        value="{{ request()->old($target) }}" {{ ($required) ? "required" : ""}}
        minlength="7" maxlength="254" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
        />
    @elseif ($type === "password")
        <input id="{{ $target }}" type="password" name="{{ $target }}" placeholder="{{ __($placeholder) }}"
        class="{{$input_class }}"
        value="{{ request()->old($target) }}" {{ ($required) ? "required" : ""}}
        minlength="5" maxlength=""
        />
    @endif
</div>
