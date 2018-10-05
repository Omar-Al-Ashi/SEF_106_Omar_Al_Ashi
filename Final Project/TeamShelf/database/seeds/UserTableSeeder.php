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
    }
}