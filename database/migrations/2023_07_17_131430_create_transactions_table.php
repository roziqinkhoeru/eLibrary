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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 6);
            $table->foreign('student_id')->references('nis')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->string('book_id', 3);
            $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->string('officer_id', 18);
            $table->foreign('officer_id')->references('nip')->on('officers')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('return_date')->nullable();
            $table->enum('status', ['pinjam', 'kembali']);
            $table->integer('penalty')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
