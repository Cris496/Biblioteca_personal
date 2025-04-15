<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Codexa | Bienvenido')</title>
    
    <!-- Styles -->
    <style>
        :root {
            --color-primary: #000000;
            --color-secondary: #212121;
            --color-accent: #D4AF37;
            --color-light: #f5f5f5;
            --color-dark: #000000;
            --color-text: #212121;
            --color-text-light: #757575;
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
        
        /* Container */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
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
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo-container {
            height: 60px;
            display: flex;
            align-items: center;
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
        }
        
        .btn-primary {
            background-color: var(--color-accent);
            color: var(--color-primary);
            border: 2px solid var(--color-accent);
        }
        
        .btn-outline {
            border: 2px solid var(--color-accent);
            color: var(--color-accent);
            background-color: transparent;
        }
        
        /* Footer */
        footer {
            background-color: var(--color-dark);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        /* Utilidades */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    
    <!-- Component-specific styles -->
    @stack('styles')
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo-container">
                    <img 
                        src="{{ asset('codexa.png') }}" 
                        alt="Codexa Logo"
                        style="max-width: 180px;"
                    >
                </div>
                <nav>
                    @yield('header-nav', '<a href="#" class="btn btn-outline">Iniciar Sesión</a>')
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="animate-on-scroll">
        <div class="container">
            <div class="footer-content text-center">
                <div class="logo-container mx-auto" style="max-width: 150px;">
                    <img 
                        src="{{ asset('codexa.png') }}" 
                        alt="Codexa Logo"
                        style="width: 100%;"
                    >
                </div>
                <p class="mt-3">© {{ date('Y') }} <a href="#" style="color: var(--color-accent);">Codexa</a>. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.animate-on-scroll');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });
            
            animateElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>