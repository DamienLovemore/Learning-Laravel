<x-layout>
    <x-page-heading>Results - {{ $search }}</x-page-heading>

    <div class="space-y-6">
        @if ((!empty($jobs)) && (count($jobs) > 0))
            @foreach ($jobs as $job)
                <x-job-card-wide  :$job/>
            @endforeach
        @else
            <x-forms.label name="warning" label="No jobs was found for this search. :(" />
        @endif
    </div>
</x-layout>
