
<form method="POST" action="{{ route('alumno.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="nombre_apellido">Nombre:</label>
    <input type="text" id="nombre" name="nombre_apellido" required>
    @error("nombre_apellido")
            <p class="akatsa">{{$message}}</p><br>
        @enderror

    <label for="edad">Edad: </label>
    <input type="number" id="edad" name="edad" required>
    @error("edad")
    <p class="akatsa">{{$message}}</p><br>
@enderror
    <label for="telefono">Telefono: </label>
    <input type="text" id="telefono" name="telefono" required>
    @error("telefono")
    <p class="akatsa">{{$message}}</p><br>
@enderror
    <label for="direccion">Direccion: </label>
    <input type="text" id="direccion" name="direccion" required>
    @error("direccion")
    <p class="akatsa">{{$message}}</p><br>
@enderror
    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto">
    @error("foto")
    <p class="akatsa">{{$message}}</p><br>
@enderror
    <input type="submit" value="Crear">
</form>