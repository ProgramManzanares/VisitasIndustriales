<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('num_oficio');
            $table->string('nombre_empresa');
            $table->date('fecha_visita');
            $table->string('cargo_dirigido');
            $table->integer('num_estudiantes');
            $table->string('carrera');
            $table->string('docente');
            $table->string('area');
            $table->text('objetivo');
            $table->string('turno');
            $table->string('contacto')->nullable();
            $table->string('extension')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
