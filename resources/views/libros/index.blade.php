<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexa | Mi Biblioteca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
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
        <div class="dashboard-container">
            <div class="section-header">
                <h2 class="section-title">Mi <span class="gold-text">Biblioteca</span></h2>
                <a href="{{ route('libros.create') }}" class="add-book-btn">
                    <i class="fas fa-plus"></i> Nuevo Libro
                </a>
            </div>

            <!-- Barra de navegación -->
            <div class="action-bar">
                <div class="action-buttons">
                    <a href="{{ route('dashboard') }}" class="nav-btn">
                        <i class="fas fa-book"></i> Inicio
                    </a>
                    <a href="{{ route('prestamos.index') }}" class="nav-btn">
                        <i class="fas fa-exchange-alt"></i> Préstamos
                    </a>
                </div>
            </div>

            <!-- Filtro de búsqueda -->
            <div class="search-filter">
                <input type="text" class="search-box" placeholder="Buscar libros...">
                <select class="filter-select">
                    <option>Todas las categorías</option>
                    <option>Ficción</option>
                    <option>No Ficción</option>
                    <option>Ciencia</option>
                    <option>Historia</option>
                </select>
                <select class="filter-select">
                    <option>Todos los estados</option>
                    <option>Disponible</option>
                    <option>Prestado</option>
                    <option>Reservado</option>
                </select>
                <button class="search-btn">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>

            @if($libros->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Tu biblioteca está vacía</h3>
                    <p>Aún no has agregado ningún libro a tu colección</p>
                    <a href="{{ route('libros.create') }}" class="add-book-btn" style="margin-top: 20px; display: inline-flex;">
                        <i class="fas fa-plus"></i> Agregar primer libro
                    </a>
                </div>
            @else
                <div class="books-grid">
                    @foreach($libros as $libro)
                        <div class="book-card">
                            <div class="book-cover">
                                <i class="fas fa-book" style="color: #fff;"></i>
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
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
        </div>
        <div class="copyright">
            <p>Una solución creada para lectores apasionados</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('¿Estás seguro de eliminar este libro de tu colección?')) {
                    e.preventDefault();
                }
            });
        });

        document.querySelector('.search-btn').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-box').value.toLowerCase();
            const categoryFilter = document.querySelectorAll('.filter-select')[0].value;
            const statusFilter = document.querySelectorAll('.filter-select')[1].value;
            
            document.querySelectorAll('.book-card').forEach(card => {
                const title = card.querySelector('.book-title').textContent.toLowerCase();
                const category = card.querySelector('.book-category').textContent;
                const status = card.querySelector('.book-status').textContent.toLowerCase();
                
                if (title.includes(searchTerm) &&
                    (categoryFilter === 'Todas las categorías' || category.includes(categoryFilter)) &&
                    (statusFilter === 'Todos los estados' || status.includes(statusFilter))) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
