<h1>{{$alumno->nombre_apellido}} ikaslea matrikulatzeko</h1>
<form action="{{route('alumno.alumnomatriculaupdate', $alumno)}}" method="post">
    @csrf
    @method('put')
    <label for="curso">Ikastaroa</label><br>
    @foreach ($cursos as $curso)
        {{-- Checkbox --}}
        <input type="checkbox" name="curso[]" value="{{$curso->id}}" @if ($alumno->cursos->contains($curso->id)) checked @endif>
        <label for="curso">{{$curso->nombre}}</label>
        <br>
    @endforeach
    <input type="submit" value="Matrikulatu">
</form>