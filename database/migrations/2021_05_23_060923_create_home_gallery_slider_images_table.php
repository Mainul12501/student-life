<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeGallerySliderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_gallery_slider_images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('display_name')->nullable();
            $table->text('mini_image')->nullable();
            $table->text('big_image')->nullable();
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
        Schema::dropIfExists('home_gallery_slider_images');
    }
}
