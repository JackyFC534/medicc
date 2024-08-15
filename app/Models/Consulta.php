<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'id_medico',
        'id_cita',

        'talla',
        'temperatura',
        'oxigeno',
        'frecuencia',
        'peso',
        'tension',

        'motivo_consulta',
        'notas_padecimiento',
        'recomendaciones',

        'id_medicamento',
        'frecuencia',
        'duracion',

        'id_servicios',
    ];
}
