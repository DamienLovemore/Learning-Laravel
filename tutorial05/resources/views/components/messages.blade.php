@php
    $defaultClasses = "p-4 mb-4 text-sm rounded-lg dark:bg-gray-800";
    $additionalClasses = "";
    $statusMessage = session()->get("status");
@endphp

<div class="mb-2">
    @if(session()->has("status") && session()->has("message"))
        @if($statusMessage === "SUCCESS")
            @php $additionalClasses = "text-green-800 bg-green-50 dark:text-green-400"; @endphp
        @elseif ($statusMessage === "ERROR")
            @php $additionalClasses = "text-red-800 bg-red-50 dark:text-red-400"; @endphp
        @elseif ($statusMessage === "WARNING")
            @php $additionalClasses = "text-yellow-800 bg-yellow-50 dark:text-yellow-300"; @endphp
        @else
            @php $additionalClasses = "text-gray-800 bg-gray-50 dark:text-gray-300";  @endphp
        @endif

        <div class="{{ $defaultClasses . $additionalClasses }}">
            <span class="font-medium">{{ __($statusMessage) }}</span> {{ __(session()->get("message")) }}
        </div>
    @elseif ($errors->any())
        @php $additionalClasses = "text-red-800 bg-red-50 dark:text-red-400"; @endphp

        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    <div class="{{ $defaultClasses . ' ' . $additionalClasses }}">
                        {{ __($error) }}
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
