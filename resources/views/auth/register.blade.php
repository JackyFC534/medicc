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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- Name -->
                    <div>
                        <x-input-label for="nombre" :value="__('Nombre')" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="name" :value="old('nombre')" required autofocus autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <!-- Apellidos -->
                    <div>
                        <x-input-label for="apellidos" :value="__('Apellidos')" />
                        <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                        <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                        <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autofocus autocomplete="fecha_nacimiento" />
                        <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                    </div>

                    <!-- Género -->
                    <div>
                        <x-input-label for="genero" :value="__('Género')" />
                        <select id="genero" class="block mt-1 w-full" name="genero" required autofocus autocomplete="genero">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <x-input-error :messages="$errors->get('genero')" class="mt-2" />
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

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('¿Ya tienes cuenta?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Registrarse') }}
                        </x-primary-button>
                    </div>
                    
                    <!-- Talla -->
                    <x-text-input id="talla" class="block mt-1 w-full" type="hidden" name="talla" :value="old('talla')" required autofocus autocomplete="talla" />

                    <!-- Saturación de oxigeno -->
                    <x-text-input id="sat_oxigeno" class="block mt-1 w-full" type="hidden" name="sat_oxigeno" :value="old('sat_oxigeno')" required autofocus autocomplete="sat_oxigeno" />

                    <!-- Frecuencia cardiaca -->
                    <x-text-input id="frecuencia" class="block mt-1 w-full" type="hidden" name="frecuencia" :value="old('frecuencia')" required autofocus autocomplete="frecuencia" />

                    <!-- Peso -->
                    <x-text-input id="peso" class="block mt-1 w-full" type="hidden" name="peso" :value="old('peso')" required autofocus autocomplete="peso" />

                    <!-- Tensión arterial -->
                    <x-text-input id="tension_arterial" class="block mt-1 w-full" type="hidden" name="tension_arterial" :value="old('tension_arterial')" required autofocus autocomplete="tension_arterial" />

                    <!-- id Medico -->
                    <x-text-input id="id_medico" class="block mt-1 w-full" type="hidden" name="id_medico" :value="old('id_medico')" required autofocus autocomplete="id_medico" />
                    
                    <!-- id_expediente -->
                    <x-text-input id="id_expediente" class="block mt-1 w-full" type="hidden" name="id_expediente" :value="old('id_expediente')" required autofocus autocomplete="id_expediente" />

                    </div>
                </form>


                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
