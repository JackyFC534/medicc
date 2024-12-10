<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.crud', compact('pacientes'));
    }

    public function show($id)
    {
        // Obtener todos los pacientes de la base de datos
        $paciente = Paciente::findOrFail($id);
        // Pasar los datos a la vista
        return view('pacientes.view', compact('paciente'));
    }

    public function edit($id)
    {
        // Obtener todos los pacientes de la base de datos
        $paciente = Paciente::findOrFail($id);
        // Pasar los datos a la vista
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        // Encuentra el paciente por su ID
        $paciente = Paciente::findOrFail($id);

        // Verifica si el paciente existe
        if ($paciente) {
            // Actualiza los datos del paciente
            $paciente->update($request->all());

            // Redirige a la lista de pacientes con un mensaje de éxito
            return redirect()->route('pacientes')->with('success', 'Paciente actualizado exitosamente.');
        } else {
            return redirect()->route('pacientes')->with('error', 'Paciente no encontrado.');
        }
    }

    public function create()
    {
        return view('pacientes.new'); // Pasar los pacientes a la vista
    }

    public function store(Request $request)
    {
        $data = $request->all();
    
        // Mapear contraseña al campo esperado por la base de datos
        $data['password'] = bcrypt($request->input('contraseña')); // Encriptar contraseña
        unset($data['contraseña']); // Eliminar el campo innecesario
    
        // Guardar el paciente
        Paciente::create($data);
    
        return redirect()->route('pacientes')->with('success', 'Paciente registrado exitosamente.');
    }
    



    public function destroy($id)
    {
        // Encuentra el paciente por su ID
        $paciente = Paciente::find($id);

        // Verifica si el paciente existe
        if ($paciente) {
            // Elimina el registro
            $paciente->delete();

            // Redirige a la lista de pacientes con un mensaje de éxito
            return redirect()->route('pacientes')->with('success', 'Paciente eliminado exitosamente.');
        } else {
            return redirect()->route('pacientes')->with('error', 'Paciente no encontrado.');
        }
    }
}
