<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $libro->titulo }} - Detalles</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-bg: #0a0a0a;
            --color-card: rgba(20, 20, 20, 0.95);
            --color-accent: #D4AF37;
            --color-text: #f5f5f5;
            --color-text-light: #b0b0b0;
            --color-border: #252525;
            --shadow-gold: 0 0 25px rgba(212, 175, 55, 0.4);
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--color-text);
            background-color: var(--color-bg);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Fondo animado con partículas */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: radial-gradient(ellipse at bottom, #1B2735 0%, #090A0F 100%);
        }
        
        .particle {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0;
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) translateX(1000px);
                opacity: 0;
            }
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 3rem 2rem;
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .book-card {
            background: var(--color-card);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: var(--shadow-gold);
            border: 1px solid var(--color-border);
            position: relative;
            overflow: hidden;
        }
        
        .book-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.1) 0%, transparent 40%);
            pointer-events: none;
            z-index: -1;
        }
        
        .book-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2.5rem;
        }
        
        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--color-accent);
            margin: 0;
            position: relative;
            padding-bottom: 1rem;
            animation: slideInFromLeft 0.8s ease-out forwards;
        }
        
        .book-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--color-accent), transparent);
        }
        
        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .btn-back {
            background: rgba(212, 175, 55, 0.1);
            color: var(--color-accent);
            border: 1px solid var(--color-accent);
            padding: 0.6rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            animation: fadeIn 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        .btn-back:hover {
            background: var(--color-accent);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-back i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }
        
        .btn-back:hover i {
            transform: translateX(-3px);
        }
        
        .book-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            animation: fadeInUp 0.8s ease-out 0.5s forwards;
            opacity: 0;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .book-cover {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.4s ease;
            justify-self: center;
        }
        
        .book-cover:hover {
            transform: rotate(2deg) scale(1.02);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.3);
        }
        
        .book-details {
            display: flex;
            flex-direction: column;
        }
        
        .book-description {
            line-height: 1.7;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(30, 30, 30, 0.5);
            border-left: 3px solid var(--color-accent);
            border-radius: 0 8px 8px 0;
        }
        
        .book-meta {
            margin-bottom: 2rem;
        }
        
        .book-meta p {
            margin-bottom: 0.8rem;
            font-size: 1.05rem;
        }
        
        .book-meta strong {
            color: var(--color-accent);
            font-weight: 500;
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--color-accent);
            margin: 2rem 0 1rem;
            position: relative;
            padding-bottom: 0.5rem;
            animation: fadeIn 0.8s ease-out 0.7s forwards;
            opacity: 0;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--color-accent);
        }
        
        .info-card {
            background: rgba(30, 30, 30, 0.5);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 3px solid var(--color-accent);
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease-out 0.9s forwards;
            opacity: 0;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .files-section {
            margin-top: 2rem;
            animation: fadeIn 0.8s ease-out 1.1s forwards;
            opacity: 0;
        }
        
        .file-card {
            background: rgba(30, 30, 30, 0.5);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
            border: 1px solid var(--color-border);
        }
        
        .file-card:hover {
            border-color: var(--color-accent);
            transform: translateX(10px);
        }
        
        .file-info {
            display: flex;
            align-items: center;
        }
        
        .file-icon {
            font-size: 1.8rem;
            margin-right: 1.5rem;
            color: var(--color-accent);
        }
        
        .file-actions {
            display: flex;
            gap: 1rem;
        }
        
        .btn-file {
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-view {
            background: rgba(212, 175, 55, 0.1);
            color: var(--color-accent);
            border: 1px solid var(--color-accent);
        }
        
        .btn-download {
            background: var(--color-accent);
            color: #000;
            border: 1px solid var(--color-accent);
        }
        
        .btn-file:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-view:hover {
            background: rgba(212, 175, 55, 0.2);
        }
        
        .btn-download:hover {
            background: #e8c350;
        }
        
        .btn-file i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }
        
        .btn-file:hover i {
            transform: scale(1.2);
        }
        
        .no-files {
            background: rgba(30, 30, 30, 0.5);
            padding: 2rem;
            text-align: center;
            border-radius: 8px;
            color: var(--color-text-light);
            font-style: italic;
        }
        
        @media (max-width: 900px) {
            .book-content {
                grid-template-columns: 1fr;
            }
            
            .book-cover {
                max-width: 300px;
                margin-bottom: 2rem;
            }
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 2rem 1.5rem;
            }
            
            .book-card {
                padding: 2rem;
            }
            
            .book-title {
                font-size: 2rem;
            }
            
            .file-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .file-actions {
                width: 100%;
                justify-content: flex-end;
            }
            
            .btn-file {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Fondo animado con partículas -->
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <div class="book-card">
            <div class="book-header">
                <h1 class="book-title">{{ $libro->titulo }}</h1>
                <a href="{{ url('/') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
            
            <div class="book-content">
                <!-- Portada del libro (puedes reemplazar con la imagen real) -->
                <img src="https://via.placeholder.com/400x600" alt="Portada de {{ $libro->titulo }}" class="book-cover">
                
                <div class="book-details">
                    <div class="book-meta">
                        <p><strong>ISBN:</strong> {{ $libro->isbn }}</p>
                        <p><strong>Año de Publicación:</strong> {{ $libro->anio_publicacion }}</p>
                    </div>
                    
                    <div class="book-description">
                        <p><strong>Descripción:</strong> {{ $libro->descripcion }}</p>
                    </div>
                </div>
            </div>
            
            <h2 class="section-title">Autor</h2>
            <div class="info-card">
                <p>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</p>
            </div>
            
            <h2 class="section-title">Categoría</h2>
            <div class="info-card">
                <p>{{ $libro->categoria->nombre }}</p>
            </div>
            
            <div class="files-section">
                <h2 class="section-title">Archivos</h2>
                
                @if($libro->archivo_pdf)
                    <div class="file-card">
                        <div class="file-info">
                            <i class="fas fa-file-pdf file-icon"></i>
                            <div>
                                <h4>Archivo PDF</h4>
                            </div>
                        </div>
                        <div class="file-actions">
                            <a href="{{ route('libros.ver.pdf', $libro) }}" class="btn-file btn-view">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                        </div>
                    </div>
                @endif
                
                @if($libro->archivo_epub)
                    <div class="file-card">
                        <div class="file-info">
                            <i class="fas fa-book-open file-icon"></i>
                            <div>
                                <h4>Archivo EPUB</h4>
                            </div>
                        </div>
                        <div class="file-actions">
                            <a href="{{ route('libros.ver.epub', $libro) }}" class="btn-file btn-view">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('libros.descargar.epub', $libro) }}" class="btn-file btn-download">
                                <i class="fas fa-download"></i> Descargar
                            </a>
                        </div>
                    </div>
                @endif
                
                @if(!$libro->archivo_pdf && !$libro->archivo_epub)
                    <div class="no-files">
                        <p>No hay archivos disponibles para este libro</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Font Awesome para iconos -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <script>
        // Crear partículas para el fondo
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Tamaño aleatorio entre 1px y 3px
                const size = Math.random() * 2 + 1;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Posición inicial aleatoria
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Duración de animación aleatoria
                const duration = Math.random() * 10 + 10;
                particle.style.animationDuration = `${duration}s`;
                
                // Retraso inicial aleatorio
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                container.appendChild(particle);
            }
        }
        
        // Inicializar cuando el DOM esté cargado
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Efecto hover para los botones
            const buttons = document.querySelectorAll('.btn-file, .btn-back');
            buttons.forEach(button => {
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
            
            // Efecto hover para las tarjetas de archivo
            const fileCards = document.querySelectorAll('.file-card');
            fileCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('.file-icon');
                    if (icon) {
                        icon.style.transform = 'scale(1.1) rotate(5deg)';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('.file-icon');
                    if (icon) {
                        icon.style.transform = 'scale(1) rotate(0)';
                    }
                });
            });
        });
    </script>
</body>
</html>