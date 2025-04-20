<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro | Codexa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* ANIMACIONES */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }
        
        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255, 215, 0, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0); }
        }

        /* ESTILOS BASE */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #121212;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
            line-height: 1.7;
        }
        
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
            animation: fadeIn 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }

        /* CABECERA */
        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .header h1 {
            font-family: 'Playfair Display', serif;
            color: #FFD700;
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .header h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #FFD700, transparent);
        }
        
        .header i {
            margin-right: 12px;
            font-size: 1.8rem;
        }

        /* ALERTAS */
        .alert {
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            animation: slideIn 0.5s ease-out;
            backdrop-filter: blur(5px);
        }
        
        .alert i {
            font-size: 1.5rem;
            margin-right: 15px;
        }
        
        .alert-danger {
            background: rgba(255, 60, 60, 0.15);
            border-left: 4px solid #ff3c3c;
            color: #ff9e9e;
        }
        
        .alert-warning {
            background: rgba(255, 215, 0, 0.15);
            border-left: 4px solid #FFD700;
            color: #FFD700;
        }
        
        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* FORMULARIO */
        .form-group {
            margin-bottom: 30px;
            animation: slideIn 0.5s ease-out forwards;
            animation-delay: calc(var(--order) * 0.1s);
            opacity: 0;
        }
        
        .form-label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: #FFD700;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 10px;
            width: 25px;
            text-align: center;
            font-size: 1.2rem;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            background: rgba(40, 40, 40, 0.7);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #FFD700;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
            outline: none;
            background: rgba(50, 50, 50, 0.8);
        }
        
        .form-control:disabled {
            background: rgba(30, 30, 30, 0.5);
            color: #777;
            cursor: not-allowed;
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .col {
            flex: 1;
        }

        /* BOTONES */
        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn i {
            margin-right: 10px;
        }
        
        .btn-primary {
            background: #FFD700;
            color: #000;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }
        
        .btn-primary:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
        }
        
        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        .btn-secondary {
            background: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            border: 1px solid rgba(255, 215, 0, 0.3);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 215, 0, 0.2);
            transform: translateY(-3px);
        }

        /* PDF LINK */
        .pdf-link {
            display: inline-flex;
            align-items: center;
            color: #4fc3f7;
            margin-top: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .pdf-link:hover {
            color: #82d6ff;
            text-decoration: underline;
        }
        
        .pdf-link i {
            margin-right: 8px;
        }

        /* EFECTO PULSO PARA ATENCIÓN */
        .pulse {
            animation: pulse 1.5s infinite;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 0 15px;
            }
            
            .row {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-book-edit"></i> Editar Libro</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <strong>Corrige los siguientes errores:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if($libro->estado === 'Prestado')
            <div class="alert alert-warning pulse">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    <strong>Atención:</strong> Este libro está actualmente prestado. 
                    Los campos están deshabilitados para edición.
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('libros.update', $libro->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group" style="--order: 1">
                <label for="titulo" class="form-label">
                    <i class="fas fa-heading"></i> Título *
                </label>
                <input type="text" class="form-control" id="titulo" name="titulo" 
                       value="{{ old('titulo', $libro->titulo) }}" required 
                       {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
            </div>

            <div class="form-group" style="--order: 2">
                <label for="descripcion" class="form-label">
                    <i class="fas fa-align-left"></i> Descripción
                </label>
                <textarea class="form-control" id="descripcion" name="descripcion" 
                          {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>{{ old('descripcion', $libro->descripcion) }}</textarea>
            </div>

            <div class="form-group" style="--order: 3">
                <label class="form-label">
                    <i class="fas fa-user-edit"></i> Autor *
                </label>
                <div class="row">
                    <div class="col">
                        <select class="form-control form-select" id="autor_id" name="autor_id" 
                                {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                            <option value="">Seleccione un autor existente</option>
                            @foreach($autores as $autor)
                            <option value="{{ $autor->id }}" {{ old('autor_id', $libro->autor_id) == $autor->id ? 'selected' : '' }}>
                                {{ $autor->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="nuevo_autor" name="nuevo_autor" 
                               value="{{ old('nuevo_autor') }}" placeholder="Nombre de nuevo autor" 
                               {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            <div class="form-group" style="--order: 4">
                <label class="form-label">
                    <i class="fas fa-tag"></i> Categoría *
                </label>
                <div class="row">
                    <div class="col">
                        <select class="form-control form-select" id="categoria_id" name="categoria_id" 
                                {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                            <option value="">Seleccione una categoría existente</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $libro->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="nueva_categoria" name="nueva_categoria" 
                               value="{{ old('nueva_categoria') }}" placeholder="Nombre de nueva categoría" 
                               {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            <div class="form-group" style="--order: 5">
                <label for="archivo_pdf" class="form-label">
                    <i class="fas fa-file-pdf"></i> Archivo PDF
                </label>
                <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf" 
                       {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                @if($libro->archivo_pdf)
                    <a href="{{ asset('storage/' . $libro->archivo_pdf) }}" target="_blank" class="pdf-link">
                        <i class="fas fa-eye"></i> Ver archivo PDF actual
                    </a>
                @endif
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary" {{ $libro->estado === 'Prestado' ? 'disabled' : '' }}>
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
                <a href="{{ route('libros.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>

    <script>
        // Animación de carga simulada
        document.addEventListener('DOMContentLoaded', function() {
            // Simular carga de contenido
            setTimeout(function() {
                document.body.style.opacity = 1;
            }, 300);
            
            // Efecto de aparición escalonada para los grupos del formulario
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach(group => {
                group.style.opacity = 1;
            });
        });
    </script>
</body>
</html>