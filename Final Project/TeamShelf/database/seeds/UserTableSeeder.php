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
            'user_image' => '1.png',
            'password' => bcrypt('password'),
        ]);
    }
}