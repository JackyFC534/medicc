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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('id_paciente');
            $table->float('talla');
            $table->float('peso');
            $table->float('temperatura');
            $table->float('presion');
            $table->float('oxigeno');
            $table->float('frecuencia');

            //$table->unsignedBigInteger('id_paciente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
