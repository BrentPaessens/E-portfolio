<x-eventshoplayout>
    <!-- Projects Header Section -->
    <section class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl font-bold mb-4">Projecten</h1>
        </div>
    </section>

    <!-- Main Content Area (White Space) -->
    <section class="py-4">
        <div class="container mx-auto px-0">

            <!-- SKILS 2 First Semester Project -->
            <div class="bg-gray-300 rounded-lg p-6 mb-10">
                <h2 class="text-2xl font-bold text-center mb-2">SKILS 2 Groepsproject</h2>
                <h3 class="text-xl text-center mb-6">Semester 1</h3>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Use Case Diagram Section -->
                    <div>
                        <h4 class="text-lg font-semibold mb-3">Use Case diagram:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/Use Case - SKIL2 S1.png') }}" alt="Use Case Diagram" class="w-full h-auto">
                        </div>
                    </div>

                    <!-- Figma Design Section -->
                    <div>
                        <h4 class="text-lg font-semibold mb-3">Figma:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/Figma - SKIL2 S1.png') }}" alt="Figma Design" class="w-full h-auto">
                        </div>
                        <div class="mb-4">
                            <img src="{{ asset('images/Figma - SKIL2 S1_2.png') }}" alt="Figma Design" class="w-full h-auto">
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700">
                        Bij dit project hebben we een prototype moeten uitwerken voor een applicatie.
                        Door met middel van met de klant feedback te vragen en op de hoogte te houden hoe het verloopt.
                    </p>
                </div>
            </div>

            <!-- SKILS 2 Second Semester Project -->
            <div class="bg-gray-300 rounded-lg p-6 mb-10">
                <h2 class="text-2xl font-bold text-center mb-2">SKILS 2 Groepsproject</h2>
                <h3 class="text-xl text-center mb-6">Semester 2</h3>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- You can add your semester 2 content sections here -->
                    <div>
                        <h4 class="text-lg font-semibold mb-3">Use Case diagram:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/projects/semester2-part1.jpg') }}" alt="Semester 2 Part 1" class="w-full h-auto ">
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold mb-3">Figma:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/projects/semester2-part2.jpg') }}" alt="Semester 2 Part 2" class="w-full h-auto ">
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold mb-3">Applicatie:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/projects/semester2-part2.jpg') }}" alt="Semester 2 Part 2" class="w-full h-auto ">
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700">
                        Hier hebben we een prototype gekregen van een andere groep en moesten we hier onze database en applicatie rond bouwen.
                        Dit is nog work in progress, maar we zijn al een heel eind gevorderd.
                    </p>
                </div>
            </div>

            <!-- Other Project 1 -->
            <div class="bg-gray-300 rounded-lg p-6 mb-10">
                <h2 class="text-2xl font-bold text-center mb-4">Any Project (1ste semester)</h2>

                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="mb-4">
                            <img src="{{ asset('images/projects/any-project1.jpg') }}" alt="Any Project 1" class="w-full h-auto border border-gray-300">
                        </div>
                    </div>

                    <div>
                        <p class="text-gray-700">
                            Uitleg over dit project. Hier kun je ingaan op de doelstellingen,
                            de toegepaste technieken en de uiteindelijke resultaten.
                            Je kunt ook vermelden wat je ervan geleerd hebt en welke vaardigheden
                            je hebt ontwikkeld tijdens het werken aan dit project.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Other Project 2 -->
            <div class="bg-gray-300 rounded-lg p-6 mb-10">
                <h2 class="text-2xl font-bold text-center mb-4">Any Project (1ste semester)</h2>

                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="mb-4">
                            <img src="{{ asset('images/projects/any-project2.jpg') }}" alt="Any Project 2" class="w-full h-auto border border-gray-300">
                        </div>
                    </div>

                    <div>
                        <p class="text-gray-700">
                            Uitleg over dit project. Hier kun je ingaan op de doelstellingen,
                            de toegepaste technieken en de uiteindelijke resultaten.
                            Je kunt ook vermelden wat je ervan geleerd hebt en welke vaardigheden
                            je hebt ontwikkeld tijdens het werken aan dit project.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-eventshoplayout>
