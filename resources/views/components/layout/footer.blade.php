<!-- Footer -->
<footer class="bg-gray-700 text-white py-8 mt-auto">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8">
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

                <!-- CV Buttons -->
                <div class="mt-6 flex flex-col space-y-2 w-full md:w-auto">
                    <p class="font-bold text-sm">Download mijn CV</p>
                    <a href="{{ asset('./assets/to/CV_BrentPaessens.pdf') }}" download class="bg-black text-white py-2 px-3 rounded-full inline-block hover:bg-gray-800 transition text-center text-sm flex items-center justify-center">
                        <x-phosphor-download class="h-4 w-4"/>
                        Download PDF
                    </a>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-gray-300 mt-4 md:mt-0">
                &copy; {{ date('Y') }} Brent Paessens
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript to handle the browser event -->
<script>
    window.addEventListener('open-cv', event => {
        // Open the CV in a new tab
        window.open(event.detail.url, '_blank');
    });
</script>
