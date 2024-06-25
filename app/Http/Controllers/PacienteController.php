<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;

class PacienteController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::all();
        // Pasar los datos a la vista
        return view('pacientes.crud', compact('pacientes'));
    }

    public function create()
    {
        $medicos = Medico::all(); // Todos los médicos
        return view('pacientes.new', compact('medicos')); // Pasar los médicos a la vista
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string',
            'telefono' => 'required|string|max:15',
            'id_medico' => 'required|integer',
            'archivo_expediente' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        /*/ Manejo del archivo de expediente
        if ($request->hasFile('archivo_expediente')) {
            $file = $request->file('archivo_expediente');
            $path = $file->store('expedientes', 'public');
            $validate['id_expediente'] = $path;
        }
            */

        Paciente::create($validate);

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
