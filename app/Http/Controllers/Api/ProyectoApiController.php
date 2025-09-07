<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyectos;

class ProyectoApiController extends Controller
{
    // GET /api/proyectos
    public function index()
    {
        $proyectos = Proyectos::all();
        return response()->json($proyectos, 200);
    }

    // POST /api/proyectos
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string'],
            'fecha_inicio' => ['required','date'],
            'estado' => ['required','string'],
            'responsable' => ['required','string'],
            'monto' => ['required','numeric'],
        ]);

        $data['created_by'] = auth()->id();

        $proyecto = Proyectos::create($data);

        return response()->json($proyecto, 201);
    }

    // GET /api/proyectos/{id}
    public function show($id)
    {
        $proyecto = Proyectos::find($id);
        if (! $proyecto) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($proyecto, 200);
    }

    // PUT/PATCH /api/proyectos/{id}
    public function update(Request $request, $id)
    {
        $proyecto = Proyectos::find($id);
        if (! $proyecto) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $data = $request->validate([
            'nombre' => ['required','string'],
            'fecha_inicio' => ['required','date'],
            'estado' => ['required','string'],
            'responsable' => ['required','string'],
            'monto' => ['required','numeric'],
        ]);

        $proyecto->update($data);

        return response()->json($proyecto, 200);
    }

    // DELETE /api/proyectos/{id}
    public function destroy($id)
    {
        $proyecto = Proyectos::find($id);
        if (! $proyecto) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $proyecto->delete();

        return response()->noContent();
    }
}
