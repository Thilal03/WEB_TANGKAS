@extends('layout.app')

@section('title', 'Edit Lapangan')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Lapangan</h2>
        <form method="POST" action="{{ route('admin.lapangan.update', $lapangan->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_lapangan" class="block mb-1 font-semibold">Nama Lapangan</label>
                <input type="text" name="nama_lapangan" id="nama_lapangan" class="w-full border rounded px-3 py-2" value="{{ $lapangan->nama_lapangan }}" required>
            </div>
            <div class="mb-4">
                <label for="lokasi" class="block mb-1 font-semibold">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="w-full border rounded px-3 py-2" value="{{ $lapangan->lokasi }}" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full border rounded px-3 py-2">{{ $lapangan->deskripsi }}</textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('admin.lapangan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection 