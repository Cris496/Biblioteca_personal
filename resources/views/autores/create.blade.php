Formulario de creacion de autores
<form action="{{ url('/autores') }}" method="post" enctype="multipart/form-data">
@csrf 

<label for="nombre"> Nombre</label>
<input type="text" name="nombre" id="nombre">
<br>
<label for="nombre"> Apellido</label>
<input type="text" name="apellido" id="apellido">
<br>
<label for="nombre"> Nacionalidad</label>
<input type="text" name="nacionalidad" id="nacionalidad">
<br>
<input type="submit" value="Guardar datos">
</form>