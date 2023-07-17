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
        Schema::create('students', function (Blueprint $table) {
            $table->string('nis', 6)->primary();
            $table->foreignId('class_school_id')->constrained('class_schools')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name', 50);
            $table->text('address');
            $table->enum('gender', ['L', 'P']);
            $table->string('phone_number', 15);
            $table->date('date_of_birth');
            $table->string('profile_picture', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
