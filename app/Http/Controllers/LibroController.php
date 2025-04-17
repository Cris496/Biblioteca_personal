<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('libros.create', compact('autores', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'isbn' => 'nullable',
            'anio_publicacion' => 'nullable|integer',
            'autor_id' => 'nullable|exists:autores,id',
            'nuevo_autor' => 'nullable|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'nueva_categoria' => 'nullable|string|max:255',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:10240',
            'archivo_epub' => 'nullable|file|mimes:epub|max:10240',
        ]);

        // Manejo de autor
        if ($request->nuevo_autor) {
            $autor = Autor::create([
                'nombre' => $request->nuevo_autor,
                'apellido' => 'Desconocido',
                'nacionalidad' => 'Desconocida',
            ]);
        } else {
            $autor = Autor::find($request->autor_id);
        }

        // Manejo de categoría
        if ($request->nueva_categoria) {
            $categoria = Categoria::create([
                'nombre' => $request->nueva_categoria,
            ]);
        } else {
            $categoria = Categoria::find($request->categoria_id);
        }

        // Crear el libro
        $libro = Libro::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'isbn' => $validated['isbn'],
            'anio_publicacion' => $validated['anio_publicacion'],
            'autor_id' => $autor->id,
            'categoria_id' => $categoria->id,
        ]);

        // Almacenar archivo PDF
        if ($request->hasFile('archivo_pdf')) {
            $path = $request->file('archivo_pdf')->store('pdfs', 'public');
            $libro->archivo_pdf = $path;
            
            if (!Storage::disk('public')->exists($path)) {
                return back()->with('error', 'Error al guardar el archivo PDF');
            }
        }

        // Almacenar archivo EPUB
        if ($request->hasFile('archivo_epub')) {
            $path = $request->file('archivo_epub')->store('epubs', 'public');
            $libro->archivo_epub = $path;
            
            if (!Storage::disk('public')->exists($path)) {
                return back()->with('error', 'Error al guardar el archivo EPUB');
            }
        }

        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Visualizar archivo PDF
     */
    public function verPdf($id)
    {
        $libro = Libro::findOrFail($id);
        
        if (!$libro->archivo_pdf) {
            abort(404, 'Archivo PDF no encontrado');
        }

        $path = storage_path('app/public/' . $libro->archivo_pdf);

        if (!file_exists($path)) {
            abort(404, 'Archivo no existe en el servidor');
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Descargar archivo PDF
     */
    public function descargarPdf($id)
    {
        $libro = Libro::findOrFail($id);
        
        if (!$libro->archivo_pdf) {
            abort(404, 'Archivo PDF no encontrado');
        }

        $path = storage_path('app/public/' . $libro->archivo_pdf);

        if (!file_exists($path)) {
            abort(404, 'Archivo no existe en el servidor');
        }

        return response()->download($path, $libro->titulo . '.pdf');
    }

    /**
     * Visualizar archivo EPUB
     */
    public function verEpub($id)
    {
        $libro = Libro::findOrFail($id);
        
        if (!$libro->archivo_epub) {
            abort(404, 'Archivo EPUB no encontrado');
        }

        $path = storage_path('app/public/' . $libro->archivo_epub);

        if (!file_exists($path)) {
            abort(404, 'Archivo no existe en el servidor');
        }

        return response()->file($path, [
            'Content-Type' => 'application/epub+zip',
        ]);
    }

    /**
     * Descargar archivo EPUB
     */
    public function descargarEpub($id)
    {
        $libro = Libro::findOrFail($id);
        
        if (!$libro->archivo_epub) {
            abort(404, 'Archivo EPUB no encontrado');
        }

        $path = storage_path('app/public/' . $libro->archivo_epub);

        if (!file_exists($path)) {
            abort(404, 'Archivo no existe en el servidor');
        }

        return response()->download($path, $libro->titulo . '.epub');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}