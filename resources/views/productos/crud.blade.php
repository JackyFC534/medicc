<x-app-layout>
        <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('productos.create') }}" id="boton">Agregar Producto</a>
                    <br><br>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Lote</th>
                                    <th scope="col">Caducidad</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Precio Unitario</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr>
                                    <td class="font-medium">{{ $loop->iteration }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->lote }}</td>
                                    <td>{{ $producto->fecha_caducidad }}</td>
                                    <td>{{ $producto->existencias }}</td>
                                    <td>${{ $producto->precio_unitario }}</td>
                                    <td>
                                        <a href="{{ route('productos.show', $producto->id) }}" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                            <img src="{{ asset('images/ver.png') }}" style="width: 35px; height: 37px">
                                        </a>
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                            <img src="{{ asset('images/edit.png') }}" style="width: 35px; height: 37px">
                                        </a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
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