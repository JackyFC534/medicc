<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;


class MedicoController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $medicos = Medico::all();
        
        // Pasar los datos a la vista
        return view('medicos.crud', compact('medicos'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([ 
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'profesion' => 'required|string|max:255',
            'tipo_medico' => 'required|string|max:255',
        ]);

        $medico = new Medico();
       
        $medico->nombres = $request->file('nombres');
        $medico->apellidos = $request->file('apellidos');
        $medico->correo = $request->file('correo');
        $medico->genero = $request->file('genero');
        $medico->telefono = $request->file('telefono');
        $medico->profesion = $request->file('profesion');
        $medico->tipo_medico = $request->file('tipo_medico');
        
        Medico::create($validate);

        $medico->save();

        return redirect()->route('medicos.crud');

    }


}
