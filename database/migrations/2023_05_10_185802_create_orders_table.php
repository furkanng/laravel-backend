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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->integer("shipping_address")->unsigned();
            $table->integer("invoice_address")->unsigned();
            $table->string("payment_type");
            $table->string("payment_status");
            $table->string("payment_detail");
            $table->text("note")->nullable();
            $table->string("order_code");
            $table->string("cargo_company_name")->nullable();
            $table->string("cargo_number")->nullable();
            $table->string("cargo_price")->nullable();
            $table->integer("order_status")->unsigned();
            $table->double("total_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
