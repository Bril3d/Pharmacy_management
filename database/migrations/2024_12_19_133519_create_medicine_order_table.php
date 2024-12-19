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
        Schema::create('medicine_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_order');
    }
};
