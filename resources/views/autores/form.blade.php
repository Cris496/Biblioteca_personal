<label for="nombre"> Nombre</label>
<input type="text" name="nombre" value="{{ isset($autores->nombre)?$autores->nombre:''}}" id="nombre">
<br>
<label for="nombre"> Apellido</label>
<input type="text" name="apellido"value="{{ isset($autores->apellido)? $autores->apellido:''}}" id="apellido">
<br>
<label for="nombre"> Nacionalidad</label>
<input type="text" name="nacionalidad" value="{{ isset($autores->nacionalidad)?$autores->nacionalidad:'' }}"id="nacionalidad">
<br>
<input type="submit" value="Guardar datos">

<a href="{{ url('autores/') }}">Regresar</a>