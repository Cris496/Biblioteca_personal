<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Asegúrate de importar User

class Prestamo extends Model
{
    protected $fillable = [
        'libro_id',
        'user_id',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
