@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Confirmar Eliminación</h1>
    <p>¿Estás seguro de que quieres eliminar el proyecto "{{ $proyecto->nombre }}"?</p>
    <p><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
    <p><strong>Monto:</strong> {{ number_format($proyecto->monto, 2) }}</p>

    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
