<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZidanLapangan;
use App\Models\ZidanBooking;

class BookingController extends Controller
{
    public function index()
    {
        $lapangans = ZidanLapangan::all();
        return view('booking.index', compact('lapangans'));
    }

    public function show($id)
    {
        $lapangan = ZidanLapangan::findOrFail($id);
        return view('booking.show', compact('lapangan'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'durasi' => 'required|integer|min:1|max:4',
            'nomor_hp' => 'required|string|min:10|max:15',
        ]);

        $lapangan = ZidanLapangan::findOrFail($id);
        
        // Hitung jam selesai
        $jam_mulai = $request->jam_mulai;
        $durasi = $request->durasi;
        $jam_selesai = date('H:i:s', strtotime($jam_mulai . ' + ' . $durasi . ' hours'));

        // Buat booking
        $booking = ZidanBooking::create([
            'user_id' => auth()->id(),
            'lapangan_id' => $lapangan->id,
            'tanggal_booking' => $request->tanggal,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'nomor_hp' => $request->nomor_hp,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking berhasil dibuat!');
    }
} 