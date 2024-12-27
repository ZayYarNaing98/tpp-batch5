<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);

        $user = Role::create(['name' => "user"]);

        $dashboard = Permission::create(['name' => 'dashboard']);

        $categoryList = Permission::create(['name' => 'categoryList']);
        $categoryCreate = Permission::create(['name' => 'categoryCreate']);
        $categoryEdit = Permission::create(['name' => 'categoryEdit']);
        $categoryDelete = Permission::create(['name' => 'categoryDelete']);


        $admin->givePermissionTo([
            $dashboard,

            $categoryList,
            $categoryCreate,
            $categoryEdit,
            $categoryDelete
        ]);

        $user->givePermissionTo([
            $categoryList
        ]);
    }
}
