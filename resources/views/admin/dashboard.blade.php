@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
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
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Admin</h1>
        <p class="text-gray-600">Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
        <p class="text-gray-600">Kelola data booking, lapangan, kategori, dan user di sini.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid md:grid-cols-4 gap-6 mb-6">
        <div class="bg-blue-50 rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-blue-100 rounded-full p-3">
                    <span class="text-2xl">🏸</span>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Lapangan</h3>
                    <p class="text-2xl font-bold text-blue-600">5</p>
                </div>
            </div>
        </div>
        
        <div class="bg-green-50 rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-green-100 rounded-full p-3">
                    <span class="text-2xl">📋</span>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Booking</h3>
                    <p class="text-2xl font-bold text-green-600">12</p>
                </div>
            </div>
        </div>
        
        <div class="bg-purple-50 rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-purple-100 rounded-full p-3">
                    <span class="text-2xl">🏷️</span>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Kategori</h3>
                    <p class="text-2xl font-bold text-purple-600">4</p>
                </div>
            </div>
        </div>
        
        <div class="bg-yellow-50 rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-yellow-100 rounded-full p-3">
                    <span class="text-2xl">👥</span>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total User</h3>
                    <p class="text-2xl font-bold text-yellow-600">25</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Kelola Lapangan</h3>
            <p class="text-gray-600 mb-4">Tambah, edit, atau hapus data lapangan bulutangkis.</p>
            <a href="{{ route('admin.lapangan.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Kelola Lapangan
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Kelola Kategori</h3>
            <p class="text-gray-600 mb-4">Tambah, edit, atau hapus kategori lapangan.</p>
            <a href="{{ route('admin.kategori.index') }}" class="inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                Kelola Kategori
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Kelola Booking</h3>
            <p class="text-gray-600 mb-4">Lihat dan kelola semua booking dari user.</p>
            <a href="{{ route('admin.booking.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Kelola Booking
            </a>
        </div>
    </div>
</div>
@endsection 