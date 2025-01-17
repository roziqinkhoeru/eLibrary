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
        Schema::create('officers', function (Blueprint $table) {
            $table->string('nip', 18)->primary();
            $table->string('name', 50);
            $table->string('job_title', 50);
            $table->string('phone_number', 15);
            $table->text('address');
            $table->enum('gender', ['L', 'P']);
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
        Schema::dropIfExists('officers');
    }
};
