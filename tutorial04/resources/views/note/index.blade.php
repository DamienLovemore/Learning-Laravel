<x-layout>
    <div class="note-container">
        <a href="{{ route("note.create") }}" class="new-note-btn">
            {{ __("New Note") }}
        </a>
        <div class="notes">
            @foreach ($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route("note.show", $note) }}" class="note-edit-button">{{ __("View") }}</a>
                        <a href="{{ route("note.edit", $note) }}" class="note-edit-button">{{ __("Edit") }}</a>
                        <button class="note-delete-button">{{ __("Delete") }}</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
