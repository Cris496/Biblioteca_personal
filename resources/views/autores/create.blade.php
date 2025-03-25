<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f5e6d3;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">📝 Crear Autor</h2>
        <form action="{{ url('/autores') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">📖 Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">🖊️ Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" required>
            </div>
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">🌎 Nacionalidad</label>
                <input type="text" name="nacionalidad" class="form-control" id="nacionalidad" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">💾 Guardar</button>
                <a href="{{ url('autores/') }}" class="btn btn-secondary">🔙 Regresar</a>
            </div>
        </form>
    </div>
</body>
</html>
