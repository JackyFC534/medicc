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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_medico');
            $table->unsignedBigInteger('id_cita');
            $table->float('talla');
            $table->float('peso');
            $table->float('temperatura');
            $table->float('presion');
            $table->float('oxigeno');
            $table->float('frecuencia');

            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_medico')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('id_cita')->references('id')->on('agendas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};
