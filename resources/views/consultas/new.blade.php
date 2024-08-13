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
                        <div class="grid gap-6 mb-6 md:grid-cols-5">
                        <h4>Datos del paciente</h4>
                        @if (auth()->user()->tipo==="admin" || auth()->user()->tipo==="doctor")
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" id="boton" style="width: 60px; font-size: 12px; padding: 10px 0px;">Editar</a>
                        </div>
                        @endif
                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900">Nombre(s)</label>
                                <input type="text" value="{{ $paciente->nombres }}" id="nombres" name="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" readonly />
                            </div>
                            <div>
                                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900">Apellido(s)</label>
                                <input type="text" value="{{ $paciente->apellidos }}" id="apellidos" name="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Smith" readonly />
                            </div>
                            <div>
                                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900">Fecha de nacimiento</label>
                                <input type="date" value="{{ $paciente->fecha_nacimiento }}" id="fecha_nacimiento" name="fecha_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" readonly />
                            </div>
                            <div>
                                <label for="genero" class="block mb-2 text-sm font-medium text-gray-900">Género</label>
                                <input type="genero" value="{{ $paciente->genero }}" id="genero" name="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" readonly />
                            </div>
                            <div>
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900">Correo</label>
                                <input type="email" value="{{ $paciente->correo }}" id="correo" name="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ejemplo@gmail.com" readonly />
                            </div>
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                                <input type="tel" value="{{ $paciente->telefono }}" id="telefono" name="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123-45-678" readonly />
                            </div>
                            <div>
                                <label for="notas" class="block mb-2 text-sm font-medium text-gray-900">Notas</label>
                                <input type="text" value="{{ $paciente->notas }}" id="notas" name="notas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly />
                            </div>
                        </div>
                        <br><br>

                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <h4>Diagnóstico y datos de cita</h4>
                        @if (auth()->user()->tipo==="admin" || auth()->user()->tipo==="doctor")
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" id="boton" style="width: 60px; font-size: 12px; padding: 10px 0px;">Editar</a>
                        </div>
                        @endif
                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="fecha_consulta" class="block mb-2 text-sm font-medium text-gray-900">Fecha de la consulta agendada</label>
                                <input type="date" id="fecha_consulta" name="fecha_consulta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" readonly />
                            </div>
                            <div>
                                <label for="medico_consulta" class="block mb-2 text-sm font-medium text-gray-900">Medico solicitado para la consulta</label>
                                <input type="text" id="medico_consulta" name="medico_consulta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" readonly />
                            </div>
                            <div>
                                <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900">Motivo</label>
                                <input type="text" id="motivo" name="motivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" readonly />
                            </div>
                        </div>
                        <br><br>

                        <div class="grid gap-6 mb-6 md:grid-cols-5">
                            <h4>Signos vitales</h4> 
                            <!--a href="{{ route('pagos') }}" id="boton" style="width: 60px; font-size: 12px; padding: 10px 0px;">Editar</a-->
                        </div>

                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="talla" class="block mb-2 text-sm font-medium text-gray-900">Talla</label>
                                <input type="number" id="talla" name="talla" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" />
                            </div>
                            <div>
                                <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900">Temperatura</label>
                                <input type="number" id="temperatura" name="temperatura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" />
                            </div>
                            <div>
                                <label for="sat_oxigeno" class="block mb-2 text-sm font-medium text-gray-900">Saturación de oxígeno</label>
                                <input type="number" id="sat_oxigeno" name="sat_oxigeno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=""  />
                            </div>
                            <div>
                                <label for="frecuencia" class="block mb-2 text-sm font-medium text-gray-900">Frecuencia cardiaca</label>
                                <input type="number" id="frecuencia" name="frecuencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=""  />
                            </div>
                            <div>
                                <label for="peso" class="block mb-2 text-sm font-medium text-gray-900">Peso</label>
                                <input type="number" id="peso" name="peso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=""  />
                            </div>
                            <div>
                                <label for="tension_arterial" class="block mb-2 text-sm font-medium text-gray-900">Tension arterial</label>
                                <input type="number" id="tension_arterial" name="tension_arterial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=""  />
                            </div>
                        </div>
                        <br><br>

                        <h2>Consulta</h2>
                        <hr style="border: 1px solid #1;">

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900">Motivo de la consulta</label>
                                <input type="textarea" id="motivo" name="motivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div>
                            

                            <div>
                                <label for="notas" class="block mb-2 text-sm font-medium text-gray-900">Notas del padecimiento</label>
                                <input type="textarea" id="notas" name="notas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div>
                            

                            <div>
                                <label for="notas" class="block mb-2 text-sm font-medium text-gray-900">Notas del padecimiento</label>
                                <input type="textarea" id="notas" name="notas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div>
                        </div>

                        <hr style="border: 1px solid #1;">

                        <label for="medicamento" class="block mb-2 font-medium text-gray-900"><b>Selecciona los productos utilizados:</b></label>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                        @foreach ($productos as $producto)
                            <label><input type="checkbox" name="medicamentos" value="{{ $producto->id }}" class="mb-2 text-sm font-medium text-gray-900"> {{ $producto->nombre }}</label>
                        @endforeach
                        </div>

                        <label for="medicamento" class="block mb-2 font-medium text-gray-900"><b>Frecuencia de los productos seleccionados:</b></label>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <label><input type="checkbox" name="medicamentos" value="2" class="mb-2 text-sm font-medium text-gray-900"> Cada 2 hrs</label>
                            <label><input type="checkbox" name="medicamentos" value="4" class="mb-2 text-sm font-medium text-gray-900"> Cada 4 hrs</label>
                            <label><input type="checkbox" name="medicamentos" value="8" class="mb-2 text-sm font-medium text-gray-900"> Cada 8 hrs</label>
                            <label><input type="checkbox" name="medicamentos" value="12" class="mb-2 text-sm font-medium text-gray-900"> Cada 12 hrs</label>
                            <label><input type="checkbox" name="medicamentos" value="24" class="mb-2 text-sm font-medium text-gray-900"> Cada 24 hrs</label>
                        </div>

                        <label for="servicio" class="block mb-2 font-medium text-gray-900"><b>Selecciona los servicios requeridos para la siguiente consulta:</b></label>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                        @foreach ($servicios as $servicio)
                            <label><input type="checkbox" name="medicamentos" value="{{ $servicio->id }}" class="mb-2 text-sm font-medium text-gray-900"> {{ $servicio->nombre }}</label>
                        @endforeach
                        </div>
                        


                        <!-- receta y select medicamentos-->
                        <br><br>
                        <a href="{{ route('pagos') }}" id="boton" style="width: 105px">Confirmar</a>
                        <a href="{{ route('agenda') }}" id="boton" style="width: 105px">Cancelar</a>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>  


</x-app-layout>
