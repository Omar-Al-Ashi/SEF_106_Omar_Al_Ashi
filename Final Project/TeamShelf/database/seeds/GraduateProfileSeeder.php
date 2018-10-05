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

        DB::table('graduate_profiles')->insert([
            'user_id' => "2",
            'first_name' => 'Samira',
            'last_name' => 'Hamdan',
            'residency_location' => 'Bshamoun, Aley',
        ]);

        DB::table('graduate_profiles')->insert([
            'user_id' => "3",
            'first_name' => 'john',
            'last_name' => 'Rodrige',
            'residency_location' => 'Jounieh',
        ]);

        DB::table('graduate_profiles')->insert([
            'user_id' => "7",
            'first_name' => 'Dani',
            'last_name' => 'Halawi',
            'residency_location' => 'Tripoli',
        ]);

        DB::table('graduate_profiles')->insert([
            'user_id' => "9",
            'first_name' => 'Sara',
            'last_name' => 'Fareed',
            'residency_location' => 'Tripoli',
        ]);
    }
}
