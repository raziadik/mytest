<?php
namespace Database\Seeders;

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
        $roleUser = Role::create(['name' => 'user']);

        $roleAdministrator->givePermissionTo('all_manage');
        $roleManager->givePermissionTo('user_manage');
        $roleUser->givePermissionTo('user_permission');
    }
}
