<form method="POST" action="{{route('curso.store')}}" enctype="multipart/form-data">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <label for="nivel">Nivel:</label>
    <input type="text" id="nivel" name="nivel" required>
    <label for="horasAcademicas">Horas Academicas:</label>
    <input type="text" id="horasAcademicas" name="horasAcademicas" required>
    <select name="profesor_id" id="">
        @foreach($profesores as $profesor)
        <option value="{{$profesor->id}}">{{$profesor->nombreApellido}}</option>
        @endforeach
    </select>
    <input type="submit" value="Crear">

</form>
asdfsdf