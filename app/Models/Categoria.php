<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Asegúrate de agregar 'nombre' si lo vas a usar en la asignación masiva
    protected $fillable = ['nombre'];

    public function libros() {
        return $this->hasMany(Libro::class);
    }
}

