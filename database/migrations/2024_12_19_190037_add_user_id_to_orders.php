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
            // Add 'user_id' as a nullable foreign key
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->after('id'); // Adjust 'after' as per your table structure
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key first before dropping the column
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
