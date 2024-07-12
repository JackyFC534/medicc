
    <x-app-layout >
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 10px;
        }

        .modal {
        display: none; /* Oculta el modal por defecto */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4); /* Fondo oscuro semi-transparente */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 40px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if (auth()->user()->tipo==="medico")
            {{ __('Agenda del Médico') }}
        @elseif (auth()->user()->tipo==="secretaria")
            {{ __('Agenda Secretaria') }}
        @elseif (auth()->user()->tipo==="admin")
            {{ __('Geston de la agenda') }}
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

<!-- Modal para agregar eventos -->
<div id="modal-add-event" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Agregar Evento</h2>
        <form id="add-event-form">
            <label for="event-type">Seleccione:</label>
            <select id="event-type" name="event-type">
                <option value="cita">Cita</option>
                <option value="plan">Plan</option>
            </select><br><br>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded">Agregar Evento</button>
            <button class="px-4 py-2 bg-gray-500 text-white rounded">Cancelar</button>
        </form>
    </div>
</div>

<!-- FullCalendar JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            eventClick: function(info) {
                // Aquí podrías abrir un modal para editar el evento
                console.log('Evento clickeado:', info.event);
            },
            dateClick: function(info) {
                // Al hacer clic en una fecha, abre el modal para agregar evento
                showModal();
                // Rellena el campo de fecha con la fecha seleccionada
                document.getElementById('event-date').value = info.dateStr;
                document.getElementById('selected-date').value = info.dateStr; // Actualiza el campo oculto
            }
        });
        calendar.render();

        // Función para mostrar el modal
        function showModal() {
            var modal = document.getElementById('modal-add-event');
            modal.style.display = 'block';
        }

        // Función para cerrar el modal al hacer clic en la "x"
        var closeBtn = document.getElementsByClassName('close')[0];
        closeBtn.onclick = function() {
            var modal = document.getElementById('modal-add-event');
            modal.style.display = 'none';
        };

        // Evento para agregar evento al enviar el formulario
        document.getElementById('add-event-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var title = document.getElementById('event-title').value;
            var date = document.getElementById('selected-date').value; // Obtiene la fecha del campo oculto
            // Agregar el evento al calendario
            calendar.addEvent({
                title: title,
                start: date,
                allDay: true // Evento de todo el día
            });
            // Cierra el modal después de agregar el evento
            var modal = document.getElementById('modal-add-event');
            modal.style.display = 'none';
            // Limpiar los campos del formulario
            document.getElementById('event-title').value = '';
            document.getElementById('event-date').value = '';
        });
    });
</script>


</x-app-layout>
