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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'paciente_id' => 'nullable|exists:pacientes,id',
            'medico_id' => 'nullable|exists:medicos,id',
            'event_type' => 'required|in:cita,plan',
            'date' => 'required|date',
            'hora' => 'nullable|date_format:H:i',
            'motivo' => 'nullable|string',
            'detalles' => 'nullable|string',
        ]);

        Agenda::create($validated);

        return response()->json(['success' => true]);
    }

}
