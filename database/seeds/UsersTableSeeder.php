<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'role_id' => '1',
            'company' => '',
            'contact' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
