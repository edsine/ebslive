<?php

namespace App\Http\Controllers;

use Hash;
use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends AppBaseController
{
    /** @var $roleRepository RoleRepository */
    private $roleRepository;
    /** @var $permissionRepository PermissionRepository */
    private $permissionRepository;

    public function __construct(RoleRepository $roleRepo, PermissionRepository $permissionRepo)
    {
        $this->roleRepository = $roleRepo;
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->paginate(10);

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = $this->permissionRepository->all();
        return view('roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();
        $role = $this->roleRepository->create($input);
        $role->syncPermissions($request->get('permissions') ?? []);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        $role_permissions = $role->permissions;

        return view('roles.show')->with([
            'role' => $role,
            'role_permissions' => $role_permissions,
        ]);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $permissions = $this->permissionRepository->all()
            ->map(function ($permission) use ($role) {
                $permission->assigned = $role->permissions
                    ->pluck('id')
                    ->contains($permission->id);

                return $permission;
            });

        return view('roles.edit')->with([
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        if ($role->name == 'super-admin') {
            Flash::error('Cannot edit super admin role');

            return redirect(route('roles.index'));
        }

        $input =  $request->all();
        $role = $this->roleRepository->update($input, $id);
        $role->syncPermissions($request->get('permissions') ?? []);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        if ($role->name == 'super-admin') {
            Flash::error('Cannot delete super admin role');

            return redirect(route('roles.index'));
        }

        $role_users = $role->users();

        if ($role_users->count() > 0) {
            Flash::error('Role is attached to one or more users. It can not be deleted');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }
}
