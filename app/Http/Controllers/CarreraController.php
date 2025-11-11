<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request; // <-- FALTABA ESTE USE

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::orderBy('nombre')->paginate(10);
        return view('carreras.index', compact('carreras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:120','unique:carreras,nombre'],
        ]);

        Carrera::create($data);

        return redirect()
            ->route('carreras.index')
            ->with('success', 'Carrera creada correctamente.');
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    public function update(Request $request, Carrera $carrera)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:120','unique:carreras,nombre,'.$carrera->id],
        ]);

        $carrera->update($data);

        return redirect()
            ->route('carreras.index')
            ->with('success', 'Carrera actualizada.');
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return redirect()
            ->route('carreras.index')
            ->with('success', 'Carrera eliminada.');
    }
}