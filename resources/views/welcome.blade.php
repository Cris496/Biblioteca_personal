<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Bienvenido</title>
    <style>
        /* Estilos base */
        :root {
            --color-primary: #000000; /* Negro puro */
            --color-secondary: #212121; /* Negro más claro */
            --color-accent: #D4AF37; /* Dorado metálico */
            --color-light: #f5f5f5; /* Fondo claro */
            --color-dark: #000000; /* Negro para footer */
            --color-text: #212121; /* Texto principal */
            --color-text-light: #757575; /* Texto secundario */
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Playfair Display', serif;
            line-height: 1.6;
            color: var(--color-text);
            background-color: var(--color-light);
            overflow-x: hidden;
        }
        
        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        /* Header */
        header {
            background-color: var(--color-primary);
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            animation: fadeIn 0.8s ease-out;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Espacio para el logo - reemplazar con tu imagen */
        .logo-container {
            height: 60px;
            display: flex;
            align-items: center;
        }
        
        .logo-placeholder {
            color: var(--color-accent);
            font-size: 1.8rem;
            font-weight: 700;
            font-style: italic;
            display: flex;
            flex-direction: column;
        }
        
        .logo-placeholder .top-line {
            font-size: 1rem;
            margin-bottom: -5px;
        }
        
        .logo-placeholder .main-line {
            font-size: 1.8rem;
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            padding-top: 80px;
            color: white;
        }
        
        .hero-content {
            max-width: 600px;
            padding: 2rem 0;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
            animation: slideUp 0.8s ease-out 0.2s both;
            color: var(--color-accent);
        }
        
        .hero p {
            font-size: 1.1rem;
            color: rgba(255,255,255,0.8);
            margin-bottom: 2rem;
            animation: slideUp 0.8s ease-out 0.4s both;
        }
        
        .hero-buttons {
            animation: slideUp 0.8s ease-out 0.6s both;
        }
        
        /* Botones */
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }
        
        .btn-primary {
            background-color: var(--color-accent);
            color: var(--color-primary);
            border: 2px solid var(--color-accent);
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: var(--color-accent);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
        }
        
        .btn-outline {
            border: 2px solid var(--color-accent);
            color: var(--color-accent);
            background-color: transparent;
        }
        
        .btn-outline:hover {
            background-color: var(--color-accent);
            color: var(--color-primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
        }
        
        /* Sección de características */
        .features {
            padding: 4rem 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            color: var(--color-primary);
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: var(--color-accent);
            bottom: -8px;
            left: 25%;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.5s ease;
        }
        
        .section-title:hover h2::after {
            transform: scaleX(1);
        }
        
        .section-title p {
            color: var(--color-text-light);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .feature-card {
            padding: 1.5rem;
            border-radius: 8px;
            background-color: white;
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
            border: 1px solid rgba(0,0,0,0.1);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .feature-card:nth-child(1) { animation-delay: 0.2s; }
        .feature-card:nth-child(2) { animation-delay: 0.4s; }
        
        .feature-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-color: var(--color-accent);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--color-accent);
            display: inline-block;
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: rotate(10deg) scale(1.2);
        }
        
        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
            color: var(--color-primary);
        }
        
        .feature-card:hover h3 {
            color: var(--color-accent);
        }
        
        .feature-card p {
            color: var(--color-text-light);
        }
        
        /* Footer */
        footer {
            background-color: var(--color-dark);
            color: white;
            padding: 3rem 0 1rem;
            text-align: center;
        }
        
        .footer-content p {
            margin-bottom: 1.5rem;
            opacity: 0.8;
        }
        
        .footer-content a {
            color: var(--color-accent);
            text-decoration: none;
        }
        
        .copyright {
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            opacity: 0.6;
        }
        
        /* Efecto de aparición al hacer scroll */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .btn {
                display: block;
                width: 100%;
                margin-right: 0;
            }
            
            .feature-card {
                animation: none !important;
                opacity: 1;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo-container">
                    <!-- Reemplazar este div con tu imagen logo -->
                    <div class="logo-placeholder">
                      
                        <span class="main-line">CODEXA</span>
                    </div>
                    <!-- Fin de espacio para logo -->
                </div>
                <nav>
                    <a href="#" class="btn btn-outline">Iniciar Sesión</a>
                    <a href="#" class="btn btn-outline">Crear cuenta</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Organiza tu colección de libros favoritos</h1>
                <p>Una solución simple y elegante para catalogar tus libros, llevar registro de tus lecturas y descubrir nuevas recomendaciones.</p>
                <div class="hero-buttons">
            
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-title animate-on-scroll">
                <h2>Características principales</h2>
                <p>Descubre cómo Codexa puede transformar tu experiencia de lectura</p>
            </div>
            <div class="features-grid">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">📖</div>
                    <h3>Catálogo digital</h3>
                    <p>Organiza todos tus libros en un catálogo accesible desde cualquier dispositivo.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🔍</div>
                    <h3>Búsqueda avanzada</h3>
                    <p>Encuentra cualquier libro en tu colección fácilmente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="animate-on-scroll">
        <div class="container">
            <div class="footer-content">
                <!-- Reemplazar este div con tu imagen logo -->
                <div class="logo-container" style="
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
">
    <img 
        src="{{ asset('codexa.png') }}" 
        alt="Codexa Logo"
        style="max-width: 110px;"
    >
    <p style="color: var(--color-accent); font-size: 1rem; margin-top: 0.5rem;">
      
    </p>
</div>
                <!-- Fin de espacio para logo -->
                <p>La plataforma perfecta para amantes de los libros</p>
                <p>© 2025 <a href="#">Codexa</a>. Todos los derechos reservados.</p>
            </div>
            <div class="copyright">
                <p>Una solución creada para lectores apasionados</p>
            </div>
        </div>
    </footer>

    <script>
        // Animación al hacer scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.animate-on-scroll');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            animateElements.forEach(element => {
                observer.observe(element);
            });
            
            // Efecto de máquina de escribir para el título
            const heroTitle = document.querySelector('.hero h1');
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