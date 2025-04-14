<x-eventshoplayout>
    <!-- Projects Header Section -->
    <section class="bg-gray-700 text-white py-8">
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

                <div class="grid md:grid-cols-2 gap-4">
                    <!-- You can add your semester 2 content sections here -->
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Use Case diagram:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/use case  S2.png') }}" alt="Semester 2 Part 1" class="w-full h-auto ">
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-2
                        ">Applicatie:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/App - cal.png') }}" alt="Semester 2 Part 2" class="w-full h-auto ">
                        </div>
                        <div class="mb-4">
                            <img src="{{ asset('images/App - user.png') }}" alt="Semester 2 Part 2" class="w-full h-auto ">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <h4 class="text-lg font-semibold mb-2">Figma:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/Figma SKIL2 S2.png') }}" alt="Semester 2 Part 2" class="w-full h-auto">
                        </div>
                    </div>
                    <div class="col-span-2 mt-6">
                        <p class="text-gray-700">
                            Hier hebben we een prototype gekregen van een andere groep en moesten we hier onze database en applicatie rond bouwen.
                            Dit is nog work in progress, maar we zijn al een heel eind gevorderd.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Other Project 1 -->
            <div class="bg-gray-300 rounded-lg p-6 mb-10">
                <h2 class="text-2xl font-bold text-center mb-4">Machine learning project</h2>

                <div class="grid md:grid-cols-2 gap-4">
                    <!-- AI-Model and Analyse Section -->
                    <div>
                        <h4 class="text-lg font-semibold mb-2">AI-Model:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/DT .png') }}" alt="Machine learning" class="w-full h-auto">
                        </div>
                        <div class="mb-4">
                            <img src="{{ asset('images/CM DT.png') }}" alt="Machine learning" class="w-full h-auto">
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Analyse:</h4>
                        <div class="mb-4">
                            <img src="{{ asset('images/Analyse ML.png') }}" alt="Machine learning" class="w-full h-auto">
                        </div>
                    </div>
                    <!-- Full-Width Text Section -->
                    <div class="col-span-2">
                        <p class="text-gray-700">
                            Uit analyse van onze informatie, hebben we met verschillende algoritmes een AI-model gemaakt, om te zien welke het beste resultaat geeft.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Other Project 2 -->
            <div class="bg-gray-300 rounded-lg p-6 mb-10">
                <h2 class="text-2xl font-bold text-center mb-4">Data Science project</h2>

                <div class="grid md:grid-cols-2 gap-4">
                    <!-- Analyse Section -->
                    <div class="col-span-2">
                        <h4 class="text-lg font-semibold mb-2">Analyse:</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <img src="{{ asset('images/DC P1.png') }}" alt="Data science" class="w-full h-auto border border-gray-300">
                            </div>
                            <div class="mb-4">
                                <img src="{{ asset('images/DC P2.png') }}" alt="Data science" class="w-full h-auto border border-gray-300">
                            </div>
                        </div>
                    </div>

                    <!-- Full-Width Text Section -->
                    <div class="col-span-2">
                        <p class="text-gray-700">
                            Dit was het eerste project waarbij we info moesten halen van website en daaruit vergelijkingen maken.
                            Dit was een project dat we alleen moesten maken en dat was een hele uitdaging en heb het me heier moeilijk gemaakt, maar ik kwam er toch uit.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-eventshoplayout>
