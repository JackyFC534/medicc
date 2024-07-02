<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;

class PacienteController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes de la base de datos
        $pacientes = Paciente::paginate(10);
        // Pasar los datos a la vista
        return view('pacientes.crud', compact('pacientes'));
    }

    public function create()
    {
        $medicos = Medico::all(); // Todos los médicos
        return view('pacientes.new', compact('medicos')); // Pasar los médicos a la vista
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'correo' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'notas' => 'required|string|max:255',
            'id_medico' => 'required|integer',
            'archivo_expediente' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.crud')->with('success', 'Paciente registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
            'notas' => 'nullable|string',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.show', $paciente)->with('success', 'Paciente actualizado exitosamente');
    }

    public function destroy($id)
    {
        // Encuentra el paciente por su ID
        $paciente = Paciente::find($id);

        // Verifica si el paciente existe
        if ($paciente) {
            // Elimina el registro
            $paciente->delete();

            // Redirige a la lista de pacientes con un mensaje de éxito
            return redirect()->route('pacientes.crud')->with('success', 'Paciente eliminado exitosamente.');
        } else {
            return redirect()->route('pacientes.crud')->with('error', 'Paciente no encontrado.');
        }
    }
}
