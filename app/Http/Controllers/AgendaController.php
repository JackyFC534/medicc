<?php

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
        $citas = Agenda::all();

        //return response()->json(Agenda::all());
        return view('agenda.agenda', compact('pacientes', 'medicos', 'citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paciente' => 'required|integer',
            'id_medico' => 'required|integer',
            'date' => 'required|date',
            'hora' => 'required|string',
            'motivo' => 'required|string',
        ]);
    
        $cita = Agenda::create([
            'id_paciente' => $request->id_paciente,
            'id_medico' => $request->id_medico,
            'date' => $request->date,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
        ]);
    
        // Formatear el evento para FullCalendar
        $citaEvent = [
            'id' => $cita->id,
            'title' => "{$cita->hora} - " . $cita->paciente->nombres . ' ' . $cita->paciente->apellidos,
            'start' => $cita->date . 'T' . $cita->hora . ':00',
            'extendedProps' => [
                'medico' => $cita->medico->nombres . ' ' . $cita->medico->apellidos,
                'motivo' => $cita->motivo,
            ],
        ];

        //return response()->json(['message' => 'Evento creado correctamente']);
        return redirect()->route('agenda')->with('success', 'Cita agregada exitosamente.');
    }

    public function destroy($id)
    {
        $cita = Agenda::findOrFail($id);
        $cita->delete();

        //return redirect()->route('agenda.agenda')->with('success', 'Cita eliminada exitosamente.');
        return redirect()->route('agenda')->with('success', 'Cita eliminada exitosamente.');

    }

    public function fetchEvents()
    {
        $citas = Agenda::with(['paciente', 'medico'])->get(); // Asegúrate de que tus relaciones están definidas en el modelo Agenda

        return response()->json($citas);
    }

    public function fetchEventDetails($id)
    {
        $cita = Agenda::with(['paciente', 'medico'])->findOrFail($id);

        return response()->json($cita);
    }

    public function edit($id)
    {
        $cita = Agenda::findOrFail($id);
        return view('agenda', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        $cita = Agenda::findOrFail($id);

        if ($cita) {
            $cita->update($request->all());

            return redirect()->route('agenda')->with('success', 'Cita actualizado exitosamente.');
        } else {
            return redirect()->route('agenda')->with('error', 'Cita no encontrado.');
        }
    }
}
