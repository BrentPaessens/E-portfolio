<x-eventshoplayout>
    <x-slot name="title">The Vinyl Shop: records</x-slot>
    <x-slot name="subtitle">Records</x-slot>
    <section class="grid sm:grid-cols-2 gap-4">
        <div>
            <h3>Original list</h3>
            <ul>
                @foreach ($events as $event)
                    <li>{!! $event !!}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>Bullet list</h3>
            <x-tmk.list title="Bullet list" class="p-4 pl-8 border rounded shadow">
                @foreach ($events as $event)
                    <li>{!! $event !!}</li>
                @endforeach
            </x-tmk.list>
        </div>
        <div>
            <h3>Numbered list</h3>
            <x-tmk.list type="ol">
                @foreach ($events as $event)
                    <li>{!! $event !!}</li>
                @endforeach
            </x-tmk.list>
        </div>
        <div>
            <h3>Group list</h3>
            <x-tmk.list type="group" class="border rounded shadow-lg">
                @foreach ($events as $event)
                    <li class="p-2 hover:bg-gray-300">{!! $event !!}</li>
                @endforeach
            </x-tmk.list>
        </div>
    </section>
</x-eventshoplayout>


