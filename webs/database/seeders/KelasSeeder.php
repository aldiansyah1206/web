<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'name' => 'X',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XII',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
