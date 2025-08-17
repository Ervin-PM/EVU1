@extends('layouts.app')


@section('content')
    <x-u-f-value />
<div class="max-w-xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Detalle del Proyecto</h1>
    <div class="bg-gray-50 dark:bg-gray-700 shadow rounded-lg p-6">
        <div class="mb-4">
            <span class="text-gray-500 dark:text-gray-300 text-xs">ID Proyecto:</span>
            <span class="font-semibold text-gray-800 dark:text-white">#{{ $proyecto->id }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700 dark:text-gray-200">Nombre:</span>
            <span class="text-white">{{ $proyecto->nombre }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700 dark:text-gray-200">Fecha de inicio:</span>
            <span class="text-white">{{ $proyecto->fecha_inicio }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700 dark:text-gray-200">Estado:</span>
            <span class="text-white">{{ $proyecto->estado }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700 dark:text-gray-200">Responsable:</span>
            <span class="text-white">{{ $proyecto->responsable }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700 dark:text-gray-200">Monto:</span>
            <span class="text-white">${{ number_format($proyecto->monto, 2) }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700 dark:text-gray-200">Creado por:</span>
            <span class="text-white">
                @if($proyecto->created_by && \App\Models\User::find($proyecto->created_by))
                    {{ \App\Models\User::find($proyecto->created_by)->name }}
                @else
                    <span class="text-gray-400">Desconocido</span>
                @endif
            </span>
        </div>
    </div>
    <div class="flex justify-end mt-6">
        <a href="{{ route('proyectos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition">Volver al listado</a>
    </div>
</div>
@endsection
