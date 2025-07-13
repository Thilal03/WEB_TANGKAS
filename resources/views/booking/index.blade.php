@extends('layout.app')

@section('title', 'Booking Lapangan')

@section('content')
<div class="container mx-auto py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">Pilih Lapangan Favorit Anda</h1>
        <p class="text-gray-600">Booking lapangan bulutangkis sesuai kebutuhan</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
    @endif

    @if($lapangans->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($lapangans as $lapangan)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <span class="text-6xl text-white">🏸</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $lapangan->nama_lapangan }}</h3>
                    <div class="flex items-center mb-2">
                        <span class="inline-block mr-2">📍</span>
                        <span class="text-gray-600">{{ $lapangan->lokasi }}</span>
                    </div>
                    @if($lapangan->kategori)
                        <div class="flex items-center mb-2">
                            <span class="inline-block mr-2">🏷️</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $lapangan->kategori->nama_kategori }}
                            </span>
                        </div>
                    @endif
                    @if($lapangan->deskripsi)
                        <p class="text-gray-500 text-sm mb-4">{{ $lapangan->deskripsi }}</p>
                    @endif
                    <a href="{{ route('booking.show', $lapangan->id) }}" 
                       class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition">
                        Booking Lapangan
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-6xl mb-4">🏸</div>
            <h3 class="text-xl font-semibold mb-2">Belum Ada Lapangan</h3>
            <p class="text-gray-600">Admin belum menambahkan lapangan. Silakan cek kembali nanti.</p>
        </div>
    @endif
</div>
@endsection 