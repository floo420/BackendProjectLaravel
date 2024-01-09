<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('news_id');
            $table->text('comment_text');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users'); // Assuming you have a 'users' table
            $table->foreign('news_id')->references('id')->on('news');   // Assuming you have a 'news' table
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
