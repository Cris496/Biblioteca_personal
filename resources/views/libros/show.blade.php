<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $libro->titulo }} - Detalles</title>
</head>
<body>
    <h1>{{ $libro->titulo }}</h1>
    <p><strong>Descripción:</strong> {{ $libro->descripcion }}</p>
    <p><strong>ISBN:</strong> {{ $libro->isbn }}</p>
    <p><strong>Año de Publicación:</strong> {{ $libro->anio_publicacion }}</p>
    
    <h2>Autor</h2>
    <p>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</p>

    <h2>Categoría</h2>
    <p>{{ $libro->categoria->nombre }}</p>

    <h2>Archivos</h2>
    @if($libro->archivo_pdf)
        <a href="{{ route('libros.ver.pdf', $libro) }}">Ver PDF</a>
    @endif
    
    @if($libro->archivo_epub)
        <div>
            <a href="{{ route('libros.ver.epub', $libro) }}">Ver EPUB</a>
            <a href="{{ route('libros.descargar.epub', $libro) }}">Descargar EPUB</a>
        </div>
    @endif

    @if(!$libro->archivo_pdf && !$libro->archivo_epub)
        <p>No hay archivos disponibles para este libro</p>
    @endif
</body>
</html>