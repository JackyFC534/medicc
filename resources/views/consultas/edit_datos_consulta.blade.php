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
            {{ __('Editar datos de la consulta') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid gap-6 mb-6 md:grid-cols-5">
                        <h4>Datos de cita</h4>
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

                        <a href="{{ route('agenda') }}" id="boton" style="width: 105px">Actualizar</a> <!-- guardar las modificaciones de la agenda -->
                        <a href="{{ route('agenda') }}" id="boton" style="width: 105px">Cancelar</a> <!-- regresar a la consulta con los datos -->
                        
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
