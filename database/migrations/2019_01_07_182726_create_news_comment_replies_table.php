<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_active')->default(0);
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->string('user_id');
            $table->integer('news_comment_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('news_comment_id')->references('id')->on('news_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news_comment_replies');
    }
}
