@extends('layout.app')

@section('title', 'Kelola Booking')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-700">Data Booking</h2>
    </div>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">{{ session('success') }}</div>
    @endif
    <div class="bg-white shadow-lg rounded-xl overflow-x-auto">
        <table class="min-w-full table-fixed divide-y divide-gray-200 rounded-xl text-xs">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200">
                <tr>
                    <th class="px-2 py-2 w-6 text-left font-bold text-blue-700 uppercase tracking-wider">#</th>
                    <th class="px-2 py-2 w-32 text-left font-bold text-blue-700 uppercase tracking-wider">User</th>
                    <th class="px-2 py-2 w-24 text-left font-bold text-blue-700 uppercase tracking-wider">Lapangan</th>
                    <th class="px-2 py-2 w-20 text-left font-bold text-blue-700 uppercase tracking-wider">Tanggal</th>
                    <th class="px-2 py-2 w-20 text-left font-bold text-blue-700 uppercase tracking-wider">Jam</th>
                    <th class="px-2 py-2 w-20 text-left font-bold text-blue-700 uppercase tracking-wider">No. HP</th>
                    <th class="px-2 py-2 w-20 text-left font-bold text-blue-700 uppercase tracking-wider">Status</th>
                    <th class="px-2 py-2 w-32 text-center font-bold text-blue-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($bookings as $booking)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-2 py-2 font-semibold text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-2 py-2">
                            <div class="font-semibold text-blue-800 truncate">{{ $booking->user->name }}</div>
                            <div class="text-[10px] text-gray-500 truncate">{{ $booking->user->email }}</div>
                        </td>
                        <td class="px-2 py-2 font-semibold text-blue-700 truncate">{{ $booking->lapangan->nama_lapangan }}</td>
                        <td class="px-2 py-2">{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }}</td>
                        <td class="px-2 py-2">{{ $booking->jam_mulai }}-{{ $booking->jam_selesai }}</td>
                        <td class="px-2 py-2">{{ $booking->nomor_hp }}</td>
                        <td class="px-2 py-2">
                            @php
                                $statusMap = [
                                    'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => '⏳'],
                                    'confirmed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => '✅'],
                                    'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => '❌'],
                                    'completed' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => '🏁'],
                                ];
                                $status = $statusMap[$booking->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '•'];
                            @endphp
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold {{ $status['bg'] }} {{ $status['text'] }} shadow-sm">
                                <span>{{ $status['icon'] }}</span> {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="px-2 py-2 text-center">
                            <div class="flex flex-col md:flex-row items-center justify-center gap-1">
                                <a href="{{ route('admin.booking.show', $booking->id) }}"
                                   class="inline-flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded shadow transition-all duration-200 font-semibold text-[10px]"
                                   title="Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z" /></svg>
                                    Detail
                                </a>
                                @if($booking->status == 'pending')
                                <a href="https://wa.me/+62{{ $booking->nomor_hp }}?text=Halo {{ $booking->user->name }}, booking Anda untuk lapangan {{ $booking->lapangan->nama_lapangan }} pada {{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d/m/Y') }} jam {{ $booking->jam_mulai }}-{{ $booking->jam_selesai }} telah dikonfirmasi. Terima kasih!"
                                   target="_blank"
                                   class="inline-flex items-center gap-1 bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded shadow transition-all duration-200 font-semibold text-[10px]"
                                   title="Konfirmasi WhatsApp">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z" /></svg>
                                    WA
                                </a>
                                @endif
                                <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded shadow transition-all duration-200 font-semibold text-[10px]"
                                        title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-2 py-2 text-center text-gray-500">Belum ada data booking.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 