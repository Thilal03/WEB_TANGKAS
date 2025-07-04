@extends('layout.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
    @if($errors->any())
        <div class="mb-4 text-red-600">
            {{ $errors->first() }}
        </div>
    @endif
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-1">Nama</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required autofocus>
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-1">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-1">Password</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
    </form>
    <div class="mt-4 text-center">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
    </div>
</div>
@endsection 