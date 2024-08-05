<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agenda;

class ConsultaController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::all();
        $citas = Agenda::all();

        // Pasar los datos a la vista
        return view('consultas.new', compact('pacientes'));
    }

    public function show($id_paciente)
    {
        $paciente = Paciente::findOrFail($id_paciente);
        //$cita = Agenda::findOrFail($id_cita);

        return view('consultas.new', compact('paciente'));
    }
}
