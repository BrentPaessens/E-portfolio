<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <meta name="description" content="{{ $description ?? 'Welkom bij mijn  portfolio' }}">
    <title>{{ $title ?? 'Welkom bij mijn  portfolio' }}</title>
    <link rel="icon" href="{{ asset('assets/icons/favicon-96x96.png') }}">
</head>

<body class="font-sans antialiased">
<div class="flex flex-col space-y-0 min-h-screen text-gray-800 bg-gray-100">

    {{--  Navigation  --}}
    <header class="bg-white/70 sticky inset-0 backdrop-blur-sm z-10">
        <x-layout.nav />
    </header>

    <main class="flex-1 w-full">
        {{-- Main content --}}
        {{ $slot }}
    </main>
    <x-layout.footer />
</div>
@stack('script')
@livewireScripts
</body>
</html>
