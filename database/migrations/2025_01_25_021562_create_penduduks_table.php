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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique()->nullable(); 
            $table->string('nama')->nullable();            
            $table->text('alamat')->nullable();              
            $table->unsignedBigInteger('id_kelurahan')->nullable(); 
            $table->unsignedBigInteger('id_kecamatan')->nullable(); 
            $table->unsignedBigInteger('id_staff')->nullable(); 
            $table->timestamps();

            // Tambahkan foreign key ke tabel staff
            $table->foreign('id_kelurahan')->references('id')->on('kelurahans')->onDelete('cascade');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('id_staff')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
