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
        $validate = $request->validate([ 
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string',
            'telefono' => 'required|string|max:15',
            'medico_encargado' => 'required|string|max:255',
            'archivo_expediente' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $path = $request->file('archivo_expediente') ? $request->file('archivo_expediente')->store('expedientes') : null;

        $paciente = new Paciente();
       
        $paciente->nombre = $request->file('nombres');
        $paciente->apellidos = $request->file('apellidos');
        $paciente->apellidos = $request->file('edad');
        $paciente->apellidos = $request->file('genero');
        $paciente->apellidos = $request->file('telefono');
        $paciente->apellidos = $request->file('medico_encargado');
        $paciente->apellidos = $request->file('archivo_expediente');
        
        #Paciente::create($validate);

        $paciente->save();

        return redirect()->route('dashboard');
    }
}
