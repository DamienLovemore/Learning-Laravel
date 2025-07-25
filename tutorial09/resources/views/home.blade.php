<x-layout>
    @slot("heading")
        {{ __("Home Page") }}
    @endslot
    <h1>{{ $greeting }} {{ __("Home Page") }}.</h1>
</x-layout>
