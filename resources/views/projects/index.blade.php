@extends('layouts.dash')

@section('content')
<h1>Proyectos</h1>
<a href="{{ route('projects.create') }}" class="btn btn-primary">Crear Proyecto</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->titulo }}</td>
            <td>{{ $project->descripcion }}</td>
            <td>{{ $project->fecha_creacion }}</td>
            <td>{{ $project->activo ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

