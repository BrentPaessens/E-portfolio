<x-mail::message>
# Dear {{ $data['name'] }},
Thanks for your message.<br>
We'll contact you as soon as possible.
<hr>
<p>
    <b>Your name:</b> {{ $data['name'] }}<br>
    <b>Your email:</b> {{ $data['email'] }}
</p>
<p>
    <b>Your message:</b><br>{!! nl2br($data['message']) !!}
</p>

Thanks,<br>
{{ 'The Event Shop' }}
</x-mail::message>
