<x-mail::message>

{{ $content}}
<x-mail::button :url="'http://127.0.0.1:8000/home'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
