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

}
