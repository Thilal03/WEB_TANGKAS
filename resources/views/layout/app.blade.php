<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Booking Lapangan Bulutangkis')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    @if (str_starts_with(request()->path(), 'admin'))
        <div class="flex flex-1 min-h-screen">
            @include('layout.sidebar')
            <div class="flex-1 flex flex-col">
                <main class="flex-1 p-6 bg-gray-50">
                    @yield('content')
                </main>
                @include('layout.footer')
            </div>
        </div>
    @else
        @include('layout.navbar')
        <main class="flex-1">
            @yield('content')
        </main>
        @include('layout.footer')
    @endif
</body>
</html> 