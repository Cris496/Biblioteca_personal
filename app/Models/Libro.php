<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'user_id',
        'autor_id',
        'categoria_id',
        'archivo_pdf',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el autor
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con los préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    // Método para verificar si el libro está prestado
    public function estaPrestado()
    {
        return $this->prestamos()->where('devuelto', false)->exists();
    }
}
