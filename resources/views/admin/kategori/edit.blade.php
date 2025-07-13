@extends('layout.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Kategori</h2>
        <form method="POST" action="{{ route('admin.kategori.update', $kategori->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_kategori" class="block mb-1 font-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="w-full border rounded px-3 py-2" value="{{ $kategori->nama_kategori }}" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full border rounded px-3 py-2" rows="3">{{ $kategori->deskripsi }}</textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('admin.kategori.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection 