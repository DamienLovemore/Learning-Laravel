@extends("layouts.app")

@section("title", "Home")

@section("sidebar")
    @parent

    <p>This is appended to the master sidebar.</p>
    <br>
@endsection

@section("content")
    <p>This is my body "container" content.</p>
@endsection
