@extends('layouts.dash')

@section('content')
<h1>Editar Proyecto</h1>
<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ $project->titulo }}" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control" required>{{ $project->descripcion }}</textarea>
    </div>
    <div class="form-group">
        <label for="fecha_creacion">Fecha de Creación</label>
        <input type="date" name="fecha_creacion" class="form-control" value="{{ $project->fecha_creacion }}" required>
    </div>
    <div class="form-group">
        <label for="activo">Activo</label>
        <select name="activo" class="form-control" required>
            <option value="1" {{ $project->activo ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$project->activo ? 'selected' : '' }}>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
