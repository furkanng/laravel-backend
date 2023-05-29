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
        Schema::create('basket', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->nullable();
            $table->integer("product_id")->nullable();
            $table->json("variant_id")->nullable();
            $table->integer("piece");
            $table->decimal("price", 7, 2);
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket');
    }
};
