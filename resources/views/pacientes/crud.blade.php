<x-app-layout>
    <style>
        #boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            font-size: 15px;
        }

        .texto {
            flex: 1; /* Hace que el texto ocupe todo el espacio restante */
        }
        .tabla {
            width: 100%;
            border-collapse: collapse;
        }
        .tabla thead th {
            background-color: black; /* Fondo negro para el encabezado */
            color: white; /* Texto blanco */
            font-weight: bold; /* Texto en negritas */
            padding: 12px; /* Espaciado interno */
            text-align: left; /* Alinear texto a la izquierda */
            border-bottom: 2px solid white; /* Borde inferior blanco */
        }
        .tabla tbody tr {
            background-color: white; /* Fondo blanco para las filas */
            color: #4b5563; /* Texto gris */
            border-bottom: 1px solid #cbd5e0; /* Borde inferior gris claro */
        }
        .tabla tbody tr:hover {
            background-color: #f0f4f8; /* Fondo gris claro al pasar el mouse */
        }
        .tabla td, .tabla th {
            padding: 12px; /* Espaciado interno para celdas */
            text-align: left; /* Alinear texto a la izquierda */
        }

        .boton-con-imagen-interna {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: black; /* Color de fondo del botón */
            border: none; /* Sin borde */
            border-radius: 5px; /* Borde redondeado */
            text-align: center; /* Alinear texto al centro */
            text-decoration: none; /* Sin subrayado */
        }

    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('nuevo_paciente') }}" id="boton">Agregar paciente</a>
                    <br><br>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre(s)</th>
                                    <th scope="col">Apellido(s)</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Género</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Médico Encargado</th>
                                    <th scope="col" style="width: 80px">Expediente</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pacientes as $paciente)
                                    <tr>
                                        <td>
                                            <div class="flex items-center">
                                                <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="font-medium">{{ $paciente->id }}</td>
                                        <td>{{ $paciente->nombres }}</td>
                                        <td>{{ $paciente->apellidos }}</td>
                                        <td>{{ $paciente->edad }}</td>
                                        <td>{{ $paciente->genero }}</td>
                                        <td>{{ $paciente->telefono }}</td>
                                        <td>{{ $paciente->medico_encargado }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $paciente->archivo_expediente) }}" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                                <img src="{{ asset('images/expedientes.png') }}" style="width: 25px">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                                <img src="{{ asset('images/ver.png') }}" style="width: 35px; height: 37px">
                                            </a>
                                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                                <img src="{{ asset('images/edit.png') }}" style="width: 35px; height: 37px">
                                            </a>
                                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                                    <img src="{{ asset('images/delete.png') }}" style="width: 25px">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>