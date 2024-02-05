<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Profesores;
use App\Models\Alumno;

class CursoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curso = Curso::all();
        $profesor = Profesores::all();
        $alumno = Alumno::all();
        return view('curso.index', compact('profesor', 'curso', 'alumno'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profesores = Profesores::all();
        return view('curso.create', compact('profesores')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->nivel = $request->nivel;
        $curso->horasAcademicas = $request->horasAcademicas;
        $curso->profesor_id = $request->profesor_id;
        $curso->save();
        // $curso->profesores()->attach($request->profesor_id);
        return redirect()->route('curso.index')->with('success', 'Curso creado con éxito');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
