<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContadorOficiosTable extends Migration
{
    public function up()
    {
        Schema::create('contador_oficios', function (Blueprint $table) {
            $table->id();
            $table->integer('contador')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contador_oficios');
    }
}
;
