<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();  // Obtener todos los proyectos
        return view('projects.index', compact('projects'));  // Pasar los proyectos a la vista
    }
    

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_creacion' => 'required|date',
            'activo' => 'required|boolean',
        ]);
    
        Project::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_creacion' => $request->fecha_creacion,
            'activo' => $request->activo,
            'user_id' => Auth::id(),  // Añadir el user_id del usuario autenticado
        ]);
    
        return redirect()->route('projects.index')->with('success', 'Proyecto creado con éxito');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_creacion' => 'required|date',
            'activo' => 'required|boolean',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Proyecto actualizado con éxito');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado con éxito');
    }
}
