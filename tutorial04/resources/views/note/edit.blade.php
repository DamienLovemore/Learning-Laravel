<x-app-layout>
    <div class="note-container single-note">
        <h1 class="text-3xl py-4">{{ __("Edit your note") }}</h1>
        <form action="{{ route("note.update", $note) }}" method="POST" class="note">
            @csrf
            @method("PUT")

            <textarea name="note" rows="10" class="note-body" placeholder="{{ __("Enter your note here") }}">{{ $note->note }}</textarea>
            <div class="note-buttons">
                <a href="{{ route("note.index") }}" class="note-cancel-button">{{ __("Cancel") }}</a>
                <button class="note-submit-button">{{ __("Submit") }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
