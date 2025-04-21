<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- CSS de Laravel UI -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        
        @keyframes loading {
            0% { background-position: -200px 0; }
            100% { background-position: 200px 0; }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
            40% { transform: translateY(-20px) translateX(-50%); }
            60% { transform: translateY(-10px) translateX(-50%); }
        }
        
        @keyframes scroll {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(10px); opacity: 0; }
        }

        /* PRELOADER */
        .loading-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .gold-bar {
            width: 200px;
            height: 4px;
            background: linear-gradient(90deg, #000, #FFD700, #000);
            position: relative;
            overflow: hidden;
            animation: loading 1.5s infinite;
        }

        /* HEADER */
        .main-header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .main-header.scrolled {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 15px 0;
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.1);
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
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
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
        }
        
        .btn-primary {
            background-color: #FFD700;
            color: #000;
            border: 2px solid #FFD700;
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: #FFD700;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }
        
        .btn-outline {
            border: 2px solid #FFD700;
            color: #FFD700;
            background-color: transparent;
        }
        
        .btn-outline:hover {
            background-color: #FFD700;
            color: #000;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }

        /* Formulario logout inline */
        .inline-form {
            display: inline;
        }

        /* HERO SECTION */
        .hero {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80') no-repeat center center/cover;
            padding-top: 80px;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 0 20px;
            max-width: 800px;
            animation: fadeInUp 1s ease;
        }
        
        .hero-title {
            font-size: 72px;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        
        .hero-subtitle {
            font-size: 20px;
            margin-bottom: 40px;
            font-weight: 300;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }
        
        .mouse {
            width: 25px;
            height: 40px;
            border: 2px solid #FFD700;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            padding-top: 5px;
        }
        
        .scroller {
            width: 3px;
            height: 8px;
            background: #FFD700;
            border-radius: 3px;
            animation: scroll 2s infinite;
        }

        /* FEATURES SECTION */
        .features {
            padding: 100px 0;
            background: #0a0a0a;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }
        
        .section-header p {
            color: #ccc;
            max-width: 700px;
            margin: 0 auto;
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
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .feature-card {
            background: rgba(20, 20, 20, 0.8);
            padding: 40px 30px;
            text-align: center;
            border-radius: 5px;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.5s ease, transform 0.5s ease;
            border: 1px solid rgba(255, 215, 0, 0.1);
        }
        
        .feature-card:nth-child(1) { transition-delay: 0.2s; }
        .feature-card:nth-child(2) { transition-delay: 0.4s; }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
        }
        
        .feature-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: #FFD700;
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: rotate(10deg) scale(1.2);
        }
        
        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
        }
        
        .feature-card p {
            color: #ccc;
            font-size: 15px;
        }

        /* FOOTER */
        .main-footer {
            background: #000;
            padding: 80px 0 0;
            border-top: 1px solid rgba(255, 215, 0, 0.1);
        }
        
        .footer-content {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 60px;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        .footer-content p {
            color: #ccc;
            margin-bottom: 15px;
            line-height: 1.6;
            font-size: 14px;
        }
        
        .footer-content a {
            color: #FFD700;
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
            transition: color 0.3s ease, transform 0.3s ease;
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
            .hero-title {
                font-size: 48px;
            }
            
            .hero-subtitle {
                font-size: 16px;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
            }
            
            .auth-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .feature-card {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 480px) {
            .hero-title {
                font-size: 36px;
            }
            
            .section-header h2 {
                font-size: 32px;
            }
            
            .logo {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="loading-animation">
        <div class="gold-bar"></div>
    </div>
    
    <!-- Header con autenticación integrada -->
    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <div class="auth-buttons">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline-form">
                        @csrf
                        <button type="submit" class="btn btn-outline">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="gold-text">Organiza</span> tu colección de libros favoritos
            </h1>
            <p class="hero-subtitle">Una solución simple y elegante para catalogar tus libros, llevar registro de tus lecturas y descubrir nuevas recomendaciones.</p>
            <div class="hero-buttons">
                
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="scroller"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="section-header">
            <h2>Características <span class="gold-text">principales</span></h2>
            <div class="divider">
                <div class="line"></div>
                <div class="diamond"></div>
                <div class="line"></div>
            </div>
            <p>Descubre cómo Codexa puede transformar tu experiencia de lectura</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📖</div>
                <h3>Catálogo digital</h3>
                <p>Organiza todos tus libros en un catálogo accesible desde cualquier dispositivo.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Búsqueda avanzada</h3>
                <p>Encuentra cualquier libro en tu colección fácilmente.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <p>La plataforma perfecta para amantes de los libros</p>
            <div class="social-icons">
                
            </div>
            <p>© 2025 <a href="#">Codexa</a>. Todos los derechos reservados.</p>
        </div>
        <div class="copyright">
            <p>Una solución creada para lectores apasionados</p>
        </div>
    </footer>

    <!-- Scripts de Laravel UI -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        // Cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            // Ocultar preloader
            setTimeout(function() {
                document.querySelector('.loading-animation').style.opacity = '0';
                setTimeout(function() {
                    document.querySelector('.loading-animation').style.display = 'none';
                }, 500);
            }, 1500);
            
            // Header al hacer scroll
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.main-header');
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
            
            // Animaciones al hacer scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.feature-card');
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;
                    
                    if(elementPosition < screenPosition) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Ejecutar al cargar
            
            // Efecto de máquina de escribir para el título
            const heroTitle = document.querySelector('.hero-title');
            if (heroTitle) {
                const originalText = heroTitle.textContent;
                heroTitle.textContent = '';
                
                let i = 0;
                const typingEffect = setInterval(() => {
                    if (i < originalText.length) {
                        heroTitle.textContent += originalText.charAt(i);
                        i++;
                    } else {
                        clearInterval(typingEffect);
                    }
                }, 50);
            }
        });
    </script>
</body>
</html>