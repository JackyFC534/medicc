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
        $pacientes = Paciente::all();
        dd($pacientes); // Verifica que se están obteniendo los pacientes
        $medicos = Medico::all();
    
        return view('medicos.agenda', compact('pacientes', 'medicos'));
    }
    
    public function store(Request $request)
    {

        // Crear el evento
        Agenda::create($validatedData);

        return redirect()->route('medicos.agenda')->with('success', 'Evento agregado exitosamente.');
    }

}
