@props(["active" => false, "type" => "link"])

@php
    $ret = "";

    if($type === "link")
    {
        $ret = "
                    <a
                    $attributes
                    >
                        $slot
                    <a/>
               ";
    }
    else if($type === "button")
    {
        $ret = "
                    <button
                    $attributes
                    >
                        $slot
                    </button>
               ";
    }

    echo $ret;
@endphp