<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agenda;
use App\Models\Producto;
use App\Models\Servicio;



class ConsultaController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::all();
        $citas = Agenda::all();
        $productos = Producto::all();
        $servicios = Servicio::all();



        // Pasar los datos a la vista
        return view('consultas.new', compact('pacientes', 'productos', 'servicios'));
    }

    public function show($id_paciente)
    {
        $paciente = Paciente::findOrFail($id_paciente);
        $productos = Producto::all();
        $servicios = Servicio::all();

        //$cita = Agenda::findOrFail($id_cita);

        return view('consultas.new', compact('paciente', 'productos', 'servicios'));
    }
}
