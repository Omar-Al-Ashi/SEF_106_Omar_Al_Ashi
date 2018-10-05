<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    public function run()
    {
//        $user = new User;
//        $user->name = "name";
//        $user->email= 'admin@admin.com';
//        $user->password= bcrypt("password");
//        $user->save();
        DB::table('users')->insert([
            'id' => "1",
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'type' => 'alumni',
            'DOB' => '19/10/1995',
            'gender' => 'Male',
            'is_active' => '1',
            'contact_number' => '78 916639',
            'user_image' => '1.png',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'id' => "2",
            'name' => "Samira",
            'email' => 'samira@gmail.com',
            'type' => 'alumni',
            'DOB' => '13/8/1994',
            'gender' => 'Female',
            'is_active' => '1',
            'contact_number' => '70 273648',
            'user_image' => '2.jpg',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'id' => "3",
            'name' => "John",
            'email' => 'john@gmail.com',
            'type' => 'alumni',
            'DOB' => '13/8/1994',
            'gender' => 'Male',
            'is_active' => '1',
            'contact_number' => '70 273648',
            'user_image' => '3.png',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'id' => "7",
            'name' => "Dani",
            'email' => 'dani@gmail.com',
            'type' => 'alumni',
            'DOB' => '13/8/1997',
            'gender' => 'Male',
            'is_active' => '1',
            'contact_number' => '70 238448',
            'user_image' => '7.png',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'id' => "9",
            'name' => "Sara",
            'email' => 'sara@gmail.com',
            'type' => 'alumni',
            'DOB' => '13/8/1993',
            'gender' => 'Female',
            'is_active' => '1',
            'contact_number' => '70 238834',
            'user_image' => '9.png',
            'password' => bcrypt('password'),
        ]);
    }
}