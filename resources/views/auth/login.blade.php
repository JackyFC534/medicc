<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo2.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-blue-900">

    <div class="bg-blue-100 bg-opacity-30 text-white rounded-xl p-8 w-96 shadow-lg relative">
        <!-- Avatar -->
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>

        <!-- Formulario -->
        <h2 class="text-center text-xl font-bold mt-12 mb-6">Iniciar Sesión</h2>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <!-- Campo de correo -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2">
                <svg class="h-6 w-6 text-gray-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <input type="email" name="email" placeholder="Correo Electrónico" class="flex-1 bg-transparent focus:outline-none" value="{{ old('email') }}" required>
            </div>

            <!-- Campo de contraseña -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2">
                <svg class="h-6 w-6 text-gray-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input type="password" name="password" placeholder="Contraseña" class="flex-1 bg-transparent focus:outline-none" required>
            </div>

            <!-- Botón de iniciar sesión -->
            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-shadow shadow-md">Iniciar Sesión</button>
        </form>

    </div>

</body>
</html>
