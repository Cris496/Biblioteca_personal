<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-bg: rgb(0, 0, 0);
            --color-card: rgba(0, 0, 0, 0.8);
            --color-accent: #D4AF37;
            --color-text: #e8e8e8;
            --color-text-light: #aaaaaa;
            --color-border: #252525;
        }
        
        body {
            font-family: 'Playfair Display', serif;
            color: var(--color-text);
            min-height: 100vh;
            padding: 2rem;
            margin: 0;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Fondo con partículas */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background-color: var(--color-bg);
        }
        
        .container {
            max-width: 1000px;
            background: var(--color-card);
            padding: 2.5rem;
            border-radius: 8px;
            margin: 2rem auto;
            border: 1px solid var(--color-border);
            backdrop-filter: blur(4px);
            position: relative;
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
        }
        
        /* Sistema de animaciones coordinadas */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        
        @keyframes slideInFromRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 3rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.3s;
        }
        
        .logo-container img {
            max-width: 110px;
            transition: transform 0.6s ease;
        }
        
        .logo-container:hover img {
            transform: rotate(-5deg) scale(1.05);
        }
        
        .logo-container p {
            color: var(--color-accent);
            font-size: 1rem;
            margin-top: 0.5rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.5s;
        }
        
        .page-title {
            color: var(--color-text);
            font-weight: 500;
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
            font-size: 1.8rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.7s;
        }
        
        .page-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 2px;
            background: var(--color-accent);
            margin: 0.8rem auto 0;
            transform: scaleX(0);
            transform-origin: left;
            animation: scaleIn 0.6s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
            animation-delay: 1s;
        }
        
        @keyframes scaleIn {
            to { transform: scaleX(1); }
        }
        
        /* Botones con diseño original y animación coordinada */
        .btn-gold {
            background: var(--color-accent);
            color: #000;
            border: none;
            padding: 0.6rem 1.8rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border-radius: 4px;
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.1s;
        }
        
        .btn-gold:hover {
            background: transparent;
            color: var(--color-accent);
            border: 1px solid var(--color-accent);
            transform: translateY(-2px) scale(1.02);
        }
        
        /* Tabla con animaciones coordinadas */
        .table-custom {
            width: 100%;
            margin-top: 1.5rem;
            color: var(--color-text);
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table-custom thead th {
            background: rgba(212, 175, 55, 0.1);
            color: var(--color-accent);
            font-weight: 500;
            padding: 1rem;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            border: none;
            border-bottom: 1px solid var(--color-border);
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
            animation-delay: 1.3s;
        }
        
        .table-custom tbody tr {
            opacity: 0;
            transform: translateX(20px);
            animation: slideInFromRight 0.5s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
        }
        
        .table-custom tbody tr:nth-child(1) { animation-delay: 1.4s; }
        .table-custom tbody tr:nth-child(2) { animation-delay: 1.5s; }
        .table-custom tbody tr:nth-child(3) { animation-delay: 1.6s; }
        /* Añade más según sea necesario */
        
        .table-custom tbody td {
            padding: 1.2rem 1rem;
            border-bottom: 1px solid var(--color-border);
            background: var(--color-card);
            vertical-align: middle;
            transition: all 0.3s ease;
        }
        
        .table-custom tbody tr:hover td {
            background: rgba(212, 175, 55, 0.03);
            transform: translateX(5px);
        }
        
        /* Botones de acción con diseño original */
        .btn-action {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            margin-right: 0.5rem;
            border-radius: 4px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-edit {
            background: var(--color-accent);
            color: #000;
            border: 1px solid var(--color-accent);
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
            border: 1px solid #dc3545;
        }
        
        .btn-edit:hover {
            background: transparent;
            color: var(--color-accent);
        }
        
        .btn-delete:hover {
            background: transparent;
            color: #dc3545;
        }
        
        /* Alertas con animación coordinada */
        .alert-message {
            background: rgba(212, 175, 55, 0.1);
            color: var(--color-accent);
            border: 1px solid var(--color-accent);
            padding: 1rem;
            margin-bottom: 2rem;
            text-align: center;
            border-radius: 4px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.9s;
        }
        
        .icon {
            margin-right: 6px;
            transition: transform 0.3s ease;
        }
        
        .btn-action:hover .icon {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <!-- Fondo de partículas -->
    <div id="particles-js"></div>
    
    <div class="container">
        <!-- Encabezado con logo -->
        <div class="logo-container">
            <img src="{{ asset('codexa.png') }}" alt="Codexa Logo">
            
        </div>
        
        <!-- Título de página -->
        <h1 class="page-title">Lista de Autores</h1>
        
        <!-- Mensajes flash -->
        @if(Session::has('mensaje'))
            <div class="alert-message">
                {{ Session::get('mensaje') }}
            </div>
        @endif
        
        <!-- Botón de acción -->
        <div class="text-center mb-4">
            <a href="{{ url('autores/create') }}" class="btn btn-gold">
                <i class="fas fa-plus icon"></i> Nuevo Autor
            </a>
        </div>
        
        <!-- Tabla de autores -->
        <table class="table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><i class="fas fa-user icon"></i> Nombre</th>
                    <th><i class="fas fa-user icon"></i> Apellido</th>
                    <th><i class="fas fa-globe icon"></i> Nacionalidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $index => $autor)
                <tr style="animation-delay: {{ 1.4 + ($loop->index * 0.1) }}s">
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->apellido }}</td>
                    <td>{{ $autor->nacionalidad }}</td>
                    <td>
                        <a href="{{ url('/autores/'.$autor->id.'/edit') }}" class="btn-action btn-edit">
                            <i class="fas fa-edit icon"></i> Editar
                        </a>
                        <form action="{{ url('/autores/'.$autor->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Estás seguro?')" class="btn-action btn-delete">
                                <i class="fas fa-trash icon"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Scripts para partículas -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS('particles-js', {
                "particles": {
                    "number": {
                        "value": 60,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#D4AF37"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 2,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#D4AF37",
                        "opacity": 0.3,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": true,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 0.8
                            }
                        },
                        "push": {
                            "particles_nb": 4
                        }
                    }
                },
                "retina_detect": true
            });

            // Coordinación adicional de animaciones
            setTimeout(() => {
                document.querySelector('.logo-container img').style.transform = 'rotate(-2deg)';
            }, 1500);
        });
    </script>
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>