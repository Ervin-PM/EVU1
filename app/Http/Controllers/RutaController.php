<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function index()
    {
    $proyecto = Proyectos::all();  // obtén todos los proyectos
    return view('proyectos.index', compact('proyecto'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->id(); // Asigna el usuario autenticado
        $proyecto = Proyectos::create($data);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado con éxito');
    }

    public function show(Proyectos $proyecto)
    {
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit(Proyectos $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, Proyectos $proyecto)
    {
        $proyecto->update($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado');
    }

    public function destroy(Proyectos $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado');
    }
    
    public function destroyConfirm(Proyectos $proyecto)
    {
    return view('proyectos.delete-confirm', compact('proyecto'));
    }
}
