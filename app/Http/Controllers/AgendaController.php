<?php

// app/Http/Controllers/AgendaController.php
namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes y médicos de la base de datos
        $pacientes = Paciente::all();
        $medicos = Medico::all();
    
        return view('agenda.agenda', compact('pacientes', 'medicos'));
    }
    
    public function store(Request $request)
    {
        // Crear el evento
        Agenda::create($validatedData);

        return redirect()->route('agenda.agenda')->with('success', 'Evento agregado exitosamente.');
    }

}
