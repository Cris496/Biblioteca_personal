<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Mi Biblioteca Personal</title>
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
            --color-completed: #28a745;
            --color-inprogress: #ffc107;
            --color-notstarted: #6c757d;
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
        
        .dashboard-container {
            max-width: 1200px;
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
            margin-bottom: 2rem;
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
            margin-bottom: 1.5rem;
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
        
        .btn-secondary-custom {
            background: transparent;
            color: var(--color-text);
            border: 1px solid var(--color-text-light);
            padding: 0.6rem 1.8rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border-radius: 4px;
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 1.3s;
        }
        
        .btn-secondary-custom:hover {
            border-color: var(--color-accent);
            color: var(--color-accent);
            transform: translateY(-2px);
        }
        
        /* Cards de métricas */
        .metric-card {
            background: rgba(212, 175, 55, 0.05);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.1);
            border-color: var(--color-accent);
        }
        
        .metric-title {
            color: var(--color-text-light);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }
        
        .metric-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .metric-completed .metric-value {
            color: var(--color-completed);
        }
        
        .metric-inprogress .metric-value {
            color: var(--color-inprogress);
        }
        
        .metric-notstarted .metric-value {
            color: var(--color-notstarted);
        }
        
        /* Gráficos */
        .chart-container {
            background: rgba(212, 175, 55, 0.05);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            height: 350px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .chart-container:hover {
            border-color: var(--color-accent);
        }
        
        .chart-title {
            color: var(--color-text);
            font-size: 1.1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
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
        .table-custom tbody tr:nth-child(4) { animation-delay: 1.7s; }
        .table-custom tbody tr:nth-child(5) { animation-delay: 1.8s; }
        
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
        
        /* Status badges */
        .badge-status {
            padding: 0.35rem 0.65rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-completed {
            background: rgba(40, 167, 69, 0.2);
            color: var(--color-completed);
            border: 1px solid var(--color-completed);
        }
        
        .badge-inprogress {
            background: rgba(255, 193, 7, 0.2);
            color: var(--color-inprogress);
            border: 1px solid var(--color-inprogress);
        }
        
        .badge-notstarted {
            background: rgba(108, 117, 125, 0.2);
            color: var(--color-notstarted);
            border: 1px solid var(--color-notstarted);
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
        
        /* Botones de acción en tabla */
        .btn-table {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            margin-right: 0.5rem;
            border-radius: 4px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-table-primary {
            background: var(--color-accent);
            color: #000;
            border: 1px solid var(--color-accent);
        }
        
        .btn-table-secondary {
            background: transparent;
            color: var(--color-text-light);
            border: 1px solid var(--color-text-light);
        }
        
        .btn-table-primary:hover {
            background: transparent;
            color: var(--color-accent);
        }
        
        .btn-table-secondary:hover {
            color: var(--color-accent);
            border-color: var(--color-accent);
        }
        
        /* Barra de progreso */
        .progress-container {
            width: 100%;
            background-color: var(--color-border);
            border-radius: 4px;
            margin: 0.5rem 0;
            height: 8px;
        }
        
        .progress-bar {
            height: 100%;
            border-radius: 4px;
            transition: width 0.6s ease;
        }
        
        .progress-completed {
            background-color: var(--color-completed);
        }
        
        .progress-inprogress {
            background-color: var(--color-inprogress);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .dashboard-container {
                padding: 1.5rem;
            }
            
            .metric-card {
                padding: 1rem;
            }
            
            .chart-container {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Fondo de partículas -->
    <div id="particles-js"></div>
    
    <div class="dashboard-container">
        <!-- Encabezado con logo -->
        <div class="logo-container">
            <img src="{{ asset('codexa.png') }}" alt="Codexa Logo">
            <p>Mi Biblioteca Personal</p>
        </div>
        
        <!-- Título de página -->
        <h1 class="page-title">Mi Progreso de Lectura</h1>
        
        <!-- Mensajes flash -->
        @if(Session::has('mensaje'))
            <div class="alert-message">
                {{ Session::get('mensaje') }}
            </div>
        @endif
        
        <!-- Sección de métricas -->
        <div class="row">
            <div class="col-md-4">
                <div class="metric-card metric-completed" style="animation-delay: 0.3s">
                    <div class="metric-title">Libros Completados</div>
                    <div class="metric-value" id="completed-count">0</div>
                    <div class="progress-container">
                        <div class="progress-bar progress-completed" id="completed-progress" style="width: 0%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric-card metric-inprogress" style="animation-delay: 0.4s">
                    <div class="metric-title">Libros en Progreso</div>
                    <div class="metric-value" id="inprogress-count">0</div>
                    <div class="progress-container">
                        <div class="progress-bar progress-inprogress" id="inprogress-progress" style="width: 0%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric-card metric-notstarted" style="animation-delay: 0.5s">
                    <div class="metric-title">Libros por Empezar</div>
                    <div class="metric-value" id="notstarted-count">0</div>
                    <div class="progress-container">
                        <div class="progress-bar" id="notstarted-progress" style="width: 0%; background-color: var(--color-notstarted)"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sección de gráficos -->
        <div class="row">
            <div class="col-md-8">
                <div class="chart-container" style="animation-delay: 0.6s">
                    <div class="chart-title">
                        <i class="fas fa-chart-pie icon"></i> Distribución de Mis Libros
                    </div>
                    <canvas id="booksDistributionChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-container" style="animation-delay: 0.7s; height: auto; min-height: 350px;">
                    <div class="chart-title">
                        <i class="fas fa-trophy icon"></i> Últimos Completados
                    </div>
                    <div id="last-completed-books" class="d-flex flex-column" style="gap: 1rem;">
                        <!-- Aquí se cargarán dinámicamente los últimos libros completados -->
                        <div class="text-center py-4">
                            <i class="fas fa-spinner fa-spin"></i> Cargando...
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sección de libros actuales -->
        <div class="row">
            <div class="col-12">
                <div class="chart-container" style="animation-delay: 0.8s; height: auto;">
                    <div class="chart-title">
                        <i class="fas fa-book-open icon"></i> Mis Libros Actuales
                    </div>
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
                        <tbody id="current-books-table">
                            <!-- Aquí se cargarán dinámicamente los libros actuales -->
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-spinner fa-spin"></i> Cargando...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Botones de acción -->
        <div class="text-center mt-4">
            <a href="#" class="btn-gold" style="animation-delay: 0.9s" id="go-to-book-btn">
                <i class="fas fa-book icon"></i> Ir a Libro
            </a>
            <a href="#" class="btn-secondary-custom" style="animation-delay: 1.0s" id="go-to-shelf-btn">
                <i class="fas fa-archive icon"></i> Ir a Estantería
            </a>
        </div>
    </div>

    <!-- Scripts para partículas -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            
            // Inicializar gráfico vacío (se actualizará con datos reales)
            const distributionCtx = document.getElementById('booksDistributionChart').getContext('2d');
            const distributionChart = new Chart(distributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Completados', 'En Progreso', 'Por Empezar'],
                    datasets: [{
                        data: [0, 0, 0],
                        backgroundColor: [
                            'rgba(40, 167, 69, 0.8)',
                            'rgba(255, 193, 7, 0.8)',
                            'rgba(108, 117, 125, 0.8)'
                        ],
                        borderColor: [
                            'rgba(40, 167, 69, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(108, 117, 125, 1)'
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
                                color: '#e8e8e8',
                                padding: 20
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    cutout: '60%'
                }
            });
            
            // Ejemplo de cómo cargar datos desde tu backend
            // function loadDashboardData() {
            //     fetch('/api/dashboard-data')
            //         .then(response => response.json())
            //         .then(data => {
            //             // Actualizar métricas
            //             document.getElementById('completed-count').textContent = data.completedCount;
            //             document.getElementById('inprogress-count').textContent = data.inProgressCount;
            //             document.getElementById('notstarted-count').textContent = data.notStartedCount;
            //             
            //             // Actualizar barras de progreso
            //             const totalBooks = data.completedCount + data.inProgressCount + data.notStartedCount;
            //             document.getElementById('completed-progress').style.width = `${(data.completedCount / totalBooks) * 100}%`;
            //             document.getElementById('inprogress-progress').style.width = `${(data.inProgressCount / totalBooks) * 100}%`;
            //             document.getElementById('notstarted-progress').style.width = `${(data.notStartedCount / totalBooks) * 100}%`;
            //             
            //             // Actualizar gráfico
            //             distributionChart.data.datasets[0].data = [data.completedCount, data.inProgressCount, data.notStartedCount];
            //             distributionChart.update();
            //             
            //             // Actualizar últimos libros completados
            //             const lastCompletedContainer = document.getElementById('last-completed-books');
            //             lastCompletedContainer.innerHTML = '';
            //             
            //             data.lastCompletedBooks.forEach(book => {
            //                 const bookElement = document.createElement('div');
            //                 bookElement.className = 'd-flex align-items-center';
            //                 bookElement.innerHTML = `
            //                     <img src="${book.coverUrl}" alt="Portada" style="width: 50px; height: 70px; object-fit: cover; border-radius: 4px; margin-right: 1rem;">
            //                     <div>
            //                         <div style="font-weight: 500;">${book.title}</div>
            //                         <div style="font-size: 0.8rem; color: var(--color-text-light);">${book.author}</div>
            //                         <span class="badge-status badge-completed">Completado</span>
            //                     </div>
            //                 `;
            //                 lastCompletedContainer.appendChild(bookElement);
            //             });
            //             
            //             // Actualizar tabla de libros actuales
            //             const currentBooksTable = document.getElementById('current-books-table');
            //             currentBooksTable.innerHTML = '';
            //             
            //             data.currentBooks.forEach(book => {
            //                 const row = document.createElement('tr');
            //                 
            //                 // Determinar clase de badge según estado
            //                 let badgeClass, badgeText;
            //                 if (book.status === 'completed') {
            //                     badgeClass = 'badge-completed';
            //                     badgeText = 'Completado';
            //                 } else if (book.status === 'inprogress') {
            //                     badgeClass = 'badge-inprogress';
            //                     badgeText = 'En Progreso';
            //                 } else {
            //                     badgeClass = 'badge-notstarted';
            //                     badgeText = 'Por Empezar';
            //                 }
            //                 
            //                 row.innerHTML = `
            //                     <td>${book.title}</td>
            //                     <td>${book.author}</td>
            //                     <td><span class="badge-status ${badgeClass}">${badgeText}</span></td>
            //                     <td>
            //                         <div class="progress-container">
            //                             <div class="progress-bar ${book.status === 'completed' ? 'progress-completed' : book.status === 'inprogress' ? 'progress-inprogress' : ''}" 
            //                                  style="width: ${book.progress}%; ${book.status === 'notstarted' ? 'background-color: var(--color-notstarted)' : ''}"></div>
            //                         </div>
            //                         <small>${book.progress}% completado</small>
            //                     </td>
            //                     <td>
            //                         <a href="/books/${book.id}" class="btn-table btn-table-primary">
            //                             <i class="fas fa-book icon"></i> Leer
            //                         </a>
            //                         <a href="/shelf/${book.shelfId}" class="btn-table btn-table-secondary">
            //                             <i class="fas fa-archive icon"></i> Estantería
            //                         </a>
            //                     </td>
            //                 `;
            //                 
            //                 currentBooksTable.appendChild(row);
            //             });
            //             
            //             // Configurar enlaces de botones principales
            //             document.getElementById('go-to-book-btn').href = data.firstInProgressBookUrl || '#';
            //             document.getElementById('go-to-shelf-btn').href = data.defaultShelfUrl || '#';
            //         })
            //         .catch(error => {
            //             console.error('Error al cargar datos del dashboard:', error);
            //         });
            // }
            // 
            // // Llamar a la función para cargar datos cuando la página esté lista
            // loadDashboardData();
        });
    </script>
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>