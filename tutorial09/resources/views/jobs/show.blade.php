<x-layout>
    @slot("back_button")
        <x-back-button href="{{ route('jobs') }}" />
    @endslot
    @slot("heading")
        {{ __("Job Page") }}
    @endslot

    <div class="flex flex-nowrap gap-2 w-2/12 float-right mb-3">
        @php
            $id_crip     = base64_encode($job["id"]);
        @endphp
        <x-button class="grow" href="{{ route('jobs.edit', $id_crip) }}">{{ __("Edit") }}</x-button>
        <x-button class="grow" href="{{ route('jobs.delete', $id_crip) }}" :type="'button'" :target="'delete-form'">{{ __("Delete") }}</x-button>
    </div>

    <div class="clear-right">
        <h2 class="font-bold text-lg">{{ $job->title }}</h2>
        <p>
            {{ __("This job pays") . " " . __("$") . " " . number_format($job->salary, 2, ",", ".") . "."}}
        </p>
    </div>

    <form class="hidden" id="delete-form" action="{{ route('jobs.delete', $id_crip) }}" method="POST">
        @csrf
        @method("DELETE")
    </form>
</x-layout>
