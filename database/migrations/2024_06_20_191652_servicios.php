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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('precio');
            $table->integer('id_tipo_servicio');
        });

        Schema::create('tipo_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('tipo_servicios');
    }
};
