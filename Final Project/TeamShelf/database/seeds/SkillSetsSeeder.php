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

        DB::table('skill_sets')->insert([
            'user_id' => "2",
            'skill_set_name' => "Public Speaking, Machine Learning, html, css, javascript",
            'skill_level' => "Average",
        ]);

        DB::table('skill_sets')->insert([
            'user_id' => "3",
            'skill_set_name' => "Public Speaking, SQL, React, React Native, Linux, AWS, css, javascript",
            'skill_level' => "Average",
        ]);

        DB::table('skill_sets')->insert([
            'user_id' => "7",
            'skill_set_name' => "Public Speaking, SQL, React, React Native, Linux, AWS, css, javascript",
            'skill_level' => "Average",
        ]);

        DB::table('skill_sets')->insert([
            'user_id' => "9",
            'skill_set_name' => "Machine Learning, React, React Native, Linux",
            'skill_level' => "Average",
        ]);
    }
}
