@extends('layouts.plantilla')
@section('title', 'Edit Alumno')
@section('content')
<form method="POST" action="{{ route('alumno.update', $alumno->id) }}">

    @csrf

    @method('PUT')

    Izen Abizena <input type="text" name="nombre_apellido" value="{{ $alumno->nombre_apellido }}"><br>

    Adina <input type="text" name="edad" value="{{ $alumno->edad }}"><br>

    Telefonoa <input type="text" name="telefono" value="{{ $alumno->telefono }}"><br>

    Helbidea<input type="text" name="direccion"  value="{{ $alumno->direccion }}"><br>

    <button type="submit">Bidali aldaketak</button>

</form>

