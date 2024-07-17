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
            {{ __('Registrar nuevo pago') }}
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
                                <label for="cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente</label>
                                <select id="cliente" name="cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" disabled selected>Selecciona el cliente</option>
                                    @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id}}">{{ $paciente-> nombres }} {{ $paciente-> apellidos }}  || {{ $paciente-> telefono}}</option>
                                    @endforeach

                                    @foreach($medicos as $medico)
                                    <option value="{{ $medico->id}}">   {{ $medico-> nombres }} {{ $medico-> apellidos }}  || {{ $medico-> telefono}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col space-y-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="opciones[]" value="opcion1" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 dark:text-white">Opción 1</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="opciones[]" value="opcion2" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 dark:text-white">Opción 2</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="opciones[]" value="opcion3" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 dark:text-white">Opción 3</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="opciones[]" value="opcion4" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 dark:text-white">Opción 4</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="opciones[]" value="opcion5" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 dark:text-white">Opción 5</span>
                        </label>
                    </div>
                            <div>
                                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha del pago</label>
                                <input type="date" id="fecha" name="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="monto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monto</label>
                                <input type="number" id="monto" name="monto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12" required />
                            </div>
                            <div>
                                <label for="metodo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metodo</label>
                                <select id="metodo" name="metodo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" disabled selected>Selecciona el método de pago</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                    <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                </select>                            
                            </div>  
                            </div>  
                            <div>
                                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                                <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" disabled selected>Selecciona el estado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Pagado">Pagado</option>
                                    <option value="Parcial">Pago parcial</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>     
                            </div>  
                            <br>
                            <button type="submit" id="boton" style="width: 105px">Submit</button>
                            <a href="{{ route('pagos') }}" id="boton" style="width: 105px">Cancelar</a>

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('fecha');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('max', today);
    });
</script>
</x-app-layout>
