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
        return Role::create($validatedData);
    }

    public function show($id)
    {
        return Role::with('permissions')->where('id', $id)->first();
    }

    public function update($validatedData, $id)
    {
        $role = Role::with('permissions')->where('id', $id)->first();

        return $role->update($validatedData);
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        return role->delete();
    }

}
