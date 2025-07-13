@extends('layout.app')

@section('title', 'Kelola Booking')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Data Booking</h2>
    </div>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lapangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($bookings as $booking)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="font-semibold">{{ $booking->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $booking->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 font-semibold">{{ $booking->lapangan->nama_lapangan }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                        <td class="px-6 py-4">{{ $booking->nomor_hp }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'confirmed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800',
                                    'completed' => 'bg-blue-100 text-blue-800'
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $statusColors[$booking->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.booking.show', $booking->id) }}" class="inline-block bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded mr-2 transition">Detail</a>
                            @if($booking->status == 'pending')
                                <a href="https://wa.me/+62{{ $booking->nomor_hp }}?text=Halo {{ $booking->user->name }}, booking Anda untuk lapangan {{ $booking->lapangan->nama_lapangan }} pada {{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }} jam {{ $booking->jam_mulai }}-{{ $booking->jam_selesai }} telah dikonfirmasi. Terima kasih!" 
                                   target="_blank" 
                                   class="inline-block bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded mr-2 transition">Konfirmasi WA</a>
                            @endif
                            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus booking ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">Belum ada data booking.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 