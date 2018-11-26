<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_active')->default(0);
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->string('user_id');
            $table->integer('college_comment_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('college_comment_id')->references('id')->on('college_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('college_comment_replies');
    }
}
