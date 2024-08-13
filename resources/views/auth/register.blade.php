<x-guest-layout>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            display: flex;
            align-items: center; /* Alinear elementos verticalmente al centro */
        }
        .imagen {
            border: 3px solid #ccc; /* Borde sólido de 2 píxeles de ancho y color gris claro */
            padding: 10px; /* Espacio interno dentro del borde */
            margin-right: 20px; /* Espacio entre la imagen y el texto */
        }
        .texto {
            flex: 1; /* Hace que el texto ocupe todo el espacio restante */
            font-size: 20px;
        }

        .texto p {
            font-size: 40px; /* Tamaño de fuente para párrafos específicos */
            line-height: 1.5; /* Espaciado entre líneas */
            margin-bottom: 10px; /* Margen inferior para separación */
            font-weight: bold;
        }

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
        #registro {
            font-weight: bold;
            text-align: center;
            font-size: 15px;
            margin-left: 20px;
            color: gray; /* Color por defecto */
            text-decoration: none; /* Eliminar subrayado por defecto */
        }

        #registro:hover {
            color: black; /* Color al pasar el cursor */
            text-decoration: none; /* Mantener subrayado desactivado */
        }

    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear una cuenta') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form method="POST" action="{{ route('pacientes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- Nombres -->
                    <div>
                        <x-input-label for="nombres" :value="__('Nombre(s)')" />
                        <x-text-input id="nombres" class="block mt-1 w-full" type="text" name="names" :value="old('nombres')" required autofocus autocomplete="nombres" />
                        <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
                    </div>

                    <!-- Apellidos -->
                    <div>
                        <x-input-label for="apellidos" :value="__('Apellido(s)')" />
                        <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                        <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="correo" :value="__('Correo')" />
                        <x-text-input id="correo" class="block mt-1 w-full" type="text" name="correo" :value="old('correo')" required autofocus autocomplete="correo" />
                        <x-input-error :messages="$errors->get('correo')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Telefono -->
                    <div>
                        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123-45-678"  required />
                    </div>

                    <!-- Especialidad -->
                    <div>
                        <label for="especialidad" class="block mb-2 text-sm font-medium text-gray-900">Especialidad</label>
                        <select id="especialidad" name="especialidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="" disabled selected>Selecciona especialidad</option>
                            <option value="Medicina_general">Medicina General</option>
                            <option value="Psiquiatria">Psiquiatría</option>
                            <option value="Dermatologia">Dermatología</option>
                            <option value="Pediatria">Pediatría</option>
                            <option value="Cardiologia">Cardiología</option>                                    
                        </select>                            
                    </div>

                    <!-- Cedula profesional -->
                    <div>
                        <label for="cedula_profesional" class="block mb-2 text-sm font-medium text-gray-900">Cedula profesional</label>
                        <input type="text" id="cedula_profesional" name="cedula_profesional" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="020203320" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('¿Ya tienes cuenta?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Registrarse') }}
                        </x-primary-button>
                    </div>
                
                    </div>
                </form>


                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
