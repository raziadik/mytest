<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdministrator = Role::create(['name' => 'administrator']);
        $roleManager = Role::create(['name' => 'manager']);

        $roleAdministrator->givePermissionTo('edit_profile');
        $roleManager->givePermissionTo('user_manager');
    }
}
