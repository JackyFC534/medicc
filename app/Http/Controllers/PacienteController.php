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
            'id_medico' => 'required|string|max:255',
            'id_expediente' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $path = $request->file('id_expediente') ? $request->file('archivo_expediente')->store('expedientes') : null;

        $paciente = new Paciente();
       
        $paciente->nombres = $request->file('nombres');
        $paciente->apellidos = $request->file('apellidos');
        $paciente->edad = $request->file('edad');
        $paciente->genero = $request->file('genero');
        $paciente->telefono = $request->file('telefono');
        $paciente->id_medico = $request->file('id_medico');
        $paciente->id_expediente = $request->file('id_expediente');
        
        Paciente::create($validate);

        $paciente->save();

        return redirect()->route('pacientes.crud');
    }
}
