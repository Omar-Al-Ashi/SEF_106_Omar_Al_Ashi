<?php

use Illuminate\Database\Seeder;

class GraduateProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('graduate_profiles')->insert([
            'user_id' => "1",
            'first_name' => 'Omar',
            'last_name' => 'Al-Ashi',
            'residency_location' => 'Barbir, Beirut',
        ]);
    }
}
