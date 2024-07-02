<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Auth\Guard;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // create roles for users
         Role::create([
            'name' =>'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' =>'pembina',
            'guard_name' => 'pembina'
        ]);

        Role::create([
            'name' =>'siswa',
            'guard_name' => 'siswa'
        ]);
    }
}