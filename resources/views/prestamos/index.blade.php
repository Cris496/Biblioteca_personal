<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Préstamos | Codexa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* ANIMACIONES */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
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

        @keyframes cardHover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-5px); }
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

        /* ESTILOS GENERALES */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0a0a0a;
            color: #fff;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 20px;
            animation: fadeIn 0.8s ease;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            color: #FFD700;
        }
        
        h2 {
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
            font-size: 28px;
        }
        
        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #FFD700, transparent);
        }

        /* BOTONES */
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            font-size: 14px;
            cursor: pointer;
            border: 2px solid transparent;
            margin-right: 12px;
            margin-bottom: 15px;
        }
        
        .btn i {
            margin-right: 8px;
            font-size: 16px;
        }
        
        .btn-primary {
            background-color: #FFD700;
            color: #000;
            border-color: #FFD700;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: #FFD700;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
        }
        
        .btn-info {
            background-color: rgba(0, 180, 255, 0.15);
            color: #00b4ff;
            border-color: #00b4ff;
        }
        
        .btn-info:hover {
            background-color: rgba(0, 180, 255, 0.25);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 180, 255, 0.2);
        }

        /* TARJETAS DE PRÉSTAMO */
        .prestamos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .prestamo-card {
            background: linear-gradient(145deg, #111111, #0d0d0d);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(255, 215, 0, 0.1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            animation: fadeInUp 0.6s ease;
            position: relative;
        }
        
        .prestamo-card:hover {
            border-color: rgba(255, 215, 0, 0.3);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.1);
            animation: cardHover 0.3s ease forwards;
        }
        
        .card-header {
            background: rgba(255, 215, 0, 0.05);
            padding: 18px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
            display: flex;
            align-items: center;
        }
        
        .card-header i {
            font-size: 24px;
            color: #FFD700;
            margin-right: 12px;
        }
        
        .card-header h3 {
            margin: 0;
            font-size: 18px;
            color: #FFD700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-detail {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        
        .card-detail i {
            width: 24px;
            color: #FFD700;
            margin-right: 12px;
            text-align: center;
            font-size: 16px;
        }
        
        .card-detail-label {
            font-weight: 600;
            color: #FFD700;
            min-width: 120px;
            font-size: 14px;
        }
        
        .card-detail-value {
            color: #e0e0e0;
            flex-grow: 1;
            font-size: 14px;
        }
        
        .card-footer {
            padding: 15px 20px;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid rgba(255, 215, 0, 0.05);
        }

        /* ALERTA */
        .alert {
            padding: 18px;
            border-radius: 8px;
            margin: 25px 0;
            animation: fadeInUp 0.6s ease;
            display: flex;
            align-items: center;
            background: rgba(30, 30, 30, 0.7);
            border-left: 4px solid #00b4ff;
        }
        
        .alert i {
            font-size: 24px;
            margin-right: 15px;
            color: #00b4ff;
        }
        
        .alert-info {
            color: #e0e0e0;
        }

        /* ACCIONES */
        .action-buttons {
            margin-bottom: 35px;
            display: flex;
            flex-wrap: wrap;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .prestamos-grid {
                grid-template-columns: 1fr;
            }
            
            .btn {
                width: 100%;
                margin-right: 0;
                margin-bottom: 12px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- PRELOADER -->
    <div class="loading-overlay">
        <div class="loading-bar"></div>
    </div>

    <div class="container">
        <!-- BOTONES DE ACCIÓN -->
        <div class="action-buttons">
            <a href="{{ route('prestamos.create') }}" class="btn btn-primary">
                <i class="fas fa-hand-holding"></i> Realizar nuevo préstamo
            </a>
            <a href="{{ route('prestamos.realizados') }}" class="btn btn-primary">
                <i class="fas fa-list-check"></i> Ver Préstamos Realizados
            </a>
        </div>

        <h2><i class="fas fa-bookmark"></i> Mis Préstamos Activos</h2>

        @if($prestamos->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> 
                <span>No tienes libros prestados actualmente.</span>
            </div>
        @else
            <div class="prestamos-grid">
                @foreach($prestamos as $prestamo)
                <div class="prestamo-card">
                    <div class="card-header">
                        <i class="fas fa-book"></i>
                        <h3>{{ $prestamo->libro->titulo }}</h3>
                    </div>
                    <div class="card-body">
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
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('prestamos.show', $prestamo->id) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i> Ver Detalles
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- SCRIPT DE CARGA -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const loader = document.querySelector('.loading-overlay');
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 500);
            }, 1000);
        });
    </script>
</body>
</html>