Mostrar la lista de autores
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacionalidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $autores as $autor )
        <tr>
            <td>{{ $autor->id }}</td>
            <td>{{ $autor->nombre }}</td>
            <td>{{ $autor->apellido }}</td>
            <td>{{ $autor->nacionalidad }}</td>
            <td>Editar |
               
            <form action="{{ url('/autores/'.$autor->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
                
            <input type="submit" onclick="return confirm('¿Estas seguro de eliminar estos datos?') " value="Borrar">
            
            </form>
            </td>
        </tr>
        @endforeach  

    </tbody>
</table>