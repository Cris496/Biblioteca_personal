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
        }

        /* DASHBOARD STYLES */
        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .dashboard-header h1 {
            font-size: 42px;
            margin-bottom: 20px;
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
        }
        
        /* BOOK COLLECTION */
        .book-collection {
            margin-top: 50px;
        }
        
        .collection-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .book-card {
            background: rgba(30, 30, 30, 0.8);
            border-radius: 5px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 215, 0, 0.1);
        }
        
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.1);
        }
        
        .book-cover {
            width: 100%;
            height: 250px;
            background-color: #222;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFD700;
            font-size: 50px;
        }
        
        .book-info {
            padding: 15px;
        }
        
        .book-title {
            font-weight: 600;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .book-author {
            color: #999;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .book-status {
            display: inline-block;
            padding: 3px 8px;
            font-size: 12px;
            border-radius: 3px;
        }
        
        .status-read {
            background-color: rgba(0, 255, 0, 0.1);
            color: #0f0;
        }
        
        .status-reading {
            background-color: rgba(255, 215, 0, 0.1);
            color: #FFD700;
        }
        
        .status-unread {
            background-color: rgba(255, 0, 0, 0.1);
            color: #f00;
        }

        /* FOOTER */
        .main-footer {
            background: #000;
            padding: 40px 0 0;
            border-top: 1px solid rgba(255, 215, 0, 0.1);
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
            
            .collection-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
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
        }
    </style>
</head>
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
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Tu <span class="gold-text">Dashboard</span></h1>
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
    Bienvenido de vuelta, <strong>{{ Auth::user()->name }}, aqui puedes gestionar tu coleccion</strong>.
</div>
            
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-icon">📚</div>
                    <h3>Tu colección</h3>
                    <p>Gestiona todos los libros que tienes en tu biblioteca personal.</p>
                    <a href="#" class="btn btn-outline">Ver colección</a>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">🔍</div>
                    <h3>Mis libros</h3>
                    <p>Mis libros.</p>
                    <a href="{{ route('libros.index') }}" class="btn btn-outline">Buscar ahora</a>

                </div>
                
                <div class="dashboard-card">
                    <div class="card-icon">📊</div>
                    <h3>Estadísticas</h3>
                    <p>Visualiza tus hábitos de lectura y progreso.</p>
                    <a href="#" class="btn btn-outline">Ver estadísticas</a>
                </div>
            </div>
            
            <!-- Book Collection Section -->
            <div class="book-collection">
                <div class="collection-header">
                    <h2>Tus <span class="gold-text">libros recientes</span></h2>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Añadir libro
                    </a>
                </div>
                
                <div class="books-grid">
                    <div class="book-card">
                        <div class="book-cover">📖</div>
                        <div class="book-info">
                            <h4 class="book-title">Cien años de soledad</h4>
                            <p class="book-author">Gabriel García Márquez</p>
                            <span class="book-status status-read">Leído</span>
                        </div>
                    </div>
                    
                    <div class="book-card">
                        <div class="book-cover">📖</div>
                        <div class="book-info">
                            <h4 class="book-title">1984</h4>
                            <p class="book-author">George Orwell</p>
                            <span class="book-status status-reading">Leyendo</span>
                        </div>
                    </div>
                    
                    <div class="book-card">
                        <div class="book-cover">📖</div>
                        <div class="book-info">
                            <h4 class="book-title">El Principito</h4>
                            <p class="book-author">Antoine de Saint-Exupéry</p>
                            <span class="book-status status-unread">Por leer</span>
                        </div>
                    </div>
                    
                    <div class="book-card">
                        <div class="book-cover">📖</div>
                        <div class="book-info">
                            <h4 class="book-title">Don Quijote de la Mancha</h4>
                            <p class="book-author">Miguel de Cervantes</p>
                            <span class="book-status status-read">Leído</span>
                        </div>
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
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
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
            
            // Función para verificar si un elemento está visible
            function isElementInViewport(el) {
                const rect = el.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }
            
            // Función para manejar el scroll
            function checkCards() {
                cards.forEach((card, index) => {
                    if (isElementInViewport(card)) {
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, index * 200);
                    }
                });
            }
            
            // Verificar al cargar y al hacer scroll
            window.addEventListener('load', checkCards);
            window.addEventListener('scroll', checkCards);
            checkCards(); // Verificar inicialmente
        });
    </script>
</body>
</html>