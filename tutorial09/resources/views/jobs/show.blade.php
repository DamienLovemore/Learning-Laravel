<x-layout>
    @slot("heading")
        {{ __("Job Page") }}
    @endslot

    <h2 class="font-bold text-lg">{{ $job["title"] }}</h2>
    <p>
        {{ __("This job pays") . " " . __("$") . " " . number_format($job["salary"], 2, ",", ".") . "."}}
    </p>
</x-layout>
