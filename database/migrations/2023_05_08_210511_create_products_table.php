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
            $table->string("name");
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
