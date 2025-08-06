@props(["target"])

@error($target)
    <p class="text-sm text-red-500 italic">*{{ $message }}</p>
@enderror
