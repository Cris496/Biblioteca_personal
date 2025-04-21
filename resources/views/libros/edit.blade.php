<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar {{ $libro->titulo }} | Codexa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #121212;
            --dark-black: #0a0a0a;
            --light-black: #1e1e1e;
            --gold: #d4af37;
            --light-gold: #f1e5ac;
            --dark-gold: #b8860b;
            --white: #f8f8f8;
            --gray: #888;
            --light-gray: #e0e0e0;
            --transition: all 0.3s ease;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 6px 12px rgba(212, 175, 55, 0.2);
            --success: #4bc0c0;
            --error: #ff6384;
            --warning: #ffce56;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--black);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        /* Header */
        .main-header {
            background: linear-gradient(135deg, var(--dark-black), var(--black));
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 100;
            border-bottom: 1px solid var(--gold);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
            background: linear-gradient(to right, var(--gold), var(--light-gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            padding-left: 1rem;
        }

        .logo::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 70%;
            width: 3px;
            background: var(--gold);
            border-radius: 3px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-name {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: var(--light-gold);
        }

        .user-name i {
            color: var(--gold);
            font-size: 1.2rem;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            background: var(--gold);
            color: var(--black);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
        }

        .edit-container {
            background-color: var(--light-black);
            border-radius: 8px;
            padding: 2rem;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.1);
            animation: slideUp 0.5s ease-out forwards;
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .edit-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--dark-gold), var(--gold));
        }

        .edit-header {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .edit-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--gold);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .edit-title i {
            font-size: 1.8rem;
        }

        .edit-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--gold);
            border-radius: 3px;
        }

        /* Alertas */
        .alert {
            padding: 1.25rem;
            border-radius: 6px;
            margin-bottom: 2rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            animation: slideIn 0.5s ease-out;
            backdrop-filter: blur(5px);
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .alert i {
            font-size: 1.5rem;
            margin-top: 2px;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .alert-danger {
            background-color: rgba(255, 99, 132, 0.1);
            border-left: 4px solid var(--error);
            color: #ff9e9e;
        }

        .alert-warning {
            background-color: rgba(255, 206, 86, 0.1);
            border-left: 4px solid var(--warning);
            color: var(--warning);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 206, 86, 0.3); }
            70% { box-shadow: 0 0 0 10px rgba(255, 206, 86, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 206, 86, 0); }
        }

        .alert-list {
            padding-left: 1.5rem;
            margin-top: 0.5rem;
        }

        /* Formulario */
        .form-group {
            margin-bottom: 1.75rem;
            animation: slideIn 0.5s ease-out forwards;
            animation-delay: calc(var(--order) * 0.1s);
            opacity: 0;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: var(--gold);
        }

        .form-label i {
            width: 24px;
            text-align: center;
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            background-color: var(--dark-black);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 6px;
            color: var(--white);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
            background-color: rgba(30, 30, 30, 0.8);
        }

        .form-control:disabled {
            background-color: rgba(30, 30, 30, 0.5);
            color: var(--gray);
            cursor: not-allowed;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-col {
            flex: 1;
            min-width: 0;
        }

        /* Select personalizado */
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23d4af37' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
            padding-right: 2.5rem;
        }

        /* PDF Section */
        .pdf-section {
            background-color: rgba(75, 192, 192, 0.1);
            padding: 1.25rem;
            border-radius: 6px;
            border-left: 4px solid var(--success);
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .pdf-section i {
            font-size: 1.75rem;
            color: var(--success);
        }

        .pdf-info {
            flex: 1;
        }

        .pdf-info h4 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 0.5rem;
            color: var(--white);
        }

        .pdf-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--success);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .pdf-link:hover {
            color: #82d6ff;
            text-decoration: underline;
        }

        .pdf-link i {
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .pdf-link:hover i {
            transform: translateX(3px);
        }

        /* Botones */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.875rem 1.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            flex: 1;
            min-width: 200px;
        }

        .btn i {
            transition: var(--transition);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: var(--black);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover:not(:disabled) {
            background: linear-gradient(135deg, var(--light-gold), var(--gold));
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            background: var(--gray);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
        }

        .btn-secondary:hover {
            background-color: rgba(212, 175, 55, 0.1);
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        /* Footer */
        .main-footer {
            background: linear-gradient(135deg, var(--dark-black), var(--black));
            padding: 2rem;
            text-align: center;
            border-top: 1px solid var(--gold);
            margin-top: 3rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            background: linear-gradient(to right, var(--gold), var(--light-gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .footer-content p {
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .copyright {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            color: var(--gray);
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 1.5rem;
            }

            .edit-container {
                padding: 1.5rem;
            }

            .form-row {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }

            .edit-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">CODEXA</div>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <div class="user-menu">
                <span class="user-name">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div class="edit-container">
            <div class="edit-header">
                <h1 class="edit-title">
                    <i class="fas fa-book-edit"></i> Editar Libro
                </h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div class="alert-content">
                        <h3 class="alert-title">Corrige los siguientes errores:</h3>
                        <ul class="alert-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if($libro->estaPrestado())
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="alert-content">
                        <h3 class="alert-title">Atención</h3>
                        <p>Este libro está actualmente prestado. Los campos están deshabilitados para edición.</p>
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
                           {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                </div>

                <div class="form-group" style="--order: 2">
                    <label for="descripcion" class="form-label">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <textarea class="form-control" id="descripcion" name="descripcion" 
                              {{ $libro->estaPrestado() ? 'disabled' : '' }}>{{ old('descripcion', $libro->descripcion) }}</textarea>
                </div>

                <div class="form-group" style="--order: 3">
                    <label class="form-label">
                        <i class="fas fa-user-edit"></i> Autor *
                    </label>
                    <div class="form-row">
                        <div class="form-col">
                            <select class="form-control form-select" id="autor_id" name="autor_id" 
                                    {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                                <option value="">Seleccione un autor existente</option>
                                @foreach($autores as $autor)
                                <option value="{{ $autor->id }}" {{ old('autor_id', $libro->autor_id) == $autor->id ? 'selected' : '' }}>
                                    {{ $autor->nombre }} {{ $autor->apellido }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-col">
                            <input type="text" class="form-control" id="nuevo_autor" name="nuevo_autor" 
                                   value="{{ old('nuevo_autor') }}" placeholder="Nombre de nuevo autor" 
                                   {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="--order: 4">
                    <label class="form-label">
                        <i class="fas fa-tag"></i> Categoría *
                    </label>
                    <div class="form-row">
                        <div class="form-col">
                            <select class="form-control form-select" id="categoria_id" name="categoria_id" 
                                    {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                                <option value="">Seleccione una categoría existente</option>
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id', $libro->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-col">
                            <input type="text" class="form-control" id="nueva_categoria" name="nueva_categoria" 
                                   value="{{ old('nueva_categoria') }}" placeholder="Nombre de nueva categoría" 
                                   {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="--order: 5">
                    <label for="archivo_pdf" class="form-label">
                        <i class="fas fa-file-pdf"></i> Archivo PDF
                    </label>
                    <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf" 
                           accept=".pdf" {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                    @if($libro->archivo_pdf)
                        <div class="pdf-section">
                            <i class="fas fa-file-pdf"></i>
                            <div class="pdf-info">
                                <h4>Archivo PDF actual</h4>
                                <a href="{{ asset('storage/' . $libro->archivo_pdf) }}" target="_blank" class="pdf-link">
                                    <i class="fas fa-external-link-alt"></i> Ver PDF actual
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" {{ $libro->estaPrestado() ? 'disabled' : '' }}>
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <a href="{{ route('libros.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <p>La plataforma perfecta para amantes de los libros</p>
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
        </div>
        <div class="copyright">
            <p>Una solución creada para lectores apasionados</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Simulate loading
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loading-overlay').style.opacity = '0';
                setTimeout(function() {
                    document.querySelector('.loading-overlay').style.display = 'none';
                }, 500);
            }, 1000);
        });

        // Add animation to buttons on hover
        document.querySelectorAll('.btn, .logout-btn, .pdf-link').forEach(button => {
            button.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'scale(1.2)';
                }
            });
            
            button.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'scale(1)';
                }
            });
        });

        // Toggle between existing and new author/category
        document.addEventListener('DOMContentLoaded', function() {
            // Show form groups with delay
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach(group => {
                group.style.opacity = 1;
            });

            // Toggle between existing and new author
            const autorSelect = document.getElementById('autor_id');
            const nuevoAutorInput = document.getElementById('nuevo_autor');
            
            if (autorSelect && nuevoAutorInput) {
                autorSelect.addEventListener('change', function() {
                    if (this.value) {
                        nuevoAutorInput.value = '';
                    }
                });
                
                nuevoAutorInput.addEventListener('input', function() {
                    if (this.value) {
                        autorSelect.value = '';
                    }
                });
            }

            // Toggle between existing and new category
            const categoriaSelect = document.getElementById('categoria_id');
            const nuevaCategoriaInput = document.getElementById('nueva_categoria');
            
            if (categoriaSelect && nuevaCategoriaInput) {
                categoriaSelect.addEventListener('change', function() {
                    if (this.value) {
                        nuevaCategoriaInput.value = '';
                    }
                });
                
                nuevaCategoriaInput.addEventListener('input', function() {
                    if (this.value) {
                        categoriaSelect.value = '';
                    }
                });
            }
        });
    </script>
</body>
</html>