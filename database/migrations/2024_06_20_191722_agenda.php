<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('prueba_Agenda', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->foreignId('id_medico');
            $table->foreignId('id_paciente');
            $table->date('fecha');
            $table->foreignId('id_cita');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
    
};
