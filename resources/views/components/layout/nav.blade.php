<nav class="w-full mx-auto p-4 flex justify-between bg-blue-300 bg-opacity-60">
        {{-- left navigation--}}
        <div class="flex items-center space-x-2">
            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <x-tmk.logo class="w-8 h-8"/>
            </a>
            <a class="hidden sm:block font-medium text-lg" href="{{ route('home') }}">
                The Event Shop
            </a>
            <x-nav-link href="{{ route('shop') }}" :active="request()->routeIs('shop')">
                Shop
            </x-nav-link>
            <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                Contact
            </x-nav-link>
        </div>
        {{-- right navigation --}}
        <div class="relative flex items-center space-x-2">
            @guest
            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                Login
            </x-nav-link>
            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                Register
            </x-nav-link>
            @endguest
                {{-- shopping cart --}}
                @livewire('partials.mini-basket')
                {{-- dropdown navigation--}}
            @auth
            <x-dropdown align="right" width="48">
                {{-- avatar --}}
                <x-slot name="trigger">
                    @livewire('partials.avatar')
                </x-slot>
                <x-slot name="content">
                    {{-- all users --}}
                    @livewire('partials.name')
                    <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>
                    <x-dropdown-link href="{{ route('profile.show') }}">Update Profile</x-dropdown-link>
                    <div class="border-t border-gray-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
                    </form>
                    @if(auth()->user()->admin)
                        <div class="border-t border-gray-100"></div>
                        {{-- admins only --}}
                        <div class="block px-4 py-2 text-xs text-gray-400">Admin</div>
                        <x-dropdown-link href="{{ route('admin.genres') }}">Genres</x-dropdown-link>
                        <x-dropdown-link href="{{ route('admin.events') }}">Events</x-dropdown-link>
                        <div class="border-t border-gray-100"></div>
                        <x-dropdown-link href="{{ route('admin.users') }}">Users</x-dropdown-link>
                        <div class="border-t border-gray-100"></div>
                    @endif
                </x-slot>
            </x-dropdown>
            @endauth
        </div>
</nav>
