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
            {{ __('Agenda') }}
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
                    }
                ],
                dateClick: function(info) {
                    Swal.fire({
                        title: 'Agregar cita',
                        html:
                            '<input id="swal-input1" class="swal2-input" placeholder="Nombre del paciente"><br>' +
                            '<label for="swal-input2" class="swal2-label">Hora de inicio</label>' +
                            '<input type="time" id="swal-input2" class="swal2-input"><br>' +
                            '<label for="swal-input3" class="swal2-label">Hora de fin</label>' +
                            '<input type="time" id="swal-input3" class="swal2-input">' +
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
                                notas: notas
                            };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const { nombre, horaInicio, horaFin, motivo, notas } = result.value;
                            calendar.addEvent({
                                title: `${nombre} - ${motivo}`,
                                start: `${info.dateStr}T${horaInicio}`,
                                end: `${info.dateStr}T${horaFin}`,
                                extendedProps: {
                                    notas: notas
                                }
                            });
                        }
                    });
                },
                eventClick: function(info) {
                    const { title, start, end, extendedProps } = info.event;
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
                            info.event.remove();
                        }
                    });
                }
            });

            calendar.render();
        });
    </script>



</x-app-layout>
