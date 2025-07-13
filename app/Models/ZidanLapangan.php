<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZidanLapangan extends Model
{
    use HasFactory;
    protected $table = 'zidan_lapangan';
    protected $fillable = [
        'nama_lapangan', 'lokasi', 'deskripsi', 'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
} 