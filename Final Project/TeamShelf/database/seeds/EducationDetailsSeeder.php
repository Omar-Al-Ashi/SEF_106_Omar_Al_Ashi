<?php

use Illuminate\Database\Seeder;

class EducationDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_details')->insert([
            'user_id' => "1",
            'certificate_degree_name' => "BS, Computer Science",
            'major' => 'Computer Science',
            'institute_university_name' => 'AUST',
            'starting_date' => '13/5/2014',
            'ending_date' => '21/9/2018',
            'grade_gpa' => '2.7',
            'description' => 'Computer Science graduate from AUST',
        ]);
    }
}
