<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('direccion1');
            $table->string('direccion2');
            $table->string('ciudad');
            $table->string('region');
            $table->string('pais');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
