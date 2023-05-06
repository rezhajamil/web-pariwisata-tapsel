<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dest_id');
            $table->string('url');
            $table->boolean('is_cover')->default(false);
            $table->timestamps();

            $table->foreign('dest_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destination_images');
    }
}
