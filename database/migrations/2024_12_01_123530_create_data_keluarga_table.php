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
        Schema::create('data_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'datakeluarga_user_id'
            );
            $table->string('nama_lengkap');
            $table->enum('status', ['Menikah', 'Belum Menikah']);
            $table->string('nama_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->string('tempatlahir_pasangan')->nullable();
            $table->string('tanggallahir_pasangan')->nullable();
            $table->enum('goldar_pasangan', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('nama_anak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_keluarga');
    }
};
