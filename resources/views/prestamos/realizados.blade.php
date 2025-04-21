<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Préstamos | Codexa</title>
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 0;
            position: relative;
            z-index: 1;
        }

        /* TARJETA DE HISTORIAL */
        .historial-container {
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
        
        .historial-container::before {
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--primary);
            position: relative;
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        /* BOTÓN VOLVER */
        .btn-volver {
            padding: 0.8rem 1.8rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            background: rgba(255, 215, 0, 0.1);
            color: var(--primary);
            border: 1px solid var(--primary);
            text-decoration: none;
        }
        
        .btn-volver:hover {
            background: rgba(255, 215, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 215, 0, 0.2);
        }
        
        .btn-volver i {
            transition: all 0.3s ease;
        }
        
        .btn-volver:hover i {
            transform: translateX(-5px);
        }

        /* TABLA MEJORADA */
        .prestamos-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 2rem 0;
            overflow: hidden;
            border-radius: 12px;
            animation: fadeIn 0.8s ease-out;
        }

        .prestamos-table thead {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(230, 194, 0, 0.15));
        }

        .prestamos-table th {
            padding: 1.2rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: var(--primary);
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }

        .prestamos-table td {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .prestamos-table tbody tr {
            transition: var(--transition);
        }

        .prestamos-table tbody tr:hover {
            background-color: rgba(255, 215, 0, 0.03);
        }

        .prestamos-table tbody tr:hover td {
            transform: translateX(5px);
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

        .status-active {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning);
            animation: pulse 2s infinite;
        }

        .status-completed {
            background-color: rgba(76, 175, 80, 0.15);
            color: var(--success);
        }

        /* BOTONES DE ACCIÓN */
        .btn-action {
            padding: 0.7rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            text-decoration: none;
        }
        
        .btn-action i {
            transition: var(--transition);
        }

        .btn-info {
            background-color: rgba(0, 180, 255, 0.1);
            color: var(--success);
            border: 1px solid var(--success);
        }

        .btn-info:hover {
            background-color: rgba(0, 180, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 180, 255, 0.2);
        }

        .btn-info:hover i {
            transform: translateX(3px);
        }

        /* ALERTA */
        .alert {
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            background-color: rgba(75, 192, 192, 0.1);
            border-left: 4px solid var(--success);
            animation: fadeInUp 0.6s ease-out;
        }

        .alert i {
            font-size: 1.8rem;
            color: var(--success);
        }

        .alert-content {
            flex: 1;
            font-size: 1.1rem;
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
        @media (max-width: 1024px) {
            .prestamos-table th, 
            .prestamos-table td {
                padding: 1rem;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 40px 0;
            }
            
            .historial-container {
                padding: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .prestamos-table {
                display: block;
                overflow-x: auto;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        
        @media (max-width: 480px) {
            .historial-container {
                padding: 1.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .prestamos-table th, 
            .prestamos-table td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
            
            .btn-action {
                padding: 0.6rem;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <!-- PRELOADER MEJORADO -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">CARGANDO HISTORIAL</div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        <div class="background-overlay"></div>
        
        <div class="dashboard-container">
            <div class="historial-container">
                <div class="section-header">
                    <h1 class="section-title">
                        <i class="fas fa-history"></i> Historial de Préstamos
                    </h1>
                    <a href="{{ route('prestamos.index') }}" class="btn-volver">
                        <i class="fas fa-arrow-left"></i> Volver a Préstamos
                    </a>
                </div>

                @if($prestamos->isEmpty())
                    <div class="alert">
                        <i class="fas fa-info-circle"></i>
                        <div class="alert-content">
                            No has realizado préstamos aún.
                        </div>
                    </div>
                @else
                    <table class="prestamos-table">
                        <thead>
                            <tr>
                                <th>Título del Libro</th>
                                <th>Fecha de Préstamo</th>
                                <th>Fecha de Devolución</th>
                                <th>Estado</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestamos as $prestamo)
                                <tr>
                                    <td>{{ $prestamo->libro->titulo }}</td>
                                    <td>{{ date('d/m/Y', strtotime($prestamo->fecha_prestamo)) }}</td>
                                    <td>{{ $prestamo->fecha_devolucion ? date('d/m/Y', strtotime($prestamo->fecha_devolucion)) : 'Pendiente' }}</td>
                                    <td>
                                        <span class="status-badge {{ $prestamo->fecha_devolucion ? 'status-completed' : 'status-active' }}">
                                            {{ $prestamo->fecha_devolucion ? 'Completado' : 'Activo' }}
                                        </span>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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
                }, 500);
            }, 1500);

            // Efectos hover en botones
            document.querySelectorAll('.btn-action, .btn-volver').forEach(button => {
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

            // Efectos hover en filas de la tabla
            document.querySelectorAll('.prestamos-table tbody tr').forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>