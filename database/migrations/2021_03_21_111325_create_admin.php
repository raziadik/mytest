<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'addme',
            'email' => 'raziadik@gmail.com',
            'hash' => 'addme',
            'password' => Hash::make('Raziadik15'),
            'role' => 1,
            'status' => 1,
        ]);

        DB::table('profiles')->insert([
            'id' => 1,
            'user_id' => 1,
            'name' => 'VLADYSLAV PRO',
            'description' => 'Основатель проекта AddMe.plus и просто хороший человек',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
