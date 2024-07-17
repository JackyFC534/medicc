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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_venta')->nullable()->constrained()->onDelete('cascade');
            $table->float('monto');
            $table->date('fecha');
            $table->enum('estatus_pago',['pagado','pendiente','cancelado'])->nullable();
            $table->enum('metodo_pago',['efectivo','credito','debito','transferencia'])->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
