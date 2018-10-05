<?php

use Illuminate\Database\Seeder;

class ExperienceDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experience_details')->insert([
            'user_id' => "1",
            'is_current_job' => "1",
            'starting_date' => "22/9/2017",
            'ending_date' => "22/12/2018",
            'job_title' => "Software Engineer",
            'company_name' => "SE Factory",
            'job_location' => "Bachoura, BDD",
            'description' => "Worked as a full-stack web developer ",
        ]);
    }
}
