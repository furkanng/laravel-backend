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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->double("price")->nullable();
            $table->boolean("status")->default(true);
            $table->integer("stock")->nullable();
            $table->string("code")->nullable();
            $table->dateTime("date")->nullable();
            $table->text("description")->nullable();
            $table->string("cover_image")->nullable();
            $table->boolean("new_product")->nullable();
            $table->string("spot_text")->nullable();
            $table->foreignId("category_id")->references("id")->on("categories");
            $table->foreignId("subcategory_id")->references("id")->on("subcategories");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
