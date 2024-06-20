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
            $table->string('nombre');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('telefono');

            $table->unsignedBigInteger('id_medico')->nullable();
            $table->foreign('id_medico')->references('id')->on('medicos');

            $table->unsignedBigInteger('id_expediente')->unique()->nullable();
            $table->foreign('id_expediente')->references('id')->on('expedientes');

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
