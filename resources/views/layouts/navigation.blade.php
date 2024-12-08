<script src="https://cdn.tailwindcss.com"></script>
<nav x-data="{ open: false }" class="bg-blue-900 shadow-lg border-b-2 border-blue-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (auth()->user() != NULL)
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/logo2.png') }}" class="block h-9 w-auto" />
                        </a>
                    </div>

                    <!-- Mostrar siempre para 'admin' -->
                    @role('admin')
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')" class="text-white hover:text-blue-300">
                                {{ __('Roles') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.*')" class="text-white hover:text-blue-300">
                                {{ __('Permisos') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('pacientes')" :active="request()->routeIs('pacientes')" class="text-white hover:text-blue-300">
                                {{ __('Pacientes') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('medicos')" :active="request()->routeIs('medicos')" class="text-white hover:text-blue-300">
                                {{ __('Médicos') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('agenda')" :active="request()->routeIs('agenda')" class="text-white hover:text-blue-300">
                                {{ __('Agenda') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('consultas')" :active="request()->routeIs('consultas')" class="text-white hover:text-blue-300">
                                {{ __('Consultas') }}
                            </x-nav-link>
                        </div>
                    @else
                        <!-- Mostrar solo si tiene el permiso -->
                        @can('ver usuarios')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('pacientes')" :active="request()->routeIs('pacientes')" class="text-white hover:text-blue-300">
                                    {{ __('Pacientes') }}
                                </x-nav-link>
                            </div>
                        @endcan
                        @can('ver usuarios')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('medicos')" :active="request()->routeIs('medicos')" class="text-white hover:text-blue-300">
                                    {{ __('Médicos') }}
                                </x-nav-link>
                            </div>
                        @endcan
                        @can('ver usuarios')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('agenda')" :active="request()->routeIs('agenda')" class="text-white hover:text-blue-300">
                                    {{ __('Agenda') }}
                                </x-nav-link>
                            </div>
                        @endcan
                        @can('ver usuarios')
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('consultas')" :active="request()->routeIs('consultas')" class="text-white hover:text-blue-300">
                                    {{ __('Consultas') }}
                                </x-nav-link>
                            </div>
                        @endcan
                    @endrole
                </div>

                <!-- Dropdown de ajustes -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-900 hover:bg-blue-700 transition">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-blue-900">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                 this.closest('form').submit();" class="text-blue-900">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        @else
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/logo2.png') }}" class="block h-9 w-auto" />
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-white hover:text-blue-300">
                            {{ __('Iniciar Sesión') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-white hover:text-blue-300">
                            {{ __('Registrarse') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        @endif
    </div>
</nav>
