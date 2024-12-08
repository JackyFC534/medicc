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
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Permiso') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Permiso</label>
                            <input type="text" name="name" id="name" value="{{ $permission->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('permissions.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">Cancelar</a>
                            <button type="submit" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
