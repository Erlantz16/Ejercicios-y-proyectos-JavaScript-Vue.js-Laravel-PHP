<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Profesores extends Model
{
    use HasFactory;

    protected $table = "profesores";
    protected $primaryKey = "id";
    protected $fillable = ['nombreApellido', 'profesion', 'gradoAcademico', 'telefono'];
    // DB-ra ez insertatzea nahi dugun datuak
    // protected $guarded = [];
    protected $hidden = ['id'];
    public $timestamps = false;

    public function cursos(){
        return $this->hasMany(Curso::class, 'profesor_id');
    }
}