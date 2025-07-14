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
        <a href="{{ route('admin.kategori.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 @if(request()->routeIs('admin.kategori.*')) bg-blue-100 font-semibold @endif">
            <span class="inline-block mr-2">🗂️</span> Kelola Kategori
        </a>
        <a href="{{ route('admin.booking.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 @if(request()->routeIs('admin.booking.*')) bg-blue-100 font-semibold @endif">
            <span class="inline-block mr-2">📋</span> Kelola Booking
        </a>
        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Logout?')">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold flex items-center gap-2 mt-4 shadow hover:from-red-600 hover:to-red-700 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" /></svg>
                Logout
            </button>
        </form>
    </nav>
    <div class="p-4 text-xs text-gray-400 border-t mt-auto">&copy; {{ date('Y') }} TANGKAS</div>
</aside> 