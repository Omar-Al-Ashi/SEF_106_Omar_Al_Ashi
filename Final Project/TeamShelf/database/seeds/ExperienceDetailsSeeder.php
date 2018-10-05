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

        DB::table('experience_details')->insert([
            'user_id' => "2",
            'is_current_job' => "1",
            'starting_date' => "22/9/2017",
            'ending_date' => "22/12/2018",
            'job_title' => "Full Stack Web Developer",
            'company_name' => "MindTech",
            'job_location' => "Jounieh",
            'description' => "Worked as a full-stack web developer as well as mobile developer",
        ]);

        DB::table('experience_details')->insert([
            'user_id' => "3",
            'is_current_job' => "1",
            'starting_date' => "22/9/2017",
            'ending_date' => "22/12/2018",
            'job_title' => "Front-End Web Developer",
            'company_name' => "MindTech",
            'job_location' => "Jounieh",
            'description' => "Worked as a full-stack web developer as well as mobile developer",
        ]);

        DB::table('experience_details')->insert([
            'user_id' => "7",
            'is_current_job' => "1",
            'starting_date' => "22/9/2017",
            'ending_date' => "22/12/2018",
            'job_title' => "Machine Learning Expert",
            'company_name' => "VineType",
            'job_location' => "Tripoli Digital District",
            'description' => "Machine learning expert",
        ]);

        DB::table('experience_details')->insert([
            'user_id' => "9",
            'is_current_job' => "1",
            'starting_date' => "22/9/2017",
            'ending_date' => "22/12/2018",
            'job_title' => "Data Mining Specialist",
            'company_name' => "VineType",
            'job_location' => "Tripoli Digital District",
            'description' => "Data Mining expert",
        ]);
    }
}
