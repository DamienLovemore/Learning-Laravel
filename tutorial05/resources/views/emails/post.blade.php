<x-mail::message>
# {{ __("Thanks for your post ") }} {{ $data["name"] }}

<x-mail::panel>
    * {{ $data["title"] }}<br>
    @if (!empty($data["thumbnail"]) && mb_strlen($data["thumbnail"]) > 0)
        ![{{ __('Post Thumbnail') }}]({{ $data['thumbnail'] }})
    @endif
    {{ $data["content"] }}
</x-mail::panel>


{{ __("Thanks,") }}<br>
{{ config("app.name") }}

<x-mail::button :url='$data["postUrl"]'>
{{ __("View Post") }}
</x-mail::button>
</x-mail::message>
