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
            {{ __('Registrar nuevo paciente') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('pacientes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-90">Nombre(s)</label>
                                <input type="text" id="nombres" name="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
                            </div>
                            <div>
                                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900">Apellido(s)</label>
                                <input type="text" id="apellidos" name="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "  placeholder="Smith" required />
                            </div>
                            <div>
                                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900">Fecha de nacimiento</label>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                            </div>
                            <div>
                                <label for="genero" class="block mb-2 text-sm font-medium text-gray-900">Género</label>
                                <select id="genero" name="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <option value="" disabled selected>Selecciona un género</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div>
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900">Correo</label>
                                <input type="email" id="correo" name="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ejemplo@gmail.com" required />
                            </div>
                            <div>
                                <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                                <input type="password" id="contraseña" name="contraseña" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            </div>
                            <div>
                                <label for="contraseña_confirm" class="block mb-2 text-sm font-medium text-gray-900">Confirmar contraseña</label>
                                <input type="password" id="contraseña_confirm" name="contraseña_confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            </div>
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123-45-678" required />
                            </div>
                            <div>
                                <label for="notas" class="block mb-2 text-sm font-medium text-gray-900">Notas</label>
                                <input type="text" id="notas" name="notas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            </div>
                        </div>

                        <button type="submit" id="boton" style="width: 105px">Guardar</button>
                        <a href="{{ route('pacientes') }}" id="boton" style="width: 105px">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fechaNacimientoInput = document.getElementById('fecha_nacimiento');
            const today = new Date().toISOString().split('T')[0];
            fechaNacimientoInput.setAttribute('max', today);

            document.getElementById('usuarioForm').addEventListener('submit', function (event) {
                const fechaNacimiento = new Date(fechaNacimientoInput.value);
                const todayDate = new Date(today);

                if (fechaNacimiento >= todayDate) {
                    event.preventDefault();
                    alert('La fecha de nacimiento debe ser anterior a la fecha actual.');
                }

                const contraseña = document.getElementById('contraseña').value;
                const contraseñaConfirm = document.getElementById('contraseña_confirm').value;

                if (contraseña !== contraseñaConfirm) {
                    event.preventDefault();
                    alert('Las contraseñas no coinciden. Por favor, verifica y vuelve a intentar.');
                } 
            });

        });
    </script>
</x-app-layout>
