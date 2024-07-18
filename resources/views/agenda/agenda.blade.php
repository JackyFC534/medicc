<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/es.js"></script>

    <x-app-layout >
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 10px;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 50;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        #boton {
            display: inline-block;
            padding: 2px 2px;
            background-color: black;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            font-size: 15px;
        }

        .cita-event {
            background-color: #3b82f6; /* Color para citas */
            
        }

        .plan-event {
            background-color: #34d399; /* Color para planes */
            color: white;
        }

        .modal {
            display: none; /* Inicialmente oculto */
            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro */
        }
        
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

<!-- Modal para seleccionar el tipo de evento -->
<div id="eventModal" class="modal fixed inset-0 flex items-center justify-center">
    <div class="modal-content">
        <h2 class="text-xl mb-4">Agregar Evento</h2>
        <form id="eventForm">
            <div class="mb-4">
                <label for="event-type" class="block text-gray-700">Tipo de evento</label>
                <select id="event-type" name="event-type" class="w-full px-3 py-2 border rounded">
                    <option value="" disabled selected>Seleccione el evento...</option>
                    <option value="cita">Cita de un paciente</option>
                    <option value="plan">Plan</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded" onclick="closeModal('eventModal')">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded" onclick="nextModal()">Aceptar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para agregar cita -->
<div id="citaModal" class="modal fixed inset-0 flex items-center justify-center">
    <div class="modal-content">
        <h2 class="text-xl mb-4">Agregar una cita de paciente</h2>
        <form id="citaForm">
            <div class="mb-4">
                <div class="grid gap-6 mb-2 md:grid-cols-2">
                    <label for="paciente" class="block text-gray-700">Nombre del paciente</label>
                    <a href="{{ route('pacientes.create') }}" id="boton" class="bg-blue-500 text-white rounded">Nuevo</a>
                </div>
                <select id="paciente" name="paciente" class="w-full px-3 py-2 border rounded" required>
                    <option value="" disabled selected>Seleccione el paciente...</option>
                    @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->nombres }} {{ $paciente->apellidos }}">{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="medico" class="block text-gray-700">Nombre del médico</label>
                <select id="medico" name="medico" class="w-full px-3 py-2 border rounded" required>
                    <option value="" disabled selected>Seleccione el médico...</option>
                    @foreach($medicos as $medico)
                    <option value="{{ $medico->nombres }} {{ $medico->apellidos }}">{{ $medico->nombres }} {{ $medico->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="cita-date" class="block text-gray-700">Fecha</label>
                <input type="date" id="cita-date" name="cita-date" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="hora_cita" class="block text-gray-700">Hora de la cita</label>
                <select id="hora_cita" name="hora_cita" class="w-full px-3 py-2 border rounded" required>
                    <option value="" disabled selected>Seleccione la hora...</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="motivo" class="block text-gray-700">Motivo</label>
                <textarea id="motivo" name="motivo" class="w-full px-3 py-2 border rounded h-32 resize-none"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded" onclick="closeModal('citaModal')">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Agregar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para agregar plan -->
 
<!-- Modal para agregar plan -->
 
<!-- Modal para agregar plan -->
 
<!-- Modal para agregar plan -->
 
<!-- Modal para agregar plan -->
 
<div id="planModal" class="modal fixed inset-0 flex items-center justify-center">
    <div class="modal-content">
        <h2 class="text-xl mb-4">Agregar Plan</h2>
        <form id="planForm">
            <div class="mb-4">
                <label for="plan-title" class="block text-gray-700">Nombre del plan</label>
                <input type="text" id="plan-title" name="plan-title" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="plan-date" class="block text-gray-700">Fecha</label>
                <input type="date" id="plan-date" name="plan-date" class="w-full px-3 py-2 border rounded" readonly>
            </div>
            <div class="mb-4">
                <label for="hora_plan" class="block text-gray-700">Hora del plan</label>
                <input type="text" id="hora_plan" name="hora_plan" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="detalles" class="block text-gray-700">Detalles</label>
                <textarea id="detalles" name="detalles" class="w-full px-3 py-2 border rounded h-32 resize-none"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded" onclick="closeModal('planModal')">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Agregar</button>
            </div>
        </form>
    </div>
</div>

<div id="eventDetailsModal" class="modal fixed inset-0 flex items-center justify-center">
    <div class="modal-content">
        <h2 class="text-xl mb-4" id="event-title"></h2>
        <div id="event-details"></div>
        <button id="delete-event" class="mt-4 px-4 py-2 bg-black text-white rounded">Eliminar Evento</button>
        <button class="mt-4 px-4 py-2 bg-gray-500 text-white rounded" onclick="closeModal('eventDetailsModal')">Cerrar</button>
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
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            validRange: {
                start: today
            },
            dateClick: function(info) {
                if (info.dateStr >= today) {
                    openModal('eventModal');
                    document.getElementById('cita-date').value = info.dateStr;
                    document.getElementById('plan-date').value = info.dateStr;
                }
            },
            eventClick: function(info) {
                openEventDetails(info.event);
            }
        });
        calendar.render();

        const select = document.getElementById('hora_cita');
        const start = 8; // 08:00
        const end = 14; // 14:00

        for (let time = start; time <= end; time += 0.5) {
            const option = document.createElement('option');
            option.value = formatTime(time);
            option.textContent = formatTime(time);
            select.appendChild(option);
        }

        function formatTime(decimalTime) {
            const hours = Math.floor(decimalTime);
            const minutes = (decimalTime % 1) * 60;
            return `${String(hours).padStart(2, '0')}:${minutes === 0 ? '00' : '30'}`;
        }

        document.getElementById('citaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var title = "Paciente: " + document.getElementById('paciente').value + " Médico: " + document.getElementById('medico').value;
            var date = document.getElementById('cita-date').value;
            if (title && date) {
                calendar.addEvent({
                    id: Date.now(), // Usar timestamp como ID
                    title: title,
                    start: date + 'T' + document.getElementById('hora_cita').value + ':00',
                    classNames: ['cita-event']
                });
                closeModal('citaModal');
            }
        });

        document.getElementById('planForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var title = document.getElementById('plan-title').value;
            var date = document.getElementById('plan-date').value;
            if (title && date) {
                calendar.addEvent({
                    id: Date.now(), // Usar timestamp como ID
                    title: title,
                    start: date + 'T' + document.getElementById('hora_plan').value + ':00',
                    classNames: ['plan-event']
                });
                closeModal('planModal');
            }
        });

        document.getElementById('delete-event').addEventListener('click', function() {
            const eventId = this.dataset.eventId;
            const event = calendar.getEventById(eventId);
            if (event) {
                event.remove();
            }
            closeModal('eventDetailsModal');
        });

        function openEventDetails(event) {
            document.getElementById('event-title').textContent = event.title;
            document.getElementById('event-details').textContent = `Fecha: ${event.start.toLocaleString()}`;
            document.getElementById('delete-event').dataset.eventId = event.id;
            openModal('eventDetailsModal');
        }
    });

    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
    }

    function nextModal() {
        var eventType = document.getElementById('event-type').value;
        closeModal('eventModal');
        if (eventType == 'cita') {
            openModal('citaModal');
        } else if (eventType == 'plan') {
            openModal('planModal');
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        resetForm(modalId);
    }

    function resetForm(modalId) {
        var form = document.querySelector(`#${modalId} form`);
        if (form) {
            form.reset();
        }
    }
</script>

</x-app-layout>
