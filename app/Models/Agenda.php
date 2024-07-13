<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'paciente_id',
        'medico_id',
        'event_type',
        'date',
        'hora',
        'motivo',
        'detalles',
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Relación con el modelo Medico
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
