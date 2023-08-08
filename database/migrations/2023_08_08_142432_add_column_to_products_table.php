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
        Schema::table('products', function (Blueprint $table) {
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
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
