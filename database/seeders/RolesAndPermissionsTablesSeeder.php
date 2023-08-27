<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0) {
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            $arrayOfPermissionNames =
                [
                    'create user',
                    'read user',
                    'update user',
                    'delete user',

                    'create role',
                    'read role',
                    'update role',
                    'delete role',
                ];

            $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
                return ['name' => $permission, 'guard_name' => 'web'];
            });

            Permission::insert($permissions->toArray());

            // create roles and assign created permissions

            $super_admin_role = Role::create(['name' => 'super-admin']);
            $super_admin_role->givePermissionTo(Permission::all());

        }
    }
}
