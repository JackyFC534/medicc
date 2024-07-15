<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

 
class MedicoController extends Controller
{
    public function index()
    {

        // Obtener todos los medicos de la base de datos
        $medicos = Medico::all();
        
        // Pasar los datos a la vista
        return view('medicos.crud', compact('medicos'));
    }

    public function show($id)
    {
        // Obtener todos los medicos de la base de datos
        $medico = Medico::findOrFail($id);
        // Pasar los datos a la vista
        return view('medicos.view', compact('medico'));
    }

    public function edit($id)
    {
        // Obtener todos los medicos de la base de datos
        $medico = Medico::findOrFail($id);
        // Pasar los datos a la vista
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id){
        // Encuentra el paciente por su ID
        $medico = Medico::findOrFail($id);

        // Verifica si el paciente existe
        if ($medico) {
            // Actualiza los datos del medico
            $medico->update($request->all());

            // Redirige a la lista de medicos con un mensaje de éxito
            return redirect()->route('medicos')->with('success', 'Medico actualizado exitosamente.');
        } else {
            return redirect()->route('medicos')->with('error', 'Medico no encontrado.');
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([ 
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'especialidad' => 'required|string|max:255',
            'cedula_profesional' => 'required|string|max:255',
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
