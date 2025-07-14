<nav class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-lg mb-4 sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/" class="flex items-center gap-2 text-xl font-extrabold text-blue-700 tracking-wide">
            <span class="inline-block bg-blue-600 text-white rounded-full p-1">
                <!-- Shuttlecock SVG icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 3l10 10m0 0l-4 4m4-4l-4-4m4 4l-6 6m6-6l-6-6" />
                </svg>
            </span>
            TANGKAS
        </a>
        <div class="flex items-center space-x-4">
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Dashboard</a>
                    <a href="{{ route('admin.lapangan.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Kelola Lapangan</a>
                    <a href="{{ route('admin.booking.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Kelola Booking</a>
                    <span class="text-gray-400">|</span>
                    <span class="text-gray-700 font-semibold">Admin: {{ Auth::user()->name }}</span>
                @else
                    <a href="{{ route('homepage') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                    <a href="{{ route('booking.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Booking</a>
                    <span class="text-gray-400">|</span>
                    <span class="inline-flex items-center gap-1 text-gray-700 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Hi, {{ Auth::user()->name }}
                    </span>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600 font-semibold transition">Logout</button>
                </form>
            @else
                <a href="/" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Login</a>
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white px-5 py-2 rounded-lg font-bold shadow transition">Register</a>
            @endauth
        </div>
    </div>
</nav> 