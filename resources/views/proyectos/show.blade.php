@extends('layouts.app')

@section('content')
<h1>Detalle del Proyecto</h1>

<div class="card">
    <div class="card-header">
        Proyecto #{{ $proyecto->id }}
    </div>
    <div class="card-body">
        <p><strong>Nombre:</strong> {{ $proyecto->nombre }}</p>
        <p><strong>Fecha de inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
        <p><strong>Estado:</strong> {{ $proyecto->estado }}</p>
        <p><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
        <p><strong>Monto:</strong> {{ $proyecto->monto }}</p>
    </div>
</div>

<a href="{{ route('proyectos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
