<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'user_id', 
        'libro_id', 
        'user_recibe_id', 
        'fecha_prestamo', 
        'fecha_devolucion', 
        'devuelto'
    ];

    // Relación con el libro prestado
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
 // Método para verificar si el libro está prestado
 public function estaPrestado()
 {
     return $this->prestamos()->where('devuelto', false)->exists();
 }

    // Relación con el usuario que presta el libro
    public function usuarioQuePresta()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el usuario que recibe el libro
    public function usuarioQueRecibe()
    {
        return $this->belongsTo(User::class, 'user_recibe_id');
    }
}
