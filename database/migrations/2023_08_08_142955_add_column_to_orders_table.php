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
        Schema::table('orders', function (Blueprint $table) {
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
