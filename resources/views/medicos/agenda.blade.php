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

        #eventModal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 50;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        #eventModal .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

<!-- Modal -->
<div id="eventModal" class="fixed inset-0 flex items-center justify-center">
    <div class="modal-content">
        <h2 class="text-xl mb-4">Agregar Evento</h2>
        <form id="eventForm">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Título</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Fecha</label>
                <input type="date" id="date" name="date" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            dateClick: function(info) {
                openModal(info.dateStr);
            }
        });

        calendar.render();

        document.getElementById('eventForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var title = document.getElementById('title').value;
            var date = document.getElementById('date').value;

            if (title && date) {
                calendar.addEvent({
                    title: title,
                    start: date
                });
                closeModal();
            }
        });
    });

    function openModal(date) {
        document.getElementById('date').value = date;
        document.getElementById('eventModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('eventModal').style.display = 'none';
    }
</script>



</x-app-layout>
