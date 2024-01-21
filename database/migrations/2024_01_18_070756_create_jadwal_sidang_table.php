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
        Schema::create('jadwal_sidang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dosen_pembimbing_1_id')->nullable();
            $table->unsignedBigInteger('dosen_pembimbing_2_id')->nullable();
            $table->unsignedBigInteger('dosen_penguji_1_id')->nullable();
            $table->unsignedBigInteger('dosen_penguji_2_id')->nullable();
            $table->unsignedBigInteger('dosen_penguji_3_id')->nullable();
            $table->string('judul_skripsi')->nullable();
            $table->enum('jenis_sidang', ['proposal', 'hasil', 'skripsi']);
            $table->string('deskripsi')->nullable();
            $table->date('tanggal_sidang')->nullable();
            $table->string('waktu_sidang')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('revisi_dosen')->default('Belum Ada');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->where('role_name', 'Student');
            $table->foreign('dosen_pembimbing_1_id')->references('user_id')->on('dosen');
            $table->foreign('dosen_pembimbing_2_id')->references('user_id')->on('dosen');
            $table->foreign('dosen_penguji_1_id')->references('user_id')->on('dosen');
            $table->foreign('dosen_penguji_2_id')->references('user_id')->on('dosen');
            $table->foreign('dosen_penguji_3_id')->references('user_id')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sidang');
    }
};
