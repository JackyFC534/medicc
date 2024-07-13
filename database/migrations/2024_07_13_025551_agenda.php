<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('agenda', function(Blueprint $table){
            $table->id();
            $table->string('title'); // Título del evento
            $table->foreignId('paciente_id')->nullable()->constrained()->onDelete('cascade'); // Relación con paciente
            $table->foreignId('medico_id')->nullable()->constrained()->onDelete('cascade'); // Relación con médico
            $table->enum('event_type', ['cita', 'plan']); // Tipo de evento
            $table->date('date'); // Fecha del evento
            $table->time('hora')->nullable(); // Hora del evento
            $table->text('motivo')->nullable(); // Motivo para citas
            $table->text('detalles')->nullable(); // Detalles para planes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
    
};
