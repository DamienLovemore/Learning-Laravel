<x-layout>
    @slot("heading")
        {{ __("Jobs Page") }}
    @endslot
    <ul>
    @foreach ($jobs as $job)
        @php
            $job_title   = __($job["title"]) . ": ";
            $litem       =  __("Pays") . " " . __("$") . " " . number_format($job["salary"], 2, ",", ".") . ".";
            $id_crip     = base64_encode($job["id"]);
        @endphp
        <li>
            <a href="{{ route('job-info', ['p1' => $id_crip]) }}" class="hover:text-pink-400">
                <strong>{{ $job_title }}</strong>{{ $litem }}
            </a>
        </li>
    @endforeach
    </ul>
</x-layout>
