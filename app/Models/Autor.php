<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    // Definir explícitamente el nombre de la tabla
    protected $table = 'autores';  // Asegúrate de que sea 'autores' en lugar de 'autors'

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'apellido', 'nacionalidad'];

    // Relación con libros
    public function libros() {
        return $this->hasMany(Libro::class);
    }
}
