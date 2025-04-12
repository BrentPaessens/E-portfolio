<footer>
    <div class="w-full mx-auto p-5 text-sm border-t flex flex-col lg:flex-row justify-between items-start lg:items-center bg-blue-300 space-y-4 lg:space-y-0">
        <div class="flex-1">
            <h4 class="font-bold">The Event Shop</h4>
            <p>Kleinhoefstraat 4</p>
            <p>2440 Geel - Belgium</p>
            <p>Phone: <a href="tel:+3214126310">+32(0)14/12.63.10</a></p>
            <p>Email: <a href="mailto:info@eventshop.com">info@eventshop.com</a></p>
        </div>
        <div class="flex-1">
            <h4 class="font-bold">Quick Links</h4>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="flex-1">
            <h4 class="font-bold">Follow Us</h4>
            <ul class="flex space-x-4">
                <li><a href="#"><x-phosphor-facebook-logo class="w-6 h-6"/></a></li>
                <li><a href="#"><x-phosphor-twitter-logo class="w-6 h-6"/></a></li>
                <li><a href="#"><x-phosphor-instagram-logo class="w-6 h-6"/></a></li>
            </ul>
        </div>
        <div class="flex-1">
            <h4 class="font-bold">Legal</h4>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
    </div>

    <div class="w-full mx-auto p-4 text-sm border-t flex justify-between items-center bg-blue-300 space-y-0">
        <div class="flex justify-between w-full">
            <div>The Event Shop - © {{ date('Y') }}</div>
            @env('local')
                <div class="p-2 bg-gray-200 rounded-md"
                     x-data="{showIcons: false}"
                     @click="showIcons = true">
                    <div class="text-gray-400 text-xs text-center cursor-pointer ">
                        <span class="sm:hidden">&lt; 640</span>
                        <span class="hidden sm:block md:hidden">SM | 640 - 768</span>
                        <span class="hidden md:block lg:hidden">MD | 768 - 1024</span>
                        <span class="hidden lg:block xl:hidden">LG | 1024 - 1280</span>
                        <span class="hidden xl:block 2xl:hidden">XL | 1280 - 1536</span>
                        <span class="hidden 2xl:block">2XL |  &gt; 1536</span>
                    </div>
                    <div class="fixed left-0 right-0 bottom-16 p-2 mx-2 sm:mx-8
                    rounded-md border shadow-lg bg-amber-200/25 backdrop-blur-sm
                    flex justify-center space-x-4"
                         x-show="showIcons"
                         x-cloak
                         x-transition.duration.300ms
                         @click.outside="showIcons = false">

                        <x-layout.footer-icon target="_mail"
                                              href="http://localhost:8025"
                                              icon="si-maildotru"/>
                        <x-layout.footer-icon target="_icons"
                                              href="https://blade-ui-kit.com/blade-icons"
                                              icon="fas-icons"/>
                        <x-layout.footer-icon target="_tall"
                                              href="https://tailwindcss.com/docs"
                                              icon="si-tailwindcss"/>
                        <x-layout.footer-icon target="_tall"
                                              href="https://alpinejs.dev/"
                                              icon="si-alpinedotjs"/>
                        <x-layout.footer-icon target="_tall"
                                              href="https://laravel.com/docs/11.x/"
                                              icon="si-laravel"/>
                        <x-layout.footer-icon target="_tall"
                                              href="https://livewire.laravel.com/docs"
                                              icon="si-livewire"/>
                    </div>
                </div>
            @endenv
            <div>Build with Laravel {{ app()->version() }}</div>
        </div>
    </div>
</footer>
