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

                    <form method="POST" action="{{ route('consultas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-5">
                        <h4>Datos del paciente</h4>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" id="boton" style="width: 60px; font-size: 12px; padding: 10px 0px;">Editar</a>
                        </div>
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

                        <div class="grid gap-6 mb-6 md:grid-cols-5">
                        <h4>Datos de cita </h4>
                        
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" id="boton" style="width: 60px; font-size: 12px; padding: 10px 0px;">Editar</a>
                        </div>
                        
                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            <div>
                                <label for="fecha_consulta" class="block mb-2 text-sm font-medium text-gray-900">Fecha de la consulta agendada</label>
                                <input type="date" id="fecha_consulta" name="fecha_consulta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $fecha }}" readonly />
                            </div>
                            <div>
                                <label for="medico_consulta" class="block mb-2 text-sm font-medium text-gray-900">Medico solicitado para la consulta</label>
                                <input type="text" id="medico_consulta" name="medico_consulta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $nombre_medico }}" readonly />
                            </div>
                            <div>
                                <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900">Motivo</label>
                                <input type="text" id="motivo" name="motivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $motivo }}" readonly />
                            </div>
                        </div>
                        <br><br>

                        <div class="grid gap-6 mb-6 md:grid-cols-5">
                            <h4>Signos vitales</h4> 
                        </div>

                        <hr style="border: 1px solid #1;">
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="talla" class="block mb-2 text-sm font-medium text-gray-900">Talla (cm)</label>
                                <input type="number" id="talla" name="talla" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" max="999" min="0" step="0.01" oninput="validateInput(this)" placeholder="" required/>
                            </div>
                            <div>
                                <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900">Temperatura (c°)</label>
                                <input type="number" id="temperatura" name="temperatura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" max="999" min="0" step="0.01" oninput="validateInput(this)" placeholder="" required/>
                            </div>
                            <div>
                                <label for="sat_oxigeno" class="block mb-2 text-sm font-medium text-gray-900">Saturación de oxígeno</label>
                                <input type="number" id="sat_oxigeno" name="sat_oxigeno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" max="999" min="0" step="0.01" oninput="validateInput(this)" placeholder="" required />
                            </div>
                            <div>
                                <label for="frecuencia" class="block mb-2 text-sm font-medium text-gray-900">Frecuencia cardiaca</label>
                                <input type="number" id="frecuencia" name="frecuencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" max="999" min="0" step="0.01" oninput="validateInput(this)" placeholder="" required/>
                            </div>
                            <div>
                                <label for="peso" class="block mb-2 text-sm font-medium text-gray-900">Peso (kg)</label>
                                <input type="number" id="peso" name="peso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" max="999" min="0" step="0.01" oninput="validateInput(this)" placeholder="" required/>
                            </div>
                            <div>
                                <label for="tension_arterial" class="block mb-2 text-sm font-medium text-gray-900">Tensión arterial</label>
                                <input type="number" id="tension_arterial" name="tension_arterial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" max="999" min="0" step="0.01" oninput="validateInput(this)" placeholder="" required/>
                            </div>
                        </div>
                        <br><br><br>

                        <h1>Consulta</h1>
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
                                <label for="recomendaciones" class="block mb-2 text-sm font-medium text-gray-900">Recomendaciones</label>
                                <input type="textarea" id="recomendaciones" name="recomendaciones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div>
                        </div>

                        <br><br>
                        <h4>Receta</h4> 
                        <hr style="border: 1px solid #1;">

                        <label for="medicamento" class="block mb-2 font-medium text-gray-900"><b>Productos utilizados:</b></label>

                        <!-- Botón para agregar medicamentos -->
                        <a href="#" id="boton-agregar" style="width: 150px; padding: 10px 20px; background-color: black; color: white; text-decoration: none; font-weight: bold; border-radius: 5px; text-align: center; font-size: 12px;">Agregar medicamento</a> <br><br>

                        <!-- Contenedor de los medicamentos -->
                        <div id="contenedor-medicamentos" class="grid gap-6 mb-6 md:grid-cols-4">
                            <div class="medicamento-row">
                                <label for="medicamento" style="font-size: 12px;" class="block mb-2 text-sm font-medium text-gray-900">Medicamento</label>
                                <select id="medicamento" name="medicamento" style="height: 45px;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="0" selected>Ninguno</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select><br>

                                <label for="frecuencia_medicamento" style="font-size: 12px;" class="block mb-2 text-sm font-medium text-gray-900">Frecuencia de toma de medicamento</label>
                                <select id="frecuencia_medicamento" name="frecuencia_medicamento" style="height: 45px;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="0" selected>Ninguno</option>
                                    <option value="2">Cada 2 hrs</option>
                                    <option value="4">Cada 4 hrs</option>
                                    <option value="8">Cada 8 hrs</option>
                                    <option value="12">Cada 12 hrs</option>
                                    <option value="24">Cada 24 hrs</option>
                                </select><br>

                                <label for="duracion" style="font-size: 12px;" class="block mb-2 text-sm font-medium text-gray-900">Duración</label>
                                <select id="duracion" name="duracion" style="height: 45px;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="0" selected>Ninguno</option>
                                    <option value="1">1 día</option>
                                    <option value="3">3 días</option>
                                    <option value="7">1 semana</option>
                                    <option value="12">2 semanas</option>
                                    <option value="30">1 mes</option>
                                    <option value="60">2 mes</option>
                                </select><br>

                                <a href="#" class="boton-quitar" style="width: 150px; padding: 10px 20px; background-color: black; color: white; text-decoration: none; font-weight: bold; border-radius: 5px; text-align: center; font-size: 12px;">Quitar</a>
                            </div>
                        </div>
                       

                        <hr style="border: 1px solid #1;"><br>

                        <label for="servicio" class="block mb-2 font-medium text-gray-900"><b>Selecciona los servicios requeridos para la siguiente consulta:</b></label>
                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                            @foreach ($servicios as $servicio)
                                <label><input type="checkbox" name="medicamentos" value="{{ $servicio->id }}" class="mb-2 text-sm font-medium text-gray-900"> {{ $servicio->nombre }}</label>
                            @endforeach
                        </div>
                        


                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                        <!-- receta en pdf o consulta en pdf--><br>
                        <a id="boton" >Imprimir Receta</a>
                        <a href="#" id="boton">Imprimir consulta</a>
                        </div>

                        <br><br>
                        <button type='submit' style='width: 105px'>Terminar</button>
                        <!--<a href="{{ route('pagos') }}" id="boton" style="width: 105px">Terminar</a>-->
                        <a href="{{ route('agenda') }}" id="boton" style="width: 105px">Cancelar</a>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>  

    <script>
        function validateInput(input) {
            const value = input.value;
            const decimalCount = (value.split('.')[1] || '').length;
            
            if (value.length > 5 || decimalCount > 2) {
                input.value = value.slice(0, -1);
            }
        }

        document.getElementById('boton-agregar').addEventListener('click', function(e) {
            e.preventDefault();

            // Clona el primer div que contiene los selects de medicamento y frecuencia
            var contenedor = document.getElementById('contenedor-medicamentos');
            var nuevoMedicamento = contenedor.querySelector('.medicamento-row').cloneNode(true);

            // Limpia los valores de los selects en el nuevo clon
            nuevoMedicamento.querySelectorAll('select').forEach(function(select) {
                select.value = '';
            });

            // Añade el nuevo conjunto de selects al contenedor
            contenedor.appendChild(nuevoMedicamento);
        });

        // Función para quitar un conjunto de selects
        document.getElementById('contenedor-medicamentos').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('boton-quitar')) {
                e.preventDefault();

                var contenedor = document.getElementById('contenedor-medicamentos');
                if (contenedor.querySelectorAll('.medicamento-row').length > 1) {
                    e.target.parentElement.remove();
                }
            }
        });


    </script>

</x-app-layout>