<?php

namespace Database\Seeders;

use App\Models\Profesores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Curso;

use Database\Factories\AlumnoFactory;

class AlumnoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Curso::factory()->count(10)->create();

        $alumnos = Alumno::all();
        $cursos = Curso::all();
        
        foreach ($alumnos as $alumno) {
            $alumno->cursos()->attach($cursos->random(rand(1, 3)));
        }

    }
}
