<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Crear un usuario administrador y asignarle el rol
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->roles()->attach($adminRole->id);

        // Crear un usuario normal y asignarle el rol
        $user = User::create([
            'name'     => 'User',
            'email'    => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->roles()->attach($userRole->id);

        // Crear 8 usuarios adicionales y asignarles el rol de usuario
        User::factory(8)->create()->each(function ($newUser) use ($userRole) {
            $newUser->roles()->attach($userRole->id);
        });
    }
}
