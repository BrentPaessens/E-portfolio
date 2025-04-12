<div
    x-data="{ time: new Date()}"
    x-text="time.toLocaleTimeString()"
    x-init="setInterval(() => time = new Date(), 1000)"
    {{ $attributes->merge(['class' => 'text-2xl text-center p-2 font-mono'])}}
    >
</div>
