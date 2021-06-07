<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_to');
            $table->unsignedBigInteger('comment_by');
            $table->text('comments')->nullable();
            $table->text('comment_image')->nullable();
            $table->text('comment_audio')->nullable();
            $table->string('comment_to_name')->nullable();
            $table->text('comment_to_image')->nullable();
            $table->string('comment_by_name')->nullable();
            $table->text('comment_by_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_comments');
    }
}
