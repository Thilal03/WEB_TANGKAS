<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZidanLapangan;

class AdminLapanganController extends Controller
{
    public function index()
    {
        $lapangans = ZidanLapangan::all();
        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'nullable',
        ]);
        ZidanLapangan::create($request->all());
        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lapangan = ZidanLapangan::findOrFail($id);
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'nullable',
        ]);
        $lapangan = ZidanLapangan::findOrFail($id);
        $lapangan->update($request->all());
        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $lapangan = ZidanLapangan::findOrFail($id);
        $lapangan->delete();
        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil dihapus!');
    }
} 