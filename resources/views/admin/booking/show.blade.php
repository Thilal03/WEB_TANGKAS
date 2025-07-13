@extends('layout.app')

@section('title', 'Detail Booking')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Detail Booking</h2>
            <a href="{{ route('admin.booking.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">Kembali</a>
        </div>

        <div class="bg-white shadow rounded-lg p-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Informasi Booking -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Informasi Booking</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="font-semibold">ID Booking:</span>
                            <span class="ml-2">#{{ $booking->id }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Tanggal Booking:</span>
                            <span class="ml-2">{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Jam:</span>
                            <span class="ml-2">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Nomor HP:</span>
                            <span class="ml-2">{{ $booking->nomor_hp }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Status:</span>
                            <span class="ml-2 px-2 py-1 rounded-full text-xs font-semibold 
                                @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($booking->status == 'confirmed') bg-green-100 text-green-800
                                @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                @else bg-blue-100 text-blue-800 @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                        <div>
                            <span class="font-semibold">Dibuat:</span>
                            <span class="ml-2">{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Informasi User -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Informasi User</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="font-semibold">Nama:</span>
                            <span class="ml-2">{{ $booking->user->name }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Email:</span>
                            <span class="ml-2">{{ $booking->user->email }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Role:</span>
                            <span class="ml-2">{{ ucfirst($booking->user->role) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Lapangan -->
            <div class="mt-8">
                <h3 class="text-xl font-bold mb-4">Informasi Lapangan</h3>
                <div class="space-y-3">
                    <div>
                        <span class="font-semibold">Nama Lapangan:</span>
                        <span class="ml-2">{{ $booking->lapangan->nama_lapangan }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Lokasi:</span>
                        <span class="ml-2">{{ $booking->lapangan->lokasi }}</span>
                    </div>
                    @if($booking->lapangan->deskripsi)
                        <div>
                            <span class="font-semibold">Deskripsi:</span>
                            <span class="ml-2">{{ $booking->lapangan->deskripsi }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Update Status -->
            <div class="mt-8 pt-6 border-t">
                <h3 class="text-xl font-bold mb-4">Update Status</h3>
                <form method="POST" action="{{ route('admin.booking.updateStatus', $booking->id) }}" class="flex items-center space-x-4">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="border rounded px-3 py-2">
                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Status</button>
                </form>
            </div>

            <!-- Konfirmasi WhatsApp -->
            @if($booking->status == 'pending')
            <div class="mt-6 pt-6 border-t">
                <h3 class="text-xl font-bold mb-4">Konfirmasi WhatsApp</h3>
                <a href="https://wa.me/{{ $booking->nomor_hp }}?text=Halo {{ $booking->user->name }}, booking Anda untuk lapangan {{ $booking->lapangan->nama_lapangan }} pada {{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }} jam {{ $booking->jam_mulai }}-{{ $booking->jam_selesai }} telah dikonfirmasi. Terima kasih!" 
                   target="_blank" 
                   class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    📱 Konfirmasi via WhatsApp
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 