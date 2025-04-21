<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Préstamo | Codexa</title>
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
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* PRELOADER MEJORADO */
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
            animation: spin 1s ease-in-out infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .loading-text {
            color: var(--primary);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            letter-spacing: 2px;
            font-size: 1.1rem;
            text-transform: uppercase;
        }

        /* ESTILOS BASE */
        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--dark);
            color: var(--light);
            line-height: 1.7;
            min-height: 100vh;
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 0;
            position: relative;
            z-index: 1;
        }

        /* TARJETA DE PRÉSTAMO */
        .prestamo-card {
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
        
        .prestamo-card::before {
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
            font-size: 2.5rem;
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

        /* DETALLES MEJORADOS */
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .detail-item {
            background: rgba(30, 30, 30, 0.6);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .detail-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.1);
            background: rgba(40, 40, 40, 0.7);
        }

        .detail-label {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .detail-label i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--light);
        }

        /* ESTADOS MEJORADOS */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning);
            animation: pulse 2s infinite;
        }

        .status-returned {
            background-color: rgba(76, 175, 80, 0.15);
            color: var(--success);
        }

        /* SECCIÓN LIBRO */
        .book-section {
            background: linear-gradient(135deg, rgba(30, 30, 30, 0.7), rgba(40, 40, 40, 0.7));
            padding: 2rem;
            border-radius: 12px;
            margin: 2rem 0;
            text-align: center;
            border: 1px dashed rgba(255, 215, 0, 0.3);
            transition: all 0.3s ease;
        }

        .book-section:hover {
            border-color: var(--primary);
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.1);
        }

        .book-cover {
            width: 150px;
            height: 200px;
            background: linear-gradient(135deg, #2D2D2D, #1A1A1A);
            margin: 0 auto 1.5rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 3rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* BOTONES MEJORADOS */
        .btn-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 2.5rem;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .btn i {
            margin-right: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #000;
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
        }
        
        .btn-primary:hover i {
            transform: translateX(5px);
        }

        .btn-secondary {
            background: rgba(255, 215, 0, 0.1);
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 215, 0, 0.2);
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

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 40px 0;
            }
            
            .prestamo-card {
                padding: 2rem;
            }
            
            .detail-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .prestamo-card {
                padding: 1.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .detail-item {
                padding: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- PRELOADER MEJORADO -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">CARGANDO DETALLES</div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        <div class="background-overlay"></div>
        
        <div class="dashboard-container">
            <div class="prestamo-card">
                <div class="section-header">
                    <h1 class="section-title"><i class="fas fa-hand-holding"></i> Detalles del Préstamo</h1>
                    <div class="divider">
                        <div class="line"></div>
                        <div class="diamond"></div>
                        <div class="line"></div>
                    </div>
                </div>
                
                <!-- Grid de detalles -->
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-book"></i> Libro</div>
                        <div class="detail-value">{{ $prestamo->libro->titulo }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-user-shield"></i> Prestado por</div>
                        <div class="detail-value">{{ $prestamo->usuarioQuePresta->name }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-user-tag"></i> Prestado a</div>
                        <div class="detail-value">{{ $prestamo->usuarioQueRecibe->name }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-calendar-alt"></i> Fecha préstamo</div>
                        <div class="detail-value">{{ date('d/m/Y', strtotime($prestamo->fecha_prestamo)) }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-exchange-alt"></i> Estado</div>
                        <div class="detail-value">
                            @if($prestamo->devuelto)
                                <span class="status-badge status-returned"><i class="fas fa-check-circle"></i> Devuelto el {{ date('d/m/Y', strtotime($prestamo->fecha_devolucion)) }}</span>
                            @else
                                <span class="status-badge status-pending"><i class="fas fa-clock"></i> Pendiente de devolución</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Sección del libro -->
                <div class="book-section">
                    <div class="book-cover">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>{{ $prestamo->libro->titulo }}</h3>
                    
                    @if($prestamo->libro->archivo_pdf)
                        <a href="{{ asset('storage/' . $prestamo->libro->archivo_pdf) }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-book-open"></i> Leer libro digital
                        </a>
                    @else
                        <p class="detail-value"><i class="fas fa-exclamation-circle"></i> No hay versión digital disponible</p>
                    @endif
                </div>
                
                <!-- Botones de acción -->
                <div class="btn-group">
                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al listado
                    </a>
                    
                    @if (!$prestamo->devuelto)
                        <form action="{{ route('prestamos.devolver', $prestamo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i> Marcar como devuelto
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">CODEXA</div>
            <p>La plataforma perfecta para amantes de los libros</p>
        </div>
        <div class="copyright">
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- SCRIPT MEJORADO -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ocultar preloader después de simular carga
            setTimeout(function() {
                const loader = document.querySelector('.loading-overlay');
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                    
                    // Animar elementos de forma escalonada
                    const detailItems = document.querySelectorAll('.detail-item');
                    detailItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                }, 500);
            }, 1500);

            // Efectos hover en botones
            document.querySelectorAll('.btn').forEach(button => {
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
        });
    </script>
</body>
</html>