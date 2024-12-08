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

        .form-control {
            margin-bottom: 15px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Rol') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre del Rol</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del rol" required>
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permisos</label>
                            <select name="permissions[]" id="permissions" class="form-control" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Mantén presionado "Ctrl" para seleccionar múltiples permisos.</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" id="boton">Guardar Rol</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
