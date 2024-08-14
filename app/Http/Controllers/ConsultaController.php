<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agenda;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Medico;

class ConsultaController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::all();
        $citas = Agenda::all();
        $productos = Producto::all();
        $servicios = Servicio::all();
        $medicos = Medico::all();

        // Pasar los datos a la vista
        return view('consultas.new', compact('pacientes', 'productos', 'servicios', 'medicos'));
    }

    public function show($id_paciente, Request $request)
    {
        $paciente = Paciente::findOrFail($id_paciente);
        $productos = Producto::all();
        $servicios = Servicio::all();
        $medicos = Medico::all();

        $medico_id = $request->input('medico');
        $motivo = $request->input('motivo');
        $fecha = $request->input('fecha');

        // Busca el nombre del médico
        $medico = Medico::find($medico_id);
        $nombre_medico = $medico ? $medico->nombres . ' ' . $medico->apellidos : $medico_id;


        return view('consultas.new', compact('paciente', 'productos', 'servicios', 'medico_id', 'motivo', 'fecha', 'medicos', 'nombre_medico'));
    }
}
