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
        Schema::create('formulir', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_pengiriman');
            $table->unsignedBigInteger('id_program');
            $table->string('id_pelangganPLN',30);
            $table->string('NIK',16);
            $table->unsignedBigInteger('id_user');
            $table->string('ktp_img',255);
            $table->string('tipe_charger',100);
            $table->string('charger_img',255);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_program')->references('id')->on('program_mitra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir');
    }
};
