@extends('layouts.plantilla')
@section('title', 'Alumnos Index')
@section('content')

@include('layouts.navigation')
<table class="bordeTabla">
    <tr>
        {{-- <th class="bordeTabla">Argazkia</th> --}}
        <th class="bordeTabla">Izen abizena</th>
        <th class="bordeTabla">Argazkia</th>
        <th class="bordeTabla">Adina</th>
        <th class="bordeTabla">Telefonoa</th>
        <th class="bordeTabla">Helbidea</th>
        <th class="bordeTabla">Ikastaroak</th>
        <th class="bordeTabla">Ezabatu</th>
        <th class="bordeTabla">Matrikula aldatu</th>
    </tr>
    @foreach ($alumnos as $alumno)
        <tr>
            <td class="bordeTabla">{{$alumno->nombre_apellido}}</td>
            <td class="bordeTabla">
                @if ($alumno->foto)
                    <img src="{{(asset('images/' .$alumno->foto.''))}}" alt="images/{{url(asset($alumno->foto))}}" width="30px">
                @else
                    <img src="{{url('public/images/default.jpg')}}" alt="{{$alumno->nombre_apellido}}" width="30px">
                @endif
            </td>
            <td class="bordeTabla">
                {{-- <a class="underline" href="{{route('alumnos.show', $alumno)}}">
                    {{$alumno->nombre_apellido}}
                </a> --}}
            </td>
            <td class="bordeTabla">{{$alumno->edad}}</td>
            <td class="bordeTabla">{{$alumno->telefono}}</td>
            <td class="bordeTabla">{{$alumno->direccion}}</td>
            <td>
            @foreach($alumno->cursos as $curso)
            
            {{ $curso->nombre }}
            /
            @endforeach          
        </td>
                       <td class="bordeTabla">
                <a href="{{route('alumno.edit', $alumno->id)}}">Aldatu</a>
            </td>
            <td class="bordeTabla">
                <form method="POST" action="{{ route('alumno.destroy', $alumno->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>            </td>
            {{-- <td class="bordeTabla"><a href="{{route('alumnos.alumnocurso', $alumno)}}">Ikastaroak</a></td> --}}
            <td class="bordeTabla"><a href="{{route('alumno.alumnomatricula', $alumno)}}">Matrikula</a></td>
        </tr>
    @endforeach
</table>
<a href="{{route('alumno.create')}}">Nuevo alumno</a>

{{-- {{$alumnos->links()}} --}}