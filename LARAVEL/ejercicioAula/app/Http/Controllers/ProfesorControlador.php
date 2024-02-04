<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesores;

class ProfesorControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesor = Profesores::all();
        $curso = Curso::all();
        $alumno = Alumno::all();
        
        return view('profesor.index', compact('profesor', 'curso', 'alumno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();

        return view('profesor.create', ['cursos' => $cursos]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profesor = new Profesores();
        $profesor->nombreApellido = $request->nombreApellido;
        $profesor->profesion = $request->profesion;
        $profesor->gradoAcademico = $request->gradoAcademico;
        $profesor->telefono = $request->telefono;
        $profesor->save();
        //created_at y updated_at se llenan automaticamente
        foreach ($request->cursos as $curso_id) {
            $curso = Curso::find($curso_id);
            $curso->profesor_id = $profesor->id;
            $curso->save();
        }
        


        return redirect()->route('profesor.index')->with('success', 'Profesor creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profesor = Profesores::find($id);
        $cursos = Curso::all();
        return view('profesor.edit', compact('profesor', 'cursos'));       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profesor = Profesores::find($id);
        $profesor->nombreApellido = $request->nombreApellido;
        $profesor->profesion = $request->profesion;
        $profesor->gradoAcademico = $request->gradoAcademico;
        $profesor->telefono = $request->telefono;
        $profesor->save();
        foreach ($request->cursos as $curso_id) {
            $curso = Curso::find($curso_id);
            $curso->profesor_id = $profesor->id;
            $curso->save();
        }        
        return redirect()->route('profesor.index')->with('success', 'Profesor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
