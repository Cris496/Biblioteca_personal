<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f5e6d3; /* Café clarito */
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #a67c52;
            border: none;
        }
        .btn-primary:hover {
            background-color: #8a6240;
        }
        .table th {
            background-color: #d2b48c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">📚 Lista de Autores</h2>

        @if(Session::has('mensaje'))
            <div class="alert alert-success">{{ Session::get('mensaje') }}</div>
        @endif

        <a href="{{ url('autores/create') }}" class="btn btn-primary mb-3">➕ Registrar nuevo autor</a>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fas fa-user"></i> Nombre</th>
                    <th><i class="fas fa-user"></i> Apellido</th>
                    <th><i class="fas fa-globe"></i> Nacionalidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->apellido }}</td>
                    <td>{{ $autor->nacionalidad }}</td>
                    <td>
                        <a href="{{ url('/autores/'.$autor->id.'/edit') }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        |
                        <form action="{{ url('/autores/'.$autor->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este autor?')" class="btn btn-danger btn-sm">🗑️ Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
