<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($libro->estado === 'Prestado')
            <div class="alert alert-warning">
                Este libro está actualmente prestado. No se puede visualizar, pero puedes editar los detalles.
            </div>
        @endif

        <form method="POST" action="{{ route('libros.update', $libro->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título *</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>{{ old('descripcion', $libro->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Autor *</label>
                <div class="row">
                    <div class="col-md-8">
                        <select class="form-select" id="autor_id" name="autor_id" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                            <option value="">Seleccione un autor existente</option>
                            @foreach($autores as $autor)
                            <option value="{{ $autor->id }}" {{ old('autor_id', $libro->autor_id) == $autor->id ? 'selected' : '' }}>{{ $autor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="nuevo_autor" name="nuevo_autor" value="{{ old('nuevo_autor') }}" placeholder="Nombre de nuevo autor" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría *</label>
                <div class="row">
                    <div class="col-md-8">
                        <select class="form-select" id="categoria_id" name="categoria_id" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                            <option value="">Seleccione una categoría existente</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $libro->categoria_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="nueva_categoria" name="nueva_categoria" value="{{ old('nueva_categoria') }}" placeholder="Nombre de nueva categoría" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="archivo_pdf" class="form-label">Archivo PDF</label>
                <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                @if($libro->archivo_pdf)
                    <p><a href="{{ asset('storage/' . $libro->archivo_pdf) }}" target="_blank">Ver archivo PDF actual</a></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>Guardar Cambios</button>
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
