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
        Schema::create('pembayaranlaundries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_staff'); 
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_hargalaundries');
            $table->timestamps();

            $table->foreign('id_staff')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->foreign('id_hargalaundries')->references('id')->on('hargalaundries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaranlaundries');
    }
};
