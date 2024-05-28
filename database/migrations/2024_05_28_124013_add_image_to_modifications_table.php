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
        Schema::table('modifications', function (Blueprint $table) {
            $table->string('image')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('modifications', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
