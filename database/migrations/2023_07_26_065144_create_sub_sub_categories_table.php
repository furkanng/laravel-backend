<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name")->nullable();
            $table->integer("sub_category_id");
            $table->integer("brands");//TOOD: DÜŞÜN BUNU
            $table->string("seo_link")->nullable();
            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->boolean("status")->default(true);
            $table->timestamps();
            $table->foreign("sub_category_id")->references("id")->on("sub_categories");
            $table->foreign("brands")->references("id")->on("brands");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_sub_categories');
    }
};