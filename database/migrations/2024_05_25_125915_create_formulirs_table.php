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
            $table->string('nama',40);
            $table->unsignedBigInteger('id_program');
            $table->string('id_pelangganPLN',30)->default('null');
            $table->string('NIK',16);
            $table->unsignedBigInteger('id_user');
            $table->string('no_telp',15);
            $table->string('alamat',255);
            $table->string('ktp_img',255);
            $table->string('tipe_charger',100)->default('null');
            $table->string('charger_img',255)->default('null');
            $table->enum('status', ['new', 'revisi', 'acc'])->default('new');
            $table->timestamp('tgl_pengiriman')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_program')->references('id')->on('program_mitra')->onDelete('cascade');
            $table->timestamps();
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
