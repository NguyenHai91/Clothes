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
    		'username' => 'haihai',
    		'email' => 'hai@gmail.com',
    		'password' => '123',
    		'fullname' => 'hai nguyen',
    		'phone' => '123456',
    		'address' => '123 da nang',
    		'password' => bcrypt('123'),
    		'level' => 1,
    		'avatar' => '123avatar',
    		'active' => 1,
    	]);
        DB::table('size')->insert([
            'size' => 'S'
        ]);
        DB::table('size')->insert([
            'size' => 'M'
        ]);
        DB::table('size')->insert([
            'size' => 'L'
        ]);
        DB::table('size')->insert([
            'size' => 'XL'
        ]);
        
    }
}
