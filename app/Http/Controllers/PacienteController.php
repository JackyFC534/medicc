<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function index()
    {
                // Obtener todos los pacientes de la base de datos
                $pacientes = Paciente::all();

                // Pasar los datos a la vista
                return view('pacientes.crud', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string',
            'telefono' => 'required|string|max:15',
            'medico_encargado' => 'required|string|max:255',
            'archivo_expediente' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $path = $request->file('archivo_expediente') ? $request->file('archivo_expediente')->store('expedientes') : null;

        Paciente::create([
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'edad' => $request->input('edad'),
            'genero' => $request->input('genero'),
            'telefono' => $request->input('telefono'),
            'medico_encargado' => $request->input('medico_encargado'),
            'archivo_expediente' => $path,
        ]);

        return redirect()->route('pacientes')->with('success', 'Paciente registrado con éxito.');
    }
}
