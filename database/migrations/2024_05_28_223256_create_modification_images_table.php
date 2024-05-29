<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificationImagesTable extends Migration
{
    public function up()
    {
        Schema::create('modification_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modification_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modification_images');
    }
}
