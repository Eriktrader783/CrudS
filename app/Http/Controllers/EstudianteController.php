<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->orderByDesc('id')->paginate(10);
        $carreras    = Carrera::orderBy('nombre')->get();
        return view('estudiantes.index', compact('estudiantes','carreras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'     => ['required','string','max:100'],
            'correo'     => ['required','email','max:120'],
            'carrera_id' => ['required','exists:carreras,id'],
            'semestre'   => ['required','integer','between:1,12'],
        ]);

        Estudiante::create($data);
        return redirect()->route('estudiantes.index')->with('ok','Estudiante registrado.');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return back()->with('ok','Estudiante eliminado.');
    }
}