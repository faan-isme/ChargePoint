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
        Schema::create('hasil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_formulir');
            $table->foreign('id_admin')->references('id')->on('admin')->onDelete('cascade');
            $table->foreign('id_formulir')->references('id')->on('formulir')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil');
    }
};
