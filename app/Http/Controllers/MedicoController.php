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

        Medico::create($validate);

        return redirect()->route('medicos');
    }

    public function destroy($id)
    {
        // Encuentra el médico por su ID
        $medico = Medico::find($id);

        // Verifica si el médico existe
        if ($medico) {
            // Elimina el registro
            $medico->delete();

            // Redirige a la lista de médicos con un mensaje de éxito
            return redirect()->route('medicos')->with('success', 'Médico eliminado exitosamente.');
        } else {
            // Redirige a la lista de médicos con un mensaje de error
            return redirect()->route('medicos')->with('error', 'Médico no encontrado.');
        }
    }   


}
