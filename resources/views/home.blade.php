<x-eventshoplayout>
    <!-- Welcome Section -->
    <section class="bg-gray-700 text-white py-16">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl font-bold mb-4">Welkom bij mijn portfolio.</h1>
            <p class="text-xl mb-4">Ik ben Brent Paessens</p>
            <p class="max-w-2xl mx-auto">
                Student aan Thomas More in Geel. Deze website dient als bewijs
                van mijn prestaties tijdens mijn opleiding Application & AI.
            </p>
        </div>
    </section>

    <!-- Main Content Area (White Space) -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <!-- Active Projects Section -->
            <h2 class="text-3xl font-bold text-center mb-8">Actieve projecten</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Project 1 -->
                <div class="bg-gray-200 p-6 rounded-lg relative">
                    <!-- Make sure title has highest z-index -->
                    <h3 class="text-xl font-semibold mb-8 text-center relative z-10">PHP project (Skils 2)</h3>

                    <!-- Constrain the image inside its container -->
                    <div class="bg-gray-300 h-48 flex items-center justify-center mb-4 overflow-hidden">
                        <img src="{{ asset('images/App - cal.png') }}" alt="Semester 2 Part 1" class="w-full h-auto object-contain">
                    </div>

                    <p class="text-gray-700 mb-4">Dit project is nog steeds lopende, hier werken we in groep om van een prototype naar een werkende applicatie te gaan.</p>
                    <div class="text-center">
                        <a href="{{ route('projects') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Bekijk project</a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-gray-200 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4 text-center">Setting up a server</h3>

                    <!-- Constrain the image inside its container -->
                    <div class="bg-gray-300 h-48 flex items-center justify-center mb-4 overflow-hidden">
                        <img src="{{ asset('images/minecraft.png') }}" alt="Semester 2 Part 1" class="w-full h-auto object-contain">
                    </div>

                    <p class="text-gray-700 mb-4">
                        Dit project is iets dat ik al een tijdje wil doen door gebruik te maken van oude laptops die nog werken, maar niet meer gebruikelijk zijn voor school.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-eventshoplayout>

