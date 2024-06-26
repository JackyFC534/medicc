<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'especialidad',
        'cedula_profesional',
    ];
}
