<?php 

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las ventas de la base de datos
        $ventas = Venta::all();
        // Pasar los datos a la vista
        return view('ventas.crud', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.new'); // Pasar las ventas a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Venta::create($request->all());

        return redirect()->route('ventas')->with('success', 'Venta registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);

        // Verifica si el servicio existe
        if ($venta) {
            // Elimina el registro
            $venta->delete();

            // Redirige a la lista de servicio con un mensaje de éxito
            return redirect()->route('ventas')->with('success', 'Venta eliminada exitosamente.');
        } else {
            return redirect()->route('ventas')->with('error', 'Venta no encontrado.');
        }       
    }
}
