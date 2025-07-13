@extends('layout.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Detail Kategori</h2>
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">Kembali</a>
        </div>

        <div class="bg-white shadow rounded-lg p-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Informasi Kategori -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Informasi Kategori</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="font-semibold">ID:</span>
                            <span class="ml-2">#{{ $kategori->id }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Nama Kategori:</span>
                            <span class="ml-2">{{ $kategori->nama_kategori }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Deskripsi:</span>
                            <span class="ml-2">{{ $kategori->deskripsi ?: '-' }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Dibuat:</span>
                            <span class="ml-2">{{ \Carbon\Carbon::parse($kategori->created_at)->format('d/m/Y H:i') }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Diupdate:</span>
                            <span class="ml-2">{{ \Carbon\Carbon::parse($kategori->updated_at)->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Statistik -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Statistik</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="font-semibold">Total Lapangan:</span>
                            <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                {{ $kategori->lapangans->count() }} lapangan
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Lapangan -->
            @if($kategori->lapangans->count() > 0)
                <div class="mt-8 pt-6 border-t">
                    <h3 class="text-xl font-bold mb-4">Lapangan dalam Kategori Ini</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            @foreach($kategori->lapangans as $lapangan)
                                <div class="bg-white p-4 rounded border">
                                    <h4 class="font-semibold text-lg">{{ $lapangan->nama_lapangan }}</h4>
                                    <p class="text-gray-600 text-sm">{{ $lapangan->lokasi }}</p>
                                    <p class="text-gray-500 text-xs mt-2">{{ $lapangan->deskripsi }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="mt-8 pt-6 border-t">
                    <h3 class="text-xl font-bold mb-4">Lapangan dalam Kategori Ini</h3>
                    <div class="bg-gray-50 rounded-lg p-8 text-center">
                        <p class="text-gray-500">Belum ada lapangan dalam kategori ini.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 