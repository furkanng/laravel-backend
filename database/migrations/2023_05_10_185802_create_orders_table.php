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
            $table->integer("user_id");
            $table->integer("shipping_address");
            $table->integer("invoice_address");
            $table->string("payment_type")->nullable();
            $table->string("payment_status")->nullable();
            $table->string("payment_detail")->nullable();
            $table->text("note")->nullable();
            $table->string("order_code")->nullable();
            $table->string("cargo_company_name")->nullable();
            $table->string("cargo_number")->nullable();
            $table->string("cargo_price")->nullable();
            $table->integer("order_status")->nullable();
            $table->double("total_price");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("shipping_address")->references("id")->on("addresses");
            $table->foreign("invoice_address")->references("id")->on("addresses");
            $table->foreign("order_status")->references("id")->on("order_statuses");
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
