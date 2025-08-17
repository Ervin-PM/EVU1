@extends('layouts.app')


@section('content')
    <x-u-f-value />

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4 sm:mb-0">Proyectos de la Empresa TI</h1>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">Cerrar sesión</button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-600 text-white border border-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('proyectos.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">Nuevo Proyecto</a>
    </div>

    <div class="overflow-x-auto bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha inicio</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Responsable</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Monto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Creado por</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($proyecto as $proyecto)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-white">{{ $proyecto->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-white">{{ $proyecto->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-white">{{ $proyecto->fecha_inicio }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-white">{{ $proyecto->estado }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-white">{{ $proyecto->responsable }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-white">${{ number_format($proyecto->monto, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-white">
                        @if($proyecto->created_by && \App\Models\User::find($proyecto->created_by))
                            {{ \App\Models\User::find($proyecto->created_by)->name }}
                        @else
                            <span class="text-gray-400">Desconocido</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center space-x-2">
                        <a href="{{ route('proyectos.show', $proyecto) }}" class="inline-flex items-center px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-xs font-semibold">Ver</a>
                        <a href="{{ route('proyectos.edit', $proyecto) }}" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs font-semibold">Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs font-semibold" onclick="return confirm('¿Desea eliminar el proyecto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">No hay proyectos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
