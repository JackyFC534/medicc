<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agenda;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Medico;
use App\Models\Consulta;


use Barryvdh\DomPDF\Facade as PDF;
//use PDF;


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

    public function store(Request $request)
    {
        echo $request->tension_arterial;
    
        Consulta::create([
            'id_paciente' => $request['id_paciente'],
            'id_medico' => $request['id_medico'],
            'id_cita' => $request['id_cita'],
            'talla' => $request['talla'],
            'temperatura' => $request['temperatura'],
            'oxigeno' => $request['oxigeno'],
            'frecuencia' => $request['frecuencia'],
            'peso' => $request['peso'],
            'tension' => $request['tension_arterial'], // ----
            'motivo_consulta' => $request['motivo_consulta'],
            'notas_padecimiento' => $request['notas_padecimiento'],
            'recomendaciones' => $request['recomendaciones'],
            'id_medicamento' => $request['id_medicamento'],
            'frecuencia_medicamento' => $request['frecuencia_medicamento'],
            'duracion' => $request['duracion'],
            'id_servicios' => $request['id_servicios'],
        ]); 
        
    
        return redirect()->route('agenda')->with('success', 'Consulta registrada con éxito.');
    }

    public function crear_pdf($id)
    {
        $pdf = app('dompdf.wrapper');
        $consulta = Consulta::where('id_paciente', $id)->get();
        $estilos = '<style> body {font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;} .container { width: 80%; margin: 20px auto; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 8px; } h1 { text-align: center; color: #333; } .patient-info { margin-bottom: 20px; } .patient-info h2 { color: #666; } .patient-info p { margin: 5px 0; } .appointments { margin-top: 20px; } .appointment { border-bottom: 1px solid #ddd; padding: 10px 0; } .appointment:last-child { border-bottom: none; } .appointment h3 { color: #007BFF; margin: 0; } .appointment p { margin: 5px 0; color: #555; } </style> <br>';
        $cuerpo = $estilos.'<div class="container"><h1>Expediente Médico</h1>';
        $nombrePac = "";
        
        for ($i=0; $i < count(json_decode($consulta, true)); $i++) {
            $cita = Agenda::where('id', $consulta[$i]->id_cita)->get();   

            foreach($cita as $itemCita){ 
                $nombrePac = $itemCita->paciente->nombres. ' ' .$itemCita->paciente->apellidos;
                $cuerpo = $cuerpo.'<div class="patient-info">';
                    $cuerpo = $cuerpo.'<h2>Información del Paciente</h2>';
                    $cuerpo = $cuerpo.'<p><strong>Nombre:</strong> '. $nombrePac .'</p>';
                    $cuerpo = $cuerpo.'<p><strong>Fecha de nacimiento:</strong> '. $itemCita->paciente->fecha_nacimiento .'</p>';
                    $cuerpo = $cuerpo.'<p><strong>Género:</strong> '. $itemCita->paciente->genero .'</p>';
                    $cuerpo = $cuerpo.'<p><strong>Correo:</strong> '. $itemCita->paciente->correo .'</p>';
                    $cuerpo = $cuerpo.'<p><strong>Telefono:</strong> '. $itemCita->paciente->telefono .'</p>';
                    $cuerpo = $cuerpo.'<p><strong>Notas del paciente:</strong> '. $itemCita->paciente->notas .'</p>';

                $cuerpo = $cuerpo.'</div>';

                $cuerpo = $cuerpo.'<div class="appointments">';
                    $cuerpo = $cuerpo.'<h2>Cita Médicas</h2>';
                    $cuerpo = $cuerpo.'<div class="appointment">';
                        
                        $cuerpo = $cuerpo.'<div class="appointments">';
                            $cuerpo = $cuerpo.'<h2>Consulta General</h2>';
                            $cuerpo = $cuerpo.'<div class="appointment">';
                                $cuerpo = $cuerpo.'<p><strong>Fecha:</strong> '. $itemCita->date .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Hora:</strong> '. $itemCita->hora .'</p>';
                                $cuerpo = $cuerpo.' <p><strong>Médico:</strong> '. $itemCita->medico->nombres . $itemCita->medico->apellidos .'</p>';  
                            $cuerpo = $cuerpo.'</div>';
                        $cuerpo = $cuerpo.'</div>';

                        $cuerpo = $cuerpo.'<div class="appointments">';
                            $cuerpo = $cuerpo.'<h2>Detalles de Consulta</h2>';
                            $cuerpo = $cuerpo.'<div class="appointment">';
                                $cuerpo = $cuerpo.'<p><strong>Talla:</strong> '. $consulta[$i]->talla .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Peso:</strong> '. $consulta[$i]->peso .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Temperatura:</strong> '. $consulta[$i]->temperatura .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Saturación de oxigeno:</strong> '. $consulta[$i]->oxigeno .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Frecuencia cardiaca:</strong> '. $consulta[$i]->frecuencia .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Tensión arterial:</strong> '. $consulta[$i]->tension_arterial .'</p>';
                            $cuerpo = $cuerpo.'</div>';
                        $cuerpo = $cuerpo.'</div>';

                        $cuerpo = $cuerpo.'<div class="appointments">';
                        $cuerpo = $cuerpo.'<h2>Tratamientos medicos</h2>';

                        foreach($tratamiento as $itemTratamiento){
                            $cuerpo = $cuerpo.'<div class="appointment">';
                                $cuerpo = $cuerpo.'<p><strong>Motivo consulta:</strong> '. $consulta[$i]->motivo_consulta .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Notas del padecimiento:</strong> '. $consulta[$i]->notas_padecimiento .'</p>';
                                $cuerpo = $cuerpo.'<p><strong>Recomendaciones:</strong> '. $consulta[$i]->recomendaciones .'</p>';
                            $cuerpo = $cuerpo.'</div>';
                        }
                        $cuerpo = $cuerpo.'</div>';

                    $cuerpo = $cuerpo.'</div>';
                $cuerpo = $cuerpo.'</div>';

            }

        }

        $cuerpo = $cuerpo."</div>";
        $pdf->loadHTML($cuerpo);
        return $pdf->download('Expediente de '. $nombrePac .'.pdf');
    }

    /*
    public function crear_pdf($id)
    {
        $pdf = app('dompdf.wrapper');
        $consulta = Consulta::with('paciente', 'medico')->find($id); // Asegúrate de usar `find` para un único registro
    
        // Estilos para el PDF
        $estilos = '
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }
                h1, h2 {
                    color: #333;
                }
                .container {
                    width: 100%;
                    max-width: 800px;
                    margin: auto;
                }
            </style>
            ';
    
        // Cuerpo del contenido
        $cuerpo = $estilos . '
            <div class="container">
                <h1>Consulta</h1>
                <h2>Datos del paciente</h2>
                <p><strong>Nombre:</strong> ' . $consulta->paciente->nombres . ' ' . $consulta->paciente->apellidos . '</p>
                <p><strong>Fecha de nacimiento:</strong> ' . $consulta->paciente->fecha_nacimiento . '</p>
                <p><strong>Género:</strong> ' . $consulta->paciente->genero . '</p>
                <p><strong>Correo:</strong> ' . $consulta->paciente->correo . '</p>
                <p><strong>Teléfono:</strong> ' . $consulta->paciente->telefono . '</p>
                <p><strong>Notas:</strong> ' . $consulta->paciente->notas . '</p>
                
                <h2>Datos de la cita ' . $consulta->id . '</h2>
                <p><strong>Fecha de la consulta:</strong> ' . $consulta->fecha_consulta . '</p>
                <p><strong>Médico:</strong> ' . $consulta->medico->nombres . ' ' . $consulta->medico->apellidos . '</p>
                <p><strong>Motivo:</strong> ' . $consulta->motivo . '</p>
                
                <h2>Signos vitales</h2>
                <p><strong>Talla:</strong> ' . $consulta->talla . ' cm</p>
                <p><strong>Temperatura:</strong> ' . $consulta->temperatura . ' °C</p>
                <p><strong>Saturación de oxígeno:</strong> ' . $consulta->sat_oxigeno . '</p>
                <p><strong>Frecuencia cardiaca:</strong> ' . $consulta->frecuencia . '</p>
                <p><strong>Peso:</strong> ' . $consulta->peso . ' kg</p>
                <p><strong>Tensión arterial:</strong> ' . $consulta->tension_arterial . '</p>
                
                <h2>Consulta</h2>
                <p><strong>Motivo de la consulta:</strong> ' . $consulta->motivo_consulta . '</p>
                <p><strong>Notas del padecimiento:</strong> ' . $consulta->notas_padecimiento . '</p>
                <p><strong>Recomendaciones:</strong> ' . $consulta->recomendaciones . '</p>
        
                <h2>Receta</h2>
                <p><strong>Medicamentos:</strong> ' . $consulta->id_medicamento . '</p>
                <p><strong>Frecuencia del uso del medicamento:</strong> ' . $consulta->frecuencia_medicamento . '</p>
                <p><strong>Duración del tratamiento:</strong> ' . $consulta->duracion . '</p>
        
                <p><strong>Servicios:</strong> ' . $consulta->id_servicios . '</p>
            </div>';
    
        $pdf->loadHTML($cuerpo);
        return $pdf->download('Expediente de ' . $consulta->paciente->nombres . '.pdf');
    }

    public function generatePdf($id)
    {
        // Obtén los datos de la cita
        $cita = Cita::findOrFail($id);
        
        // Carga la vista para el PDF
        $pdf = Pdf::loadView('pdf.consulta', ['cita' => $cita]);
        
        // Retorna el PDF como una descarga
        return $pdf->download('consulta_' . $cita->id . '.pdf');
    }*/
}
