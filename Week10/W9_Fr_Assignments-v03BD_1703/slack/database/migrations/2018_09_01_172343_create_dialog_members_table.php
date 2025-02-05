<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDialogMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialog_members', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('member_id')->unsigned();
            $table->integer('dialog_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('users');
            $table->foreign('dialog_id')->references('id')->on('dialogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialog_members');
    }
}
