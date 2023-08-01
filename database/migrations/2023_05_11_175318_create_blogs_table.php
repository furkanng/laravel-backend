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
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments("id");
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string("seo_link")->nullable();
            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->json('tags')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
