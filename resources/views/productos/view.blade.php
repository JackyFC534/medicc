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
            {{ __('Ver los datos de un producto') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del producto</label>
                                <input type="text" value="{{ $producto->nombre }}" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aspirina" readonly />
                            </div>
                            <div>
                                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                                <input type="text" value="{{ $producto->descripcion }}" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Capsulas de 10gr" readonly />
                            </div>
                            <div>
                                <label for="lote" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lote</label>
                                <input type="number" value="{{ $producto->lote }}" id="lote" name="lote" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12345" readonly />
                            </div>
                            <div>
                                <label for="fecha_caducidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Caducidad</label>
                                <input type="date" value="{{ $producto->fecha_caducidad }}" id="fecha_caducidad" name="fecha_caducidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" readonly />
                            </div> 
                            <div>
                                <label for="existencias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Existencias</label>
                                <input type="number" value="{{ $producto->existencias }}" id="existencias" name="existencias" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="10" readonly />
                            </div> 
                            <div>
                                <label for="precio_unitario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio unitario</label>
                                <input type="number" value="{{ $producto-> precio_unitario }}" id="precio_unitario" name="precio_unitario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$" readonly />
                            </div> 
                            </div>
                            <a href="{{ route('productos') }}" id="boton" style="width: 105px">Regresar</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
