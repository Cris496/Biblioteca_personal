<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f5e6d3;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #d2b48c;
        }
        .btn-success {
            background-color: #8a6240;
            border: none;
        }
        .btn-success:hover {
            background-color: #6b4c30;
        }
        .btn-secondary {
            background-color: #a67c52;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #8a6240;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3 class="text-center">✏️ Editar Autor</h3>
        <form action="{{ url('/autores/'.$autores->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            
            <div class="mb-3">
                <label for="nombre" class="form-label">📖 Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ isset($autores->nombre)?$autores->nombre:'' }}" id="nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">🖊️ Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ isset($autores->apellido)?$autores->apellido:'' }}" id="apellido">
            </div>
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">🌎 Nacionalidad</label>
                <input type="text" name="nacionalidad" class="form-control" value="{{ isset($autores->nacionalidad)?$autores->nacionalidad:'' }}" id="nacionalidad">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">💾 Guardar cambios</button>
                <a href="{{ url('autores/') }}" class="btn btn-secondary">🔙 Regresar</a>
            </div>
        </form>
    </div>
</body>
</html>
