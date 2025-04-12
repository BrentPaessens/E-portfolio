<x-eventshoplayout class="bg-sky-200">
    <div>
        <x-slot name="description">New description</x-slot>
        <x-slot name="title">Welcome to the Event Shop</x-slot>
        <p class="text-center">Welcome to the website of The Event Shop, a large online store with lots of upcoming events in Belgium.</p>
        <hr class="my-4">

        <section class="border-2 ">
            <div>
                <h2 class="font-bold text-center text-2xl">Purpose</h2>
                <p class="mx-3 mb-2">
                    The Event Shop is a large online store with lots of upcoming events in Belgium.
                    We offer a wide range of events, from concerts to sports events, from workshops to festivals.
                    We have something for everyone.
                    Our goal is to make it easy for you to find and book tickets for your favorite events.
                    We want to make sure you have a great time at the events you attend.
                    We hope you enjoy our website and find the events you are looking for.
                </p>
            </div>
        </section>

        <div class="grid grid-cols-3 gap-2 py-4 ">
            <x-tmk.section class="col-span-6 md:col-span-1 bg-sky-200">
                <div>
                    <h3 class="text-center ">Contact</h3>
                    <p>If you’re unsure about something or run into any problems, don’t hesitate to drop your questions here. We’ll do our best to assist you!</p>
                </div>
                <div class="flex justify-center mt-8">
                    <button
                        x-data
                        @click="window.location.href='{{ route('contact') }}'"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold
                        text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none
                        focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >
                        Go to contact page
                    </button>
                </div>
            </x-tmk.section>
            <x-tmk.section class="col-span-6 md:col-span-1 bg-sky-200">
                <div>
                    <h3 class="text-center ">Shop</h3>
                    <p>Here you’ll find an extensive list of events taking place in Belgium. There’s something for everyone!</p>
                </div>
               <div class="flex justify-center mt-14">
                   <button
                       x-data
                       @click="window.location.href='{{ route('shop') }}'"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold
                       text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none
                       focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                   >
                       Go to Shop page
                   </button>
               </div>
            </x-tmk.section>
            <x-tmk.section class="col-span-6 md:col-span-1 bg-sky-200">
                <div>
                    <h3 class="text-center ">Orders</h3>
                    <p>Here you will be redirected to your mailbox where you can see your recent orders</p>
                </div>
                <div class="flex justify-center mt-14">
                    <button
                        x-data
                        @click="window.location.href='http://localhost:8025'"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold
                        text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-gray-900
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >
                        Go to your mail
                    </button>
                </div>
            </x-tmk.section>
        </div>
    </div>
</x-eventshoplayout>

