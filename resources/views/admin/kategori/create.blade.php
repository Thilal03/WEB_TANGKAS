@extends('layout.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Tambah Kategori</h2>
        <form method="POST" action="{{ route('admin.kategori.store') }}">
            @csrf
            <div class="mb-4">
                <label for="nama_kategori" class="block mb-1 font-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="w-full border rounded px-3 py-2" rows="3"></textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('admin.kategori.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection 