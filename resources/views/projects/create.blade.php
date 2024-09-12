@extends('layouts.dash')

@section('content')
<h1>Crear Proyecto</h1>
<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="fecha_creacion">Fecha de Creación</label>
        <input type="date" name="fecha_creacion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="activo">Activo</label>
        <select name="activo" class="form-control" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection
