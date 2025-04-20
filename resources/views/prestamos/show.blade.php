<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Préstamo | Codexa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* ANIMACIONES PRINCIPALES */
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
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* PRELOADER */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .loading-bar {
            width: 250px;
            height: 4px;
            background: linear-gradient(90deg, 
                rgba(255, 215, 0, 0.1), 
                #FFD700, 
                rgba(255, 215, 0, 0.1));
            background-size: 200% 100%;
            border-radius: 2px;
            animation: loading 1.8s ease-in-out infinite;
            margin-bottom: 15px;
        }
        
        .loading-text {
            color: #FFD700;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 2px;
            animation: pulse 2s ease-in-out infinite;
        }

        /* ESTILOS PRINCIPALES */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #000;
            color: #fff;
            line-height: 1.6;
            padding: 20px;
        }
        
        .gold-text {
            color: #FFD700;
            font-weight: 600;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }

        /* CONTENEDOR PRÉSTAMO */
        .prestamo-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: rgba(15, 15, 15, 0.85);
            border-radius: 10px;
            border: 1px solid rgba(255, 215, 0, 0.15);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.05);
            animation: fadeIn 0.8s ease;
        }
        
        .prestamo-container h1 {
            color: #FFD700;
            margin-bottom: 1.8rem;
            text-align: center;
            font-size: 2.2rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(255, 215, 0, 0.2);
        }

        /* DETALLES */
        .prestamo-details {
            background: linear-gradient(
                to right, 
                rgba(30, 30, 30, 0.7), 
                rgba(40, 40, 40, 0.7)
            );
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            border-left: 4px solid #FFD700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
        }
        
        .prestamo-details:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.1);
        }

        .detail-item {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .detail-item:hover {
            border-bottom-color: rgba(255, 215, 0, 0.3);
        }
        
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            color: #FFD700;
            min-width: 180px;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }
        
        .detail-label i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: #FFD700;
        }
        
        .detail-value {
            color: #e0e0e0;
            flex-grow: 1;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .detail-value i {
            margin-right: 10px;
            color: #ffffff;
        }

        /* ESTADO */
        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background-color: rgba(255, 215, 0, 0.15);
            color: #FFD700;
            animation: pulse 2s infinite;
        }

        /* SECCIÓN PDF */
        .pdf-section {
            text-align: center;
            margin: 2rem 0;
            padding: 1.5rem;
            background: rgba(30, 30, 30, 0.6);
            border-radius: 8px;
            border: 1px dashed rgba(255, 215, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .pdf-section:hover {
            border-color: rgba(255, 215, 0, 0.4);
            background: rgba(30, 30, 30, 0.7);
        }

        .no-pdf {
            color: #999;
            font-style: italic;
            text-align: center;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .no-pdf i {
            margin-right: 8px;
            color: #ffffff;
        }

        /* BOTONES */
        .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 6px;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn i {
            margin-right: 8px;
            color: inherit;
        }

        .btn-primary {
            background-color: #FFD700;
            color: #000;
            border-color: #FFD700;
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: #FFD700;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 215, 0, 0.4);
        }

        .btn-secondary {
            background-color: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            border-color: #FFD700;
        }
        
        .btn-secondary:hover {
            background-color: rgba(255, 215, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.2);
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 2rem;
            animation: fadeInUp 0.6s ease 0.3s forwards;
            opacity: 0;
        }

        /* EFECTOS DE CARGA */
        .content-loading {
            opacity: 0;
            animation: fadeIn 0.8s ease 0.5s forwards;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .prestamo-container {
                padding: 1.5rem;
            }
            
            .detail-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .detail-label {
                margin-bottom: 0.5rem;
                min-width: auto;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- PRELOADER -->
    <div class="loading-overlay">
        <div class="loading-bar"></div>
        <div class="loading-text">CARGANDO DETALLES...</div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="prestamo-container content-loading">
        <h1><i class="fas fa-hand-holding"></i> Detalles del Préstamo</h1>

        <div class="prestamo-details">
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-book"></i> Libro:</span>
                <span class="detail-value"><i class="fas fa-book-open"></i> {{ $prestamo->libro->titulo }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-user-shield"></i> Prestado por:</span>
                <span class="detail-value"><i class="fas fa-user"></i> {{ $prestamo->usuarioQuePresta->name }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-user-tag"></i> Prestado a:</span>
                <span class="detail-value"><i class="fas fa-user-friends"></i> {{ $prestamo->usuarioQueRecibe->name }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-calendar-alt"></i> Fecha préstamo:</span>
                <span class="detail-value"><i class="far fa-calendar-check"></i> {{ date('d/m/Y', strtotime($prestamo->fecha_prestamo)) }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-exchange-alt"></i> Estado:</span>
                <span class="detail-value">
                    @if($prestamo->devuelto)
                        <i class="fas fa-check-circle"></i> Devuelto el {{ date('d/m/Y', strtotime($prestamo->fecha_devolucion)) }}
                    @else
                        <span class="status-badge status-pending"><i class="fas fa-clock"></i> Pendiente de devolución</span>
                    @endif
                </span>
            </div>
        </div>

        <!-- SECCIÓN PDF -->
        <div class="pdf-section">
            @if($prestamo->libro->archivo_pdf)
                <a href="{{ asset('storage/' . $prestamo->libro->archivo_pdf) }}" target="_blank" class="btn btn-primary">
                    <i class="fas fa-book-open"></i> Leer libro
                </a>
            @else
                <p class="no-pdf"><i class="fas fa-exclamation-circle"></i> No hay archivo PDF disponible para este libro</p>
            @endif
        </div>

        <!-- BOTONES DE ACCIÓN -->
        <div class="action-buttons">
            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            
            @if (!$prestamo->devuelto)
                <form action="{{ route('prestamos.devolver', $prestamo->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle"></i> Marcar como devuelto
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- SCRIPT DE CARGA -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ocultar preloader después de 1.5 segundos
            setTimeout(function() {
                const loader = document.querySelector('.loading-overlay');
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 500);
            }, 1500);
        });
    </script>
</body>
</html>