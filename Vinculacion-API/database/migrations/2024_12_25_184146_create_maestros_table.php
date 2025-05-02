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
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre')->nullable();
            $table->string('ApellidoPaterno')->nullable(); 
            $table->string('ApellidoMaterno')->nullable(); 
            $table->string('ClaveMaestro')->nullable();
            $table->string('CorreoElectronico')->nullable();
            $table->string('Telefono')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
