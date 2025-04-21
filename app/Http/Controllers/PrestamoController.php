<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['libro', 'usuarioQuePresta', 'usuarioQueRecibe'])
            ->where('user_recibe_id', Auth::id())
            ->where('devuelto', false)
            ->get();

        return view('prestamos.index', compact('prestamos'));
    }

    public function prestamosRealizados()
    {
        $prestamos = Prestamo::with(['libro', 'usuarioQuePresta', 'usuarioQueRecibe'])
            ->where('user_id', Auth::id())
            ->where('devuelto', false)
            ->get();

        return view('prestamos.realizados', compact('prestamos'));
    }

    public function create()
    {
        // Solo libros disponibles que pertenezcan al usuario autenticado
        $libros = Libro::where('disponible', true)
            ->where('user_id', Auth::id())
            ->get();
        
        // Obtener todos los usuarios excepto el usuario logueado
        $usuarios = User::where('id', '!=', Auth::id())->get();

        return view('prestamos.create', compact('libros', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'user_recibe_id' => 'required|exists:users,id',
            'fecha_prestamo' => 'required|date',
        ]);

        // Obtener el libro que se va a prestar
        $libro = Libro::findOrFail($request->libro_id);

        // Verificar que el libro le pertenece al usuario logueado
        if ($libro->user_id !== Auth::id()) {
            return back()->with('error', 'No puedes prestar libros que no te pertenecen.');
        }

        // Verificar si el libro está disponible
        if (!$libro->disponible) {
            return back()->with('error', 'El libro ya ha sido prestado');
        }

        // Crear el préstamo
        $prestamo = Prestamo::create([
            'user_id' => Auth::id(), // Usuario que presta
            'libro_id' => $libro->id,
            'user_recibe_id' => $request->user_recibe_id,
            'fecha_prestamo' => $request->fecha_prestamo,
        ]);

        // Marcar el libro como no disponible
        $libro->update(['disponible' => false]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo realizado exitosamente');
    }

    public function devolver(Prestamo $prestamo)
    {
        if (!\Gate::allows('devolver-prestamo', $prestamo)) {
            abort(403, 'No tienes permiso para devolver este préstamo.');
        }

        $prestamo->update([
            'devuelto' => true,
            'fecha_devolucion' => now(),
        ]);

        $prestamo->libro->update(['disponible' => true]);

        return redirect()->route('prestamos.index')->with('success', 'Libro devuelto exitosamente');
    }

    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);

        if (
            $prestamo->usuarioQuePresta->id !== Auth::id() &&
            $prestamo->usuarioQueRecibe->id !== Auth::id()
        ) {
            abort(403, 'No tienes acceso a este préstamo');
        }

        return view('prestamos.show', compact('prestamo'));
    }
}
