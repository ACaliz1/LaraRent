<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Primero, creamos los usuarios
        $this->call(UserSeeder::class);

        // Asegurar que al menos un usuario exista antes de crear propiedades
        if (User::count() === 0) {
            User::factory()->create();
        }

        // Luego, creamos las propiedades
        $this->call(PropertySeeder::class);

        // Finalmente, creamos roles
        $this->call(RoleSeeder::class);
    }
}
