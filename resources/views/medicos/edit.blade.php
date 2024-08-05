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
            {{ __('Editar datos de un médico') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('medicos.update', $medico->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900">Nombre(s)</label>
                                <input type="text" value="{{ $medico->nombres }}" id="nombres" name="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Dr. Demo" required />
                            </div>
                            <div>
                                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900">Apellido(s)</label>
                                <input type="text" value="{{ $medico->apellidos }}" id="apellidos" name="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="User" required />
                            </div>
                            <div>
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900">Correo</label>
                                <input type="text" value="{{ $medico->correo }}" id="correo" name="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="demo@neo.com" required />
                            </div>  
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                                <input type="tel" value="{{ $medico->telefono }}" id="telefono" name="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123-45-678"  required />
                            </div>
                            <div>
                                <label for="especialidad" class="block mb-2 text-sm font-medium text-gray-900">Especialidad</label>
                                <select id="especialidad" name="especialidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <option value="" disabled selected>Selecciona especialidad</option>
                                    <option value="medicina_general">Medicina General</option>
                                    <option value="psiquiatria">Psiquiatría</option>
                                    <option value="dermatologia">Dermatología</option>
                                    <option value="pediatria">Pediatría</option>
                                    <option value="cardiologia">Cardiología</option>                                    
                                </select>                            
                            </div>
                            <div>
                                <label for="cedula_profesional" class="block mb-2 text-sm font-medium text-gray-900">Cedula profesional</label>
                                <input type="text" value="{{ $medico->cedula_profesional }}" id="cedula_profesional" name="cedula_profesional" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="020203320" required />
                            </div>
                            </div>
                            <button type="submit" id="boton" style="width: 105px">Actualizar</button>
                            <a href="{{ route('medicos') }}" id="boton" style="width: 105px">Cancelar</a>

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
