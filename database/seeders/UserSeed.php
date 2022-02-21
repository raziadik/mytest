<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('password')
        ]);
        $manager->assignRole('manager');
        $user->assignRole('administrator');

    }
}
