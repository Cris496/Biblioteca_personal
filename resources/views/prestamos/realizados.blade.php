<div class="container">
    <h2>Préstamos Realizados</h2>

    @if($prestamos->isEmpty())
        <div class="alert alert-info">No has realizado préstamos aún.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Título del Libro</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->libro->titulo }}</td>
                        <td>{{ date('d/m/Y', strtotime($prestamo->fecha_prestamo)) }}</td>
                        <td>{{ $prestamo->fecha_devolucion ? date('d/m/Y', strtotime($prestamo->fecha_devolucion)) : 'No devuelto' }}</td>
                        <td>
                            <a href="{{ route('prestamos.show', $prestamo->id) }}" class="btn btn-info">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
