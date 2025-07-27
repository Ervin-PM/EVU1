@extends('layouts.app')

@section('content')
<h1>Eliminar Proyecto</h1>

<div class="alert alert-warning">
    ¿Estás seguro de que deseas eliminar el proyecto <strong>{{ $proyecto->nombre }}</strong>?
</div>

<form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
