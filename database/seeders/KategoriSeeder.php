<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Indoor',
                'deskripsi' => 'Lapangan bulutangkis indoor dengan AC'
            ],
            [
                'nama_kategori' => 'Outdoor',
                'deskripsi' => 'Lapangan bulutangkis outdoor'
            ],
            [
                'nama_kategori' => 'Premium',
                'deskripsi' => 'Lapangan bulutangkis premium dengan fasilitas lengkap'
            ],
            [
                'nama_kategori' => 'Standard',
                'deskripsi' => 'Lapangan bulutangkis standar'
            ]
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
