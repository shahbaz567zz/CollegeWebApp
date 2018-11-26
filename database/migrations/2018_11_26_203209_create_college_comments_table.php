<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_active')->default(0);
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->string('user_id');
            $table->integer('college_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('college_comments');
    }
}
