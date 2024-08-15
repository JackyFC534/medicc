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

    public function show($id)
    {
        $cita = Agenda::where('id', $id)->get()[0];
        $productos = Producto::all();
        $servicios = Servicio::all();

        return view('consultas.new', compact('cita', 'productos', 'servicios'));
    }

    public function store(Request $request){
        echo $request->motivo;
    }

}
