<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('productos_carros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_auto')->references('id')->on('autos')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('productos_carros');
    }
};
