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
            {{ __('Editar datos del paciente') }}
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

                        <a href="{{ route('agenda') }}" id="boton" style="width: 105px">Actualizar</a><!-- guardar los cambios del paciente-->
                        <a href="{{ route('agenda') }}" id="boton" style="width: 105px">Cancelar</a><!-- buscar regresar a la consulta con los mismos datos-->
                        
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

        document.getElementById('boton-agregar').addEventListener('click', function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            var div = document.getElementById('medicamento-div');
            if (div.style.display === 'none') {
                div.style.display = 'grid'; // Muestra el div
            }
        });

        document.getElementById('boton-quitar').addEventListener('click', function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            var div = document.getElementById('medicamento-div');
            div.style.display = 'none'; // Oculta el div
        });

        document.getElementById('boton-agregar-otro').addEventListener('click', function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            addMedicationSelect();
        });

        function addMedicationSelect() {
            var container = document.getElementById('medicamentos-container');

            var newSelect = document.createElement('div');
            newSelect.classList.add('medicamento-select');

            newSelect.innerHTML = `
                <select name="medicamento[]" style="height: 45px;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>

                <select name="frecuencia_medicamento[]" style="height: 45px;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="2">Cada 2 hrs</option>
                    <option value="4">Cada 4 hrs</option>
                    <option value="8">Cada 8 hrs</option>
                    <option value="12">Cada 12 hrs</option>
                    <option value="24">Cada 24 hrs</option>
                </select>
            `;

            container.appendChild(newSelect);
        }


    </script>

</x-app-layout>
