<!-- resources/views/prestamos/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Préstamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Registrar nuevo préstamo</h2>

    <!-- Formulario de préstamo -->
    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf

        <!-- Seleccionar libro -->
        <div class="mb-3">
            <label for="libro_id" class="form-label">Seleccionar libro</label>
            <select name="libro_id" id="libro_id" class="form-control" required>
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <!-- Seleccionar usuario que recibe el libro -->
        <div class="mb-3">
            <label for="user_recibe_id" class="form-label">Seleccionar usuario receptor</label>
            <select name="user_recibe_id" id="user_recibe_id" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Fecha de préstamo -->
        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">Fecha de préstamo</label>
            <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" required>
        </div>

        <!-- Botón de submit -->
        <button type="submit" class="btn btn-primary">Registrar préstamo</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
