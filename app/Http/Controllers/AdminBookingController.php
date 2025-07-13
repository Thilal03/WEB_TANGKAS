<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZidanBooking;
use App\Models\User;
use App\Models\ZidanLapangan;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = ZidanBooking::with(['user', 'lapangan'])->orderBy('created_at', 'desc')->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = ZidanBooking::with(['user', 'lapangan'])->findOrFail($id);
        return view('admin.booking.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        $booking = ZidanBooking::findOrFail($id);
        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.booking.index')->with('success', 'Status booking berhasil diupdate!');
    }

    public function destroy($id)
    {
        $booking = ZidanBooking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil dihapus!');
    }
} 