<nav class="bg-white shadow mb-4">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/" class="text-lg font-bold text-blue-600">TANGKAS</a>
        <div class="flex items-center space-x-4">
            @auth
                @if(Auth::user()->isAdmin())
                    <!-- Admin Navigation -->
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                    <a href="{{ route('admin.lapangan.index') }}" class="text-gray-700 hover:text-blue-600 transition">Kelola Lapangan</a>
                    <a href="{{ route('admin.booking.index') }}" class="text-gray-700 hover:text-blue-600 transition">Kelola Booking</a>
                    <span class="text-gray-600">|</span>
                    <span class="text-gray-700">Admin: {{ Auth::user()->name }}</span>
                @else
                    <!-- User Navigation -->
                    <a href="{{ route('homepage') }}" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                    <a href="{{ route('booking.index') }}" class="text-gray-700 hover:text-blue-600 transition">Booking</a>
                    <span class="text-gray-600">|</span>
                    <span class="text-gray-700">Hi, {{ Auth::user()->name }}</span>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600 transition">Logout</button>
                </form>
            @else
                <a href="/" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">Register</a>
            @endauth
        </div>
    </div>
</nav> 