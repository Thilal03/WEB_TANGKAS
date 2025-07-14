@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 shadow">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="absolute right-0 bottom-0 opacity-20 text-[120px] pointer-events-none select-none">🏸</div>
        <h1 class="text-4xl font-extrabold mb-2 drop-shadow">Dashboard Admin</h1>
        <p class="text-lg">Selamat datang, <span class="font-bold">{{ Auth::user()->name }}</span>!</p>
        <p class="text-sm">Kelola data booking, lapangan, kategori, dan user di sini.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center border-t-4 border-blue-500">
            <div class="bg-blue-100 rounded-full p-4 mb-2">
                <span class="text-3xl">🏸</span>
            </div>
            <div class="text-center">
                <h3 class="text-sm font-semibold text-gray-700">Total Lapangan</h3>
                <p class="text-2xl font-extrabold text-blue-600 mt-1">5</p>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center border-t-4 border-green-500">
            <div class="bg-green-100 rounded-full p-4 mb-2">
                <span class="text-3xl">📋</span>
            </div>
            <div class="text-center">
                <h3 class="text-sm font-semibold text-gray-700">Total Booking</h3>
                <p class="text-2xl font-extrabold text-green-600 mt-1">12</p>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center border-t-4 border-purple-500">
            <div class="bg-purple-100 rounded-full p-4 mb-2">
                <span class="text-3xl">🏷️</span>
            </div>
            <div class="text-center">
                <h3 class="text-sm font-semibold text-gray-700">Total Kategori</h3>
                <p class="text-2xl font-extrabold text-purple-600 mt-1">4</p>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow flex flex-col items-center border-t-4 border-yellow-400">
            <div class="bg-yellow-100 rounded-full p-4 mb-2">
                <span class="text-3xl">👥</span>
            </div>
            <div class="text-center">
                <h3 class="text-sm font-semibold text-gray-700">Total User</h3>
                <p class="text-2xl font-extrabold text-yellow-600 mt-1">25</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-blue-500">
            <div class="mb-2 text-blue-500 text-2xl">🏸</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Kelola Lapangan</h3>
            <p class="text-gray-600 mb-4 text-center">Tambah, edit, atau hapus data lapangan bulutangkis.</p>
            <a href="{{ route('admin.lapangan.index') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-3-6V7m0 0V7m0 0V7" /></svg>
                Kelola Lapangan
            </a>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-purple-500">
            <div class="mb-2 text-purple-500 text-2xl">🏷️</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Kelola Kategori</h3>
            <p class="text-gray-600 mb-4 text-center">Tambah, edit, atau hapus kategori lapangan.</p>
            <a href="{{ route('admin.kategori.index') }}" class="inline-flex items-center gap-2 bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-3-6V7m0 0V7m0 0V7" /></svg>
                Kelola Kategori
            </a>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-green-500">
            <div class="mb-2 text-green-500 text-2xl">📋</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Kelola Booking</h3>
            <p class="text-gray-600 mb-4 text-center">Lihat dan kelola semua booking dari user.</p>
            <a href="{{ route('admin.booking.index') }}" class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-3-6V7m0 0V7m0 0V7" /></svg>
                Kelola Booking
            </a>
        </div>
    </div>
</div>
@endsection 