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
            'name' => 'ATP 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'ATP 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'ATP 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
        [
            'name' => 'AK 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'AK 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'AK 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
     
        [
            'name' => 'TKJ 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'TKJ 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'TKJ 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'TBSM 1',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'TBSM 2',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'TBSM 3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
         
    ]);
    }
}
