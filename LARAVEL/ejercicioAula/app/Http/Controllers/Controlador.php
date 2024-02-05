<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Profesores;

class Controlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cursos = Curso::all();
        $cursoSeleccionado = $request->input('curso');
    
        if ($cursoSeleccionado) {
            $alumnos = Curso::find($cursoSeleccionado)->alumnos;
            // $curso = Curso::where('nombre', 'LIKE', "%{$cursoSeleccionado}%")->first();

        } else {
            $alumnos = Alumno::paginate(10);
        }
    
        return view('index', compact('alumnos', 'cursos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_apellido' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $alumno = new Alumno;
        $alumno->nombre_apellido = $request->nombre_apellido;
        $alumno->edad = $request->edad;
        $alumno->telefono = $request->telefono;
        $alumno->direccion = $request->direccion;

        if ($request->hasFile('foto')) {
            $file_name = $_FILES['foto']['name'];

            // Obtener el nombre del usuario (reemplaza 'nombre_de_usuario' con la lógica real para obtener el nombre del usuario)
            $user_name = $request->nombre;
    
            // Obtener la extensión del archivo
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    
            // Crear un nuevo nombre para el archivo basado en el nombre del usuario
            $new_file_name = $user_name . '.' . $file_extension;
    
            // Ruta del directorio donde deseas guardar el archivo
            $upload_directory = base_path('/storage/app/public/imagenes');
    
            // Ruta completa del nuevo archivo
            $new_file_path = $upload_directory.'/'.$new_file_name;
            //mover
            move_uploaded_file($_FILES['foto']['tmp_name'], $new_file_path);
    
    
    
            $alumno->foto = $new_file_name;
    
            // $alumno->save();
        }

        $alumno->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function alumnomatricula(Alumno $alumno)
    {
        $cursos = Curso::all();
        return view("alumno.matricula", compact("alumno", "cursos"));
    }
    public function alumnomatriculaupdate(Request $request, Alumno $alumno)
    {
        $alumno->cursos()->sync($request->curso);
        return redirect()->route("index", $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumno::find($id);
        $alumno->nombre_apellido = $request->nombre_apellido;
        $alumno->edad = $request->edad;
        $alumno->telefono = $request->telefono;
        $alumno->direccion = $request->direccion;
        $alumno->foto = $request->foto;
        $alumno->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect()->route('index');
    }
}
