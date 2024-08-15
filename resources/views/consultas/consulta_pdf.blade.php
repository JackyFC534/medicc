<!DOCTYPE html>
<html>
<head>
    <title>Consulta PDF</title>
    <style>
        /* Estilos opcionales para el PDF */
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
</head>
<body>
    <div class="container">
        <h1>Consulta</h1>
        <h2>Datos del paciente</h2>
        <p><strong>Nombre:</strong> {{ $cita->paciente->nombres }} {{ $cita->paciente->apellidos }}</p>
        <p><strong>Fecha de nacimiento:</strong> {{ $cita->paciente->fecha_nacimiento }}</p>
        <p><strong>Género:</strong> {{ $cita->paciente->genero }}</p>
        <p><strong>Correo:</strong> {{ $cita->paciente->correo }}</p>
        <p><strong>Teléfono:</strong> {{ $cita->paciente->telefono }}</p>
        <p><strong>Notas:</strong> {{ $cita->paciente->notas }}</p>
        
        <h2>Datos de la cita {{ $cita->id }}</h2>
        <p><strong>Fecha de la consulta:</strong> {{ $cita->fecha_consulta }}</p>
        <p><strong>Médico:</strong> {{ $cita->medico->nombres }} {{ $cita->medico->apellidos }}</p>
        <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
        
        <h2>Signos vitales</h2>
        <p><strong>Talla:</strong> {{ $cita->talla }} cm</p>
        <p><strong>Temperatura:</strong> {{ $cita->temperatura }} °C</p>
        <p><strong>Saturación de oxígeno:</strong> {{ $cita->sat_oxigeno }}</p>
        <p><strong>Frecuencia cardiaca:</strong> {{ $cita->frecuencia }}</p>
        <p><strong>Peso:</strong> {{ $cita->peso }} kg</p>
        <p><strong>Tensión arterial:</strong> {{ $cita->tension_arterial }}</p>
        
        <h2>Consulta</h2>
        <p><strong>Motivo de la consulta:</strong> {{ $cita->motivo_consulta }}</p>
        <p><strong>Notas del padecimiento:</strong> {{ $cita->notas_padecimiento }}</p>
        <p><strong>Recomendaciones:</strong> {{ $cita->recomendaciones }}</p>

        <h2>Receta</h2>
        <p><strong>Medicamentos:</strong> {{ $cita->id_medicamento }}</p>
        <p><strong>Frecuencia del uso del medicamento:</strong> {{ $cita->frecuencia_medicamento }}</p>
        <p><strong>Duración deel tratamiento:</strong> {{ $cita->duracion }}</p>

        <p><strong>Servicios:</strong> {{ $cita->id_servicios }}</p>
    </div>
</body>
</html>
