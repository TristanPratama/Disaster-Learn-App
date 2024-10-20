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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('usia');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('hp');
            $table->string('institusi');
            $table->string('jenis_anggota');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->integer('nilai_pre')->nullable();
            $table->integer('nilai_post')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
