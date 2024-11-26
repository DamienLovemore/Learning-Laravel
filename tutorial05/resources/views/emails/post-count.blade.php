<x-mail::message>
# {{ __("Posts count") }}

{{ __("The website have") }} {{ $postCount }} {{ __('posts') }}.

{{ __("Thanks,") }}<br>
{{ config("app.name") }}

<x-mail::button :url='$urlPosts'>
{{ __("View Posts") }}
</x-mail::button>
</x-mail::message>
