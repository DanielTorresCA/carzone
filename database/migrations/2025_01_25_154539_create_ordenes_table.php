<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('metodoPago');
            $table->foreignId('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
