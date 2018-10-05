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
    }
}
