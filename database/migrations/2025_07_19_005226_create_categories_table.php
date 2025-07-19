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
        Schema::create(table: 'categories', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignUlid(column: 'board_id')->references(column: 'id')->on(table: 'boards');
            $table->string(column: 'name', length: 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'categories', callback: function(Blueprint $table): void {
            $table->dropForeign(index: ['board_id']);
        });
        Schema::dropIfExists('categories');
    }
};
