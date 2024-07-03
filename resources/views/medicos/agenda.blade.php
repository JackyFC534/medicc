    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    
    <x-app-layout>
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 10px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if (auth()->user()->tipo==="medico")
            {{ __('Agenda del Médico') }}
        @elseif (auth()->user()->tipo==="secretaria")
            {{ __('Agenda Secretaria') }}
        @endif
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                events: [
                    // Ejemplo de evento
                    {
                        title: 'Reunión',
                        start: '2023-07-01T08:00:00',
                        end: '2023-07-01T09:00:00',
                        tipo: 'cita' // Por defecto, es una cita
                    }
                ],
                dateClick: function(info) {
                    Swal.fire({
                        title: 'Seleccionar tipo de evento',
                        html:
                            `<select id="swal-select" class="swal2-select">
                                <option value="cita">Cita</option>
                                <option value="plan">Plan</option>
                            </select>`,
                        focusConfirm: false,
                        showCancelButton: true,
                        confirmButtonText: 'Siguiente',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const tipoEvento = document.getElementById('swal-select').value;
                            if (tipoEvento === 'cita') {
                                showCitaForm(info);
                            } else if (tipoEvento === 'plan') {
                                showPlanForm(info);
                            }
                        }
                    });
                },
                eventDidMount: function(info) {
                    if (info.event.extendedProps.tipo === 'cita') {
                        info.el.style.backgroundColor = '#85C1E9'; // Color para citas
                    } else if (info.event.extendedProps.tipo === 'plan') {
                        info.el.style.backgroundColor = '#A3E4D7'; // Color para planes
                    }
                },
                eventClick: function(info) {
                    const { title, start, end, extendedProps } = info.event;
                    if (extendedProps.tipo === 'cita') {
                        showCitaDetails(title, start, end, extendedProps);
                    } else if (extendedProps.tipo === 'plan') {
                        showPlanDetails(title, start, end, extendedProps);
                    }
                }
            });

            function showCitaForm(info) {
                Swal.fire({
                    title: 'Agregar cita',
                    html:
                        '<input id="swal-input1" class="swal2-input" placeholder="Nombre del paciente"><br>' +
                        '<label for="swal-input2" class="swal2-label">Hora de inicio</label>' +
                        '<input type="time" id="swal-input2" class="swal2-input"><br>' +
                        '<label for="swal-input3" class="swal2-label">Hora de fin</label>' +
                        '<input type="time" id="swal-input3" class="swal2-input"><br>' +
                        '<input id="swal-input4" class="swal2-input" placeholder="Motivo de la cita">' +
                        '<textarea id="swal-input5" class="swal2-textarea" placeholder="Notas"></textarea>',
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                    preConfirm: () => {
                        const nombre = document.getElementById('swal-input1').value;
                        const horaInicio = document.getElementById('swal-input2').value;
                        const horaFin = document.getElementById('swal-input3').value;
                        const motivo = document.getElementById('swal-input4').value;
                        const notas = document.getElementById('swal-input5').value;

                        if (!nombre || !horaInicio || !horaFin || !motivo) {
                            Swal.showValidationMessage('Todos los campos son obligatorios');
                            return false;
                        }

                        return {
                            nombre: nombre,
                            horaInicio: horaInicio,
                            horaFin: horaFin,
                            motivo: motivo,
                            notas: notas,
                            tipo: 'cita'
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const { nombre, horaInicio, horaFin, motivo, notas } = result.value;
                        calendar.addEvent({
                            title: `${nombre} - ${motivo}`,
                            start: `${info.dateStr}T${horaInicio}`,
                            end: `${info.dateStr}T${horaFin}`,
                            backgroundColor: '#3788D8', // Color para citas
                            extendedProps: {
                                notas: notas,
                                tipo: 'cita'
                            }
                        });
                    }
                });
            }

            function showPlanForm(info) {
                Swal.fire({
                    title: 'Agregar plan',
                    html:
                        '<input id="swal-input1" class="swal2-input" placeholder="Nombre del plan"><br>' +
                        '<label for="swal-input2" class="swal2-label">Hora de inicio</label>' +
                        '<input type="time" id="swal-input2" class="swal2-input"><br>' +
                        '<label for="swal-input3" class="swal2-label">Hora de fin</label>' +
                        '<input type="time" id="swal-input3" class="swal2-input"><br>' +
                        '<textarea id="swal-input4" class="swal2-textarea" placeholder="Detalles del plan"></textarea>',
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                    preConfirm: () => {
                        const nombre = document.getElementById('swal-input1').value;
                        const horaInicio = document.getElementById('swal-input2').value;
                        const horaFin = document.getElementById('swal-input3').value;
                        const detalles = document.getElementById('swal-input4').value;

                        if (!nombre || !horaInicio || !horaFin || !detalles) {
                            Swal.showValidationMessage('Todos los campos son obligatorios');
                            return false;
                        }

                        return {
                            nombre: nombre,
                            horaInicio: horaInicio,
                            horaFin: horaFin,
                            detalles: detalles,
                            tipo: 'plan'
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const { nombre, horaInicio, horaFin, detalles } = result.value;
                        calendar.addEvent({
                            title: nombre,
                            start: `${info.dateStr}T${horaInicio}`,
                            end: `${info.dateStr}T${horaFin}`,
                            backgroundColor: '#34A853', // Color para planes
                            extendedProps: {
                                detalles: detalles,
                                tipo: 'plan'
                            }
                        });
                    }
                });
            }

            function showCitaDetails(title, start, end, extendedProps) {
                Swal.fire({
                    title: 'Detalles de la cita',
                    html: `
                        <p><strong>Nombre del paciente:</strong> ${title.split(' - ')[0]}</p>
                        <p><strong>Motivo:</strong> ${title.split(' - ')[1]}</p>
                        <p><strong>Hora de inicio:</strong> ${start.toISOString().slice(11, 16)}</p>
                        <p><strong>Hora de fin:</strong> ${end ? end.toISOString().slice(11, 16) : ''}</p>
                        <p><strong>Notas:</strong> ${extendedProps.notas}</p>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Cerrar',
                    cancelButtonText: 'Borrar',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        calendar.getEventById(info.event.id).remove();
                    }
                });
            }

            function showPlanDetails(title, start, end, extendedProps) {
                Swal.fire({
                    title: 'Detalles del plan',
                    html: `
                        <p><strong>Nombre del plan:</strong> ${title}</p>
                        <p><strong>Detalles:</strong> ${extendedProps.detalles}</p>
                        <p><strong>Hora de inicio:</strong> ${start.toISOString().slice(11, 16)}</p>
                        <p><strong>Hora de fin:</strong> ${end ? end.toISOString().slice(11, 16) : ''}</p>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Cerrar',
                    cancelButtonText: 'Borrar',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        calendar.getEventById(info.event.id).remove();
                    }
                });
            }

            calendar.render();
        });

    </script>

</x-app-layout>
