<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LatestRolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles and assign created permissions

        $roleNames =
            [
                'ED OPERATIONS',
                'MVT',
                'MER',
                'DRILL OFFICER'
            
                
                
            ];

        $roles = collect($roleNames)->map(function ($roles_arrays) {
            return ['name' => $roles_arrays, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()];
        });

        Role::insert($roles->toArray());
    }
}
