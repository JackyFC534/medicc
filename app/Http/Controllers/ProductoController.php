<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los ´productos de la base de datos
        $productos = Producto::all();
        // Pasar los datos a la vista
        return view('productos.crud', compact('productos'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener todos los productos de la base de datos
        $producto = Producto::findOrFail($id);
        // Pasar los datos a la vista
        return view('productos.view', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener todos los productos de la base de datos
        $producto = Producto::findOrFail($id);
        // Pasar los datos a la vista
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Encuentra el producto por su ID
        $producto = Producto::findOrFail($id);

        // Verifica si el producto existe
        if ($producto) {
            // Actualiza los datos del producto
            $producto->update($request->all());

            // Redirige a la lista de productos con un mensaje de éxito
            return redirect()->route('productos')->with('success', 'producto actualizado exitosamente.');
        } else {
            return redirect()->route('productos')->with('error', 'producto no encontrado.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.new'); // Pasar los pacientes a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Producto::create($request->all());

        return redirect()->route('productos')->with('success', 'Producto registrado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el productos por su ID
        $productos = Producto::find($id);

        // Verifica si el productos existe
        if ($productos) {
            // Elimina el registro
            $productos->delete();

            // Redirige a la lista de productoss con un mensaje de éxito
            return redirect()->route('productoss')->with('success', 'productos eliminado exitosamente.');
        } else {
            return redirect()->route('productoss')->with('error', 'productos no encontrado.');
        }
    }
}
