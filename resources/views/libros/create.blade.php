@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Nuevo Libro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('libros.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título *</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Autor *</label>
            <div class="row">
                <div class="col-md-8">
                    <select class="form-select" id="autor_id" name="autor_id">
                        <option value="">Seleccione un autor existente</option>
                        @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" {{ old('autor_id') == $autor->id ? 'selected' : '' }}>{{ $autor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="nuevo_autor" name="nuevo_autor" value="{{ old('nuevo_autor') }}" placeholder="Nombre de nuevo autor">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría *</label>
            <div class="row">
                <div class="col-md-8">
                    <select class="form-select" id="categoria_id" name="categoria_id">
                        <option value="">Seleccione una categoría existente</option>
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="nueva_categoria" name="nueva_categoria" value="{{ old('nueva_categoria') }}" placeholder="Nombre de nueva categoría">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="archivo_pdf" class="form-label">Archivo PDF</label>
            <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Libro</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection