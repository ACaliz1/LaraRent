<?php
namespace App\Policies;

use App\Models\Property;
use App\Models\User;

class PropertyPolicy
{
    public function create(User $user)
    {
        return $user->roles()->whereIn('name', ['admin', 'user'])->exists();
    }
    

    public function update(User $user, Property $property)
    {
        return $user->roles()->where('name', 'admin')->exists() || $user->id === $property->user_id;
    }

    public function delete(User $user, Property $property)
    {
        return $user->roles()->where('name', 'admin')->exists() || $user->id === $property->user_id;
    }

}
