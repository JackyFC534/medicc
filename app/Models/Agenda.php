<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'start', 
        'end', 
        'medico_id', 
        'paciente'];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
