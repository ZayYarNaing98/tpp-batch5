<?php

namespace App\Repositories\Permission;

use Spatie\Permission\Models\Permission;
use App\Repositories\User\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function index()
    {
        return Permission::with('roles')->get();
    }

    public function store($validatedData)
    {
        return Permission::create($validatedData);
    }

    public function show($id)
    {
        return Permission::with('roles')->where('id', $id)->first();
    }

    public function update($validatedData, $id)
    {
        $permission = Permission::with('roles')->where('id', $id)->first();

        return $permission->update($validatedData);
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        return permission->delete();
    }

}
