<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->binary('is_current_job');
            $table->string('starting_date');
            $table->string('ending_date');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('job_location');
            $table->string('description');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('graduate_profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience_detail');
    }
}
