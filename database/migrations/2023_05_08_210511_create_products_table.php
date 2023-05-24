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
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title")->nullable();
            $table->double("price")->nullable();
            $table->integer("stock")->nullable();
            $table->string("code")->nullable();
            $table->dateTime("date")->nullable();
            $table->text("description")->nullable();
            $table->string("cover_image")->nullable();
            $table->boolean("new_product")->nullable();
            $table->string("spot_text")->nullable();
            $table->integer("category_id")->nullable();
            $table->integer("subcategory_id")->nullable();
            $table->json("feature_id")->nullable();
            $table->json("variant_id")->nullable();
            $table->boolean("status")->default(true);
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("subcategory_id")->references("id")->on("subcategories");
            $table->foreign("feature_id")->references("id")->on("features");
            $table->foreign("variant_id")->references("id")->on("variants");
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
