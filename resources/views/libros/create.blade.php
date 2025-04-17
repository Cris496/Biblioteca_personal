<form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Título -->
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>

    <!-- Descripción -->
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>

    <!-- ISBN -->
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn">
    </div>

    <!-- Año de Publicación -->
    <div class="mb-3">
        <label for="anio_publicacion" class="form-label">Año de Publicación</label>
        <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" min="1000" max="9999">
    </div>

    <!-- Autor -->
    <div class="mb-3">
        <label for="autor_id" class="form-label">Autor</label>
        <select class="form-select" id="autor_id" name="autor_id">
            <option value="">Seleccione un autor</option>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control mt-2" name="nuevo_autor" placeholder="O agregar un nuevo autor">
    </div>

    <!-- Categoría -->
    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoría</label>
        <select class="form-select" id="categoria_id" name="categoria_id">
            <option value="">Seleccione una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <input type="text" class="form-control mt-2" name="nueva_categoria" placeholder="O agregar una nueva categoría">
    </div>

    <!-- Archivos -->
    <div class="mb-3">
        <label for="archivo_pdf" class="form-label">Archivo PDF</label>
        <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf" accept=".pdf">
    </div>

    <div class="mb-3">
        <label for="archivo_epub" class="form-label">Archivo EPUB</label>
        <input type="file" class="form-control" id="archivo_epub" name="archivo_epub" accept=".epub">
    </div>

    <!-- Botón para guardar -->
    <button type="submit" class="btn btn-primary">Guardar Libro</button>
</form>
