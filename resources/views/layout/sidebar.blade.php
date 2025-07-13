<aside class="w-64 bg-white shadow-lg min-h-screen flex flex-col">
    <div class="p-6 border-b">
        <span class="text-2xl font-bold text-blue-600">TANGKAS</span>
    </div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-50 @if(request()->routeIs('admin.dashboard')) bg-blue-100 font-semibold @endif">
            <span class="inline-block mr-2">🏠</span> Dashboard
        </a>
        <a href="{{ route('admin.lapangan.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 @if(request()->routeIs('admin.lapangan.*')) bg-blue-100 font-semibold @endif">
            <span class="inline-block mr-2">🏸</span> Kelola Lapangan
        </a>
        <a href="{{ route('admin.booking.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 @if(request()->routeIs('admin.booking.*')) bg-blue-100 font-semibold @endif">
            <span class="inline-block mr-2">📋</span> Kelola Booking
        </a>
        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Logout?')">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-50 text-red-600">
                <span class="inline-block mr-2">🚪</span> Logout
            </button>
        </form>
    </nav>
    <div class="p-4 text-xs text-gray-400 border-t mt-auto">&copy; {{ date('Y') }} TANGKAS</div>
</aside> 