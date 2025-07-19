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
        Schema::create(table: 'boards', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->string(column: 'name', length: 255);
            $table->foreignId('creator_id')->references(column: 'id')->on(table: 'users');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'boards', callback: function(Blueprint $table): void {
            $table->dropForeign(index: ['creator_id']);
        });

        Schema::dropIfExists(table: 'boards');
    }
};
