<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZidanLapangan;
use App\Models\Kategori;

class AdminLapanganController extends Controller
{
    public function index()
    {
        $lapangans = ZidanLapangan::with('kategori')->get();
        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.lapangan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'lokasi' => 'required',
            'kategori_id' => 'required|exists:zidan_kategori,id',
            'deskripsi' => 'nullable',
        ]);
        ZidanLapangan::create($request->all());
        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lapangan = ZidanLapangan::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.lapangan.edit', compact('lapangan', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'lokasi' => 'required',
            'kategori_id' => 'required|exists:zidan_kategori,id',
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