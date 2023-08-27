<?php

namespace Modules\DocumentManager\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CorrespondencesPermissionsSeeder extends Seeder
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
                'create correspondence',
                'read correspondence',
                'update correspondence',
                'delete correspondence',
                'assign correspondence to department',
                'read department-correspondence assignment',
                'delete correspondence-department assignment',
                'assign correspondence to user',
                'read user-correspondence assignment',
                'delete correspondence-user assignment',
                'add comment to correspondence'
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
