<?php

namespace App\Models;

use Database\Factories\AlumnoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $primaryKey = "id";


    protected $fillable = ['nombre_apellido', 'edad', 'telefono', 'direccion'];
    protected $hidden = ['id'];

    public $timestamps = false;
    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
   
}
