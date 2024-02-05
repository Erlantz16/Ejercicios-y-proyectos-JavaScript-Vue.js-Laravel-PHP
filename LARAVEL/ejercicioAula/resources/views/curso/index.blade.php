@extends('layouts.plantilla')
@section('title', 'Alumnos Index')
@section('content')

@include('layouts.navigation')
{{-- @if (isset($message))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif --}}
<?php
$contador = 0;
?>
@foreach($curso as $cursos)
<div style="border: 2px solid black; width: 350px">
        <h1>{{$cursos->nombre}}</h1>
    <h3>{{$cursos->nivel}}</h3>
    <h3>{{$cursos->horasAcademicas}}</h3>
    <h3>
        @if ($cursos->profesor)
            {{$cursos->profesor->nombreApellido}}
        @else
            No hay un profesor asignado a este curso.
        @endif
    </h3>
</div>
   <?php $contador++; ?>
   @if($contador == 3)
   <br>
   @endif
@endforeach

{{-- {{$curso->links()}} --}}
