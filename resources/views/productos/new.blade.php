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
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar nuevo producto') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form id="productoForm" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre del producto</label>
                                <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Aspirina" required />
                            </div>
                            <div>
                                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Capsulas de 10gr" required />
                            </div>
                            <div>
                                <label for="lote" class="block mb-2 text-sm font-medium text-gray-900">Lote</label>
                                <input type="number" id="lote" name="lote" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="12345" required />
                            </div>
                            <div>
                                <label for="fecha_caducidad" class="block mb-2 text-sm font-medium text-gray-900">Caducidad</label>
                                <input type="date" id="fecha_caducidad" name="fecha_caducidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div> 
                            <div>
                                <label for="existencias" class="block mb-2 text-sm font-medium text-gray-900">Existencias</label>
                                <input type="number" id="existencias" name="existencias" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="10" required />
                            </div> 
                            <div>
                                <label for="precio_unitario" class="block mb-2 text-sm font-medium text-gray-900">Precio unitario</label>
                                <input type="number" id="precio_unitario" name="precio_unitario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="$" required />
                            </div> 
                        </div>
                        <button type="submit" id="boton" style="width: 105px">Guardar</button>
                        <a href="{{ route('productos') }}" id="boton" style="width: 105px">Cancelar</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('productoForm').addEventListener('submit', function(event) {
            var fechaCaducidad = document.getElementById('fecha_caducidad').value;
            var fechaActual = new Date().toISOString().split('T')[0];
            
            if (fechaCaducidad < fechaActual) {
                alert('La fecha de caducidad debe ser la fecha actual o una fecha futura.');
                event.preventDefault();
            }
        });
    </script>
</x-app-layout>
