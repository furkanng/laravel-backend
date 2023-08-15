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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("order_id")->unsigned();
            $table->integer("product_id")->unsigned();
            $table->integer("sub_product_id")->unsigned();
            $table->string("product_name")->nullable();
            $table->string("sub_product_name")->nullable();
            $table->json("variants")->nullable();
            $table->double("price")->nullable();
            $table->string("unit")->nullable();
            $table->string("piece")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
