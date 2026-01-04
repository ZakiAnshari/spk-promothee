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
        Schema::create('penginapans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penginapan');
            $table->string('alamat_penginapan');
            $table->string('jenis_penginapan');
            $table->string('kontak_penginapan');
            $table->string('harga_penginapan');
            // $table->string('fasilitas_penginapan');
            // $table->text('foto_penginapan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penginapans');
    }
};
