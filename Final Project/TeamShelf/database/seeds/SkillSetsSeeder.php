<?php

use Illuminate\Database\Seeder;

class SkillSetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_sets')->insert([
            'user_id' => "1",
            'skill_set_name' => "SQL, React, React Native, Linux, AWS",
            'skill_level' => "Very Good",
        ]);
    }
}
