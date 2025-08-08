@php
    $id_crip = (!empty($job)) ? base64_encode($job->id) : "";
@endphp

@if (!empty($job))
    <h2>
        {{ __($job->title) }}
    </h2>
@endif
<p>
    {{ __("Congrats!") }} {{ __("Your job is now live on our website.") }}
</p>

@if (!empty($job))
    <p>
        <a href="{{ route('jobs.info', $id_crip) }}">{{ __("View your job listing") }}</a>
    </p>
@endif
