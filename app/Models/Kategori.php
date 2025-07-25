<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'zidan_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function lapangans()
    {
        return $this->hasMany(ZidanLapangan::class, 'kategori_id');
    }
}
