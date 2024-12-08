<x-app-layout>
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

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #444;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rol') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="form-label">Nombre del Rol:</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="form-input" required>
                        </div>

                        <div>
                            <label for="permissions" class="form-label">Permisos:</label>
                            <div>
                                @foreach ($permissions as $permission)
                                    <div>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label>{{ $permission->name }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <button type="submit" class="form-button">Actualizar Rol</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
