<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 10px;
    }

    .cita-event {
        background-color: #3b82f6; /* Color para citas */
    }

    .plan-event {
        background-color: #34d399; /* Color para planes */
        color: white;
    }

    .swal2-confirm {
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

    .swal2-cancel {
    background-color: gray; /* Cambia el color de fondo del botón Cancelar */
    color: white; /* Cambia el color del texto del botón Cancelar */
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
    var today = new Date().toISOString().split('T')[0];

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth'
        },
        validRange: {
            start: today
        },
        dateClick: function(info) {
            if (info.dateStr >= today) {
                openEventModal(info.dateStr);
            }
        },
        eventClick: function(info) {
            openEventDetails(info.event);
        },
        events: '/agenda/events' // Aquí se cargan los eventos
    });

    calendar.render();

    function generateTimeOptions() {
        const start = 8; // 08:00
        const end = 14; // 14:00
        let options = '';

        for (let time = start; time <= end; time += 0.5) {
            const hours = Math.floor(time);
            const minutes = (time - hours) * 60;
            const formattedHours = hours.toString().padStart(2, '0');
            const formattedMinutes = minutes.toString().padStart(2, '0');
            const timeString = `${formattedHours}:${formattedMinutes}`;
            options += `<option value="${timeString}">${timeString}</option>`;
        }

        return options;
    }

    function openEventModal(date) {
        Swal.fire({
            title: 'Agregar Evento',
            html: `
                <form method="POST" action="{{ route('agenda.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="grid gap-4 mb-1 md:grid-cols-3">
                            <label for="id_paciente" class="block text-gray-700">Paciente</label>
                            <a href="{{ route('pacientes.create') }}" id="boton" style="width: 90px; height:30px; font-size: 12px;" class="swal2-confirm">Nuevo</a>
                        </div>

                        <select id="id_paciente" name="id_paciente" class="w-full px-3 py-2 border rounded" required>
                            <option value="" disabled selected>Seleccione el paciente...</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="grid gap-4 mb-2 md:grid-cols-3">
                        <label for="id_medico" class="block text-gray-700">Médico</label>
                        </div>

                        <select id="id_medico" name="id_medico" class="w-full px-3 py-2 border rounded" required>
                            <option value="" disabled selected>Seleccione el médico...</option>
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nombres }} {{ $medico->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                    <div class="grid gap-4 mb-1 md:grid-cols-3">
                        <label for="date" class="block text-gray-700">Fecha</label>
                    </div>
                        <input type="date" id="date" name="date" value="${date}" class="w-full px-3 py-2 border rounded" required>
                    </div>


                    <div class="mb-3">
                    <div class="grid gap-4 mb-1 md:grid-cols-3">
                        <label for="hora" class="block text-gray-700">Hora de la cita</label>
                    </div>

                        <select id="hora" name="hora" class="w-full px-3 py-2 border rounded required">
                            <option value="" disabled selected>Seleccione la hora...</option>
                            ${generateTimeOptions()}
                        </select>
                    </div>

                 
                    <div class="mb-3">
                    <div class="grid gap-4 mb-1 md:grid-cols-3">
                        <label for="motivo" class="block text-gray-700">Motivo</label>
                    </div>
                        <textarea id="motivo" name="motivo" class="w-full px-3 py-2 border rounded h-32 resize-none" required></textarea>
                    </div>

                    <button type="submit" id="boton" style="width: 105px" class="swal2-confirm">Guardar</button>
                </form>
            `,
            showConfirmButton: false,
            showCloseButton: true
        });
    }

    function openEventDetails(event) {
        // Llamar a la API para obtener los detalles completos del evento
        fetch(`/agenda/${event.id}`)
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: data.title,
                    html: `
                        <p><strong>Fecha:</strong> ${new Date(data.date).toLocaleDateString('es-ES', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric'
                        })}</p>
                        <p><strong>Paciente:</strong> ${data.paciente.nombres} ${data.paciente.apellidos}</p>
                        <p><strong>Médico:</strong> ${data.medico.nombres} ${data.medico.apellidos}</p>
                        <p><strong>Motivo:</strong> ${data.motivo}</p>
                        @csrf
                        <a href="{{ route('consultas.paciente', $paciente->id) }}" style="" class="mt-4 px-4 py-2 bg-green-800 text-white rounded">Consultar</a>
                        <button id="edit-event" class="mt-4 px-4 py-2 bg-blue-800 text-white rounded" data-event-id="${data.id}">Editar</button>
                        <button id="delete-event" class="mt-4 px-4 py-2 bg-black text-white rounded" data-event-id="${data.id}">Eliminar</button>

                        `,
                    showCloseButton: true,
                    showConfirmButton: false, // Esto asegura que el botón OK no aparezca

                    didOpen: () => {
                        document.getElementById('delete-event').addEventListener('click', function() {
                            const eventId = this.getAttribute('data-event-id');
                            deleteEvent(eventId);
                        });

                        document.getElementById('edit-event').addEventListener('click', function() {
                        const eventId = this.getAttribute('data-event-id');
                        openEditEventModal(eventId, data);
                    });
                    }
                });
            })
            .catch(error => console.error('Error fetching event details:', error));
    }

    function deleteEvent(eventId) {
        fetch(`/agenda/${eventId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok) {
                calendar.refetchEvents(); // Actualizar eventos en el calendario
                Swal.fire('Eliminado', 'El evento ha sido eliminado', 'success');
            } else {
                Swal.fire({
                    willClose: () => {
                    // Recargar la página después de cerrar la alerta
                    window.location.reload();
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error deleting event:', error);
            Swal.fire('Error', 'Hubo un problema al eliminar el evento', 'error');
        });
    }

    function openEditEventModal(eventId, eventData) {
        Swal.fire({
            title: 'Editar Evento',
            html: `
                <form id="edit-event-form" method="POST" action="{{ route('agenda.update', '') }}/${eventId}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="grid gap-4 mb-1 md:grid-cols-3">
                            <label for="id_paciente" class="block text-gray-700">Paciente</label>
                        </div>
                        <select id="id_paciente" name="id_paciente" class="w-full px-3 py-2 border rounded" required>
                            <option value="" disabled>Seleccione el paciente...</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" ${eventData.paciente_id === {{ $paciente->id }} ? 'selected' : ''}>{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="grid gap-4 mb-1 md:grid-cols-3">
                            <label for="id_medico" class="block text-gray-700">Médico</label>
                        </div>
                        <select id="id_medico" name="id_medico" class="w-full px-3 py-2 border rounded" required>
                            <option value="" disabled>Seleccione el médico...</option>
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}" ${eventData.medico_id === {{ $medico->id }} ? 'selected' : ''}>{{ $medico->nombres }} {{ $medico->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="grid gap-4 mb-1 md:grid-cols-3">
                            <label for="date" class="block text-gray-700">Fecha</label>
                        </div>
                        <input type="date" id="date" name="date" value="${eventData.date}" class="w-full px-3 py-2 border rounded" required>
                    </div>

                    <div class="mb-3">
                        <div class="grid gap-4 mb-1 md:grid-cols-3">
                            <label for="hora" class="block text-gray-700">Hora de la cita</label>
                        </div>
                        <select id="hora" name="hora" class="w-full px-3 py-2 border rounded" required>
                            <option value="" disabled>Seleccione la hora...</option>
                            ${generateTimeOptions(eventData.hora)}
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="grid gap-4 mb-1 md:grid-cols-3">
                            <label for="motivo" class="block text-gray-700">Motivo</label>
                        </div>
                        <textarea id="motivo" name="motivo" class="w-full px-3 py-2 border rounded h-32 resize-none" required>${eventData.motivo}</textarea>
                    </div>

                    <button type="submit" id="boton" style="width: 110px" class="swal2-confirm">Actualizar</button>
                </form>
            `,
            showConfirmButton: false,
            showCloseButton: true
        });
    }
});
</script>
</x-app-layout>
