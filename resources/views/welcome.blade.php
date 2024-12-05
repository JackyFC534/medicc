<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OptiVida </title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-blue-900 bg-opacity-50 shadow-md fixed top-0 left-0 w-full backdrop-blur-sm">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a class="text-2xl font-bold text-white" href="#">OptiVida</a>
            <ul class="flex space-x-6">
                <li><a class="text-white font-medium hover:underline" href="#">Inicio</a></li>
                <li><a class="text-white font-medium hover:underline" href="#services">Servicios</a></li>
                <li><a class="text-white font-medium hover:underline" href="#contact">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="h-screen bg-cover bg-center flex flex-col items-center justify-center text-white text-center" style="background-image: linear-gradient(rgba(0,49,82,0.7), rgba(0,49,82,0.7)), url('{{ asset('images/fondo.png') }}');">
        <h1 class="text-5xl font-bold uppercase mb-4 shadow-lg">OptiVida</h1>
        <p class="text-xl mb-6 shadow-lg">Tu salud, nuestra prioridad</p>
        <div class="flex space-x-4">
            <a href="{{ url('/login') }}" class="bg-blue-500 text-white py-3 px-6 rounded hover:bg-blue-700 transition">Iniciar</a>
            <a href="{{ url('/register') }}" class="border border-white py-3 px-6 rounded hover:bg-white hover:text-blue-500 transition">Registrarse</a>
        </div>
    </div>

    <!-- Services Section -->
    <section id="services" class="py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Servicios</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Servicio 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                <img src="{{ asset('images/consulta-medica.jpg') }}" alt="Consulta Médica" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-bold text-blue-900 mb-2">Consulta Médica</h5>
                    <p class="text-gray-700">Atención personalizada con nuestros especialistas.</p>
                </div>
            </div>
            <!-- Servicio 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                <img src="{{ asset('images/monitoreo.jpg') }}" alt="Monitoreo en Tiempo Real" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-bold text-blue-900 mb-2">Monitoreo en Tiempo Real</h5>
                    <p class="text-gray-700">Supervisión continua de tu salud desde cualquier lugar.</p>
                </div>
            </div>
            <!-- Servicio 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                <img src="{{ asset('images/emergencias.jpg') }}" alt="Atención Emergencias" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h5 class="text-xl font-bold text-blue-900 mb-2">Atención Emergencias</h5>
                    <p class="text-gray-700">Respuestas rápidas en situaciones críticas.</p>
                </div>
            </div>
        </div>
    </section>

     <!-- Contact Section -->
    <section id="contact" class="bg-blue-900 text-white py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
            <!-- Teléfono -->
            <div class="flex items-center space-x-4">
                <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <div>
                    <p class="font-bold text-sm text-white">+52 123 456 7890</p>
                    <p class="text-sm text-gray-300">+52 987 654 3210</p>
                </div>
            </div>
            <!-- Horarios -->
            <div class="flex items-center space-x-4">
                <svg class="h-6 w-6 text-gray-100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" /></svg>
                <div>
                    <p class="font-bold text-sm">Lun - Vie: 9:00 AM - 5:00 PM</p>
                    <p class="text-sm">Sáb - Dom: Cerrado</p>
                </div>
            </div>
            <!-- Email -->
            <div class="flex items-center space-x-4">
                <svg class="h-6 w-6 text-gray-100"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                  </svg>
                <div>
                    <p class="font-bold text-sm">info@optivida.com</p>
                    <p class="text-sm">soporte@optivida.com</p>
                </div>
            </div>
            <!-- Dirección -->
            <div class="flex items-center space-x-4">
                <svg class="h-6 w-6 text-slate-100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />  <circle cx="12" cy="10" r="3" /></svg>
                <div>
                    <p class="font-bold text-sm">Calle Salud No. 123</p>
                    <p class="text-sm">Ciudad Bienestar, México</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-4 text-center">
        <p class="text-xs">© 2024 OptiVida. Todos los derechos reservados. <a href="#" class="text-yellow-400 hover:underline">Política de Privacidad</a></p>
    </footer>
</body>
</html>
