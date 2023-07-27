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
        Schema::create('books', function (Blueprint $table) {
            $table->string('id', 3)->primary();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('isbn', 17);
            $table->string('title', 50);
            $table->string('author', 50);
            $table->string('publisher', 50);
            $table->integer('year')->nullable();
            $table->integer('stock');
            $table->string('cover', 255)->nullable();
            $table->enum('type', ['online', 'offline']);
            $table->string('file', 255)->nullable();
            $table->integer('download')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
