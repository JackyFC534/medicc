<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .error {
            background-color: #FEE2E2; /* Rojo claro */
            border: 2px solid #EF4444; /* Borde rojo */
        }
        .success {
            background-color: #D1FAE5; /* Verde claro */
            border: 2px solid #10B981; /* Borde verde */
        }
    </style>
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
        <h2 class="text-center text-xl font-bold mt-12 mb-6">Crear Cuenta</h2>
        <form class="space-y-6" id="registerForm">
            <!-- Campo de Nombre -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 name-container">
                <svg class="h-6 w-6 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <input type="text" id="name" placeholder="Nombre Completo" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Campo de Número de Teléfono -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 phone-container">
                <svg class="h-6 w-6 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <input type="tel" id="phone" placeholder="Número de Teléfono" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Campo de Fecha de Nacimiento -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 dob-container">
                <svg class="h-6 w-6 text-black mr-3"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="3" y="8" width="18" height="4" rx="1" />  <line x1="12" y1="8" x2="12" y2="21" />  <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />  <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" /></svg>
                <input type="date" id="dob" placeholder="Fecha de Nacimiento" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Campo de correo -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 email-container">
                <svg class="h-6 w-6 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 6H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v5a2 2 0 01-2 2z"/>
                </svg>
                <input type="email" id="email" placeholder="Correo Electrónico" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Confirmación de correo -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 email-container">
                <svg class="h-6 w-6 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 6H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v5a2 2 0 01-2 2z"/>
                </svg>
                <input type="email" id="confirmEmail" placeholder="Confirmar Correo" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Campo de contraseña -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 password-container">
                <svg class="h-6 w-6 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input type="password" id="password" placeholder="Contraseña" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Confirmación de contraseña -->
            <div class="flex items-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 password-container">
                <svg class="h-6 w-6 text-black mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input type="password" id="confirmPassword" placeholder="Confirmar Contraseña" class="flex-1 bg-transparent focus:outline-none">
            </div>

            <!-- Botón de registro -->
            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-shadow shadow-md">Registrarse</button>
        </form>
    </div>

    <script>
        const email = document.getElementById('email');
        const confirmEmail = document.getElementById('confirmEmail');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');

        confirmEmail.addEventListener('input', () => {
            const container = confirmEmail.closest('.email-container');
            if (email.value === confirmEmail.value) {
                container.classList.remove('error');
                container.classList.add('success');
            } else {
                container.classList.remove('success');
                container.classList.add('error');
            }
        });

        confirmPassword.addEventListener('input', () => {
            const container = confirmPassword.closest('.password-container');
            if (password.value === confirmPassword.value) {
                container.classList.remove('error');
                container.classList.add('success');
            } else {
                container.classList.remove('success');
                container.classList.add('error');
            }
        });
    </script>

</body>
</html>
