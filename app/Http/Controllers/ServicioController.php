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
    public function show($id)
    {
        // Obtener todos los servicios de la base de datos
        $servicio = Servicio::findOrFail($id);
        // Pasar los datos a la vista
        return view('servicios.view', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener todos los servicios de la base de datos
        $servicio = Servicio::findOrFail($id);
        // Pasar los datos a la vista
        return view('servicios.edit', compact('servicio'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        // Encuentra el paciente por su ID
        $servicio = Servicio::findOrFail($id);

        // Verifica si el paciente existe
        if ($servicio) {
            // Actualiza los datos del servicio
            $servicio->update($request->all());

            // Redirige a la lista de servicios con un mensaje de éxito
            return redirect()->route('servicios')->with('success', 'Servicio actualizado exitosamente.');
        } else {
            return redirect()->route('servicios')->with('error', 'Servicio no encontrado.');
        }
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
            return redirect()->route('servicios')->with('success', 'Servicio eliminado exitosamente.');
        } else {
            return redirect()->route('servicios')->with('error', 'Servicio no encontrado.');
        }    
    }
}
