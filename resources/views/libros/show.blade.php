<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $libro->titulo }}</title>
</head>
<body>
    <h1>{{ $libro->titulo }}</h1>

    <p><strong>Descripción:</strong> {{ $libro->descripcion ?? 'Sin descripción' }}</p>

    <p><strong>Autor:</strong> {{ $libro->autor->nombre }}</p>

    <p><strong>Categoría:</strong> {{ $libro->categoria->nombre }}</p>

    @if ($libro->archivo_pdf)
        <p>
            <strong>Archivo PDF:</strong> 
            <a href="{{ asset('storage/' . $libro->archivo_pdf) }}" target="_blank">Ver PDF</a>
        </p>
    @endif

    <p><a href="{{ route('libros.index') }}">Volver a la lista</a></p>
</body>
</html>
