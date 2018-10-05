<?php

use Illuminate\Database\Seeder;

class SocialMediasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_media')->insert([
            'user_id' => "1",
            'linkedin' => "linkedin.com/omar",
            'github' => "github.com/omar",
        ]);

        DB::table('social_media')->insert([
            'user_id' => "2",
            'linkedin' => "linkedin.com/samira",
            'github' => "github.com/samira",
        ]);

        DB::table('social_media')->insert([
            'user_id' => "3",
            'linkedin' => "linkedin.com/john",
            'github' => "github.com/john",
        ]);

        DB::table('social_media')->insert([
            'user_id' => "7",
            'linkedin' => "linkedin.com/dani",
            'github' => "github.com/dani",
        ]);

        DB::table('social_media')->insert([
            'user_id' => "9",
            'linkedin' => "linkedin.com/sara",
            'github' => "github.com/sara",
        ]);
    }
}
