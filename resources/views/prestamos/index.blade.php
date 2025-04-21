<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Préstamos | Codexa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* PALETA DE COLORES */
        :root {
            --primary: #FFD700;
            --primary-dark: #E6C200;
            --dark: #121212;
            --darker: #0A0A0A;
            --light: #F5F5F5;
            --gray: #2D2D2D;
            --success: #4CAF50;
            --warning: #FFC107;
            --danger: #F44336;
        }

        /* ANIMACIONES */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }

        /* ESTILOS BASE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* HEADER ESTILO DASHBOARD */
        .main-header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.9);
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .header-content {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--primary);
        }
        
        .logo span {
            color: white;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-name {
            color: var(--primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .logout-btn {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .logout-btn:hover {
            background: var(--primary);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        /* CONTENIDO PRINCIPAL - ESTILO DASHBOARD */
        .main-content {
            padding-top: 100px;
            min-height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        
        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9));
            z-index: 0;
        }
        
        .dashboard-container {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 0;
            position: relative;
            z-index: 1;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .dashboard-header h1 {
            font-size: 42px;
            margin-bottom: 20px;
            color: var(--primary);
            font-family: 'Playfair Display', serif;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        
        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .line {
            width: 50px;
            height: 1px;
            background: var(--primary);
        }
        
        .diamond {
            width: 10px;
            height: 10px;
            background: var(--primary);
            transform: rotate(45deg);
            margin: 0 15px;
        }
        
        .welcome-message {
            text-align: center;
            margin-bottom: 40px;
            font-size: 18px;
            color: #ccc;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* TARJETAS DE PRÉSTAMOS */
        .prestamos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .prestamo-card {
            background: rgba(20, 20, 20, 0.8);
            padding: 30px;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 215, 0, 0.1);
            backdrop-filter: blur(5px);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: calc(var(--delay) * 0.1s);
        }
        
        .prestamo-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .prestamo-card:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
            background: rgba(30, 30, 30, 0.9);
        }
        
        .card-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: var(--primary);
        }
        
        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        .card-detail {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        
        .card-detail i {
            width: 24px;
            color: var(--primary);
            margin-right: 12px;
            text-align: center;
            font-size: 1.1rem;
        }
        
        .card-detail-label {
            font-weight: 600;
            color: var(--primary);
            min-width: 120px;
            font-size: 0.95rem;
        }
        
        .card-detail-value {
            color: var(--light);
            flex-grow: 1;
        }
        
        .card-footer {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        /* BOTONES */
        .btn {
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 14px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            text-decoration: none;
        }
        
        .btn i {
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: #000;
            border-color: var(--primary);
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.4);
        }
        
        .btn-primary:hover i {
            transform: translateX(5px);
        }
        
        .btn-secondary {
            background-color: rgba(255, 215, 0, 0.1);
            color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-secondary:hover {
            background-color: rgba(255, 215, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 215, 0, 0.2);
        }
        
        .btn-back {
            background-color: transparent;
            color: var(--light);
            border: 2px solid var(--light);
            margin-right: auto;
        }
        
        .btn-back:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
        }

        /* ACTION BUTTONS */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 40px 0;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 15px 30px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }
        
        .btn-books {
            background-color: var(--primary);
            color: #000;
        }
        
        .btn-books:hover {
            background-color: #000;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-loans {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-loans:hover {
            background-color: var(--primary);
            color: #000;
        }

        /* ALERTA */
        .alert {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(75, 192, 192, 0.1);
            border-left: 4px solid var(--success);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .alert i {
            font-size: 24px;
            color: var(--success);
        }
        
        .alert-content {
            font-size: 16px;
        }

        /* FOOTER */
        .main-footer {
            background: #000;
            padding: 40px 0 0;
            border-top: 1px solid rgba(255, 215, 0, 0.1);
            position: relative;
        }
        
        .footer-content {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 20px;
            color: var(--primary);
        }
        
        .copyright {
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #666;
        }

        /* LOADING */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--darker);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .loading-spinner {
            width: 70px;
            height: 70px;
            border: 5px solid rgba(255, 215, 0, 0.2);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        
        .loading-text {
            color: var(--primary);
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            letter-spacing: 3px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .prestamos-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 36px;
            }
            
            .prestamos-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn, .action-btn {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-header h1 {
                font-size: 28px;
            }
            
            .logo {
                font-size: 24px;
            }
            
            .prestamo-card {
                padding: 20px;
            }
            
            .card-detail {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            
            .card-detail-label {
                min-width: auto;
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
            <div class="logo"><span>COD</span>EXA</div>
            
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
        <div class="background-overlay"></div>
        
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Gestión de <span class="gold-text">Préstamos</span></h1>
                <div class="divider">
                    <div class="line"></div>
                    <div class="diamond"></div>
                    <div class="line"></div>
                </div>
                <div class="welcome-message">
                    Administra todos tus préstamos activos y realiza un seguimiento de los libros que has prestado o recibido.
                </div>
            </div>

            <!-- Botón de volver -->
            <a href="{{ route('libros.index') }}" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Volver a Biblioteca
            </a>

            @if($prestamos->isEmpty())
                <div class="alert">
                    <i class="fas fa-info-circle"></i>
                    <div class="alert-content">
                        No tienes préstamos activos actualmente.
                    </div>
                </div>
            @else
                <div class="prestamos-grid">
                    @foreach($prestamos as $index => $prestamo)
                    <div class="prestamo-card" style="--delay: {{ $index }}">
                        <div class="card-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3 class="card-title">{{ $prestamo->libro->titulo }}</h3>
                        
                        <div class="card-detail">
                            <i class="fas fa-user-shield"></i>
                            <span class="card-detail-label">Prestado por:</span>
                            <span class="card-detail-value">{{ $prestamo->usuarioQuePresta->name }}</span>
                        </div>
                        
                        <div class="card-detail">
                            <i class="fas fa-user-tag"></i>
                            <span class="card-detail-label">Prestado a:</span>
                            <span class="card-detail-value">{{ $prestamo->usuarioQueRecibe->name }}</span>
                        </div>
                        
                        <div class="card-detail">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="card-detail-label">Fecha préstamo:</span>
                            <span class="card-detail-value">{{ date('d/m/Y', strtotime($prestamo->fecha_prestamo)) }}</span>
                        </div>
                        
                        <div class="card-detail">
                            <i class="fas fa-clock"></i>
                            <span class="card-detail-label">Estado:</span>
                            <span class="card-detail-value">Activo</span>
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('prestamos.show', $prestamo->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            <!-- Botones de acción principales -->
            <div class="action-buttons">
                <a href="{{ route('prestamos.create') }}" class="action-btn btn-books">
                    <i class="fas fa-hand-holding"></i> Nuevo Préstamo
                </a>
                <a href="{{ route('prestamos.realizados') }}" class="action-btn btn-loans">
                    <i class="fas fa-list-check"></i> Ver Historial
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">CODEXA</div>
            <p>La plataforma perfecta para amantes de los libros</p>
        </div>
        <div class="copyright">
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
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
                    
                    // Animate cards
                    const cards = document.querySelectorAll('.prestamo-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, index * 100);
                    });
                }, 500);
            }, 1000);
        });

        // Add hover effects to buttons
        document.querySelectorAll('.btn, .action-btn, .logout-btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'translateX(5px)';
                }
            });
            
            button.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'translateX(0)';
                }
            });
        });
    </script>
</body>
</html>