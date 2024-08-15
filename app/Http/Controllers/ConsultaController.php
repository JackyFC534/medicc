<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agenda;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Medico;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::all();
        $citas = Agenda::all();
        $productos = Producto::all();
        $servicios = Servicio::all();
        $medicos = Medico::all();

        // Pasar los datos a la vista
        return view('consultas.new', compact('pacientes', 'productos', 'servicios', 'medicos'));
    }

    public function show($id)
    {
        $cita = Agenda::where('id', $id)->get()[0];
        $productos = Producto::all();
        $servicios = Servicio::all();

        return view('consultas.new', compact('cita', 'productos', 'servicios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'cita_id' => 'required|exists:agendas,id',
            'talla' => 'required|numeric',
            'temperatura' => 'required|numeric',
            'oxigeno' => 'required|numeric',
            'frecuencia' => 'required|numeric',
            'peso' => 'required|numeric',
            'tension' => 'required|numeric',
            'motivo' => 'required|string',
            'notas' => 'required|string',
            'recomendaciones' => 'required|string',
            'id_medicamento' => 'nullable|exists:productos,id',
            'frecuencia_medicamento' => 'nullable|string',
            'duracion' => 'nullable|string',
            'id_servicios' => 'nullable|exists:servicios,id',
        ]);
    
        Consulta::create([
            'id_paciente' => $validatedData['id_paciente'],
            'id_medico' => $validatedData['id_medico'],
            'id_cita' => $validatedData['id_cita'],
            'talla' => $validatedData['talla'],
            'temperatura' => $validatedData['temperatura'],
            'oxigeno' => $validatedData['oxigeno'],
            'frecuencia' => $validatedData['frecuencia'],
            'peso' => $validatedData['peso'],
            'tension' => $validatedData['tension'],
            'motivo_consulta' => $validatedData['motivo'],
            'notas_padecimiento' => $validatedData['notas'],
            'recomendaciones' => $validatedData['recomendaciones'],
            'id_medicamento' => $validatedData['id_medicamento'],
            'frecuencia_medicamento' => $validatedData['frecuencia_medicamento'],
            'duracion' => $validatedData['duracion'],
            'id_servicios' => $validatedData['id_servicios'],
        ]);
    
        return redirect()->route('agenda')->with('success', 'Consulta registrada con éxito.');
    }
    
    
}
