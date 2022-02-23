<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'User',
            'hash' => 'User',
            'email' => 'user@admin.com',
            'password' => bcrypt('password'),
            'type' => 0
        ]);
        $manager = User::create([
            'username' => 'Manager',
            'hash' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('password'),
            'type' => 0
        ]);
        $admin = User::create([
            'username' => 'Admin',
            'hash' => 'Admin',
            'email' => 'admin@manager.com',
            'password' => bcrypt('password'),
            'type' => 0
        ]);

        $user->assignRole('user');
        $manager->assignRole('manager');
        $admin->assignRole('administrator');

    }
}
