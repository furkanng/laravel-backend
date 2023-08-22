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
            $table->integer("category_id")->unsigned()->nullable();
            $table->integer("subcategory_id")->unsigned()->nullable();
            $table->integer("sub_subcategory_id")->unsigned()->nullable();
            $table->integer("brand_id")->unsigned()->nullable();
            $table->string("seo_link");
            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->double("price")->nullable();
            $table->integer("stock")->nullable();
            $table->string("code")->nullable();
            $table->string("unit")->nullable();
            $table->string("tags")->nullable();
            $table->text("content")->nullable();
            $table->string("image")->nullable();
            $table->boolean("new_product")->nullable();
            $table->boolean("home_product")->nullable();
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
