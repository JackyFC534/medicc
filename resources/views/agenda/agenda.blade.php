    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
                        title: 'Agregar evento',
                        input: 'text',
                        inputLabel: 'Nombre del evento',
                        showCancelButton: true,
                        confirmButtonText: 'Guardar',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true,
                        preConfirm: (eventTitle) => {
                            if (!eventTitle) {
                                Swal.showValidationMessage('Debes escribir un nombre para el evento');
                                return false;
                            }
                            calendar.addEvent({
                                title: eventTitle,
                                start: info.date,
                                allDay: info.allDay
                            });
                        }
                    });
                },
                eventClick: function(info) {
                    Swal.fire({
                        title: 'Detalles del evento',
                        text: info.event.title,
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
