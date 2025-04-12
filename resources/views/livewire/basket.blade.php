<div>
    {{-- Basket is empty --}}
    @if($totalQty === 0)
        <x-tmk.alert type="info" class="w-full">
            Your basket is empty
        </x-tmk.alert>
    @else
        {{-- Basket is not empty --}}
        @guest
            <x-tmk.alert type="warning" class="w-full" dismissible="false">
                You are not logged in. Please <a href="{{ route('login') }}" class="underline">login</a> or <a
                    href="{{ route('register') }}" class="underline">register</a> to check out.
            </x-tmk.alert>
        @endguest
        <x-tmk.section>
            <table class="text-center w-full">
                <colgroup>
                    <col class="w-12">
                    <col class="w-20">
                    <col class="w-20">
                    <col class="w-20">
                    <col class="w-28">
                </colgroup>
                <thead>
                <tr class="border-b-4 border-blue-300 text-gray-700 [&>th]:p-2">
                    <th>Tickets</th>
                    <th>Price</th>
                    <th class="text-left">Event</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $events as $event)
                    <tr class="border-b border-blue-300 align-top [&>td]:py-2">
                        <td>{{ $event['qty'] }}</td>
                        <td>€ {{ $event['prijs'] }}</td>
                        <td class="pl-2 text-left">
                            <p class="text-lg font-medium">{{ $event['naam'] }}</p>
                        </td>
                        <td>{{ $event['locatie']  }}</td>
                        <td>
                            <div class="border border-gray-300 rounded-md overflow-hidden text-sm grid grid-cols-2
                                [&>*]:p-2 hover:[&>*]:bg-sky-500 hover:[&>*]:text-sky-50 [&>*]:cursor-pointer [&>*]:transition mx-2">
                                <p
                                    wire:click="decreaseQty({{ $event['id'] }})"
                                    class="border-r border-gray-300">
                                    -1
                                </p>
                                <p wire:click="increaseQty({{ $event['id'] }})">+1</p>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="pt-4 text-left">
                        <x-tmk.form.button
                            wire:click="emptyBasket()"
                            color="danger">
                            Empty your basket
                        </x-tmk.form.button>
                    </td>
                    <td></td>
                    <td class="pt-4 text-left">
                        <p class="font-medium">Total:</p>
                        <p>€ {{ $totalPrice }}</p>
                    </td>
                </tr>
                @auth
                    <tr>
                        <td colspan="4"></td>
                        <td class="pt-4 text-left">
                            <x-tmk.form.button color="info" wire:click="checkoutForm()">
                                Checkout
                            </x-tmk.form.button>
                        </td>
                    </tr>
                @endauth
                </tbody>
            </table>
        </x-tmk.section>
    @endif
    {{-- Checkout modal --}}
        <x-dialog-modal id="checkoutModal" wire:model.live="showModal">
            <x-slot name="title">
                <h2 class="text-center">Checkout</h2>
            </x-slot>
            <x-slot name="content">
                <div class="mt-4 space-y-1">
                    <x-label for="Name" value="Name"/>
                    <x-input id="Name" type="text" class="block w-full"
                             wire:model="form.name"/>
                    <x-input-error for="form.name"/>
                </div>
                <div class="mt-4 space-y-1">
                    <x-label for="email" value="Email"/>
                    <x-input id="email" type="text" wire:model="form.email" class="w-full"/>
                </div>
                <div class="mt-4 space-y-1">
                    <x-label for="country" value="Country"/>
                    <x-input id="country" type="text" class="block w-full"
                             wire:model.blur="form.country"/>
                    <x-input-error for="form.country"/>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="space-y-1">
                        <x-label for="city" value="City"/>
                        <x-input id="city" type="text" class="block w-full"
                                 wire:model.blur="form.city"/>
                        <x-input-error for="form.city"/>
                    </div>
                    <div class="space-y-1">
                        <x-label for="zip" value="Zip"/>
                        <x-input id="zip" type="text" class="block w-full"
                                 wire:model.blur="form.zip"/>
                        <x-input-error for="form.zip"/>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button @click="$wire.showModal = false">Cancel</x-secondary-button>
                <x-tmk.form.button wire:click="checkout()" color="info" class="ml-2">Place order</x-tmk.form.button>
            </x-slot>
        </x-dialog-modal>
</div>
