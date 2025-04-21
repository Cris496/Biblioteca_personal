<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Dashboard</title>
    
    <!-- Fuentes e iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap (opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* RESET Y ESTILOS GENERALES */
        :root {
            --black: #121212;
            --dark-black: #0a0a0a;
            --light-black: #1e1e1e;
            --gold: #FFD700;
            --light-gold: #f1e5ac;
            --dark-gold: #b8860b;
            --white: #f8f8f8;
            --gray: #888;
            --light-gray: #e0e0e0;
            --transition: all 0.3s ease;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 6px 12px rgba(212, 175, 55, 0.2);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--black);
            color: var(--white);
            overflow-x: hidden;
            line-height: 1.6;
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        
        .gold-text {
            color: var(--gold);
            font-weight: 600;
            background: linear-gradient(to right, var(--gold), var(--light-gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        
        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
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
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
        
        @keyframes loading {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* HEADER */
        .main-header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            transition: var(--transition);
            background-color: rgba(0, 0, 0, 0.9);
            border-bottom: 1px solid var(--gold);
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
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
            cursor: pointer;
            position: relative;
            padding-left: 15px;
        }
        
        .logo::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 70%;
            width: 3px;
            background: var(--gold);
            border-radius: 3px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .user-name {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: var(--light-gold);
        }
        
        .user-name i {
            color: var(--gold);
            font-size: 1.2rem;
        }

        /* BOTONES */
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: var(--transition);
            text-align: center;
            font-size: 14px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        
        .btn-primary {
            background-color: var(--gold);
            color: #000;
            border-color: var(--gold);
        }
        
        .btn-primary:hover {
            background-color: transparent;
            color: var(--gold);
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        .btn-outline {
            border-color: var(--gold);
            color: var(--gold);
            background-color: transparent;
        }
        
        .btn-outline:hover {
            background-color: var(--gold);
            color: #000;
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        .logout-btn {
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-with-bg {
    background-color: var(--gold);
    color: #000;
    border: 2px solid var(--gold);
}

.btn-with-bg:hover {
    background-color: var(--dark-gold);
    color: #000;
}
        .logout-btn:hover {
            background: var(--gold);
            color: var(--black);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        /* CONTENIDO PRINCIPAL */
        .main-content {
            padding-top: 100px;
            min-height: 100vh;
            position: relative;
        }
        
        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.9));
            z-index: -1;
        }
        
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -2;
            animation: pulse 20s infinite ease-in-out;
        }

        /* DASHBOARD STYLES */
        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .dashboard-header h1 {
            font-size: 42px;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
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
            background: var(--gold);
        }
        
        .diamond {
            width: 10px;
            height: 10px;
            background: var(--gold);
            transform: rotate(45deg);
            margin: 0 15px;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .dashboard-card {
            background: rgba(20, 20, 20, 0.8);
            padding: 40px 30px;
            border-radius: 5px;
            transition: var(--transition);
            border: 1px solid rgba(255, 215, 0, 0.1);
            backdrop-filter: blur(5px);
            opacity: 0;
            transform: translateY(20px);
        }
        
        .dashboard-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .dashboard-card:hover {
            transform: translateY(-10px) !important;
            box-shadow: var(--shadow-hover);
            border-color: rgba(255, 215, 0, 0.3);
            background: rgba(30, 30, 30, 0.9);
        }
        
        .card-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: var(--gold);
        }
        
        .welcome-message {
            text-align: center;
            margin-bottom: 40px;
            font-size: 18px;
            color: #ccc;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }
        
        /* ACTION BUTTONS */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 60px 0 40px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 15px 30px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            opacity: 0;
            transform: translateY(20px);
        }
        
        .action-btn.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .action-btn:nth-child(1) { transition-delay: 0.1s; }
        .action-btn:nth-child(2) { transition-delay: 0.3s; }
        
        .action-btn:hover {
            transform: translateY(-5px) !important;
            box-shadow: var(--shadow-hover);
        }
        
        .btn-books {
            background-color: var(--gold);
            color: #000;
        }
        
        .btn-books:hover {
            background-color: #000;
            color: var(--gold);
            border: 2px solid var(--gold);
        }
        
        .btn-loans {
            background-color: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
        }
        
        .btn-loans:hover {
            background-color: var(--gold);
            color: #000;
        }
        
        /* BOOKS GRID */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .book-card {
            background-color: var(--dark-black);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(212, 175, 55, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: cardAppear 0.5s ease-out forwards;
            animation-delay: calc(var(--delay) * 0.1s);
        }

        @keyframes cardAppear {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .book-cover {
            background: linear-gradient(135deg, var(--black), var(--dark-black));
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .book-cover i {
            font-size: 4rem;
            color: var(--gold);
            z-index: 1;
        }

        .book-cover::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                transparent 45%,
                rgba(212, 175, 55, 0.1) 50%,
                transparent 55%
            );
            animation: shine 3s infinite;
        }

        @keyframes shine {
            to {
                transform: translate(50%, 50%);
            }
        }

        .book-info {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--white);
            line-height: 1.3;
        }

        .book-author {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .book-category {
            display: inline-block;
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--gold);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            margin-bottom: 1rem;
            align-self: flex-start;
        }

        .book-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .book-actions {
            margin-top: auto;
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 0.5rem 0.75rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            transition: var(--transition);
            text-decoration: none;
            cursor: pointer;
            border: none;
            flex: 1;
            justify-content: center;
            min-width: 100px;
        }

        .view-btn {
            background-color: rgba(75, 192, 192, 0.1);
            color: #4bc0c0;
            border: 1px solid #4bc0c0;
        }

        .view-btn:hover {
            background-color: rgba(75, 192, 192, 0.2);
            transform: translateY(-2px);
        }

        .edit-btn {
            background-color: rgba(255, 206, 86, 0.1);
            color: #ffce56;
            border: 1px solid #ffce56;
        }

        .edit-btn:hover {
            background-color: rgba(255, 206, 86, 0.2);
            transform: translateY(-2px);
        }

        .delete-btn {
            background-color: rgba(255, 99, 132, 0.1);
            color: #ff6384;
            border: 1px solid #ff6384;
        }

        .delete-btn:hover {
            background-color: rgba(255, 99, 132, 0.2);
            transform: translateY(-2px);
        }

        .action-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background-color: rgba(212, 175, 55, 0.05);
            border-radius: 8px;
            border: 1px dashed var(--gold);
            margin-top: 2rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 0.8; }
            50% { opacity: 1; }
            100% { opacity: 0.8; }
        }

        .empty-icon {
            font-size: 3rem;
            color: var(--gold);
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-20px); }
            60% { transform: translateY(-10px); }
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--gold);
        }

        .empty-state p {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }
        
        /* Search Filter */
        .search-filter {
            display: flex;
            margin-bottom: 2rem;
            justify-content: center;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-box {
            flex: 1;
            padding: 0.75rem 1rem;
            border-radius: 4px;
            border: 1px solid var(--gray);
            background-color: var(--dark-black);
            color: var(--white);
            font-family: 'Montserrat', sans-serif;
            transition: var(--transition);
        }

        .search-box:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.3);
        }

        .search-btn {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: var(--black);
            padding: 0 1.5rem;
            border-radius: 4px;
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            cursor: pointer;
            box-shadow: var(--shadow);
            margin-left: 0.5rem;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
            background: linear-gradient(135deg, var(--light-gold), var(--gold));
        }
        
        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--black);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(212, 175, 55, 0.3);
            border-radius: 50%;
            border-top-color: var(--gold);
            animation: spin 1s ease-in-out infinite;
            margin-bottom: 1rem;
        }

        .loading-text {
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-top: 1rem;
            letter-spacing: 2px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
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
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .social-icons a {
            color: #fff;
            font-size: 18px;
            transition: var(--transition);
        }
        
        .social-icons a:hover {
            color: var(--gold);
            transform: translateY(-3px);
        }
        
        .copyright {
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #666;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 36px;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .search-filter {
                flex-direction: column;
                gap: 1rem;
            }
            
            .search-box {
                width: 100%;
            }
            
            .search-btn {
                width: 100%;
                justify-content: center;
                margin-left: 0;
                padding: 0.75rem 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-header h1 {
                font-size: 28px;
            }
            
            .logo {
                font-size: 24px;
            }
            
            .btn {
                padding: 10px 15px;
                font-size: 12px;
            }
            
            .action-btn {
                padding: 12px 20px;
                font-size: 14px;
            }
            
            .user-menu {
                gap: 0.8rem;
            }
            
            .logout-btn {
                padding: 0.3rem 0.6rem;
                font-size: 0.8rem;
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

    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <span class="gold-text">COD</span>EXA
            </div>
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
        <div class="background-image"></div>
        <div class="background-overlay"></div>
        
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Tu <span class="gold-text">Biblioteca Personal</span></h1>
                <div class="divider">
                    <div class="line"></div>
                    <div class="diamond"></div>
                    <div class="line"></div>
                </div>
                <div class="welcome-message">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido de vuelta, <strong>{{ Auth::user()->name }}</strong>. Explora y gestiona tu colección literaria.
                </div>
            </div>
            
            <!-- Botones de acción principales -->
            <div class="action-buttons">
                <a href="{{ route('libros.create') }}" class="action-btn btn-books" id="books-btn">
                    <i class="fas fa-plus"></i> Nuevo Libro
                </a>
                <a href="{{ route('prestamos.index') }}" class="action-btn btn-with-bg" id="loans-btn">
    <i class="fas fa-exchange-alt"></i> Préstamos
</a>
                </a>
            </div>
            
            <!-- Filtro de búsqueda simplificado (solo por título) -->
            <div class="search-filter">
                <input type="text" class="search-box" placeholder="Buscar libros por título..." id="searchInput">
                <button class="search-btn" id="searchButton">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            
            @if($libros->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Tu biblioteca está vacía</h3>
                    <p>Aún no has agregado ningún libro a tu colección</p>
                    <a href="{{ route('libros.create') }}" class="btn btn-primary" style="margin-top: 20px;">
                        <i class="fas fa-plus"></i> Agregar primer libro
                    </a>
                </div>
            @else
                <div class="books-grid">
                    @foreach($libros as $index => $libro)
                        <div class="book-card" style="--delay: {{ $index }}">
                            <div class="book-cover">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="book-info">
                                <h3 class="book-title">{{ $libro->titulo }}</h3>
                                <p class="book-author">{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</p>
                                <span class="book-category">{{ $libro->categoria->nombre }}</span>
                                <span class="book-status">
                                    <i class="fas fa-circle" style="color: {{ $libro->estaPrestado() ? '#f00' : '#0f0' }}; font-size: 10px;"></i> 
                                    {{ $libro->estaPrestado() ? 'Prestado' : 'Disponible' }}
                                </span>
                                <div class="book-actions">
                                    @if($libro->estaPrestado())
                                        <!-- Si está prestado, mostramos un mensaje o deshabilitamos los enlaces -->
                                        <button class="action-btn view-btn" disabled>
                                            <i class="fas fa-eye"></i> No disponible
                                        </button>
                                        <button class="action-btn edit-btn" disabled>
                                            <i class="fas fa-edit"></i> No disponible
                                        </button>
                                        <button class="action-btn delete-btn" disabled>
                                            <i class="fas fa-trash"></i> No disponible
                                        </button>
                                    @else
                                        <!-- Si no está prestado, mostramos los enlaces para ver detalles, editar y eliminar -->
                                        <a href="{{ route('libros.show', $libro->id) }}" class="action-btn view-btn">
                                            <i class="fas fa-eye"></i> Ver Detalles
                                        </a>
                                        <a href="{{ route('libros.edit', $libro->id) }}" class="action-btn edit-btn">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('¿Eliminar este libro?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <span class="gold-text">COD</span>EXA
            </div>
            <p>La plataforma perfecta para amantes de los libros</p>
            <div class="social-icons">
                <!-- Puedes agregar iconos sociales aquí si lo deseas -->
            </div>
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
        </div>
        <div class="copyright">
            <p>Una solución creada para lectores apasionados</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulate loading
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loading-overlay').style.opacity = '0';
                setTimeout(function() {
                    document.querySelector('.loading-overlay').style.display = 'none';
                }, 500);
            }, 1500);
            
            // Animación de las tarjetas al hacer scroll
            const cards = document.querySelectorAll('.dashboard-card, .book-card');
            const actionButtons = document.querySelectorAll('.action-btn');
            
            // Función para verificar si un elemento está visible
            function isElementInViewport(el) {
                const rect = el.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }
            
            // Función para manejar el scroll
            function checkVisibility() {
                cards.forEach((card, index) => {
                    if (isElementInViewport(card)) {
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, index * 200);
                    }
                });
                
                actionButtons.forEach((btn, index) => {
                    if (isElementInViewport(btn)) {
                        setTimeout(() => {
                            btn.classList.add('visible');
                        }, index * 200 + 300);
                    }
                });
            }
            
            // Verificar al cargar y al hacer scroll
            window.addEventListener('scroll', checkVisibility);
            checkVisibility(); // Verificar inicialmente
            
            // Funcionalidad de búsqueda simplificada (solo por título)
            function filterBooks() {
                const searchTerm = document.getElementById('searchInput').value.toLowerCase();
                
                document.querySelectorAll('.book-card').forEach(card => {
                    const title = card.querySelector('.book-title').textContent.toLowerCase();
                    card.style.display = title.includes(searchTerm) ? '' : 'none';
                });
            }
            
            // Event listeners para búsqueda
            document.getElementById('searchButton').addEventListener('click', filterBooks);
            document.getElementById('searchInput').addEventListener('keyup', function(e) {
                if (e.key === 'Enter') {
                    filterBooks();
                }
            });
            
            // Confirmación para eliminar libros
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    if (!confirm('¿Estás seguro de eliminar este libro de tu colección?')) {
                        e.preventDefault();
                    }
                });
            });
            
            // Add animation to buttons on hover
            document.querySelectorAll('.action-btn, .btn, .logout-btn, .search-btn').forEach(button => {
                button.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'scale(1.2)';
                    }
                });
                
                button.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'scale(1)';
                    }
                });
            });
        });
    </script>
</body>
</html>