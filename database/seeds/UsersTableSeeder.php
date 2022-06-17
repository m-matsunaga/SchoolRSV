<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'miori',
            'email' => 'miori@gmail.com',
            'password' => bcrypt('miori0000'),
            'admin_role' => '1'],
        ]);
    }
}
