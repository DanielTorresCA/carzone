<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_orden')->references('id')->on('ordenes')->onDelete('cascade');
            $table->string('estadoPago');
            $table->date('fechaPago');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
