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
            $table->integer("category_id")->nullable();
            $table->integer("subcategory_id")->nullable();
            $table->integer("sub_subcategory_id")->nullable();
            $table->integer("brand_id")->nullable();
            $table->integer("variant_category_id")->nullable();
            $table->integer("variant_id")->nullable();
            $table->double("price")->nullable();
            $table->integer("stock")->nullable();
            $table->string("code")->nullable();
            $table->string("unit")->nullable();
            $table->json("tags")->nullable();
            $table->text("description")->nullable();
            $table->string("cover_image")->nullable();
            $table->boolean("new_product")->nullable();
            $table->string("spot_text")->nullable();
            $table->boolean("status")->default(true);
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("subcategory_id")->references("id")->on("sub_categories");
            $table->foreign("sub_subcategory_id")->references("id")->on("sub_sub_categories");
            $table->foreign("variant_category_id")->references("id")->on("variant_categories");
            $table->foreign("variant_id")->references("id")->on("variants");
            $table->foreign("brand_id")->references("id")->on("brands");
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
