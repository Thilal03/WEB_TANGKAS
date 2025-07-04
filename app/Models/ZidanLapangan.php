<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZidanLapangan extends Model
{
    use HasFactory;
    protected $table = 'zidan_lapangan';
    protected $fillable = [
        'nama_lapangan', 'lokasi', 'deskripsi',
    ];
} 