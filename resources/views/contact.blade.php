<x-eventshoplayout>
    <x-slot name="title">Contact</x-slot>
    <x-slot name="subtitle">Contact info</x-slot>
    <div class="grid grid-cols-4 gap-4">
        <x-tmk.section class="col-span-4 lg:col-span-3 lg:order-2">
            {{-- embed the Livewire ContactForm component --}}
            @livewire('contact-form')
        </x-tmk.section>
        <section class="col-span-4 lg:col-span-1 lg:order-1">
            <h3>The Event Shop</h3>
            <p>Kleinhoefstraat 4</p>
            <p class="pb-2 border-b">2440 Geel - Belgium</p>
            <p class="flex items-center pt-2 cursor-pointer">
                <x-phosphor-phone-call class="w-6 mr-2 text-gray-400"/>
                <a href="tel:+3214126310" class="mr-2">+32(0)14/12.63.10</a>
            </p>
            <p class="flex items-center pt-2 cursor-pointer border-b">
                <x-heroicon-o-envelope-open class="w-6 mr-2 text-gray-400"/>
                <a href="mailto:info@eventshop.com">info@eventshop.com</a>
            </p>
            <div class="mt-4">
                <x-tmk.clock class="border-b"></x-tmk.clock>
                <p class="mt-2 text-lg text-center font-bold">Working Hours:</p>
                <div class="mx-4">
                    <p>Mon-Fri: 9:00 AM - 6:00 PM</p>
                    <p>Sat: 10:00 AM - 4:00 PM</p>
                    <p>Sun: Closed</p>
                </div>
            </div>
        </section>
    </div>
</x-eventshoplayout>
