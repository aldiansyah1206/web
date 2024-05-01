<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::UpdateOrCreate(
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ]
        );

       $role_pembina =  Role::UpdateOrCreate (
            [
                'name' => 'pembina',
                'guard_name' => 'web',
            ],
            [
                'name' => 'pembina',
                'guard_name' => 'web',
            ]
        );

        $role_siswa =Role::UpdateOrCreate (
            [
                'name' => 'siswa',
                'guard_name' => 'web',
            ],
            [
                'name' => 'siswa',
                'guard_name' => 'web',
            ]
        );

        $permission = Permission::UpdateOrCreate ([
            'name' => 'dashboard',
            'guard_name' => 'web',
        ]);

        $permission1 = Permission::UpdateOrCreate ([
            'name' => 'data pembina',
            'guard_name' => 'web',
        ]);

        $permission2 = Permission::UpdateOrCreate ([
            'name' => 'data siswa ',
            'guard_name' => 'web',
        ]);
        
        $permission3 = Permission::UpdateOrCreate ([
            'name' => 'data kelas',
            'guard_name' => 'web',
        ]);


// roleadmin mengizinkan permission
        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission1);
        $role_admin->givePermissionTo($permission2);
        $role_admin->givePermissionTo($permission3);

// rolepembina mengizinkan permission

        $role_siswa->givePermissionTo($permission2);
        $role_siswa->givePermissionTo($permission3);
        
// rolesiswa mengizinkan permission

    }
}
