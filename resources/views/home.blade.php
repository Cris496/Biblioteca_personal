<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Dashboard</title>
    
    <!-- Fuentes e iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap (opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* RESET Y ESTILOS GENERALES */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #000;
            color: #fff;
            overflow-x: hidden;
            line-height: 1.6;
        }
        
        .gold-text {
            color: #FFD700;
            font-weight: 600;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        
        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
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
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
        
        @keyframes loading {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* HEADER */
        .main-header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            transition: all 0.3s ease;
            background-color: rgba(0, 0, 0, 0.9);
        }
        
        .header-content {
            width: 90%;
            max-width: 1200px;
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
            cursor: pointer;
        }
        
        /* BOTONES */
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-align: center;
            font-size: 14px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        
        .btn-primary {
            background-color: #FFD700;
            color: #000;
            border-color: #FFD700;
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: #FFD700;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }
        
        .btn-outline {
            border-color: #FFD700;
            color: #FFD700;
            background-color: transparent;
        }
        
        .btn-outline:hover {
            background-color: #FFD700;
            color: #000;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }

        /* CONTENIDO PRINCIPAL */
        .main-content {
            padding-top: 100px;
            min-height: 100vh;
            position: relative;
        }
        
        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9));
            z-index: -1;
        }
        
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -2;
            animation: pulse 20s infinite ease-in-out;
        }

        /* DASHBOARD STYLES */
        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .dashboard-header h1 {
            font-size: 42px;
            margin-bottom: 20px;
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
            background: #FFD700;
        }
        
        .diamond {
            width: 10px;
            height: 10px;
            background: #FFD700;
            transform: rotate(45deg);
            margin: 0 15px;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .dashboard-card {
            background: rgba(20, 20, 20, 0.8);
            padding: 40px 30px;
            border-radius: 5px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 215, 0, 0.1);
            backdrop-filter: blur(5px);
            opacity: 0;
            transform: translateY(20px);
        }
        
        .dashboard-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .dashboard-card:hover {
            transform: translateY(-10px) !important;
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
            background: rgba(30, 30, 30, 0.9);
        }
        
        .card-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: #FFD700;
        }
        
        .welcome-message {
            text-align: center;
            margin-bottom: 40px;
            font-size: 18px;
            color: #ccc;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }
        
        /* ACTION BUTTONS */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 60px 0 40px;
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
            opacity: 0;
            transform: translateY(20px);
        }
        
        .action-btn.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .action-btn:nth-child(1) { transition-delay: 0.1s; }
        .action-btn:nth-child(2) { transition-delay: 0.3s; }
        
        .action-btn:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }
        
        .btn-books {
            background-color: #FFD700;
            color: #000;
        }
        
        .btn-books:hover {
            background-color: #000;
            color: #FFD700;
            border: 2px solid #FFD700;
        }
        
        .btn-loans {
            background-color: transparent;
            color: #FFD700;
            border: 2px solid #FFD700;
        }
        
        .btn-loans:hover {
            background-color: #FFD700;
            color: #000;
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
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .social-icons a {
            color: #fff;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: #FFD700;
            transform: translateY(-3px);
        }
        
        .copyright {
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #666;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 36px;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-header h1 {
                font-size: 28px;
            }
            
            .logo {
                font-size: 24px;
            }
            
            .btn {
                padding: 10px 15px;
                font-size: 12px;
            }
            
            .action-btn {
                padding: 12px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <div class="auth-buttons">
                @auth
                    <span class="user-name">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline ms-3">
                            <i class="fas fa-sign-out-alt me-1"></i> Cerrar sesión
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div class="background-image"></div>
        <div class="background-overlay"></div>
        
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Tu <span class="gold-text">Biblioteca Personal</span></h1>
                <div class="divider">
                    <div class="line"></div>
                    <div class="diamond"></div>
                    <div class="line"></div>
                </div>
                <div class="welcome-message">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido de vuelta, <strong>{{ Auth::user()->name }}</strong>. Explora y gestiona tu colección literaria.
                    <div class="dashboard-container">
    <div class="dashboard-card small-card">
        <div class="card-icon">🔍</div>
        <h3>Mis libros</h3>
        <p>Mira tus libros guardados</p>
        <a href="{{ route('libros.index') }}" class="btn btn-outline">Ir ahora</a>
    </div>
</div>

            <!-- Botones de acción principales -->
            <div class="action-buttons">
                <a href="{{ route('libros.index') }}" class="action-btn btn-books" id="books-btn">
                    <i class="fas fa-book"></i> Ir a mis libros
                    <a href="{{ route('prestamos.index') }}" class="action-btn btn-loans nav-btn" id="loans-btn">
    Ir a mis préstamos
</a>
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
            <div class="social-icons">
                
            </div>
            <p>© 2023 Codexa. Todos los derechos reservados.</p>
        </div>
        <div class="copyright">
            <p>Una solución creada para lectores apasionados</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animación de las tarjetas al hacer scroll
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.dashboard-card');
            const actionButtons = document.querySelectorAll('.action-btn');
            
            // Función para verificar si un elemento está visible
            function isElementInViewport(el) {
                const rect = el.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }
            
            // Función para manejar el scroll
            function checkVisibility() {
                cards.forEach((card, index) => {
                    if (isElementInViewport(card)) {
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, index * 200);
                    }
                });
                
                actionButtons.forEach((btn, index) => {
                    if (isElementInViewport(btn)) {
                        setTimeout(() => {
                            btn.classList.add('visible');
                        }, index * 200 + 300);
                    }
                });
            }
            
            // Verificar al cargar y al hacer scroll
            window.addEventListener('load', checkVisibility);
            window.addEventListener('scroll', checkVisibility);
            checkVisibility(); // Verificar inicialmente
        });
    </script>
</body>
</html>