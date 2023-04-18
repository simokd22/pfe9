<?php

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
        Schema::table('newsinfos', function (Blueprint $table) {
        $table->string('News_image')->nullable();
        $table->string('News_title')->nullable();
        $table->string('News_content')->nullable();
        $table->string('News_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsinfos', function (Blueprint $table) {
            $table->dropColumn('News_image');
            $table->dropColumn('News_title');
            $table->dropColumn('News_content');
            $table->dropColumn('News_date');
        });
    }
};