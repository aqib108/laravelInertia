<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserRoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'enduser']);

        // Create permissions
        $createUserPermission = Permission::create(['name' => 'create-user']);
        $editUserPermission = Permission::create(['name' => 'edit-user']);
        $deleteUserPermission = Permission::create(['name' => 'delete-user']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($createUserPermission, $editUserPermission,$deleteUserPermission);
        $editorRole->givePermissionTo($createUserPermission,$editUserPermission);
    }
}
