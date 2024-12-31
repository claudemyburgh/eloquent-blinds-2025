
<x-mail::message>
# Hi, {{ $name }}

Here appreciate that you contacted us.
Whe will get back to you asap.


Meanwhile please take the time to like us on Facebook.
<x-mail::button url="https://www.facebook.com/eloquentblinds">
Facebook
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
