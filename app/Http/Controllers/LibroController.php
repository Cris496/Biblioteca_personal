<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Auth::user()->libros()
            ->with(['autor', 'categoria'])
            ->latest()
            ->get();

        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('libros.create', compact('autores', 'categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'autor_id' => 'nullable|exists:autores,id',
            'nuevo_autor' => 'nullable|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'nueva_categoria' => 'nullable|string|max:255',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Crear autor si se proporcionó uno nuevo
        if (!empty($validated['nuevo_autor'])) {
            $autor = Autor::create(['nombre' => $validated['nuevo_autor']]);
            $validated['autor_id'] = $autor->id;
        }

        // Crear categoría si se proporcionó una nueva
        if (!empty($validated['nueva_categoria'])) {
            $categoria = Categoria::create(['nombre' => $validated['nueva_categoria']]);
            $validated['categoria_id'] = $categoria->id;
        }

        // Verificar que se tenga autor y categoría válidos
        if (empty($validated['autor_id']) || empty($validated['categoria_id'])) {
            return back()->withErrors('Debe seleccionar o crear un autor y una categoría.')->withInput();
        }

        $libro = new Libro([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'] ?? null,
            'autor_id' => $validated['autor_id'],
            'categoria_id' => $validated['categoria_id'],
        ]);
        $libro->user_id = Auth::id();

        if ($request->hasFile('archivo_pdf')) {
            $path = $request->file('archivo_pdf')->store('pdfs', 'public');
            $libro->archivo_pdf = $path;
        }

        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }

    public function show(Libro $libro)
    {
        $this->authorize('view', $libro);
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $this->authorize('update', $libro);
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('libros.edit', compact('libro', 'autores', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $this->authorize('update', $libro);

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'nuevo_autor' => 'nullable|string|max:255',
            'nueva_categoria' => 'nullable|string|max:255',
        ]);

        // Crear nuevo autor si se proporciona uno
        if (!empty($validated['nuevo_autor'])) {
            $autor = Autor::create(['nombre' => $validated['nuevo_autor']]);
            $validated['autor_id'] = $autor->id;
        }

        // Crear nueva categoría si se proporciona una
        if (!empty($validated['nueva_categoria'])) {
            $categoria = Categoria::create(['nombre' => $validated['nueva_categoria']]);
            $validated['categoria_id'] = $categoria->id;
        }

        // Actualizar el libro con los datos validados
        $libro->update([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'] ?? null,
            'autor_id' => $validated['autor_id'],
            'categoria_id' => $validated['categoria_id'],
        ]);

        // Subir archivo PDF si es necesario
        if ($request->hasFile('archivo_pdf')) {
            // Eliminar el archivo PDF anterior si existe
            if ($libro->archivo_pdf) {
                Storage::disk('public')->delete($libro->archivo_pdf);
            }

            $path = $request->file('archivo_pdf')->store('pdfs', 'public');
            $libro->archivo_pdf = $path;
            $libro->save();
        }

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        $this->authorize('delete', $libro);

        if ($libro->archivo_pdf) {
            Storage::disk('public')->delete($libro->archivo_pdf);
        }

        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
