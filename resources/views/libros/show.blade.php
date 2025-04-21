<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $libro->titulo }} | Codexa</title>
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
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .book-detail-container {
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

        .book-detail-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--dark-gold), var(--gold));
        }

        .book-header {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .book-cover {
            width: 250px;
            height: 350px;
            background: linear-gradient(135deg, var(--black), var(--dark-black));
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .book-cover i {
            font-size: 5rem;
            color: var(--gold);
            z-index: 1;
        }

        .book-cover::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                transparent 45%,
                rgba(212, 175, 55, 0.1) 50%,
                transparent 55%
            );
            animation: shine 3s infinite;
        }

        @keyframes shine {
            to {
                transform: translate(50%, 50%);
            }
        }

        .book-info {
            flex: 1;
            min-width: 300px;
        }

        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--white);
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .book-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: var(--gold);
            border-radius: 3px;
        }

        .book-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray);
        }

        .meta-item i {
            color: var(--gold);
            width: 20px;
            text-align: center;
        }

        .book-description {
            background-color: rgba(212, 175, 55, 0.05);
            padding: 1.5rem;
            border-radius: 6px;
            border-left: 3px solid var(--gold);
            margin-bottom: 2rem;
            line-height: 1.6;
            animation: fadeIn 1s ease-in-out;
        }

        .book-description p {
            margin-bottom: 1rem;
        }

        .book-description strong {
            color: var(--gold);
        }

        .pdf-container {
            background-color: rgba(75, 192, 192, 0.1);
            padding: 1.5rem;
            border-radius: 6px;
            border-left: 3px solid #4bc0c0;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: fadeIn 1s ease-in-out;
        }

        .pdf-container i {
            font-size: 2rem;
            color: #4bc0c0;
        }

        .pdf-info h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 0.5rem;
            color: var(--white);
        }

        .pdf-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #4bc0c0;
            color: var(--black);
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .pdf-link:hover {
            background-color: #3aa8a8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(75, 192, 192, 0.3);
        }

        .pdf-link i {
            font-size: 1rem;
            color: var(--black);
            transition: var(--transition);
        }

        .pdf-link:hover i {
            transform: translateX(3px);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: transparent;
            color: var(--gold);
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid var(--gold);
        }

        .back-btn:hover {
            background-color: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .back-btn i {
            transition: var(--transition);
        }

        .back-btn:hover i {
            transform: translateX(-3px);
        }

        .edit-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: rgba(255, 206, 86, 0.1);
            color: #ffce56;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid #ffce56;
        }

        .edit-btn:hover {
            background-color: rgba(255, 206, 86, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 206, 86, 0.3);
        }

        .edit-btn i {
            transition: var(--transition);
        }

        .edit-btn:hover i {
            transform: scale(1.2);
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

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--black);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(212, 175, 55, 0.3);
            border-radius: 50%;
            border-top-color: var(--gold);
            animation: spin 1s ease-in-out infinite;
            margin-bottom: 1rem;
        }

        .loading-text {
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-top: 1rem;
            letter-spacing: 2px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .book-header {
                flex-direction: column;
            }

            .book-cover {
                width: 100%;
                height: auto;
                aspect-ratio: 2/3;
                margin: 0 auto 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .back-btn, .edit-btn {
                width: 100%;
                justify-content: center;
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
        <div class="book-detail-container">
            <div class="book-header">
                <div class="book-cover">
                    <i class="fas fa-book"></i>
                </div>
                <div class="book-info">
                    <h1 class="book-title">{{ $libro->titulo }}</h1>
                    
                    <div class="book-meta">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span><strong>Autor:</strong> {{ $libro->autor->nombre }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span><strong>Categoría:</strong> {{ $libro->categoria->nombre }}</span>
                        </div>
                    </div>
                    
                    <div class="book-description">
                        <strong>Descripción:</strong>
                        <p>{{ $libro->descripcion ?? 'Este libro no tiene descripción disponible.' }}</p>
                    </div>
                    
                    @if ($libro->archivo_pdf)
                        <div class="pdf-container">
                            <i class="fas fa-file-pdf"></i>
                            <div class="pdf-info">
                                <h3>Archivo PDF disponible</h3>
                                <a href="{{ asset('storage/' . $libro->archivo_pdf) }}" target="_blank" class="pdf-link">
                                    <i class="fas fa-external-link-alt"></i> Ver PDF
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    <div class="action-buttons">
                        <a href="{{ route('libros.index') }}" class="back-btn">
                            <i class="fas fa-arrow-left"></i> Volver a la biblioteca
                        </a>
                        <a href="{{ route('libros.edit', $libro->id) }}" class="edit-btn">
                            <i class="fas fa-edit"></i> Editar libro
                        </a>
                    </div>
                </div>
            </div>
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
        document.querySelectorAll('.back-btn, .edit-btn, .pdf-link, .logout-btn').forEach(button => {
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
    </script>
</body>
</html>