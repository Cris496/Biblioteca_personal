<?php

namespace App\Policies;

use App\Models\Libro;
use App\Models\User;

class LibroPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Permitir ver cualquier libro si es necesario
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Libro $libro)
    {
        return $user->id === $libro->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Permitir crear libros a cualquier usuario autenticado
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Libro $libro): bool
    {
        return $user->id === $libro->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Libro $libro): bool
    {
        return $user->id === $libro->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Libro $libro): bool
    {
        return $user->id === $libro->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Libro $libro): bool
    {
        return $user->id === $libro->user_id;
    }
}
