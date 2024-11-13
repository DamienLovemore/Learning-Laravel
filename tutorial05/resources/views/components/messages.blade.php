@php
    $additionalClasses = "";
    $additionalClassesClose = "";
    $statusMessage = session()->get("status");
@endphp

<div class="mb-2">
    @if(session()->has("status") && session()->has("message"))
        @if($statusMessage === "SUCCESS")
            @php
                $additionalClasses = "text-green-800 dark:text-green-400 bg-green-100 dark:bg-gray-800";
                $additionalClassesClose= "text-green-500 focus:ring-green-400 hover:bg-green-200 dark:hover:bg-gray-700";
            @endphp
        @elseif ($statusMessage === "ERROR")
            @php
                $additionalClasses = "text-red-800 dark:text-red-400 bg-red-100 dark:bg-gray-800";
                $additionalClassesClose = "text-red-500 focus:ring-red-400 hover:bg-red-200 dark:hover:bg-gray-700";
            @endphp
        @elseif ($statusMessage === "WARNING")
            @php
                $additionalClasses = "text-yellow-800 dark:text-yellow-300 bg-yellow-100 dark:bg-gray-800";
                $additionalClassesClose = "text-yellow-500 focus:ring-yellow-400 hover:bg-yellow-200 dark:hover:bg-gray-700";
            @endphp
        @else
            @php
                $additionalClasses = "text-gray-800 dark:text-gray-300 bg-gray-400 dark:bg-gray-800";
                $additionalClassesClose = "text-gray-500 focus:ring-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700";
            @endphp
        @endif

        <div class="{{ CSS::defaultClasses . $additionalClasses }}" id="alert" role="alert">
            <span class="font-medium">{{ __($statusMessage) }}</span> {{ __(session()->get("message")) }}
            <button type="button" class="{{ CSS::defaultClassesClose . ' ' . $additionalClassesClose }}" data-dismiss-target="#alert" aria-label="Close">
                <span class="sr-only">{{ __("Close") }}</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @elseif ($errors->any())
        @php
            $additionalClasses = "text-red-800 dark:text-red-400 bg-red-100 dark:bg-gray-800";
            $additionalClassesClose = "text-red-500 focus:ring-red-400 hover:bg-red-200 dark:hover:bg-gray-700";
            $count = -1;
        @endphp

        <ul>
            @foreach ($errors->all() as $error)
                @php
                    $count++;
                    $currentId = "alert";
                @endphp

                @if ($count !== 0)
                    @php $currentId = "alert-".$count  @endphp
                @endif

                <li>
                    <div class="{{ CSS::defaultClasses . ' ' . $additionalClasses }}" id="{{ $currentId }}" role="alert">
                        {{ __($error) }}
                        <button type="button" class="{{ CSS::defaultClassesClose . ' ' . $additionalClassesClose }}" data-dismiss-target="{{ "#".$currentId }}" aria-label="Close">
                            <span class="sr-only">{{ __("Close") }}</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
