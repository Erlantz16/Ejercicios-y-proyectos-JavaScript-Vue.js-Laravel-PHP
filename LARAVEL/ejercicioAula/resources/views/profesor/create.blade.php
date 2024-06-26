
<form method="POST" action="{{ route('profesor.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="nombre_apellido">Nombre:</label>
    <input type="text" id="nombre" name="nombreApellido" required>

    <select name="profesion" id="">
        <option value="Ingeniero">Ingeniero</option>
        <option value="Licenciado">Licenciado</option>
        <option value="Doctor">Doctor</option>
    </select>
    <label for="gradoAcademico">gradoAcademico:</label>
    <input type="text" id="gradoAcademico" name="gradoAcademico">

    <label for="telefono">Telefono: </label>
    <input type="text" id="telefono" name="telefono" required>
    @foreach($cursos as $curso)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $curso->id }}" id="curso{{ $curso->id }}" name="cursos[]">
            <label class="form-check-label" for="curso{{ $curso->id }}">
                {{ $curso->nombre }}
            </label>
        </div>
    @endforeach

    <input type="submit" value="Crear">
</form>