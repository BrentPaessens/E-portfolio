<div>
    {{-- Filter --}}
    <x-tmk.section class="mb-4 flex items-center gap-2">
        <div class="flex-1">
            <x-tmk.form.search placeholder="Filter events"
                               wire:model.live.debounce.500ms="search"
                               class="placeholder-gray-300"/>
        </div>
        <x-tmk.form.switch id="noStock"
                           wire:model.live="noStock"
                           text-off="No stock" color-off="text-gray-400 font-light bg-gray-100 before:line-through"
                           text-on="No stock" color-on="text-white bg-rose-600"
                           class="w-20 mt-1" />
        <x-button wire:click="newEvent()">
            New Event
        </x-button>
    </x-tmk.section>
    {{-- Table with records --}}
    <x-tmk.section>
        <div class="my-4">{{ $events->links() }}</div>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-20">
                <col class="w-14">
                <col class="w-max">
                <col class="w-24">
            </colgroup>
            <thead>
            <tr class="bg-blue-100 text-gray-700 [&>th]:p-2">
                <th>ID</th>
                <th>Cover</th>
                <th>Price</th>
                <th>Stock</th>
                <th class="text-left">Event</th>
                <th>
                    <x-tmk.form.select id="perPage"
                                       wire:model.live="perPage"
                                       class="block mt-1 w-full">
                        @foreach([5, 10, 15, 20] as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </x-tmk.form.select>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($events as $event)
                <tr
                    wire:key="{{ $event->id }}"
                    class="border-t border-gray-300 {{ $event->stock == 0 ? 'bg-red-100' : '' }}">
                    <td>{{ $event->id }}</td>
                <td>
                    <img src="{{ $event->cover }}"
                         alt="{{ $event->naam }}"
                         class="my-2 border object-cover">
                </td>
                    <td>{{ '€' . $event->prijs }}</td>
                    <td>{{ $event->stock }}</td>
                <td class="text-left">
                    <p class="text-lg font-medium">{{ $event->naam }}</p>
                    <p class="italic">{{ $event->locatie }}</p>
                    <p class="text-sm text-teal-700">{{ $event->genre_name }}</p>
                </td>
                <td>
                    <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                        <button
                            wire:click="editEvent({{ $event->id }})"
                            class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                            <x-phosphor-pencil-line-duotone class="inline-block size-5"/>
                        </button>
                        <button
                            wire:click="deleteEvent({{ $event->id }})"
                            wire:confirm="Are you sure you want to delete this event?"
                            class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                            <x-phosphor-trash-duotone class="inline-block size-5"/>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 font-bold text-sky-800">
                        No records found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="my-4">{{ $events->links() }}</div>
    </x-tmk.section>
    {{-- Modal to add and update event --}}
    <x-dialog-modal id="eventModal" wire:model.live="showModal">
        <x-slot name="title">
            <h2>{{ is_null($form->id) ? 'New event' : 'Edit event' }}</h2>
        </x-slot>
        <x-slot name="content">
            {{-- error messages --}}
            <x-tmk.error-bag />
            {{-- show only if $form->id is empty --}}
            @if(!$form->id)
                    <x-label for="mb_id" value="Event Name"/>
                    <div class="flex flex-row gap-2 mt-2">
                        <x-input id="mb_id" type="text" placeholder="Name" wire:model="form.name"
                                 class="flex-1"/>
                    </div>
            @endif
            <div class="flex flex-row gap-4 mt-1">
                <div class="flex-1 flex-col gap-2">
                    <x-label for="genre_id" value="Genre" class="mt-4"/>
                    <x-tmk.form.select wire:model="form.genre_id" id="genre_id" class="block mt-1 w-full">
                        <option value="">Select a genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </x-tmk.form.select>
                    <x-label for="price" value="Price" class="mt-4"/>
                    <x-input id="price" type="number" step="0.50"
                             wire:model="form.price"
                             class="mt-1 block w-full"/>
                    <x-label for="stock" value="Stock" class="mt-4"/>
                    <x-input id="stock" type="number"
                             wire:model="form.stock"
                             class="mt-1 block w-full"/>
                    <x-label for="location" value="Location" class="mt-4"/>
                    <x-input id="location" type="text"
                             wire:model="form.location"
                             class="mt-1 block w-full"/>
                </div>
                {{-- drag and drop to add a cover for a new event -extra --}}
                <div>
                    <x-label for="cover" value="Cover" class="mt-4"/>
                    <div x-data="{ isDropping: false }"
                         x-on:dragover.prevent="isDropping = true"
                         x-on:dragleave.prevent="isDropping = false"
                         x-on:drop.prevent="isDropping = false; $wire.upload('cover', $event.dataTransfer.files[0])"
                         class="border-2 border-dashed border-gray-300 p-4 text-center"
                         :class="{ 'border-green-500': isDropping }">
                        <p class="text-gray-500">Drag & drop your cover image here, or click to select a file</p>
                        <input type="file" wire:model="cover" class="hidden" x-ref="coverInput" />
                        <button type="button" @click="$refs.coverInput.click()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Select File</button>
                    </div>
                    @if ($cover)
                        <p class="mt-4 text-green-500" >File uploaded</p>
                    @endif
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="$wire.showModal = false">Cancel</x-secondary-button>
            @if(is_null($form->id))
                <x-tmk.form.button color="success"
                                   disabled="{{ !$form->name || !$form->price || !$form->stock || !$form->genre_id ? 'false' : 'true'}}"
                                   wire:click="createEvent()"
                                   class="ml-2">Save new event
                </x-tmk.form.button>
            @else
            <x-tmk.form.button color="info"
                wire:click="updateEvent({{ $form->id }})"
                class="ml-2">Save changes
            </x-tmk.form.button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>
