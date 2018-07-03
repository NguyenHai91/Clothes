<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	DB::table('users')->insert([
    		'username' => 'admin',
    		'email' => 'admin@gmail.com',
    		'password' => '123',
    		'fullname' => 'Admin',
    		'phone' => '123456',
    		'address' => '123 da nang',
    		'password' => bcrypt('123'),
    		'level' => 1,
    		'avatar' => '123avatar',
    		'active' => 1,
    	]);
    }
}
