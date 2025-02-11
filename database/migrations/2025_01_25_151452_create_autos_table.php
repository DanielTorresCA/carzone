<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('motor');
            $table->string('aceleracion');
            $table->string('combustible');
            $table->string('transmision');
            $table->integer('precio');
            $table->string('descripcion');
            $table->foreignId('id_estado')->references('id')->on('estado')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
