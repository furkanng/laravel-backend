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
        Schema::create('branches', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('gsm')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
