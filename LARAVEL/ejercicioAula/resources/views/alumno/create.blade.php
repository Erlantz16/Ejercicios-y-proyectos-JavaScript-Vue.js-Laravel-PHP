
<form method="POST" action="{{ route('alumno.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="nombre_apellido">Nombre:</label>
    <input type="text" id="nombre" name="nombre_apellido" required>

    <label for="edad">Edad: </label>
    <input type="number" id="edad" name="edad" required>

    <label for="telefono">Telefono: </label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="direccion">Direccion: </label>
    <input type="text" id="direccion" name="direccion" required>

    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto">

    <input type="submit" value="Crear">
</form>