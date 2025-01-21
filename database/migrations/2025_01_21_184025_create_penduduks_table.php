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
            $table->string('nik', 16)->unique(); 
            $table->string('nama');            
            $table->text('alamat');        
            $table->string('kelurahan');        
            $table->unsignedBigInteger('id_staff'); 
            $table->timestamps();

            // Tambahkan foreign key ke tabel staff
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
