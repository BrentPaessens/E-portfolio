<x-eventshoplayout>
    <!-- About Header Section -->
    <section class="bg-gray-700 text-white py-6">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl font-bold">About me</h1>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
                <!-- Why did I choose Application & AI? -->
                <div class="bg-gray-200 rounded-lg p-6 flex flex-col">
                    <h2 class="text-2xl font-bold mb-4 text-center">Waarom heb ik gekozen voor Application & AI?</h2>
                    <p class="text-gray-800 flex-grow">
                        Ik heb deze richting gekozen omdat ik geïnteresseerd ben in Artificiele intelegentie. Ik deed in mijn vorige studie een graduaat opleiding Internet of Things en was nog steeds geïnteresseerd in Artificiele intelegentie.
                        Daarom dat ik deze richting heb gekozen, want beide opleidingen hebben een link met elkaar.
                    </p>
                </div>

                <!-- Personal Bio with Image -->
                <div class="bg-gray-200 rounded-lg p-4 flex flex-col items-center">
                    <div class="w-full flex justify-center mb-4">
                        <img src="{{ asset('images/profile.jpg') }}" alt="Brent" class="rounded-lg max-w-full h-auto" style="max-height: 600px;">
                    </div>
                    <div class="w-full text-center flex-grow">
                        <p class="mb-4 text-lg font-semibold">Ik ben Brent, 22 jaar.</p>
                        <p> tweede jaars student van de opleiding App & AI aan Thomas More in Geel.</p>
                    </div>
                </div>

                <!-- Future dreams & professional ambitions -->
                <div class="bg-gray-200 rounded-lg p-6 flex flex-col">
                    <h2 class="text-2xl font-bold mb-4 text-center">Toekomstdromen en professionele ambities</h2>
                    <p class="text-gray-800 flex-grow">
                        Lorem blabla, needs to be replaced. Lorem blabla, needs to be replaced. Lorem blabla, needs to be replaced. Lorem blabla, needs to be replaced.
                        Lorem blabla, needs to be replaced. Lorem blabla, needs to be replaced.Lorem blabla, needs to be replaced. Lorem blabla, needs to be replaced.
                        Ld.
                    </p>
                </div>

                <!-- Hobbies -->
                <div class="bg-gray-200 rounded-lg p-6 md:col-span-3 flex flex-col flex-grow">
                    <h2 class="text-2xl font-bold mb-4 text-center">Hobby's</h2>
                    <div class="mb-4">
                        <h3 class="font-bold mb-1">Mountainbiken:</h3>
                        <p class="text-gray-800">
                            Hou ervan om de fiets boven te halen en een tour te maken door het bos.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold mb-1">Server administrator (Minecraft):</h3>
                        <p class="text-gray-800">
                            Hierbij moet ik speler reports bekijken en op handelen indien een speler valsspeelt of haat gedrag toont naar andere spelers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-eventshoplayout>
