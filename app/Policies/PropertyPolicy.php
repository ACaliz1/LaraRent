<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;

class PropertyPolicy
{
    /**
     * Determina si el usuario puede crear propiedades.
     */
    public function create(User $user)
    {
        return $user->roles()->where('name', 'admin')->exists() 
            || $user->roles()->where('name', 'user')->exists();
    }

    /**
     * Determina si el usuario puede actualizar una propiedad.
     */
    public function update(User $user, Property $property)
    {
        return $user->roles()->where('name', 'admin')->exists() 
            || $user->id === $property->user_id;
    }

    /**
     * Determina si el usuario puede eliminar una propiedad.
     */
    public function delete(User $user, Property $property)
    {
        return $user->roles()->where('name', 'admin')->exists() 
            || $user->id === $property->user_id;
    }
}
