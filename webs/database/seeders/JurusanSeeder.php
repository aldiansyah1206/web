<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('jurusan')->insert([
        [
            'nama' => 'ATP 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'ATP 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'ATP 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
        [
            'nama' => 'AK 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'AK 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'AK 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
     
        [
            'nama' => 'TKJ 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'TKJ 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'TKJ 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'nama' => 'TBSM 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'TBSM 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'TBSM 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
         
    ]);
    }
}
