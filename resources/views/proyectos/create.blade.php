@extends('layouts.app')


@section('content')
    <x-u-f-value />
<div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Crear Proyecto</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 rounded bg-red-600 text-white border border-red-700">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proyectos.store') }}" method="POST" class="space-y-6 bg-gray-50 dark:bg-gray-700 shadow rounded-lg p-6">
        @csrf
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-white bg-gray-800" required>
        </div>
        <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-white bg-gray-800" required>
        </div>
        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Estado</label>
            <input type="text" name="estado" id="estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-white bg-gray-800" required>
        </div>
        <div>
            <label for="responsable" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Responsable</label>
            <input type="text" name="responsable" id="responsable" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-white bg-gray-800" required>
        </div>
        <div>
            <label for="monto" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Monto</label>
            <input type="number" step="0.01" name="monto" id="monto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-white bg-gray-800" required>
        </div>
        <div class="flex justify-end space-x-2">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">Guardar</button>
            <a href="{{ route('proyectos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition">Volver</a>
        </div>
    </form>
</div>
@endsection
