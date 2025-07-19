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
        Schema::create(table: 'topics', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignUlid(column: 'board_id')->references(column: 'id')->on(table: 'boards');
            $table->foreignId(column: 'category_id')->references(column: 'id')->on(table: 'categories');
            $table->foreignId(column: 'creator_id')->nullable()->references(column: 'id')->on(table: 'users');
            $table->string(column: 'content', length: 1000);
            $table->text(column: 'notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'topics', callback: function (Blueprint $table): void {
            $table->dropForeign(index: ['board_id']);
            $table->dropForeign(index: ['category_id']);
            $table->dropForeign(index: ['creator_id']);
        });
        Schema::dropIfExists(table: 'topics');
    }
};
