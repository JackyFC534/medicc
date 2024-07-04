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
            {{ __('Registrar una consulta') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <h4>Datos del paciente ...</h4>
                        <hr style="border: 1px solid #1;">
                        <br><br>

                        <h4>Diagnóstico y tratamiento previo</h4>
                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="fecha_consulta_anterior" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de la consulta anterior</label>
                                <input type="date" id="fecha_consulta_anterior" name="fecha_consulta_anterior" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="diagnostico_anterior" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diagnostico previo</label>
                                <input type="text" id="diagnostico_anterior" name="diagnostico_anterior" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="medicamento_anterior" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicamento previo</label>
                                <input type="text" id="medicamento_anterior" name="medicamento_anterior" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="detalles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Más detalles</label>
                                <input type="text" id="detalles" name="detalles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                        </div>
                        <br><br>

                        <div class="grid gap-6 mb-6 md:grid-cols-6">
                            <h4>Signos vitales</h4> 
                            <a href="{{ route('pagos') }}" id="boton" style="width: 60px; font-size: 12px; padding: 10px 0px;">Editar</a>
                        </div>

                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="talla" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Talla</label>
                                <input type="number" id="talla" name="talla" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temperatura</label>
                                <input type="number" id="temperatura" name="temperatura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="sat_oxigeno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saturación de oxígeno</label>
                                <input type="number" id="sat_oxigeno" name="sat_oxigeno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="frecuencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frecuencia cardiaca</label>
                                <input type="number" id="frecuencia" name="frecuencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="peso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peso</label>
                                <input type="number" id="peso" name="peso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                            <div>
                                <label for="tension_arterial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tension arterial</label>
                                <input type="number" id="tension_arterial" name="tension_arterial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                            </div>
                        </div>
                        <br><br>

                        <h4>Motivo de consulta</h4>
                        <hr style="border: 1px solid #1;">
                        <div>
                            <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo de la consulta</label>
                            <input type="textarea" id="motivo" name="motivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        </div>
                        <br><br>

                        <h4>Notas del padecimiento</h4>
                        <hr style="border: 1px solid #1;"> 
                        <div>
                            <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas del padecimiento</label>
                            <input type="textarea" id="notas" name="notas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        </div>
                        <br><br>

                        <h4>Diagnostico</h4>
                        <hr style="border: 1px solid #1;">
                        <div>
                            <label for="notas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas del padecimiento</label>
                            <input type="textarea" id="notas" name="notas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        </div>

                        <br><br>
                        <a href="{{ route('pagos') }}" id="boton" style="width: 105px">Confirmar</a>
                        <a href="{{ route('consultas') }}" id="boton" style="width: 105px">Cancelar</a>
                        @if (auth()->user()->tipo==="admin")
                            <div class="grid gap-6 mb-6 md:grid-cols-2">

                                <div>
                                    <label for="cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente</label>
                                    <select id="cliente" name="cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option value="" disabled selected>Selecciona el paciente</option>
                                        <option value="Paciente 1">Paciente 1</option>
                                        <option value="Paciente 2">Paciente 2</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de la consulta</label>
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
                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
    </div>  


</x-app-layout>
