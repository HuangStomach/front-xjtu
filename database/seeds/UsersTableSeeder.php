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
            'token' => 'genee',
            'name' => '技术支持',
            'password' => bcrypt('Support83719730'),
        ]);
    }
}
