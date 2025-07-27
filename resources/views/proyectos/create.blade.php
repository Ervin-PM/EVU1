@extends('layouts.app')

@section('content')
<h1>Crear Proyecto</h1>

{{-- Mostrar errores de validación (si los agregas en el controlador) --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('proyectos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text" name="estado" id="estado" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="responsable" class="form-label">Responsable:</label>
        <input type="text" name="responsable" id="responsable" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="monto" class="form-label">Monto:</label>
        <input type="number" step="0.01" name="monto" id="monto" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
