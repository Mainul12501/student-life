<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('uploader_id')->nullable();
            $table->string('name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->tinyInteger('have_brother')->nullable();
            $table->tinyInteger('have_sister')->nullable();
            $table->string('auth_email')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('habits')->nullable();
            $table->text('profile_image')->nullable();
            $table->string('primary_school')->nullable();
            $table->string('high_school')->nullable();
            $table->string('hsc_college_name')->nullable();
            $table->string('honours_college_name')->nullable();
            $table->string('masters_college_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email_2')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
