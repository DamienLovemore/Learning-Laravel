<x-layout>
    @slot("heading")
        {{ __("Jobs Page") }}
    @endslot
    <div class="space-y-4">
    @foreach ($jobs as $job)
        @php
            $job_title   = __($job["title"]) . ": ";
            $litem       =  __("Pays") . " " . __("$") . " " . number_format($job["salary"], 2, ",", ".") . ".";
            $id_crip     = base64_encode($job["id"]);
        @endphp
        <a href="{{ route('job-info', ['p1' => $id_crip]) }}" class="hover:text-indigo-600 block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-pink-500">
                {{ $job->employer->name }}<!-- Lazy Loading if not with.(attempt to access a related model or relationship) -->
            </div>
            <div>
                <strong>{{ $job_title }}</strong>{{ $litem }}
            </div>
        </a>
    @endforeach
    <div>
        {{ $jobs->links() }}<!-- Because we used paginate to retrive jobs it was created for us. -->
    </div>
    </div>
</x-layout>
