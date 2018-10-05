<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(GraduateProfileSeeder::class);
         $this->call(EducationDetailsSeeder::class);
         $this->call(ExperienceDetailsSeeder::class);
         $this->call(SkillSetsSeeder::class);
         $this->call(SocialMediasSeeder::class);
    }
}
