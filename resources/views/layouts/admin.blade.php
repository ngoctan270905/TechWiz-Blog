<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('theme') === 'dark', sidebarOpen: true }" x-init="$watch('dark', v => {
    localStorage.setItem('theme', v ? 'dark' : 'light');
    document.documentElement.classList.toggle('dark', v);
});
document.documentElement.classList.toggle('dark', dark)">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->user()->id ?? '' }}">

    <title>{{ config('app.name', 'TechWiz') }} — Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex" :class="{ 'pl-0': !sidebarOpen, 'pl-64': sidebarOpen }">
        {{-- Sidebar --}}
        @include('layouts.partials.admin-sidebar')
        {{-- Mobile overlay when sidebar is open --}}
        <div class="fixed inset-0 z-30 bg-black/40 md:hidden" x-show="sidebarOpen" x-transition.opacity
            @click="sidebarOpen = false"></div>

        <div class="flex-1 flex flex-col min-w-0 transition-[padding] duration-200 ease-in-out"
            :class="{ 'md:pl-0': !sidebarOpen, 'md:pl-0': sidebarOpen }">
            {{-- Header --}}
            @include('layouts.partials.admin-header')

            {{-- Content --}}
            <main class="p-4 md:p-6 lg:p-8">
                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
    @auth
        @vite('resources/js/echo.js')
    @endauth

    <!-- Alpine.js cho x-data, x-show, transition -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
