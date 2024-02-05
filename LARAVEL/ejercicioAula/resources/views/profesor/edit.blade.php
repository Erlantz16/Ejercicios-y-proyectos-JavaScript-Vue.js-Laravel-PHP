@extends('layouts.plantilla')
@section('title', 'Edit Profesor')
@section('content')
@include('layouts.navigation')

<form method="POST" action="{{ route('profesor.update', $profesor->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nombre_apellido">Nombre:</label>
    <input type="text" id="nombre" name="nombreApellido" value="{{$profesor->nombreApellido}}" required>

    <select name="profesion" id="">
        <option value="Ingeniero">Ingeniero</option>
        <option value="Licenciado">Licenciado</option>
        <option value="Doctor">Doctor</option>
    </select>
    <label for="gradoAcademico">gradoAcademico:</label>
    <input type="text" id="gradoAcademico" name="gradoAcademico" value="{{$profesor->gradoAcademico}}">

    <label for="telefono">Telefono: </label>
    <input type="text" id="telefono" name="telefono" value="{{$profesor->telefono}}" required>
    @foreach($cursos as $curso)
        <div class="form-check">
            <input type="checkbox" name="curso[]" value="{{$curso->id}}" @if ($profesor->cursos->contains($curso->id)) checked @endif>
            <label class="form-check-label" for="curso{{ $curso->id }}">
                {{ $curso->nombre }}
            </label>
        </div>
    @endforeach

    <input type="submit" value="Crear">
</form>