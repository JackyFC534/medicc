<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Paciente;
use App\Models\Medico;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los pago de la base de datos
        $pagos = Pagos::all();
        // Pasar los datos a la vista
        return view('pagos.crud', compact('pagos'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener todos los pagos de la base de datos
        $pago = Pagos::findOrFail($id);
        // Pasar los datos a la vista
        return view('pagos.view', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener todos los pagos de la base de datos
        $pago = Pagos::findOrFail($id);
        // Pasar los datos a la vista
        return view('pagos.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Encuentra el pago por su ID
        $pago = Pagos::findOrFail($id);

        // Verifica si el pago existe
        if ($pago) {
            // Actualiza los datos del pago
            $pago->update($request->all());

            // Redirige a la lista de pagos con un mensaje de éxito
            return redirect()->route('pagos')->with('success', 'pago actualizado exitosamente.');
        } else {
            return redirect()->route('pagos')->with('error', 'pago no encontrado.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        // Pasar los datos a la vista
        return view('pagos.new', compact('pacientes','medicos')); // Pasar los pacientes a la vista

        //return view('pagos.new'); // Pasar los pacientes a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pagos::create($request->all());

        return redirect()->route('pagos')->with('success', 'Pago registrado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el pagos por su ID
        $pagos = Pagos::find($id);

        // Verifica si el pagos existe
        if ($pagos) {
            // Elimina el registro
            $pagos->delete();

            // Redirige a la lista de pagos con un mensaje de éxito
            return redirect()->route('pagos')->with('success', 'Pago eliminado exitosamente.');
        } else {
            return redirect()->route('pagos')->with('error', 'Pago no encontrado.');
        }
    }
}
