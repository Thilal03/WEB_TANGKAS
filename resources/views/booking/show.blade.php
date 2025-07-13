@extends('layout.app')

@section('title', 'Booking ' . $lapangan->nama_lapangan)

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Lapangan Info -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                <span class="text-8xl text-white">🏸</span>
            </div>
            <div class="p-8">
                <h1 class="text-3xl font-bold mb-4">{{ $lapangan->nama_lapangan }}</h1>
                <div class="flex items-center mb-4">
                    <span class="inline-block mr-2">📍</span>
                    <span class="text-gray-600">{{ $lapangan->lokasi }}</span>
                </div>
                @if($lapangan->kategori)
                    <div class="flex items-center mb-4">
                        <span class="inline-block mr-2">🏷️</span>
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $lapangan->kategori->nama_kategori }}
                        </span>
                    </div>
                @endif
                @if($lapangan->deskripsi)
                    <p class="text-gray-700">{{ $lapangan->deskripsi }}</p>
                @endif
            </div>
        </div>

        <!-- Booking Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Form Booking</h2>
            <form method="POST" action="{{ route('booking.store', $lapangan->id) }}" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal" class="block mb-2 font-semibold">Tanggal Booking</label>
                        <input type="date" name="tanggal" id="tanggal" 
                               class="w-full border rounded-lg px-4 py-2" 
                               min="{{ date('Y-m-d') }}" required>
                    </div>
                    <div>
                        <label for="jam_mulai" class="block mb-2 font-semibold">Jam Mulai</label>
                        <select name="jam_mulai" id="jam_mulai" class="w-full border rounded-lg px-4 py-2" required>
                            <option value="">Pilih Jam</option>
                            @for($i = 6; $i <= 22; $i++)
                                <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="durasi" class="block mb-2 font-semibold">Durasi (Jam)</label>
                        <select name="durasi" id="durasi" class="w-full border rounded-lg px-4 py-2" required>
                            <option value="">Pilih Durasi</option>
                            <option value="1">1 Jam</option>
                            <option value="2">2 Jam</option>
                            <option value="3">3 Jam</option>
                            <option value="4">4 Jam</option>
                        </select>
                    </div>
                    <div>
                        <label for="nomor_hp" class="block mb-2 font-semibold">Nomor HP</label>
                        <input type="tel" name="nomor_hp" id="nomor_hp" 
                               class="w-full border rounded-lg px-4 py-2" 
                               placeholder="08123456789" required>
                    </div>
                </div>
                <div class="flex justify-between items-center pt-6">
                    <a href="{{ route('booking.index') }}" 
                       class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition">
                        Kembali
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition">
                        Booking Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 