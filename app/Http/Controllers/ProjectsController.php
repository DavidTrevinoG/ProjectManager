<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedoresRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('projects.index', [
            'proyectos' => Projects::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Función para crear una nueva categoría
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // Función para guardar la nueva categoría
    public function store(Request $request): RedirectResponse
    {
        // Validar la solicitud
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'id_gerente' => 'required|integer',
            
        ]);

        Projects::create($validated);


        return redirect()->route('projects.index')
            ->withSuccess('Nuevo proyecto agregado.');
    }

    /**
     * Display the specified resource.
     */

    // Función para mostrar una categoría
    public function show(Projects $project): View
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // Función para editar una categoría
    public function edit(Projects $project): View
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'id_categorias' => 'required|integer',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'color' => 'nullable|string|max:255',
            'descripcion_corta' => 'nullable|string',
            'descripcion_larga' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la imagen
        ]);

        $project = Projects::findOrFail($id);


        $project->update($validated);

        return redirect()->route('products.index')
            ->withSuccess('Producto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Projects $project): RedirectResponse
    {

        $project->delete();

        return redirect()->route('projects.index')
            ->withSuccess('Proyecto eliminado correctamente.');
    }
}
