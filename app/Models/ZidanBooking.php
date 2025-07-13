<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZidanBooking extends Model
{
    use HasFactory;
    protected $table = 'zidan_booking';
    protected $fillable = [
        'user_id', 'lapangan_id', 'tanggal_booking', 'jam_mulai', 'jam_selesai', 'nomor_hp', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lapangan()
    {
        return $this->belongsTo(ZidanLapangan::class, 'lapangan_id');
    }
} 