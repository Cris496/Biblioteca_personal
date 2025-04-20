<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    // Mostrar libros prestados
    public function index()
    {
        $prestamos = Prestamo::with(['libro', 'usuarioQuePresta', 'usuarioQueRecibe'])
            ->where('user_recibe_id', Auth::id())
            ->where('devuelto', false)
            ->get();

        return view('prestamos.index', compact('prestamos'));
    }

    // Prestamos realizados por el usuario
    public function prestamosRealizados()
    {
        $prestamos = Prestamo::with(['libro', 'usuarioQuePresta', 'usuarioQueRecibe'])
            ->where('user_id', Auth::id())
            ->where('devuelto', false)
            ->get();

        return view('prestamos.realizados', compact('prestamos'));
    }

    // Método para mostrar el formulario de creación de un préstamo
    public function create()
    {
        // Obtener todos los libros disponibles
        $libros = Libro::where('disponible', true)->get();
        
        // Obtener todos los usuarios excepto el usuario logueado
        $usuarios = User::where('id', '!=', Auth::id())->get();

        // Pasar los libros y usuarios a la vista
        return view('prestamos.create', compact('libros', 'usuarios'));
    }

    // Método para guardar el préstamo
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'user_recibe_id' => 'required|exists:users,id',
            'fecha_prestamo' => 'required|date',
        ]);

        // Obtener el libro que se va a prestar
        $libro = Libro::findOrFail($request->libro_id);

        // Verificar si el libro está disponible
        if ($libro->disponible === false) {
            return back()->with('error', 'El libro ya ha sido prestado');
        }

        // Crear el préstamo
        $prestamo = Prestamo::create([
            'user_id' => Auth::id(), // Usuario que presta
            'libro_id' => $libro->id,
            'user_recibe_id' => $request->user_recibe_id,
            'fecha_prestamo' => $request->fecha_prestamo,
        ]);

        // Marcar el libro como prestado (ya no estará disponible para el prestamista)
        $libro->update(['disponible' => false]);

        // Devolver el libro en el index del prestamista y mostrarlo en el del receptor
        return redirect()->route('prestamos.index')->with('success', 'Préstamo realizado exitosamente');
    }

    // Método para marcar el préstamo como devuelto
    public function devolver(Prestamo $prestamo)
    {
        if (!\Gate::allows('devolver-prestamo', $prestamo)) {
            abort(403, 'No tienes permiso para devolver este préstamo.');
        }

        $prestamo->update([
            'devuelto' => true,
            'fecha_devolucion' => now(),
        ]);

        // Marcar el libro como disponible nuevamente
        $prestamo->libro->update(['disponible' => true]);

        return redirect()->route('prestamos.index')->with('success', 'Libro devuelto exitosamente');
    }

    // Método para mostrar los detalles de un préstamo específico
    public function show($id)
    {
        // Buscar el préstamo
        $prestamo = Prestamo::findOrFail($id);

        // Verificar si el préstamo pertenece al usuario logueado (si es necesario)
        if ($prestamo->usuarioQuePresta->id !== Auth::id() && $prestamo->usuarioQueRecibe->id !== Auth::id()) {
            abort(403, 'No tienes acceso a este préstamo');
        }

        return view('prestamos.show', compact('prestamo'));
    }
}
