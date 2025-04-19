<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital - Lista de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --text-color: #2b2d42;
            --light-gray: #f8f9fa;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            background-color: var(--light-gray);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        h1 {
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }
        
        .btn-main {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
        }
        
        .btn-main:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
            color: var(--white);
        }
        
        .btn-main i {
            margin-right: 8px;
        }
        
        .table-container {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: var(--white);
            font-weight: 500;
            padding: 1rem;
        }
        
        .table tbody tr {
            transition: var(--transition);
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: rgba(0,0,0,0.05);
        }
        
        .action-btns {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-action {
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.85rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
        }
        
        .btn-view {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        
        .btn-edit {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
            border: 1px solid #ffc107;
        }
        
        .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid #dc3545;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
        }
        
        .btn-action i {
            margin-right: 5px;
        }
        
        .empty-state {
            padding: 3rem;
            text-align: center;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #adb5bd;
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .action-btns {
                flex-direction: column;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Biblioteca Digital</h1>
            <a href="{{ url('/') }}" class="btn btn-main">
                <i class="fas fa-home"></i> Inicio
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4">Lista de Libros</h2>
            <a href="{{ route('libros.create') }}" class="btn btn-main">
                <i class="fas fa-plus"></i> Nuevo Libro
            </a>
        </div>

        @if($libros->isEmpty())
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h3>No hay libros disponibles</h3>
                <p>Comienza agregando un nuevo libro a tu biblioteca</p>
            </div>
        @else
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $libro)
                            <tr>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</td>
                                <td>{{ $libro->categoria->nombre }}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('libros.show', $libro->id) }}" class="btn-action btn-view">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('libros.edit', $libro->id) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>