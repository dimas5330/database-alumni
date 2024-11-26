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
        Schema::create('data_pribadis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'datapribadi_user_id'
            );
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('goldar', ['A', 'B', 'AB', 'O']);
            $table->string('alamat');
            $table->string('angkatan');
            $table->string('nama_sekolah');
            $table->string('pekerjaan');
            $table->string('nama_kantor');
            $table->string('alamat_kantor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pribadi');
    }
};
