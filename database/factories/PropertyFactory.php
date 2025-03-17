<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'price'       => $this->faker->randomFloat(2, 50000, 500000),
            'location'    => $this->faker->address(),
            'type'        => $this->faker->randomElement(['venta', 'alquiler']),
            'user_id'     => User::exists() ? User::inRandomOrder()->first()->id : User::factory()->create()->id,
        ];
    }
}
