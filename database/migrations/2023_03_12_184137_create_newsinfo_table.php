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
        Schema::create('newsinfos', function (Blueprint $table) {
            $table->id();
            $table->String('News_name');
            $table->String('News_url');
            $table->String('News_category');
            $table->unsignedBigInteger('id_langue');
            $table->foreign('id_langue')
                  ->references('id')
                  ->on('langues')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsinfos');
        
    }
};
