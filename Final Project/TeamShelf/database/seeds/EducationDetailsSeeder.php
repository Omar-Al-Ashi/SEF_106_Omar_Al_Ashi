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

        DB::table('education_details')->insert([
            'user_id' => "2",
            'certificate_degree_name' => "BS, Information Technology",
            'major' => 'Information Technology',
            'institute_university_name' => 'AUB',
            'starting_date' => '13/5/2014',
            'ending_date' => '21/9/2018',
            'grade_gpa' => '3',
            'description' => 'Computer Science graduate from AUB',
        ]);

        DB::table('education_details')->insert([
            'user_id' => "3",
            'certificate_degree_name' => "MS, Information Technology",
            'major' => 'Information Technology',
            'institute_university_name' => 'LAU',
            'starting_date' => '13/5/2014',
            'ending_date' => '21/9/2018',
            'grade_gpa' => '3',
            'description' => 'Computer Science graduate from LAU',
        ]);


        DB::table('education_details')->insert([
            'user_id' => "7",
            'certificate_degree_name' => "MS, Information Technology",
            'major' => 'Information Technology',
            'institute_university_name' => 'BAU',
            'starting_date' => '13/5/2014',
            'ending_date' => '21/9/2018',
            'grade_gpa' => '3',
            'description' => 'Computer Science graduate from BAU',
        ]);

        DB::table('education_details')->insert([
            'user_id' => "9",
            'certificate_degree_name' => "MS, Information Technology",
            'major' => 'Information Technology',
            'institute_university_name' => 'BAU',
            'starting_date' => '13/5/2014',
            'ending_date' => '21/9/2018',
            'grade_gpa' => '3',
            'description' => 'Computer Science graduate from BAU',
        ]);
    }
}
