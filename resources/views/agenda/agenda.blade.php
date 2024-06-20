<x-app-layout>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            align-items: center; /* Alinear elementos verticalmente al centro */
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


        .agenda-container {
            margin-top: 50px;
        }
        .agenda-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .agenda-table {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Hora</th>
                                <th scope="col">Lunes</th>
                                <th scope="col">Martes</th>
                                <th scope="col">Miércoles</th>
                                <th scope="col">Jueves</th>
                                <th scope="col">Viernes</th>
                            </tr>
                        </thead>
                        <tbody> <!-- ejemplo de agenda con contenido fijo -->
                            <tr>
                                <th scope="row">8:00 - 8:30</th>
                                <td onclick="showAlert('Reunión')">Reunión</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                            </tr>
                            <tr>
                                <th scope="row">8:30 - 9:00</th>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                            </tr>
                            <tr>
                                <th scope="row">9:00 - 9:30</th>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                            </tr>
                            <tr>
                                <th scope="row">9:30 - 10:00</th>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                            </tr>
                            <tr>
                                <th scope="row">10:00 - 11:30</th>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                            </tr>
                            <tr>
                                <th scope="row">11:30 - 12:00</th>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                            </tr>
                            <tr>
                                <th scope="row">12:00 - 12:30</th>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                            </tr>
                            <tr>
                                <th scope="row">12:30 - 1:00</th>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                                <td onclick="showAlert('---')">---</td>
                                <td onclick="showAlert('')"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showAlert(content) {
            if (content) {
                Swal.fire({
                    title: 'Más detalles',
                    text: content,
                    showCancelButton: true,
                    confirmButtonText: 'Cerrar',
                    cancelButtonText: 'Borrar',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        // Acción para confirmar el borrado del contenido
                        confirmDelete(content);
                    }
                });
            } else {
                Swal.fire({
                    title: 'No hay detalles disponibles',
                    text: '¿Quieres agregar detalles?',
                    showCancelButton: true,
                    confirmButtonText: 'Agregar',
                    cancelButtonText: 'Cerrar',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Acción para agregar contenido
                        agregarContenido();
                    }
                });
            }
        }

        function confirmDelete(content) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Implementar la lógica para borrar el contenido
                    borrarContenido(content);
                }
            });
        }

        function borrarContenido(content) {
            fetch('/ruta-para-borrar-contenido', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ contenido: content })
            }).then(response => {
                if (response.ok) {
                    Swal.fire('Contenido borrado', '', 'success').then(() => {
                        // Recargar la página o actualizar la lista de contenidos
                        location.reload();
                    });
                } else {
                    Swal.fire('Error al borrar contenido', '', 'error');
                }
            });
        }

        function agregarContenido() {
            Swal.fire({
                title: 'Seleccionar tipo de contenido',
                html: `
                    <select id="tipo-contenido" class="swal2-input" style="width: 60%;">
                        <option value="cita">Cita de paciente</option>
                        <option value="plan">Otro</option>
                    </select>
                `,
                showCancelButton: true,
                confirmButtonText: 'Siguiente',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
                preConfirm: () => {
                    const tipo = document.getElementById('tipo-contenido').value;
                    if (!tipo) {
                        Swal.showValidationMessage('Selecciona un tipo de contenido');
                    }
                    return { tipo };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const tipo = result.value.tipo;
                    if (tipo === 'cita') {
                        agregarCita();
                    } else {
                        agregarPlan();
                    }
                }
            });
        }

        function agregarCita() {
            Swal.fire({
                title: 'Agregar una cita',
                html: `
                    <label for="paciente">Seleccione un paciente:</label>
                    <select id="paciente" class="swal2-input" style="width: 60%;">
                        <option value="p1">Paciente 1</option>
                        <option value="p2">Paciente 2</option>
                        <option value="p3">Paciente 3</option>
                    </select>
                `,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
                preConfirm: () => {
                    const paciente = document.getElementById('paciente').value;
                    if (!paciente) {
                        Swal.showValidationMessage('Debes seleccionar un paciente');
                        return false;
                    }
                    return { paciente };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enviar el contenido al servidor
                    enviarContenido(result.value.paciente, 'cita');
                }
            });
        }

        function agregarPlan() {
            Swal.fire({
                title: 'Agregar un plan',
                inputLabel: 'Detalles',
                input: 'textarea',
                inputPlaceholder: 'Escribe los detalles aquí...',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
                willOpen: () => {
                    // Asignar el ID al textarea después de que el modal se haya abierto
                    document.querySelector('.swal2-textarea').id = 'detalles';
                },
                preConfirm: () => {
                    const detalles = document.getElementById('detalles').value;
                    if (!detalles) {
                        Swal.showValidationMessage('Debes escribir los detalles');
                        return false;
                    }
                    return { detalles };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enviar el contenido al servidor
                    enviarContenido(result.value.detalles, 'plan');
                }
            });
        }

        function enviarContenido(detalles, tipo, paciente = null) {
            fetch('/ruta-para-agregar-contenido', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ detalles, tipo, paciente })
            }).then(response => {
                if (response.ok) {
                    Swal.fire('Contenido agregado', '', 'success').then(() => {
                        // Recargar la página o actualizar la lista de contenidos
                        location.reload();
                    });
                } else {
                    Swal.fire('Error al agregar contenido', '', 'error');
                }
            });
        }
    </script>

</x-app-layout>