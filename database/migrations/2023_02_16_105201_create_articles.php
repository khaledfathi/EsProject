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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable(false);
            $table->string("abstract");
            $table->text("content")->nullable(false);
            $table->string("cover_image")->default('/assets/images/default_article_cover.jpg');
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete(); 
            $table->foreignId('user_id')->nullable(false)->references('id')->on('users'); 
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
