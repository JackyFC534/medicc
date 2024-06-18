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
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar nuevo médico') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre(s)</label>
                                <input type="text" id="nombres" name="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                            </div>
                            <div>
                                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido(s)</label>
                                <input type="text" id="apellidos" name="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Smith" required />
                            </div>
                            <div>
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                                <input type="number" id="correo" name="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="21" required />
                            </div>  
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678"  required />
                            </div>
                            </div>
                            <div>
                                <label for="profesion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profesión</label>
                                <input type="text" id="profesion" name="profesion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Smith" required />
                            </div>
                            <br>
                            <div>
                                <label for="tipo_med" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de médico</label>
                                <input type="text" id="tipo_med" name="tipo_med" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Smith" required />
                            </div>
                            <br>
                            <button type="submit" id="boton" style="width: 105px">Submit</button>
                            <a href="{{ route('medicos') }}" id="boton" style="width: 105px">Cancelar</a>

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
