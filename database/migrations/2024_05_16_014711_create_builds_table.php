<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('year');
            $table->string('make');
            $table->string('model');
            $table->string('trim')->nullable();
            $table->string('build_category');
            $table->string('image')->nullable();
            $table->string('additional_images')->nullable();
            $table->integer('hp')->nullable();
            $table->integer('whp')->nullable();
            $table->integer('torque')->nullable();
            $table->integer('weight')->nullable();
            $table->string('vehicleLayout')->nullable();
            $table->string('fuel')->nullable();
            $table->string('zeroSixty')->nullable();
            $table->string('zeroOneHundred')->nullable();
            $table->string('quarterMile')->nullable();
            $table->string('engineType')->nullable();
            $table->string('engineCode')->nullable();
            $table->string('forcedInduction')->nullable();
            $table->string('trans')->nullable();
            $table->string('suspension')->nullable();
            $table->string('brakes')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
    }
};
