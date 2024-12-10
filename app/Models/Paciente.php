<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'correo',
        'password',
        'telefono',
        'notas',
    ];

        // Accesor para calcular la edad
        public function getEdadAttribute()
        {
            return Carbon::parse($this->fecha_nacimiento)->age;
        }
}
