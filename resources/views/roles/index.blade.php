<x-app-layout>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- DataTables Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

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

        .boton-con-imagen-interna {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (auth()->user()->tipo==="admin")
                        <a href="{{ route('roles.create') }}" id="boton">Agregar Rol</a>
                        <br><br>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="rolesTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="font-medium">{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                                <img src="{{ asset('images/edit.png') }}" style="width: 35px; height: 37px">
                                            </a>
                                            @if (auth()->user()->tipo==="admin")
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="boton-con-imagen-interna" style="width: 35px; height: 37px">
                                                        <img src="{{ asset('images/delete.png') }}" style="width: 25px">
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#rolesTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json"
                }
            });
        });
    </script>
</x-app-layout>
