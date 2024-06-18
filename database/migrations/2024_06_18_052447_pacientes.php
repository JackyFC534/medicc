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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('edad');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('telefono');
            $table->string('medico_encargado');
            $table->string('archivo_expediente')->nullable(); // Puede ser nulo, ya que puede no haber archivo cargado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
