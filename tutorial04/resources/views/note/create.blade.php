<x-app-layout>
    <div class="note-container single-note">
        <h1>{{ __("Create New Note") }}</h1>
        <form action="{{ route("note.store") }}" method="POST" class="note">
            @csrf

            <textarea name="note" rows="10" class="note-body" placeholder="{{ __("Enter your note here") }}"></textarea>
            <div class="note-buttons">
                <a href="{{ route("note.index") }}" class="note-cancel-button">{{ __("Cancel") }}</a>
                <button class="note-submit-button">{{ __("Submit") }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
