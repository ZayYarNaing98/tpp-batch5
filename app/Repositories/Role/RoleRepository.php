<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function index()
    {
        return Role::get();
    }

    public function store($validatedData)
    {
        $role = Role::create($validatedData);

        return $role;

    }

    public function show($id)
    {
        return Role::with('permissions')->where('id', $id)->first();
    }

    public function update($validatedData, $id)
    {
        $role = Role::with('permissions')->where('id', $id)->first();

        $role->permissions()->sync($validatedData['permissions']);

        return $role->update($validatedData);
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        return $role->delete();
    }

}
