@extends('layouts.plantilla')
@section('title', 'Alumnos Index')
@section('content')

@include('layouts.navigation')
@if (isset($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
<table>
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Cursos impartidos:</th>

        <th>Acciones</th>
    </tr>
    @foreach ($profesor as $profesores)
        <tr>
            <td>{{$profesores->nombreApellido}}</td>
            <td>{{$profesores->profesion}}</td>
            <td>{{$profesores->gradoAcademico}}</td>
            <td>{{$profesores->telefono}}</td>
            <td>
                <p>
                @foreach($profesores->cursos as $curso)
                {{ $curso->nombre }}/
            @endforeach
        </p>
        </td>

        <td>
            <a href="{{route('profesor.edit', $profesores->id)}}">Editar</a>
        </td>
        <td>
            <form method="POST" action="{{ route('profesor.destroy', $profesores->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
            </form>        
        </td>

            
            {{-- <td>
                <form method="POST" action="{{ route('profesor.destroy', $profesor->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </td> --}}
        </tr>
    @endforeach
</table>
