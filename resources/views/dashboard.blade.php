<x-app-layout>

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
            display: inline-flex; /* Cambia a inline-flex */
            align-items: center; /* Centra verticalmente */
            justify-content: center; /* Centra horizontalmente */
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
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Vista sin iniciar sesion-->
                    @if (auth()->user() === NULL)
                        <div class="container">
                            <div class="imagen">
                                <img src="{{ asset('images/img1.png') }}" width="400">
                            </div>
                        
                            <div class="texto">
                                <div class="p-6 text-gray-900"> 
                                ¡Asesorías médicas para ti!
                                <p>Ofreciendo atención de calidad para tus necesidades de salud.</p>
                                <a href="{{ route('login') }}" id="boton">Iniciar Sesión</a>
                                <a href="{{ route('register') }}" id="registro">Crear una cuenta</a>
                                </div>
                            </div>
                        </div>

                    <!-- Vista Administrador-->
                    @elseif (auth()->user()->tipo==="admin")
                        <div class="container">
                            <div class="imagen">
                                <img src="{{ asset('images/img2.png') }}" width="400">
                            </div>
                        
                            <div class="texto">
                                <div class="p-6 text-gray-900"> 
                                ¡ Bienvenido administrador <b>{{ Auth::user()->name }} </b>!
                                <p>Aqui se encuentran los gestores de todas las ventanas</p>
                                </div>
                            </div>
                        </div>

                    <!-- Vista Doctor-->
                    @elseif (auth()->user()->tipo==="doctor")
                        <div class="container">
                            <div class="imagen">
                                <img src="{{ asset('images/img3.png') }}" width="400">
                            </div>
                        
                            <div class="texto">
                                <div class="p-6 text-gray-900"> 
                                ¡ Bienvenido doctor <b>{{ Auth::user()->name }} </b>!
                                <p>Inicia viendo el itinerario de hoy</p>
                                <a href="{{ route('medicos_agenda') }}" id="boton">Ver Agenda</a>
                                </div>
                            </div>
                        </div>
                    <!-- Vista Administrador-->
                    @elseif (auth()->user()->tipo==="secretaria")
                        <div class="container">
                            <div class="imagen">
                                <img src="{{ asset('images/img5.png') }}" width="400">
                            </div>
                        
                            <div class="texto">
                                <div class="p-6 text-gray-900"> 
                                ¡ Bienvenido doctor <b>{{ Auth::user()->name }} </b>!
                                <br><br>
                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <a href="{{ route('pacientes') }}" id="boton" style="width: 110px">Registro paciente</a>
                                <a href="{{ route('medicos_agenda') }}" id="boton" style="width: 110px">Agendar citas</a>
                                <a href="{{ route('pagos') }}" id="boton" style="width: 110px">Pagos</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
