@extends('layout.app')

@section('title', 'Homepage - Booking Lapangan Bulutangkis')

@section('content')
<!-- Success Message -->
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 mx-4 mt-4">
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

<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di TANGKAS</h1>
        <p class="text-xl mb-8">Sistem Booking Lapangan Bulutangkis Terbaik</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking.index') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Booking Sekarang</a>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="bg-yellow-400 text-blue-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition">Admin Dashboard</a>
            @endif
        </div>
    </div>
</div>

<!-- User Info Section -->
<div class="py-8 bg-white">
    <div class="container mx-auto text-center">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            <p class="font-semibold">Selamat datang, {{ Auth::user()->name }}!</p>
            <p class="text-sm">
                @if(Auth::user()->isAdmin())
                    Anda login sebagai Administrator.
                @else
                    Anda telah berhasil login ke sistem TANGKAS.
                @endif
            </p>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Mengapa Memilih Kami?</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center bg-white p-6 rounded-lg shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">🏸</span>
                </div>
                <h3 class="text-xl font-semibold mb-2">Lapangan Berkualitas</h3>
                <p class="text-gray-600">Lapangan bulutangkis dengan standar internasional</p>
            </div>
            <div class="text-center bg-white p-6 rounded-lg shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">📱</span>
                </div>
                <h3 class="text-xl font-semibold mb-2">Booking Online</h3>
                <p class="text-gray-600">Booking mudah dan cepat melalui sistem online</p>
            </div>
            <div class="text-center bg-white p-6 rounded-lg shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">💰</span>
                </div>
                <h3 class="text-xl font-semibold mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600">Harga bersaing dengan fasilitas terbaik</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Aksi Cepat</h2>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-blue-50 p-8 rounded-lg text-center hover:shadow-lg transition">
                <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl text-white">📅</span>
                </div>
                <h3 class="text-xl font-semibold mb-4">Booking Lapangan</h3>
                <p class="text-gray-600 mb-6">Pilih lapangan dan waktu yang sesuai dengan jadwal Anda</p>
                <a href="{{ route('booking.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Mulai Booking</a>
            </div>
            <div class="bg-green-50 p-8 rounded-lg text-center hover:shadow-lg transition">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl text-white">👤</span>
                </div>
                <h3 class="text-xl font-semibold mb-4">Profil Saya</h3>
                <p class="text-gray-600 mb-6">Kelola profil dan lihat riwayat booking Anda</p>
                <a href="#" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">Lihat Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection 