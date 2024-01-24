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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); 
            $table->string('name_full')->nullable();
            $table->string('nim')->nullable();
            $table->unsignedBigInteger('dosen_pembimbing_1_id')->nullable();
            $table->unsignedBigInteger('dosen_pembimbing_2_id')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->where('role_name', 'Student');
            $table->foreign('dosen_pembimbing_1_id')->references('id')->on('dosen');
            $table->foreign('dosen_pembimbing_2_id')->references('id')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
