<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 50000, 500000),
            'location' => $this->faker->address(),
            'type' => $this->faker->randomElement(['venta', 'alquiler']), // Ahora está en español
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
