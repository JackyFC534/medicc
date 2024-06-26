<?php

// app/Http/Controllers/AgendaController.php
namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Medico;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'medico_id' => 'required|exists:medicos,id',
            'paciente' => 'required|string',
        ]);

        $agenda = Agenda::create($validated);

        return response()->json(['success' => true, 'agenda' => $agenda]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'medico_id' => 'required|exists:medicos,id',
            'paciente' => 'required|string',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($validated);

        return response()->json(['success' => true, 'agenda' => $agenda]);
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return response()->json(['success' => true]);
    }

    public function index()
    {
        $agendas = Agenda::with('medico')->get();
        return response()->json($agendas);
    }

    public function medicoList()
    {
        $medicos = Medico::all();
        return response()->json($medicos);
    }
}
