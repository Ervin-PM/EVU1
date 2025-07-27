@extends('layouts.app')

@section('content')
<h1>Lista de proyectos</h1>

{{-- Botón para crear un nuevo proyecto --}}
<a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">
    Nuevo Proyecto
</a>

{{-- Mensaje de éxito al crear/actualizar/eliminar --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Tabla de proyectos --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha inicio</th>
            <th>Estado</th>
            <th>Responsable</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proyecto as $proyecto)
        <tr>
            <td>{{ $proyecto->id }}</td>
            <td>{{ $proyecto->nombre }}</td>
            <td>{{ $proyecto->fecha_inicio }}</td>
            <td>{{ $proyecto->estado }}</td>
            <td>{{ $proyecto->responsable }}</td>
            <td>{{ $proyecto->monto }}</td>
            <td>
                <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning btn-sm">Editar</a>
                {{-- Formulario para eliminar (usa método DELETE) --}}
                <form action="{{ route('proyectos.delete', $proyecto) }}" method="GET" class="d-inline">
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Desea eliminar el proyecto?')">
                        Eliminar
                    </button>
                </form>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
