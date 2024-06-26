<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesores;

class Curso extends Model
{
    use HasFactory;

    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'nivel', 'horasAcademicas', 'profesor_id'];
    protected $hidden = ['id'];

    public $timestamps = false;
    public function alumnos(){
        return $this->belongsToMany(Alumno::class);
    }

    public function profesor(){
        return $this->belongsTo(Profesores::class);
    }
}