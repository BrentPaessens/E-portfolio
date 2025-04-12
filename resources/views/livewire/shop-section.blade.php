<div>
    {{-- show preloader while fetching data in the background --}}
    <div class="hidden fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="bg-lime-700/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>
    {{--
    Filter section:
    added a filter that can search:
    on name,
    on genre,
    on the price
    and how many events you want to show per page
     --}}
    <div class="grid grid-cols-10 gap-4">
        {{--search bar to search on name--}}
        <div class="col-span-10 md:col-span-5 lg:col-span-3">
            <x-label for="filter" value="Filter"/>
            <x-tmk.form.search
                wire:model.live.debounce.300ms="filter"
                id="filter"
                placeholder="Filter name of event"/>
        </div>
        {{--Filtering on genre--}}
        <div class="col-span-5 md:col-span-2 lg:col-span-2">
            <x-label for="genre" value="Genre"/>
            <x-tmk.form.select id="genre"
                               wire:model.live="genre"
                               class="block mt-1 w-full">
                <option value="%">All Genres</option>
                @foreach($allGenres as $g)
                    <option value="{{ $g->id }}">
                        {{ $g->name }} ({{$g->evenements_count}})
                    </option>
                @endforeach
            </x-tmk.form.select>
        </div>
        {{--Pagination to show certain amount of events per page--}}
        <div class="col-span-5 md:col-span-3 lg:col-span-2">
            <x-label for="perPage" value="Events per page"/>
            <x-tmk.form.select id="perPage"
                               wire:model.live="perPage"
                               class="block mt-1 w-full">
                @foreach ([3,6,9,12,15,18,24] as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </x-tmk.form.select>
        </div>
        {{--filtering on price --}}
        <div class="col-span-10 lg:col-span-3">
            <x-label for="price">Price &le;
                <output id="priceFilter" name="priceFilter">{{ $price }}</output>
            </x-label>
            <x-input type="range" id="price" name="price"
                     wire:model.live.debounce.300ms="price"
                     min="{{ $priceMin }}"
                     max="{{ $priceMax }}"
                     oninput="priceFilter.value = price.value"
                     class="block mt-4 w-full h-2 bg-indigo-100 accent-indigo-600 appearance-none"/>
        </div>
    </div>
    {{--
    Main section:
    buttons to switch pages to see other events
     cards with the events
     --}}
    <div class="my-4">{{ $events->links() }}</div>
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-8 mt-8">
        @foreach ($events as $event)
        <div
            wire:key="event-{{ $event->id }}"
            class="flex bg-white border border-blue-300 shadow-md rounded-lg overflow-hidden">
            <img class="w-52 h-52 border-r border-gray-300 object-cover"
                 src="{{ $event->cover }}"
                 alt=" {{ $event->naam }}"
                 title=" {{ $event->naam }}">
            <div class="flex-1 flex flex-col">
                <div class="flex-1 p-4">
                    <p class="text-lg font-medium">{{ $event->naam }}</p>
                    <p class="italic pb-2">{{ $event->locatie }}</p>
                    <p class="italic font-thin text-right pt-2 mb-2">{{ $event->genre->name }}</p>
                </div>
                <div class="flex justify-between border-t border-gray-300 bg-blue-200 px-4 py-2">
                    <div>{{  '€' . $event->prijs }}</div>
                    <div class="flex space-x-4">
                        @if($event->stock > 0)
                            <button class="w-6 hover:text-red-900"
                                    wire:click="addToBasket({{ $event->id }})"
                                    data-tippy-content="Add to basket">
                                <x-phosphor-shopping-bag-light class="outline-0"/>
                            </button>
                        @else
                            <p class="font-extrabold text-red-700">SOLD OUT</p>
                        @endif
                            <button class="w-6 hover:text-red-900"
                                    wire:click="showInfo({{ $event->id }})"
                                    data-tippy-content="Extra info">
                                <x-phosphor-info-light/>
                            </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="my-4">{{ $events->links() }}</div>
    {{-- No records found --}}
    @if($events->isEmpty())
        <x-tmk.alert type="danger" class="w-full">
            Can't find any event with <b>'{{ $filter }}'</b> for this genre
        </x-tmk.alert>
    @endif
    {{-- Extra info section --}}
    <x-dialog-modal wire:model="showModal">
        {{--title section --}}
        <x-slot name="title">
            <div class="flex items-center border-b border-gray-300 pb-2 gap-4">
                <img class="size-20"
                     src="{{ $selectedEvent->cover ?? asset('storage/covers/no-cover.png') }}" alt="">
                <h3 class="font-medium">
                    {{ $selectedEvent->naam ?? '' }}<br/>
                    <span class="font-light">{{ $selectedEvent->locatie ?? '' }}</span>
                </h3>
            </div>
        </x-slot>
        {{-- content section --}}
        <x-slot name="content">
            @if($selectedEvent)
                <table class="w-full text-left align-top">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Locatie</th>
                        <th class="px-4 py-2">Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-100">
                            <td class="px-4 py-2">{{ $selectedEvent->id }}</td>
                            <td class="px-4 py-2">{{ $selectedEvent->locatie }}</td>
                            <td class="px-4 py-2">{{ $selectedEvent->stock }}</td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
