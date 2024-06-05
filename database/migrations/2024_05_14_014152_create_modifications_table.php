<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('modifications')) {
            Schema::create('modifications', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(\App\Models\Build::class)->constrained()->onDelete('cascade');
                $table->string('category');
                $table->string('name');
                $table->string('brand')->nullable();
                $table->decimal('price', 8, 2)->nullable();
                $table->string('part')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('modifications');
    }
};
