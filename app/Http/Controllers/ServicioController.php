<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los servicios de la base de datos
        $servicios = Servicio::all();
        // Pasar los datos a la vista
        return view('servicios.crud', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.new'); // Pasar los servicios a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Servicio::create($request->all());

        return redirect()->route('servicios')->with('success', 'Servicio registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);

        // Verifica si el servicio existe
        if ($servicio) {
            // Elimina el registro
            $servicio->delete();

            // Redirige a la lista de servicio con un mensaje de éxito
            return redirect()->route('servicios')->with('success', 'Paciente eliminado exitosamente.');
        } else {
            return redirect()->route('servicios')->with('error', 'Paciente no encontrado.');
        }    }
}
