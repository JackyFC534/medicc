<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class ConsultaController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::all();
        // Pasar los datos a la vista
        return view('consultas.new', compact('pacientes'));
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);

        return view('consultas.new', compact('paciente'));
    }
}
