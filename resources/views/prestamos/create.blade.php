<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Préstamo | Codexa</title>
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
            max-width: 800px;
            margin: 0 auto;
            padding: 60px 0;
            position: relative;
            z-index: 1;
        }

        /* TARJETA DE FORMULARIO */
        .form-container {
            background: rgba(20, 20, 20, 0.8);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 215, 0, 0.1);
            backdrop-filter: blur(5px);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease;
        }
        
        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--primary-dark), var(--primary));
            animation: shimmer 3s infinite linear;
        }

        /* ENCABEZADO */
        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--primary);
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
            background: var(--primary);
        }
        
        .diamond {
            width: 10px;
            height: 10px;
            background: var(--primary);
            transform: rotate(45deg);
            margin: 0 15px;
        }
        
        .section-description {
            color: #ccc;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* FORMULARIO */
        .prestamo-form {
            display: grid;
            gap: 1.8rem;
        }
        
        .form-group {
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .form-label i {
            width: 24px;
            text-align: center;
            font-size: 1.2rem;
        }
        
        .form-control {
            width: 100%;
            padding: 1rem 1.2rem;
            background-color: rgba(30, 30, 30, 0.8);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 8px;
            color: var(--light);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
            background-color: rgba(40, 40, 40, 0.8);
        }
        
        /* SELECT PERSONALIZADO */
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FFD700' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.2rem center;
            background-size: 12px;
            padding-right: 2.8rem;
        }
        
        /* BOTONES */
        .form-actions {
            display: flex;
            gap: 1.2rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
        }
        
        .btn i {
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #000;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
        }
        
        .btn-primary:hover i {
            transform: translateX(5px);
        }
        
        .btn-secondary {
            background-color: rgba(255, 215, 0, 0.1);
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-secondary:hover {
            background-color: rgba(255, 215, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 215, 0, 0.2);
        }
        
        .btn-back {
            background-color: transparent;
            color: var(--light);
            border: 1px solid var(--light);
            margin-right: auto;
        }
        
        .btn-back:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
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
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 40px 0;
            }
            
            .form-container {
                padding: 2rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .form-container {
                padding: 1.5rem;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
            
            .form-control {
                padding: 0.8rem 1rem;
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
            <div class="form-container">
                <div class="section-header">
                    <h1 class="section-title">Registrar Nuevo Préstamo</h1>
                    <div class="divider">
                        <div class="line"></div>
                        <div class="diamond"></div>
                        <div class="line"></div>
                    </div>
                    <p class="section-description">
                        Completa el formulario para registrar un nuevo préstamo de libro
                    </p>
                </div>

                <form action="{{ route('prestamos.store') }}" method="POST" class="prestamo-form">
                    @csrf

                    <!-- Seleccionar libro -->
                    <div class="form-group">
                        <label for="libro_id" class="form-label">
                            <i class="fas fa-book"></i> Libro a prestar
                        </label>
                        <select name="libro_id" id="libro_id" class="form-control form-select" required>
                            <option value="">Seleccione un libro</option>
                            @foreach ($libros as $libro)
                                <option value="{{ $libro->id }}">{{ $libro->titulo }} - {{ $libro->autor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Seleccionar usuario que recibe el libro -->
                    <div class="form-group">
                        <label for="user_recibe_id" class="form-label">
                            <i class="fas fa-user"></i> Usuario receptor
                        </label>
                        <select name="user_recibe_id" id="user_recibe_id" class="form-control form-select" required>
                            <option value="">Seleccione un usuario</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha de préstamo -->
                    <div class="form-group">
                        <label for="fecha_prestamo" class="form-label">
                            <i class="fas fa-calendar-alt"></i> Fecha de préstamo
                        </label>
                        <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" required 
                               value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}">
                    </div>

                    <!-- Botones de acción -->
                    <div class="form-actions">
                        <a href="{{ route('libros.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check-circle"></i> Registrar Préstamo
                        </button>
                    </div>
                </form>
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
                }, 500);
            }, 1000);
        });

        // Add hover effects to buttons
        document.querySelectorAll('.btn, .logout-btn').forEach(button => {
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

        // Set default date to today
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_prestamo').value = today;
        });
    </script>
</body>
</html>