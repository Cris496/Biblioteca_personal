<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            min-height: 100vh;
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
        
        @keyframes slideInFromRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scaleIn {
            to { transform: scaleX(1); }
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
            padding: 15px 0;
            z-index: 1000;
            transition: all 0.3s ease;
            background-color: rgba(0, 0, 0, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
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
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 2px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }

        /* BOTONES PRINCIPALES (Mismo estilo del dashboard original) */
        .btn-gold {
            display: inline-block;
            padding: 0.6rem 1.8rem;
            background: #FFD700;
            color: #000;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        
        .btn-gold:hover {
            background: transparent;
            color: #FFD700;
            border: 1px solid #FFD700;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }
        
        .btn-outline {
            display: inline-block;
            padding: 0.6rem 1.8rem;
            background: transparent;
            color: #FFD700;
            border: 1px solid #FFD700;
            border-radius: 4px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        
        .btn-outline:hover {
            background: #FFD700;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        /* DASHBOARD CONTAINER */
        .dashboard-container {
            max-width: 1200px;
            margin: 80px auto 40px;
            padding: 0 20px;
        }

        /* SECCIÓN HERO */
        .dashboard-hero {
            text-align: center;
            margin-bottom: 50px;
            padding: 40px 0;
            position: relative;
        }
        
        .dashboard-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
            animation-delay: 0.3s;
        }
        
        .dashboard-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
            animation-delay: 0.5s;
        }
        
        .dashboard-hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
            animation-delay: 0.7s;
        }

        /* SECCIÓN DE MÉTRICAS */
        .metrics-section {
            margin-bottom: 50px;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-header h2 {
            font-size: 2rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-header h2:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 2px;
            background: #FFD700;
            bottom: -8px;
            left: 25%;
        }
        
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .metric-card {
            background: rgba(20, 20, 20, 0.8);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .metric-card:nth-child(1) { animation-delay: 0.3s; }
        .metric-card:nth-child(2) { animation-delay: 0.4s; }
        .metric-card:nth-child(3) { animation-delay: 0.5s; }
        
        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
        }
        
        .metric-icon {
            font-size: 2rem;
            color: #FFD700;
            margin-bottom: 15px;
        }
        
        .metric-title {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .metric-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .metric-completed .metric-value {
            color: #4CAF50;
        }
        
        .metric-inprogress .metric-value {
            color: #FFD700;
        }
        
        .metric-notstarted .metric-value {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .progress-container {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            transition: width 0.6s ease;
        }
        
        .progress-completed {
            background: #4CAF50;
        }
        
        .progress-inprogress {
            background: #FFD700;
        }
        
        .progress-notstarted {
            background: rgba(255, 255, 255, 0.3);
        }

        /* SECCIÓN DE GRÁFICOS */
        .charts-section {
            margin-bottom: 50px;
        }
        
        .charts-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        @media (min-width: 992px) {
            .charts-grid {
                grid-template-columns: 2fr 1fr;
            }
        }
        
        .chart-container {
            background: rgba(20, 20, 20, 0.8);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 8px;
            padding: 25px;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .chart-container:nth-child(1) { animation-delay: 0.4s; }
        .chart-container:nth-child(2) { animation-delay: 0.5s; }
        
        .chart-container:hover {
            border-color: rgba(255, 215, 0, 0.3);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.1);
        }
        
        .chart-title {
            font-size: 1.2rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .chart-title i {
            margin-right: 10px;
            color: #FFD700;
        }
        
        .chart {
            height: 300px;
        }
        
        .last-books-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .last-book-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .last-book-item:hover {
            background: rgba(255, 215, 0, 0.05);
        }
        
        .last-book-cover {
            width: 50px;
            height: 70px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        
        .last-book-info {
            flex: 1;
        }
        
        .last-book-title {
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .last-book-author {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .badge-status {
            display: inline-block;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-completed {
            background: rgba(40, 167, 69, 0.2);
            color: #4CAF50;
            border: 1px solid #4CAF50;
        }

        /* SECCIÓN DE TABLA */
        .table-section {
            margin-bottom: 50px;
        }
        
        .table-container {
            background: rgba(20, 20, 20, 0.8);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 8px;
            padding: 25px;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.6s;
            overflow-x: auto;
        }
        
        .table-container:hover {
            border-color: rgba(255, 215, 0, 0.3);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.1);
        }
        
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            color: #fff;
        }
        
        .table-custom thead th {
            background: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            border: none;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }
        
        .table-custom tbody tr {
            opacity: 0;
            transform: translateX(20px);
            animation: slideInFromRight 0.5s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
        }
        
        .table-custom tbody tr:nth-child(1) { animation-delay: 0.7s; }
        .table-custom tbody tr:nth-child(2) { animation-delay: 0.8s; }
        .table-custom tbody tr:nth-child(3) { animation-delay: 0.9s; }
        .table-custom tbody tr:nth-child(4) { animation-delay: 1.0s; }
        .table-custom tbody tr:nth-child(5) { animation-delay: 1.1s; }
        
        .table-custom tbody td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
            transition: all 0.3s ease;
        }
        
        .table-custom tbody tr:hover td {
            background: rgba(255, 215, 0, 0.03);
        }
        
        .book-title {
            font-weight: 500;
        }
        
        .book-author {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .badge-inprogress {
            background: rgba(255, 215, 0, 0.2);
            color: #FFD700;
            border: 1px solid #FFD700;
        }
        
        .badge-notstarted {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .table-progress-container {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            margin-bottom: 5px;
        }
        
        .table-progress-bar {
            height: 100%;
            border-radius: 3px;
        }
        
        .table-progress-text {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .table-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-table {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 4px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-table-primary {
            background: #FFD700;
            color: #000;
            border: 1px solid #FFD700;
        }
        
        .btn-table-primary:hover {
            background: transparent;
            color: #FFD700;
        }
        
        .btn-table-secondary {
            background: transparent;
            color: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-table-secondary:hover {
            color: #FFD700;
            border-color: #FFD700;
        }
        
        .btn-table i {
            margin-right: 5px;
            font-size: 0.9rem;
        }

        /* FOOTER */
        .main-footer {
            background: rgba(0, 0, 0, 0.9);
            padding: 30px 0;
            border-top: 1px solid rgba(255, 215, 0, 0.1);
        }
        
        .footer-content {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .footer-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-icons a {
            color: #fff;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: #FFD700;
            transform: translateY(-3px);
        }
        
        .copyright {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.4);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .dashboard-hero h1 {
                font-size: 2rem;
            }
            
            .dashboard-hero p {
                font-size: 1rem;
            }
            
            .metrics-grid {
                grid-template-columns: 1fr;
            }
            
            .chart-container {
                padding: 15px;
            }
            
            .table-container {
                padding: 15px;
            }
            
            .table-custom thead {
                display: none;
            }
            
            .table-custom tbody tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid rgba(255, 215, 0, 0.1);
                border-radius: 6px;
            }
            
            .table-custom tbody td {
                display: block;
                text-align: right;
                padding: 10px 15px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }
            
            .table-custom tbody td:before {
                content: attr(data-label);
                float: left;
                font-weight: 600;
                color: #FFD700;
                text-transform: uppercase;
                font-size: 0.75rem;
            }
            
            .table-actions {
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="loading-animation">
        <div class="gold-bar"></div>
    </div>
    
    <!-- Header -->
    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <div>
                <a href="#" class="btn-outline">Cerrar sesion</a>
            </div>
        </div>
    </header>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Hero Section -->
        <section class="dashboard-hero">
            <h1>Bienvenido a tu <span class="gold-text">Biblioteca Personal</span></h1>
            <p>Gestiona y sigue tu progreso de lectura con esta herramienta diseñada para amantes de los libros</p>
            <div class="dashboard-hero-buttons">
                <a href="#" class="btn-gold">
                    <i class="fas fa-plus"></i> Libros
                </a>
                <a href="#" class="btn-outline">
                    <i class="fas fa-search"></i> Estanteria
                </a>
            </div>
        </section>

        <!-- Metrics Section -->
        <section class="metrics-section">
            <div class="section-header">
                <h2>Tus <span class="gold-text">Estadísticas</span></h2>
            </div>
            <div class="metrics-grid">
                <div class="metric-card metric-completed">
                    <div class="metric-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="metric-title">Libros Completados</div>
                    <div class="metric-value" id="completed-count">24</div>
                    <div class="progress-container">
                        <div class="progress-bar progress-completed" style="width: 60%"></div>
                    </div>
                </div>
                <div class="metric-card metric-inprogress">
                    <div class="metric-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="metric-title">En Progreso</div>
                    <div class="metric-value" id="inprogress-count">8</div>
                    <div class="progress-container">
                        <div class="progress-bar progress-inprogress" style="width: 20%"></div>
                    </div>
                </div>
                <div class="metric-card metric-notstarted">
                    <div class="metric-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="metric-title">Por Leer</div>
                    <div class="metric-value" id="notstarted-count">8</div>
                    <div class="progress-container">
                        <div class="progress-bar progress-notstarted" style="width: 20%"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Charts Section -->
        <section class="charts-section">
            <div class="section-header">
                <h2>Tu <span class="gold-text">Progreso</span></h2>
            </div>
            <div class="charts-grid">
                <div class="chart-container">
                    <div class="chart-title">
                        <i class="fas fa-chart-pie"></i> Distribución de Lectura
                    </div>
                    <div class="chart" id="booksDistributionChart">
                        <!-- Gráfico se insertará aquí -->
                        <canvas style="width: 100%; height: 100%"></canvas>
                    </div>
                </div>
                <div class="chart-container">
                    <div class="chart-title">
                        <i class="fas fa-trophy"></i> Últimos Completados
                    </div>
                    
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Section -->
        <section class="table-section">
            <div class="section-header">
                <h2>Tus <span class="gold-text">Libros Actuales</span></h2>
            </div>
            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Progreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <p class="footer-text">Tu biblioteca personal elegante y sofisticada</p>
            <div class="social-icons">
               
            </div>
            <p class="copyright">© 2023 Codexa. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ocultar preloader
            setTimeout(function() {
                document.querySelector('.loading-animation').style.opacity = '0';
                setTimeout(function() {
                    document.querySelector('.loading-animation').style.display = 'none';
                }, 500);
            }, 1500);
            
            // Inicializar gráfico
            const ctx = document.querySelector('#booksDistributionChart canvas').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Completados', 'En Progreso', 'Por Leer'],
                    datasets: [{
                        data: [24, 8, 8],
                        backgroundColor: [
                            'rgba(40, 167, 69, 0.8)',
                            'rgba(255, 215, 0, 0.8)',
                            'rgba(255, 255, 255, 0.3)'
                        ],
                        borderColor: [
                            'rgba(40, 167, 69, 1)',
                            'rgba(255, 215, 0, 1)',
                            'rgba(255, 255, 255, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: '#fff',
                                padding: 20,
                                font: {
                                    family: 'Montserrat'
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
            
            // Animaciones al hacer scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.metric-card, .chart-container, .table-container');
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
        });
    </script>
</body>
</html>