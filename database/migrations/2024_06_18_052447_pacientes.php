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
            $table->id(); // Auto-incremento y clave primaria 'id'
            $table->string('nombre');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('telefono');

            $table->unsignedBigInteger('id_medico')->nullable(); // Clave foránea a tabla 'medicos'
            $table->foreign('id_medico')->references('id')->on('medicos');

            $table->unsignedBigInteger('id_expediente')->unique()->nullable(); // Clave foránea a tabla 'expedientes'
            $table->foreign('id_expediente')->references('id')->on('expedientes');

            $table->timestamps(); // Campos 'created_at' y 'updated_at'
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

