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
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="imagen">
                            <img src="{{ asset('images/img1.png') }}" width="400">
                        </div>

                        <div class="texto">
                            <div class="p-6 text-gray-900">
                            ¡Asesorías médicas para ti!
                            <p>Ofreciendo atención de calidad para tus necesidades de salud.</p>
                            <a href="#" id="boton">Iniciar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>