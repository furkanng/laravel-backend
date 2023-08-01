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
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments("id");
            $table->string("email")->unique();
            $table->integer("user_id");
            $table->string("name");
            $table->string("surname");
            $table->string("phone");
            $table->text("address");
            $table->string("city");
            $table->string("district");
            $table->string("title")->nullable();
            $table->string("invoice_type")->nullable();
            $table->string("tax_number")->nullable();
            $table->string("tax_area")->nullable();
            $table->string("company_name")->nullable();
            $table->boolean("status")->default(true);
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
