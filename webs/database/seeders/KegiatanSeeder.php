<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan')->insert([
            [
                'name' => 'Bola Kaki',
                'deskripsi' => 'Ekstrakurikuler Bola Kaki adalah salah satu kegiatan tambahan di luar jam pelajaran sekolah yang bertujuan untuk mengembangkan bakat dan minat siswa dalam olahraga sepak bola.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bola Voli',
                'deskripsi' => 'Ekstrakurikuler Bola Voli adalah salah satu kegiatan tambahan di luar jam pelajaran sekolah yang bertujuan untuk mengembangkan bakat dan minat siswa dalam olahraga bola voli.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
