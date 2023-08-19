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
        Schema::table('sub_sub_categories', function (Blueprint $table) {
            $table->foreign("sub_category_id")->references("id")->on("sub_categories");
            $table->foreign("brand_id")->references("id")->on("brands");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_sub_categories', function (Blueprint $table) {
            //
        });
    }
};
