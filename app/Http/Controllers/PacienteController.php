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
        return view('pacientes.new'); // Pasar los pacientes a la vista
    }

    public function store(Request $request)
    {

        Paciente::create($request->all());

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
