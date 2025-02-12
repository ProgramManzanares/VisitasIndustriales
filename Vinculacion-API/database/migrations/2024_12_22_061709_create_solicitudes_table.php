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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table -> id();
            $table -> integer('NumeroOficio');
            $table -> string('NombreSolicitante');
            $table -> string('Cargo');
            $table -> integer('NumeroEstudiantes');
            $table -> string('AreaObservar');
            $table -> string('ObjetivoVisita');
            $table -> string('Turno');
            $table -> date('fecha');
            $table -> enum('StatusSolicitud', ['Aceptado', 'Rechazado']);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
