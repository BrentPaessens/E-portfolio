<x-mail::message>
{!! nl2br($message)  !!}
# Dear {{ auth()->user()->name }},

{!! nl2br($message) !!}

Thanks,<br>
{{ config('Event Shop') }}
</x-mail::message>
