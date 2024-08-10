<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('path');
            $table->string('mime_type');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('files');
    }
};
