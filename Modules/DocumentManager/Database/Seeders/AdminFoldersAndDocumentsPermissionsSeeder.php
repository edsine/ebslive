<?php

namespace Modules\DocumentManager\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminFoldersAndDocumentsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayOfPermissionNames =
            [
                'read any folder',
                'update any folder',
                'delete any folder',
                'read any document',
                'update any document',
                'delete any document',

                'read branch folder',
                'update branch folder',
                'delete branch folder',
                'read branch document',
                'update branch document',
                'delete branch document',

                'read department folder',
                'update department folder',
                'delete department folder',
                'read department document',
                'update department document',
                'delete department document',
            ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        // Assign permissions to Super admin role
        $super_admin_role = Role::first();
        $super_admin_role->givePermissionTo(Permission::all());
    }
}
