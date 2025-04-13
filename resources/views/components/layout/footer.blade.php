<!-- Footer -->
<footer class="bg-gray-700 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0  md:space-x-8">
                <!-- Footer Navigation -->
                <div>
                    <h4 class="font-bold">Quick Links</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('projects') }}">Projects</a></li>
                    </ul>
                </div>

                <!-- Social Media Links -->
                <div>
                    <h4 class="font-bold">Social Media</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="https://www.instagram.com/_brent_paessens/"><x-phosphor-instagram-logo class="w-6 h-6"/></a></li>
                        <li><a href="https://www.linkedin.com/in/brent-paessens/"><x-phosphor-linkedin-logo class="w-6 h-6"/></a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-gray-300 mt-4 md:mt-0">
                &copy; {{ date('Y') }} Brent Paessens
            </div>
        </div>
    </div>
</footer>
